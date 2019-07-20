<?php

namespace App\Http\Controllers\Blog;

use Storage;

use JD\Cloudder\Facades\Cloudder;
use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Core\ServiceBuilder;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function uploadImageToCloudinary(Request $request)
    {
        $data = $request->all();
        $CKEditor = $data['CKEditor'];
        $funcNum = $data['CKEditorFuncNum'];
        $message = $url = 'Successfully uploaded.';

        if (!$request->hasFile('upload')) {
            return response('Invalid Request Parameters', 400);
        }
        $file = $request->file('upload');
        $filename = $file->getRealPath();
        $publicId = $file->getClientOriginalName();
        try {
            $uploadImageRequest = Cloudder::upload($filename, $publicId, [
                'folder' => 'lib-development',
                'public_id' => auth()->user()->email,
                'resource_type' => 'image'
            ]);
            return json_encode($uploadImageRequest);
            // $url = 'https://res.cloudinary.com/lib-development/image/upload/v1563082388/sample.jpg';
            // return '<script>window.parent.CKEDITOR.tools.callFunction(' . $funcNum . ', "' . $url . '", "' . $message . '")</script>';
        } catch (\Exception $error) {
            throw $error;
            return response('Internal Server Error', 500);
        }
    }

    public function uploadImageToGoogleCloudBucketStorage(Request $request)
    {
        $data = $request->all();
        $CKEditor = $data['CKEditor'];
        $funcNum = $data['CKEditorFuncNum'];
        $message = $url = 'Successfully uploaded.';
        new ServiceBuilder([
            'keyFile' => json_decode(file_get_contents(env('GOOGLE_APPLICATION_CREDENTIALS')), true)
        ]);
        if (!$request->hasFile('upload')) {
            return response('Invalid Request Parameters', 400);
        }
        $file = $request->file('upload');
        $filePath = $file->getRealPath();
        $publicId = $file->getClientOriginalName();
        $url = "images/" . $publicId;
        try {
            $disk = Storage::disk('gcs');
            $disk->put($url, fopen($filePath, 'r'));
            $url = $disk->url($url);
            return '<script>window.parent.CKEDITOR.tools.callFunction(' . $funcNum . ', "' . $url . '", "' . $message . '")</script>';
        } catch (\Exception $error) {
            throw $error;
            return response('Internal Server Error', 500);
        }
    }
}

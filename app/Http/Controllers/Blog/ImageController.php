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

    private function uploadImage($request)
    {
        new ServiceBuilder([
            'keyFile' => json_decode(file_get_contents(env('GOOGLE_APPLICATION_CREDENTIALS')), true)
        ]);
        if (!$request->hasFile('file')) {
            return response('Invalid Request Parameters', 400);
        }
        $file = $request->file('file');
        $filePath = $file->getRealPath();
        $publicId = $file->getClientOriginalName();
        $url = "images/" . $publicId;
        try {
            $disk = Storage::disk('gcs');
            $disk->put($url, fopen($filePath, 'r'));
            $url = $disk->url($url);
            return response(json_encode([
                "link" => $url
            ]));
        } catch (\Exception $error) {
            throw $error;
            return response('Internal Server Error', 500);
        }
    }


    private function uploadVideo($request)
    {
        // dd($request->file);
        // return response(json_encode([
        //     "link" => 'https://storage.googleapis.com/lib-assets-cdn/blog/videos/66374502_144043766780288_4737541751987601450_n.mp4'
        // ]));
        new ServiceBuilder([
            'keyFile' => json_decode(file_get_contents(env('GOOGLE_APPLICATION_CREDENTIALS')), true)
        ]);
        if (!$request->file) {
            return response('Invalid file attached!', 400);
        }
        $file = $request->file('file');
        $filePath = $file->getRealPath();
        $publicId = $file->getClientOriginalName();
        $url = "videos/" . $publicId;
        try {
            $disk = Storage::disk('gcs');
            $disk->put($url, fopen($filePath, 'r'));
            $url = $disk->url($url);
            return response(json_encode([
                "link" => $url
            ]));
        } catch (\Exception $error) {
            throw $error;
            return response('Internal Server Error', 500);
        }
    }


    public function uploadFile(Request $request)
    {
        switch ($request->type) {
            case 'image':
                return $this->uploadImage($request);

            case 'video':
                return $this->uploadVideo($request);

            default:
                return response(json_encode([
                    "link" => null
                ]));
        }
    }
}

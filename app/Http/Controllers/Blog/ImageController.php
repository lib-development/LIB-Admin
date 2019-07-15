<?php

namespace App\Http\Controllers\Blog;

use JD\Cloudder\Facades\Cloudder;
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
            // $uploadImageRequest = Cloudder::upload($filename, $publicId, [
            //     'folder' => 'lib-development',
            //     'public_id' => auth()->user()->email,
            //     'resource_type' => 'image'
            // ]);
            // return json_encode($uploadImageRequest);
            $url = 'https://res.cloudinary.com/lib-development/image/upload/v1563082388/sample.jpg';
            return '<script>window.parent.CKEDITOR.tools.callFunction(' . $funcNum . ', "' . $url . '", "' . $message . '")</script>';
        } catch (\Exception $error) {
            throw $error;
            return response('Internal Server Error', 500);
        }
    }
}

<?php

namespace App\Services;

class ImageKit
{
    protected $imageId;
    protected $apiKey;
    protected $secretKey;
    protected $uploadEndpoint;

    public function __construct()
    {
        $this->imageId = env('IMAGEKIT_ID');
        $this->apiKey = env('IMAGEKIT_API_KEY');
        $this->secretKey = env('IMAGEKIT_API_SECRET');
        $this->uploadEndpoint = env('IMAGEKIT_API_ENDPOINT').$this->imageId;
    }

    public function upload($filename, $file)
    {
        $timestamp = strval(time());
        $filename = "test.jpg";
        $FILE = base64_encode(file_get_contents($filename));
        $paramToString = "apiKey=$this->apiKey&filename=$filename&timestamp=$timestamp";
        $fields = [
            signature => create_signature($paramToString, $this->secretKey),
            filename => $filename,
            timestamp => $timestamp,
            useUniqueFilename => true,
            apiKey => $this->apiKey,
            file => $file
        ];

        // $url_data = http_build_query($data);

        $boundary = uniqid();
        $delimiter = '-------------' . $boundary;

        $post_data = build_data_files($boundary, $fields, $FILE);
    }
}

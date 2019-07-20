<?php

function encrypt_decrypt($action, $string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'linda';
    $secret_iv = 'mik';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

function richmedia(){
    $richmedia = \App\Models\Advert::where('type','2')->first();
    if($richmedia){
        return $richmedia->content;
    }
    return false;
}

function background(){
    $background = \App\Models\Advert::where('type','4')->first();
    if($background){
        return $background->image_url;
    }
    return false;
}

function inbetween(){
    //get the cpd
    $cpd = \App\Models\Advert::where('type','8')->first();
    if($cpd) {
        return $cpd->content;
    }
}


function website_url($path){
    $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
    if(isset($_SERVER['SERVER_NAME'])) {
        $info = explode(".", $_SERVER['SERVER_NAME']);
        unset($info[0]);
        $host = implode(".", $info);
    }else{
        $host = "lindaikejisblog.com";
    }
    echo $protocol."://www.lindaikejisblog.com".$path;
}

function pending_comment(){
    $comments =\App\Models\Comment::where('status','0')->count();
    return $comments;
}

function article($status)
{
    $article = \App\Models\BlogContent::where('status', $status);
    if(auth()->check()){
        if(auth()->user()->user_type_id == "2"){
            $article = $article->where('author',auth()->user()->id);
        }
    }
    if($status == "3"){
        if(auth()->user()->user_type_id == "1") {
            $admin = \App\User::where('user_type_id', '1')->pluck('id', 'id')->toArray();
            $article = \App\Models\BlogContent::whereIn('author', $admin)->where('status', 3);
        }
    }
    return $article->count();
}

function article_all()
{
    $article = new \App\Models\BlogContent();

    if(auth()->check()) {
        if (auth()->user()->user_type_id == "2") {
            $article = $article->where('author', auth()->user()->id);
            return $article->count();
        } else {
            $settings  = \App\Models\Setting::where('id',"1")->first();
            return $settings->total;
        }
    }
}

function setting_ii(){
    $settings  = \App\Models\Setting::where('id',"1")->first();
    return $settings->total_published;
}

function thumbnail($url, $filename, $width = 333, $height = true) {

    // download and create gd image
    $image = ImageCreateFromString(file_get_contents($url));

    // calculate resized ratio
    // Note: if $height is set to TRUE then we automatically calculate the height based on the ratio
    $height = $height === true ? (ImageSY($image) * $width / ImageSX($image)) : $height;

    // create image
    $output = ImageCreateTrueColor($width, $height);
    ImageCopyResampled($output, $image, 0, 0, 0, 0, $width, $height, ImageSX($image), ImageSY($image));

    // save image
    ImageJPEG($output, $filename, 95);

    // return resized image
    return $output; // if you need to use it
}

function build_data_files($boundary, $fields, $files){
    $data = '';
    $eol = "\r\n";

    $delimiter = '-------------' . $boundary;

    foreach ($fields as $name => $content) {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
            . $content . $eol;
    }


    foreach ($files as $name => $content) {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . $name . '"; filename="' . $name . '"' . $eol
            //. 'Content-Type: image/png'.$eol
            . 'Content-Transfer-Encoding: binary'.$eol
            ;

        $data .= $eol;
        $data .= $content . $eol;
    }
    $data .= "--" . $delimiter . "--".$eol;


    return $data;
}

function create_signature($param_string, $secretKey) {
    return hash_hmac("sha1", $param_string, $secretKey);
}

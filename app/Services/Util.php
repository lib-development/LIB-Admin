<?php

namespace App\Services;

use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class Util
{
    static function sendEmail($info, $type= null){
        if(!$type){
            $type="default";
        }
        $message_data = $info['message'];
    }

    static function getImageCloud($image, $request)
    {

        $photoName = time().'.'.$request->$image->getClientOriginalExtension();

        $request->$image->move(public_path('advertss'), $photoName);
        $data['url'] = "https://".$_SERVER['SERVER_NAME']."/advertss/".$photoName;
        return $data['url'];
    }

    static function sendPushNotification($data,$tokens){
        $optionBuiler = new OptionsBuilder();
        $optionBuiler->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($data['title']);
        $notificationBuilder->setBody($data['body'])
            ->setSound('default');

//        $dataBuilder = new PayloadDataBuilder();
//        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuiler->build();
        $notification = $notificationBuilder->build();
//        $data = $dataBuilder->build();

// You must change it to get your tokens

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification);
        return $downstreamResponse;

    }

    static function search_query_constructor($dataArray, $col_name, $trim_last_or = false)
    {
        $constructor_sql = "(";
        $dataLength = count($dataArray) - 1;
        $i = 0;
        if (count($dataArray) < 1) {
            return " 1 ";
        }
        foreach ($dataArray as $value) {
            if (($dataLength == $i) && ($trim_last_or == true)) {
                $constructor_sql .= "$col_name LIKE '%$value%' ";
            } else if (($dataLength == $i)) {
                $constructor_sql .= "$col_name LIKE '%$value%' ";
            } else {
                $constructor_sql .= "$col_name LIKE '%$value%'  OR ";
            }
            $i++;
        }
        return $constructor_sql .= ")";

    }

    static function clean($string) {
        $string = strip_tags(str_replace(' ', '-', $string)); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    static function getImage($content){
        $str = preg_replace('/<img(.*)>/i','',$content,1);
        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $image);
        $img_src = (isset($image['src']) ? $image['src'] : "");


        return (isset($image['src']) ? $image['src'] : "https://dummyimage.com/1x1/000/fff");
    }
}

<?php


    $device_id = "fUtoXuRZx6o:APA91bHoG9hvJQ5PLDCaWsAx2IG0B7zQp_t92AoKmsxaRKLLvmDA-adlWk7X_uFXkfL_oSvLBUMIhSY9YTD6uleroKz2--Nd4uKu4lWPjiNOSHySQjv-8jlFo2f0_QDQ5A6ZWFcekQGY";

    $url = "https://fcm.googleapis.com/fcm/send";
    $token = $device_id;
    $serverKey = 'AIzaSyChpmWu0PoNCZdkfa9tea73HlLRWiPfcR0';
    $title = "Notification title";
    $body = "Hello aaa this is a android push notifiaction............";
    $notification = array('title' =>$title , 'body' => $body);
    $arrayToSend = array('to' => $token, 'notification' => $notification,'title'=>$title);
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    // curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    if ($response === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
    //return $response;
    echo $response;
    // var_dump($response);exit;
?>
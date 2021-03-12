<?php

    //$device_id = "f76v7ogt4K8:APA91bE2kNn90BAcdoZyLsHjVX9mTz3KNOTqSiMeVPL8c2l18WvIzkVGe3W3BGo6uQGj8yv69WS3hNr5u50BYgbZHGESIOQXymx8ww_Q1oss0Cb1CqUYTr3FJUwRxJ52JrdthEmUZZoH";

    $device_id = "cgAv6lhUoWI:APA91bEfwuPOFphMdQay08WZQzYykwwBGJL7kfHnMZsxA74TUIFyHxVedt3U0-ju9LyOylfHF5VFFo_0B1zaPoGuit5uq4d65QdP8PWSQmY4yFURSVlajF03BTzRbWy884xrbLGZpAIO";

    $url = "https://fcm.googleapis.com/fcm/send";
    $token = $device_id;
    $serverKey = 'AIzaSyBOh-SBz3xQ2aVGF8nw8xBqx8u1RjSIPBY';
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
    return $response;
    // var_dump($response);exit;
?>
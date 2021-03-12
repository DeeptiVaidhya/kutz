<?php

    //$device_id = "f76v7ogt4K8:APA91bE2kNn90BAcdoZyLsHjVX9mTz3KNOTqSiMeVPL8c2l18WvIzkVGe3W3BGo6uQGj8yv69WS3hNr5u50BYgbZHGESIOQXymx8ww_Q1oss0Cb1CqUYTr3FJUwRxJ52JrdthEmUZZoH";

    $device_id = "d2aanvNGm00:APA91bG8DaqnCbT0J7WjSSwiszrdb6mmU_trPdsyYRzb6N-kFMNyGpmdI3-Qi6wtREc6hKB-o53FqgZFoVHVzJ6oCj1S0bzdaExZAkveCol5ZzVuKe5OpUG7N6VANXeVkeQQ5TVs_EnO";

    $url = "https://fcm.googleapis.com/fcm/send";
    $token = $device_id;
    $serverKey = 'AIzaSyDJIQSllLP8bA4b_PnqUVydvNQTzO9DiS8';
    $title = "Notification title";
    $req = "req";
    $body = "Hello aaa this is a android push notifiaction............";
    $notification = array('title' =>$title , 'body' => $body, 'type' => $req);
    $arrayToSend = array('to' => $token, 'notification' => $notification,'title'=>$title,'type' => $req);
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
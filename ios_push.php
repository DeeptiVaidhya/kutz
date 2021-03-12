<?php

$apnsServer = 'ssl://gateway.sandbox.push.apple.com:2195';
    /* Make sure this is set to the password that you set for your private key
    when you exported it to the .pem file using openssl on your OS X */
    $privateKeyPassword = '1234';
    /* Put your own message here if you want to */
    $message = 'Welcome to iOS 7 Push Notifications';
    /* Pur your device token here */
    // $deviceToken = '831fbac5205f22e86e7ea491ed635ab3f9b60d5af38dc178caffb300ea36f628';
    $deviceToken = '7eee16d434bd8cb45c4d6e8db3d8cceb145fa6880c23c30e2908b0638b3e984e';
    /* Replace this with the name of the file that you have placed by your PHP
    script file, containing your private key and certificate that you generated
    earlier */
    $pushCertAndKeyPemFile = '/home/jokingfriend/public_html/apn/kutz.pem';
   
    $ctx = stream_context_create();
    stream_context_set_option($ctx, 'ssl', 'local_cert', $pushCertAndKeyPemFile);
    stream_context_set_option($ctx, 'ssl', 'passphrase', $privateKeyPassword);

    $fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195',  $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

    //if (!$fp)
    //exit("Failed to connect amarnew: $err $errstr" . PHP_EOL);

    //echo 'Connected to APNS' . PHP_EOL;

    // Create the payload body
    $body['aps'] = array(
        'badge' => +1,
        'alert' => $message,
        'sound' => 'default'
    );

    $payload = json_encode($body);

    // Build the binary notification
    $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

    // Send it to the server
    $result = fwrite($fp, $msg, strlen($msg));

    if (!$result)
        echo 'Message not delivered' . PHP_EOL;
    else
        echo 'Message successfully delivered amar'.$message. PHP_EOL;

    // Close the connection to the server
    fclose($fp);  

// API access key from Google API's Console
// define( 'API_ACCESS_KEY', 'AAAAbAFwELQ:APA91bHbxh-ELIMhpmLs6Tk-BaYU8OsYl7DVg2SdFKSa8wcutsV6aJL6yuMqVvwDnfHC8OLUdsmaDu5z2ZWrdcWVRxeXVq6eWsRsZON-w__w0c3KGWYsIsLNec8PIa_xY35BONnAjVaG' );
// $registrationIds = array( "235a6740759328f1450b2f9202294bb2263d48e90af22b187837ca7ee3b5d6f5" );
// // prep the bundle
// $msg = array(
//         'body'  => "message text",
//         'title'     => "message title",
//         'vibrate'   => 1,
//         'sound'     => 1,
//     );
// $fields = array(
//             'registration_ids'  => $registrationIds,
//             'notification'      => $msg
//         );

// $headers = array(
//             'Authorization: key=' . API_ACCESS_KEY,
//             'Content-Type: application/json'
//         );

// $ch = curl_init();
// curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
// curl_setopt( $ch,CURLOPT_POST, true );
// curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
// curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
// curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
// curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
// $result = curl_exec($ch );
// curl_close( $ch );
// echo $result;

// $url = "https://fcm.googleapis.com/fcm/send";
// $token = "b839e521840b71687f6a6fb6bd2fb9e2ead77b63aa04be5d5a1248000abeb660";
// $serverKey = "AAAAAbAFwELQ:APA91bHbxh-ELIMhpmLs6Tk-BaYU8OsYl7DVg2SdFKSa8wcutsV6aJL6yuMqVvwDnfHC8OLUdsmaDu5z2ZWrdcWVRxeXVq6eWsRsZON-w__w0c3KGWYsIsLNec8PIa_xY35BONnAjVaG";
// // $serverKey = "AIzaSyC5WBluvLWcOarE7x6pbDFp6EB6GJProWs";
// $title = "test ios push";
// $body = "Body of the message";
// $notification = array('title' =>$title , 'text' => $body, 'sound' => 'default', 'badge' => '1');
// $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
// $json = json_encode($arrayToSend);
// $headers = array();
// $headers[] = 'Content-Type: application/json';
// $headers[] = 'Authorization: key='. $serverKey;
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
// curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
// curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
// //Send the request
// $response = curl_exec($ch);
// //Close request
// if ($response === FALSE) {
// die('FCM Send Error: ' . curl_error($ch));
// }
// print_r($response);die;
// curl_close($ch);


// //FCM api URL
// $url = 'https://fcm.googleapis.com/fcm/send';
// //api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
// $server_key = 'AAAAbAFwELQ:APA91bHbxh-ELIMhpmLs6Tk-BaYU8OsYl7DVg2SdFKSa8wcutsV6aJL6yuMqVvwDnfHC8OLUdsmaDu5z2ZWrdcWVRxeXVq6eWsRsZON-w__w0c3KGWYsIsLNec8PIa_xY35BONnAjVaG';
			
// $fields = array();
// // $fields['data'] = '9671d6d9c6b9cb24d40f9b20803c8ead926fd4162a7a4ca4c1e5988cda6c7a76';
// // $fields['registration_ids'] = '9671d6d9c6b9cb24d40f9b20803c8ead926fd4162a7a4ca4c1e5988cda6c7a76';

// $fields = array(
//      'to' => '9671d6d9c6b9cb24d40f9b20803c8ead926fd4162a7a4ca4c1e5988cda6c7a76',
//      'data' => 'send push ios'
//    );
// $json = json_encode($fields);
// // if(is_array($target)){
// // }else{
// // 	$fields['to'] = $target;
// // }
// //header with content_type api key
// $headers = array(
// 	'Content-Type:application/json',
//   'Authorization:key='.$server_key
// );
// // print_r($headers);die;		
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
// $result = curl_exec($ch);
// if ($result === FALSE) {
// 	die('FCM Send Error: ' . curl_error($ch));
// }
// print_r($result);die;
// curl_close($ch);
// return $result;
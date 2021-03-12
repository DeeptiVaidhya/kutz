<?php 

// function sendPushIOS($reg_id, $title, $desc ,$visit_id,$isCall,$provider_id){

        $deviceToken = "144f58709b8528774ae3ef78d6fa6ba508e72d9d70f9a0702f35d2ae5fa7096b";
        // $passphrase  = 'kapilkk';
        $passphrase  = 'Push';
        $message = 'This is a test message';
        //badge
        $badge = 1;
        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', 'server_certificates_bundle_sandbox.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
        // stream_context_set_option($ctx, 'ssl', 'local_cert', '/var/www/html/CureApp/relief.pem');

        // stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
        
        // Open a connection to the APNS server
        $fp = stream_socket_client(
            'ssl://gateway.sandbox.push.apple.com:2195', $err,
            $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$fp)
        exit("Failed to connect: $err $errstr" . PHP_EOL);

        echo 'Connected to APNS' . PHP_EOL;

        // Create the payload body
        $body['aps'] = array(
            'alert' => $message,
            'badge' => $badge,
            'Content-available' => '1',
            'sound' => 'default'
        );

        print_r($body['aps']);exit;

        $body['roomname'] = '123';
        $body['isCall'] = '1';

        // Encode the payload as JSON
        $payload = json_encode($body);

        // Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

        if (!$result)
            echo 'Error, notification not sent' . PHP_EOL;
        else
            echo 'notification sent!' . PHP_EOL;

        // Close the connection to the server
        fclose($fp);
    // }
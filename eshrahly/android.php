<?php



        $to = '+917987735353';  //$mobile;
        $from = '+17655873177';
        $message = 'hello';
    
        $data = 'To='.$to.'&From='.$from.'&Body='.$message;
    
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.twilio.com/2010-04-01/Accounts/ACcc43af88a9630c69d407573fc58fa028/Messages.json",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
        "Content-Type: application/x-www-form-urlencoded",
        "Authorization: Basic QUNjYzQzYWY4OGE5NjMwYzY5ZDQwNzU3M2ZjNThmYTAyODo2NDAxYWQ5YWRjMDQ2NTlhOTMxY2E0NTVkOTU1Y2Y0MA=="
        ),
        ));
        
        $response = curl_exec($curl);
        
        //curl_close($curl);
        // echo $response;
    
        
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
        // echo "cURL Error #:" . $err;
        return false;
        } else {
        // echo $response;
        return true;
        
    }
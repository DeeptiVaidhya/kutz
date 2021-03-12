<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appcontroller extends CI_Controller {

public function __construct(){
    parent::__construct();
    $this->load->library('upload');
    $this->load->library('email');
    header('Access-Control-Allow-Origin: *');

	header('Access-Control-Allow-Credentials: true');

	header('Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT,DELETE');

	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, TOKEN , Authoriz');

	header('Content-Type: application/json; charset=UTF8');
	header('Content-Type: text/html; charset=UTF-8');

	date_default_timezone_set('Asia/Calcutta');

	$this->output->set_content_type('application/json');


	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
	header('HTTP/1.1 200 OK');
	die();
	}
}

public function genrate_token($tokenData){
	$str=implode(',', $tokenData);
	$token= base64_encode($str);
	return $token;
}

public function decode_token($str){
	$str_res=base64_decode($str);
	$user_data=explode(',',$str_res);
	$agent_phone =   $user_data[0];
	$token       =   $user_data[1]; 
	//print_r($token);die;
	$where_data = array(
		'mobile'      => $agent_phone,
		'device_token'     => $token
	);
	$result = $this->Model->singleRow($where_data,'agent');
	if($result){
		return true;
	}else{
		return false;
	}
}

public function decode_token1($str){
  return true;
}

/******** API FOR SIGNUP AGENT *********/		
public function signup() {
    $post = file_get_contents('php://input');
    $val = json_decode($post);
    $agent_email = $val->agent_email;
    $agent_mobile = $val->mobile;
    $where = array(        
        'mobile' => $val->mobile,
        'type'   => 'agent' 
    );
    $checkMobile = $this->Model->singleRowdata($where,'agent');
    if ($checkMobile) {
        $data_result['result']  = 'false';
        $data_result['msg']     = 'Mobile already exists';

        if ($checkMobile->otp_status == '0') {
            $where_delete = array('mobile' => $val->mobile, 'otp_status' => '0');
            $delete_data = $this->Model->deleterec($where_delete,'agent');

            $whereAgentEmail = array('agent_email' => $agent_email);
            $fatchAgentData = $this->Model->singleRowdata($whereAgentEmail,'agent');
            if ($fatchAgentData) {
                if ($agent_email == $fatchAgentData->agent_email ) {
                    $delete_data = $this->Model->deleterec($whereAgentEmail,'agent');
                }

                if ($agent_email == $fatchAgentData->agent_email && $agent_mobile == $fatchAgentData->agent_mobile) {
                        $whereAgent = array(
                            'mobile' => $agent_mobile,
                            'agent_email' => $agent_email,
                            'otp_status' => '0',
                        );
                        $delete_data = $this->Model->deleterec($whereAgent,'agent');
                    }
            }
            

            $data = array(
                'device_type'   => $val->device_type,
                'device_token'  => $val->device_token,
                'agent_name'    => $val->agent_name, 
                'father_name'   => $val->father_name, 
                'dob'           => $val->dob, 
                'agent_email'   => $val->agent_email, 
                'address'       => $val->address,
                'mobile'        => $val->mobile, 
                'aadhar_card'   => $val->aadhar_card,
                'pan_card'      => $val->pan_card, 
                'cancel_cheque' => $val->cancel_cheque,
                'type'          => 'agent'
            );
            $result = $this ->Model-> insert($data,'agent');
            if ($result) {
                $lastId = $this->db->insert_id();
                $wheredata = array(
                    'mobile' => $val->mobile 
                );
                $genrate_otp = mt_rand(100000,999999);
                $data_otp = array(
                    'otp' => $genrate_otp
                );
                $update_info = $this->Model->update('agent', $data_otp, $wheredata);
                if ($update_info) {
                      $mobileNum = $val->mobile; 
                      $sendOtp = $this->messageSend($genrate_otp, $mobileNum);
                      if ($sendOtp) {
                            $where_agentId = array(
                                'agent_id' => $lastId
                            );
                            $agentData  = $this->Model->singleRowdata($where_agentId,'agent');
                            if ($agentData) {
                                $agent_name = $agentData->agent_name;
                                $agentDataEmail = $agentData->agent_email;
                                $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail,$agent_name);
                                $tokenData   = array();
                                $tokenData['user_mobile']   = $agentData->mobile; 
                                $tokenData['device_token']  = $agentData->device_token; 
                                $data_result['token']       = $this->genrate_token($tokenData);
                                $data_result['result']      = 'true';
                                $data_result['otp']         = $agentData->otp;
                                $data_result['data']        = $agentData;
                                $data_result['msg']         = "SJBT is Registered Successfully! OTP send on this ".$agentData->mobile. " number.";


                            }else{
                                $data_result['result']      = 'false';
                                $data_result['msg']         = "SJBT can't Registered" ; 
                            }
                      }else{
                        $data_result['result']        = 'false';
                        $data_result['msg']           = 'Message Not send Please check your Mobile Number';
                    }   
                }
            }else{   
                $data_result['result']      = 'false';
                $data_result['msg']         = "SJBT can't Registered" ; 
            }


        }else{
            $data_result['result']  = 'false';
            $data_result['msg']     = 'Mobile already exists please verify your OTP first and login  here .';
        }
        


    }else{
        $data = array(
            'device_type'   => $val->device_type,
            'device_token'  => $val->device_token,
            'agent_name'    => $val->agent_name, 
            'father_name'   => $val->father_name, 
            'dob'           => $val->dob, 
            'agent_email'   => $val->agent_email, 
            'address'       => $val->address,
            'mobile'        => $val->mobile, 
            'aadhar_card'   => $val->aadhar_card,
            'pan_card'      => $val->pan_card, 
            'cancel_cheque' => $val->cancel_cheque,
            'type'          => 'agent'
        );
        $result = $this ->Model-> insert($data,'agent');
        if ($result) {
            $lastId = $this->db->insert_id();
            $wheredata = array(
                'mobile' => $val->mobile 
            );
            $genrate_otp = mt_rand(100000,999999);
            $data_otp = array(
                'otp' => $genrate_otp
            );
            $update_info = $this->Model->update('agent', $data_otp, $wheredata);
            if ($update_info) {
                  $mobileNum = $val->mobile; 
                  $sendOtp = $this->messageSend($genrate_otp, $mobileNum);
                  if ($sendOtp) {
                        $where_agentId = array(
                            'agent_id' => $lastId
                        );
                        $agentData  = $this->Model->singleRowdata($where_agentId,'agent');
                        if ($agentData) {
                           $agent_name = $agentData->agent_name;
                            $agentDataEmail = $agentData->agent_email;
                            $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail,$agent_name);
                            $tokenData   = array();
                            $tokenData['user_mobile']   = $agentData->mobile; 
                            $tokenData['device_token']  = $agentData->device_token; 
                            $data_result['token']       = $this->genrate_token($tokenData);
                            $data_result['result']      = 'true';
                            $data_result['otp']         = $agentData->otp;
                            $data_result['data']        = $agentData;
                            $data_result['msg']         = "SJBT is Registered Successfully! OTP send on this ".$agentData->mobile. " number.";


                        }else{
                            $data_result['result']      = 'false';
                            $data_result['msg']         = "SJBT can't Registered" ; 
                        }
                  }else{
                    $data_result['result']        = 'false';
                    $data_result['msg']           = 'Message Not send Please check your Mobile Number';
                }   
            }
        }else{   
            $data_result['result']      = 'false';
            $data_result['msg']         = "SJBT can't Registered" ; 
        }
    }
    echo json_encode($data_result);
}


public function Check_otp() {
    $post = file_get_contents('php://input');
    $val  = json_decode($post);
    $headers = $this->input->request_headers();
    $wheredata = array(
        'mobile'    => $val->mobile,
        'otp'       => $val->otp
    );
    $result= $this->Model->singleRowdata($wheredata,'agent');
    if($result){

        $changeDOB = date('dmy', strtotime($result->dob));

    	$full_name = $result->agent_name;  

        $shortname   = mb_strtoupper(substr($full_name,0,4));

        // if ($changeDOB && $full_name && $shortname ) {            
        // }
            $agent_code  = 'EZY@'.$shortname.$changeDOB;

        $data = array(
           'otp_status' => '1',
           'agent_code' => $agent_code
        );
        $show_status = $this->Model->update('agent',$data,$wheredata);
        if ($show_status) {
            $wheredata = array(
                'mobile'     => $val->mobile,
                'type'      => 'agent'
            );
            $newResult= $this->Model->singleRowdata($wheredata,'agent');
            $mobile = $val->mobile;
            $name = $newResult->agent_name;
            
            if($this->welcomeMessageSend($mobile,$name,$agent_code)) {
        	
        	$data_result['result']        = 'true';
            $data_result['data']          = $newResult;
            $data_result['msg']           = 'Your OTP is matched, you are registered successfully.';

            $to = $newResult->agent_email;
            // print_r($to);die;
            $subject = 'Registration Successful - ('.$agent_code.') - EZYPANGATEWAY';

            $headers = "From: " . strip_tags('noreply@jainbandhutrust.com') . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message='';
            $message .= '<!DOCTYPE html>
                 <html>
                   <head></head>
                 <body style=" margin: 0 auto;">
                 <div class="wrapper" style="width:100%;" >
                   <header style="width: 100%; float: left; background-color: #061a42; clear: left; text-align: center;">                     
                        <span style="padding: 10px;font-size: 40px;color: white;">EZYPAN </span>                       
                     </header>
                     <section>
                       <div class="container" style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
                         <div class="section">                   
                           <p style="font-size:22px;">Dear '.$name.',</p>
                           <p>Congratulations! You have been registered successfully with ezypangateway!</p>
                           <p>Your! Agent Code is : '.$agent_code.'</p>
                          
                          <p>For further process and detailed information please visit us at B-1, BCM City, Navlakha, Indore (M.P.) or contact 0731- 4278691.</p>
                          <p><b> Note:</b>  This is a system generated e-mail, please do not reply to it. </p>

                          <p><b>* This message is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged information. *</b></p>
                           <p style="float:left; margin-right:10px;">Thanks</p>
                         </div>
                       </div>
                     </section>
                 <footer style="  color: white; background-color: black; height: auto; width: 100%; float: left;">
                 <div class="container"  style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
                   <div class="main-box" style=" width: 100%;">
                     </div>
                 </footer>
                 </div>
                 </body>
                 </html>';
              
               if(mail($to, $subject, $message, $headers)){
               }else{
               }        
            }else{
                 $data_result['result']        = 'false';
                 $data_result['msg']           = 'Message Not send Please check your Mobile Number';
            }
        }else{
        	 $data_result['result']        = 'false';
        	 $data_result['msg']           = 'Sorry Your OTP Not update';
        }

       
    }else{
        $data_result['result']        = 'false';
        $data_result['msg']           = 'Sorry.. OTP is incorrect please enter correct OTP.';
    }
   
    echo json_encode($data_result);
}


/*  Api for Login with Agent */
public function login(){
    $post       = file_get_contents('php://input');
    $val        = json_decode($post);
    $agent_code   = $val->agent_code;
    $mobile       = $val->mobile;
    $whereLoginAgent=array(
        'agent_code'     => $agent_code           
    );
    $checkLoginAgent=$this->Model->singleRowdata($whereLoginAgent, 'agent');
    if ($checkLoginAgent) {
        $checkagentCode = $checkLoginAgent->agent_code;
        if($agent_code == $checkagentCode){
        $wheredata=array(
            'agent_code'     => $agent_code,
            'mobile'         => $mobile                
        );
        $checkresult=$this->Model->singleRowdata($wheredata, 'agent');
        if($checkresult){
            if ($checkresult->type == 'agent') {
                $where = array(
                    'agent_code'     => $agent_code,
                    'verify_status'  => '1'                 
                );
                $result = $this->Model->singleRowdata($wheredata, 'agent');
                if ($result) {
                    $whereupdate = array(
                        'mobile' => $val->mobile 
                    );
                    $genrate_otp = mt_rand(100000,999999);
                    $update_otp = array(
                        'otp' => $genrate_otp
                    );
                    $update_info = $this->Model->update('agent', $update_otp, $whereupdate);
                        $where1 = array(
                            'agent_code'     => $agent_code,
                            'mobile'         => $result->mobile,
                            'verify_status'  => '1'                 
                        );
                        $user   = $this->Model->singleRowdata($where1,'agent');
                        if ($user){
                            if($this->messageSend($genrate_otp,$mobile)) {
                                    // $agentDataEmail = $checkLoginAgent->agent_email;
                                    // $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail);
                                    $agent_name = $checkLoginAgent->agent_name;
                                    $agentDataEmail = $checkLoginAgent->agent_email;
                                    $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail,$agent_name);
                                    $data_result['result']       = 'true';
                                    $data_result['data']         = $result->agent_id;
                                    $data_result['agent_code']  = $agent_code;
                                    $data_result['msg']          ='SJBT fatch Successfully!';
                            }else{
                                $data_result['result']          = 'false';
                                $data_result['msg']             = "Message Not send Please check your Mobile Number";
                            }
                        }else{
                                $data_result['result']      = 'false';
                                $data_result['msg']         = "Messsge: Your agent code is not activated. Please contact to Admin." ;
                        }
                }else{
                  $data_result['result']         = 'false';
                  $data_result['msg']            = "SJBT does not verify.";
                }
            }else{
                  $data_result['result']         = 'false';
                  $data_result['msg']            = "You are not a agent.";
            }
            if ($checkresult->type == 'user') {
                $where = array(
                    'agent_code'     => $agent_code        
                );
                $result = $this->Model->singleRowdata($wheredata, 'agent');
                if ($result) {
                    $whereupdate = array(
                        'mobile' => $val->mobile 
                    );
                    $genrate_otp = mt_rand(100000,999999);
                    $update_otp = array(
                        'otp' => $genrate_otp
                    );
                    $update_info = $this->Model->update('agent', $update_otp, $whereupdate);
                    if($this->messageSend($genrate_otp,$mobile)) {
                        $agent_name = $result->agent_name;
                        $agentDataEmail = $result->agent_email;
                        $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail,
                            $agent_name);                       

                        $where_res = array(
                            'mobile' => $val->mobile 
                        );
                        $user   = $this->Model->singleRowdata($where_res,'agent');
                        if ($user){
                            $data_result['result']       = 'true';
                            $data_result['data']         = $result->agent_id;
                            $data_result['agent_code']  = $agent_code;
                            $data_result['msg']          ='User fatch Successfully!';
                        }else{
                            $data_result['result']      = 'false';
                            $data_result['msg']         = "User can't login" ;
                        } 
                    }else{
                        $data_result['result']          = 'false';
                        $data_result['msg']             = "Message Not send Please check your Mobile Number";
                    }
                }else{
                  $data_result['result']         = 'false';
                  $data_result['msg']            = "User does not verify.";
                }
            }
        }else{
            $whereMobile = array(
                'mobile'        => $mobile
            );
            $agentResult = $this->Model->singleRowdata($wheredata, 'agent');
            if ($agentResult) {
                $data_result['result']      = 'false';
                $data_result['msg']         = "Mobile already exits" ;
            }else{
                $whereAgentCode=array(
                    'agent_code'     => $agent_code           
                );
                $checkAgentcode = $this->Model->singleRowdata($whereAgentCode, 'agent');
                if ($checkAgentcode) {
                    $whereCode=array(
                        'agent_code'     => $agent_code,
                        'verify_status' => '1',        
                    );
                    $checkAgentcodeverify = $this->Model->singleRowdata($whereCode, 'agent');
                    if ($checkAgentcodeverify) {
                        if($agent_code && $mobile){
                        $data = array(
                        'agent_code'    => $agent_code, 
                        'mobile'        => $mobile,
                        'type'          => 'user',
                        'verify_status' => '1',
                    );
                    $user_result = $this ->Model->insert($data, 'agent');
                    if ($user_result) {
                        $mobile     = $mobile;
                        $where_data = array('mobile' => $mobile);
                        $genrate_otp = mt_rand(100000,999999);
                        $data       = array('otp' => $genrate_otp);
                        $show_info  = $this->Model->update('agent',$data,$where_data);
                        if ($show_info) {
                            if($this->messageSend($genrate_otp,$mobile)) {
                                $user   = $this->Model->singleRowdata($where_data,'agent');

                                $agent_name = $user->agent_name;
                                $agentDataEmail = $user->agent_email;
                                $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail,$agent_name); 
                                
                                if ($user){
                                    $data_result['result']      = 'true';
                                    $data_result['data']        = $user->agent_id;
                                    $data_result['agent_code']  = $agent_code;
                                    $data_result['msg']         = "User create Successfully!";
                                }else{
                                    $data_result['result']      = 'false';
                                    $data_result['msg']         = "User can't create" ;
                                } 
                            }else{
                                $data_result['result']          = 'false';
                                $data_result['msg']             = "Message Not send Please check your Mobile Number";
                            }
                        }else{
                            $data_result['result']           = 'false';
                            $data_result['msg']              = 'OTP Not Update Succesfully';
                        }        
                    }else{
                        $data_result['result']         = 'false';
                        $data_result['msg']            = "user not insert";
                    }  
                    }else{
                        $data_result['result']         = 'false';
                        $data_result['msg']            = "Please enter mobile number";
                    }  
                }else{
                    $data_result['result']          = 'false';
                    $data_result['msg']             = "Messsge: Your SJBT code is not activated. Please contact to Admin";
                }
            }else{
                $data_result['result']      = 'false';
                $data_result['msg']         = "SJBT code invalid" ;
            }
        }
            
        }           
    }else{
        $data_result['result']         = 'false';
        $data_result['msg']            = "SJBT code Required";
    }
}else{
        $data_result['result']      = 'false';
        $data_result['msg']         = "SJBT code invalid" ;
}
    echo json_encode($data_result);
}


public function messageSend($msg,$mobile){
    //Sender ID,While using route4 sender id should be 6 characters long.
    $newmsg   = "Your OTP is ".$msg." Please enter the same to use your account. Keep this OTP to yourself for account safety. If you have not made this request then report us immediately at help@ezypangateway.com";

    $message = urlencode($newmsg);
    $mobileNo = $mobile;
    $senderId = 'ESYPAN';
    $auth_key = '300595Avqfaa0a5db19dd5';//'a67539ef7443137cb16e93e4efd9d3c';

    $url = "https://api.msg91.com/api/sendhttp.php?mobiles=$mobileNo&authkey=$auth_key&route=4&sender=$senderId&message=$message&country=91";

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    // echo "cURL Error #:" . $err;
    return false;
    } else {
    // echo $response;
    return true; 
    }

    // $message = urlencode($newmsg);
    // // $message = $msg;
    // $mobileNo = $mobile;

    // $senderId = 'ESYPAN';
    // $auth_key = 'a67539ef7443137cb16e93e4efd9d3c';

    // $curl = curl_init();
    // $url = "http://msg.smscluster.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=$auth_key&message=$message&senderId=$senderId&routeId=1&mobileNos=$mobileNo&smsContentType=english";
    // curl_setopt_array($curl, array(
    //     CURLOPT_URL => $url,
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "GET",
    //     CURLOPT_SSL_VERIFYHOST => 0,
    //     CURLOPT_SSL_VERIFYPEER => 0
    // ));
    

    // $response = curl_exec($curl);
    // $err = curl_error($curl);

    // curl_close($curl);

    // if ($err) {
    //   //echo "cURL Error #:" . $err;
    //  return false;
    // } else {
    //  return true;
    // }

} 

public function welcomeMessageSend($mobile,$name,$code){

    //$agent_code = urlencode($code);
    $msgmobile="Dear $name, Congratulations! You have been registered successfully with ezypangateway! Your user ID is ".$code." For further process and detailed information please visit us at B-1, BCM City, Navlakha, Indore (M.P.) or contact 0731- 4278691.";

    //print_r($msgmobile);die;

    $message = urlencode($msgmobile);
    $mobileNo = $mobile;
    $senderId = 'ESYPAN';
    $auth_key = '300595Avqfaa0a5db19dd5';//'a67539ef7443137cb16e93e4efd9d3c';

    $url = "https://api.msg91.com/api/sendhttp.php?mobiles=$mobileNo&authkey=$auth_key&route=4&sender=$senderId&message=$message&country=91&unicode=1";

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    // echo "cURL Error #:" . $err;
    return false;
    } else {
    // echo $response;
    return true; 
    }
    //Sender ID,While using route4 sender id should be 6 characters long.
    // $message = urlencode($msgmobile);
    // // $message = $msg;
    // $mobileNo = $mobile;

    // $senderId = 'ESYPAN';
    // $auth_key = 'a67539ef7443137cb16e93e4efd9d3c';

    // $curl = curl_init();
    // $url = "http://msg.smscluster.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=$auth_key&message=$message&senderId=$senderId&routeId=1&mobileNos=$mobileNo&smsContentType=english";
    // curl_setopt_array($curl, array(
    //     CURLOPT_URL => $url,
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "GET",
    //     CURLOPT_SSL_VERIFYHOST => 0,
    //     CURLOPT_SSL_VERIFYPEER => 0
    // ));


    // $response = curl_exec($curl);
    // $err = curl_error($curl);

    // curl_close($curl);

    // if ($err) {
    //   //echo "cURL Error #:" . $err;
    //  return false;
    // } else {
    //  return true;
    // }
} 

public function check_login_otp() {
    $post = file_get_contents('php://input');
    $val  = json_decode($post);
    $device_type  = $val->device_type;
    $device_token = $val->device_token;
    $agent_code   = $val->agent_code;
    $wheredata = array(
        'agent_id'     => $val->agent_id,
        'otp'          => $val->otp
    );
    $result= $this->Model->singleRowdata($wheredata,'agent');
    //print_r($result);die;
    if($result){
        $wheredata = array('agent_code' => $agent_code);
        $agent_code = $this->Model->singleRowdata($wheredata,'agent');
        if ($agent_code) {
             $data = array(
                'otp_status'  => '1',
                'device_type'  => $device_type,
                'device_token' => $device_token
            );
            $show_status = $this->Model->update('agent',$data,$wheredata);
            if ($show_status) {
                $tokenData   = array();
                $tokenData['user_mobile']   = $result->mobile; 
                $tokenData['device_token']  = $device_token; 
                $data_result['token']       = $this->genrate_token($tokenData);
                $data_result['result']      = 'true';
                $data_result['data']        = $result;
                $data_result['agent_email'] = $agent_code->agent_email;
                $data_result['msg']         = 'Your OTP Matched';
            }else{
                $data_result['result']      = 'true';
                $data_result['data']        = $result;
                $data_result['msg']         = 'Your OTP not update';
            }
        }else{
            $data_result['result']        = 'false';
            $data_result['msg']           = 'Enter invalid agent code';
        }
    }else{ 
        $data_result['result']        = 'false';
        $data_result['msg']           = 'Sorry Your OTP Not matched';
    }
   
    echo json_encode($data_result);
}

/******** API FOR UPLOAD DOCUMENTS *********/
public function upload_documents(){
        $type = $this->input->get('type');
        $myimg = $_FILES["file"]["name"]; 
        
        if($type == 'aadhar_card') {
            $path1 = time().rand(10000,99999).".jpg";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/aadhar_card/".$path1)) {
                 $path1;
            } else {
                exit;
            }
        $data_result['path'] = $path1;
        $data_result['data'] = 'https://'.$_SERVER['SERVER_NAME'].'/uploads/aadhar_card/'.$path1;
        }

        if($type == 'others_front') {
            $path1 = time().rand(10000,99999).".jpg";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/others_front/".$path1)) {
                 $path1;
            } else {
                exit;
            }
        $data_result['path'] = $path1;
        $data_result['data'] = 'https://'.$_SERVER['SERVER_NAME'].'/uploads/others_front/'.$path1;
        }

        if($type == 'others_back') {
            $path1 = time().rand(10000,99999).".jpg";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/others_back/".$path1)) {
                 $path1;
            } else {
                exit;
            }
        $data_result['path'] = $path1;
        $data_result['data'] = 'https://'.$_SERVER['SERVER_NAME'].'/uploads/others_back/'.$path1;
        }


        if($type == 'image') {
            $path1 = time().rand(10000,99999).".jpg";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/image/".$path1)) {
                 $path1;
            } else {
                exit;
            }
        $data_result['path'] = $path1;
        $data_result['data'] = 'https://'.$_SERVER['SERVER_NAME'].'/uploads/image/'.$path1;
        }

        if($type == 'pan_card') {
            $path1 = time().rand(10000,99999).".jpg";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/pan_card/".$path1)) {
                 $path1;
            } else {
                exit;
            }
        $data_result['path'] = $path1;
        $data_result['data'] = 'https://'.$_SERVER['SERVER_NAME'].'/uploads/pan_card/'.$path1;
        }

        if($type == 'bank_passbook') {
            $path1 = time().rand(10000,99999).".jpg";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/bank_passbook/".$path1)) {
                 $path1;
            } else {
                exit;
            }
        $data_result['path'] = $path1;
        $data_result['data'] = 'https://'.$_SERVER['SERVER_NAME'].'/uploads/bank_passbook/'.$path1;
        }

        if($type == 'signature') {
            $path1 = time().rand(10000,99999).".jpg";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/signature/".$path1)) {
                 $path1;
            } else {
                exit;
            }
        $data_result['path'] = $path1;
        $data_result['data'] = 'https://'.$_SERVER['SERVER_NAME'].'/uploads/signature/'.$path1;
        }
        
    echo json_encode($data_result);
    }

    /******* API APPLY FOR PAN APPLICATION ********/
    public function applyForPAN() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $documents          = $val->documents;
        $agent_id           = $val->agent_id;
        $form_amount        = $val->form_amount;
        $convencing_charge  = $val->convencing_charge;   
        $comment            = $val->comment;
        $category_1         = $val->category_1; 
        $category_2         = $val->category_2;                   
        $category_3         = $val->category_3; 
        $total_charge       = $val->total_charge;
        foreach ($documents as $key) {
            $data = array(
               'aadhar_front'          => $key->aadhar_front,
               'aadhar_back'           => $key->aadhar_back,
               'pan_form_front'        => $key->pan_form_front,
               'pan_form_back'         => $key->pan_form_front, 
               'others_front'          => $key->others_front,
               'others_back'           => $key->others_back,
               'signature'             => $key->signature,
               'pan_number'            => $key->pan_number,
               'user_image'            => $key->image,
               'applicant_fname'       => $key->applicant_fname,
               'applicant_mname'       => $key->applicant_mname,
               'applicant_lname'       => $key->applicant_lname,
               'father_fname'          => $key->father_fname,
               'father_mname'          => $key->father_mname,
               'father_lname'          => $key->father_lname,
               'father_title'          => $key->father_title,
               'title'                 => $key->title,
               'mother_title'          => $key->mother_title,
               'mother_fname'          => $key->mother_fname,
               'mother_mname'          => $key->mother_mname,
               'mother_lname'          => $key->mother_lname,
               'form_category'	       => $key->form_category,
               'email'                 => $key->email,
               'mobile'                => $key->mobile,
               'agent_id'              => $agent_id,
               'status'                => '0'
            );
            $result = $this->Model->insert($data,'pan_application');
            if($result) {
                $lastId[] = $this->db->insert_id();
            }
        }

        $unique_number1 = mt_rand(100,999);
        $unique_number2 = mt_rand(10,99);
        $Reference_number  = $unique_number1.'PAN'.$unique_number2.$result;

        $wherepanid = array(
           'application_id' => $result
        );
        $Reference = array(
          'unique_reference' => $Reference_number
        );
        $show_status = $this->Model->update('pan_application',$Reference,$wherepanid);

        $payment = array(
            'application_id'		 => $result,
            'agent_id'               => $agent_id,
            'charge'                 => $form_amount,
            'convencing_charge'      => $convencing_charge,
            'category_1'             => $category_1,
            'category_2'             => $category_2,
            'category_3'             => $category_3,
            'type'                   => 'pan',
            'total_charge'           => $total_charge,
        );
        $charges = $this->Model->insert($payment,'application_charge');
        $pan_id = implode(',', $lastId);

        $total_form_amount       = $form_amount + $convencing_charge ;
        //$total_convencing_charge = $convencing_charge * $form_count;
        $calculate_amount        = $total_form_amount;

        $payment = array(
            'agent_id'   => $agent_id,
            'order_id'   => $pan_id,
            'amount'     => $calculate_amount,
            'order_type' => 'PAN',
            'comment'    => $comment
        );
        $this->Model->insert($payment,'payment');
        $title   = 'New PAN Application';
        $type    = 'PAN';
        $message = 'Agent apply for PAN application.'; 
        $this->Notification($type, $title, $message);
        
        if ($result) {
        	// $msg = 'Dear '.$key->applicant_fname.' Congrats ! You have successfully applied for New PAN through EZYPAN GATEWAY.  Your Reference Number is '.$Reference_number;
         //    $sendSMS = $this->messageSend($msg, $key->mobile);
         //    if (!empty($sendSMS)) {
         //      	$data_result['result'] = 'true';
         //        $data_result['msg'] = "Message send to your mobile number";   
         //    }else{
         //     $data_result['result'] = 'false';
         //     $data_result['msg'] = "Message can not be send to your mobile number";
              
         //    }
            // $to = $key->email; 
            // $subject = 'Pan Application - EZYPANGATEWAY';
            // $headers = "From: " . strip_tags('noreply@jainbandhutrust.com') . "\r\n";
            // $headers .= "MIME-Version: 1.0\r\n";
            // $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            // $message='';
            // $message .= '<!DOCTYPE html>
            //      <html>
            //        <head></head>
            //      <body style=" margin: 0 auto;">
            //      <div class="wrapper" style="width:100%;" >
            //        <header style="width: 100%; float: left; background-color: #061a42; clear: left; text-align: center;">                     
            //             <span style="padding: 10px;font-size: 40px;color: white;">EZYPAN </span>                       
            //          </header>
            //          <section>
            //            <div class="container" style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
            //              <div class="section">                   
            //                <p style="font-size:22px;">Dear '.$key->applicant_fname.',</p>
            //                <p>Your pan application submit succesfully.</p>
            //                <p>Your Reference Number is : '.$Reference_number.'</p>
                          
            //               <p>For further process and detailed information please visit us at B-1, BCM City, Navlakha, Indore (M.P.) or contact 0731- 4278691.</p>
            //               <p><b> Note:</b>  This is a system generated e-mail, please do not reply to it. </p>

            //               <p><b>* This message is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged information. *</b></p>
            //                <p style="float:left; margin-right:10px;">Thanks</p>
            //              </div>
            //            </div>
            //          </section>
            //      <footer style="  color: white; background-color: black; height: auto; width: 100%; float: left;">
            //      <div class="container"  style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
            //        <div class="main-box" style=" width: 100%;">
            //          </div>
            //      </footer>
            //      </div>
            //      </body>
            //      </html>';
              
            //    if(mail($to, $subject, $message, $headers)){
            //        $data_result['result']    = 'true';
            //        $data_result['msg']       = 'Your pan application submit succesfully';
            //    }else{
            //        $data_result['result']   = 'false';
            //        $data_result['msg']      = "Email not send.";
            //    }
            $data_result['result']             = 'true';
            $data_result['reference_id']       = $result;
            $data_result['reference_number']   = $Reference_number;
            $data_result['msg']            = 'Your pan application submit succesfully';
        }else{
            $data_result['result']        = 'false';
            $data_result['msg']           = "Application can't create";
        }
        echo json_encode($data_result);
    }


    /******* API APPLY FOR PAN APPLICATION ********/
    public function applyForPAN1() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $agent_id           = $val->agent_id;
        $mobile             = $val->mobile;
        $form_amount        = $val->form_amount;
        $convencing_charge  = $val->convencing_charge;   
        $comment            = $val->comment;
        $category_1         = $val->category_1; 
        $category_2         = $val->category_2;                   
        $category_3         = $val->category_3; 
        $total_charge       = $val->total_charge;
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
			 $data = array(
	           'agent_id'              => $val->agent_id,
               'agent_code'            => $val->agent_code,
	           'aadhar_front'          => $val->aadhar_front,
	           'aadhar_back'           => $val->aadhar_back,
	           'pan_form_front'        => $val->pan_form_front,
	           'pan_form_back'         => $val->pan_form_front, 
	           'others_front'          => $val->others_front,
	           'others_back'           => $val->others_back,
	           'signature'             => $val->signature,
	           'pan_number'            => $val->pan_number,
	           'user_image'            => $val->image,
	           'applicant_fname'       => $val->applicant_fname,
	           'applicant_mname'       => $val->applicant_mname,
	           'applicant_lname'       => $val->applicant_lname,
	           'father_fname'          => $val->father_fname,
	           'father_mname'          => $val->father_mname,
	           'father_lname'          => $val->father_lname,
	           'father_title'          => $val->father_title,
	           'title'                 => $val->title,
	           'mother_title'          => $val->mother_title,
	           'mother_fname'          => $val->mother_fname,
	           'mother_mname'          => $val->mother_mname,
	           'mother_lname'          => $val->mother_lname,
	           'form_category'         => $val->form_category,
	           'email'                 => $val->email,
	           'mobile'                => $val->mobile,
	           'status'                => '0',
               'apply_by'              => 'APP'
	        );
	        $result = $this->Model->insert($data,'pan_application');
	        if($result) {
	            $lastId[] = $this->db->insert_id();
	        }
	        $unique_number1 = mt_rand(100,999);
	        $unique_number2 = mt_rand(10,99);
	        $Reference_number  = $unique_number1.'PAN'.$unique_number2.$result;

	        $wherepanid = array(
	           'application_id' => $result
	        );
	        $Reference = array(
	          'unique_reference' => $Reference_number
	        );
	        $show_status = $this->Model->update('pan_application',$Reference,$wherepanid);

	        $payment = array(
	            'application_id'         => $result,
	            'agent_id'               => $agent_id,
	            'charge'                 => $form_amount,
	            'convencing_charge'      => $convencing_charge,
	            'category_1'             => $category_1,
	            'category_2'             => $category_2,
	            'category_3'             => $category_3,
	            'type'                   => 'pan',
	            'total_charge'           => $total_charge,
	        );
	        $charges = $this->Model->insert($payment,'application_charge');
	        $pan_id = implode(',', $lastId);

	        $total_form_amount       = $form_amount + $convencing_charge ;
	        //$total_convencing_charge = $convencing_charge * $form_count;
	        $calculate_amount        = $total_form_amount;

	        $payment = array(
	            'agent_id'   => $agent_id,
	            'order_id'   => $pan_id,
	            'amount'     => $calculate_amount,
	            'order_type' => 'PAN',
	            'comment'    => $comment
	        );
	        $this->Model->insert($payment,'payment');
	        $title   = 'New PAN Application';
	        $type    = 'PAN';
	        $message = 'Agent apply for PAN application.'; 
	        $this->Notification($type, $title, $message);
	        
	        if ($result) {
	            // $msg = 'Dear '.$val->applicant_fname.' Congrats ! You have successfully applied for New PAN through EZYPAN GATEWAY.  Your Reference Number is '.$Reference_number;
	            // $sendSMS = $this->panMessageSend($msg, $mobile);
	            // if (!empty($sendSMS)) {
	            //     $data_result['result'] = 'true';
	            //     $data_result['msg'] = "Message send to your mobile number";   
	            // }else{
	            //  $data_result['result'] = 'false';
	            //  $data_result['msg'] = "Message can not be send to your mobile number";
	              
	            // }
	            // $to = $val->email; 
	            // $subject = 'Pan Application - EZYPANGATEWAY';
	            // $headers = "From: " . strip_tags('noreply@jainbandhutrust.com') . "\r\n";
	            // $headers .= "MIME-Version: 1.0\r\n";
	            // $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	            // $message='';
	            // $message .= '<!DOCTYPE html>
	            //      <html>
	            //        <head></head>
	            //      <body style=" margin: 0 auto;">
	            //      <div class="wrapper" style="width:100%;" >
	            //        <header style="width: 100%; float: left; background-color: #061a42; clear: left; text-align: center;">                     
	            //             <span style="padding: 10px;font-size: 40px;color: white;">EZYPAN </span>                       
	            //          </header>
	            //          <section>
	            //            <div class="container" style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
	            //              <div class="section">                   
	            //                <p style="font-size:22px;">Dear '.$val->applicant_fname.',</p>
	            //                <p>Your pan application submit succesfully.</p>
	            //                <p>Your Reference Number is : '.$Reference_number.'</p>
	                          
	            //               <p>For further process and detailed information please visit us at B-1, BCM City, Navlakha, Indore (M.P.) or contact 0731- 4278691.</p>
	            //               <p><b> Note:</b>  This is a system generated e-mail, please do not reply to it. </p>

	            //               <p><b>* This message is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged information. *</b></p>
	            //                <p style="float:left; margin-right:10px;">Thanks</p>
	            //              </div>
	            //            </div>
	            //          </section>
	            //      <footer style="  color: white; background-color: black; height: auto; width: 100%; float: left;">
	            //      <div class="container"  style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
	            //        <div class="main-box" style=" width: 100%;">
	            //          </div>
	            //      </footer>
	            //      </div>
	            //      </body>
	            //      </html>';
	              
	            //    if(mail($to, $subject, $message, $headers)){
	            //        $data_result['result']    = 'true';
	            //        $data_result['msg']       = 'Your pan application submit succesfully';
	            //    }else{
	            //        $data_result['result']   = 'false';
	            //        $data_result['msg']      = "Email not send.";
	            //    }
	            $data_result['result']             = 'true';
	            $data_result['reference_id']       = $result;
	            $data_result['reference_number']   = $Reference_number;
	            $data_result['msg']            = 'Your pan application submit succesfully';
	        }else{
	            $data_result['result']        = 'false';
	            $data_result['msg']           = "Application can't create";
	        }
		    }else{
		        $data_result['result'] = 'false';
		        $data_result['result'] = 'Invalid Token';
		    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}
        echo json_encode($data_result);
    }

	public function correctionForPAN() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $documents          = $val->documents;
		$pan_number         = $val->pan_number;
        $agent_id           = $val->agent_id;
        $agent_code         = $val->agent_code;
        $comment            = $val->comment;
        $form_amount        = $val->form_amount;
        $convencing_charge  = $val->convencing_charge;
        $category_1         = $val->category_1;
        $category_2         = $val->category_2;
        $category_3         = $val->category_3;
        $total_charge       = $val->total_charge;
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
				foreach ($documents as $key) {
			            $data = array(
			               'aadhar_front'          => $key->aadhar_front,
			               'aadhar_back'           => $key->aadhar_back,
			               'pan_form_front'        => $key->pan_form_front,
			               'pan_form_back'         => $key->pan_form_front, 
			               'others_front'          => $key->others_front,
			               'others_back'           => $key->others_back,
			               'signature'             => $key->signature,
			               'pan_number'            => $key->pan_number,
			               'user_image'            => $key->image,
			               'applicant_fname'       => $key->applicant_fname,
			               'applicant_mname'       => $key->applicant_mname,
			               'applicant_lname'       => $key->applicant_lname,
			               'father_fname'          => $key->father_fname,
			               'father_mname'          => $key->father_mname,
			               'father_lname'          => $key->father_lname,
			               'title'                 => $key->title,
			               'father_title'          => $key->father_title,
			               'mother_title'          => $key->mother_title,
			               'mother_fname'          => $key->mother_fname,
			               'mother_mname'          => $key->mother_mname,
			               'mother_lname'          => $key->mother_lname,
			               'form_category'         => $key->form_category,	
			               'email'                 => $key->email,
			               'mobile'                => $key->mobile,
			               'agent_id'              => $agent_id,
                           'agent_code'            => $agent_code,
			               'status'                => '0',
			               'correction_status'     => '1',
                           'apply_by'              => 'APP'
			            );
			            $result = $this->Model->insert($data,'pan_application');
			            if($result) {
			                $lastId[] = $this->db->insert_id();
			            }
			        }
			        $payment = array(
			            'application_id'          => $result,
			            'agent_id'                => $agent_id,
			            'charge'                  => $form_amount,
			            'convencing_charge'       => $convencing_charge,
			            'category_1'     		  => $category_1,
			            'category_2'     		  => $category_2,
			            'category_3'    	      => $category_3,
			            'type'                    => 'pan',
			            'total_charge'            => $total_charge,
			        );
			        $charges = $this->Model->insert($payment,'application_charge');
			        $pan_id = implode(',', $lastId);
			        $total_form_amount       = $form_amount + $convencing_charge ;
			        //$total_convencing_charge = $convencing_charge * $form_count;
			        $calculate_amount        = $total_form_amount;

			        $unique_number1 = mt_rand(100,999);
			        $unique_number2 = mt_rand(10,99);
			        $Reference_number  = $unique_number1.'PAN'.$unique_number2.$result;

			        $wherepanid = array(
			           'application_id' => $result
			        );
			        $Reference = array(
			          'unique_reference' => $Reference_number
			        );
			        $show_status = $this->Model->update('pan_application',$Reference,$wherepanid);
			        $payment = array(
			            'agent_id'   => $agent_id,
			            'order_id'   => $pan_id,
			            'amount'     => $calculate_amount,
			            'order_type' => 'PAN',
			            'comment'    => $comment
			        );
			        $this->Model->insert($payment,'payment');
			        $title   = 'New PAN Application';
			        $type    = 'PAN';
			        $message = 'Agent apply for PAN application.'; 
			        $this->Notification($type, $title, $message);
			        if ($result) {
			        	// $msg = 'Dear '.$key->applicant_fname.' Congrats ! You have successfully applied for New PAN through EZYPAN GATEWAY.  Your Reference Number is '.$result;
			         //    $sendSMS = $this->panMessageSend($msg, $key->mobile);
			         //    if (!empty($sendSMS)) {
			         //      	$data_result['result'] = 'true';
			         //        $data_result['msg'] = "Message send to your mobile number";   
			         //    }else{
			         //     $data_result['result'] = 'false';
			         //     $data_result['msg'] = "Message can not be send to your mobile number";
			              
			         //    }
			         //    $to = $key->email; 
			         //    $subject = 'Pan Application - EZYPANGATEWAY';
			         //    $headers = "From: " . strip_tags('noreply@jainbandhutrust.com') . "\r\n";
			         //    $headers .= "MIME-Version: 1.0\r\n";
			         //    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			         //    $message='';
			         //    $message .= '<!DOCTYPE html>
			         //         <html>
			         //           <head></head>
			         //         <body style=" margin: 0 auto;">
			         //         <div class="wrapper" style="width:100%;" >
			         //           <header style="width: 100%; float: left; background-color: #061a42; clear: left; text-align: center;">                     
			         //                <span style="padding: 10px;font-size: 40px;color: white;">EZYPAN </span>                       
			         //             </header>
			         //             <section>
			         //               <div class="container" style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
			         //                 <div class="section">                   
			         //                   <p style="font-size:22px;">Dear '.$key->applicant_fname.',</p>
			         //                   <p>Your pan application submit succesfully.</p>
			         //                   <p>Your Reference Number is : '.$Reference_number.'</p>
			                          
			         //                  <p>For further process and detailed information please visit us at B-1, BCM City, Navlakha, Indore (M.P.) or contact 0731- 4278691.</p>
			         //                  <p><b> Note:</b>  This is a system generated e-mail, please do not reply to it. </p>

			         //                  <p><b>* This message is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged information. *</b></p>
			         //                   <p style="float:left; margin-right:10px;">Thanks</p>
			         //                 </div>
			         //               </div>
			         //             </section>
			         //         <footer style="  color: white; background-color: black; height: auto; width: 100%; float: left;">
			         //         <div class="container"  style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
			         //           <div class="main-box" style=" width: 100%;">
			         //             </div>
			         //         </footer>
			         //         </div>
			         //         </body>
			         //         </html>';
			              
			         //       if(mail($to, $subject, $message, $headers)){
			         //           $data_result['result']    = 'true';
			         //           $data_result['msg']       = 'Your pan application submit succesfully';
			         //       }else{
			         //           $data_result['result']   = 'false';
			         //           $data_result['msg']      = "Email not send.";
			         //       }
			            $data_result['result']         = 'true';
			            $data_result['reference_id']   = $result;
			            $data_result['reference_number']   = $Reference_number;
			            $data_result['msg']            = 'Your pan application submit succesfully';
			        }else{
			            $data_result['result']        = 'false';
			            $data_result['msg']           = "Application can't submit";
			        }
					    }else{
		        $data_result['result'] = 'false';
		        $data_result['result'] = 'Invalid Token';
		    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}

        
        echo json_encode($data_result);
    }

    public function updareRejectPAN() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $documents          = $val->documents;
        $agent_id           = $val->agent_id;
        $form_amount        = $val->form_amount;
        $convencing_charge  = $val->convencing_charge;   
        $comment            = $val->comment;
        $category_1         = $val->category_1; 
        $category_2         = $val->category_2;                   
        $category_3         = $val->category_3; 
        $total_charge       = $val->total_charge;
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
					foreach ($documents as $key) {
		            $data = array(
		               'aadhar_front'          => $key->aadhar_front,
		               'aadhar_back'           => $key->aadhar_back,
		               'pan_form_front'        => $key->pan_form_front,
		               'pan_form_back'         => $key->pan_form_front, 
		               'others_front'          => $key->others_front,
		               'others_back'           => $key->others_back,
		               'signature'             => $key->signature,
		               'pan_number'            => $key->pan_number,
		               'user_image'            => $key->image,
		               'applicant_fname'       => $key->applicant_fname,
		               'applicant_mname'       => $key->applicant_mname,
		               'applicant_lname'       => $key->applicant_lname,
		               'father_fname'          => $key->father_fname,
		               'father_mname'          => $key->father_mname,
		               'father_lname'          => $key->father_lname,
		               'father_title'          => $key->father_title,
		               'title'                 => $key->title,
		               'mother_title'          => $key->mother_title,
		               'mother_fname'          => $key->mother_fname,
		               'mother_mname'          => $key->mother_mname,
		               'mother_lname'          => $key->mother_lname,
		               'form_category'         => $key->form_category,
		               'email'                 => $key->email,
		               'mobile'                => $key->mobile,
		               'agent_id'              => $agent_id,
		               'status'                => '0'
		            );
		            $where_agentId = array(
		               'agent_id' => $agent_id
		            );
		            $result = $this->Model->update('pan_application',$data,$where_agentId);
		            if($result) {
		                $lastId[] = $this->db->insert_id();
		            }
		        }
		       $payment = array(
		            'application_id'         => $result,
		            'agent_id'               => $agent_id,
		            'charge'                 => $form_amount,
		            'convencing_charge'      => $convencing_charge,
		            'category_1'             => $category_1,
		            'category_2'             => $category_2,
		            'category_3'             => $category_3,
		            'type'                   => 'pan',
		            'total_charge'           => $total_charge,
		        );
		        $charges = $this->Model->insert($payment,'application_charge');
		        $pan_id = implode(',', $lastId);

		        $total_form_amount       = $form_amount + $convencing_charge ;
		        //$total_convencing_charge = $convencing_charge * $form_count;
		        $calculate_amount        = $total_form_amount;

		        $payment = array(
		            'agent_id'   => $agent_id,
		            'order_id'   => $pan_id,
		            'amount'     => $calculate_amount,
		            'order_type' => 'PAN',
		            'comment'    => $comment
		        );
		        $this->Model->update('payment',$payment,$where_agentId);
		        $title   = 'New PAN Application';
		        $type    = 'PAN';
		        $message = 'Agent apply for PAN application.'; 
		        $this->Notification($type, $title, $message);
		        
		            $unique_number1 = mt_rand(100,999);
		        $unique_number2 = mt_rand(10,99);
		        $Reference_number  = $unique_number1.'PAN'.$unique_number2.$result;

		        $wherepanid = array(
		           'application_id' => $result
		        );
		        $Reference = array(
		          'unique_reference' => $Reference_number
		        );
		        $show_status = $this->Model->update('pan_application',$Reference,$wherepanid);
		        $payment = array(
		            'agent_id'   => $agent_id,
		            'order_id'   => $pan_id,
		            'amount'     => $calculate_amount,
		            'order_type' => 'PAN',
		            'comment'    => $comment
		        );
		        $this->Model->insert($payment,'payment');
		        $title   = 'New PAN Application';
		        $type    = 'PAN';
		        $message = 'Agent apply for PAN application.'; 
		        $this->Notification($type, $title, $message);
		        if ($result) {
		            // $msg = 'Dear '.$key->applicant_fname.' Congrats ! You have successfully applied for New PAN through EZYPAN GATEWAY.  Your Reference Number is '.$result;
		            // $sendSMS = $this->panMessageSend($msg, $key->mobile);
		            // if (!empty($sendSMS)) {
		            //     $data_result['result'] = 'true';
		            //     $data_result['msg'] = "Message send to your mobile number";   
		            // }else{
		            //  $data_result['result'] = 'false';
		            //  $data_result['msg'] = "Message can not be send to your mobile number";
		              
		            // }
		            // $to = $key->email; 
		            // $subject = 'Pan Application - EZYPANGATEWAY';
		            // $headers = "From: " . strip_tags('noreply@jainbandhutrust.com') . "\r\n";
		            // $headers .= "MIME-Version: 1.0\r\n";
		            // $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		            // $message='';
		            // $message .= '<!DOCTYPE html>
		            //      <html>
		            //        <head></head>
		            //      <body style=" margin: 0 auto;">
		            //      <div class="wrapper" style="width:100%;" >
		            //        <header style="width: 100%; float: left; background-color: #061a42; clear: left; text-align: center;">                     
		            //             <span style="padding: 10px;font-size: 40px;color: white;"> EZYPAN </span>                       
		            //          </header>
		            //          <section>
		            //            <div class="container" style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
		            //              <div class="section">                   
		            //                <p style="font-size:22px;">Dear '.$key->applicant_fname.',</p>
		            //                <p>Your pan application submit succesfully.</p>
		            //                <p>Your Reference Number is : '.$Reference_number.'</p>
		                          
		            //               <p>For further process and detailed information please visit us at B-1, BCM City, Navlakha, Indore (M.P.) or contact 0731- 4278691.</p>
		            //               <p><b> Note:</b>  This is a system generated e-mail, please do not reply to it. </p>

		            //               <p><b>* This message is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged information. *</b></p>
		            //                <p style="float:left; margin-right:10px;">Thanks</p>
		            //              </div>
		            //            </div>
		            //          </section>
		            //      <footer style="  color: white; background-color: black; height: auto; width: 100%; float: left;">
		            //      <div class="container"  style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
		            //        <div class="main-box" style=" width: 100%;">
		            //          </div>
		            //      </footer>
		            //      </div>
		            //      </body>
		            //      </html>';
		              
		            //    if(mail($to, $subject, $message, $headers)){
		            //        $data_result['result']    = 'true';
		            //        $data_result['msg']       = 'Your pan application submit succesfully';
		            //    }else{
		            //        $data_result['result']   = 'false';
		            //        $data_result['msg']      = "Email not send.";
		            //    }
		            $data_result['result']             = 'true';
		            //$data_result['reference_id']       = $result;
		            $data_result['reference_number']   = $Reference_number;
		            $data_result['msg']            = 'Your pan application submit succesfully';
		        }else{
		            $data_result['result']        = 'false';
		            $data_result['msg']           = "Application can't submit";
		        }	
		    }else{
		        $data_result['result'] = 'false';
		        $data_result['result'] = 'Invalid Token';
		    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}
        
        echo json_encode($data_result);
    }

    /******* API APPLY FOR ITR APPLICATION ********/
    public function applyForITR() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $documents          = $val->documents;
        $agent_id           = $val->agent_id;
        $agent_code         = $val->agent_code;
        $comment            = $val->comment;
        $itr_charge         = $val->itr_charge;
        $total_charge       = $val->total_charge;
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
		    	foreach ($documents as $key) {
	            $data = array(
	               'aadhar_front'          => $key->aadhar_front,
	               'aadhar_back'           => $key->aadhar_back,
	               'pan_card'              => $key->pan_card,
	               'bank_passbook'         => $key->bank_passbook,
	               'others_front'          => $key->others_front,
	               'others_back'           => $key->others_back,
				   'name'                  => $key->name,
				   'applicant_name'        => $key->applicant_name,
	               'email'                 => $key->email,
	               'mobile'                => $key->mobile,
	               'agent_id'              => $agent_id,
                   'agent_code'              => $agent_code,
	               'status'                => '0',
                   'apply_by'              => 'APP'
	            );
	            $result = $this->Model->insert($data,'itr_application');
	            if ($result) {
	                $lastId[] = $this->db->insert_id();
	            }
	        }
	        $unique_number1 = mt_rand(100,999);
	        $unique_number2 = mt_rand(10,99);
	        $ITRReference_number  = $unique_number1.'ITR'.$unique_number2.$result;
	        $wherepanid = array(
	          'itr_id' => $result
	        );
	        $Reference = array(
	             'unique_reference' => $ITRReference_number
	        );
	        $show_status = $this->Model->update('itr_application',$Reference,$wherepanid);

	        $payment = array(
	            'application_id'          => $result,
	            'agent_id'                => $agent_id,
	            'itr_charge'              => $itr_charge,
	            'type'                    => 'itr',
	            'total_charge'            => $total_charge
	        );
	        $charges = $this->Model->insert($payment,'application_charge');
	        $itr_id = implode(',', $lastId);
	        $calculate_amount        = $itr_charge;
	        $payment = array(
	            'agent_id'   => $agent_id,
	            'order_id'   => $itr_id,
	            'amount'     => $calculate_amount,
	            'order_type' => 'ITR',
	            'comment'    => $comment
	        );
	        $this->Model->insert($payment,'payment');
	        $paymentId = $this->db->insert_id();
	        $title   = 'New ITR Application';
	        $type    = 'ITR';
	        $message = 'Agent apply for ITR application.'; 
	        $this->Notification($type, $title, $message);
	        if ($result) {
	        	// $msg = 'Dear '.$key->applicant_name.' Congrats ! You have successfully applied for ITR .Your ITR documents are submitted, Our tax consultant wil call you in next 24 hours. Your Reference Number is '.$ITRReference_number;
	         //    $sendSMS = $this->panMessageSend($msg, $key->mobile);
	         //     if (!empty($sendSMS)) {
	         //      	$data_result['result'] = 'true';
	         //        $data_result['msg'] = "Message send to your mobile number";   
	         //    }else{
	         //     $data_result['result'] = 'false';
	         //     $data_result['msg'] = "Message can not be send to your mobile number";
	         //    }
	         //    $to = $key->email; 
	         //    $subject = 'ITR Application - EZYPANGATEWAY';
	         //    $headers = "From: " . strip_tags('noreply@jainbandhutrust.com') . "\r\n";
	         //    $headers .= "MIME-Version: 1.0\r\n";
	         //    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	         //    $message='';
	         //    $message .= '<!DOCTYPE html>
	         //         <html>
	         //           <head></head>
	         //         <body style=" margin: 0 auto;">
	         //         <div class="wrapper" style="width:100%;" >
	         //           <header style="width: 100%; float: left; background-color: #061a42; clear: left; text-align: center;">                     
	         //                <span style="padding: 10px;font-size: 40px;color: white;">EZYPAN </span>                       
	         //             </header>
	         //             <section>
	         //               <div class="container" style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
	         //                 <div class="section">                   
	         //                   <p style="font-size:22px;">Dear '.$key->applicant_name.',</p>
	         //                   <p>Your pan application submit succesfully.</p>
	         //                   <p>Your Reference Number is : '.$ITRReference_number.'</p>
	                          
	         //                  <p>For further process and detailed information please visit us at B-1, BCM City, Navlakha, Indore (M.P.) or contact 0731- 4278691.</p>
	         //                  <p><b> Note:</b>  This is a system generated e-mail, please do not reply to it. </p>

	         //                  <p><b>* This message is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged information. *</b></p>
	         //                   <p style="float:left; margin-right:10px;">Thanks</p>
	         //                 </div>
	         //               </div>
	         //             </section>
	         //         <footer style="  color: white; background-color: black; height: auto; width: 100%; float: left;">
	         //         <div class="container"  style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
	         //           <div class="main-box" style=" width: 100%;">
	         //             </div>
	         //         </footer>
	         //         </div>
	         //         </body>
	         //         </html>';
	              
	         //       if(mail($to, $subject, $message, $headers)){
	         //           $data_result['result']    = 'true';
	         //           $data_result['msg']       = 'Your ITR application submit succesfully';
	         //       }else{
	         //           $data_result['result']   = 'false';
	         //           $data_result['msg']      = "Email not send.";
	         //       }
	            $data_result['result']         = 'true';
	            $data_result['reference_id']   = $result;
	            $data_result['reference_number']   = $ITRReference_number;
	            $data_result['msg']            = 'Application create succesfully';
	                    
	        }else{
	            $data_result['result']        = 'false';
	            $data_result['msg']           = "Application can't create";
	        }
		    }else{
		        $data_result['result'] = 'false';
		        $data_result['result'] = 'Invalid Token';
		    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}
        
        echo json_encode($data_result);
    }


    public function updateRejectForITR() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $documents          = $val->documents;
        $agent_id           = $val->agent_id;
        $comment            = $val->comment;
        $form_amount        = $val->form_amount;
        $form_count         = $val->form_count;
        $convencing_charge  = $val->convencing_charge;
        $other_amount       = $val->other_amount;
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
					foreach ($documents as $key) {
		            $data = array(
		               'aadhar_front'          => $key->aadhar_front,
		               'aadhar_back'           => $key->aadhar_back,
		               'pan_card'              => $key->pan_card,
		               'bank_passbook'         => $key->bank_passbook,
		               'others_front'          => $key->others_front,
		               'others_back'           => $key->others_back,
		               'name'                  => $key->name,
		               'applicant_name'        => $key->applicant_name,
		               'email'                 => $key->email,
		               'mobile'                => $key->mobile,
		               'agent_id'              => $agent_id,
		               'status'                => '0'
		            );
		            $where_agentId = array(
		               'agent_id' => $agent_id
		            );
		            $result = $this->Model->update('itr_application',$data,$where_agentId);
		            if ($result) {
		                $lastId[] = $this->db->insert_id();
		            }
		        }
		        $itr_id = implode(',', $lastId);

		        $total_form_amount       = $form_amount * $form_count;
		        $total_convencing_charge = $convencing_charge * $form_count;
		        $calculate_amount        = $total_form_amount + $total_convencing_charge + $other_amount;

		        $payment = array(
		            'agent_id'   => $agent_id,
		            'order_id'   => $itr_id,
		            'amount'     => $calculate_amount,
		            'order_type' => 'ITR',
		            'comment'    => $comment
		        );

		        $this->Model->update('payment',$payment,$where_agentId);
		        $paymentId = $this->db->insert_id();
		        $unique_number1 = mt_rand(100,999);
		        $unique_number2 = mt_rand(10,99);
		        $ITRReference_number  = $unique_number1.'ITR'.$unique_number2.$result;
		        $wherepanid = array(
		          'itr_id' => $result
		        );
		        $Reference = array(
		             'unique_reference' => $ITRReference_number
		        );
		        $show_status = $this->Model->update('itr_application',$Reference,$wherepanid);
		        // $emails = $key->email;
		        // $payment_status = $this->PAYMENT($paymentId, $amount, $emails);
		        // print_r($payment_status);die;

		        $title   = 'New ITR Application';
		        $type    = 'ITR';
		        $message = 'Agent apply for ITR application.'; 
		        $this->Notification($type, $title, $message);
		        if ($result) {
		            // $msg = 'Dear '.$key->applicant_name.' Congrats ! You have successfully applied for ITR .Your ITR documents are submitted, Our tax consultant wil call you in next 24 hours. Your Reference Number is '.$ITRReference_number;
		            // $sendSMS = $this->panMessageSend($msg, $key->mobile);
		            //  if (!empty($sendSMS)) {
		            //     $data_result['result'] = 'true';
		            //     $data_result['msg'] = "Message send to your mobile number";   
		            // }else{
		            //  $data_result['result'] = 'false';
		            //  $data_result['msg'] = "Message can not be send to your mobile number";
		            // }
		            // $to = $key->email; 
		            // $subject = 'ITR Application - EZYPANGATEWAY';
		            // $headers = "From: " . strip_tags('noreply@jainbandhutrust.com') . "\r\n";
		            // $headers .= "MIME-Version: 1.0\r\n";
		            // $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		            // $message='';
		            // $message .= '<!DOCTYPE html>
		            //      <html>
		            //        <head></head>
		            //      <body style=" margin: 0 auto;">
		            //      <div class="wrapper" style="width:100%;" >
		            //        <header style="width: 100%; float: left; background-color: #061a42; clear: left; text-align: center;">                     
		            //             <span style="padding: 10px;font-size: 40px;color: white;">EZYPAN </span>                       
		            //          </header>
		            //          <section>
		            //            <div class="container" style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
		            //              <div class="section">                   
		            //                <p style="font-size:22px;">Dear '.$key->applicant_name.',</p>
		            //                <p>Your pan application submit succesfully.</p>
		            //                <p>Your Reference Number is : '.$ITRReference_number.'</p>
		                          
		            //               <p>For further process and detailed information please visit us at B-1, BCM City, Navlakha, Indore (M.P.) or contact 0731- 4278691.</p>
		            //               <p><b> Note:</b>  This is a system generated e-mail, please do not reply to it. </p>

		            //               <p><b>* This message is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged information. *</b></p>
		            //                <p style="float:left; margin-right:10px;">Thanks</p>
		            //              </div>
		            //            </div>
		            //          </section>
		            //      <footer style="  color: white; background-color: black; height: auto; width: 100%; float: left;">
		            //      <div class="container"  style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
		            //        <div class="main-box" style=" width: 100%;">
		            //          </div>
		            //      </footer>
		            //      </div>
		            //      </body>
		            //      </html>';
		              
		            //    if(mail($to, $subject, $message, $headers)){
		            //        $data_result['result']    = 'true';
		            //        $data_result['msg']       = 'Reject ITR  application submit succesfully';
		            //    }else{
		            //        $data_result['result']   = 'false';
		            //        $data_result['msg']      = "Email not send.";
		            //    }
		            $data_result['result']         = 'true';
		            //$data_result['reference_id']   = $result;
		            $data_result['reference_number']   = $ITRReference_number;
		            $data_result['msg']            = 'Reject ITR Application create succesfully';
		                    
		        }else{
		            $data_result['result']        = 'false';
		            $data_result['msg']           = "Application can't Update";
		        }
		    }else{
		        $data_result['result'] = 'false';
		        $data_result['result'] = 'Invalid Token';
		    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}
        
        echo json_encode($data_result);
    }


    /* Api for loanEnquiry */
    public function loanEnquiry() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $name 	        = $val->name;
        $email          = $val->email;
        $mobile         = $val->mobile;
        $company        = $val->company_name;
        $salary_in_hand = $val->salary_in_hand;
        $address        = $val->address;
        $pincode        = $val->pincode;
        $mobile         = $val->mobile;
        $loan_type      = $val->loan_type;
        $employee_type  = $val->employee_type;
        $message        = $val->message;
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
				$data = array(
		           'name'  		   => $name,
		           'email'  	   => $email,
		           'mobile' 	   => $mobile,
		           'company_name'  => $company,
		           'salary_in_hand'=> $salary_in_hand,
		           'address'       => $address,
		           'pincode'       => $pincode,
		           'loan_type'     => $loan_type,
		           'employee_type' => $employee_type,
		           'message'       => $message
		        );
		    	$result = $this->Model->insert($data,'loan_enquiry');
		        if ($result) {
		               $title = 'New Enquiry for Loan';
		               $type    = 'Loan'; 
		               $this->Notification($type, $title, $message); 
		               $data_result['result']    = 'true';
		               $data_result['msg']       = 'Query sent succesfully';     	
		        }else{
		            $data_result['result']        = 'false';
		            $data_result['msg']           = "Query not sent.";
		        }
		    }else{
		        $data_result['result'] = 'false';
		        $data_result['result'] = 'Invalid Token';
		    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}
    	
        echo json_encode($data_result);
    }


      /****** Api for Business Enquiry */
    public function businessEnquiry() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $name      = $val->name;
        $email     = $val->email;
        $mobile    = $val->mobile;
        $message   = $val->message;
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
				$data = array(
	               'name'      => $name,
	               'email'     => $email,
	               'mobile'    => $mobile,
	               'message'   => $message
	            );
	            $result = $this->Model->insert($data,'business_enquiry');
	            if ($result) {
	                   $title = 'New Enquiry for Business';
	                   $type    = 'Business'; 
	                   $this->Notification($type, $title, $message); 
	                   $data_result['result']    = 'true';
	                   $data_result['msg']       = 'Query sent succesfully';        
	            }else{
	                $data_result['result']        = 'false';
	                $data_result['msg']           = "Query not sent.";
	            }	
		    }else{
		        $data_result['result'] = 'false';
		        $data_result['result'] = 'Invalid Token';
		    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}      
            
        echo json_encode($data_result);
    }

    /* Api for list of Loan type */
    public function getLoanType() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
				$result = $this->Model->select('Loan_type');
		        if ($result) {
		               $data_result['result']    = 'true';
		               $data_result['data']      = $result;
		               $data_result['msg']       = 'List of loan type';
		        }else{
		            $data_result['result']        = 'false';
		            $data_result['msg']           = "data not found";
		        }
		    }else{
		        $data_result['result'] = 'false';
		        $data_result['result'] = 'Invalid Token';
		    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}
        
        echo json_encode($data_result);
    }

     public function getCategory() {
        $post = file_get_contents('php://input');
        $result = $this->Model->select('category');
                 if ($result) {
                   $data_result['result']    = 'true';
                   $data_result['data']      = $result;
                   $data_result['msg']       = 'List of category';
                }else{
                    $data_result['result']        = 'false';
                    $data_result['msg']           = "data not found";
                }
       
        echo json_encode($data_result);
    }


    /* Api for list of employee type*/
    public function getEmployeeType() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
				$result = $this->Model->select('employee_type');
		        if ($result) {
		               $data_result['result']    = 'true';
		               $data_result['data']      = $result;
		               $data_result['msg']       = 'List of employee type';
		        }else{
		            $data_result['result']        = 'false';
		            $data_result['msg']           = "data not found";
		        }
		    }else{
		        $data_result['result'] = 'false';
		        $data_result['result'] = 'Invalid Token';
		    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}
        
        echo json_encode($data_result);
    }

    /* Api for Agent History */
    public function agentHistory() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $agent_code    = $val->agent_code;
        $type          = $val->type;
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
				if ($type  == 'pan') {
	            $where_agent = array(
	               'agent_code' => $agent_code
	            ); 
	            $agent_data = $this->Model->selectdata('agent', $where_agent);
	            $agent_code = array();
	            if ($agent_data) {
	                $agent_code = $agent_data[0]['agent_code'];
	                $where = array(
	                   'agent_code' => $agent_code,
                       'payment_status' => 1,
	                );
	                $PAN_data = $this->Model->selectdata('pan_application', $where);
	                if ($PAN_data) {
	                       foreach($PAN_data as $key) {
	                            $time = $this->timeAgo($key['datetime']);
	                            $pan[] = array(
	                                'pan_application_id' => $key['application_id'], 
	                                'applicant_fname'      => $key['applicant_fname'].' '.$key['applicant_lname'],
	                                'applicant_mname'      => $key['applicant_mname'],
	                                'applicant_lname'      => $key['applicant_lname'],
	                                'reference_number'     => $key['unique_reference'], 
	                                'email'     => $key['email'],
	                                'mobile'    => $key['mobile'],
	                                'status'    => $key['status'],
	                                'date_time' => $time
	                            );    
	                       }       
	                }else{
	                    $pan        = [];
	                } 
	                    $data_result['result']   = 'true';
	                    $data_result['data']     = $pan;
	                    $data_result['msg']      = 'SJBT History';
	            }else{
	                    $data_result['result']   = 'false';
	                    $data_result['data']     = [];
	                    $data_result['msg']      = 'Data incorrect';  
	            }
	        }

	        if ($type  == 'itr') {
	            $where_agent = array(
	               'agent_code' => $agent_code
	            ); 
	            $agent_data = $this->Model->selectdata('agent', $where_agent);
	            if ($agent_data) {
	                $agent_code = $agent_data[0]['agent_code'];
	                $where = array(
	                   'agent_code' => $agent_code,
	                );
	                $ITR_data = $this->Model->selectdata('itr_application', $where);
	                if ($ITR_data) {
	                       foreach($ITR_data as $value) {
	                            $time_ago = $this->timeAgo($value['date_time']);
	                            $itr[] = array(
	                                'itr_application_id'  => $value['itr_id'], 
	                                'reference_number'     => $value['unique_reference'], 
	                                'name' => $value['name'],
	                                'email'               => $value['email'],
	                                'mobile'              => $value['mobile'],
	                                'status'              => $value['status'],
	                                'date_time'           => $time_ago
	                            );    
	                       }       
	                }else{
	                    $itr       = [];
	                }
	                $data_result['result']   = 'true';
	                $data_result['data']     = $itr;
	                $data_result['msg']      = 'SJBT History';
	            }else{
	                    $data_result['result']   = 'true';
	                    $data_result['data']     = [];
	                    $data_result['msg']      = 'Data incorrect';  
	            }
	        } 
		    }else{
		        $data_result['result'] = 'false';
		        $data_result['result'] = 'Invalid Token';
		    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}
               
        echo json_encode($data_result);
    }


    /****** API FOR SEARCH PAN REFERENCE NUMBER STATUS *******/
    public function searchPANreference() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $reference_number  = $val->reference_number;
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
			$where_agent = array('unique_reference' => $reference_number); 
	        $agent_data = $this->Model->selectdata('pan_application', $where_agent);
	        if ($agent_data) {
	            foreach($agent_data as $key) {
	            if ($key['status'] == 0) {
	               $status = 'Pending';
	               $pan[]= array(
	                    'status'   => $status
	               ); 
	            }
	            if ($key['status'] == 1) {
	               $status = 'Inprogress';
	               $pan[]= array(
	                    'status'   => $status
	               ); 
	            }
	            if ($key['status'] == 2) {
	                $status = 'Verify';
                    $where_agent = array('unique_reference' => $reference_number); 
                    $panData = $this->Model->singleRowdata($where_agent, 'pan_application');
                    $pan_application_id = $panData->application_id;
                    $pan_reference_id = array('reference_id' => $pan_application_id); 
                    $pan_reference_data=$this->Model->singleRowdata($pan_reference_id, 'acknowledgement');
	                $pan[]= array(
	                    'status'   => $status,
                        'acknowledgement_file' => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/Acknowledgement/'.$pan_reference_data->acknowledgement_file
	                );
	            }
	            if ($key['status'] == 3) {
	                $status = 'Reject';
	                 $rejectPan= $this->Model->SearchPAN($reference_number);
	                 if ($rejectPan) {
	                    foreach($rejectPan as $key1){
	                        $pan[]= array(
	                            'pan_application_id' => $key1['application_id'],
	                            'aadhar_front'       => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/aadhar_card/'.$key1['aadhar_front'],
	                            'aadhar_back'        => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/aadhar_card/'.$key1['aadhar_back'],
	                            'others_front'       => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/others_front/'.$key1['others_front'],
	                            'others_back'        => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/others_back/'.$key1['others_back'],
	                            'signature'          => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/signature/'.$key1['signature'],
	                            'user_image'         => $key1['user_image'],
	                            'pan_number'         => $key1['pan_number'],
	                            'applicant_title'     => $key1['title'],
	                            'applicant_name'      => $key1['applicant_fname'],
	                            'applicant_mname'     => $key1['applicant_mname'],
	                            'applicant_lname'     => $key1['applicant_lname'],
	                            'father_title'        => $key1['father_title'],
	                            'father_fname'        => $key1['father_fname'],
	                            'father_mname'        => $key1['father_mname'],
	                            'father_lname'         => $key1['father_lname'],
	                            'mother_title'        => $key1['mother_title'],
	                            'mother_fname'        => $key1['mother_fname'],
	                            'mother_mname'        => $key1['mother_mname'],
	                            'mother_lname'        => $key1['mother_lname'],
	                            'email'               => $key1['email'],
	                            'mobile'              => $key1['mobile'],
	                            'agent_id'            => $key1['agent_id'],
	                            'status'              => $status,
	                            'acknowledgement_reason'               => $key1['notes'],
	                            'reference_number'    => $key1['unique_reference'],
	                            'form_category'       => $key1['form_category'],
	                        );
	                    }
	                 }else{
	                    $data_result['result']   = 'false';
	                    $data_result['msg']      = 'data not found';
	                 }
	            } 
	            } 
	            $data_result['result']   = 'true';
	            $data_result['data']     = $pan;
	            $data_result['msg']      = 'List of PAN';      
		        }else{
		          $data_result['result']   = 'false';
		          $data_result['msg']      = 'data not found';
		        }	
			    }else{
			        $data_result['result'] = 'false';
			        $data_result['result'] = 'Invalid Token';
			    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}
        
        echo json_encode($data_result);
    }


    /****** API FOR SEARCH ITR REFERENCE NUMBER STATUS *******/
    public function searchITRreference() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $reference_number  = $val->reference_number;
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
					$where_agent = array(
            'unique_reference' => $reference_number,
        	); 
	        $results = $this->Model->selectdata('itr_application', $where_agent);
	        if ($results) {
	       	foreach($results as $key) {
	            if ($key['status'] == 0) {
	               $status = 'Pending';
	               $itr[]= array(
	                    'status'   => $status
	               );
	            }
	            if ($key['status'] == 1) {
	               $status = 'Inprogress';
	               $itr[]= array(
	                    'status'   => $status
	               );
	            }
	            if ($key['status'] == 2) {
	               $status = 'Verify';
                    $where_agent = array('unique_reference' => $reference_number); 
                    $panData = $this->Model->singleRowdata($where_agent, 'itr_application');
                    $itr_application_id = $panData->itr_id;
                    $itr_reference_id = array('reference_id' => $itr_application_id); 
                    $itr_reference_data=$this->Model->singleRowdata($itr_reference_id, 'acknowledgement');
                    $itr[]= array(
                        'status'   => $status,
                        'acknowledgement_file' => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/Acknowledgement/'.$itr_reference_data->acknowledgement_file
                    );	              
	            }
	            if ($key['status'] == 3) {
	                $status = 'Reject';
	                $rejectPan= $this->Model->SearchITR($reference_number); 
	                if ($rejectPan) {
	                    foreach($rejectPan as $key1){
	                        $itr []= array(
	                            'itr_application_id' => $key1['itr_id'],
	                            'aadhar_front'       => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/aadhar_card/'.$key1['aadhar_front'],
	                            'aadhar_back'        => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/aadhar_card/'.$key1['aadhar_back'],
	                            'others_front'       => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/others_front/'.$key1['others_front'],
	                            'others_back'        => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/others_back/'.$key1['others_back'],
	                            'pan_card'           => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/pan_card/'.$key1['pan_card'],
	                            'bank_passbook'      => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/bank_passbook/'.$key1['bank_passbook'],
	                            'name'               => $key1['name'],
	                            'applicant_name'     => $key1['applicant_name'],
	                            'email'              => $key1['email'],
	                            'mobile'             => $key1['mobile'],
	                            'agent_id'           => $key1['agent_id'],
	                            'status'             => $status,
	                            'acknowledgement_reason'              => $key1['notes'],
	                            'reference_number'              => $key1['unique_reference'],
	                        ); 
	                    }
	                 }else{
	                    $data_result['ersult']   = 'false';
	                    $data_result['msg']      = 'data not found';
	                 }
	            }
	               
	       	} 
		    $data_result['result']   = 'true';
		    $data_result['data']     = $itr;
		    $data_result['msg']      = 'List of ITR';      
	        }else{
	              $data_result['result']   = 'false';
	              $data_result['msg']      = 'data not found';
	        }	
		    }else{
		        $data_result['result'] = 'false';
		        $data_result['result'] = 'Invalid Token';
		    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}
        
        echo json_encode($data_result);
    } 

    public function AcknowledgementPDF(){
        $reference_id = $this->input->get('reference_id');
        $type         = $this->input->get('type');
        $data['details'] = array(
            'reference_id' => $reference_id, 
            'type'         => $type   
        );
        $this->load->view('acknowledgement',$data);
        $html = $this->output->get_output();
        // Load pdf library
        $this->load->library('pdf');
        $this->pdf->loadHtml($html);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->render();
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("html_contents.pdf", array("Attachment"=> 0));       
    }

    /* Api for add wallet amount */
    public function PAYMENT($payment_id, $amount , $email) {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        if (!empty($payment_id) && !empty($amount) && !empty($email)) {
               $data_result['result']    = 'true';
               $data_result['data']      = 'https://'.$_SERVER['SERVER_NAME'].'/PaytmKit/TxnTest.php?payment_id='.$payment_id.'&email='.$email.'&amount='.$amount;
        }else{
            $data_result['result']        = 'false';
            $data_result['msg']           = "data empty";
        }
        echo json_encode($data_result);
    }
    

    /* Api for add wallet amount */
    public function addWalletAmount() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $order_id = $val->order_id;
        $amount   = $val->amount;
        $email    = $val->email;
        if (!empty($order_id) && !empty($amount) && !empty($email)) {
               $data_result['result']    = 'true';
               $data_result['data']      = 'https://'.$_SERVER['SERVER_NAME'].'/PaytmKit/TxnTest.php?order_id='.$order_id.'&email='.$email.'&amount='.$amount;
        }else{
            $data_result['result']        = 'false';
            $data_result['msg']           = "data empty";
        }
        echo json_encode($data_result);
    }

    /* Api for list of gallery */
    public function gallery() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $type = $val->type;
        $wheredata = array('type'=>$type);
        $result = $this->Model->selectdata('gallery',$wheredata);        
        if ($result) {
            foreach ($result as $key) {
              $galleryData []= array(
                'id'          => $key['id'] ,
                'title'       => $key['title'],
                'description' => $key['description'],
                'image'       => 'https://'.$_SERVER['SERVER_NAME'].'/uploads/gallery/'.$key['image']
              );
            }
           $data_result['result']    = 'true';
           $data_result['data']      = $galleryData;
           $data_result['msg']       = 'List of Gallery Image';
        }else{
            $data_result['result']   = 'false';
            $data_result['msg']      = "data not found";
        }
        echo json_encode($data_result);
    }

    //notification
    public function Notification($type,$title,$message) {
        $data = array(
            'type'     => $type,
            'title'    => $title,
            'message'  => $message,
            'status'   => '1'
        );
        
        $notification = $this->Model->insert($data,'notification');
        if ($notification) {
           return $notification;
        }else{
            return 0;
        }        
    }

    public function timeAgo($time_ago)
    {
        $time_ago = strtotime($time_ago);
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            return "just now";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                return "one minute ago";
            }
            else{
                return "$minutes minutes ago";
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                return "an hour ago";
            }else{
                return "$hours hrs ago";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                return "yesterday";
            }else{
                return "$days days ago";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                return "a week ago";
            }else{
                return "$weeks weeks ago";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                return "a month ago";
            }else{
                return "$months months ago";
            }
        }
        //Years
        else{
            if($years==1){
                return "one year ago";
            }else{
                return "$years years ago";
            }
        }
    }

      /****** Api for Complain and Suggestions */
    public function complainAndSuggestions() {
        $post 		= file_get_contents('php://input');
        $val  		= json_decode($post);
        $user_id    = $val->user_id;
        $message   	= $val->message;
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
				$data = array(
		           'complained_by_id'		=>	$user_id,
		           'message'				=>	$message
	        	);
	            $result = $this->Model->insert($data,'complain_suggestions');
	            if ($result) {
	            	$complain_id = $this->db->insert_id();
	            	$wheredata   = array('complain_id'=>$complain_id);
	            	$resultData      = $this->Model->singleRowdata($wheredata,'complain_suggestions');
	                $data_result['result']	= 'true';
	                $data_result['data']	= $resultData;
	                $data_result['msg']     = "Complain and Suggestion registered successfully";
	            }else {
	                $data_result['result']  = 'false';
	                $data_result['data']    = "";
	                $data_result['msg']     = "Complain and Suggestion not registered";
	            }
		    }else{
		        $data_result['result'] = 'false';
		        $data_result['result'] = 'Invalid Token';
		    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}
	        
        echo json_encode($data_result);
    }

public function checkAuthAgent()
    {
        $post       = file_get_contents('php://input');
        $val        = json_decode($post);
        $agent_code    = $val->agent_code;
        $mobile        = $val->mobile;
        $headers = $this->input->request_headers();
		if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
		    if(isset($headers['Authoriz'])){
		        $token=$headers['Authoriz'];
		    }else{
		        $token=$headers['authoriz'];
		    }
		    $decodedToken = $this->decode_token($token);
		    if ($decodedToken != false) {	
				$where = array( 
		            'agent_code'   => $agent_code,
		            'mobile'       => $mobile,
		            'type'         => 'agent',
		            'verify_status'=> '1'
		        );
		        $result = $this->Model->singleRowdata($where, 'agent');
		        if ($result) {
		            $genrate_otp = mt_rand(100000,999999);
		            $data = array(
		                'otp' => $genrate_otp , 
		            );
		            $updateres = $this->Model->update('agent', $data, $where);
		            if ($updateres) {
		                $wheredata = array(
		                 'mobile'    => $mobile
		                );
		                $newResult= $this->Model->singleRowdata($wheredata,'agent');
		                $msg = "Your verification code is"." : ". $genrate_otp;
		                $sendSMS = $this->messageSend($msg, $mobile);
                        $agent_name     = $result->agent_name;
                        $agentDataEmail = $result->agent_email;
                        $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail,$agent_name);
                        
		                $data_result['result']    = 'true';
		                $data_result['otp']       = $newResult->otp;
		                $data_result['agent_id']  = $newResult->agent_id;
		                $data_result['msg']     = "OTP send to your mobile number";
		            }
		        }else{
		             $data_result['result']  = 'false';
		             $data_result['msg']     = "Incorrect Credential";
		        }
		    }else{
		        $data_result['result'] = 'false';
		        $data_result['result'] = 'Invalid Token';
		    }
		}else{
		    $data_result['result']   = 'false';
		    $data_result['msg']      = 'Invalid Token';
		}
        echo json_encode($data_result);

} 

public function checkAuthOtp() {
    $post = file_get_contents('php://input');
    $val  = json_decode($post);

    $headers = $this->input->request_headers();
	if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
	    if(isset($headers['Authoriz'])){
	        $token=$headers['Authoriz'];
	    }else{
	        $token=$headers['authoriz'];
	    }
	    $decodedToken = $this->decode_token($token);
	    if ($decodedToken != false) {	
			$wheredata = array(
		        'mobile'    => $val->mobile,
		        'otp'       => $val->otp
		    );
		    $result= $this->Model->singleRowdata($wheredata,'agent');
		    if($result){
		         $data_result['result']        = 'true';
		         $data_result['agent_id']      = $result->agent_id;
                 $data_result['agent_code']      = $result->agent_code;
		         $data_result['msg']           = 'Your OTP matched';
		    }else{
		        $data_result['result']        = 'false';
		        $data_result['msg']           = 'Sorry Your OTP Not matched';
		    }   
	    }else{
	        $data_result['result'] = 'false';
	        $data_result['result'] = 'Invalid Token';
	    }
	}else{
	    $data_result['result']   = 'false';
	    $data_result['msg']      = 'Invalid Token';
	}
    
    echo json_encode($data_result);
}


public function filter(){
    $post = file_get_contents('php://input');
    $val = json_decode($post);
    $headers    = $this->input->request_headers();
    $agent_code = $val->agent_code;
    $type       = $val->type;
    $history    = $val->history;
    $category1  = $val->category1;
    $category2  = $val->category2;
    $category3  = $val->category3;
    $headers = $this->input->request_headers();
	if ((array_key_exists('Authoriz', $headers) && !empty($headers['Authoriz'])) || (array_key_exists('authoriz', $headers) && !empty($headers['authoriz']))) {            
	    if(isset($headers['Authoriz'])){
	        $token=$headers['Authoriz'];
	    }else{
	        $token=$headers['authoriz'];
	    }
	    $decodedToken = $this->decode_token($token);
	    if ($decodedToken != false) {	
			$where = array('agent_code' => $agent_code);
		    $result = $this->Model->singleRowdata($where, 'agent');
		    if ($result) {
			    	if ($history == '' && $category1 == '' && $category2 == ''  && $category3 == '') {
			    		if ($type == 'PAN' && $agent_code) {
			    			$resultData = $this->db->query('SELECT * FROM pan_application WHERE agent_code ="'.$agent_code.'" ' )->result_array();
			    		}
			    	}

			    	if ($history == '' && $category1 == '' && $category2 == ''  && $category3 == '') {
			    		if ($type == 'ITR' && $agent_code) {
			    			$resultData = $this->db->query('SELECT * FROM itr_application WHERE agent_code ="'.$agent_code.'" ' )->result_array();
			    		}
			    	}

		            if ($type == 'PAN') {
			            /** SEARCH DATA FOR PAN ACCORDING TO CURRENT DAY **/
			            if ($history == 'Today') {
			                $currdate = date('Y-m-d');
			                $resultData = $this->db->query('SELECT * FROM pan_application WHERE agent_code ="'.$agent_code.'" AND datetime Like "%'.$currdate.'%"' )->result_array();
			            }
			            if ($history == 'Today' && $category1 == '40') {
			                $currdate = date('Y-m-d');
			                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime Like "%'.$currdate.'%" AND a.category_1 ="'.$category1.'" ' )->result_array();
			            }
			            if ($history == 'Today' && $category2 == '50') {
			                $currdate = date('Y-m-d');
			                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime Like "%'.$currdate.'%" AND a.category_2 ="'.$category2.'" ' )->result_array();
			            }
			            if ($history == 'Today' && $category3 == '100') {
			                $currdate = date('Y-m-d');
			                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime Like "%'.$currdate.'%" AND a.category_3 ="'.$category3.'" ' )->result_array();
			            }
			             /** END **/
			            /** SEARCH DATA FOR PAN ACCORDING TO WEEK **/
			            if ($history == 'Week') {
			                $currdate = date('Y-m-d H:i:s');
			                $week_last_day = date("Y-m-d H:i:s", strtotime("- 7 day"));
			                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'" ' )->result_array();
			            }
			            if ($history == 'Week' && $category1 == '40') {
			                $currdate = date('Y-m-d H:i:s');
			                $week_last_day = date("Y-m-d H:i:s", strtotime("- 7 day"));
			                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'" AND a.category_1 ="'.$category1.'" ' )->result_array();
			            }
			            if ($history == 'Week' && $category2 == '50') {
			                $currdate = date('Y-m-d H:i:s');
			                $week_last_day = date("Y-m-d H:i:s", strtotime("- 7 day"));
			                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'" AND a.category_2 ="'.$category2.'" ' )->result_array();
			            }
			            if ($history == 'Week' && $category3 == '100') {
			                $currdate = date('Y-m-d H:i:s');
			                $week_last_day = date("Y-m-d H:i:s", strtotime("- 7 day"));
			                 $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'" AND a.category_3 ="'.$category3.'" ' )->result_array();
			            }
			             /** END **/
			            /** SEARCH DATA FOR PAN ACCORDING TO MONTHLY DAY **/
			            if ($history == 'Monthly') {
			                $currdate = date('Y-m-d H:i:s');
			                $week_last_day = date("Y-m-d H:i:s", strtotime("- 30 day"));
			                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'" ' )->result_array();
			            }

			            if ($history == 'Monthly' && $category1 == '40') {
			                $currdate = date('Y-m-d H:i:s');
			                $week_last_day = date("Y-m-d H:i:s", strtotime("- 30 day"));
			                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'"  AND a.category_1 ="'.$category1.'" ' )->result_array();
			            }

			            if ($history == 'Monthly' && $category2 == '50') {
			                $currdate = date('Y-m-d H:i:s');
			                $week_last_day = date("Y-m-d H:i:s", strtotime("- 30 day"));
			               $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'"  AND a.category_2 ="'.$category2.'" ' )->result_array();
			            }


			            if ($history == 'Monthly' && $category3 == '100') {
			                $currdate = date('Y-m-d H:i:s');
			                $week_last_day = date("Y-m-d H:i:s", strtotime("- 30 day"));
			                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'"  AND a.category_3 ="'.$category3.'" ' )->result_array();
			            }

			            if($resultData){
			            foreach ($resultData as $key) {
			                $res_status = $this->checkStatus($key['status']);
			                $res_pay_status = $this->checkPaymentStatus($key['payment_status']);
			                    $data[] = array(
			                        'pan_application_id'   => $key['application_id'],
			                        'reference_number'     => $key['unique_reference'],  
			                        'applicant_name'       => $key['applicant_fname'].' '.$key['applicant_lname'], 
			                        'father_name'          => $key['father_fname'], 
			                        'mobile'               => $key['mobile'], 
			                        'status'               => $res_status, 
			                        'payment_status'       => $res_pay_status 
			                );
			            }
			            $data_result['result'] = 'true';
			            $data_result['data'] = $data;
			            $data_result['msg'] = 'SJBT PAN history found';
		            }else{
		                $data_result['result'] = 'false';
		                $data_result['msg'] = 'SJBT PAN history not found';
		            }            
		        }
		        if ($type == 'ITR') {
		            /** SEARCH DATA FOR PAN ACCORDING TO CURRENT DAY **/
		            if ($history == 'Today') {
		                $currdate = date('Y-m-d');
		                $resultData = $this->db->query('SELECT * FROM itr_application WHERE agent_code ="'.$agent_code.'" AND date_time Like "%'.$currdate.'%"' )->result_array();
		            }
		             /** END **/
		            /** SEARCH DATA FOR PAN ACCORDING TO WEEK **/
		            if ($history == 'Week') {
		                $currdate = date('Y-m-d H:i:s');
		                $week_last_day = date("Y-m-d H:i:s", strtotime("- 7 day"));
		                $resultData = $this->db->query('SELECT * FROM itr_application as i JOIN application_charge as a  ON i.itr_id = a.application_id  WHERE i.agent_code ="'.$agent_code.'"  AND a.type ="itr" AND i.date_time BETWEEN "'.$week_last_day.'" AND "'.$currdate.'" ' )->result_array();
		            }
		            /** END **/
		            /** SEARCH DATA FOR PAN ACCORDING TO MONTHLY DAY **/
		            if ($history == 'Monthly') {
		                $currdate = date('Y-m-d H:i:s');
		                $week_last_day = date("Y-m-d H:i:s", strtotime("- 30 day"));
		                $resultData = $this->db->query('SELECT * FROM itr_application as i JOIN application_charge as a  ON i.itr_id = a.application_id  WHERE i.agent_code ="'.$agent_code.'"  AND a.type ="itr" AND i.date_time BETWEEN "'.$week_last_day.'" AND "'.$currdate.'" ' )->result_array();
		            }
		            if($resultData){
		                foreach ($resultData as $key) {
		                    $res_status = $this->checkStatus($key['status']);
		                    $res_pay_status = $this->checkPaymentStatus($key['payment_status']);
		                    $data[] = array(
		                        'itr_application_id'   => $key['itr_id'], 
		                        'reference_number'     => $key['unique_reference'], 
		                        'applicant_name'       => $key['name'], 
		                        'mobile'               => $key['mobile'], 
		                        'status'               => $res_status, 
		                        'payment_status'       => $res_pay_status 
		                    );
		                    }  
		                    $data_result['result'] = 'true';
		                    $data_result['data'] = $data;
		                    $data_result['msg'] = 'SJBT ITR history found';
		                }else{
		                    $data_result['result'] = 'false';
		                    $data_result['msg'] = 'SJBT ITR history not found';
		                }               
		            }
		    }else{
		        $data_result['result'] = 'false';
		        $data_result['msg'] = 'SJBT not found.';
		    }	
	    }else{
	        $data_result['result'] = 'false';
	        $data_result['result'] = 'Invalid Token';
	    }
	}else{
	    $data_result['result']   = 'false';
	    $data_result['msg']      = 'Invalid Token';
	}
    
    echo json_encode($data_result);
}

public function checkStatus($status){
    if ($status == '0') {
        $getstatus = 'Pending';
    }elseif ($status == '1') {
        $getstatus = 'Inprogress ';
    }elseif ($status == '2') {
        $getstatus = 'Verified ';
    }elseif ($status == '3') {
        $getstatus = 'Reject';
    }else{
        $getstatus = 'Not Found';
    }
return $getstatus;
}

public function checkPaymentStatus($paystatus){
if ($paystatus == '0') {
    $getpaystatus = 'Pending';
}elseif ($paystatus == '1') {
    $getpaystatus = 'Success';
}elseif ($paystatus == '2') {
    $getpaystatus = 'Failed';
}else{
    $getpaystatus = 'Not Found';
}
return $getpaystatus;
}


public function demoSMS($msg, $mobile){
    $data_result = array();

    if($this->messageSend($msg,$mobile)) {
        $data_result['result']      = 'true';
    }else{
        $data_result['result']          = 'false';
    }
    echo json_encode($data_result);
}


public function sendOtpMail($otp, $email,$name){
    $data_result = array();
    $to = $email;

    $wheredata  = array('agent_email' => $email);
    $data = $this->Model->singleRowdata($wheredata, 'agent');

    $code = $data->agent_code;

    $subject = 'OTP  - EZYPANGATEWAY';
    $headers = "From: " . strip_tags('noreply@jainbandhutrust.com') . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $message='';
    $message .= '<!DOCTYPE html>
         <html>
           <head></head>
         <body style=" margin: 0 auto;">
         <div class="wrapper" style="width:100%;" >
           <header style="width: 100%; float: left; background-color: #061a42; clear: left; text-align: center;">                     
                <span style="padding: 10px;font-size: 40px;color: white;">EZYPAN </span>                       
             </header>
             <section>
               <div class="container" style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
                 <div class="section">  
                 <p style="font-size:20px;">Hi  <b>'.$name.'</b></p>                 
                   <p style="font-size:20px;"> SJBT CODE - <b>'.$code.'</b></p>
                   <p>Your One Time Password (OTP) is '.$otp.'</p>                  
                  <p>The password will expire in ten minutes if not used.</p>
                  <p>If you have not made this request, please contact our customer support immediately.</p>                  
                   <p style="float:left; margin-right:10px;">Thank You,</p>
                    
                    
                 </div>
                    <p style="float:left; margin-right:10px;">EZY PAN GATEWAY</p>
               </div>
               <p style="float:left; margin-right:10px;">+91-9691444803 | +91- 9691222122 | 0731 – 4278691 </p>
                 <div>
                    <p style="float:left; margin-right:10px;"> Email:- help@ezypangateway.com</p>
                 </div>   
             </section>
         <footer style="  color: white; background-color: black; height: auto; width: 100%; float: left;">
         <div class="container"  style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
           <div class="main-box" style=" width: 100%;">
             </div>
         </footer>
         </div>
         </body>
         </html>';
      
       if(mail($to, $subject, $message, $headers)){
           $data_result['result']    = 'true';
           $data_result['msg']       = 'Mail send successfully';
       }else{
           $data_result['result']   = 'false';
           $data_result['msg']      = "Email exist.";
       } 

       // if ($code == '') {
       //      $code = '';
       //      $subject = 'OTP  - EZYPANGATEWAY';
       //      $headers = "From: " . strip_tags('noreply@jainbandhutrust.com') . "\r\n";
       //      $headers .= "MIME-Version: 1.0\r\n";
       //      $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
       //      $message='';
       //      $message .= '<!DOCTYPE html>
       //           <html>
       //             <head></head>
       //           <body style=" margin: 0 auto;">
       //           <div class="wrapper" style="width:100%;" >
       //             <header style="width: 100%; float: left; background-color: #061a42; clear: left; text-align: center;">                     
       //                  <span style="padding: 10px;font-size: 40px;color: white;">EZYPAN </span>                       
       //               </header>
       //               <section>
       //                 <div class="container" style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
       //                   <div class="section">                   
       //                     <p style="font-size:22px;">Hi SJBT CODE <b>'.$code.'</b></p>
       //                     <p>Your One Time Password (OTP) is '.$otp.'</p>                  
       //                    <p>The password will expire in ten minutes if not used.</p>
       //                    <p>If you have not made this request, please contact our customer support immediately.</p>                  
       //                     <p style="float:left; margin-right:10px;">Thank You</p>
       //                     <p style="margin-right:10px;">EZY PAN GATEWAY</p>
       //                   </div>
       //                 </div>
       //               </section>
       //           <footer style="  color: white; background-color: black; height: auto; width: 100%; float: left;">
       //           <div class="container"  style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
       //             <div class="main-box" style=" width: 100%;">
       //               </div>
       //           </footer>
       //           </div>
       //           </body>
       //           </html>';
              
       //         if(mail($to, $subject, $message, $headers)){
       //             $data_result['result']    = 'true';
       //             $data_result['msg']       = 'Mail send successfully';
       //         }else{
       //             $data_result['result']   = 'false';
       //             $data_result['msg']      = "Email exist.";
       //         } 
       // }
}


public function panMessageSend($msg,$mobile){
    //Sender ID,While using route4 sender id should be 6 characters long.
    // $newmsg   = "Your OTP is ".$msg." Please enter the same to use your account. Keep this OTP to yourself for account safety. If you have not made this request then report us immediately at help@ezypangateway.com";
        $message = urlencode($msg);
        $mobileNo = $mobile;
        $senderId = 'ESYPAN';
        $auth_key = '300595Avqfaa0a5db19dd5';//'a67539ef7443137cb16e93e4efd9d3c';

        $url = "https://api.msg91.com/api/sendhttp.php?mobiles=$mobileNo&authkey=$auth_key&route=4&sender=$senderId&message=$message&country=91";

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          // echo "cURL Error #:" . $err;
           return false;
        } else {
          // echo $response;
           return true; 
        }
    // $message = urlencode($msg);
    // // $message = $msg;
    // $mobileNo = $mobile;

    // $senderId = 'ESYPAN';
    // $auth_key = 'a67539ef7443137cb16e93e4efd9d3c';

    // $curl = curl_init();
    // $url = "http://msg.smscluster.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=$auth_key&message=$message&senderId=$senderId&routeId=1&mobileNos=$mobileNo&smsContentType=english";
    // curl_setopt_array($curl, array(
    //     CURLOPT_URL => $url,
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "GET",
    //     CURLOPT_SSL_VERIFYHOST => 0,
    //     CURLOPT_SSL_VERIFYPEER => 0
    // ));
    

    // $response = curl_exec($curl);
    // $err = curl_error($curl);

    // curl_close($curl);

    // if ($err) {
    //   //echo "cURL Error #:" . $err;
    //  return false;
    // } else {
    //  return true;
    // }

} 


// public function otpResend()
// {
//     $post = file_get_contents('php://input');
//     $val  = json_decode($post);
//     $agent_code   = $val->agent_code;
//     $mobile       = $val->mobile;

//     // $agent_code = 'EZY@DEEP101019';
//     // $mobile = '8085116908';

//     $whereMobile = array(
//         'agent_code' => $agent_code,
//         'mobile' => $mobile
//     );
//     $genrate_otp = mt_rand(100000,999999);
//     $data_otp = array(
//         'otp' =>$genrate_otp
//     );
//     $update_info = $this->Model->update('agent', $data_otp, $whereMobile);
//     $agentResult = $this->Model->singleRowdata($whereMobile, 'agent');

//     // print_r($agentResult);die;
//     $agentDataEmail = $agentResult->agent_email;
//     $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail);
//     $sendSMS = $this->messageSend11($agent_code,$genrate_otp, $mobile);
//     if (!empty($sendSMS)) { 
//         $data_result['result'] = 'true';
//         $data_result['msg'] = $data_otp 
//     }else{
//         $data_result['result'] = 'false';
//         $data_result['msg'] = "error"
//     }
//     echo json_encode($data_result);

// }


public function getProfile(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        if ($val->agent_id) {
            $where = array('agent_id' => $val->agent_id);
            $fatchRes = $this->Model->singleRowdata($where,'agent');                  
                if ($fatchRes) {
                    $fatch_data = array(    
                       'agent_id'          => $fatchRes->agent_id,
                       'agent_name'        => $fatchRes->agent_name,
                       'agent_code'       => $fatchRes->agent_code,
                       'mobile'            => $fatchRes->mobile,
                       'address'         => $fatchRes->address,
                       'dob'         => $fatchRes->address
                    );
                    $data_result['result']   = 'true';
                    $data_result['data']     = $fatch_data;
                    $data_result['msg']      = "Get User information Successfully"; 
                }else{
                    $data_result['result']   = 'false';
                    $data_result['data']     = [];
                    $data_result['msg']      = "User doesn't exists"; 
                } 
        }else{
            $data_result['result']   = 'false';
            $data_result['msg']      = "Please enter valid user id ";
        }
        
                 
        echo json_encode($data_result);
    }


}

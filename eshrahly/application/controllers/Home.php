<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        if (!empty($_SESSION['role'])) {
             redirect('Login/dashboard');   
        }else{
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/index');
            $this->load->view('frontend/include/footer');
        }	

        // $this->load->view('frontend/include/header');
        // $this->load->view('frontend/index');
        // $this->load->view('frontend/include/footer');


        // if (!empty($_SESSION['login_id'])) {
        //     $this->load->view('frontend/include/header');
        //     $this->load->view('frontend/index');
        //     $this->load->view('frontend/include/footer');    
        // }else{
        // 	$this->load->view('frontend/include/header');
        //     $this->load->view('frontend/index');
        //     $this->load->view('frontend/include/footer');   
            // $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
            // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            // <strong> Alert ! </strong> Login First</div>');
            // redirect('Home/SjbtLogin');
        // }
        
    }


    public function SjbtRegister()
    {
        $this->load->view('frontend/auth/register');
    }


    public function createNewAgents(){        
        // if (!empty($_FILES['aadhar_card']['name'])) {
        //     $config['upload_path']   = 'uploads/agent_data';
        //     $config['allowed_types'] = 'img|jpg|jpeg|png|gif';
        //     $config['file_name']     = time().rand(10000,99999);
        //     $config['max_size']         = 50000;
        //     //Load upload library and initialize configuration
        //     $this->load->library('upload', $config);
        //     $this->upload->initialize($config);
            
        //     if ($this->upload->do_upload('aadhar_card')) {
        //         $uploadData = $this->upload->data();
        //         $aadhar_picture    = $uploadData['file_name'];
        //     } else {
        //         $aadhar_picture = '';
        //     }
        // }


        // if (!empty($_FILES['pan_card']['name'])) {
        //     $config['upload_path']   = 'uploads/agent_data';
        //     $config['allowed_types'] = 'img|jpg|jpeg|png|gif';
        //     $config['file_name']     = time().rand(10000,99999);
        //     $config['max_size']         = 50000;
        //     //Load upload library and initialize configuration
        //     $this->load->library('upload', $config);
        //     $this->upload->initialize($config);
            
        //     if ($this->upload->do_upload('pan_card')) {
        //         $uploadData = $this->upload->data();
        //         $pan_picture    = $uploadData['file_name'];
        //     } else {
        //         $pan_picture = '';
        //     }
        // }
                

        // if (!empty($_FILES['cancel_cheque']['name'])) {
        //     $config['upload_path']   = 'uploads/agent_data';
        //     $config['allowed_types'] = 'img|jpg|jpeg|png|gif';
        //     $config['file_name']     = time().rand(10000,99999);
        //     $config['max_size']         = 50000;
        //     //Load upload library and initialize configuration
        //     $this->load->library('upload', $config);
        //     $this->upload->initialize($config);
            
        //     if ($this->upload->do_upload('cancel_cheque')) {
        //         $uploadData = $this->upload->data();
        //         $cheque_picture    = $uploadData['file_name'];
        //     } else {
        //         $cheque_picture = '';
        //     }
        // }

        $full_name     =  $this->input->post('full_name');
        $father_name   =  $this->input->post('father_name');
        $agent_dob     =  $this->input->post('dob');
        $address       =  $this->input->post('address');
        $agent_email   =  $this->input->post('email');
        $agent_mobile  =  $this->input->post('mobile');
        // $aadhar_card   =  $aadhar_picture;
        // $pan_card      =  $pan_picture;
        // $cancel_cheque =  $cheque_picture;
        $terms         =  $this->input->post('terms');

        $whereAgentEmail = array('agent_email' => $agent_email);
        $fatchAgentData = $this->Model->singleRowdata($whereAgentEmail,'agent');

        $whereAgentMobile = array(
            'mobile' => $agent_mobile,
            'type' => 'agent'
        );
        $fatchAgentMobile = $this->Model->singleRowdata($whereAgentMobile,'agent');

        if (empty($fatchAgentData->agent_email)) {
            if (empty($fatchAgentMobile->mobile)) {
                    $dob1        = explode('-', $agent_dob);
                    $date0       = $dob1[0];
                    $shortdob    = mb_strtoupper(substr($date0,2,4));
                    $date1       = $dob1[1];
                    $date2       = $dob1[2];
                    $shortname   = mb_strtoupper(substr($full_name,0,4));
                    $agent_code  = 'EZY@'.$shortname.$date2.$date1.$shortdob;

                    $where_agnet_code = array('agent_code' => $agent_code );
                    $checkAgentCode   = $this->Model->record_count('agent', $where_agnet_code);
                    if ($checkAgentCode) {
                        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> Error ! </strong> Agent code already exists</div>');
                        redirect('Home/SjbtRegister');
                    }else{
                        $data = array(
                            'agent_name'    => $full_name,
                            'father_name'   => $father_name,
                            'agent_email'   => $agent_email, 
                            'mobile'        => $agent_mobile,
                            'dob'           => $agent_dob,
                            'address'       => $address,
                            'agent_code'    => $agent_code,
                            // 'aadhar_card'   => $aadhar_card,
                            // 'pan_card'      => $pan_card,
                            // 'cancel_cheque' => $cancel_cheque,
                            'terms'         => $terms,
                            'type'          => 'agent',
                        );
                        $result = $this->Model->insert($data,'agent');
                        //print_r($data);
                        if ($result) {                        
                            $wheredata = array(
                                'mobile' => $agent_mobile 
                            );
                            $genrate_otp = mt_rand(100000,999999);
                            $data_otp = array(
                                'otp' => $genrate_otp,
                                'otp_created_time' => date('Y-m-d H:i:s'),
                            );
                            $update_info = $this->Model->update('agent', $data_otp, $wheredata);
                            //print_r($update_info);die;
                            $sendSMS = $this->messageSend1($genrate_otp, $agent_mobile );
                            if (!empty($sendSMS)) {
                                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Alert!</strong> OTP send on your mobile please check </div>');

                                $agentDataEmail = $agent_email;
                                $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail);                       
                                redirect('Home/verify_otp?mobile='.urlencode(base64_encode($agent_mobile)));
                            }                        
                    }
            }
            }else{

                $where_delete = array('mobile' => $agent_mobile, 'otp_status' => '0');
                $delete_data = $this->Model->deleterec($where_delete,'agent');

                $whereAgentEmail = array('agent_email' => $agent_email);
                $fatchAgentData = $this->Model->singleRowdata($whereAgentEmail,'agent');

                if ($agent_email == $fatchAgentData->agent_email ) {
                    $delete_data = $this->Model->deleterec($whereAgentEmail,'agent');
                }

                if ($agent_email == $fatchAgentData->agent_email && $agent_mobile == $fatchAgentData->agent_mobile) {
                    $whereAgent = array(
                        'mobile' => $agent_mobile,
                        'otp_status' => '0',
                        'agent_email' => $agent_email
                    );
                    $delete_data = $this->Model->deleterec($whereAgentEmail,'agent');
                }
                
                $dob1        = explode('-', $agent_dob);
                $date0       = $dob1[0];
                $shortdob    = mb_strtoupper(substr($date0,2,4));
                $date1       = $dob1[1];
                $date2       = $dob1[2];
                $shortname   = mb_strtoupper(substr($full_name,0,4));
                $agent_code  = 'EZY@'.$shortname.$date2.$date1.$shortdob;

                $where_agnet_code = array('agent_code' => $agent_code );
                $checkAgentCode   = $this->Model->record_count('agent', $where_agnet_code);
                if ($checkAgentCode) {
                        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> Error ! </strong> Agent code already exists</div>');
                        redirect('Home/SjbtRegister');
                }else{
                        $data = array(
                            'agent_name'    => $full_name,
                            'father_name'   => $father_name,
                            'agent_email'   => $agent_email, 
                            'mobile'        => $agent_mobile,
                            'dob'           => $agent_dob,
                            'address'       => $address,
                            'agent_code'    => $agent_code,
                            // 'aadhar_card'   => $aadhar_card,
                            // 'pan_card'      => $pan_card,
                            // 'cancel_cheque' => $cancel_cheque,
                            'terms'         => $terms,
                            'type'          => 'agent',
                        );
                        $result = $this->Model->insert($data,'agent');
                        //print_r($data);
                        if ($result) {                        
                            $wheredata = array(
                                'mobile' => $agent_mobile 
                            );
                            $genrate_otp = mt_rand(100000,999999);
                            $data_otp = array(
                                'otp' => $genrate_otp,
                                'otp_created_time' => date('Y-m-d H:i:s'),
                            );
                            $update_info = $this->Model->update('agent', $data_otp, $wheredata);
                            //print_r($update_info);die;
                            $sendSMS = $this->messageSend1($genrate_otp, $agent_mobile );
                            if (!empty($sendSMS)) {
                                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Alert!</strong> OTP send on your mobile please check </div>');

                                $agentDataEmail = $agent_email;
                                $sendOtpMail = $this->htmlmail($genrate_otp, $agentDataEmail);                       
                                redirect('Home/verify_otp?mobile='.urlencode(base64_encode($agent_mobile)));
                            }                        
                    }
                }

                $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> Error ! </strong> Mobile number already exists</div>');
                redirect('Home/SjbtRegister');
            }
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong> Error ! </strong> Email Id already exists</div>');
            redirect('Home/SjbtRegister');
        }
    }

    public function SjbtLogin()
    {
        $this->load->view('frontend/auth/login');
    }

    public function checkLogin()
    {
        $agent_code = $this->input->post('agent_code');
        $mobile     = $this->input->post('mobile');
        $whereMob = array( 'agent_code' => $agent_code);
        $agentmobile = $this->Model->singleRowdata($whereMob, 'agent');
        if ($agentmobile->verify_status == '1') {
            $wheredata = array(
                'agent_code' => $agent_code,
                'mobile'     => $mobile,
            );
            $result = $this->Model->login($wheredata,'agent');
            //print_r($result);die;
            if (!empty($result)) {
                if($result->agent_code) {
                        $where = array(
                            'agent_code' => $result->agent_code, 
                            'mobile'     => $result->mobile, 
                        );
                        $genrate_otp = mt_rand(100000,999999);
                        $data = array(
                            'otp'              => $genrate_otp ,
                            'otp_created_time' => date('Y-m-d H:i:s'), 
                        );
                        $result1 =  $this->Model->update('agent', $data, $where);
                        if ($result1) {
                            /*** USE CURL HERE FOR SEND OTP ***/
                            $whereMobile = array(
                                'mobile'        => $mobile
                            );
                            $agentResult = $this->Model->singleRowdata($wheredata, 'agent');
                            $name = $agentResult->agent_name;
                            $code = $agentResult->agent_code;
                            $data_otp = array(
                                'otp' => $genrate_otp
                            );
                            $update_info = $this->Model->update('agent', $data_otp, $wheredata);
                            $agentDataEmail = $agentResult->agent_email;
                            $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail);
                            $sendSMS = $this->messageSend11($agent_code,$genrate_otp, $mobile);
                            if (!empty($sendSMS)) {                            	
                                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Alert!</strong> OTP send on your mobile please check </div>');
                                redirect('Home/otp?mobile='.urlencode(base64_encode($result->mobile)).'&sjbt_code='.urlencode(base64_encode($agent_code)));
                            }
                        }
                } else {
                    $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Incorrect Password.</div>');
                    redirect('Home/SjbtLogin');
                }
            }else{
                $userdata = array(
                    'agent_code'        => $agent_code,
                    'type'              => 'user',
                    'mobile'            => $mobile,
                    'verify_status'     => '1',
                );
                $user_result = $this->Model->insert($userdata,'agent');
                $wheredata = array(
                    'agent_code' => $agent_code,
                    'mobile'     => $mobile,
                );
                $result = $this->Model->login($wheredata,'agent');
                if (!empty($result)) {
                    if($result->agent_code) {
                        $where = array(
                            'agent_code' => $result->agent_code, 
                            'mobile'     => $result->mobile
                        );
                        $genrate_otp = mt_rand(100000,999999);
                        $data = array(
                            'otp' => $genrate_otp, 
                            'otp_created_time' => date('Y-m-d H:i:s'),
                        );
                        $result1 =  $this->Model->update('agent', $data, $where);
                        if ($result1) {
                            /*** USE CURL HERE FOR SEND OTP ***/
                            $data_otp = array(
                                'otp' => $genrate_otp
                            );
                            $update_info = $this->Model->update('agent', $data_otp, $wheredata);
                            $agentResult = $this->Model->singleRowdata($wheredata, 'agent');
                            $agentDataEmail = $agentResult->agent_email;
                            $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail);

                            $sendSMS = $this->messageSend1($genrate_otp, $mobile);
                            if (!empty($sendSMS)) {
                            $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Alert!</strong> OTP send on your mobile please check </div>');                            
                        	redirect('Home/otp?mobile='.urlencode(base64_encode($result->mobile)).'&sjbt_code='.urlencode(base64_encode($agent_code)));
                           }
                       }
                    } else {
                        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Incorrect Password.</div>');
                        redirect('Home/SjbtLogin');
                    }
                }
            }  
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Messsge: Your agent code is not activated. Please contact to Admin</div>');
            redirect('Home/SjbtLogin');
        }
    }


    public function otp()
    {
        $this->load->view('frontend/auth/otp');
    }

    public function verify_otp()
    {
        $this->load->view('frontend/auth/verify_otp');
    }


    public function mobileVerification()
    {
        $mobile = $this->input->post('mobile');
        $otp    = $this->input->post('otp');
        $wheredata = array(
            'mobile'    => $mobile,
            'otp'       => $otp,
        );
        $result = $this->Model->singleRowdata($wheredata,'agent');
        if (!empty($result)) {
            $agent_current_otp = $result->otp;
            if ($agent_current_otp == $otp) {
                $data = array(
                    'otp_status' => '1', 
                );
                $result1 =  $this->Model->update('agent', $data, $wheredata);
                if ($result1) {
                    $whereMobile = array(
                        'mobile'        => $mobile
                    );
                    $agentResult = $this->Model->singleRowdata($wheredata, 'agent');
                    $name = $agentResult->agent_name;
                    $code = $agentResult->agent_code;
                    $dob1       = explode('-', $agentResult->dob);
                    $date0      = $dob1[0];
                    $shortdob  = mb_strtoupper(substr($date0,2,4));
			        $date1      = $dob1[1];
			        $date2      = $dob1[2];
				    $shortname   = mb_strtoupper(substr($name,0,4));
			        $agent_code  = 'EZY@'.$shortname.$date2.$date1.$shortdob;
                    $data_otp = array(
                        'agent_code' => $agent_code 
                    );
                    $update_info = $this->Model->update('agent', $data_otp, $whereMobile);
                    if ($update_info) {
                        $sendSMS = $this->registermessageSend($agent_code, $mobile,$name);
                        if (!empty($sendSMS)) {
                        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Alert!</strong> Registered as a agent successfully And agent code send to your mobile number</div>');
                        }
                    }
                    $to = $agentResult->agent_email;
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
                                <span style="padding: 10px;font-size: 40px;color: white;"> EZYPAN </span>                       
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
                           $data_result['result']    = 'true';
                           $data_result['msg']       = 'Mail send successfully';
                       }else{
                           $data_result['result']   = 'false';
                           $data_result['msg']      = "Emailexist.";
                       }
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> You are registered as a agent successfully And agent code send to your mobile number please check and login  </div>');
                    redirect('Home/SjbtLogin');
                }
            }else{
                $this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissable" style="margin:0px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry!</strong>otp does not match</div>');
                redirect('Home/otp?mobile='.urlencode(base64_encode($result->mobile)));
            }
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry!</strong> otp does not match.</div>');
            redirect('Home/otp?mobile='.urlencode(base64_encode($result->mobile)));
        }
    }

    public function otpVarification()
    {
        $mobile = $this->input->post('mobile');
        $otp    = $this->input->post('otp');
        $wheredata = array(
             'mobile'    => $mobile,
             'otp'       => $otp,
            //'otp_created_time'   =>  date('Y-m-d H:i:s', strtotime("+2 min"))
        );
        $result= $this->Model->singleRowdata($wheredata,'agent');
        //print_r($result->otp_created_time);die;
        if($result){
            $otp_createdAt = $result->otp_created_time;
            $current_date_time     = date('Y-m-d H:i:s');
            $newTime_otp_createdAt = date("Y-m-d H:i:s",strtotime($otp_createdAt." +1 minutes"));

            if ($newTime_otp_createdAt < $current_date_time) {
               // echo "Your otp has been expired";
                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry!</strong> otp Your OTP was expired.</div>');

                 redirect('Home/otp?mobile='.urlencode(base64_encode($mobile)).'&sjbt_code='.urlencode(base64_encode($result->agent_code)) ,'refresh');
                //redirect('Home/SjbtLogin');
            }else{

                //print('run');die;
                $this->session->set_userdata('LoggedIn', true);
                $this->session->set_userdata('login_id', $result->agent_id);
                $this->session->set_userdata('agent_name', $result->agent_name);
                $this->session->set_userdata('agent_email', $result->agent_email);
                $this->session->set_userdata('agent_mobile', $result->mobile);
                $this->session->set_userdata('agent_code', $result->agent_code);
                $this->session->set_userdata('type', $result->type);

                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;width: 60;font-size: 18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Welcome To EZY PAN .
                </div>');
                redirect('Home/index'); 
            } 
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry!</strong> otp does not match.
            </div>');
             redirect('Home/otp?mobile='.urlencode(base64_encode($mobile)).'&sjbt_code='.urlencode(base64_encode($result->agent_code)) ,'refresh');
        }
        // // // $wheredata = array(
        // //     'mobile'    => $mobile,
        // //     'otp'       => $otp,
        // //     'otp_created_time'   =>  date('Y-m-d H:i:s', strtotime("+2 min"))
        // // );
        // $time = date('Y-m-d H:i:s', strtotime("+2 min")); 

        // $result  = $this->db->query('SELECT * FROM `agent` WHERE `mobile` = "'.$mobile.'" AND `otp` = "'.$otp.'" AND `otp_created_time` <= "'.$time.'" ')->result(); 

        // //print_r($fatchData);die;
        
        // //$result = $this->Model->singleRowdata($wheredata,'agent');
        // if (!empty($result)) {
        //     $this->session->set_userdata('LoggedIn', true);
        //     $this->session->set_userdata('login_id', $result->agent_id);
        //     $this->session->set_userdata('agent_name', $result->agent_name);
        //     $this->session->set_userdata('agent_email', $result->agent_email);
        //     $this->session->set_userdata('agent_mobile', $result->mobile);
        //     $this->session->set_userdata('agent_code', $result->agent_code);
        //     $this->session->set_userdata('type', $result->type);

        //     $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;width: 60;font-size: 18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        //     <strong>Success!</strong> Welcome To EZY PAN .
        //     </div>');
        //     redirect('Home/index'); 
        // } else {
        //     $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        //     <strong>Sorry!</strong> otp does not match.
        //     </div>');
        //     redirect('Home/SjbtLogin');
        // }
    }

    public function logout()
    {  
        $this->session->userdata('LoggedIn');
        session_destroy();
        redirect('Home');
    }


    


    public function messageSend1($msg,$mobile){

        //Sender ID,While using route4 sender id should be 6 characters long.

        $newmsg   = "Your OTP is ".$msg." Please enter the same to use your account. Keep this OTP to yourself for account safety. If you have not made this request then report us immediately at help@ezypangateway.com";


        $message = urlencode($newmsg);
        $mobileNo = $mobile;
        $senderId = 'ESYPAN';
        $auth_key = '300595Avqfaa0a5db19dd5';//'a67539ef7443137cb16e93e4efd9d3c';

        // $curl = curl_init();
        // $url = "https://api.msg91.com/api/sendhttp.php?mobiles='".$mobileNo."'&authkey='".$auth_key."'&route=4&sender='".$senderId."'&message='".$message."'&country=91"; //"http://msg.smscluster.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY='".$auth_key."'&message=this is for test&senderId='".$senderId."'&routeId=1&mobileNos=7987735353&smsContentType=english";//"http://msg.smscluster.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=$auth_key&message=$message&senderId=$senderId&routeId=1&mobileNos=$mobileNo&smsContentType=english";
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
        // print_r($response);
        // if ($err) {
        //   //echo "cURL Error #:" . $err;
        //  return false;
        // } else {
        //  return true;
        // }


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

    } 



    public function registermessageSend($agent_code,$mobile,$name){
        //$pan = 'EZY%2540MAYA';
        $msgmobile = "Dear $name, Congratulations! You have been registered successfully with ezypangateway! Your user ID is $agent_code. For further process and detailed information please visit us at B-1, BCM City, Navlakha, Indore (M.P.) or contact 0731- 4278691.";


        $message = urlencode($msgmobile);
        $mobileNo = $mobile;
        $senderId = 'ESYPAN';
        $auth_key = '300595Avqfaa0a5db19dd5';//'a67539ef7443137cb16e93e4efd9d3c';

        $url = "https://api.msg91.com/api/sendhttp.php?mobiles=$mobileNo&authkey=$auth_key&route=4&sender=$senderId&message=$message&country=91&unicode=1";

        //$url = "https://api.msg91.com/api/sendhttp.php?mobiles=918827677786&authkey=300595Avqfaa0a5db19dd5&route=4&sender=TESTIN&message=Dear%20mayank,%20Congratulations!%20You%20have%20been%20registered%20successfully%20with%20ezypangateway!%20Your%20user%20ID%20is%20EZY%2540MAYA120990.%20For%20further%20process%20and%20detailed%20information%20please%20visit%20u....)%20or%20contact%200731-%204278691.&country=91&unicode=1";


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
        // $message = urlencode($msgmobile);
        // $mobileNo = $mobile;

        // $senderId = 'ESYPAN';
        // $auth_key = '300595Avqfaa0a5db19dd5';

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


   


    public function FormDownload()
    {
        $this->load->view('frontend/include/header');
        $data['form_details'] = $this->Model->select('form');
        $this->load->view('frontend/form-download',$data);
        $this->load->view('frontend/include/footer');
    }



    public function MyHistory()
    {
        $this->load->view('frontend/include/header');    
        $this->load->view('frontend/my-history');
        $this->load->view('frontend/include/footer');
    }


    public function checkAuthAgent()
    {
        $agent_code = $this->input->post('agentcode');
        $mobile     = $this->input->post('mobnumber');
     
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
                'otp_created_time' => date('Y-m-d H:i:s'), 
            );
            $updateres = $this->Model->update('agent', $data, $where);
            if ($updateres) {
                 $sendSMS = $this->messageSend1($genrate_otp, $mobile);
                 if (!empty($sendSMS)) {
                    $where = array( 
                        'agent_code'   => $agent_code,
                        'mobile'       => $mobile,
                        'type'         => 'agent',
                        'verify_status'=> '1'
                    );
                    $agentResult = $this->Model->singleRowdata($where, 'agent');
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;font-size: 18px;color: #428bca;background-color: #eeeeee;border-color: #314782;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Alert!</strong> OTP send on your mobile please check </div>');                                  
                    redirect('Home/VerifyAgentCode?mobile='.urlencode(base64_encode($agentResult->mobile)));
                 }

                 $agentDataEmail = $agentResult->agent_email;
                 $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail);
            }
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Please enter your registered mobile number to get OTP.</div>');
            redirect('Home/MyHistory');
        }

    } 


    public function VerifyAgentCode()
    {
        $this->load->view('frontend/include/header');    
        $this->load->view('frontend/otp_agent_history');
        $this->load->view('frontend/include/footer');
    }



    public function checkAuthOtp()
    {
        $mobile  = $this->input->post('mobnumber');
        $otp     = $this->input->post('otp');
     
        $where = array( 
            'mobile'   => $mobile,
            'otp'      => $otp
        );
        $result = $this->Model->singleRowdata($where, 'agent');
        if ($result) {
             $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Alert!</strong> You are verified. </div>');                                  
                redirect('Home/History?agent='.urlencode(base64_encode($result->agent_id)).'agent_code='.urlencode(base64_encode($result->agent_code)));
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    You are not authrized agent.</div>');
            redirect('Home/MyHistory');
        }

    } 


    public function History()
    {
        // print_r($_SESSION);die;
        $agent_id  = base64_decode($this->input->get('agent'));
        //$agent_code  = base64_decode($this->input->get('agent_code'));
        // $agent_code  = $this->input->get('agent_code');
        $where = array(
            //'agent_id' => $agent_id,
            'agent_code'  => $_SESSION['agent_code'],
            'payment_status' => '1'
        );
        $result_pan = $this->Model->selectdata('pan_application', $where,'application_id desc' );
        if ($result_pan) {
            foreach ($result_pan as $key) {
                $res_status = $this->checkStatus($key['status']);
                $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["application_id"].'" AND type = "PAN" ')->row();
                if (empty($ack)) {
                    $ack_notes = '';
                    $ack_file = '';
                }else{
                    $ack_notes = $ack->notes;
                    $ack_file  = $ack->acknowledgement_file;
                }

                $pandata[] = array(
                    'pan_application_id' => $key['application_id'],
                    'reference_number'   => $key['unique_reference'],
                    'title'              => $key['title'],
                    'applicant_name'     => $key['applicant_fname'],
                    'applicant_mname'    => $key['applicant_mname'],
                    'applicant_lname'    => $key['applicant_lname'],
                    'mobile'             => $key['mobile'],
                    'status'             => $res_status,
                    'payment_status'     => $res_pay_status,
                    'ack_notes'          => $ack_notes,
                    'ack_file'           => $ack_file    
                );

            }
        }
        if (!empty($pandata)) {
            $data['pandata'] = $pandata;
        }else{
            $data['pandata'] = [];
        }
        $result_itr = $this->Model->selectdata('itr_application', $where, 'itr_id desc');
        if ($result_itr) {
            foreach ($result_itr as $value) {
                $res_status = $this->checkStatus($value['status']);
                $res_pay_status = $this->checkPaymentStatus($value['payment_status']);

                $ack1 = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$value["itr_id"].'" AND type = "ITR"')->row();
                if (empty($ack1)) {
                    $ack_notes = '';
                    $ack_file = '';
                }else{
                    $ack_notes = $ack1->notes;
                    $ack_file  = $ack1->acknowledgement_file;
                }

                $itrdata[] = array(
                    'itr_application_id' => $value['itr_id'],
                    'reference_number'   => $value['unique_reference'],
                    'applicant_name'     => $value['name'],
                    'mobile'             => $value['mobile'],
                    'itr_status'         => $res_status,
                    'itr_payment_status' => $res_pay_status,
                    'ack_notes'          => $ack_notes,
                    'ack_file'           => $ack_file    
                );
            }
        }
        if (!empty($itrdata)) {
            $data['itrdata'] = $itrdata;
        }else{
            $data['itrdata'] = [];
        }
        
        $this->load->view('frontend/include/header');    
        $this->load->view('frontend/history', $data);
        $this->load->view('frontend/include/footer');
    }

    public function getPanHistoryAll()
    {      

        $search   = $this->input->get('search');
        $agent_id = $this->input->get('agent_id');
        $agent_code = $this->input->get('agent_code');
        $cat      = $this->input->get('cat');

        /*START TODAY*/
        if ($search == 'Today') {
            if($search == 'Today' && $cat == '' ){
             $currdate = date('Y-m-d');
             $resultData = $this->db->query('SELECT * FROM pan_application WHERE agent_code ="'.$agent_code.'" AND payment_status = 1  AND datetime Like "%'.$currdate.'%" ORDER BY  application_id DESC  ' )->result_array();
                 if ($resultData) {
                        foreach($resultData as $key) {
                            $res_status = $this->checkStatus($key['status']);
                            $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                            $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["application_id"].'" AND type = "PAN"')->row();
                            if (empty($ack)) {
                                $ack_notes = '';
                                $ack_file = '';
                            }else{
                                $ack_notes = $ack->notes;
                                $ack_file  = $ack->acknowledgement_file;
                            }
                            $data[] = array(
                                'pan_application_id' => $key['application_id'],
                                'reference_number'   => $key['unique_reference'],
                                'title'              => $key['title'],
                                'applicant_name'     => $key['applicant_fname'],
                                'applicant_mname'    => $key['applicant_mname'],
                                'applicant_lname'    => $key['applicant_lname'],
                                'mobile'             => $key['mobile'],
                                'status'             => $res_status,
                                'payment_status'     => $res_pay_status,
                                'ack_notes'          => $ack_notes,
                                'ack_file'           => $ack_file    
                            );
                        }
                        echo json_encode($data);
                    }
            } 

            if($search == 'Today' && $cat == '40'){
             $currdate = date('Y-m-d');
                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime Like "%'.$currdate.'%" AND a.category_1 ="'.$cat.'" AND p.payment_status = 1 ORDER BY p.application_id DESC ' )->result_array();
                
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                        $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["application_id"].'" AND type = "PAN"')->row();
                        if (empty($ack)) {
                            $ack_notes = '';
                            $ack_file = '';
                        }else{
                            $ack_notes = $ack->notes;
                            $ack_file  = $ack->acknowledgement_file;
                        }

                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'reference_number'   => $key['unique_reference'],
                            'title'              => $key['title'],
                            'applicant_name'     => $key['applicant_fname'],
                            'applicant_mname'    => $key['applicant_mname'],
                            'applicant_lname'    => $key['applicant_lname'],
                            'mobile'             => $key['mobile'],
                            'status'             => $res_status,
                            'payment_status'     => $res_pay_status,
                            'ack_notes'          => $ack_notes,
                            'ack_file'           => $ack_file    
                        );
                    }
                    echo json_encode($data);
                }
            }

            if($search == 'Today' && $cat == '50'){
             $currdate = date('Y-m-d');
                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime Like "%'.$currdate.'%" AND a.category_2 ="'.$cat.'" AND p.payment_status = 1  ORDER BY p.application_id DESC' )->result_array();
                
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                        $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["application_id"].'" AND type = "PAN"')->row();
                        if (empty($ack)) {
                            $ack_notes = '';
                            $ack_file = '';
                        }else{
                            $ack_notes = $ack->notes;
                            $ack_file  = $ack->acknowledgement_file;
                        }

                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'reference_number'   => $key['unique_reference'],
                            'title'              => $key['title'],
                            'applicant_name'     => $key['applicant_fname'],
                            'applicant_mname'    => $key['applicant_mname'],
                            'applicant_lname'    => $key['applicant_lname'],
                            'mobile'             => $key['mobile'],
                            'status'             => $res_status,
                            'payment_status'     => $res_pay_status,
                            'ack_notes'          => $ack_notes,
                            'ack_file'           => $ack_file    
                        );
                    }
                    echo json_encode($data);
                }
            }

            if($search == 'Today' && $cat == '100'){
             $currdate = date('Y-m-d');
                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime Like "%'.$currdate.'%" AND a.category_3 ="'.$cat.'" AND p.payment_status = 1  ORDER BY p.application_id DESC' )->result_array();
                
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                        $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["application_id"].'" AND type = "PAN"')->row();
                        if (empty($ack)) {
                            $ack_notes = '';
                            $ack_file = '';
                        }else{
                            $ack_notes = $ack->notes;
                            $ack_file  = $ack->acknowledgement_file;
                        }

                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'reference_number'   => $key['unique_reference'],
                            'title'              => $key['title'],
                            'applicant_name'     => $key['applicant_fname'],
                            'applicant_mname'    => $key['applicant_mname'],
                            'applicant_lname'    => $key['applicant_lname'],
                            'mobile'             => $key['mobile'],
                            'status'             => $res_status,
                            'payment_status'     => $res_pay_status,
                            'ack_notes'          => $ack_notes,
                            'ack_file'           => $ack_file    
                        );
                    }
                    echo json_encode($data);
                }
            }

        }

        /*END TODAY*/

        /*START WEEK*/
        if ($search == 'Week') {
            if($search == 'Week' && $cat == ''){
                $currdate = date('Y-m-d H:i:s');
                $week_last_day = date("Y-m-d H:i:s", strtotime("- 7 day"));
                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'" AND p.payment_status = 1  ORDER BY p.application_id DESC' )->result_array();
                    if ($resultData) {
                        foreach($resultData as $key) {
                            $res_status = $this->checkStatus($key['status']);
                            $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                            $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["application_id"].'" AND type = "PAN"')->row();
                            if (empty($ack)) {
                                $ack_notes = '';
                                $ack_file = '';
                            }else{
                                $ack_notes = $ack->notes;
                                $ack_file  = $ack->acknowledgement_file;
                            }
                            $data[] = array(
                                'pan_application_id' => $key['application_id'],
                                'reference_number'   => $key['unique_reference'],
                                'title'              => $key['title'],
                                'applicant_name'     => $key['applicant_fname'],
                                'applicant_mname'    => $key['applicant_mname'],
                                'applicant_lname'    => $key['applicant_lname'],
                                'mobile'             => $key['mobile'],
                                'status'             => $res_status,
                                'payment_status'     => $res_pay_status,
                                'ack_notes'          => $ack_notes,
                                'ack_file'           => $ack_file    
                            );
                        }
                        echo json_encode($data);
                    }
            } 

            if($search == 'Week' && $cat == '40'){
                $currdate = date('Y-m-d H:i:s');
                $week_last_day = date("Y-m-d H:i:s", strtotime("- 7 day"));
                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'" AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'" AND a.category_1 ="'.$cat.'" AND p.payment_status = 1  ORDER BY p.application_id DESC' )->result_array();            
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                        $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["application_id"].'" AND type = "PAN"')->row();
                        if (empty($ack)) {
                            $ack_notes = '';
                            $ack_file = '';
                        }else{
                            $ack_notes = $ack->notes;
                            $ack_file  = $ack->acknowledgement_file;
                        }

                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'reference_number'   => $key['unique_reference'],
                            'title'              => $key['title'],
                            'applicant_name'     => $key['applicant_fname'],
                            'applicant_mname'    => $key['applicant_mname'],
                            'applicant_lname'    => $key['applicant_lname'],
                            'mobile'             => $key['mobile'],
                            'status'             => $res_status,
                            'payment_status'     => $res_pay_status,
                            'ack_notes'          => $ack_notes,
                            'ack_file'           => $ack_file    
                        );
                    }
                    echo json_encode($data);
                }
            }

            if($search == 'Week' && $cat == '50'){
                $currdate = date('Y-m-d H:i:s');
                $week_last_day = date("Y-m-d H:i:s", strtotime("- 7 day"));
                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'" AND a.category_2 ="'.$cat.'" AND p.payment_status = 1  ORDER BY p.application_id DESC ' )->result_array();            
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                        $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["application_id"].'" AND type = "PAN"')->row();
                        if (empty($ack)) {
                            $ack_notes = '';
                            $ack_file = '';
                        }else{
                            $ack_notes = $ack->notes;
                            $ack_file  = $ack->acknowledgement_file;
                        }

                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'reference_number'   => $key['unique_reference'],
                            'title'              => $key['title'],
                            'applicant_name'     => $key['applicant_fname'],
                            'applicant_mname'    => $key['applicant_mname'],
                            'applicant_lname'    => $key['applicant_lname'],
                            'mobile'             => $key['mobile'],
                            'status'             => $res_status,
                            'payment_status'     => $res_pay_status,
                            'ack_notes'          => $ack_notes,
                            'ack_file'           => $ack_file    
                        );
                    }
                }
                    echo json_encode($data);
            }

            if($search == 'Week' && $cat == '100'){
                $currdate = date('Y-m-d H:i:s');
                $week_last_day = date("Y-m-d H:i:s", strtotime("- 7 day"));
                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'" AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'" AND a.category_3 ="'.$cat.'" AND p.payment_status = 1  ORDER BY p.application_id DESC' )->result_array();            
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                        $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["application_id"].'" AND type = "PAN"')->row();
                        if (empty($ack)) {
                            $ack_notes = '';
                            $ack_file = '';
                        }else{
                            $ack_notes = $ack->notes;
                            $ack_file  = $ack->acknowledgement_file;
                        }

                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'reference_number'   => $key['unique_reference'],
                            'title'              => $key['title'],
                            'applicant_name'     => $key['applicant_fname'],
                            'applicant_mname'    => $key['applicant_mname'],
                            'applicant_lname'    => $key['applicant_lname'],
                            'mobile'             => $key['mobile'],
                            'status'             => $res_status,
                            'payment_status'     => $res_pay_status,
                            'ack_notes'          => $ack_notes,
                            'ack_file'           => $ack_file    
                        );
                    }
                    echo json_encode($data);
                }
            }

        }
        /*END WEEK*/


        /*START MONTH*/
        if ($search == 'Monthly') {
            if($search == 'Monthly' && $cat == ''){
                $currdate = date('Y-m-d H:i:s');
                $week_last_day = date("Y-m-d H:i:s", strtotime("- 30 day"));
                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'" AND p.payment_status = 1  ORDER BY p.application_id DESC' )->result_array();
                    if ($resultData) {
                        foreach($resultData as $key) {
                            $res_status = $this->checkStatus($key['status']);
                            $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                            $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["application_id"].'" AND type = "PAN"')->row();
                            if (empty($ack)) {
                                $ack_notes = '';
                                $ack_file = '';
                            }else{
                                $ack_notes = $ack->notes;
                                $ack_file  = $ack->acknowledgement_file;
                            }
                            $data[] = array(
                                'pan_application_id' => $key['application_id'],
                                'reference_number'   => $key['unique_reference'],
                                'title'              => $key['title'],
                                'applicant_name'     => $key['applicant_fname'],
                                'applicant_mname'    => $key['applicant_mname'],
                                'applicant_lname'    => $key['applicant_lname'],
                                'mobile'             => $key['mobile'],
                                'status'             => $res_status,
                                'payment_status'     => $res_pay_status,
                                'ack_notes'          => $ack_notes,
                                'ack_file'           => $ack_file    
                            );
                        }
                        echo json_encode($data);
                    }
            } 

            if($search == 'Monthly' && $cat == '40'){
                $currdate = date('Y-m-d H:i:s');
                $week_last_day = date("Y-m-d H:i:s", strtotime("- 30 day"));
                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'"  AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'"  AND a.category_1 ="'.$cat.'" AND p.payment_status = 1  ORDER BY p.application_id DESC' )->result_array();           
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                        $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["application_id"].'" AND type = "PAN"')->row();
                        if (empty($ack)) {
                            $ack_notes = '';
                            $ack_file = '';
                        }else{
                            $ack_notes = $ack->notes;
                            $ack_file  = $ack->acknowledgement_file;
                        }

                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'reference_number'   => $key['unique_reference'],
                            'title'              => $key['title'],
                            'applicant_name'     => $key['applicant_fname'],
                            'applicant_mname'    => $key['applicant_mname'],
                            'applicant_lname'    => $key['applicant_lname'],
                            'mobile'             => $key['mobile'],
                            'status'             => $res_status,
                            'payment_status'     => $res_pay_status,
                            'ack_notes'          => $ack_notes,
                            'ack_file'           => $ack_file    
                        );
                    }
                    echo json_encode($data);
                }
            }

            if($search == 'Monthly' && $cat == '50'){
                $currdate = date('Y-m-d H:i:s');
                $week_last_day = date("Y-m-d H:i:s", strtotime("- 30 day"));
                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'" AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'"  AND a.category_2 ="'.$cat.'" AND p.payment_status = 1  ORDER BY p.application_id DESC' )->result_array();            
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                        $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["application_id"].'" AND type = "PAN"')->row();
                        if (empty($ack)) {
                            $ack_notes = '';
                            $ack_file = '';
                        }else{
                            $ack_notes = $ack->notes;
                            $ack_file  = $ack->acknowledgement_file;
                        }

                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'reference_number'   => $key['unique_reference'],
                            'title'              => $key['title'],
                            'applicant_name'     => $key['applicant_fname'],
                            'applicant_mname'    => $key['applicant_mname'],
                            'applicant_lname'    => $key['applicant_lname'],
                            'mobile'             => $key['mobile'],
                            'status'             => $res_status,
                            'payment_status'     => $res_pay_status,
                            'ack_notes'          => $ack_notes,
                            'ack_file'           => $ack_file    
                        );
                    }
                }
                    echo json_encode($data);
            }

            if($search == 'Monthly' && $cat == '100'){
                $currdate = date('Y-m-d H:i:s');
                $week_last_day = date("Y-m-d H:i:s", strtotime("- 30 day"));
                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a  ON p.application_id = a.application_id  WHERE p.agent_code ="'.$agent_code.'" AND a.type ="pan" AND p.datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.'"  AND a.category_3 ="'.$cat.'" AND p.payment_status = 1  ORDER BY p.application_id DESC' )->result_array();          
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                        $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["application_id"].'" AND type = "PAN"')->row();
                        if (empty($ack)) {
                            $ack_notes = '';
                            $ack_file = '';
                        }else{
                            $ack_notes = $ack->notes;
                            $ack_file  = $ack->acknowledgement_file;
                        }

                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'reference_number'   => $key['unique_reference'],
                            'title'              => $key['title'],
                            'applicant_name'     => $key['applicant_fname'],
                            'applicant_mname'    => $key['applicant_mname'],
                            'applicant_lname'    => $key['applicant_lname'],
                            'mobile'             => $key['mobile'],
                            'status'             => $res_status,
                            'payment_status'     => $res_pay_status,
                            'ack_notes'          => $ack_notes,
                            'ack_file'           => $ack_file    
                        );
                    }
                    echo json_encode($data);
                }
            }

        }
        /*END WEEK*/        
    }
public function getITRHistory(){
        //$_SESSION['agent_code']
        $search = $this->input->get('search');
        $agent_id = $this->input->get('agent_id');
        if ($search == 'Today') {
            $currdate = date('Y-m-d');
            $resultData = $this->db->query('SELECT * FROM itr_application WHERE agent_code ="'.$_SESSION['agent_code'].'" AND payment_status = 1 AND date_time Like "%'.$currdate.'%" ORDER BY itr_id DESC' )->result_array(); 
            if ($resultData) {
                foreach($resultData as $key) {
                    $res_status = $this->checkStatus($key['status']);
                    $res_pay_status = $this->checkPaymentStatus($key['payment_status']);

                    $ack = $this->db->query('SELECT notes,acknowledgement_file FROM acknowledgement WHERE reference_id ="'.$key["itr_id"].'" AND type = "ITR"')->row();
                    if (empty($ack)) {
                        $ack_notes = '';
                        $ack_file = '';
                    }else{
                        $ack_notes = $ack->notes;
                        $ack_file  = $ack->acknowledgement_file;
                    }

                    $data[] = array(
                        'itr_application_id' => $key['itr_id'],
                        'reference_number'   => $key['unique_reference'],
                        'applicant_name'     => $key['name'],
                        'status'             => $res_status,
                        'payment_status'     => $res_pay_status,
                        'ack_notes'          => $ack_notes,
                        'ack_file'           => $ack_file   
                    );
                }
                echo json_encode($data);
            }
        }

        if($search == 'Week') {
                $currdate = date('Y-m-d H:i:s');
                $week_last_day = date("Y-m-d H:i:s", strtotime("- 7 day"));
                $resultData = $this->db->query('SELECT * FROM itr_application WHERE agent_code ="'.$_SESSION['agent_code'].'" AND date_time BETWEEN "'.$week_last_day.'" AND "'.$currdate.
                    '" AND payment_status = 1  ORDER BY itr_id DESC' )->result_array(); 
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);
                        $data[] = array(
                            'itr_application_id' => $key['itr_id'],
                            'reference_number'   => $key['unique_reference'],
                            'applicant_name' => $key['name'],
                            'status' => $res_status,
                            'payment_status' => $res_pay_status
                        );
                    }
                    echo json_encode($data);
                }
        }

        if($search == 'Monthly') {
                $currdate = date('Y-m-d H:i:s');
                $week_last_day = date("Y-m-d H:i:s", strtotime("- 30 day"));
                $resultData = $this->db->query('SELECT * FROM itr_application WHERE agent_code ="'.$_SESSION['agent_code'].'" AND date_time BETWEEN "'.$week_last_day.'" AND "'.$currdate.
                    '" AND payment_status = 1 ORDER BY itr_id DESC' )->result_array(); 
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);
                        $data[] = array(
                            'itr_application_id' => $key['itr_id'],
                            'reference_number'   => $key['unique_reference'],
                            'applicant_name' => $key['name'],
                            'status' => $res_status,
                            'payment_status' => $res_pay_status
                        );
                    }
                    echo json_encode($data);
                } 
        }                   
       
      
    }

    public function getPanHistory()
    {
        $search = $this->input->get('search');
        $agent_id = $this->input->get('agent_id');
        if ($search == 'Today') {
            $currdate = date('Y-m-d');
            $resultData = $this->db->query('SELECT * FROM pan_application WHERE agent_id ="'.$agent_id.'" AND datetime Like "%'.$currdate.'%"')->result_array();
            if ($resultData) {
                foreach($resultData as $key) {
                    $res_status = $this->checkStatus($key['status']);
                    $res_pay_status = $this->checkPaymentStatus($key['payment_status']);
                    $data[] = array(
                        'pan_application_id' => $key['application_id'],
                        'applicant_name' => $key['applicant_fname'],
                        'applicant_mname' => $key['applicant_mname'],
                        'applicant_lname' => $key['applicant_lname'],
                        'mobile' => $key['mobile'],
                        'status' => $res_status,
                        'payment_status' => $res_pay_status
                    );
                }
                echo json_encode($data);
            }
        }

        if($search == 'Week') {
                $currdate = date('Y-m-d H:i:s');
                $week_last_day = date("Y-m-d H:i:s", strtotime("- 7 day"));
                $resultData = $this->db->query('SELECT * FROM pan_application WHERE agent_id ="'.$agent_id.'" AND datetime BETWEEN  "'.$week_last_day.'" AND "'.$currdate.
                    '" ')->result_array();
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);
                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'applicant_name' => $key['applicant_fname'],
                            'applicant_mname' => $key['applicant_mname'],
                            'applicant_lname' => $key['applicant_lname'],
                            'status' => $res_status,
                            'payment_status' => $res_pay_status
                        );
                    }
                    echo json_encode($data);
                }
        }

        if($search == 'Monthly') {
                $currdate = date('Y-m-d H:i:s');
                $week_last_day = date("Y-m-d H:i:s", strtotime("- 30 day"));
                $resultData = $this->db->query('SELECT * FROM pan_application WHERE agent_id ="'.$agent_id.'" AND datetime BETWEEN "'.$week_last_day.'" AND "'.$currdate.
                    '" ')->result_array();
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);
                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'applicant_name' => $key['applicant_fname'],
                            'applicant_mname' => $key['applicant_mname'],
                            'applicant_lname' => $key['applicant_lname'],
                            'status' => $res_status,
                            'payment_status' => $res_pay_status
                        );
                    }
                    echo json_encode($data);
                } 
        }

        if($search == 'Category40') {
            $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a ON p.application_id = a.application_id WHERE p.agent_id ="'.$agent_id.'" AND a.type = "pan" AND a.category_1 = "40"' )->result_array(); 
                        if ($resultData) {
                            foreach($resultData as $key) {
                                $res_status = $this-> checkStatus($key['status']);
                                $res_pay_status = $this->checkPaymentStatus($key['payment_status']);
                                $data[] = array(
                                    'pan_application_id' => $key['application_id'],
                                    'applicant_name' => $key['applicant_fname'],
                                    'applicant_mname' => $key['applicant_mname'],
                                    'applicant_lname' => $key['applicant_lname'],
                                    'status' => $res_status,
                                    'payment_status' => $res_pay_status
                                );
                            }
                            echo json_encode($data);
                        } 
        }

        if($search == 'Category50') {

                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a ON p.application_id = a.application_id WHERE p.agent_id ="'.$agent_id.'" AND a.type = "pan" AND a.category_2 = "50"' )->result_array(); 
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);
                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'applicant_name' => $key['applicant_fname'],
                            'applicant_mname' => $key['applicant_mname'],
                            'applicant_lname' => $key['applicant_lname'],
                            'status' => $res_status,
                            'payment_status' => $res_pay_status
                        );
                    }
                    echo json_encode($data);
                } 
        }

                          
        if($search == 'Category100') {
            $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a ON p.application_id = a.application_id WHERE p.agent_id ="'.$agent_id.'" AND a.type = "pan" AND a.category_3 = "100"' )->result_array(); 
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);
                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'applicant_name' => $key['applicant_fname'],
                            'applicant_mname' => $key['applicant_mname'],
                            'applicant_lname' => $key['applicant_lname'],
                            'status' => $res_status,
                            'payment_status' => $res_pay_status
                        );
                    }
                    echo json_encode($data);
                }
        }

    }



    public function getPanHistoryByCat()
    {
        $search = $this->input->get('search');
        $agent_id = $this->input->get('agent_id');

        if($search == 'Category40') {
            $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a ON p.application_id = a.application_id WHERE p.agent_id ="'.$agent_id.'" AND a.type = "pan" AND a.category_1 = "40"' )->result_array(); 
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this-> checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);
                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'applicant_name'     => $key['applicant_fname'],
                            'applicant_mname'    => $key['applicant_mname'],
                            'applicant_lname'    => $key['applicant_lname'],
                            'status'             => $res_status,
                            'payment_status'     => $res_pay_status
                        );
                    }
                    echo json_encode($data);
                } 
        }

        if($search == 'Category50') {

                $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a ON p.application_id = a.application_id WHERE p.agent_id ="'.$agent_id.'" AND a.type = "pan" AND a.category_2 = "50"' )->result_array(); 
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);
                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'applicant_name'     => $key['applicant_fname'],
                            'applicant_mname'    => $key['applicant_mname'],
                            'applicant_lname'    => $key['applicant_lname'],
                            'status'             => $res_status,
                            'payment_status'     => $res_pay_status
                        );
                    }
                    echo json_encode($data);
                } 
        }

                          
        if($search == 'Category100') {
            $resultData = $this->db->query('SELECT * FROM pan_application as p JOIN application_charge as a ON p.application_id = a.application_id WHERE p.agent_id ="'.$agent_id.'" AND a.type = "pan" AND a.category_3 = "100"' )->result_array(); 
                if ($resultData) {
                    foreach($resultData as $key) {
                        $res_status = $this->checkStatus($key['status']);
                        $res_pay_status = $this->checkPaymentStatus($key['payment_status']);
                        $data[] = array(
                            'pan_application_id' => $key['application_id'],
                            'applicant_name' => $key['applicant_fname'],
                            'applicant_mname' => $key['applicant_mname'],
                            'applicant_lname' => $key['applicant_lname'],
                            'status' => $res_status,
                            'payment_status' => $res_pay_status
                        );
                    }
                    echo json_encode($data);
                }
        }

    }


    public function checkStatus($status){
        if ($status == '0') {
        $getstatus = 'In process';
        }elseif ($status == '1') {
        $getstatus = 'In process ';
        }elseif ($status == '2') {
        $getstatus = 'Verified ';
        }elseif ($status == '3') {
        $getstatus = 'Reject';
        }elseif ($status == '4') {
        $getstatus = 'Done';
        }else{
        $getstatus = 'In process';
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


    
    public function Gallery()
    {
        $data['gallery'] = $this->Model->select('gallery');    
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/gallery', $data);
        $this->load->view('frontend/include/footer');
    }

    public function HowToUse()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/how-to-use');
        $this->load->view('frontend/include/footer');
    }
    
    public function Profile()
    {
        if($this->session->userdata('LoggedIn')){
            $user_ids = $this->session->userdata('login_id');
            $where = array(
                'agent_id' => $user_ids 
            );
            $data['userdata'] = $this->Model->singleRowdata($where, 'agent');

            $this->load->view('frontend/include/header');    
            $this->load->view('frontend/profile', $data);
            $this->load->view('frontend/include/footer');
        }else{
          redirect('Home/SjbtLogin');
        }
        
    }

    public function ca_consultancy()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/ca-consultancy');
        $this->load->view('frontend/include/footer');
    }

    public function pan_card_requrement()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/pan_card_requrement');
        $this->load->view('frontend/include/footer');
    }

    public function income_tax_return_file()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/income_tax_return_file');
        $this->load->view('frontend/include/footer');
    }

    public function gst_Registration()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/gst_Registration');
        $this->load->view('frontend/include/footer');
    }

    public function Gumasta()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/gumasta');
        $this->load->view('frontend/include/footer');
    }

    public function Company_audit()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/company_audit');
        $this->load->view('frontend/include/footer');
    }

    public function Trust()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/trust');
        $this->load->view('frontend/include/footer');
    }

    public function home_loan()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/home_loan');
        $this->load->view('frontend/include/footer');
    }
    
    public function financial()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/financial');
        $this->load->view('frontend/include/footer');
    }


    public function terms_of_service()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/terms-of-service');
        $this->load->view('frontend/include/footer');
    }

    public function business_opp()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/business_opp');
        $this->load->view('frontend/include/footer');
    }

    public function privacy_policy()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/privacy_policy');
        $this->load->view('frontend/include/footer');
    }

    public function passport()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/passport');
        $this->load->view('frontend/include/footer');
    }

    public function loan_enquiry()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/loan_enquiry');
            $this->load->view('frontend/include/footer');
        }else{
            redirect('Home/SjbtLogin');
        }
        
    }

     public function digital_signature()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/digital_signature');
        $this->load->view('frontend/include/footer');
    }

     public function iso()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/iso');
        $this->load->view('frontend/include/footer');
    }


     public function saveLoanEnquiryInformation(){
        $data = array(
          'name'           => $this->input->post('name'),
          'email'          => $this->input->post('email'),
          'mobile'         => $this->input->post('mobile'),
          'pincode'        => $this->input->post('pincode'),
          'company_name'   => $this->input->post('company_name'),
          'salary_in_hand' => $this->input->post('salary_in_hand'),
          'address'        => $this->input->post('address'),
          'employee_type'  => $this->input->post('employee_type'),
          'loan_type'      => $this->input->post('loan_type')
        );

        $result = $this->Model->insert($data,'loan_enquiry');
        if ($result) {
                    $to = "help@ezypangateway.com ";
                    $subject = 'Loan Enquiry Successful -  EZYPANGATEWAY';

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
                                   <p style="font-size:22px;">Dear '.$this->input->post('name').',</p>
                                   <p>Congratulations! You have Apply Loan Enquiry successfully with ezypangateway!</p>
                                  
                                  
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
                           $data_result['result']    = 'true';
                           $data_result['msg']       = 'Mail send successfully';
                       }else{
                           $data_result['result']   = 'false';
                           $data_result['msg']      = "Emailexist.";
                       }
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success ! </strong>Your Loan Enquiry send succesfully.</div>');
            redirect('Home/loan_enquiry');
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry!</strong> your query can not submit.
            </div>');
            redirect('Home/loan_enquiry');
        }


    }


     public function messageSend11($agent_code,$msg,$mobile){
        $newmsg   = "Your OTP is  ".$msg.". Please enter the same to use your account. Keep this OTP to yourself for account safety. If you have not made this request then report us immediately at help@ezypangateway.com";

        // $message = urlencode($newmsg);
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

        

        $message = urlencode($newmsg);
        $mobileNo = $mobile;
        $senderId = 'ESYPAN';
        $auth_key = '300595Avqfaa0a5db19dd5';//'a67539ef7443137cb16e93e4efd9d3c';

        // $curl = curl_init();
        // $url = "https://api.msg91.com/api/sendhttp.php?mobiles='".$mobileNo."'&authkey='".$auth_key."'&route=4&sender='".$senderId."'&message='".$message."'&country=91"; //"http://msg.smscluster.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY='".$auth_key."'&message=this is for test&senderId='".$senderId."'&routeId=1&mobileNos=7987735353&smsContentType=english";//"http://msg.smscluster.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=$auth_key&message=$message&senderId=$senderId&routeId=1&mobileNos=$mobileNo&smsContentType=english";
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
        // print_r($response);
        // if ($err) {
        //   //echo "cURL Error #:" . $err;
        //  return false;
        // } else {
        //  return true;
        // }


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

    } 


    public function sendOtpMail($otp, $email){
    $data_result = array();
    $to = $email;

    $wheredata  = array('agent_email' => $email, );
    $data = $this->Model->singleRowdata($wheredata, 'agent');
    $name = $data->agent_name;
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
                    
               </div>
               <p style="float:left; margin-right:10px;">EZY PAN GATEWAY</p>
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

       if ($code == '') {
       	$code = '';
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
	                   
	                   <p>Your One Time Password (OTP) is <b>'.$otp.'</b></p>                  
	                  <p>The password will expire in ten minutes if not used.</p>
	                  <p>If you have not made this request, please contact our customer support immediately.</p>                  
	                   <p style="float:left; margin-right:10px;">Thank You</p>
	                   <p style="margin-right:10px;">EZY PAN GATEWAY</p>
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
	           $data_result['result']    = 'true';
	           $data_result['msg']       = 'Mail send successfully';
	       }else{
	           $data_result['result']   = 'false';
	           $data_result['msg']      = "Email exist.";
	       } 
    }
}



   


  //  public function htmlmail($code, $otp){
  //   $config=array(
  //   'mailpath' => '/usr/sbin/sendmail',
  //   'protocol'=>'smtp',
  //   'smtp_host'=>'ssl://smtp.gmail.com',
  //   'smtp_port'=>465,
  //   'smtp_user'=>'deeptivaidhya.emaster@gmail.com',
  //   'smtp_pass'=>'Deepti@123#',
  //   'mailtype' => 'html', 
  //   'charset' => 'iso-8859-1'
  //   );
  //   $this->load->library('email', $config);
  //   //$this->email->set_newline("\r\n");
  //    $this->email->set_mailtype("html");
  //   $this->email->from('From Mail', 'From EZYPAN');
  //       $data = array(
  //          //'userName'=> 'Anil Kumar Panigrahi'
  //           'code' => $code,
  //           'otp'  =>$otp 
  //       );
  //   $this->email->to('sensanjay.emaster@gmail.com'); // replace it with receiver mail id
  //   $this->email->subject('OTP - EZYPANGATEWAY'); // replace it with relevant subject

  //   $body = $this->load->view('emails/email.php',$data,TRUE);

  //   $this->email->message($body); 
  //   $this->email->send();
  // } 
    

   public function otpResend(){

        $agent_code = base64_decode(urldecode($_GET['sjbt_code']));
        $mobile     = base64_decode(urldecode($_GET['mobile']));
        
       /*** USE CURL HERE FOR SEND OTP ***/
        $whereMobile = array(
            'agent_code'    => $agent_code,
            'mobile'        => $mobile
        );
        $genrate_otp = mt_rand(100000,999999);
        $data_otp = array(
            'otp_created_time' => date('Y-m-d H:i:s'),
            'otp'              => $genrate_otp,
        );
        $update_info = $this->Model->update('agent', $data_otp, $whereMobile);
        $agentResult = $this->Model->singleRowdata($whereMobile, 'agent');
        
        //print_r($agentResult);die;
        $agentDataEmail = $agentResult->agent_email;
        $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail);
        $sendSMS = $this->messageSend11($agent_code,$genrate_otp, $mobile);
        if (!empty($sendSMS)) {                                      
           $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Alert!</strong> OTP Resend on your mobile please check </div>');
            redirect('Home/otp?mobile='.urlencode(base64_encode($mobile)).'&sjbt_code='.urlencode(base64_encode($agentResult->agent_code)) ,'refresh');
        }else{
             $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry!</strong> otp does not match.</div>');
            redirect('Home/otp?mobile='.urlencode(base64_encode($agentResult->mobile)));
        }
   } 

   public function otpResendHistory(){

        $mobile = urlencode(base64_decode($_GET['mobile']));
        
       /*** USE CURL HERE FOR SEND OTP ***/
        $whereMobile = array(
            'mobile'        => $mobile
        );
        $genrate_otp = mt_rand(100000,999999);
        $data_otp = array(
            'otp' =>$genrate_otp,
            'otp_created_time' => date('Y-m-d H:i:s'),
        );
        $update_info = $this->Model->update('agent', $data_otp, $whereMobile);
        $agentResult = $this->Model->singleRowdata($whereMobile, 'agent');
        $agent_code = $agentResult->agent_code;
        $agentDataEmail = $agentResult->agent_email;
        $sendOtpMail = $this->sendOtpMail($genrate_otp, $agentDataEmail);
        $sendSMS = $this->messageSend11($agent_code,$genrate_otp, $mobile);

        if (!empty($sendSMS)) {                                      
           $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Alert!</strong> OTP Resend on your mobile please check </div>');
            redirect('Home/VerifyAgentCode?mobile='.urlencode(base64_encode($mobile)).'&sjbt_code='.urlencode(base64_encode($agentResult->agent_code)) ,'refresh');
        }else{
             $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry!</strong> otp does not match.</div>');
            redirect('Home/VerifyAgentCode?mobile='.urlencode(base64_encode($agentResult->mobile)));
        }
   } 


}
?>
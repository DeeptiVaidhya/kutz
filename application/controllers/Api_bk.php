<?php
//more code here
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {
    var $baseUrl;
    public function __construct(){
        parent::__construct();
        $this->load->model('AppModel');

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
        $email =$user_data[0];
        $pwd   =$user_data[1];
        $token =$user_data[2]; 

        $where_data = array(
            'email'=>$email,
            'password'=>$pwd,
            'device_token'=>$token
        );
        $result   = $this->AppModel->singleRow($where_data,'customers');
        if($result){
            return true;
        }else{
            return false;
        }
    }
    // Register Api
    // public function register(){
    //     $post  = file_get_contents('php://input');
    //     $val   =json_decode($post);
    //     // $role            = $val->role;
    //     $email              = $val->email;
    //     $password           = $val->password;
    //     $device_type        = $val->device_type;
    //     $device_token       = $val->device_token;
    //     $where_data = array(
    //         'email'    => $email
    //     );
    //     $result  = $this->AppModel->singleRow($where_data,'customers');
    //     if($result){
    //         $output['result']   = 'false';
    //         $output['msg']      = "Email already exists.";
    //     }else{
    //       $tokenData = array();
    //         $tokenData['email']        = $email; 
    //         $tokenData['password']     = $password; 
    //         $tokenData['device_token'] = $device_token;  
    //         $output['token']           = $this->genrate_token($tokenData);
    //         $userdata =array(
    //              'email'        => $email,
    //              'password'     => md5($password),
    //              'role'         => '2',
    //              'device_type'  => $device_type,
    //              'device_token' => $device_token
    //         );
    //         $res  = $this->AppModel->insert($userdata,'customers');
    //         if ($res) {
    //             $userData = array('customer_id' => $this->db->insert_id());
    //             $resultsData = $this->AppModel->singleRowdata($userData,'customers');

    //             $output['result']     = 'true';
    //             $output['data']       = $resultsData;
    //             $output['msg']        = 'Customer Register Successfully!';        
    //         }else{
    //             $output['result']   = 'false';
    //             $output['msg']      = "Customer not Insert.";
    //         }
    //     }       
    //     echo json_encode($output);
    // }


    public function register1(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $login_type = $val->login_type;
        $password   = md5($val->password);
        $email_id   = $val->email;
        $data = array(
            'google_id'     => $val->google_id,
            'facebook_id'   => $val->facebook_id,
            'login_type'    => $login_type,
            'email'         => $email_id,
            'password'      => $password,
            'device_type'   => $val->device_type,
            'device_token'  => $val->device_token
        );

        if($login_type=='fb'){
            $where_data = array(
                'facebook_id'=>$val->facebook_id
            );
            $res_chk_facebook  = $this->Model->singleRowdata($where_data,'customers');
            if($res_chk_facebook){
                    $data_result['result'] = 'false';
                    $data_result['msg']= 'User already exist.';
            }else{
                $where_email = array(
                    'email' =>$val->email
                );
                $res1 = $this->Model->singleRowdata($where_email,'customers');
                if($res1){
                    $data_result['result'] = 'false';
                    $data_result['msg']    = 'Email already exist';
                }else{
                    $res_crt_fb  = $this->Model->insert($data,'customers');
                    $lastIds = $this->db->insert_id();
                    if($res_crt_fb){
                        $where_data = array(
                          'customer_id'=>$this->db->insert_id()
                        );
                        $result  = $this->Model->singleRowdata($where_data,'customers');
                        if($result){
                            $tokenData = array();
                            $tokenData['email']    = $val->email;
                            $tokenData['pwd']      = $password;
                            $tokenData['device_token'] = $val->device_token; 
                            $data_result['token'] = $this->genrate_token($tokenData);
                            $where_device = array(
                                'customer_id'=>$result->customer_id
                            );

                            $device_data = array(
                                'device_type'  => $val->device_type,
                                'device_token' => $val->device_token,
                                );
                            $reslogin = $this->Model->update('customers',$device_data,$where_device);
                            $userInfo   = $this->Model->singleRowdata($where_data,'customers');
                            if ($userInfo) {
                                $data_result['result'] = 'true';
                                $data_result['data']   = $userInfo;
                                $data_result['msg']    = "User Created Succesfully.";
                            } 
                        }
                    }else{
                        $data_result['result'] ='false';
                        $data_result['msg']    ="Invalid Registration";
                    } 
                }        
            }
        }elseif ($login_type=='google') {
                $where_data = array(
                    'google_id'=>$val->google_id
                );
                $res_chk_google  = $this->Model->singleRowdata($where_data,'customers');
                if($res_chk_google){
                    $data_result['result'] = 'false';
                    $data_result['msg']= 'User already exist.';
                }else{
                    $where_email = array(
                    'email' =>$val->email
                    );
                    $res1 = $this->Model->singleRowdata($where_email,'customers');
                    if($res1){
                        $data_result['result'] = 'false';
                        $data_result['msg']    = 'Email already exist';
                    }else{
                        $res_crt_fb  = $this->Model->insert($data,'customers');
                        $lastIds = $this->db->insert_id();
                        if($res_crt_fb){
                            $where_data = array(
                              'customer_id'=>$this->db->insert_id()
                            );
                            $result  = $this->Model->singleRowdata($where_data,'customers');
                            if($result){
                                $tokenData = array();
                                $tokenData['email'] = $val->email;
                                $tokenData['pwd'] = $password;
                                $tokenData['device_token'] = $val->device_token; 
                                $data_result['token'] = $this->genrate_token($tokenData);
                                $where_device = array(
                                    'customer_id'=>$result->customer_id
                                );
                                $device_data = array(
                                    'device_type'  => $val->device_type,
                                    'device_token' => $val->device_token,
                                );
                                $reslogin = $this->Model->update('customers',$device_data,$where_device);
                                $userInfo = $this->Model->singleRowdata($where_data,'customers');
                                if ($userInfo) {
                                    $data_result['result'] = 'true';
                                    $data_result['data']   = $userInfo;
                                    $data_result['msg']    = "User Created Succesfully.";
                                }
                            }
                        }else{
                            $data_result['result'] ='false';
                            $data_result['msg']    ="Invalid Registration";
                        }
                    }        
                }
        }else{
                $where_data = array(
                    'email' =>$val->email
                );
                $res1 = $this->Model->singleRowdata($where_data,'customers');
                if($res1){
                    $data_result['result'] = 'false';
                    $data_result['msg']    = 'Email already exist';
                }else{
                    $res  = $this->Model->insert($data,'customers');
                    if($res){
                        $lastIds = $this->db->insert_id();
                        $where_data = array(
                          'customer_id'=>$this->db->insert_id()
                        );
                        $result   = $this->Model->singleRowdata($where_data,'customers');
                        if($result){
                            $tokenData = array();
                            $tokenData['email'] = $email_id; 
                            $tokenData['pwd']   = $password; 
                            $tokenData['device_token'] = $val->device_token; 
                            $data_result['token'] = $this->genrate_token($tokenData);
                            $where_device = array(
                                'customer_id'=>$result->customer_id
                            );
                            $device_data = array(
                                'device_type'  => $val->device_type,
                                'device_token' => $val->device_token
                                );
                            $res_update = $this->Model->update('customers',$device_data,$where_device);
                            $userInfo   = $this->Model->singleRowdata($where_data,'customers');
                            if ($userInfo) {
                                $data_result['result'] = 'true';
                                $data_result['data']   = $userInfo;
                                $data_result['msg']    = "User Created Succesfully.";
                            }    
                        }else{
                            $data_result['result']='false';
                            $data_result['msg']="Credential not matched";
                        }
                       
                    }else{
                        $data_result['result'] ='false';
                        $data_result['msg']    ="Invalid Registration";
                    }
                }
          }
        echo json_encode($data_result);
    }

    public function register(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $login_type = $val->login_type;
        $password   = md5($val->password);
        $email_id   = $val->email;
        $data = array(
            'google_id'     => $val->google_id,
            'facebook_id'   => $val->facebook_id,
            'login_type'    => $login_type,
            'role'          => '2',
            'email'         => $email_id,
            'password'      => $password,
            'device_type'   => $val->device_type,
            'device_token'  => $val->device_token
        );
        if($login_type=='fb'){
            $where_data = array(
                'facebook_id'=>$val->facebook_id
            );
            $res_chk_facebook  = $this->Model->singleRowdata($where_data,'customers');
            if ($res_chk_facebook) {
                if($res_chk_facebook->facebook_id == $val->facebook_id){
                    $tokenData = array();
                    $tokenData['email']        = $val->email;
                    $tokenData['pwd']          = $password;
                    $tokenData['device_token'] = $val->device_token; 
                    $data_result['token']      = $this->genrate_token($tokenData);
                    $data_result['result'] = 'true';
                    $data_result['data'] = $res_chk_facebook;
                }
            }else{
                $where_email = array(
                    'email' =>$val->email
                );
                $res1 = $this->Model->singleRowdata($where_email,'customers');
                if($res1){
                    $data_result['result'] = 'false';
                    $data_result['msg']    = 'Email already exist';
                }else{
                    $res_crt_fb  = $this->Model->insert($data,'customers');
                    $lastIds = $this->db->insert_id();
                    if($res_crt_fb){
                        $where_data = array(
                          'customer_id'=>$this->db->insert_id()
                        );
                        $result  = $this->Model->singleRowdata($where_data,'customers');
                        if($result){
                            $tokenData = array();
                            $tokenData['email']    = $val->email;
                            $tokenData['pwd']      = $password;
                            $tokenData['device_token'] = $val->device_token; 
                            $data_result['token'] = $this->genrate_token($tokenData);
                            $where_device = array(
                                'customer_id'=>$result->customer_id
                            );
                            $device_data = array(
                                'device_type'  => $val->device_type,
                                'device_token' => $val->device_token,
                            );
                            $reslogin = $this->Model->update('customers',$device_data,$where_device);
                            $userInfo   = $this->Model->singleRowdata($where_data,'customers');
                            if ($userInfo) {
                                $data_result['result'] = 'true';
                                $data_result['data']   = $userInfo;
                                $data_result['msg']    = "User Created Succesfully.";
                            } 
                        }
                    }else{
                        $data_result['result'] ='false';
                        $data_result['msg']    ="Invalid Registration";
                    } 
                }        
            }
        }elseif ($login_type=='google') {
            $where_data = array(
                'google_id'=>$val->google_id
            );
            $res_chk_google  = $this->Model->singleRowdata($where_data,'customers');
            if ($res_chk_google) {
                if($res_chk_google->google_id == $val->google_id){
                    $tokenData = array();
                    $tokenData['email']        = $val->email;
                    $tokenData['pwd']          = $password;
                    $tokenData['device_token'] = $val->device_token; 
                    $data_result['token']      = $this->genrate_token($tokenData);
                    $data_result['result'] = 'true';
                    $data_result['data']       = $res_chk_google;
                }
            }else{
                $where_email = array(
                    'email' =>$val->email
                );
                $res = $this->Model->singleRowdata($where_email,'customers');
                if($res){
                    $data_result['result'] = 'false';
                    $data_result['msg']    = 'Email already exist';
                }else{
                    $res_crt_fb  = $this->Model->insert($data,'customers');
                    $lastIds = $this->db->insert_id();
                    if($res_crt_fb){
                        $where_data = array(
                          'customer_id'=>$this->db->insert_id()
                        );
                        $result  = $this->Model->singleRowdata($where_data,'customers');
                        if($result){
                            $tokenData = array();
                            $tokenData['email']    = $val->email;
                            $tokenData['pwd']      = $password;
                            $tokenData['device_token'] = $val->device_token; 
                            $data_result['token'] = $this->genrate_token($tokenData);
                            $where_device = array(
                                'customer_id'=>$result->customer_id
                            );
                            $device_data = array(
                                'device_type'  => $val->device_type,
                                'device_token' => $val->device_token,
                            );
                            $reslogin = $this->Model->update('customers',$device_data,$where_device);
                            $userInfo   = $this->Model->singleRowdata($where_data,'customers');
                            if ($userInfo) {
                                $data_result['result'] = 'true';
                                $data_result['data']   = $userInfo;
                                $data_result['msg']    = "User Created Succesfully.";
                            } 
                        }
                    }else{
                        $data_result['result'] ='false';
                        $data_result['msg']    ="Invalid Registration";
                    } 
                }        
            }      
        }else{
                $where_data = array(
                    'email' =>$val->email
                );
                $res1 = $this->Model->singleRowdata($where_data,'customers');
                if($res1){
                    $data_result['result'] = 'false';
                    $data_result['msg']    = 'Email already exist';
                }else{
                    $res  = $this->Model->insert($data,'customers');
                    if($res){
                        $lastIds = $this->db->insert_id();
                        $where_data = array(
                          'customer_id'=>$this->db->insert_id()
                        );
                        $result   = $this->Model->singleRowdata($where_data,'customers');
                        if($result){
                            $tokenData = array();
                            $tokenData['email'] = $email_id; 
                            $tokenData['pwd']   = $password; 
                            $tokenData['device_token'] = $val->device_token; 
                            $data_result['token'] = $this->genrate_token($tokenData);
                            $where_device = array(
                                'customer_id'=>$result->customer_id
                            );
                            $device_data = array(
                                'device_type'  => $val->device_type,
                                'device_token' => $val->device_token
                                );
                            $res_update = $this->Model->update('customers',$device_data,$where_device);
                            $userInfo   = $this->Model->singleRowdata($where_data,'customers');
                            if ($userInfo) {
                                $data_result['result'] = 'true';
                                $data_result['data']   = $userInfo;
                                $data_result['msg']    = "User Created Succesfully.";
                            }    
                        }else{
                            $data_result['result']='false';
                            $data_result['msg']="Credential not matched";
                        }
                       
                    }else{
                        $data_result['result'] ='false';
                        $data_result['msg']    ="Invalid Registration";
                    }
                }
          }
        echo json_encode($data_result);
    }

    public function registerNew(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $login_type = $val->login_type;
        $password   = md5($val->password);
        $email_id   = $val->email;
        $data = array(
            'google_id'     => $val->google_id,
            'facebook_id'   => $val->facebook_id,
            'login_type'    => $login_type,
            'email'         => $email_id,
            'password'      => $password,
            'device_type'   => $val->device_type,
            'device_token'  => $val->device_token
        );

        if($login_type=='fb'){
            $where_data = array(
                'facebook_id'=>$val->facebook_id
            );
            $res_chk_facebook  = $this->Model->singleRowdata($where_data,'customers');
            if($res_chk_facebook){
                    $data_result['result'] = 'false';
                    $data_result['msg']= 'User already exist.';
            }else{
                $where_email = array(
                    'email' =>$val->email
                );
                $res1 = $this->Model->singleRowdata($where_email,'customers');
                if($res1){
                    $data_result['result'] = 'false';
                    $data_result['msg']    = 'Email already exist';
                }else{
                    $res_crt_fb  = $this->Model->insert($data,'customers');
                    $lastIds = $this->db->insert_id();
                    if($res_crt_fb){
                        $where_data = array(
                          'customer_id'=>$this->db->insert_id()
                        );
                        $result  = $this->Model->singleRowdata($where_data,'customers');
                        if($result){
                            $tokenData = array();
                            $tokenData['email']    = $val->email;
                            $tokenData['pwd']      = $password;
                            $tokenData['device_token'] = $val->device_token; 
                            $data_result['token'] = $this->genrate_token($tokenData);
                            $where_device = array(
                              'customer_id'=>$result->customer_id
                            );
                            $device_data = array(
                                'device_type'  => $val->device_type,
                                'device_token' => $val->device_token,
                                );
                            $reslogin = $this->Model->update('customers',$device_data,$where_device);
                            $userInfo   = $this->Model->singleRowdata($where_data,'customers');
                            if ($userInfo) {
                                $data_result['result'] = 'true';
                                $data_result['data']   = $userInfo;
                                $data_result['msg']    = "User Created Succesfully.";
                            } 
                        }
                    }else{
                        $data_result['result'] ='false';
                        $data_result['msg']    ="Invalid Registration";
                    } 
                }        
            }
        }elseif ($login_type=='google') {
                $where_data = array(
                    'google_id'=>$val->google_id
                );
                $res_chk_google  = $this->Model->singleRowdata($where_data,'customers');
                if($res_chk_google == $val->google_id){
                        $result   = $this->Model->singleRowdata($where_data,'customers');
                        if($result){
                            $tokenData = array();
                            $tokenData['email'] = $email_id; 
                            $tokenData['pwd']   = $password; 
                            $tokenData['device_token'] = $val->device_token; 
                            $data_result['token'] = $this->genrate_token($tokenData);
                            $where_device = array(
                                'customer_id'=>$result->customer_id
                            );
                            $device_data = array(
                                'device_type'  => $val->device_type,
                                'device_token' => $val->device_token
                                );
                            $res_update = $this->Model->update('customers',$device_data,$where_device);
                            $userInfo   = $this->Model->singleRowdata($where_data,'customers');
                            if ($userInfo) {
                                $data_result['result'] = 'true';
                                $data_result['data']   = $userInfo;
                                $data_result['msg']    = "User Created Succesfully.";
                            }    
                        }
                }else{
                    $res_crt_fb  = $this->Model->insert($data,'customers');
                    $lastIds = $this->db->insert_id();
                    if($res_crt_fb){
                        $where_data = array(
                          'customer_id'=>$this->db->insert_id()
                        );
                        $result  = $this->Model->singleRowdata($where_data,'customers');
                        if($result){
                            $tokenData = array();
                            $tokenData['email'] = $val->email;
                            $tokenData['pwd'] = $password;
                            $tokenData['device_token'] = $val->device_token; 
                            $data_result['token'] = $this->genrate_token($tokenData);
                            $where_device = array(
                                'customer_id'=>$result->customer_id
                            );
                            $device_data = array(
                                'device_type'  => $val->device_type,
                                'device_token' => $val->device_token,
                            );
                            $reslogin = $this->Model->update('customers',$device_data,$where_device);
                            $userInfo = $this->Model->singleRowdata($where_data,'customers');
                            if ($userInfo) {
                                $data_result['result'] = 'true';
                                $data_result['data']   = $userInfo;
                                $data_result['msg']    = "User Created Succesfully.";
                            }
                        }
                    }else{
                        $data_result['result'] ='false';
                        $data_result['msg']    ="Invalid Registration";
                    }

                    // $where_email = array(
                    // 'email' =>$val->email
                    // );
                    // $res1 = $this->Model->singleRowdata($where_email,'customers');
                    // if($res1){
                    //     $data_result['result'] = 'false';
                    //     $data_result['msg']    = 'Email already exist';
                    // }else{
                    //     $res_crt_fb  = $this->Model->insert($data,'customers');
                    //     $lastIds = $this->db->insert_id();
                    //     if($res_crt_fb){
                    //         $where_data = array(
                    //           'customer_id'=>$this->db->insert_id()
                    //         );
                    //         $result  = $this->Model->singleRowdata($where_data,'customers');
                    //         if($result){
                    //             $tokenData = array();
                    //             $tokenData['email'] = $val->email;
                    //             $tokenData['pwd'] = $password;
                    //             $tokenData['device_token'] = $val->device_token; 
                    //             $data_result['token'] = $this->genrate_token($tokenData);
                    //             $where_device = array(
                    //                 'customer_id'=>$result->customer_id
                    //             );
                    //             $device_data = array(
                    //                 'device_type'  => $val->device_type,
                    //                 'device_token' => $val->device_token,
                    //             );
                    //             $reslogin = $this->Model->update('customers',$device_data,$where_device);
                    //             $userInfo = $this->Model->singleRowdata($where_data,'customers');
                    //             if ($userInfo) {
                    //                 $data_result['result'] = 'true';
                    //                 $data_result['data']   = $userInfo;
                    //                 $data_result['msg']    = "User Created Succesfully.";
                    //             }
                    //         }
                    //     }else{
                    //         $data_result['result'] ='false';
                    //         $data_result['msg']    ="Invalid Registration";
                    //     }
                    // }        
                }
        }else{
                $where_data = array(
                    'email' =>$val->email
                );
                $res1 = $this->Model->singleRowdata($where_data,'customers');
                if($res1){
                    $data_result['result'] = 'false';
                    $data_result['msg']    = 'Email already exist';
                }else{
                    $res  = $this->Model->insert($data,'customers');
                    if($res){
                        $lastIds = $this->db->insert_id();
                        $where_data = array(
                          'customer_id'=>$this->db->insert_id()
                        );
                        $result   = $this->Model->singleRowdata($where_data,'customers');
                        if($result){
                            $tokenData = array();
                            $tokenData['email'] = $email_id; 
                            $tokenData['pwd']   = $password; 
                            $tokenData['device_token'] = $val->device_token; 
                            $data_result['token'] = $this->genrate_token($tokenData);
                            $where_device = array(
                                'customer_id'=>$result->customer_id
                            );
                            $device_data = array(
                                'device_type'  => $val->device_type,
                                'device_token' => $val->device_token
                                );
                            $res_update = $this->Model->update('customers',$device_data,$where_device);
                            $userInfo   = $this->Model->singleRowdata($where_data,'customers');
                            if ($userInfo) {
                                $data_result['result'] = 'true';
                                $data_result['data']   = $userInfo;
                                $data_result['msg']    = "User Created Succesfully.";
                            }    
                        }else{
                            $data_result['result']='false';
                            $data_result['msg']="Credential not matched";
                        }
                       
                    }else{
                        $data_result['result'] ='false';
                        $data_result['msg']    ="Invalid Registration";
                    }
                }
          }
        echo json_encode($data_result);
    }

    //Api for Login User
    public function login(){
        $post  = file_get_contents('php://input');
        $val   =json_decode($post);
        $email        = $val->email;
        $password     = md5($val->password);
        $device_type  = $val->device_type;
        $device_token = $val->device_token;
        if(isset($token)){
            $token = $val->token;
        }else{
             $token='';
        } 
        $where_email = array(
          'email' => $email
        );
        $checkEmail = $this->AppModel->singleRowdata($where_email,'customers');
        // print_r($checkEmail);die;
        if($checkEmail) {
          $where_password = array(
            'email'       => $email, 
            'password'    => $password,
          );
          $checkPwd = $this->AppModel->singleRowdata($where_password,'customers');
          if($checkPwd) {
              $customer_data = array(
                  'email'     => $email,
                  'password'  => $password
              );
              $results  = $this->AppModel->singleRowdata($customer_data,'customers');
              if($results){
                $tokenData = array();
                $tokenData['email']        = $email; 
                $tokenData['pwd']          = $password; 
                $tokenData['device_token'] = $val->device_token; 
                $output['token']           = $this->genrate_token($tokenData);
                $wheredata =  array
                  (
                   'customer_id'          => $results->customer_id
                  ); 
                $customersData=array(
                    'device_type'  => $device_type,
                    'device_token' => $device_token                                      
                );
                $result = $this->AppModel->updateData('customers',$customersData,$wheredata);
                if ($result) {
                  $data  = $this->AppModel->singleRowdata($wheredata,'customers');
                  $output['result']   = 'true';
                  $output['data']     = $data;  
                  $output['msg']      = "Customer information";
                }
              }else{
                $output['result']     = 'false';
                  $output['msg']      = "Incorrect Credentials";
              }
          }else{
              $output['result']       = 'false';
              $output['msg']          = "Password doesn't match";     
          }
        }else{
            $output['result']   = 'false';
            $output['msg']      = "Email doesn't exists";     
        }       
        echo json_encode($output);
    }
    public function getProfile(){
      $post  = file_get_contents('php://input');
        $val   =json_decode($post);
        $customer_id         = $val->customer_id;
        $where_user = array(
            'customer_id'    => $customer_id
        );
        $result  = $this->AppModel->singleRowdata($where_user,'customers');
        if ($result) {
            $data = array(    
               'first_name'       => $result->first_name,
               'last_name'        => $result->last_name,
               'email'            => $result->email,
               'profession'       => $result->profession,
               'mobile'           => $result->mobile,        
               'address'          => $result->address,
               'country'          => $result->country,
               'state'            => $result->state,
               'pincode'          => $result->pincode,
               'description'      => $result->description,
               'is_status'        => $result->is_status,
               'device_type'      => $result->device_type,
               'device_token'     => $result->device_token,
               'price'            => $result->price,
               'created_at'       => $result->created_at,
               'image'            => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$result->image,
               'role'             => $result->role,
               'rating'           => '5'

            );
          $output['result']   = 'true';
          $output['data']     = $data;
            $output['msg']      = "Get Customer information Successfully"; 
        }else{
          $output['result']   = 'true';
          $output['data']     = [];
            $output['msg']      = "Customer doesn't exists"; 
        }
        echo json_encode($output);
    }

    //Api for edit profile. 
    public function edit_profile() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $customer_id   = $val->customer_id;
        $wheredata     = array(
            'customer_id'  => $customer_id
        );
        $data = array(    
           'first_name'       => $val->first_name,
           'last_name'        => $val->last_name,
           'email'            => $val->email,
           'profession'       => $val->profession,
           'mobile'           => $val->mobile,        
           'address'          => $val->address,
           'country'          => $val->country,
           'state'            => $val->state,
           'pincode'          => $val->pincode,
           'image'            => $val->image,
           'lat'              => $val->lat,
           'long'             => $val->long,
        );
        $show_status = $this->AppModel->update($wheredata,'customers',$data);
        if ($show_status) {
            $userResult = $this->AppModel->singleRowdata($wheredata, 'customers');
            $data = array(    
               'first_name'       => $userResult->first_name,
               'last_name'        => $userResult->last_name,
               'email'            => $userResult->email,
               'profession'       => $userResult->profession,
               'mobile'           => $userResult->mobile,        
               'address'          => $userResult->address,
               'country'          => $userResult->country,
               'state'            => $userResult->state,
               'pincode'          => $userResult->pincode,
               'description'      => $userResult->description,
               'is_status'        => $userResult->is_status,
               'device_type'      => $userResult->device_type,
               'device_token'     => $userResult->device_token,
               'price'            => $userResult->price,
               'created_at'       => $userResult->created_at,
               'image'            => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$userResult->image,
               'lat'              => $userResult->lat,
               'long'             => $userResult->long,
               'role'             => $userResult->role
            );
            if ($userResult) {
                $output['result']        = 'true';
                $output['data']          = $data;
                $output['msg']           = 'Customer profile has been Successfully update!';
            }else{
                $output['result']        = 'false';
                $output['msg']           = 'Sorry no Data Found!';
            }
        }else{
            $output['result']            = 'false';
            $output['result']            = 'User Profile not Update!';
        }   
        echo json_encode($output);
    }

    //Api for Change password
  public function changePassword(){
    $post = file_get_contents('php://input');
    $val=json_decode($post);
    $headers = $this->input->request_headers();
    $customeId =$val->customer_id;
      $where_pwd = array(
        'password' =>  md5($val->old_password),
        'customer_id'  =>   $customeId
      );
      $changeres = $this->AppModel->singleRowdata($where_pwd,'customers');
        if($changeres){
          $where_newpwd = array(
            'customer_id'=>$customeId
          );
          $new_data = array(
            'password'=>md5($val->new_password)
          );

          $Res = $this->AppModel->updateData('customers',$new_data, $where_newpwd);
          if($Res){
            $where_user_row = array(
            'customer_id'             =>$customeId
          );
          $result   = $this->AppModel->singleRowdata($where_user_row,'customers');
            if($result){
              $tokenData = array();
              $tokenData['email'] = $result->email; 
              $tokenData['password'] = $result->password; 
              $tokenData['device_token'] = $result->device_token; 
              $output['token'] = $this->genrate_token($tokenData);
              $output['result'] ='true';
              $output['msg'] ='Your password has been Successfully changed.';
            }else{

              $output['result'] ='true';
              $output['msg'] ='Your password has been Successfully changed.';
            }
          }else{
            $output['result'] ='false';
            $output['msg'] ='sometime went wrong.';
          }
      }else{
          $output['result'] ='false';
          $output['msg'] ='Old password not matched.';
      }

    echo json_encode($output);
  }

  public function resetPassword(){
        $post = file_get_contents('php://input');
        $val=json_decode($post);

        $where_data = array(
            'email' =>  $val->email
        );

        $userRes  = $this->AppModel->singleRowdata($where_data,'customers');
        if($userRes){
            $to      = $val->email;
            $subject = 'Password Reset';

            $headers = "From: " . strip_tags('noreply@kutz.com') . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message='';
            $message .= '<!DOCTYPE html>
                 <html>
                   <head></head>
                 <body style=" margin: 0 auto;">
                 <div class="wrapper" style="width:100%;" >
                   <header style="width: 100%; float: left; background-color: #061a42; clear: left; text-align: center;">                     
                        <span style="padding: 10px;font-size: 40px;color: white;">KUTZ </span>                       
                     </header>
                     <section>
                       <div class="container" style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
                         <div class="section">                   
                           <p style="font-size:22px;">Dear Kutz Customer,</p>
                           <p>We have received your request to <span class="il">reset</span> your <span class="il">password</span>. Please click the link below to complete the <span class="il">reset</span>:</p>
                           <a href="http://jokingfriend.com/kutz/forgotPassword.php?email='.$val->email.'" style="padding:10px;width:300px;display:block;text-decoration:none;border:1px solid #ff6c37;text-align:center;font-weight:bold;font-size:14px;color:#ffffff;background:#ff6c37;border-radius:5px;line-height:17px;margin:0 auto">Reset Your Password: </a>
                           <p style="float:right; font-size:24px; margin-right:10px;">Thanks</p>
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
                $data_result['result']  = 'true';
                $data_result['msg']   = 'mail success';
                $data_result['customer_id'] = $userRes->customer_id;
                $data_result['email']   = $to;
            }else{
                 $data_result['result'] ='false';
                $data_result['msg'] ="Emailexist.";
            }
        }else{
            $data_result['result'] ='false';
            $data_result['msg'] ="Email not exist.";
        }
        echo json_encode($data_result);
    }

    public function checkEmail(){
    $post = file_get_contents('php://input');
    $val=json_decode($post);
    $where = array(
      'email' =>$val->email
    );
    $result = $this->Model->singleRowdata($where,'customers');
    if($result){
        $data_result['result'] = 'false';
        $data_result['msg'] = 'Email already exist';
      }else{
        $data_result['result'] = 'false';
        $data_result['msg'] = 'Email available';
    } 
      echo json_encode($data_result); 
    }

    public function request(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);

        $whereData = array(
            'beautician_id' => $val->beautician_id,
            'is_status'     => 0,
        );
        $result = $this->Model->selectData('appointment', $whereData, 'appointment_id DESC'); 
        if($result){
            foreach ($result as $key) {
                $whereID     = array( 'customer_id'  => $key['customer_id']);   
                $Data        = $this->AppModel->selectAllById('customers',$whereID);
                $appointmentData[] = array(                    
                    'appointment_id'       => $key['appointment_id'],                    
                    'date'                 => $key['date'],
                    'time'                 => $key['time'],
                    'availability_status'  => $key['availability_status'],
                    'service_id'           => $key['service_id'],
                    'special_request'      => $key['special_request'],
                    'created_at'           => date_format(date_create($key['created_at']), "F d Y"),
                    'customer_id'          => $key['customer_id'],
                    'first_name'           => $Data->first_name,
                    'last_name'            => $Data->last_name,
                    'profession'           => $Data->profession,
                    'image'                => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$Data->image,
                    'rating'               => '4',
                );               
            } 
                $data_result['result'] = 'true';
                $data_result['data']   = $appointmentData;
                $data_result['msg']    = 'Appointment request List';
            }else{
                $data_result['result'] = 'false';
                $data_result['data']   = [];
                $data_result['msg']    = 'There is no appointment request here';
            } 
        echo json_encode($data_result); 
    }

    // Api for appointment Request 

    public function appointmentRequest(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $whereDate = array(
            'beautician_id' => $val->beautician_id,
            'is_status'     => 1
        );
        $result = $this->Model->selectData('appointment', $whereDate, 'appointment_id DESC'); 
        if($result){
            foreach ($result as $key) {

                $whereID     = array( 'customer_id'  => $key['customer_id']);   
                $Data        = $this->AppModel->selectAllById('customers',$whereID);
                $appointmentData[] = array(                    
                    'appointment_id'       => $key['appointment_id'],                    
                    'date'                 => $key['date'],
                    'time'                 => $key['time'],
                    'availability_status'  => $key['availability_status'],
                    'service_id'           => $key['service_id'],
                    'created_at'           => $key['created_at'],
                    'customer_id'          => $key['customer_id'],
                    'first_name'           => $Data->first_name,
                    'last_name'            => $Data->last_name,
                    'profession'           => $Data->profession,
                    'image'                => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$Data->image
                );               
            } 
            $data_result['result'] = 'true';
            $data_result['data']   = $appointmentData;
            $data_result['msg']    = 'Accepted Appointment List';
        }else{
            $data_result['result'] = 'false';
            $data_result['data']   = [];
            $data_result['msg']    = 'There is no appointment here';
        } 
        echo json_encode($data_result); 
    }

    // Api for appointment details 
    public function appointmentRequestDetails($appointment_id){
        $whereAppID = array(
            'appointment_id' => $appointment_id
        );
        $result     = $this->Model->selectAllById('appointment', $whereAppID);        
        if($result){
            foreach ($result as $key) {
                $whereID     = array(
                    'customer_id'  => $key['customer_id']
                );   
                $Data = $this->AppModel->selectAllById('customers',$whereID);
                $total_request = $this->AppModel->record_count('appointment',$whereID);
                $wherecancleID     = array(
                    'customer_id'  => $key['customer_id'],
                    'is_status'    => 5
                );   
                $cancle_request = $this->AppModel->record_count('appointment',$wherecancleID);
                $whereServiceID = array(
                    'service_id' => $key['service_id']
                );
                $service_data  = $this->Model->singleRowdata($whereServiceID, 'services');
                $whereBeuticianID     = array(
                        'customer_id'  => $key['customer_id'],
                ); 
                $review = $this->AppModel->selectdata('customer_review', $whereBeuticianID);
                if ($review) {
                  foreach ($review as $res) {
                    $data_array[] = $res['rate']; 
                    $resultdata[] = array(
                        'rate'            => $res['rate']
                    );
                  }
                  if (!empty($resultdata)) {
                    //Calculate the average.
                    $average = array_sum($data_array) / count($data_array);
                    $rate = round($average,1);
                    $rate1 = $average;
                  }else
                  {
                    $rate = [];
                  }
                }else{
                  $rate = [];
                }
                $appointmentData[] = array(                    
                    'appointment_id'       => $key['appointment_id'],                    
                    'date'                 => $key['date'],
                    'time'                 => $key['time'],
                    'availability_status'  => $key['availability_status'],
                    'created_at'           => $key['created_at'],
                    'customer_id'          => $key['customer_id'],
                    'special_request'      => $key['special_request'],
                    'total_request'        => $total_request,
                    'cancle_request'       => $cancle_request,
                    'first_name'           => $Data->first_name,
                    'last_name'            => $Data->last_name,
                    'profession'           => $Data->profession,
                    'rating'               => $rate,
                    'image'                => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$Data->image,
                    'service_id'           => $key['service_id'],
                    'service_name'         => $service_data->service_name,
                    'service_description'  => $service_data->service_description,
                    'service_picture'      => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/service/'.$service_data->service_picture,
                    'service_cat_id'       => $service_data->service_cat_id,
                    'price'                => $service_data->price
                );               
            } 
            $data_result['result'] = 'true';
            $data_result['data']   = $appointmentData;
            $data_result['msg']    = 'Appointment details';
        }else{
            $data_result['result'] = 'false';
            $data_result['data']   = [];
            $data_result['msg']    = 'Not Found';
        } 
        echo json_encode($data_result); 
    }

    public function history(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);

        $whereDate = array(
            'beautician_id' => $val->beautician_id,
            'is_status'     => '3',
        );
        $result = $this->Model->selectData('appointment', $whereDate, 'appointment_id DESC'); 
        if($result){
            foreach ($result as $key) {
                $whereID     = array( 'customer_id'  => $key['customer_id']);   
                $Data        = $this->AppModel->selectAllById('customers',$whereID);
                $review = $this->AppModel->selectdata('customer_review', $whereID);
                if ($review) {
                  foreach ($review as $res) {
                    $data_array[] = $res['rate'];
                    $resultdata[] = array(
                        'rate'            => $res['rate']
                    );
                  }
                  if (!empty($resultdata)) {
                    //Calculate the average.
                    $average = array_sum($data_array) / count($data_array);
                    $rate = round($average,1);
                    $rate1 = $average;
                  }else
                  {
                    $rate = [];
                  }
                }else{
                  $rate = [];
                }
                $appointmentData[] = array(                    
                    'appointment_id'       => $key['appointment_id'],                    
                    'date'                 => $key['date'],
                    'time'                 => $key['time'],
                    'availability_status'  => $key['availability_status'],
                    'service_id'           => $key['service_id'],
                    'special_request'      => $key['special_request'],
                    'created_at'           => date_format(date_create($key['created_at']), "F d Y"),
                    'customer_id'          => $key['customer_id'],
                    'first_name'           => $Data->first_name,
                    'last_name'            => $Data->last_name,
                    'profession'           => $Data->profession,
                    'image'                => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$Data->image,
                    'rating'               => $rate,
                );               
            } 
                $data_result['result'] = 'true';
                $data_result['data']   = $appointmentData;
                $data_result['msg']    = 'Appointment closed List';
            }else{
                $data_result['result'] = 'false';
                $data_result['data']   = [];
                $data_result['msg']    = 'There is no appointment closed here';
            } 
        echo json_encode($data_result); 
    }

    // Api for create appiontment 

    public function createService(){
        $post  = file_get_contents('php://input');
        $val   = json_decode($post);
        $serviceData =array(
            'beautician_id'        => $val->beautician_id,
            'service_name'         => $val->service_name,
            'service_cat_id'       => $val->service_cat_id,
            'price'                => $val->price,
            'time'                 => $val->time,
            'priority'             => $val->priority,
            'my_location'          => $val->my_location,
            'your_location'        => $val->your_location,
            'other'                => $val->other,
            'location_details'     => $val->location_details,
            'special_request'      => $val->special_request,
            'item_sale'            => $val->item_sale,
            'request_status'       => $val->request,
            'service_picture'      => $val->image,
            'service_description'  => $val->service_description
        );
        $res  = $this->AppModel->insert($serviceData,'services');
        if ($res) {
            $output['result']     = 'true';
            $output['msg']        = 'Service created Successfully!';        
        }else{
            $output['result']   = 'false';
            $output['msg']      = "Service not created.";
        }      
        echo json_encode($output);
    }
    //Api for edit Service.
    public function editService() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $service_id   = $val->service_id;
        $wheredata    = array(
           'service_id'  => $service_id
        );
        $serviceData =array(
            'service_name'    => $val->service_name,
            'price'           => $val->price,
            'time'            => $val->time,
            'special_request' => $val->special_request,
            'request_status'  => $val->request,
            'service_picture' => $val->image,
            'service_cat_id'  => $val->service_cat_id
        );
        $editService = $this->AppModel->update($wheredata, 'services', $serviceData);
        if ($editService) {
            $editServiceDetails = $this->AppModel->selectAllById('services',$wheredata);
            if ($editServiceDetails) {
                $data_result['result']        = 'true';
                $data_result['data']          = $editServiceDetails;
                $data_result['msg']           = 'Services has been Successfully update!';
            }else{
                $data_result['result']        = 'false';
                $data_result['msg']           = 'Sorry no Data Found!';
            }
        }else{
            $data_result['result']            = 'false';
            $data_result['result']            = 'Service details not Update!';
        }
        echo json_encode($data_result);
    }

    // Api for appointment details 
    public function deleteService($service_id){
        $whereID = array(
            'service_id' => $service_id
        );
        $result = $this->Model->delete($whereID, 'services'); 
        if($result){
            $data_result['result'] = 'true';
            $data_result['msg']    = 'Service delete Successfully';
        }else{
            $data_result['result'] = 'false';
            $data_result['msg']    = 'Service Not delete';
        } 
        echo json_encode($data_result); 
    }

    //Api for serviceStatus  
    public function serviceStatusold(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $status = $val->is_status;
        $whereID = array(
            'service_id' => $val->service_id
        );
        $statusData = array(
            'is_status' => $status
        );
        if ($status == 1) {
            $result = $this->AppModel->update($whereID, 'services', $statusData);
            if($result){
                $data_result['result'] = 'true';
                $data_result['msg']    = 'Service canceled Successfully';
            }else{
                $data_result['result'] = 'false';
                $data_result['msg']    = 'Service Not canceled';
            } 
        }
        if ($status == 2) {
            $result = $this->AppModel->update($whereID, 'services', $statusData); 

            if($result){
                $data_result['result'] = 'true';
                $data_result['msg']    = 'Service Accept Successfully';
            }else{
                $data_result['result'] = 'false';
                $data_result['msg']    = 'Service Not Accept';
            } 
        }
        if ($status == 3) {
            $result = $this->AppModel->update($whereID, 'services', $statusData); 

            if($result){
                $data_result['result'] = 'true';
                $data_result['msg']    = 'Service complete Successfully';
            }else{
                $data_result['result'] = 'false';
                $data_result['msg']    = 'Service Not complete';
            } 
        }

        echo json_encode($data_result); 
    }

    //Manage appointments for beautician End
    public function appointmentStatus(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $status         = $val->is_status;
        $beautician_id  = $val->beautician_id;
        $appointment_id = $val->appointment_id;
        $whereID = array(
            'appointment_id' =>  $appointment_id,
            'beautician_id'  =>  $beautician_id,
        );
        $statusData = array(
            'is_status' => $status
        );
        $result = $this->AppModel->update($whereID, 'appointment', $statusData);
        if ($result) {
            $getAppointment =$this->AppModel->selectAllById('appointment',$whereID);
            if ($getAppointment) {
              $whereCus = array(
                'customer_id' => $getAppointment->customer_id
              );
              $getUser =$this->AppModel->selectAllById('customers',$whereCus);
              if ($getUser) {
                $device_ids = $getUser->device_token;
                //print_r($getUser);die;
                if ($status == 1) {
                   $title      = 'Appointment Accepted';
                   $message    = 'Your ' .$getAppointment->date. ' appointment accept.';
                }elseif ($status == 2) {
                   $title      = 'Appointment confirmed';
                   $message    = 'Your ' .$getAppointment->date. ' appointment confirmed.';  
                }elseif ($status == 3) {
                   $title      = 'Appointment closed ';
                   $message    = 'Your ' .$getAppointment->date. ' appointment closed .';  
                }elseif ($status == 4) {
                   $title      = 'Appointment complete';
                   $message    = 'Your ' .$getAppointment->date. ' appointment complete.';  
                }elseif ($status == 5) {
                   $title      = 'Appointment cancled';
                   $message    = 'Your' .$getAppointment->date. ' appointment cancled.';
                }elseif ($status == 6) {
                   $title      = 'Appointment decline';
                   $message    = 'Your ' .$getAppointment->date. ' appointment decline.';
                }

                if($getUser->device_type == 'android') {
                    $this->sendPushMessageNew($device_ids, $title, $message);
                    //print_r($device_ids);die;
                }
                if ($getUser->device_type == 'ios') {
                    $this->sendPushIOS($device_ids, $title, $message);
                }
              $data_result['result'] = 'true';
              $data_result['msg']    = $title;
            }
        }else{
                $data_result['result'] = 'false';
                $data_result['msg']    = 'Appointment Not exists';
        }
      }
    echo json_encode($data_result); 
    }

    public function changeStatus(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $status = $val->is_status;
        $whereID = array(
            'appointment_id' => $val->appointment_id,
            'customer_id'    => $val->customer_id
        );
        $statusData = array(
            'is_status' => $val->is_status
        );
        $result = $this->AppModel->update($whereID, 'appointment', $statusData);
        if ($result) {
            $getAppointment =$this->AppModel->selectAllById('appointment',$whereID);
            if ($getAppointment) {
              $whereCus = array(
                'customer_id' => $getAppointment->beautician_id
              );
              $getUser =$this->AppModel->selectAllById('customers',$whereCus);
              if ($getUser) {
                $device_ids = $getUser->device_token;
                // print_r($device_ids);die;
                if ($status == 4) {
                   $title      = 'Appointment complete';
                   $message    = 'Your ' .$getAppointment->date. ' appointment complete.';
                }elseif ($status == 5) {
                   $title      = 'Appointment canceled';
                   $message    = 'Your ' .$getAppointment->date. ' appointment canceled.';  
                }

                if($getUser->device_type == 'android') {
                    $this->sendPushMessageNew($device_ids, $title, $message);
                }
                if ($getUser->device_type == 'ios') {
                    $this->sendPushIOS($device_ids, $title, $message);
                }
              $data_result['result'] = 'true';
              $data_result['msg']    = $title;
            }
        }else{
                $data_result['result'] = 'false';
                $data_result['msg']    = 'Appointment Not exists';
        }
      }
    echo json_encode($data_result); 
    }

    // public function serviceStatus(){
    //     $post = file_get_contents('php://input');
    //     $val  = json_decode($post);
    //     $status = $val->is_status;
    //     $whereID = array(
    //         'service_id' => $val->service_id
    //     );
    //     $statusData = array(
    //         'is_status' => $status
    //     );
    //     $result = $this->AppModel->update($whereID, 'services', $statusData);
    //     if ($result) {
    //         $getAppointment =$this->AppModel->selectAllById('appointment',$whereID);
    //         if ($getAppointment) {
    //           $whereCus = array(
    //             'customer_id' => $getAppointment->customer_id
    //           );
    //           $getUser =$this->AppModel->selectAllById('customers',$whereCus);
    //           if ($getUser) {
    //             $device_ids = $getUser->device_token;
    //             if ($status == 1) {
    //                $title      = 'Service Canceled';
    //                $message    = 'Your ' .$getAppointment->date. ' Service canceled.';
    //             }elseif ($status == 2) {
    //                $title      = 'Service Accept';
    //                $message    = 'Your ' .$getAppointment->date. ' Service accept.';  
    //             }elseif ($status == 3) {
    //                $title      = 'Service Complete';
    //                $message    = 'Your' .$getAppointment->date. ' Service complete.';
    //             }

    //             if($getUser->device_type == 'android') {
    //                 $this->sendPushMessageNew($device_ids, $title, $message);
    //             }
    //             if ($getUser->device_type == 'ios') {
    //                 $this->sendPushIOS($device_ids, $title, $message);
    //             }
    //           $data_result['result'] = 'true';
    //           $data_result['msg']    = $title;
    //         }
    //     }else{
    //             $data_result['result'] = 'false';
    //             $data_result['msg']    = 'Service Not exists';
    //     }
    //   }
    // echo json_encode($data_result); 
    // }

    public function AddandRemoveFavourite(){
      $post = file_get_contents('php://input');
      $val = json_decode($post);
      $status        = $val->status;
      $from_id       = $val->from_id;
      $to_id         = $val->to_id;
      $whereID = array(
          'from_id'       => $val->from_id,
          'to_id'         => $val->to_id
      );
      $checkfavorite = $this->AppModel->selectAllById('favourite',$whereID);
      if($checkfavorite){
          if ($checkfavorite->is_status == '0') {
              $param = array( 'is_status' => '1');
              $results = $this->AppModel->updateData('favourite', $param, $whereID);
              if ($results) {
                $data_result['result'] = 'true';
                $data_result['msg'] = 'User add in Favourite!';
              }else{
                $data_result['result'] = 'false';
                $data_result['msg'] = 'User cant not add in Favourite!';
              }
          }else{
              $param = array( 'is_status' => '0');
              $results = $this->AppModel->updateData('favourite', $param, $whereID);
              if ($results) {
                $data_result['result'] = 'true';
                $data_result['msg'] = 'User remove in Favourite!';
              }else{
                $data_result['result'] = 'false';
                $data_result['msg'] = 'User can not remove in Favourite!';
              }
          }
      }else{
            $param = array('from_id' => $from_id, 'to_id' => $to_id, 'is_status' => '1');
            $results = $this->AppModel->insert($param,'favourite');
            if ($results) {
              $data_result['result'] = 'true';
              $data_result['msg'] = 'User add in Favourite!';
            }else{
              $data_result['result'] = 'false';
              $data_result['msg'] = 'User not add in Favourite!';
           }
      } 
      echo json_encode($data_result);
  }
    // Api for service category 
    public function serviceCategory(){
        $post = file_get_contents('php://input');
        $val=json_decode($post);
        $result = $this->Model->select('service_category', 'cat_id asc');
        if($result){
            $data_result['result'] = 'true';
            $data_result['data']   = $result;
            $data_result['msg']    = 'Service Category List';
        }else{
            $data_result['result'] = 'false';
            $data_result['data']   = [];
            $data_result['msg']    = 'Not Found';
        } 
        echo json_encode($data_result); 
    }

    // Get Beautician Profile
    public function getBeauticianProfile(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $beautician_id = $val->beautician_id;
        $wheredata     = array(
            'customer_id'  => $beautician_id,
        );        
        $result = $this->AppModel->singleRowdata($wheredata, 'customers');

        if($result){ 
             $BeauticianInfo  = array(
              'first_name' => $result->first_name,
              'last_name'  => $result->last_name,
              'price'      => $result->price,
              'profession' => $result->profession,
              'image'      => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$result->image
             ); 

            $whereID = array(
                'beautician_id' => $result->customer_id,
                'is_status' => 0
            );   
            $services = $this->AppModel->selectData('services',$whereID, 'service_id DESC');
            if ($services) {
                foreach($services as $value) {
                    $ServiceData[]    = array(
                        'service_id'            => $value['service_id'],
                        'service_name'          => $value['service_name'],
                        'service_description'   => $value['service_description'], 
                        'time'                  => $value['time'],
                        'request_status'        => $value['request_status'],
                        'location_details'      => $value['location_details'],
                        'special_request'       => $value['special_request'],
                        'price'                 => $value['price'],
                        'service_picture'       => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/service/'.$value['service_picture'],
                        'created_at'            => date_format(date_create($value['created_at']), "F d Y")
                    ); 
                }
                $whereBeuticianID = array(
                    'beautician_id'  => $beautician_id,
                ); 
                $reviewData = $this->AppModel->selectData('customer_review',$whereBeuticianID);
                if ($reviewData) {
                    foreach ($reviewData as $b) {
                        $whereBeautiID     = array(
                            'customer_id'  => $b['customer_id'],
                        );   
                        $cdata = $this->AppModel->selectAllById('customers',$whereBeautiID);
                        $review = $this->AppModel->selectdata('customer_review', $whereBeautiID);
                        // print_r($review);die;
                        if ($review) {
                          foreach ($review as $res) {
                            $data_array[] = $res['rate']; 
                            // print_r($data_array);die;
                            $resultdata[] = array(
                                'rate'            => $res['rate']
                            );
                          }
                          if (!empty($resultdata)) {
                            //Calculate the average.
                            $average = array_sum($data_array) / count($data_array);
                            $rate    = round($average,1);
                            $rate1   = $average;
                          }else{
                            $rate = [];
                          }
                        }else{
                          $rate = [];
                        }
                        $user_review[] = array(
                            'review_id'          => $b['review_id'],
                            'beautician_id'      => $b['customer_id'],
                            'service_id'         => $b['service_id'],
                            'rate'               => $b['rate'],
                            'review'             => $b['review'],
                            'created_at'         => $b['created_at'],
                            'rating'             => $rate,
                            'review_date'        => date_format(date_create($b['created_at']), "F d Y"),
                            'customer_id'        => $cdata->customer_id,
                            'first_name'         => $cdata->first_name,
                            'last_name'          => $cdata->last_name,
                            'image'              => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$cdata->image
                        );
                    }
                }                 
            }
            if (empty($BeauticianInfo) ) {
              $BeauticianInfo = [];
            }
            if (empty($ServiceData)){
                $ServiceData = [];
            }
            if (empty($user_review)) {
                $user_review = [];
            }

            $beauticianProfile = array(
              'profile'  => $BeauticianInfo,
              'services' => $ServiceData, 
              'review'   => $user_review
            );
            $data_result['result'] = 'true';
            $data_result['data']   = $beauticianProfile;
            $data_result['msg']    = 'Show Beutician Profile, Services And Review list';
        }else{
            $data_result['result'] = 'false';
            $data_result['msg']    = 'Data not found!'; 
        }
        echo json_encode($data_result);
    }

    // Beautician List for customer
    public function getBeauticianList(){
        $post = file_get_contents('php://input');
        $val           = json_decode($post);
        $lat           = $val->lat;
        $long          = $val->long;
        $cat_id        = $val->cat_id;
        $user_id        = $val->user_id;

        if(!empty($lat) && !empty($long)) {
            $wheredata     = array(
                'lat'  => $lat,
                'long' => $long,
                'role' => 1
            ); 
            $Data = array();        
            $result = $this->AppModel->selectData('customers',$wheredata);
            if($result) {
                foreach ($result as $key) {
                  $wherefavourite     = array(
                      'from_id'  => $user_id,
                      'to_id'    => $key['customer_id'],
                  ); 
                  $favourite = $this->AppModel->selectAllById('favourite',$wherefavourite);
                  if ($favourite) {
                    $status = $favourite->is_status;
                  }else{
                    $status = '0';
                  }
                  $whereBeautiID     = array(
                      'beautician_id'  => $key['customer_id'],
                  );
                  $review = $this->AppModel->selectdata('beuticians_review', $whereBeautiID);
                  if ($review) {
                    foreach ($review as $res) {
                      $data_array[] = $res['rate'];
                      $resultdata[] = array(
                          'rate'            => $res['rate']
                      );
                    }
                    if (!empty($resultdata)) {
                      //Calculate the average.
                      $average = array_sum($data_array) / count($data_array);
                      $rate    = round($average,1);
                      $rate1   = $average;
                    }else{
                      $rate = [];
                    }
                  }else{
                      $rate = [];
                  }
                  $Data[] = array(
                    'beautician_id'      => $key['customer_id'],
                    'fullname'           => $key['first_name'] .' '. $key['last_name'],
                    'first_name'         => $key['first_name'],
                    'last_name'          => $key['last_name'],
                    'image'              => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$key['image'],
                    'profession'         => $key['profession'],
                    'price'              => $key['price'],
                    'lat'                => $key['lat'],
                    'long'               => $key['long'],
                    'rating'             => $rate,
                    'is_favourite'       => $status,
                    'created_at'         => $key['created_at']
                  );               
                }
                  $data_result['result'] = 'true';
                  $data_result['data']   = $Data;
                  $data_result['msg']    = 'Show Beautician list';
                }else{
                  $data_result['result']      = 'false';
                  $data_result['data']        = [];
                  $data_result['msg']         = 'Data not found!'; 
            }              
        }else{
                $data_result['result']      = 'false';
                $data_result['data']        = [];
                $data_result['msg']         = 'Data not found!'; 
        }

        if(!empty($cat_id)){
            $result = $this->AppModel->selectServiceCategory($cat_id);
            if($result){
                foreach ($result as $key) {
                    $whereID     = array(
                        'customer_id'  => $key['beautician_id'],
                    );   
                    $Data = $this->AppModel->selectAllById('customers',$whereID);
                    $wherefavourite     = array(
                      'from_id' => $user_id,
                      'to_id'   => $key['beautician_id'],
                    ); 
                    $favourite = $this->AppModel->selectAllById('favourite',$wherefavourite);
                    if ($favourite) {
                       $status = $favourite->is_status;
                    }else{
                      $status = '0';
                    }
                    $whereBeautiID     = array(
                        'beautician_id'  => $key['beautician_id'],
                    );
                    $review = $this->AppModel->selectdata('beuticians_review', $whereBeautiID);
                    if ($review) {
                      foreach ($review as $res) {
                        $data_array[] = $res['rate']; 
                        $resultdata[] = array(
                            'rate'            => $res['rate']
                        );
                      }
                      if (!empty($resultdata)) {
                        //Calculate the average.
                        $average = array_sum($data_array) / count($data_array);
                        $rate    = round($average,1);
                        $rate1   = $average;
                      }else{
                        $rate = [];
                      }
                    }else{
                        $rate = [];
                    }
                    $serviceData[] = array(
                    'service_id'         => $key['service_id'],
                    'service_name'       => $key['service_name'],
                    'service_picture'    => $key['service_picture'],
                    'service_cat_id'     => $key['service_cat_id'],
                    'beautician_id'      => $key['beautician_id'],
                    'location_details'   => $key['location_details'],
                    'price'              => $key['price'],
                    'rating'             => $rate,
                    'request_status'     => $key['request_status'],
                    'created_at'         => $key['created_at'],
                    'fullname'           => $Data->first_name .' '. $Data->last_name,
                    'first_name'         => $Data->first_name,
                    'last_name'          => $Data->last_name,
                    'profession'         => $Data->profession,
                    'image'              => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$Data->image,
                    'is_favourite'       => $status,
                    );               
                } 
                $data_result['result'] = 'true';
                $data_result['data']   = $serviceData;
                $data_result['msg']    = 'Show Services list'; 
                }else{
                $data_result['result'] = 'false';
                $data_result['data']   = [];
                $data_result['msg']    = 'Data not found!'; 
            }              
        }

       // if(empty($lat) && empty($long) && empty($cat_id)) {
       //      $wheredata     = array(
       //          'role' => 1
       //      ); 
       //      $Data = array();        
       //      $result = $this->AppModel->selectData('customers',$wheredata);
       //      if($result) {
       //          foreach ($result as $key) {
       //            $wherefavourite     = array(
       //                'from_id'  => $user_id,
       //                'to_id'    => $key['customer_id'],
       //            ); 
       //            $favourite = $this->AppModel->selectAllById('favourite',$wherefavourite);
       //            if ($favourite) {
       //             $status = $favourite->is_status;
       //            }else{
       //              $status = '0';
       //            }
       //            $Data[] = array(
       //              'id'                 => $key['customer_id'],
       //              'fullname'           => $key['first_name'] .' '. $key['last_name'],
       //              'first_name'         => $key['first_name'],
       //              'last_name'          => $key['last_name'],
       //              'image'              => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$key['image'],
       //              'profession'         => $key['profession'],
       //              'price'              => $key['price'],
       //              'rating'             => '4',
       //              'is_favourite'       => $status,
       //              'created_at'         => $key['created_at']
       //            );               
       //          }
       //            $data_result['result'] = 'true';
       //            $data_result['data']   = $Data;
       //            $data_result['msg']    = 'Show Beautician list';
       //          }else{
       //            $data_result['result']      = 'false';
       //            $data_result['data']        = [];
       //            $data_result['msg']         = 'Data not found!'; 
       //      }              
       //  }else{
       //          $data_result['result']      = 'false';
       //          $data_result['data']        = [];
       //          $data_result['msg']         = 'Data not found!'; 
       //  }

        //if (empty($lat) && empty($long) && empty($cat_id)) {
        //  $services = $this->AppModel->selectBeauticianServices();
        //  print_r($services);
        //   if($services){
        //         foreach ($services as $key) {
        //             $wherefavourite     = array(
        //               'from_id'  => $user_id,
        //               'to_id'    => $key['beautician_id'],
        //             ); 
        //             $favourite = $this->AppModel->record_count('favourite',$wherefavourite);
        //             if ($favourite > 0) {
        //                 $fav_status = '1';
        //             }else{
        //                 $fav_status = '0';
        //             }
        //             $serviceData[] = array(
        //               'service_id'         => $key['service_id'],
        //               'service_name'       => $key['service_name'],
        //               'service_picture'    => $key['service_picture'],
        //               'service_cat_id'     => $key['service_cat_id'],
        //               'beautician_id'      => $key['beautician_id'],
        //               'location_details'   => $key['location_details'],
        //               'price'              => $key['price'],
        //               'rating'             => '4',
        //               'request_status'     => $key['request_status'],
        //               'created_at'         => $key['created_at'],
        //               'fullname'           => $key['first_name'].' '.$key['last_name'],
        //               'first_name'         => $key['first_name'],
        //               'last_name'          => $key['last_name'],
        //               'profession'         => $key['profession'],
        //               'image'              => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$key['image'],
        //             'is_favourite'         => $fav_status,
        //             );               
        //         } 
        //           $data_result['result'] = 'true';
        //           $data_result['data']   = $serviceData;
        //           $data_result['msg']    = 'Show Services list'; 
        //         }else{
        //           $data_result['result'] = 'false';
        //           $data_result['data']   = [];
        //           $data_result['msg']    = 'Data not found!'; 
        //     }    
        // }

        echo json_encode($data_result);

    }

    // Api for get single beautician services and reviews list 
    public function getSingleBeauticianServiceList(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $beautician_id = $val->beautician_id;
        $whereID = array(
            'customer_id'  => $beautician_id,
        );   
        $Data = $this->AppModel->selectAllById('customers',$whereID);
        if($Data){
            $whereBeautiID     = array(
                'beautician_id'  => $Data->customer_id,
            );
            $review = $this->AppModel->selectdata('customer_review', $whereBeautiID);
            if ($review) {
              foreach ($review as $res) {
                $data_array[] = $res['rate'];
                $resultdata[] = array(
                    'rate'            => $res['rate']
                );
              }
              if (!empty($resultdata)) {
                //Calculate the average.
                $average = array_sum($data_array) / count($data_array);
                $rate    = round($average,1);
                $rate1   = $average;
              }else{
                $rate = [];
              }
            }else{
                $rate = [];
            }
             $beautician_data = array(
              'beautician_id'      => $Data->customer_id,
              'first_name'         => $Data->first_name,
              'last_name'          => $Data->last_name,
              'profession'         => $Data->profession,
              'image'              => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$Data->image,
              'rating'             => $rate,
              'price'              => $Data->price
            ); 
            $wheredata     = array(
                'beautician_id'  => $beautician_id,
            );       
            $result = $this->AppModel->selectData('services',$wheredata, 'service_id DESC');
            $serviceData = array();
            foreach ($result as $key) { 
                $serviceData[] = array(
                    'service_id'         => $key['service_id'],
                    'service_name'       => $key['service_name'],
                    'service_picture'    => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/service/'.$key['service_picture'],
                    'service_cat_id'     => $key['service_cat_id'],
                    'service_description'=> $key['service_description'],
                    'location_details'   => $key['location_details'],
                    'price'              => $key['price'],
                    'review'             => "4",//$review,
                    'request_status'     => $key['request_status'],
                    'created_at'         => $key['created_at']
                );
            }
            $whereBeuticianID     = array(
                'beautician_id'  => $beautician_id,
            );
            $reviewData = $this->AppModel->selectData('customer_review',$whereBeuticianID);
            // print_r($reviewData);die;
            $reviewsss = array();
            if ($reviewData) {
                foreach ($reviewData as $b) {
                    $whereCustomerID     = array(
                        'customer_id'  => $b['customer_id'],
                    );   
                    $cdata = $this->AppModel->selectAllById('customers',$whereCustomerID);
                    $reviewsss[] = array(
                        'review_id'          => $b['review_id'],
                        'beautician_id'      => $b['customer_id'],
                        'service_id'         => $b['service_id'],
                        'rate'               => $b['rate'],
                        'review'             => $b['review'],
                        'created_at'         => $b['created_at'],
                        'customer_id'        => $cdata->customer_id,
                        'first_name'         => $cdata->first_name,
                        'last_name'          => $cdata->last_name,
                        'image'              => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$cdata->image,
                        'rating'             => '4',
                        'review_date'        => date_format(date_create($b['created_at']), "F d Y")
                    );
                }
            }
            
            if (empty($beautician_data) ) {
              $beautician_data = [];
            }
            if (empty($serviceData)){
                $serviceData = [];
            }
            if (empty($reviewsss)) {
                $reviewsss = [];
            }

            $ServicesReview = array(
                'beautician_data' => $beautician_data,
                'services'        => $serviceData, 
                'review'          => $reviewsss
            );
            $data_result['result'] = 'true';
            $data_result['data']   = $ServicesReview;
            $data_result['msg']    = 'Show Beutician Services And list'; 
            }else{
            $data_result['result'] = 'false';
            $data_result['data']   = [];
            $data_result['msg']    = 'Data not found!'; 
        }
        echo json_encode($data_result);
    }

    public function getBeauticianServiceList(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $beautician_id = $val->beautician_id;
        // $whereID = array(
        //             'customer_id'  => $beautician_id,
        //         );   
        // $Data = $this->AppModel->selectAllById('customers',$whereID);
        // $beautician_data = array(
        //     'beautician_id'      => $Data->customer_id,
        //     'first_name'         => $Data->first_name,
        //     'last_name'          => $Data->last_name,
        //     'profession'         => $Data->profession,
        //     'image'              => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$Data->image,
        //     'rating' => '4',
        //     'price' => '$12.00'
        // ); 
        $wheredata     = array(
            'beautician_id'  => $beautician_id,
        );       
        $result = $this->AppModel->selectData('services',$wheredata);
        $serviceData = array();
        if($result){
            foreach ($result as $key) { 
                $serviceData[] = array(
                    'service_id'         => $key['service_id'],
                    'service_name'       => $key['service_name'],
                    'service_picture'    => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/service/'.$key['service_picture'],
                    'service_cat_id'     => $key['service_cat_id'],
                    'service_description'=> $key['service_description'],
                    'location_details'   => $key['location_details'],
                    'price'              => $key['price'],
                    'time'              => $key['time'],
                    'review'             => "4",//$review,
                    'request_status'     => $key['request_status'],
                    'created_at'         => $key['created_at']
                );
            }
            $whereBeuticianID     = array(
                'beautician_id'  => $beautician_id,
            );
            $Services = array(
                // 'beautician_data' => $beautician_data,
                'services'        => $serviceData
            );
            $data_result['result'] = 'true';
            $data_result['data']   = $Services;
            $data_result['msg']    = 'Show Beutician Services list'; 
            }else{
            $data_result['result'] = 'false';
            $data_result['data']   = [];
            $data_result['msg']    = 'Data not found!'; 
        }
        echo json_encode($data_result);
    }

    // Api for create appiontment 
    public function createAppointment(){
        $post  = file_get_contents('php://input');
        $val   = json_decode($post);
        $customer_id      = $val->customer_id;
        $beautician_id    = $val->beautician_id;
        $service_id       = $val->service_id;
        $date             = $val->date;
        $time             = $val->time;
        $location         = $val->location;
        $duration         = $val->duration;
        $request          = $val->request;
        $service_id       = $val->service_id;

        $where_data = array(
            'date'         => $date,
            'time'         => $time
        );
        $result  = $this->AppModel->singleRow($where_data,'appointment');
        if($result){            
            $output['result']   = 'false';
            $output['msg']      = "Appointment already exists.";
        }else{
            $appData =array(
                 'customer_id'          => $customer_id,
                 'beautician_id'        => $beautician_id,
                 'service_id'           => $service_id,
                 'date'                 => $date,
                 'time'                 => $time,
                 'location'             => $location,
                 'duration'             => $duration,
                 'special_request'      => $request,
                 'service_id'           => $service_id,
            );
            $res  = $this->AppModel->insert($appData,'appointment');
            if ($res) {
                $output['result']          = 'true';
                $output['appointment_id']  = $res;
                $output['msg']             = 'Appointment created Successfully!';        
            }else{
                $output['result']          = 'false';
                $output['appointment_id']  = 0;
                $output['msg']             = "Appointment not created.";
            }  

        }       
        echo json_encode($output);
    }

    // Api for create appiontment 
    public function createBeauticianReview(){
        $post  = file_get_contents('php://input');
        $val   = json_decode($post);
        $beautician_id    = $val->beautician_id;
        $customer_id      = $val->customer_id;
        $service_id       = $val->service_id;
        $rate             = $val->rate;
        $review           = $val->review;
        $Data = array(
         'beautician_id'  => $beautician_id,
         'customer_id'    => $customer_id,
         'service_id'     => $service_id,
         'rate'           => $rate,
         'review'         => $review
        );
        $res  = $this->AppModel->insert($Data,'beuticians_review');
        if ($res) {
            $output['result']     = 'true';
            $output['review_id']  = $res;
            $output['msg']        = 'Review created Successfully!';        
        }else{
            $output['result']   = 'false';
            $output['msg']      = "Review not created.";
        }   
        echo json_encode($output);
    }

    // Api for create Comment 
    public function createComment(){
        $post  = file_get_contents('php://input');
        $val   = json_decode($post);
        $Data =array(
             'beautician_id'  => $val->beautician_id,
             'customer_id'    => $val->customer_id,
             'comment'        => $val->comment,
             'service_id'     => $val->service_id
        );
        $res  = $this->AppModel->insert($Data,'comment');
        if ($res) {
            $output['result']     = 'true';
            $output['comment_id']  = $res;
            $output['msg']        = 'Comment added Successfully!';        
        }else{
            $output['result']   = 'false';
            $output['msg']      = "comment not added.";
        }   
        echo json_encode($output);
    }

    public function customerAppointmentList(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $customer_id = $val->customer_id;
        $wherecID = array(
           'customer_id'  => $val->customer_id
        );   
        $fatchData    = $this->AppModel->selectAllById('customers',$wherecID);
        $customerData = array(
            'customer_id' => $fatchData->customer_id,
            'first_name'  => $fatchData->first_name,
            'last_name'   => $fatchData->last_name,
            'profession'  => $fatchData->profession,
            'image'       => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$fatchData->image
        );
        $result = $this->Model->selectAppointment($customer_id);
        if($result){
            foreach ($result as $key) {
                $whereID = array(
                    'customer_id'  => $key['beautician_id']
                );   
                $Data = $this->AppModel->selectAllById('customers',$whereID);
                $status = '';
                if ($key['is_status'] == 0) {
                       $status = "pending";
                }elseif ($key['is_status'] == 1) {
                   $status = "accepted";
                }elseif ($key['is_status'] == 2) {
                   $status = "confirmed";
                }elseif ($key['is_status'] == 3) {
                   $status = "closed";
                }elseif ($key['is_status'] == 4) {
                       $status = "complete";
                }elseif ($key['is_status'] == 5) {
                       $status = "cancled";
                }elseif ($key['is_status'] == 6) {
                       $status = "reject";
                }
                $appointmentData[] = array(                    
                    'appointment_id'       => $key['appointment_id'],                    
                    'date'                 => $key['date'],
                    'time'                 => $key['time'],
                    'availability_status'  => $key['availability_status'],
                    'is_status'            => $status,
                    'service_id'           => $key['service_id'],
                    'created_at'           => $key['created_at'],
                    'beautician_id'        => $Data->customer_id,
                    'first_name'           => $Data->first_name,
                    'last_name'            => $Data->last_name,
                    'profession'           => $Data->profession,
                    'image'                => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$Data->image
                );
            }
        }
        $where1 = array(
            'customer_id' => $val->customer_id,
            'is_status'   => '4'
        );
        $result1 = $this->Model->selectData('appointment', $where1, 'appointment_id asc'); 
        if($result1){
            foreach ($result1 as $key1) {
                $whereID = array(
                    'customer_id'  => $key1['beautician_id']
                );   
                $Data1    = $this->AppModel->selectAllById('customers',$whereID);

                $whereBeuticianID = array(
                    'beautician_id'  => $key1['beautician_id']
                ); 
                $review1 = $this->AppModel->record_count('beuticians_review',$whereBeuticianID);
                $status1 = '';
                if ($key1['is_status'] == 4) {
                       $status1 = "complete";
                }
                $history[] = array(                    
                    'appointment_id'       => $key1['appointment_id'],                    
                    'date'                 => $key1['date'],
                    'time'                 => $key1['time'],
                    'availability_status'  => $key1['availability_status'],
                    'is_status'            => $status1,
                    'service_id'           => $key1['service_id'],
                    'created_at'           => $key1['created_at'],
                    'beautician_id'        => $Data1->customer_id,
                    'first_name'           => $Data1->first_name,
                    'last_name'            => $Data1->last_name,
                    'profession'           => $Data1->profession,
                    'image'                => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$Data1->image
                );
            } 
        }
        if (empty($customerData) ) {
            $customerData = [];
        }
        if (empty($appointmentData)){
            $appointmentData = [];
        }
        if (empty($history)) {
            $history = [];
        }
        $AppointmentList = array(
            'customerData' => $customerData,
            'active'       => $appointmentData,
            'history'      => $history 
        );
        if (!empty($AppointmentList)) {
            $data_result['result'] = 'true';
            $data_result['data']   = $AppointmentList;
            $data_result['msg']    = 'Appointment List';
        }else{
            $data_result['result'] = 'true';
            $data_result['data']   = [];
            $data_result['msg']    = 'Appointment not available';
        } 
        echo json_encode($data_result); 
    }

    public function customerAppointmentDetails(){

        $post = file_get_contents('php://input');
        $val  = json_decode($post);

        $whereID = array(
                    'appointment_id'  => $val->appointment_id,
                    'beautician_id'   => $val->beautician_id
        );
        $result = $this->AppModel->selectAllById('appointment',$whereID);
        if($result){ 
            $service_id = $result->service_id;
            $ids = rtrim($service_id,',');
            $fatchservicesData = $this->AppModel->selectServices($ids);
            // /print_r($fatchservicesData);die;
            foreach ($fatchservicesData as $key) {
                $services[] = array(
                    'service_id'      => $key['service_id'],
                    'service_name'    => $key['service_name'],
                    'service_description' => $key['service_description'],
                    'service_picture' => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/service/'.$key['service_picture'], 
                    'service_cat_id'  => $key['service_cat_id'],
                    'special_request' => $key['special_request'],
                    'price'           => $key['price']
                );
            $whereID = array(
                    'customer_id'  => $result->beautician_id
            );   
            $beauticianData    = $this->AppModel->selectAllById('customers',$whereID);
            $whereBeuticianID     = array(
                    'beautician_id'  => $key['beautician_id'],
            ); 
            $review = $this->AppModel->record_count('beuticians_review',$whereBeuticianID);
            $beautician_data  = array(
                'beautician_id'        => $beauticianData->customer_id,
                'first_name'           => $beauticianData->first_name,
                'last_name'            => $beauticianData->last_name,
                'profession'           => $beauticianData->profession,
                'image'                => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$beauticianData->image, 
                'rating'               => '4',
                'price'               => '$11.00-$14.00'
            );
            $status = '';
            if ($result->is_status == 0) {
                   $status = "pending";
            }elseif ($result->is_status == 1) {
               $status = "accepted";
            }elseif ($result->is_status == 2) {
               $status = "confirmed";
            }elseif ($result->is_status == 3) {
               $status = "closed";
            }elseif ($result->is_status == 4) {
                   $status = "complete";
            }elseif ($result->is_status == 5) {
                   $status = "cancled";
            }

            $AppointmentDetails = array(                    
                'appointment_id'       => $result->appointment_id,                    
                'date'                 => $result->date,
                'time'                 => $result->time,
                'duration'             => $result->duration,
                'location'             => $result->location,
                'availability_status'  => $result->availability_status,
                'is_status'            => $status,
                'special_request'      => $result->special_request,
                'created_at'           => $result->created_at
                );
            }
            $AppointmentDetailsData = array(
                'AppointmentDetails'   => $AppointmentDetails,
                'beautician_data'      => $beautician_data,
                'services'             => $services,
                );
            }
            $data_result['result'] = 'true';
            $data_result['data']   = $AppointmentDetailsData;
            $data_result['msg']    = 'Appointment details';
            echo json_encode($data_result);

    }

    public function favoriteList(){

        $post = file_get_contents('php://input');
        $val  = json_decode($post);

        $whereID = array(
            'from_id'       => $val->from_id,
            'is_status'     => 1
        );
        $result = $this->AppModel->selectData('favourite',$whereID);
        if($result) {
            foreach ($result as $key) {
                $whereID = array(
                    'customer_id'  => $key['to_id']
                );   
                $fatchdata    = $this->AppModel->selectAllById('customers',$whereID);

                $Data[] = array(
                    'favourite_id'         => $key['favourite_id'],
                    'beautician_id'        => $fatchdata->customer_id,
                    'first_name'           => $fatchdata->first_name,
                    'last_name'            => $fatchdata->last_name,
                    'profession'           => $fatchdata->profession,
                    'price'                => $fatchdata->price,
                    'rating'               => '4',
                    'image'                => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$fatchdata->image
                );
            }
                $data_result['result'] = 'true';
                $data_result['data'] = $Data;
                $data_result['msg']    = 'favourite list';
        }else {
                $data_result['result'] = 'false';
                $data_result['data'] = [];
                $data_result['msg']    = 'Data  not available';
        }
        echo json_encode($data_result);
    }

    public function createCustomerReview(){
        $post  = file_get_contents('php://input');
        $val   = json_decode($post);

        $review =array(
            'beautician_id'   => $val->beautician_id,
            'customer_id'     => $val->customer_id,
            'rate'            => $val->rate,
            'review'          => $val->review,
            'service_id'      => $val->service_id
        );
        $res  = $this->AppModel->insert($review,'customer_review');

        if ($res) {
            $output['result']     = 'true';
            $output['msg']        = 'Review created Successfully!';        
        }else{
            $output['result']   = 'false';
            $output['msg']      = "Review not created.";
        }      
        echo json_encode($output);
    }

    public function chat(){
        $post = file_get_contents('php://input');
        $val=json_decode($post);
        $from_id      = $val->from_id;
        $to_id        = $val->to_id;
        $message      = $val->message;
        // $service_id   = $val->service_id;
        $message_type = $val->message_type;

                $sql= $this->db->query("SELECT * FROM `chat` where (from_id='$from_id' and to_id= '$to_id') or (to_id= '$from_id' and from_id= '$to_id')");
                // print_r($sql);die;
                $row=$sql->row();
                if($row){
                    $data_msg = array(
                     'chat_id'      => $row->chat_id,
                     'message'      => $message,
                     'msg_type'     => $message_type,
                     'from_id'      => $from_id,
                     'to_id'        => $to_id 
                    );
                    $create  = $this->AppModel->insert($data_msg,'chat_data');
                    if($create){
                        $data_result['result']    ='true';
                        $data_result['chat']      =$row;
                        $data_result['chat_data'] =$data_msg;
                    }else{
                        $data_result['result'] ='false';
                        $data_result['msg']    ="something wrong";
                    }
                }
                else{
                    $data = array(
                        'from_id'         => $from_id,
                        'to_id'           => $to_id,
                        'msg_type'        => $message_type
                    );
                    $res  = $this->AppModel->insert($data,'chat');
                    if($res){
                        $where_data = array(
                            'chat_id'     => $this->db->insert_id(),
                            'message'     => $message,
                            'msg_type'    => $message_type,
                            'from_id'     => $from_id,
                            'to_id'       => $to_id
                        );
                        $result   = $this->AppModel->insert($where_data,'chat_data');
                       if($result){
                            $data_result['result']    ='true';
                            $data_result['chat']      =$res;
                            $data_result['chat_data'] =$where_data;
                        }else{
                            $data_result['result'] ='false';
                            $data_result['msg']    ="something wrong create";
                        }
                    }else{
                        $data_result['result'] ='false';
                        $data_result['msg']    ="something wrong create 2";
                    }   
                }

        echo json_encode($data_result);
    }

    public function getChatList(){

        $post  = file_get_contents('php://input');
        $val   = json_decode($post);
        $chatData = $this->AppModel->selectchatdata($val->from_id);
        // print_r($chatData);die;
        if($chatData) {
            foreach ($chatData as $value) {
                $all_data[]   = array(
                    'chat_id'         => $value['chat_id'],
                    'from_id'         => $value['from_id'],
                    'to_id'           => $value['to_id'],
                    'message'         => $value['message'],
                    'date'            => date_format(date_create($value['datetime']), "F d Y"),
                    'first_name'      => $value['first_name'],
                    'last_name'       => $value['last_name'],
                    'profession'      => $value['profession'],
                    'image'           => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$value['image'],
                    // 'service_id'      => $value['service_id']
                );  
            }
           $data_result['result']     = 'true';
           $data_result['data']       = $all_data; 
           $data_result['msg']        = 'Data fatch Successfully!'; 
        }else {
           $data_result['result']     = 'false';
           $data_result['data']       = []; 
           $data_result['msg']        = 'Data not available!'; 
        }
        echo json_encode($data_result);
     }

     public function getSingleChatList(){

        $post  = file_get_contents('php://input');
        $val   = json_decode($post);
        $chat_id = $val->chat_id;
        $whereChatId = array(
            'chat_id'           => $val->chat_id,
            'from_status'       => '0',
            'to_status'         => '0',
        );
        $chatSingleData = $this->AppModel->selectData('chat_data',$whereChatId);
        if($chatSingleData) {
          foreach ($chatSingleData as $value) {
                // print_r($value['datetime']);die;
                 $all_data[]   = array(
                    'chat_id'         => $value['chat_id'],
                    'from_id'         => $value['from_id'],
                    'to_id'           => $value['to_id'],
                    'message'         => $value['message'],
                    'msg_type'        => $value['msg_type'],
                    'date'            => date_format(date_create($value['datetime']), "F d Y h:i A"),
                    // 'first_name'      => $value['first_name'],
                    // 'last_name'       => $value['last_name'],
                    // 'profession'      => $value['profession'],
                    // 'image'           => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$value['image'],
                    // 'service_id'      => $value['service_id']
                );  
            }
            $data_result['result']     = 'true';
            $data_result['data']       = $all_data; 
            $data_result['msg']        = 'Data fatch Successfully';
        }else {
           $data_result['result']     = 'false';
           $data_result['data']       = []; 
           $data_result['msg']        = 'Data not available!'; 
        }
        echo json_encode($data_result);
     }

     public function getAvailability(){

        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $date = $val->date;
        $beautician_id = $val->beautician_id;
        // $month_appointment = $this->AppModel->selectAvailability($date);
        // if($month_appointment) {
        // $where_slot = array(
        // 'date' => $month_appointment[0]['date'],
        // 'beautician_id'=>$beautician_id
        // );
        // $slot = $this->AppModel->selectData('appointment',$where_slot);
        // // if ($slot) {
        // // foreach ($slot as $s) {
        // // $a1[] = array(
        // // 'time' => $s['time'], 
        // // 'status' => 'book',
        // // 'color' => 'orange'
        // // );
        // // } 
        // // }
        // }
        $starttime = '8:00AM'; // Start time
        $endtime = '12:00PM'; // End time
        $duration = '30'; // split by 30 mins

        $array_of_time = array ();
        $start_time = strtotime ($starttime); 
        $end_time = strtotime ($endtime); 

        $add_mins = $duration * 60;

        while ($start_time <= $end_time) 
        {
        $array_of_time[] = date ("h:ia", $start_time);
        $start_time += $add_mins; // 
        }
        $j = 0;
        $timeArray = array();
        for($i = 0; $i < count($array_of_time) ;$i++) {
        $j++;
        if(count($array_of_time) > $j)
        $timeArray[] = array('time' => $array_of_time[$i]." - ".$array_of_time[$j], 'status' => 'avialalbe','color' => 'green') ;
        }

        // $array_mearge=array_intersect($a1,$timeArray);
        // // print_r($result);
        // print_r($a1);
        // echo "<pre>";
        // print_r($timeArray);die;

        $data_result['result'] = 'true';
        $data_result['data'] = $timeArray; 
        $data_result['msg'] = 'booked slot for that day'; 
        echo json_encode($data_result);

        // else{
        // // $a1[] = array(
        // // 'slot_time' => 'all', 
        // // 'status' => 'available'
        // // ); 
        // // $data_result['result'] = 'false';
        // // $data_result['data'] = $a1; 
        // // $data_result['msg'] = 'All slot are available for that day!'; 
        // }
}

 public function getAvailability_old(){

  $post = file_get_contents('php://input');
  $val = json_decode($post);
  $date           = $val->date;
  $beautician_id  = $val->beautician_id;
  $user_id        = $val->user_id;
  $month_appointment = $this->AppModel->selectCustomerAppointmentAvailability($date,$beautician_id,$user_id);
  if($month_appointment) {
    //$appo_dates = $month_appointment[0]['date'];
    $where_slot = array(
      'date' => $month_appointment[0]['date']
    );
    $slot = $this->AppModel->selectData('appointment',$where_slot);
   // $slot = $this->AppModel->checkSlotTime($appo_dates);
    // print_r($slot);die;
    if ($slot) {
      foreach ($slot as $s) {
        $str        = $s['time'];
        $check      = explode('-', $str);
        $stripped   = preg_replace('/\s+/', ' ', $check[1]);
        $start_time = str_replace(' ', '', $stripped);
        $stripped1  = preg_replace('/\s+/', ' ', $check[1]);
        $end_time   = str_replace(' ', '', $stripped1);
        $bookedSlot[] = array(
          'time'       =>$s['time'],
          'start_time' =>$start_time, 
          'end_time'   =>$end_time,
          'status'     =>'book'
        );
      } 
    }

    $data_result['result'] = 'true';
    $data_result['data'] = $bookedSlot; 
    $data_result['msg'] = 'booked slot for that day'; 
  }else {
    $arrayName[] = array(
      'slot_time' => 'all', 
      'status' => 'available'
    ); 
    $data_result['result'] = 'false';
    $data_result['data'] = $arrayName; 
    $data_result['msg'] = 'All slot are available for that day!'; 
  }
  echo json_encode($data_result);
}

public function checkAvailability(){
  $post = file_get_contents('php://input');
  $val = json_decode($post);
  $date = $val->date;
  $beautician_id = $val->beautician_id;
  $date_arr = explode('-', $date);
  $year  = $date_arr[0];
  $month = $date_arr[1];
  $start_date = "01-".$month."-".$year;
  $start_time = strtotime($start_date);
  $end_time = strtotime("+1 month", $start_time);
  for($i=$start_time; $i<$end_time; $i+=86400)
  {
    $list = date('Y-m-d', $i);
    $appiontment_list = $this->AppModel->checkMonthAppointment($list, $beautician_id);
      if (empty($appiontment_list)) {
        $arrayName = array(
          'date'    => $list,
          'book'    => '0', 
          'color'   => 'Orange',
          'booking' => 'Available',
      );
      }else{
        if (!empty($appiontment_list)) {
            foreach ($appiontment_list as $value) {
              $count = $this->AppModel->checkMonthAppointment1($value['date'], $beautician_id);
              if ($count == 10) {
                 $color = 'Pink';
                 $booking = 'Full';
              }
              if ($count < 10) {
                 $color   = 'Pink';
                 $booking = 'Available';
              }
              $arrayName = array(
                'date'    => $value['date'],
                'book'    => $count,
                'color'   => $color,
                'booking' => $booking,
              );
            }
         }
     }
    $result_dd[]  = $arrayName;
  }
  $data_result['result'] = 'true';
  $data_result['data'] = $result_dd; 
  $data_result['msg'] = 'booked slot for that day';

  echo json_encode($data_result);
}



public function checkAvailability1(){
  $post = file_get_contents('php://input');
  $val = json_decode($post);
  $date = $val->date;
  $beautician_id = $val->beautician_id;
  $customer_id   = $val->customer_id;
  $date_arr = explode('-', $date);
  $year  = $date_arr[0];
  $month = $date_arr[1];
  $start_date = "01-".$month."-".$year;
  $start_time = strtotime($start_date);
  $end_time = strtotime("+1 month", $start_time);
  for($i=$start_time; $i<$end_time; $i+=86400)
  {
    $list = date('d-m-Y', $i);
    $appiontment_list = $this->AppModel->checkAviableMonthAppointment($list, $beautician_id);
      echo '<pre>'; print_r($appiontment_list);
      if(empty($appiontment_list)) {
        $arrayName = array(
          'date'    => $list,
          'book'    => '0', 
          'color'   => 'Orange',
          'booking' => 'Available',
        );
      }else{
        if (!empty($appiontment_list)) {
            foreach ($appiontment_list as $value) {
              $count = $this->AppModel->checkMonthAppointment1($value['date'], $beautician_id);
              echo '<pre>'; print_r($count);
              
              
              if ($count == 10) {
                 $color = 'Pink';
                 $booking = 'Full';
              }
              if ($count < 10) {
                 $color   = 'Pink';
                 $booking = 'Available';
              }
              // $arrayName = array(
              //   'date'    => $value['date'],
              //   'book'    => $count,
              //   'color'   => $color,
              //   'booking' => $booking,
              // );
            }
         }
     }
    //$result_dd[]  = $arrayName;
  }
  die;
  $data_result['result'] = 'true';
  $data_result['data'] = $result_dd; 
  $data_result['msg'] = 'booked slot for that day';

  echo json_encode($data_result);
}




 public function getSlot(){
    $post = file_get_contents('php://input');
    $val = json_decode($post);
    $slots = $this->AppModel->select('slot_time');
    if ($slots) {
        foreach ($slots as $s) {
            $arrayName[] = array(
                'slot_time' => $s['slot'],
                'is_status' => '0', 
                'color'     => 'Orange'
            );
        }
        $data_result['result'] = 'true';
        $data_result['data'] = $arrayName; 
        $data_result['msg'] = 'Slot List'; 
    }else{
        $data_result['result'] = 'false';
        $data_result['msg'] = 'not found'; 
    }     
  echo json_encode($data_result);
} 

   
 public function getAvailabilitySlot(){
    $post = file_get_contents('php://input');
    $val = json_decode($post);
    $date           = $val->date;
    $beautician_id  = $val->beautician_id;
    $customer_id    = $val->customer_id;


    $where = array(
        'customer_id'   => $customer_id,
        'beautician_id' => $beautician_id,
        'date'          => $date,
        'is_status'     => '0'
    );
    $count = $this->AppModel->record_count('appointment', $where);
    if ($count == 0) {
        $slot = $this->AppModel->select('slot_time');
        if ($slot) {
            foreach ($slot as $s) 
            {
                $arrayName[] = array(
                    'slot_time' => $s['slot'],
                    'is_status' => '0', 
                    'color'     => 'Orange'
                );
            }
        }
    }else{

            $where = array(
                'customer_id'   => $customer_id,
                'beautician_id' => $beautician_id,
                'date'          => $date,
                'is_status'     => '1'
            );
            $checkSlots = $this->AppModel->selectdata('appointment', $where);
            if ($checkSlots) {
                 foreach ($checkSlots as $key) {
                   $arrayName[] = array(
                        'slot_time' => $key['time'],
                        'is_status' => $key['is_status'], 
                        'color'     => 'Green',
                    );  
                 }
            
            }else{

                $where = array(
                    'customer_id'   => $customer_id,
                    'beautician_id' => $beautician_id,
                    'date'          => $date,
                    'is_status'     => '0'
                );
                $checkSlots = $this->AppModel->selectdata('appointment', $where);
                if ($checkSlots) {
                     foreach ($checkSlots as $key) {
                       $arrayName[] = array(
                            'slot_time' => $key['time'],
                            'is_status' => $key['is_status'], 
                            'color'     => 'Pink',
                        );  
                     }
                }
            }
        
    }
    $data_result['result'] = 'true';
    $data_result['data'] = $arrayName; 
    $data_result['msg'] = 'Available slot for that day!';      
  echo json_encode($data_result);
} 


public function getBeauticianAppointmentAvailability(){
  $post = file_get_contents('php://input');
  $val = json_decode($post);
  $date          = $val->date;
  $beautician_id = $val->beautician_id;
  $date_arr      = explode('-', $date);
  $year  = $date_arr[0];
  $month = $date_arr[1];
  $start_date = "01-".$month."-".$year;
  $start_time = strtotime($start_date);
  $end_time = strtotime("+1 month", $start_time);
  for($i=$start_time; $i<$end_time; $i+=86400)
  {
    $list = date('Y-m-d', $i);
    $appiontment_list = $this->AppModel->checkMonthAppointment($list, $beautician_id);
      if (empty($appiontment_list)) {
        $arrayName = array(
          'date'    => $list,
          'book'    => '0', 
          'color'   => 'Orange',
          'booking' => 'Available',
      );
      }else{
        if (!empty($appiontment_list)) {
            foreach ($appiontment_list as $value) {
              $count = $this->AppModel->checkMonthAppointment1($value['date'], $beautician_id);
              if ($count == 10) {
                 $color = 'Pink';
                 $booking = 'Full';
              }
              if ($count < 10) {
                 $color   = 'Pink';
                 $booking = 'Available';
              }
              $arrayName = array(
                'date'    => $value['date'],
                'book'    => $count,
                'color'   => $color,
                'booking' => $booking,
              );
            }
         }
     }
    $result_dd[]  = $arrayName;
  }
  $data_result['result'] = 'true';
  $data_result['data'] = $result_dd; 
  $data_result['msg'] = 'booked slot for that day';

  echo json_encode($data_result);
}

public function getBeauticianSlotAvailability(){

  $post = file_get_contents('php://input');
  $val = json_decode($post);
  $date           = $val->date;
  $beautician_id  = $val->beautician_id;
  $month_appointment = $this->AppModel->selectBeauticianSlotAvailability($date,$beautician_id);
  if($month_appointment) {
    //$appo_dates = $month_appointment[0]['date'];
    $where_slot = array(
      'date' => $month_appointment[0]['date']
    );
    $slot = $this->AppModel->selectData('appointment',$where_slot);
   // $slot = $this->AppModel->checkSlotTime($appo_dates);
    // print_r($slot);die;
    if ($slot) {
      foreach ($slot as $s) {
        $str        = $s['time'];
        $check      = explode('-', $str);
        $stripped   = preg_replace('/\s+/', ' ', $check[1]);
        $start_time = str_replace(' ', '', $stripped);
        $stripped1  = preg_replace('/\s+/', ' ', $check[1]);
        $end_time   = str_replace(' ', '', $stripped1);
        $bookedSlot[] = array(
          'time'       =>$s['time'],
          'start_time' =>$start_time, 
          'end_time'   =>$end_time,
          'status'     =>'book'
        );
      } 
    }

    $data_result['result'] = 'true';
    $data_result['data'] = $bookedSlot; 
    $data_result['msg'] = 'booked slot for that day'; 
  }else {
    $arrayName[] = array(
      'slot_time' => 'all', 
      'status' => 'available'
    ); 
    $data_result['result'] = 'false';
    $data_result['data'] = $arrayName; 
    $data_result['msg'] = 'All slot are available for that day!'; 
  }
  echo json_encode($data_result);
}

// public function checkAvailability(){

//       $post = file_get_contents('php://input');
//       $val = json_decode($post);
//       $date = $val->date;
//       $beautician_id = $val->beautician_id;
//       $date_arr = explode('-', $date);
//       $year  = $date_arr[0];
//       $month = $date_arr[1];
//       $start_date = "01-".$month."-".$year;
//       $start_time = strtotime($start_date);

//       $end_time = strtotime("+1 month", $start_time);

//       for($i=$start_time; $i<$end_time; $i+=86400)
//       {
//          $list = date('Y-m-d', $i);
//          $appiontment_list = $this->AppModel->checkMonthAppointment($list, $beautician_id);
//          if (empty($appiontment_list)) {
//             $arrayName = array(
//               'date' => $list,
//               'book' => '0', 
//               'color'   => 'Orange',
//               'booking' => 'Available',
//             );
//          }else{
//              if (!empty($appiontment_list)) {
//                 foreach ($appiontment_list as $value) {
//                   $count = $this->AppModel->checkMonthAppointment1($value['date'], $beautician_id);
//                   if ($count == 10) {
//                      $color = 'Pink';
//                      $booking = 'Full';
//                   }
//                   if ($count < 10) {
//                      $color   = 'Pink';
//                      $booking = 'Available';
//                   }
//                   $arrayName = array(
//                     'date'    => $value['date'],
//                     'book'    => $count,
//                     'color'   => $color,
//                     'booking' => $booking,
//                   );
//                 }
//              }
//          }
//         $result_dd[]  = $arrayName;
//       }
//         $data_result['result'] = 'true';
//         $data_result['data'] = $result_dd; 
//         $data_result['msg'] = 'booked slot for that day';

//       echo json_encode($data_result);
// }

     // public function getAvailability(){

     //    $post  = file_get_contents('php://input');
     //    $val   = json_decode($post);
     //    $date = $val->date;
     //    $beautician_id = $val->beautician_id;
     //    $month_appointment = $this->AppModel->selectAvailability($date);
     //    if($month_appointment) {
     //        $where_slot = array(
     //            'date' => $month_appointment[0]['date'],
     //            'beautician_id'=>$beautician_id
     //        );
     //        $slot = $this->AppModel->selectData('appointment',$where_slot);
     //        if ($slot) {
     //            foreach ($slot as $s) {
     //                $a1[] = array(
     //                    'time'      => $s['time'], 
     //                    'status'    => 'book',
     //                    'color'     => 'orange'
     //                );
     //            }    
     //        }
     //    }
     //        $starttime = '8:00AM'; // Start time
     //        $endtime = '12:00PM'; // End time
     //        $duration = '30'; // split by 30 mins

     //        $array_of_time = array ();
     //        $start_time = strtotime ($starttime); 
     //        $end_time = strtotime ($endtime);  

     //        $add_mins = $duration * 60;

     //        while ($start_time <= $end_time)  
     //        {
     //            $array_of_time[] = date ("h:ia", $start_time);
     //            $start_time += $add_mins; // 
     //        }
     //        $j = 0;
     //        $timeArray = array();
     //        for($i = 0; $i < count($array_of_time) ;$i++) {
     //            $j++;
     //            if(count($array_of_time) > $j)
     //            $timeArray[] = array('time' => $array_of_time[$i]." - ".$array_of_time[$j], 'status' => 'avialalbe','color' => 'green') ;
     //        }

     //        // $array_mearge=array_intersect($a1,$timeArray);
     //        // // print_r($result);
     //        // print_r($a1);
     //        // echo "<pre>";
     //        // print_r($timeArray);die;

     //        $data_result['result']     = 'true';
     //        $data_result['data']       = $timeArray; 
     //        $data_result['msg']        = 'booked slot for that day'; 
     //        echo json_encode($data_result);

     //    // else{
     //    //     // $a1[] = array(
     //    //     //     'slot_time' => 'all', 
     //    //     //     'status'    => 'available'
     //    //     // ); 
     //    //    // $data_result['result']     = 'false';
     //    //    // $data_result['data']       = $a1; 
     //    //    // $data_result['msg']        = 'All slot are available for that day!'; 
     //    // }
     // }

     public function getAppointmentAvailabilityStatus(){
        $post  = file_get_contents('php://input');
        $val   = json_decode($post);
        $beautician_id = $val->beautician_id;
        $status        = $val->status;
        $appointment = $this->AppModel->selectAppointmentAvailability($beautician_id,$status);
        if($appointment) {
            if ($status == 0) {
            $is_status = "pending";
            foreach ($appointment as $key) {
                $Data[] = array(
                    'appointment_id'       => $key['appointment_id'],
                    'customer_id'          => $key['beautician_id'],
                    'beautician_id'        => $key['beautician_id'],
                    'service_id'           => $key['service_id'],
                    'date'                 => $key['date'],
                    'time'                 => $key['time'],
                    'duration'             => $key['duration'],
                    'location'             => $key['location'],
                    'special_request'      => $key['special_request'],
                    'availability_status'  => $key['availability_status'],
                    'is_status'            => $key['is_status'],
                    'status'               => "pending",
                    'created_at'           => $key['created_at']
                );
            }
            }elseif ($status == 1) {
                   $is_status = "accepted";
                   foreach ($appointment as $key) {
                   $Data[] = array(
                    'appointment_id'       => $key['appointment_id'],
                    'customer_id'          => $key['beautician_id'],
                    'beautician_id'        => $key['beautician_id'],
                    'service_id'           => $key['service_id'],
                    'date'                 => $key['date'],
                    'time'                 => $key['time'],
                    'duration'             => $key['duration'],
                    'location'             => $key['location'],
                    'special_request'      => $key['special_request'],
                    'availability_status'  => $key['availability_status'],
                    'is_status'            => $key['is_status'],
                    'status'               => "pending",
                    'created_at'           => $key['created_at']
                );
               }
            }elseif ($status == 2) {
                   $is_status = "confirmed";
                   foreach ($appointment as $key) {
                   $Data[] = array(
                    'appointment_id'       => $key['appointment_id'],
                    'customer_id'          => $key['beautician_id'],
                    'beautician_id'        => $key['beautician_id'],
                    'service_id'           => $key['service_id'],
                    'date'                 => $key['date'],
                    'time'                 => $key['time'],
                    'duration'             => $key['duration'],
                    'location'             => $key['location'],
                    'special_request'      => $key['special_request'],
                    'availability_status'  => $key['availability_status'],
                    'is_status'            => $key['is_status'],
                    'status'               => "confirmed",
                    'created_at'           => $key['created_at']
                );
               }
            }elseif ($status == 3) {
                   $is_status = "closed";
                   foreach ($appointment as $key) {
                   $Data[] = array(
                    'appointment_id'       => $key['appointment_id'],
                    'customer_id'          => $key['beautician_id'],
                    'beautician_id'        => $key['beautician_id'],
                    'service_id'           => $key['service_id'],
                    'date'                 => $key['date'],
                    'time'                 => $key['time'],
                    'duration'             => $key['duration'],
                    'location'             => $key['location'],
                    'special_request'      => $key['special_request'],
                    'availability_status'  => $key['availability_status'],
                    'is_status'            => $key['is_status'],
                    'status'               => "closed",
                    'created_at'           => $key['created_at']
                );
               }
            }elseif ($status == 4) {
                    $is_status = "complete";
                    foreach ($appointment as $key) {
                    $Data[] = array(
                    'appointment_id'       => $key['appointment_id'],
                    'customer_id'          => $key['beautician_id'],
                    'beautician_id'        => $key['beautician_id'],
                    'service_id'           => $key['service_id'],
                    'date'                 => $key['date'],
                    'time'                 => $key['time'],
                    'duration'             => $key['duration'],
                    'location'             => $key['location'],
                    'special_request'      => $key['special_request'],
                    'availability_status'  => $key['availability_status'],
                    'is_status'            => $key['is_status'],
                    'status'               => "complete",
                    'created_at'           => $key['created_at']
                );
                }
            }elseif ($status == 5) {
                $status = "cancled";
                foreach ($appointment as $key) {
                $Data[] = array(
                    'appointment_id'       => $key['appointment_id'],
                    'customer_id'          => $key['beautician_id'],
                    'beautician_id'        => $key['beautician_id'],
                    'service_id'           => $key['service_id'],
                    'date'                 => $key['date'],
                    'time'                 => $key['time'],
                    'duration'             => $key['duration'],
                    'location'             => $key['location'],
                    'special_request'      => $key['special_request'],
                    'availability_status'  => $key['availability_status'],
                    'is_status'            => $key['is_status'],
                    'status'               => "cancled",
                    'created_at'           => $key['created_at']
                );
                }
            }
            $data_result['result']     = 'true';
            $data_result['data']       = $Data; 
            $data_result['msg']        = 'booked appointment for that day'; 
        }else {
           $data_result['result']     = 'false';
           $data_result['data']       = []; 
           $data_result['msg']        = 'All day are available for appointment!'; 
        }
        echo json_encode($data_result);
     }

     public function RemoveFavoritesList(){
        $post  = file_get_contents('php://input');
        $val   = json_decode($post);
        $whereID = array(
            'favourite_id' => $val->favourite_id
        );
        $statusData = array(
            'is_status' => 2
          );
        $result = $this->Model->AppModel->update($whereID, 'favourite',$statusData); 
        if($result){
            $data_result['result'] = 'true';
            $data_result['msg']    = 'User Unfavourite Successfully';
        }else{
            $data_result['result'] = 'false';
            $data_result['msg']    = 'failed';
        } 
        echo json_encode($data_result); 
     }

     public function removeMsg(){
        $post  = file_get_contents('php://input');
        $val   = json_decode($post);
        $from_id = $val->from_id;
        $to_id   = $val->to_id;
        if ($from_id && $to_id ) {
          $whereID = array(
              'from_id'   => $from_id,
              'to_id'     => $to_id
          );
          $statusData = array(
            'from_status' => 1
          );
          $result = $this->AppModel->update($whereID, 'chat_data', $statusData); 

          $whereID1 = array(
              'from_id'   => $val->to_id,
              'to_id'     => $val->from_id
          );
          $statusData1 = array(
            'to_status' => 1
          );
          $result1= $this->AppModel->update($whereID1, 'chat_data', $statusData1);
          $data_result['result'] = 'true';
          $data_result['msg']    = 'Message Delete Successfully';
        }else{
            $data_result['result'] = 'false';
            $data_result['msg']    = 'failed';
        }
        echo json_encode($data_result); 
     }

     public function getReview(){
        $post  = file_get_contents('php://input');
        $val   = json_decode($post);

        $where_id = array(
            'beautician_id'         => $val->from_id,
        );
        $res  = $this->AppModel->selectData('customer_review',$where_id);
        if($res) {
          foreach ($res as $value) {
                $whereID = array(
                    'customer_id'  => $value['customer_id']
                );                   
                $fatchdata    = $this->AppModel->selectAllById('customers',$whereID);
                $Data[] = array(
                    'review_id'            => $value['review_id'],
                    'beautician_id'        => $value['beautician_id'],
                    'amount'               => $value['amount'],
                    'review'               => $value['review'],
                    'rate'                 => $value['rate'],
                    'service_id'           => $value['service_id'],
                    'customer_id'          => $value['customer_id'],
                    'first_name'           => $fatchdata->first_name,
                    'last_name'            => $fatchdata->last_name,
                    'first_name'           => $fatchdata->first_name,
                    'image'                => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$fatchdata->image,
                    'created_at'           => date_format(date_create($value['created_at']), "F d Y")
                );
            }
              $data_result['result']     = 'true';
              $data_result['data']       = $Data;
              $data_result['msg']        = 'Review fatch Successfully!';        
        }else{
            $data_result['result']     = 'false';
            $data_result['data']       = [];
            $data_result['msg']        = "Data not found.";
        }      
        echo json_encode($data_result);
      }

      public function getBeauticianReviewNotes(){
        $post  = file_get_contents('php://input');
        $val   = json_decode($post);
        $where_id = array(
            'beautician_id'         => $val->beautician_id,
            'customer_id'           => $val->customer_id
        );
        $review  = $this->AppModel->selectData('customer_review',$where_id);
        //print_r($review);die;
        if($review) {
            foreach ($review as $value) {
                $whereID = array(
                    'customer_id'  => $value['customer_id']
                );                   
                $fatchdata    = $this->AppModel->selectAllById('customers',$whereID);
                $reviewData[] = array(
                    'review_id'            => $value['review_id'],
                    'beautician_id'        => $value['beautician_id'],
                    'amount'               => $value['amount'],
                    'review'               => $value['review'],
                    'rate'                 => $value['rate'],
                    'service_id'           => $value['service_id'],
                    'customer_id'          => $value['customer_id'],
                    'first_name'           => $fatchdata->first_name,
                    'last_name'            => $fatchdata->last_name,
                    'first_name'           => $fatchdata->first_name,
                    'image'                => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$fatchdata->image,
                    'created_at'           => date_format(date_create($value['created_at']), "F d Y")
                );
              }
             } 
            $res  = $this->AppModel->selectData('comment',$where_id);
            if ($res) {
              foreach ($res as $value) {
                  $whereID = array(
                      'customer_id'  => $value['customer_id']
                  );                   
                  $fatchdata    = $this->AppModel->selectAllById('customers',$whereID);
                  $commentData[] = array(
                      'comment_id'           => $value['comment_id'],
                      'comment'              => $value['comment'],
                      'beautician_id'        => $value['beautician_id'],
                      'service_id'           => $value['service_id'],
                      'customer_id'          => $value['customer_id'],
                      'first_name'           => $fatchdata->first_name,
                      'last_name'            => $fatchdata->last_name,
                      'first_name'           => $fatchdata->first_name,
                      'image'                => 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$fatchdata->image,
                  );
              }
            }
            if (empty($reviewData)){
                $reviewData = [];
            }
            if (empty($commentData)) {
                $commentData = [];
            }
            $Data = array(
              'review' => $reviewData, 
              'notes'  => $commentData,
            );
            $data_result['result']     = 'true';
            $data_result['data']       = $Data;
            $data_result['msg']        = 'Fatch  data Successfully!';
        echo json_encode($data_result);
      }

      public function switchAccount(){

        $post  = file_get_contents('php://input');
        $val   = json_decode($post);
        $status = $val->status;
        $whereID = array(
            'customer_id'    => $val->customer_id
        );
        $fatchdata = $this->AppModel->selectAllById('customers',$whereID);
        if($fatchdata ) {
            if ($status == '1') {
                $statusData = array(
                  'role' => 1
                );
                $result = $this->AppModel->update($whereID, 'customers', $statusData);
                if($result){
                    $data_result['result'] = 'true';
                    $data_result['msg']    = 'Switch as a  Beutician Account Successfully';
                }else{
                    $data_result['result'] = 'false';
                    $data_result['msg']    = 'failed !! Switch as a  Beutician Account';
                }    
            }else{
                $statusData = array(
                  'role' => 2
                );
                $result = $this->AppModel->update($whereID, 'customers', $statusData);
                if($result){
                    $data_result['result'] = 'true';
                    $data_result['msg']    = 'Switch as a  Customer Account Successfully';
                }else{
                    $data_result['result'] = 'false';
                    $data_result['msg']    = 'failed !! Switch as a  Customer Account';
                }   

            }
        }else{
          $data_result['result'] = 'false';
          $data_result['msg']    = 'failed';
        }

        echo json_encode($data_result); 
    }

    public function getchatId(){
        $post  = file_get_contents('php://input');
        $val   = json_decode($post);
         $from_id = $val->from_id;
         $to_id    = $val->to_id;
        // $where ID = array(
        //     'from_id'    => $val->from_id,
        //     'to_id'      => $val->to_id
        // );
        $fatchdata = $this->db->query("SELECT * FROM `chat` where (from_id='$from_id' and to_id= '$to_id') or (to_id= '$from_id' and from_id= '$to_id')")->row();
        // while($row = mysqli_fetch_array($fatchdata)){
        //   $rowId = $row["chat_id"];
        // }
        // $data1=mysqli_fetch_assoc($fatchdata);
        // print_r($fatchdata);die;
        if($fatchdata){
            $data_result['result']    = 'true';
            $data_result['chat_id']   = $fatchdata->chat_id;
            $data_result['msg']       = 'chat id fatch successfully';
        }else{
            $data = array(
                'from_id'         => $val->from_id,
                'to_id'           => $val->to_id
            );
            $res  = $this->AppModel->insert($data,'chat');
            if ($res) {
               $chat_id                  =  $this->db->insert_id();
               $data_result['chat_id']   = $chat_id;
               $data_result['msg']       = 'chat create fatch successfully';
            }else{
                $data_result['result'] = 'false';
                $data_result['msg']    = 'chat not created';
            }
        } 
        echo json_encode($data_result);
    }

    public function getPlans(){
        $post  = file_get_contents('php://input');
        $fatchdata = $this->AppModel->select('beautician_plan');
        if($fatchdata){
            $data_result['result']    = 'true';
            $data_result['chat_id']   =  $fatchdata;
            $data_result['msg']       = 'plan fatch successfully';
        }else{
            $data_result['result']    = 'true';
            $data_result['chat_id']   = [];
            $data_result['msg']       = 'failed';
        } 
        echo json_encode($data_result);
    }

    public function purchasePlan(){
        $post  = file_get_contents('php://input');
        $val   = json_decode($post);

        $whereID = array(
            'beautician_id'   => $val->beautician_id
        );
        $chk = $this->AppModel->selectAllById('plan_purchase',$whereID);
        if (empty($chk)) {
            $data = array(
              'plan_id'       => $val->plan_id,
              'beautician_id' => $val->beautician_id,
              'amount'        => $val->amount,
              'plan_type'     => $val->plan_type,
            );
            // print_r($data);die;
            $result = $this->AppModel->insert($data,'plan_purchase');
            if ($result) {
              $wheredata = array(
                  'customer_id'   => $val->beautician_id
              );
              $customersData=array(
                      'plan_pay_status' => $val->plan_id,
                      'role'            => '1'                                
              );
              $updateRole = $this->AppModel->updateData('customers',$customersData,$wheredata);
            }
            if ($result) {
                $data_result['result']     = 'true';
                $data_result['msg']        = 'created beautician account successfully!';        
            }else{
                $data_result['result']   = 'false';
                $data_result['msg']      = "failed";
            }   
        }else{
          $data_result['result']   = 'false';
          $data_result['msg']      = "already purchase";
        }

        echo json_encode($data_result);
    }

     /* Multiple image upload*/
    public function image_upload(){

        $base_url = 'http://'.$_SERVER['SERVER_NAME'].'/kutz/';

        $path = "uploads/user/".time().rand(10000,99999).".jpg";

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $path)) {
           $data_result['result'] = 'true';
           $data_result['data'] = $base_url.$path;
        }else {
           $data_result['result'] = 'false';
           $data_result['data'] = $path;
        }
        echo json_encode($data_result);
    }

    public function upload_pictures(){
        $type = $this->input->get('type');
        $myimg = $_FILES["file"]["name"]; 

        if($type == 'service') {
            $path1 = time().rand(10000,99999).".jpg";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/service/".$path1)) {
                 $path1;
            } else {
                exit;
            }
        $data_result['path'] = $path1;
        $data_result['data'] = 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/service/'.$path1;
        }

        if($type == 'user') {
            $path1 = time().rand(10000,99999).".jpg";
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/user/".$path1)) {
                 $path1;
            } else {
                exit;
            }
        $data_result['path'] = $path1;
        $data_result['data'] = 'http://'.$_SERVER['SERVER_NAME'].'/kutz/uploads/user/'.$path1;
        }

    echo json_encode($data_result);
    }

    public function sendPushMessageNew($device_ids, $title, $message){

        $device_id = $device_ids;

        $url = "https://fcm.googleapis.com/fcm/send";
        $token = $device_id;
        $serverKey = 'AIzaSyC5WBluvLWcOarE7x6pbDFp6EB6GJProWs';
        $title = $title;
        $body = $message;
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
        }






        // $device_id = $device_ids;
        // $url = "https://fcm.googleapis.com/fcm/send";
        // $token = $device_id;
        // $serverKey = 'AIzaSyC5WBluvLWcOarE7x6pbDFp6EB6GJProWs';
        // $title1 = $title;
        // $arrayToSend = array('to' => $token, 'title' => $title1,'message'=>$message);
        // $json = json_encode($arrayToSend);
        // $headers = array();
        // $headers[] = 'Content-Type: application/json';
        // $headers[] = 'Authorization: key='. $serverKey;
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        // curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // // $ch = curl_init();
        // // curl_setopt($ch, CURLOPT_URL, $url);
        // // curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
        // // curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        // // curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        // // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // //Send the request
        // $response = curl_exec($ch);
        // //Close request
        // if ($response === FALSE) {
        //     die('FCM Send Error: ' . curl_error($ch));
        // }
        // curl_close($ch);
        // return $response;
    //}

    function sendPushIOS($device_ids, $title, $message){
    $apnsServer = 'ssl://gateway.sandbox.push.apple.com:2195';
    /* Make sure this is set to the password that you set for your private key
    when you exported it to the .pem file using openssl on your OS X */
    $privateKeyPassword = '1234';
    /* Put your own message here if you want to */
    $mssg = $message;

    // $message = 'Welcome to iOS 7 Push Notifications';
    /* Pur your device token here */
    $deviceToken = $device_ids;
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
        'alert' => $mssg,
        'title' => $title,
        'sound' => 'default'
    );

    $payload = json_encode($body);

    // Build the binary notification
    $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

    // Send it to the server
    $result = fwrite($fp, $msg, strlen($msg));

    if (!$result)
      return  $msg =  'Message not delivered' . PHP_EOL;

    else
        return $msg =  'Message successfully delivered'.$message. PHP_EOL;

    // Close the connection to the server
    fclose($fp);

    }

}
?>
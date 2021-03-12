<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TeacherApi extends CI_Controller {
    
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
        $where_data = array(
            'teacher_phone'   => $agent_phone,
            'device_token'     => $token
        );
        $result = $this->Model->singleRow($where_data,'teacher');
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function teacher_signup() {
        $post = file_get_contents('php://input');
        $val = json_decode($post);

        $teacher_name     = $val->username;
        $teacher_phone    = $val->usermobile;
        $device_type      = $val->device_type;
        $device_token     = $val->device_token;
        
        $where = array(      
            'teacher_phone'  => $teacher_phone
        );
        $checkMobile = $this->Model->singleRowdata($where,'teacher'); 
        if ($checkMobile) {
            $data_result['result']  = 'false';
            $data_result['msg']     = 'الجوال موجود بالفعل
        ';
        }else{
            $data = array(
                'teacher_name'  => $teacher_name,
                'teacher_phone' => $teacher_phone,
                'device_type'   => $device_type,
                'device_token'  => $device_token
            );
            $res  = $this->Model->insert($data,'teacher');
            if($res){
                $wheredata = array(
                    'teacher_phone' => $teacher_phone 
                );
                $genrate_otp = mt_rand(1000,9999);
                //$genrate_otp = '1234';
                $data_otp = array(
                    'otp'    => $genrate_otp
                );
                $update_info = $this->Model->update('teacher', $data_otp, $wheredata);
                if ($update_info) {
                    $whereID = array('teacher_id' => $res);
                    $checkOTP   = $this->Model->singleRowdata($whereID,'teacher');
                    if ($checkOTP) {
                        $message = 'رقم سري صالح لمرة واحدة -'.$checkOTP->otp.' ';
                        $msg_send = $this->messageSend($checkOTP->teacher_phone, $message);
                        $result   = $this->Model->singleRowdata($wheredata,'teacher');
                        if($result){
                            $tokenData = array();
                            $tokenData['teacher_phone']   = $teacher_phone;
                            $tokenData['device_token'] = $device_token; 
                            $data_result['token'] = $this->genrate_token($tokenData);

                            $where_data = array(
                                'teacher_id' => $result->teacher_id
                            );

                            $device_data = array(
                                'device_type'  => $device_type,
                                'device_token' => $device_token
                            );

                            $res_update = $this->Model->update('teacher',$device_data,$where_data);
                            $userInfo   = $this->Model->singleRowdata($where_data,'teacher');
                            if ($userInfo) {
                                $data_result['result'] = 'true';
                                $data_result['data']   = $userInfo;
                                $data_result['otp']   = $genrate_otp;
                                $data_result['msg']    ='تم التسجيل بنجاح
                                ';
                            }    
                        }else{
                            $data_result['result']  = 'false';
                            $data_result['msg']     = 'بيانات الاعتماد غير متطابقة
                        ';
                        }
                    }else{
                        $data_result['result']        = 'false';
                        $data_result['msg']           = 'الرسالة لا ترسل يرجى التحقق من رقم هاتفك المحمول
                    ';
                    }
                }
            }
        }

        echo json_encode($data_result);
    }

   public function setUpTeacherProfile() {
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $teacher_id        = $val->teacher_id;
        $teacher_name      = $val->teacher_name;
        $nationality       = $val->nationality;
        $city              = $val->city;
        $bank_acc_number   = $val->bank_acc_number;
        $learning_level    = $val->learning_level;
        $learning_material = $val->learning_material;
        $certificate       = $val->certificate;
        $personal_card     = $val->personal_card;
        $image             = $val->image;
        $qualification     = $val->qualification;
        $teacher_phone     = $val->teacher_phone;
        $teacher_gender    = $val->teacher_gender;
        $certi_file_size   = $val->certi_file_size;
        $certi_file_name   = $val->certi_file_name;
        $pc_file_size      = $val->pc_file_size;
        $pc_file_name      = $val->pc_file_name;

         if (!empty($teacher_id) && !empty($teacher_name) && !empty($nationality) && !empty($city) && !empty($bank_acc_number) && !empty($learning_level) && !empty($learning_material) && !empty($certificate) && !empty($personal_card) && !empty($image) && !empty($qualification) && !empty($teacher_phone) && !empty($teacher_gender)) {

            $where_data = array(   
                 'teacher_id'  => $teacher_id
            );
            $checkTeacher = $this->Model->singleRowdata($where_data,'teacher'); 
            if ($checkTeacher) {  

                $data = array(
                    'teacher_name'     => $teacher_name,
                    'nationality'       => $nationality,
                    'city'              => $city,
                    'bank_account_no'   => $bank_acc_number,
                    'learning_levels'   => $learning_level,
                    'learning_materials' => $learning_material,
                     'certificate'       => $certificate,
                    'personal_card'     => $personal_card,
                    'teacher_image'     => $image,
                    'qualification'     => $qualification,
                    "teacher_gender"    => $teacher_gender,
                    "certi_file_size"   => $certi_file_size,
                    "certi_file_name"   => $certi_file_name,
                    "pc_file_size"      => $pc_file_size,
                    "pc_file_name"      => $pc_file_name,
                    "profile_status"    => 1
                    
                );
                $res_update = $this->Model->update('teacher',$data,$where_data);
                if($res_update){
                    $wheredata = array(
                        'teacher_id' => $teacher_id 
                    );
                    $teacherInfo   = $this->Model->singleRowdata($wheredata,'teacher');
                    if($teacherInfo){
                        $data_result['result'] = 'true';
                        $data_result['data']   = $teacherInfo;
                        $data_result['msg']    = 'نجاح ';
                    }else{
                        $data_result['result']  = 'false';
                        $data_result['msg']     = 'بيانات الاعتماد غير متطابقة
                        ';
                    }
                }else{
                    $data_result['result']  = 'false';
                $data_result['msg']     = ' الكود غير مطابق
            ';
                }
            }else{
            $data_result['result']  = 'false';
            $data_result['msg']     = ' الكود غير مطابق
            ';
            
        }
        }else{
             $data_result['result']  = 'false';
                $data_result['msg']     = 'جميع الملفات المطلوبة
        ';
        }

        echo json_encode($data_result);
    }
    
    public function EditTeacherProfile() {
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $teacher_id        = $val->teacher_id;
        $teacher_name      = $val->teacher_name;
        $nationality       = $val->nationality;
        $city              = $val->city;
        $bank_acc_number   = $val->bank_acc_number;
        $learning_level    = $val->learning_level;
        $learning_material = $val->learning_material;
        $certificate       = $val->certificate;
        $personal_card     = $val->personal_card;
        $image             = $val->image;
        $qualification     = $val->qualification;
        $teacher_phone     = $val->teacher_phone;
        $teacher_gender    = $val->teacher_gender;
        $certi_file_size   = $val->certi_file_size;
        $certi_file_name   = $val->certi_file_name;
        $pc_file_size      = $val->pc_file_size;
        $pc_file_name      = $val->pc_file_name;

         if (!empty($teacher_id) && !empty($teacher_name) && !empty($nationality) && !empty($city) && !empty($bank_acc_number) && !empty($learning_level) && !empty($learning_material) && !empty($certificate) && !empty($personal_card) && !empty($image) && !empty($qualification) && !empty($teacher_phone) && !empty($teacher_gender)) {
        
        $where_data = array(   
            'teacher_id'  => $teacher_id
        );
        $checkTeacher = $this->Model->singleRowdata($where_data,'teacher'); 
        if ($checkTeacher) {
            $data = array(
                'teacher_name'     => $teacher_name,
                'nationality'      => $nationality,
                'city'             => $city,
                'bank_account_no'  => $bank_acc_number,
                'learning_levels'  => $learning_level,
                'learning_materials' => $learning_material,
                 'certificate'       => $certificate,
                'personal_card'     => $personal_card,
                'teacher_image'     => $image,
                'qualification'     => $qualification,
                "teacher_gender"    => $teacher_gender,
                "certi_file_size"   => $certi_file_size,
                "certi_file_name"   => $certi_file_name,
                "pc_file_size"      => $pc_file_size,
                "pc_file_name"      => $pc_file_name,
                "profile_status" => 1
            );
            $res_update = $this->Model->update('teacher',$data,$where_data);
            if($res_update){
                $wheredata = array(
                    'teacher_id' => $teacher_id 
                );
                $teacherInfo   = $this->Model->singleRowdata($wheredata,'teacher');
                if($teacherInfo){
                        $data_result['result'] = 'true';
                        $data_result['data']   = $teacherInfo;
                        $data_result['msg']    = 'نجاح ';
                }else{
                    $data_result['result']  = 'false';
                    $data_result['msg']     = 'بيانات الاعتماد غير متطابقة
                    ';
                }
            }else{
                $data_result['result']  = 'false';
                $data_result['msg']     = ' الكود غير مطابق
            ';
            }
        }else{
            $data_result['result']  = 'false';
            $data_result['msg']     = ' الكود غير مطابق
            ';
            
        }
        }else{
             $data_result['result']  = 'false';
                $data_result['msg']     = 'جميع الملفات المطلوبة
        ';
        }
        echo json_encode($data_result);
    }

    /******** API FOR  Check teacher otp *********/ 
    public function Check_teacher_otp() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $headers = $this->input->request_headers();
        $wheredata = array(
            'teacher_phone' => $val->mobile,
            'otp'           => $val->otp,
            'teacher_id'    => $val->teacher_id,
        );
        $result= $this->Model->singleRowdata($wheredata,'teacher');
        if($result){
            $data = array(
               'otp_status' => '1'
            );
            $show_status = $this->Model->update('teacher',$data,$wheredata);
            if ($show_status) {
                $wheredata = array(
                    'teacher_phone' => $val->mobile,
                    'teacher_id'    => $val->teacher_id
                );
                $newResult= $this->Model->singleRowdata($wheredata,'teacher');
                if($newResult) {
                    $data_result['result']        = 'true';
                    $data_result['data']          = $newResult;
                    $data_result['msg']           = 'تم التأكيد            
                ';
                }else{
                     $data_result['result']        = 'false';
                     $data_result['msg']           = 'تعذر الارسال ,الرجاء التأكد من الرقم
                ';
                }
            }else{
                 $data_result['result']        = 'false';
                 $data_result['msg']           = 'عفوا ,انتهتت صلاحية الكود
                 ';
            }
        }else{
            $data_result['result']        = 'false';
            $data_result['msg']           = 'الكود غير صحيح .أعد المحاولة
            ';
        }   
        echo json_encode($data_result);
    }
    
     public function reset_passward(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $mobile = $val->mobile;
        $where = array(
            'teacher_phone' => $mobile 
        );    
        $result = $this->Model->singleRowdata($where, 'teacher');
        if ($result) {

            $where_teacher = array(
                'teacher_phone' => $result->teacher_phone,  
            );

            $genrateOtp = rand(1000,9999);
            $data = array(
                'otp' => $genrateOtp, 
                'otp_status' => '1', 
            );
            $update_result = $this->Model->update('teacher', $data, $where_teacher);
            if ($update_result) {
                
                 $message = 'رقم سري صالح لمرة واحدة -'.$genrateOtp.' ';
                 $msg_send = $this->messageSend($result->teacher_phone, $message);
                            
                $arrayName = array(
                    'teacher_id' => $result->teacher_id, 
                    'otp'     => $genrateOtp 
                );
                $data_result['status']     = true;
                $data_result['message']    = 'نجاح ';  
                $data_result['data']       = $arrayName;
            }
        }else{
            $data_result['status']     = false;
            $data_result['message']    = 'رقم الجوال غير موجود
        ';
        }   
        echo json_encode($data_result); 
    }

    public function Verify(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $id = $val->id;
        $otp = $val->otp;
        $where = array(
            'teacher_id' => $id,
            'otp'        => $otp 
        );    
        $result = $this->Model->singleRowdata($where, 'teacher');
        if ($result) {
                $data_result['status']     = true;
                $data_result['message']    = 'نجاح ';     
                $data_result['id']         = $result->teacher_id;
        }else{
                $data_result['code']       = '302';
                $data_result['status']     = false;
                $data_result['message']    = 'لا يتطابق
        ';
        }   
        echo json_encode($data_result); 
    }

    public function teacher_create_passward(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $id = $val->teacher_id;
        $new_password = $val->password;
        $where = array(
            'teacher_id' => $id 
        );    
        $result = $this->Model->singleRowdata($where, 'teacher');
        if ($result) {
            $where_teacher = array(
                'teacher_id' => $result->teacher_id,  
            );
            $data = array(
                'teacher_password' => $new_password, 
                'otp_status'=> '0'
            );
            $update_result = $this->Model->update('teacher', $data, $where_teacher);
            if ($update_result) {
                $data_result['result']  = 'true';
                $data_result['msg']     = 'تم انشاء الرقم السري
                ';
                }else{
                $data_result['result']  = 'false';
                $data_result['msg']     = 'تعذر أنشاء كلمة المرور
                ';
            }
        }else{
            $data_result['status']     = false;
            $data_result['message']    = 'المعلم غير موجود
            ';
        }   
        echo json_encode($data_result); 
    }
    
    public function Teacherlogin(){
        $post         = file_get_contents('php://input');
        $val          = json_decode($post);
        $usermobile   = $val->usermobile;
        $password     = $val->password;
        $device_type  = $val->device_type;
        $device_token = $val->device_token;

        $whereLoginData = array(
            'teacher_phone' => $usermobile           
        );
        $checkLoginUser = $this->Model->singleRowdata($whereLoginData, 'teacher');
        if ($checkLoginUser) {        
            $checkMobile= $checkLoginUser->teacher_phone;
            $whereOtp= array(
                'teacher_phone' => $checkMobile,
                'otp_status' => 1           
            );
            $fatchVerifyNo = $this->Model->singleRowdata($whereLoginData, 'teacher');
            if($fatchVerifyNo){
                $wheredata=array(
                    'teacher_phone'    => $checkMobile,
                    'teacher_password' => $password,
                );
                $checkresult=$this->Model->singleRowdata($wheredata, 'teacher');
                if ($checkresult) {
                    if ($checkresult->status == '1') {
                        $tokenData = array();
                        $tokenData['teacher_phone']        = $checkMobile; 
                        $tokenData['teacher_password']     = $password; 
                        $tokenData['device_token'] = $val->device_token; 
                        $data_result['token']     = $this->genrate_token($tokenData);
                        $wheredata =  array(
                           'teacher_id'   => $checkresult->teacher_id
                          ); 
                        $teachData = array(
                            'device_type'  => $device_type,
                            'device_token' => $device_token                                      
                        );
                        $result = $this->Model->update('teacher',$teachData,$wheredata);
                        if ($result) {
                          $data  = $this->Model->singleRowdata($wheredata,'teacher');
                          $data_result['result']   = 'true';
                          $data_result['data']     = $data;  
                          $data_result['msg']      =' دخول ناجح
                            ';
                        }   
                    }else{
                       $data_result['result']         = 'false';
                        $data_result['msg']            =' تم ايقاف حسابك من ادارة التطبيق
                    ';
                    }
                }else{
                     $data_result['result']         = 'false';
                    $data_result['msg']            = '  ادخل كلمة مرور صحيحة
                    ';
                }    
            }else{
               $data_result['result']      = 'false';
                    $data_result['msg']         = ' الراجاء استخدام نفس رقم الجوال المسجل
            ';
            }
        }else{
            $data_result['result']      = 'false';
            $data_result['msg']         =' هذا الرقم غير مسجل   ';  
        }
        echo json_encode($data_result);
    }

    public function getTeacherProfile(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        if ($val->teacher_id) {
            $teacher_id = $val->teacher_id;
            $where = array(
                'teacher_id' => $val->teacher_id,
                'profile_status'=> '1'
            );
            $fatchRes = $this->Model->singleRowdata($where,'teacher');
            if ($fatchRes) {
                   $learning_levels = explode(',', $fatchRes->learning_levels); 
                   foreach ($learning_levels as $val) {
                        $where = array('l_id' => $val);
                        $lev_name = $this->Model->singleRowdata($where, 'learning_level');
                        if ($lev_name) {
                           $l_name[]  = $lev_name->level_name; 
                        }else{
                            $l_name  = []; 
                        }
                   }

                   $learning_materials = explode(',', $fatchRes->learning_materials); 
                   foreach ($learning_materials as $v) {
                        $where = array('material_id' => $v);
                        $mt_name = $this->Model->singleRowdata($where, 'learning_material');
                        if ($mt_name) {
                          $m_name[]  = $mt_name->material_name;
                        }else{
                            $m_name  = []; 
                        }
                   }

                    $nationality = $fatchRes->nationality;
                    $where = array('n_id' => $nationality);
                    $nationality = $this->Model->singleRowdata($where,'nationality');
                    if ($nationality) {
                        $n_name = $nationality->n_name;
                    }else{
                        $n_name = '';
                    }

                    $city = $fatchRes->city;
                    $where = array('city_id' => $city);
                    $city = $this->Model->singleRowdata($where,'city');
                    if ($city) {
                        $city_name = $city->city_name;
                    }else{
                        $city_name = ''; 
                    }

                    $fatch_data[] = array(
                        'teacher_id'         => $fatchRes->teacher_id,
                        'teacher_name'       => $fatchRes->teacher_name,
                        'teacher_phone'      => $fatchRes->teacher_phone,
                        'qualification'      => $fatchRes->qualification,
                        "teacher_gender"     => $fatchRes->teacher_gender,
                        'teacher_image'      => $fatchRes->teacher_image,
                        'certificate'        => $fatchRes->certificate,
                        'certi_file_size'    => $fatchRes->certi_file_size,
                        'certi_file_name'    => $fatchRes->certi_file_name,
                        'personal_card'      => $fatchRes->personal_card,
                        'pc_file_size'       => $fatchRes->pc_file_size,
                        'pc_file_name'       => $fatchRes->pc_file_name,
                        'teacher_gender'     => $fatchRes->teacher_gender,
                        'nationality'        => $n_name,
                        'city'               => $city_name,
                         'bank_account_no'     =>$fatchRes->bank_account_no, 
                        'learning_levels'    => implode(',', $l_name),
                        'learning_materials' => implode(',', $m_name),
                        'profile_status'     => 1
                   );
                   
                    $data_result['result']   = 'true';
                    $data_result['data']     = $fatch_data;
                    $data_result['msg']      = 'نجاح
                    ';
                }else{
                    $data_result['result']   = 'false';
                    $data_result['data']     = [];
                    $data_result['msg']      = 'الرجاء إكال الملف الشخصي
                    ';
                } 
        }else{
            $data_result['result']   = 'false';
            $data_result['msg']      = 'فشل العملية
            ';
        }                 
        echo json_encode($data_result);
    }

    public function getLearningLevel(){
        $fatchRes = $this->Model->select('learning_level');  
        if ($fatchRes) {
	        $data_result['result']   = 'true';
	        $data_result['data']     = $fatchRes;
            //$data_result['msg']      = "Get Learning Level information Successfully"; 
        }else{
            $data_result['result']   = 'false';
            $data_result['data']     = [];
            //$data_result['msg']      = "Learning Leveldoesn't exists"; 
        }      
        echo json_encode($data_result);
    }

     public function getLearningMaterial(){
        $fatchRes = $this->Model->select('learning_material');  
        if ($fatchRes) {
	        $data_result['result']   = 'true';
	        $data_result['data']     = $fatchRes;
           // $data_result['msg']      = "Get Learning Level information Successfully"; 
        }else{
            $data_result['result']   = 'false';
            $data_result['data']     = [];
            //$data_result['msg']      = "Learning Leveldoesn't exists"; 
        }      
        echo json_encode($data_result);
    }

    public function getNationality(){
        $fatchRes = $this->Model->select('nationality');  
        if ($fatchRes) {
	        $data_result['result']   = 'true';
	        $data_result['data']     = $fatchRes;
            //$data_result['msg']      = "Get Information Successfully"; 
        }else{
            $data_result['result']   = 'false';
            $data_result['data']     = [];
            //$data_result['msg']      = "Information doesn't exists"; 
        }      
        echo json_encode($data_result);
    }

    public function getCity($id){
        $where      = array("n_id" => $id);
        $results    = $this->Model->selectdata('city',$where);
        if ($results) {
            $data_result['result']  = 'true';
            $data_result['city']    = $results;
            //$data_result['msg']     = 'City is available';
        }else{
            $data_result['result']  = 'false';
            $data_result['data']     = [];
           // $data_result['msg']     = 'City not available';
        }   
        echo json_encode($data_result);
    }

    public function getTeacherRequest(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $teacher_id = $val->teacher_id;
        $where = array('teacher_id' =>  $teacher_id);
        $fatchRes = $this->Model->selectdata('request',$where); 
            if ($fatchRes) {
                foreach ($fatchRes as $key) {
                    $fatch_data[] = array(    
                       'request_id'     => $key['request_id'],
                       'teacher_id'     => $key['teacher_id'],
                       'student_id'     => $key['student_id'],
                       'service_selector'   => $key['service_selector'],
                       'stage'          => $key['stage'],
                       'subject'        => $key['subject'],
                       'service_type'   => $key['service_type'],
                       'time'           => $key['time'],
                       'order_details'  => $key['order_details'],
                        'status'        => $key['is_status']
                    );
                }
                $data_result['result']   = 'true';
                $data_result['data']     = $fatch_data;
                 $data_result['msg']    = 'نجاح ';
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
                $data_result['msg']      = 'فشل العملية 
            ';
            }    
        echo json_encode($data_result);
    }

    public function getCurrentRequest(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $request_id = $val->request_id;
        $resultData = $this->db->query('SELECT * FROM request as r JOIN student as s  ON r.student_id = s.student_id  WHERE r.request_id ="'.$request_id.'" AND r.status = 1 ' )->result_array();
        if ($resultData) {

            $fatch_data[] = array(    
               'request_id'     => $resultData[0]['request_id'],
               'teacher_id'     => $resultData[0]['teacher_id'],
               'student_name'     => $resultData[0]['student_name'],
               'service_selector' => $resultData[0]['service_selector'],
               'stage'          => $resultData[0]['stage'],
               'subject'        => $resultData[0]['subject'],
               'service_type'   => $resultData[0]['service_type'],
               'time'           => $resultData[0]['time'],
               'order_details'  => $resultData[0]['order_details'],
                'status'        => $resultData[0]['status'],
                'date'          => date("jS F Y", strtotime($resultData[0]['date'])),
            );
            $data_result['result']   = 'true';
            $data_result['data']     = $fatch_data;
            $data_result['msg']    = 'نجاح ';
        }else{
            $data_result['result']   = 'false';
            $data_result['data']     = [];
            $data_result['msg']      = 'فشل العملية 
            ';
        }        
        echo json_encode($data_result);
    }

    public function getRequestDetails(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $request_id = $val->request_id;
        $teacher_id = $val->teacher_id;
        
        $whereID  = array(
            'request_id' => $request_id,
            'teacher_id' => $teacher_id,
        );
        $reqResult = $this ->Model->singleRowdata($whereID, 'notification');
        if($reqResult){
            $req_createdAt = $reqResult->date;
            $current_date_time     = date('d-m-Y H:i:s',strtotime($req_createdAt." -1 minutes"));
            $newTime_otp_createdAt = date("d-m-Y H:i:s",strtotime($req_createdAt." +3 minutes"));

            if($newTime_otp_createdAt >= $current_date_time && $current_date_time >= $req_createdAt ){

                $resultData = $this->db->query('SELECT lev.level_name, mat.material_name,s.student_name,r.*FROM request as r JOIN student as s  ON r.student_id = s.student_id JOIN learning_level as lev  ON r.stage = lev.l_id JOIN learning_material as mat  ON r.subject = mat.material_id WHERE r.request_id ="'.$request_id.'" AND r.status = 0 ')->result_array(); 
                if ($resultData) {
                     $fatch_data[] = array(    
                       'request_id'     => $resultData[0]['request_id'],
                       'teacher_id'     => $resultData[0]['teacher_id'],
                       'student_name'   => $resultData[0]['student_name'],
                       'service_selector' => $resultData[0]['student_type'],
                       'student_number' => $resultData[0]['student_number'],
                       'stage'          => $resultData[0]['level_name'],
                       'subject'        => $resultData[0]['material_name'],
                       'service_type'   => $resultData[0]['service_type'],
                       'time'           => $resultData[0]['time'],
                       'order_details'  => $resultData[0]['order_details'],
                        'status'        => $resultData[0]['is_status'],
                        'date'          => $resultData[0]['date'],
                        'lat'          => $resultData[0]['lat'],
                        'long'          => $resultData[0]['longnitude'],
                    );
                    $data_result['result']   = 'true';
                    $data_result['data']     = $fatch_data;
                    $data_result['msg']    = 'نجاح ';
                    
                }else{
                    
                    $data_result['result']   = 'false';
                    $data_result['data']     = [];
                   $data_result['message']    =' الكود غير مطابق
            ';         
                }
            }else{
                $sql = $this->db->query("DELETE FROM `notification` WHERE request_id = ".$request_id." " );
                 $data_result['result']   = 'false';
                $data_result['data']     = [];
                $data_result['msg']      = 'الطلب منتهي
            ';
            } 
        }else{
            //$sql = $this->db->query("DELETE FROM `notification` WHERE request_id = ".$request_id." " );
             $data_result['result']   = 'false';
            $data_result['data']     = [];
            $data_result['msg']      = 'لاتتوفر البيانات
        ';
        }      
        echo json_encode($data_result);
    }
       
    
    public function allOperation() {
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $teacher_id = $val ->teacher_id;
        $fatchCon = $this->db->query('SELECT lev.level_name, mat.material_name,s.student_name,s.student_phone,t.teacher_phone,r.* FROM request as r JOIN student as s  ON r.student_id = s.student_id JOIN learning_level as lev  ON r.stage = lev.l_id JOIN learning_material as mat  ON r.subject = mat.material_id JOIN teacher as t  ON r.teacher_id = t.teacher_id WHERE  r.teacher_id = "'.$teacher_id.'" AND r.status = 1 AND  r.payment_status = 1 AND r.lesson_status = 0 ORDER BY request_id desc')->result_array();

        if ($fatchCon) {
            foreach($fatchCon as $key) {
                $confirm_operation[] = array(
                    'request_id' => $key['request_id'],
                    'teacher_id' => $key['teacher_id'],
                    'teacher_phone' => $key['student_phone'],
                    'student_id' => $key['student_id'],
                    'student_name' => $key['student_name'],
                    'service_selector' => $key['student_type'],
                    'stage' => $key['level_name'],
                    'subject' => $key['material_name'],
                    'service_type' => $key['service_type'],
                    'time' => $key['time'],
                    'order_details' => $key['order_details'],
                    'price' => $key['price'],
                    'status' => $key['status'],
                    'date' => $key['date'],
                     'lat' => $key['lat'],
                    'long' => $key['longnitude'],
                     'address' => $key['address'],
                );
            }
        } else {
            $confirm_operation = [];
        }

        $fatchPre = $this->db->query('SELECT lev.level_name, mat.material_name,s.student_name,s.student_phone,t.teacher_phone,r.* FROM request as r JOIN student as s  ON r.student_id = s.student_id JOIN learning_level as lev  ON r.stage = lev.l_id JOIN learning_material as mat  ON r.subject = mat.material_id JOIN teacher as t  ON r.teacher_id = t.teacher_id WHERE  r.teacher_id = "'.$teacher_id.'" AND r.status = 1 AND  r.payment_status = 1 AND r.lesson_status = 2 ORDER BY request_id desc')->result_array();
        if ($fatchPre) {
            foreach($fatchPre as $key) {
                $previous_operation[] = array(
                     'request_id' => $key['request_id'],
                    'teacher_id' => $key['teacher_id'],
                    'teacher_phone' => $key['student_phone'],
                    'student_id' => $key['student_id'],
                    'student_name' => $key['student_name'],
                    'service_selector' => $key['student_type'],
                    'stage' => $key['level_name'],
                    'subject' => $key['material_name'],
                    'service_type' => $key['service_type'],
                    'time' => $key['time'],
                    'order_details' => $key['order_details'],
                    'price' => $key['price'],
                    'status' => $key['status'],
                    'date' => $key['date'],
                     'lat' => $key['lat'],
                    'long' => $key['longnitude'],
                    'address' => $key['address'],
                );
            }
        } else {
            $previous_operation = [];
        }

        $operations = array(
            'confirm_operation' => $confirm_operation,
            'previous_operation' => $previous_operation,
        );

        $data_result['result'] = 'true';
        $data_result['data'] = $operations;
        $data_result['msg'] = 'نجاح '; 

        echo json_encode($data_result);
    }


    public function getPrivacyPolicy(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $type = $val->type;
        if ($type == 'Teacher') {
            $where = array(     
                'id'          => 1,
                'policy_type' => 'Teacher'
            );
            $privacyData = $this->Model->singleRowdata($where,'all_page');  
            if ($privacyData) {
               
                $data_result['result']          = 'true';
                //$data_result['msg']             = "Get Teacher Policy Successfully"; 
                $data_result['description']     = $privacyData->description;
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
                $data_result['msg']      = 'فشل العملية 
            ';
            }  
        }    
        echo json_encode($data_result);
    }


    public function getUsagePolicy(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $type = $val->type;
        if ($type == 'Teacher') {
            $where = array(     
                'id'          => 2,
                'policy_type' => $type
            );
            $privacyData = $this->Model->singleRowdata($where,'all_page');  
            if ($privacyData) {
                $data_result['result']   = 'true';
               // $data_result['msg']      = "Get Teacher Policy Successfully"; 
                $data_result['description']  = $privacyData->description;
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
                $data_result['msg']      = 'فشل العملية 
            ';
            }  
        }
           
        echo json_encode($data_result);
    }

    public function contact_form(){
        $post    = file_get_contents('php://input');
        $val     = json_decode($post);
        $name    = $val->name;
        $email   = $val->email;
        $message = $val->message;
        $type    = $val->type;
        
        $data = array(
            'name'      => $name,
            'email'     => $email,
            'message'   => $message,
            'type'      => $type
        );
        $res  = $this->Model->insert($data,'contact');
        if ($res) {
            $data_result['result']  = 'true';
            $data_result['msg']     = 'إرسال نموذج الاتصال بنجاح
            ';
        }else{
            $data_result['result']     = 'false';
            $data_result['msg']      = 'فشل العملية 
            ';
        }
        echo json_encode($data_result);
    }
    
    public function requestStatus(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $status     = $val->is_status;
        $request_id = $val->request_id;
        $teacher_id = $val->teacher_id;
        $price      = $val->price;

        $whereID = array(
            'request_id' => $request_id
        );
        $checkReqData = $this->Model->singleRowdata($whereID,'request');
        if ($checkReqData) {
            if ($status == 1) {
                $whereID = array(
                    'request_id' => $request_id,
                    'teacher_id' => $teacher_id,
                );
                $checkMacthData = $this->Model->singleRowdata($whereID,'request_accepted');
                if ($checkMacthData) {
                    $data_result['result'] = 'true';
                    $data_result['msg']    = 'لقد قبلت بالفعل الطلب
                ';
                }else{
                    $data = array(
                        'request_id' => $request_id,
                        'teacher_id' => $teacher_id,
                        'amount'     => $price,
                        'status'     => 1,
                    );
                    $result = $this->Model->insert($data,'request_accepted');
                    if($result){
                        $whereNewID = array(
                            'request_id' => $request_id
                        );
                        $checkReqNew= $this->Model->singleRowdata($whereNewID,'request');
                        if ($checkReqNew) {
                            $std_id        = $checkReqNew->student_id;
                            $wheresSID = array(
                                'student_id' => $std_id
                            );
                            $checkStdData = $this->Model->singleRowdata($wheresSID,'student');
                            if ($checkStdData) {

                                $wheresTID = array(
                                'teacher_id' => $teacher_id
                                );
                                $checkTData = $this->Model->singleRowdata($wheresTID,'teacher');

                                if ($checkTData) {
                                  $teacher_name = $checkTData->teacher_name;
                                }
                                $device_type = $checkStdData->device_type;
                                $device_token = $checkStdData->device_token;

                                $title         = 'Request Accepted';
                                $message    = ' ' .$teacher_name. ' مزايدة على طلبك مع ' .$price. ' SAR يرجى التحقق والتأكيد.';    

                                    if($device_type == 'android') {
                                        $this->sendPushMessageNew($device_token, $title, $message);
                                    }
                                }
                        }

                        $type  = 'Accept Request';
                        $this->Notification($request_id, $std_id, $type, $message);

                        $status  = array('status' => 2, );
                        $StdData = $this->Model->update('notification', $status, $whereNewID); 
                        
                        $data_result['result'] = 'true';
                        $data_result['msg']    = 'تم قبول الطلب بنجاح
                    ';
                    }else{
                        $data_result['result'] = 'false';
                        $data_result['msg']      = 'فشل العملية 
            ';
                    } 
                }
            }
            
            if ($status == 2) {
                $whereID = array(
                    'request_id' => $request_id,
                    'teacher_id' => $teacher_id,
                );
                $checkReqData = $this->Model->singleRowdata($whereID,'request_reject');
                if ($checkReqData) {
                    $data_result['result'] = 'true';
                    $data_result['msg']    = 'تم رفض الطلب من قبلك مسبقا
                ';
                }else{
                    $data = array(
                        'request_id' => $request_id,
                        'teacher_id' => $teacher_id,
                        'status'     => 1,
                    );
                    $result = $this->Model->insert($data,'request_reject');

                    if($result){
                        $whereNewID = array(
                            'request_id' => $request_id
                        );
                        $checkReqNew= $this->Model->singleRowdata($whereNewID,'request');
                        if ($checkReqNew) {
                            $std_id        = $checkReqNew->student_id;
                            $wheresSID = array(
                                'student_id' => $std_id
                            );
                            $checkStdData = $this->Model->singleRowdata($wheresSID,'student');
                            if ($checkStdData) {

                                $wheresTID = array(
                                'teacher_id' => $teacher_id
                                );
                                $checkTData = $this->Model->singleRowdata($wheresTID,'teacher');
                                if ($checkTData) {
                                  $teacher_name = $checkTData->teacher_name;
                                }
                                $device_type = $checkStdData->device_type;
                                $device_token = $checkStdData->device_token;

                                $title         = 'Request Rejected';
                                $message    = ' ' .$teacher_name. ' رفض طلبكم.';  

                                if($device_type == 'android') {
                                    $this->sendPushMessageNew($device_token, $title, $message);
                                }
                            }
                        }

                        $type  = 'Reject Request';
                        $this->Notification($request_id, $std_id, $type, $message);

                        $status  = array('status' => 2, );
                        $StdData = $this->Model->update('notification', $status, $whereNewID); 
                        
                        $data_result['result'] = 'true';
                        $data_result['msg']    = 'لديك طلب مرفوض;
                    ';
                    }else{
                        $data_result['result'] = 'false';
                        $data_result['msg']      = 'فشل العملية 
            ';
                    }
                }
            }
        }else{
            $data_result['result']   = 'false';
            $data_result['data']     = [];
            $data_result['msg']      = 'لاتتوفر البيانات
        '; 
        }
        echo json_encode($data_result); 
    }

    public function getAlert(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $type = $val->type;
        $id   = $val->id;
        if ($type == 'Teacher') {
            $whereTeacher = array(
                'teacher_id' => $id,
                'status' => 1
            );
            $TeacherData = $this->Model->selectdata('notification',$whereTeacher,'notification_id DESC');  
            if ($TeacherData) {
                foreach($TeacherData as $key){
                    
                    $newdate = date("l j M Y", strtotime($key['date']));
                    $newtime = date("h:i A", strtotime($key['date']));
                    $data[] =array(
                        'notification_id'=> $key['notification_id'],
                        'request_id'     => $key['request_id'],
                        'teacher_id'     => $key['teacher_id'],
                        'type'           => $key['type'],
                        'message'        => $key['message'],
                        'status'         => $key['status'],
                        'date'           => $newdate,
                        'time'           => $newtime,
                        'created_at'     => $key['created_at']
                    );
                }
                
                $data_result['result']   = 'true';
                $data_result['msg']      =  'نجاح ';  
                $data_result['data']     = $data;
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
                $data_result['msg']      = 'فشل العملية 
            ';
            }  
        }
        echo json_encode($data_result);
    }
    
    public function upload_documents(){
        $type = $this->input->get('type');
        $myimg = $_FILES["file"]["name"];
        if($type == 'certificate') {
            $path1 = time().rand(100,999).$myimg;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/certificate/".$path1)) {
                 $path1;
            } else {
                exit;
            }
            $data_result['path'] = $path1;
            $data_result['data'] = base_url().'uploads/certificate/'.$path1;
        }

        if($type == 'teacher_image') {
            $path1 = time().rand(100,999).$myimg;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/teacher_image/".$path1)) {
                 $path1;
            } else {
                exit;
            }
            $data_result['path'] = $path1;
            $data_result['data'] = base_url().'uploads/teacher_image/'.$path1;
        }

        if($type == 'personal_card') {
            $path1 = time().rand(100,999).$myimg;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/personal_card/".$path1)) {
                 $path1;
            } else {
                exit;
            }
            $data_result['path'] = $path1;
            $data_result['data'] = base_url().'uploads/personal_card/'.$path1;
        }
     echo json_encode($data_result);
    }
    
    
    public function getRequestTime(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $teacher_id    = $val->teacher_id;
        $request_id    = $val->request_id;

        if ($request_id) {
            $whereTeacher = array(
                'teacher_id' => $teacher_id,
                'request_id'  => $request_id,
            );
            $checkTData = $this->Model->singleRowdata($whereTeacher,'request');
            if ($checkTData) {
                $where = array(
                'teacher_id' => $teacher_id,
                'student_id' => $checkTData->student_id
            );         
            $favourite = $this->Model->singleRowdata($where,'teacher_favorite');
            if($favourite){
               $favourite_status = $favourite->is_status;
            }else{
               $favourite_status =  '0';    
            }   
                
                $data  = array(
                    'request_id'    => $checkTData->request_id, 
                    'teacher_id'    => $checkTData->teacher_id,
                    'total_time'    => $checkTData->total_second,
                    'remaning_time' => $checkTData->remaining_time,
                    'lesson_status' => $checkTData->lesson_status,
                    'favourite_status' => $favourite_status,
                );
                $data_result['result'] = 'true';
                $data_result['data'] = $data;
                $data_result['msg'] =  'نجاح ';  
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
                $data_result['msg']      = 'فشل العملية 
            ';
            }  
        }   
        echo json_encode($data_result);
    }
    
    // public function startStopLesson(){
    //     $post = file_get_contents('php://input');
    //     $val = json_decode($post);
    //     $teacher_id    = $val->teacher_id;
    //     $request_id    = $val->request_id;
    //     $remaning_time = $val->remaning_time;

    //     $whereTeacher = array(
    //         'teacher_id' => $teacher_id,
    //         'request_id'  => $request_id,
    //     );
    //     $ReqData = $this->Model->singleRowdata($whereTeacher,'request');
    //     if ($ReqData) {
    //         $time = $ReqData->total_second;
    //         if ($time == $remaning_time || $time > $remaning_time) {
    //             if ($remaning_time == 0) {
    //                 $status  = array(
    //                     'remaining_time ' => $remaning_time, 
    //                     'lesson_status'   => 2
    //                 );
    //                 $Data = $this->Model->update('request', $status, $whereTeacher); 
    //                 if ($Data) {
    //                     $checkTData = $this->Model->singleRowdata($whereTeacher,'request');
    //                     if ($checkTData) {
    //                         $data  = array(
    //                             'request_id'    => $checkTData->request_id, 
    //                             'teacher_id'    => $checkTData->teacher_id,
    //                             'remaning_time' => $checkTData->remaining_time,
    //                             'lesson_status' => $checkTData->lesson_status,
    //                         );
    //                         $data_result['result'] = 'true';
    //                         $data_result['data'] = $data;
    //                         $data_result['msg']   = 'Lesson Complete succesfully';
    //                     }else{
    //                         $data_result['result']   = 'false';
    //                         $data_result['data']     = [];
    //                         $data_result['msg'] = 'Request Details not exists';
    //                     }
    //                 }else{
    //                         $data_result['result']   = 'false';
    //                         $data_result['msg']   = 'Lesson Can`t Complete';
    //                 }
    //             }else{
    //                 $status  = array(
    //                     'remaining_time ' => $remaning_time, 
    //                     'lesson_status'   => 1
    //                 );
    //                 $Data = $this->Model->update('request', $status, $whereTeacher);
    //                 if ($Data) {
    //                     $checkTData = $this->Model->singleRowdata($whereTeacher,'request');
    //                     if ($checkTData) {
    //                         $data  = array(
    //                             'request_id'    => $checkTData->request_id, 
    //                             'teacher_id'    => $checkTData->teacher_id,
    //                             'remaning_time' => $checkTData->remaining_time,
    //                             'lesson_status' => $checkTData->lesson_status,
    //                         );
    //                         $data_result['result'] = 'true';
    //                         $data_result['data'] = $data;
    //                         $data_result['msg']   = 'Lesson Start succesfully';
    //                     }else{
    //                         $data_result['result']   = 'false';
    //                         $data_result['data']     = [];
    //                         $data_result['msg'] = 'Request Details not exists';
    //                     }
    //                 }else{
    //                         $data_result['result']   = 'false';
    //                         $data_result['msg']   = 'Lesson Can`t Start';
    //                 }
    //         } 
    //     }   
    //     }else{
    //       $data_result['result']   = 'false';
    //       $data_result['msg']   = 'data incorrect'; 
    //     }  
    //     echo json_encode($data_result);
    // }
    
    
    public function startStopLesson(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $lesson_status = $val->lesson_status;
        $teacher_id    = $val->teacher_id;
        $request_id    = $val->request_id;
        $remaning_time = $val->remaning_time;

        $whereTeacher = array(
            'teacher_id' => $teacher_id,
            'request_id'  => $request_id,
        );
        $ReqData = $this->Model->singleRowdata($whereTeacher,'request');
        if ($ReqData) {
            if ($lesson_status == 1) {
                $status  = array(
                        'remaining_time ' => $remaning_time, 
                        'lesson_status'   => 1
                );
                $Data = $this->Model->update('request', $status, $whereTeacher);
                if ($Data) {
                    $checkTData = $this->Model->singleRowdata($whereTeacher,'request');
                    if ($checkTData) {
                        $data  = array(
                            'request_id'    => $checkTData->request_id, 
                            'teacher_id'    => $checkTData->teacher_id,
                            'remaning_time' => $checkTData->remaining_time,
                            'lesson_status' => $checkTData->lesson_status,
                        );
                        $data_result['result'] = 'true';
                        $data_result['data'] = $data;
                        $data_result['msg']   = 'تم بدء الدرس بنجاح
                    ';
                    }else{
                        $data_result['result']   = 'false';
                        $data_result['data']     = [];
                        $data_result['msg'] = 'تفاصيل الطلب غير متاحة
                    ';
                    }
                }else{
                        $data_result['result']   = 'false';
                        $data_result['msg']      = 'فشل العملية 
            ';
                }
            }

            if($lesson_status == 2){
                $status  = array(
                        'remaining_time ' => $remaning_time, 
                        'lesson_status'   => 2
                );
                $Data = $this->Model->update('request', $status, $whereTeacher); 
                if ($Data) {
                    $checkTData = $this->Model->singleRowdata($whereTeacher,'request');
                    if ($checkTData) {
                        $data  = array(
                            'request_id'    => $checkTData->request_id, 
                            'teacher_id'    => $checkTData->teacher_id,
                            'remaning_time' => $checkTData->remaining_time,
                            'lesson_status' => $checkTData->lesson_status,
                        );
                        $data_result['result'] = 'true';
                        $data_result['data'] = $data;
                        $data_result['msg']   = 'تم اكتمال الدرس بنجاح
                        ';
                    }else{
                        $data_result['result']   = 'false';
                        $data_result['data']     = [];
                        $data_result['msg'] = 'تفاصيل الطلب غير متاحة
                    ';
                    }
                }else{
                        $data_result['result']   = 'false';
                       $data_result['msg']      = 'فشل العملية 
            ';
                }
            }
        }else{
           $data_result['result']   = 'false';
           $data_result['msg']      = 'لاتتوفر البيانات
        ';
        }  
        echo json_encode($data_result);
    }
    
    public function changePassword(){
        $post = file_get_contents('php://input');
        $val=json_decode($post);
        $headers = $this->input->request_headers();
        $teacher_id =$val->teacher_id;
        $where_pwd = array(
            'teacher_password'     =>  $val->old_password,
            'teacher_id'   =>  $teacher_id
        );
          $changeres = $this->Model->singleRowdata($where_pwd,'teacher');
        if($changeres){
          $where_newpwd = array(
            'teacher_id'=>$teacher_id
          );
          $new_data = array(
            'teacher_password' => $val->new_password
          );

          $Res = $this->Model->update('teacher',$new_data, $where_newpwd);
          if($Res){
            $where_user_row = array(
            'teacher_id' =>$teacher_id
          );
          $result   = $this->Model->singleRowdata($where_user_row,'teacher');
            if($result){
              $output['result'] = 'true';
              $output['msg']    = 'تم تغيير كلمة المرور بنجاح
            ';
            }else{

              $output['result'] ='true';
              $output['msg']    = 'تم تغيير كلمة المرور بنجاح
            ';
            }
          }else{
            $output['result'] ='false';
            $data_result['msg']      = 'فشل العملية 
            ';
          }
      }else{
          $output['result'] ='false';
          $output['msg'] ='كلمة المرور القديمة غير صحيحة
          ';
      }
      echo json_encode($output);
    }
    
    public function rating_app(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $type = $val->type;
        $rate = $val->rate;
        $user_id = $val->user_id;
        
        if ($type == 'teacher') {
            $whereID = array( 'user_id' => $val->user_id);
            $checkData = $this->Model->singleRowdata($whereID,'rate_app');
            if ($checkData) {
                $data = array(
                    'user_id' => $user_id,
                    'rate' => $rate,
                    'type' => $type
                );
                $results = $this->Model->Model->update('rate_app',$data,$whereID);
                if($results){
                    $data_result['result'] = 'true';
                    $data_result['msg'] = 'تم التقييم
                ';
                }else{
                    $data_result['result'] = 'false';
                   $data_result['msg']      = 'فشل العملية 
            ';
                }
            }else{
                $data = array(
                'user_id' => $user_id,
                'rate' => $rate,
                'type' => 'teacher'
                );
                $results = $this->Model->insert($data,'rate_app');
                if($results){
                    $data_result['result'] = 'true';
                    $data_result['msg'] = 'تم التقييم
                ';
                }else{
                    $data_result['result'] = 'false';
                    $data_result['msg']      = 'فشل العملية 
            ';
                }
            }
        }
        echo json_encode($data_result);
    }
    
    public function AddandRemoveFavourite(){
      $post = file_get_contents('php://input');
      $val = json_decode($post);
      $status           = $val->status;
      $student_id       = $val->student_id;
      $teacher_id       = $val->teacher_id;
      $whereID = array(
          'student_id'       => $val->student_id,
          'teacher_id'       => $val->teacher_id
      );
      $checkfavorite = $this->Model->selectAllById('teacher_favorite',$whereID);
      if($checkfavorite){
          if ($checkfavorite->is_status == '0') {
              $param = array( 'is_status' => '1');
              $results = $this->Model->update('teacher_favorite', $param, $whereID);
              if ($results) {
                $data_result['result'] = 'true';
                $data_result['msg'] = 'أضف إلى المفضلة
              ';
              }else{
                $data_result['result'] = 'false';
                $data_result['msg']      = 'فشل العملية 
            ';
              }
          }else{
              $param = array( 'is_status' => '0');
              $results = $this->Model->update('teacher_favorite', $param, $whereID);
              if ($results) {
                $data_result['result'] = 'true';
                $data_result['msg'] = 'إزالة إلى المفضلة
              ';
              }else{
                $data_result['result'] = 'false';
                $data_result['msg']      = 'فشل العملية 
            ';
              }
          }
      }else{
            $param = array('student_id' => $student_id, 'teacher_id' => $teacher_id, 'is_status' => '1');
            $results = $this->Model->insert($param,'teacher_favorite');
            if ($results) {
              $data_result['result'] = 'true';
               $data_result['msg'] = 'أضف إلى المفضلة
              ';
            }else{
              $data_result['result'] = 'false';
              $data_result['msg']      = 'فشل العملية 
            ';
           }
      } 
      echo json_encode($data_result);
    }
    
    public function favoriteList(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        if ($val->teacher_id) {
            $teacher_id = $val->teacher_id;
            $where = array(
                'teacher_id' => $teacher_id,
            );
            $favorite = $this->Model->selectdata('teacher_favorite',$where);
            if ($favorite) {
                foreach ($favorite as $key) {
                $student_id = $key['student_id'];
                $where = array('student_id' => $student_id);
                $studentData = $this->Model->singleRowdata($where,'student');
                if ($studentData) {
                    $std_name = $studentData->student_name;
                    //$std_gender = $studentData->student_gender;
                    $student_phone = $studentData->student_phone;
                     $student_img = $studentData->student_image;
                }

                $fatch_data[] = array(
                    'f_id'             => $key['t_f_id'],
                    'student_id'         => $key['student_id'], 
                    'student_name'       => $std_name,
                    'student_phone'      => $student_phone,
                    'student_image'  => $student_img,
                   'review'         => $key['review'],
                   'rate'           => $key['rate'],
                   'is_status'      =>  $key['is_status'],
                   'created_at'     => $key['created_at']
                );
            }
               
                $data_result['result']   = 'true';
                $data_result['data']     = $fatch_data;
                $data_result['msg']    = 'نجاح ';  
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
                $data_result['msg']      = 'الرجاء إكال الملف الشخصي
            ';
            } 
   
        }else{
            $data_result['result']   = 'false';
            $data_result['msg']      = 'فشل العملية 
            ';
        }                 
        echo json_encode($data_result);
    }

    public function withDrawRequest(){
        $post  = file_get_contents('php://input');
        $val   = json_decode($post);
        $teacher_id = $val->teacher_id;
        $amount     = $val->amount;
        $whereID = array('user_id' => $val->teacher_id);
        $checkReqData  = $this->Model->singleRowdata($whereID,'withdraw_request');
        if ($checkReqData) {
            $data = array(
                'user_id'     => $teacher_id,
                'amount'         => $amount
            );
            $updateresult = $this->Model->update('withdraw_request', $data, $whereID);
            if($updateresult){
                $data_result['result'] = 'true';
                  $data_result['msg']    = 'تم ارسال طلب السحب بنجاح
            ';
            }else{
                $data_result['result'] = 'false';
                $data_result['msg']      = 'فشل العملية 
            ';
            }
        }else{
            $data = array(
                'user_id'     => $teacher_id,
                'amount'         => $amount
            );
            $result = $this->Model->Model->insert($data,'withdraw_request'); 
            if($result){
                $data_result['result'] = 'true';
                $data_result['msg']    = 'تم ارسال طلب السحب بنجاح
            ';
            }else{
                $data_result['result'] = 'false';
                $data_result['msg']      = 'فشل العملية 
            ';
            }
        }
        
        echo json_encode($data_result); 
    }
    
    public function Notification($request_id, $student_id, $type, $message) {
        $data = array(
            'request_id' => $request_id,
            'type'       => $type,
            'student_id' => $student_id,
            'message'    => $message,
            'status'     => '1',
            'date'       => date('d-m-Y H:i:s'),
        );
        
        $notification = $this->Model->insert($data,'student_notification');
        if ($notification) {
           return $notification;
        }else{
            return 0;
        }        
    }
    
    
    public function getTeacherWallet(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        if ($val->teacher_id) {
            $teacher_id = $val->teacher_id;
            $where = array(
                'teacher_id' => $val->teacher_id,
                'profile_status'=> '1'
            );
            $fatchRes = $this->Model->singleRowdata($where,'teacher');
            if ($fatchRes) {
                $data_result['result']   = 'true';
                $data_result['data']     = $fatchRes->wallet_amt;
                $data_result['cash_amount']     = $fatchRes->cash_amount;
                $data_result['total']     = $fatchRes->total;
                $data_result['app_profit']     = $fatchRes->app_profit;
                $data_result['msg']      = 'نجاح '; 
            }else{
                $data_result['result']   = 'false';
                $data_result['msg']      = 'فشل العملية 
            ';
            }                 
        echo json_encode($data_result);
        } 
    }
    
    public function accountSetting(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        if ($val->teacher_id) {
            $teacher_id  = $val->teacher_id;
            $username    = $val->username;
            $usermobile  = $val->usermobile;
            $where = array(
                'teacher_id' => $val->teacher_id,
                'profile_status'=> '1'
            );
            $fatchRes = $this->Model->singleRowdata($where,'teacher');
            if ($fatchRes) {
                $data = array(
                    'teacher_name' => $username
                );
                $results = $this->Model->Model->update('teacher',$data,$where); 

                $data_result['result']   = 'true';
                $data_result['msg']      =' تم انشاء الحساب بنجاح
            ';
            }else{
                $data_result['result']   = 'false';
                $data_result['msg']      = 'فشل العملية 
            ';
            }
        }
        echo json_encode($data_result);
    }
    
     public function updateBankAccount(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        if ($val->teacher_id) {
            $teacher_id  = $val->teacher_id;
            $bankname    = $val->bankname;
            $bank_account_no  = $val->bank_account_no;
            $where = array(
                'teacher_id' => $val->teacher_id,
                'profile_status'=> '1'
            );
            $fatchRes = $this->Model->singleRowdata($where,'teacher');
            if ($fatchRes) {
                $data = array(
                    'bankname'        => $bankname,
                    'bank_account_no' => $bank_account_no
                );
                $results = $this->Model->Model->update('teacher',$data,$where); 

                $data_result['result']   = 'true';
                $data_result['msg']      = 'تم تحديث الحساب بنجاح
                ';
            }else{
                $data_result['result']   = 'false';
                $data_result['msg']      = 'فشل العملية 
            ';
            }
        }                 
        echo json_encode($data_result);
    }
    
    public function getTeacherBankDetails(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        if ($val->teacher_id) {
            $teacher_id  = $val->teacher_id;
            $where = array(
                'teacher_id' => $val->teacher_id,
                'profile_status'=> '1'
            );
            $fatchRes = $this->Model->singleRowdata($where,'teacher');
            if ($fatchRes) {
                if ($fatchRes->notification_type == '') {
                    
                }
                $data = array(
                    'bankname'        => $fatchRes->bankname,
                    'bank_account_no' => $fatchRes->bank_account_no,
                    'username'        => $fatchRes->teacher_name,
                    'usermobile'        => $fatchRes->teacher_phone,
                    'notification_type'  => $fatchRes->notification_type,
                );
                $data_result['result']   = 'true';
                $data_result['data']     = $data;
                $data_result['msg']      = 'نجاح '; 
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
               $data_result['msg']      = 'فشل العملية 
            ';
            }
        }                 
        echo json_encode($data_result);
    }

    public function notificationOnOff(){
      $post = file_get_contents('php://input');
      $val = json_decode($post);
      $status           = $val->status;
      $teacher_id       = $val->teacher_id;
      $whereID = array(
          'teacher_id'       => $val->teacher_id
      );
      $checkTeacher= $this->Model->selectAllById('teacher',$whereID);
      if($checkTeacher){
          if ($status == 'ON') {
              $param = array( 'notification_type' => 'enable');
              $results = $this->Model->update('teacher', $param, $whereID);
              if ($results) {
                $data_result['result'] = 'true';
                $data_result['msg'] = 'نجاح '; 
              }else{
                $data_result['result'] = 'false';
                $data_result['msg']      = 'فشل العملية 
        ';
              }
          }
          if($status == 'OFF'){
              $param = array( 'notification_type' => 'disable');
              $results = $this->Model->update('teacher', $param, $whereID);
              if ($results) {
                $data_result['result'] = 'true';
                $data_result['msg'] = 'نجاح '; 
              }else{
                $data_result['result'] = 'false';
                $data_result['msg']      = 'فشل العملية 
        ';
              }
          }
      }else{
            $data_result['result'] = 'false';
            $data_result['msg'] = 'Teacher not found!';
      } 
      echo json_encode($data_result);
    }
    
    public function sendPushMessageNew($device_token, $title, $message){
        $device_id = $device_token;
        $url = "https://fcm.googleapis.com/fcm/send";
        $token = $device_id;
        $serverKey = 'AIzaSyChpmWu0PoNCZdkfa9tea73HlLRWiPfcR0';
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
    
    
    public function messageSend($mobile, $msg){
        $to = '+966'.$mobile;
        //print_r($to);die;
        //$to = $mobile;
        $from = '+17655873177';
        $message = $msg;
    
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
        
    }
}

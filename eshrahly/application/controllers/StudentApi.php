<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentApi extends CI_Controller {

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
            'student_phone'   => $agent_phone,
            'device_token' => $token
        );
        $result = $this->Model->singleRow($where_data,'student');
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function student_signup() {
        $post = file_get_contents('php://input');
        $val = json_decode($post);

        $student_name     = $val->username;
        $student_phone    = $val->usermobile;
        $device_type      = $val->device_type;
        $device_token     = $val->device_token;
        $where = array( 'student_phone'  => $student_phone);
        $checkMobile = $this->Model->singleRowdata($where,'student'); 
        if ($checkMobile) {
            $data_result['result']  = 'false';
            $data_result['msg']     = 'الجوال موجود بالفعل';
        }else{
            $data = array(
                'student_name'  => $student_name,
                'student_phone' => $student_phone,
                'device_type'   => $device_type,
                'device_token'  => $device_token
            );
            $res  = $this->Model->insert($data,'student');
            if($res){
                $wheredata = array('student_phone' => $student_phone );
                $genrate_otp = mt_rand(1000,9999);
                $data_otp = array(
                    'otp'    => $genrate_otp
                );
                $update_info = $this->Model->update('student', $data_otp, $wheredata);
                if ($update_info) {
                    $whereID = array('student_id' => $res);
                    $checkOTP   = $this->Model->singleRowdata($whereID,'student');
                    if ($checkOTP) {
                        $message = 'رقم سري صالح لمرة واحدة -'.$checkOTP->otp.' ';
                        $msg_send = $this->messageSend($checkOTP->student_phone, $message);
                        $result   = $this->Model->singleRowdata($wheredata,'student');
                        if($result){
                            $tokenData = array();
                            $tokenData['student_phone']   = $student_phone; 
                            $tokenData['device_token'] = $device_token; 
                            $data_result['token'] = $this->genrate_token($tokenData);
                            $where_data = array('student_id' => $result->student_id);
                            $device_data = array(
                                'device_type'  => $device_type,
                                'device_token' => $device_token
                            );
                            $res_update = $this->Model->update('student',$device_data,$where_data);
                            $userInfo   = $this->Model->singleRowdata($where_data,'student');
                            if ($userInfo) {
                                $data_result['result'] = 'true';
                                $data_result['data']   = $userInfo;
                                $data_result['msg']    = "تم التسجيل بنجاح";
                            }    
                        }else{
                            $data_result['result']  = 'false';
                            $data_result['msg']     = "بيانات الاعتماد غير متطابقة";
                        }
                    }else{
                        $data_result['result']        = 'false';
                        $data_result['msg']           = 'تعذر الارسال ,الرجاء التأكد من الرقم';
                    }
                }
            }
        }

        echo json_encode($data_result);
    }

    /******** API FOR  Check student otp *********/ 
    public function Check_student_otp() {
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $headers = $this->input->request_headers();
        $wheredata = array(
            'student_phone' => $val->mobile,
            'otp'           => $val->otp,
            'student_id'    => $val->student_id,
        );
        $result= $this->Model->singleRowdata($wheredata,'student');
        if($result){
            $data = array(
               'otp_status' => '1'
            );
            $show_status = $this->Model->update('student',$data,$wheredata);
            if ($show_status) {
                $wheredata = array(
                    'student_phone' => $val->mobile,
                    'student_id'    => $val->student_id
                );
                $newResult= $this->Model->singleRowdata($wheredata,'student');
                if($newResult) {
                    $data_result['result']        = 'true';
                    $data_result['data']          = $newResult;
                    $data_result['msg']           = 'تم التأكيد';            
                }else{
                     $data_result['result']        = 'false';
                     $data_result['msg']           = 'تعذر الارسال ,الرجاء التأكد من الرقم';
                }
            }else{
                 $data_result['result']        = 'false';
                 $data_result['msg']           = 'عفوا ,انتهتت صلاحية الكود';
            }
        }else{
            $data_result['result']        = 'false';
            $data_result['msg']           = 'الكود غير صحيح .أعد المحاولة';
        }   
        echo json_encode($data_result);
    }

    public function student_create_passward(){
        $post         = file_get_contents('php://input');
        $val              = json_decode($post);
        $student_id       = $val->student_id;
        $student_phone    = $val->student_phone;
        $password         = $val->password;

        $whereId= array(
            'student_id'     => $student_id           
        );
        $checkLoginUser = $this->Model->singleRowdata($whereId, 'student');
        if ($checkLoginUser) {
            $data = array(
                'student_id'      => $student_id,
                'student_phone'   => $student_phone,
                'password'        => $password,
            );
            $res_update = $this->Model->update('student',$data,$whereId);
            if ($res_update) {
                $data_result['result']  = 'true';
                $data_result['msg']     = 'تم انشاء الرقم السري
                ';
                }else{
                $data_result['result']  = 'false';
                $data_result['msg']     = 'تعذر أنشاء كلمة المرور
                ';
            }
        }else{
            $data_result['result']     = 'false';
            $data_result['msg']        = 'بيانات الطالب غير صحيحة
            ';
        }
        echo json_encode($data_result);
    }

    public function reset_passward(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $mobile = $val->mobile;
        $where = array(
            'student_phone' => $mobile 
        );    
        $result = $this->Model->singleRowdata($where, 'student');
        if ($result) {
            $where_user = array(
                'student_id' => $result->student_id,  
            );
            $genrateOtp = rand(1000,9999);
            $data = array(
                'otp' => $genrateOtp, 
                'otp_status' => '1', 
            );
            $update_result = $this->Model->update('student', $data, $where_user);
            if ($update_result) {
                $whereNo = array(
                    'student_phone' => $mobile 
                );    
                $checkOTP = $this->Model->singleRowdata($whereNo, 'student');
                
                $message = 'رقم سري صالح لمرة واحدة -'.$checkOTP->otp.' ';
                $msg_send = $this->messageSend($result->student_phone, $message);  
                            
                $arrayName = array(
                    'student_id' => $result->student_id, 
                    'otp'     => $genrateOtp 
                );
                $data_result['status']     = true;
                $data_result['message']    = 'نجاح ';
                $data_result['data']       = $arrayName;
            }
        }else{
            $data_result['status']     = false;
            $data_result['message']    = 'هذا الرقم غير موجود
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
            'student_id' => $id,
            'otp'     => $otp 
        );    
        $result = $this->Model->singleRowdata($where, 'student');
        if ($result) {
                $data_result['status']     = true;
                $data_result['message']    = 'نجاح ';  
                $data_result['id']         = $result->student_id;
        }else{
            $data_result['code']       = '302';
            $data_result['status']     = false;
            $data_result['message']    =' الكود غير مطابق
            ';
        }   
        echo json_encode($data_result); 
    }
    
    

    public function CreateNewPassword(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $id = $val->id;
        $new_password = $val->new_password;
        $where = array(
            'student_id' => $id 
        );    
        $result = $this->Model->singleRowdata($where, 'student');
        if ($result) {
            $where_user = array(
                'student_id' => $result->student_id,  
            );
            $data = array(
                'password' => $new_password, 
                'otp_status'=> '0'
            );
            $update_result = $this->Model->update('student', $data, $where_user);
            if ($update_result) {
                $data_result['status']     = true;
                $data_result['message']    =' تم انشاء كلمة المرور بنجاح  ';
            }
        }else{
            $data_result['status']     = false;
            $data_result['message']  = 'الطالب غير متوفر
            ';
        }   
        echo json_encode($data_result); 
    }


    /*  Api for Login with Agent */
    
    
    /*  Api for Login with Agent */
    public function Studentlogin(){
        $post         = file_get_contents('php://input');
        $val          = json_decode($post);
        $usermobile   = $val->usermobile;
        $password     = $val->password;
        $device_type  = $val->device_type;
        $device_token = $val->device_token;

        $whereLoginData = array(
            'student_phone' => $usermobile,
        );
        $checkLoginUser = $this->Model->singleRowdata($whereLoginData, 'student');
        if ($checkLoginUser) { 
            $checkMobile= $checkLoginUser->student_phone;
            $whereOtp= array(
                'student_phone' => $checkMobile,
                'otp_status' => 1           
            );
            $fatchVerifyNo = $this->Model->singleRowdata($whereLoginData, 'student');            
            if($fatchVerifyNo){
                $wheredata=array(
                    'student_phone'  => $usermobile,
                    'password'       => $password,
                );
                $checkresult=$this->Model->singleRowdata($wheredata, 'student');
                if ($checkresult) {
                    if ($checkresult->status == '1') {
                        $tokenData = array();
                        $tokenData['student_phone'] = $usermobile; 
                        $tokenData['device_token'] = $val->device_token; 
                        $data_result['token']           = $this->genrate_token($tokenData);
                        $wheredata =  array(
                           'student_id'   => $checkresult->student_id
                          ); 
                        $customersData=array(
                            'device_type'  => $device_type,
                            'device_token' => $device_token                                      
                        );
                        $result = $this->Model->update('student',$customersData,$wheredata);
                        if ($result) {
                              $data  = $this->Model->singleRowdata($wheredata,'student');
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
    
    public function getAlert(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $type = $val->type;
        $id   = $val->id;
        
        if ($type == 'Student') {
            $whereStudent = array(     
                'student_id'  => $id,
                'status' => 1
            );
            $StudentData = $this->Model->selectdata('student_notification',$whereStudent,'notification_id DESC');   
            if ($StudentData) {
                foreach($StudentData as $key){
                    
                    $newdate = date("l j M Y", strtotime($key['date']));
                    $newtime = date("h:i A", strtotime($key['date']));
                    $data[] =array(
                        'notification_id'=> $key['notification_id'],
                        'request_id'     => $key['request_id'],
                        'student_id'     => $key['student_id'],
                        'type'           => $key['type'],
                        'message'        => $key['message'],
                        'status'         => $key['status'],
                        'date'           => $newdate,
                        'time'           => $newtime,
                        'created_at'     => $key['created_at']
                    );
                }
        
                $data_result['result']       = 'true';
                $data_result['msg']          =' تنبيه جديد
                ';
                $data_result['data']         = $data;
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
                $data_result['msg']      =' لاتوجد تنبيهات 
            ';
            }  
        }
              
        echo json_encode($data_result);
    }

    public function getStudentProfile(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        if ($val->student_id) {
            $where = array('student_id' => $val->student_id);
            $fatchRes = $this->Model->singleRowdata($where,'student');                  
                if ($fatchRes) {
                    $fatch_data = array(    
                       'student_id'     => $fatchRes->student_id,
                       'student_name'   => $fatchRes->student_name,
                       'student_phone'  => $fatchRes->student_phone,
                       'student_image'  => $fatchRes->student_image,
                    );
                    $data_result['result']   = 'true';
                    $data_result['data']     = $fatch_data;
                    $data_result['msg']      ='معلومات الطالب 
                    ';
                }else{
                    $data_result['result']   = 'false';
                    $data_result['data']     = [];
                    $data_result['msg']      ='لا توجد سجلات للطالب
                    ';
                } 
        }else{
            $data_result['result']   = 'false';
            $data_result['msg']      =' الرجاء ادخل رقم صحيح
        '; 
        }       
        echo json_encode($data_result);
    }

    public function getOnlineTeacherList(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $student_id = $val->student_id;
        $where = array('student_id' => $student_id);
        $fatchRes = $this->db->query('SELECT n.n_name,c.city_name,rc.amount, r.*,t.* FROM request as r JOIN request_accepted as rc  ON rc.request_id = r.request_id JOIN teacher as t  ON rc.teacher_id = t.teacher_id  JOIN nationality as n  ON t.nationality = n.n_id  JOIN city as c ON c.city_id = t.city WHERE r.student_id = "'.$student_id.'" AND  rc.status = 1 AND rc.payment = 0 AND  r.status = 0  ORDER BY `r`.`request_id` DESC')->result_array();
            if ($fatchRes) {
                foreach ($fatchRes as $key) {                    
                    $rating = $this->teacherRating($key['teacher_id']);
                    if ($rating) {
                    $rate = $rating;
                    }else{
                    $rate = [];
                    }
                    $fatch_data[] = array(    
                      'request_id'     => $key['request_id'],
                      'student_id'     => $key['student_id'],
                      'teacher_id'     => $key['teacher_id'],
                      'teacher_name'   => $key['teacher_name'],
                      'teacher_phone'  => $key['teacher_phone'],
                      'teacher_image'  => $key['teacher_image'],
                      'price'  => $key['amount'],
                      'nationality' => $key['n_name'],
                      'city_name' => $key['city_name'],
                      "location" => "",
                      'rate' => $rate

                    );
                }
                $data_result['result']   = 'true';
                $data_result['data']     = $fatch_data;
                $data_result['msg']      = 'قائمة المدرسين  
                ';
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
                $data_result['msg']      = 'لاتتوفر قائمة للمدرسين
                ';
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

                    $rating = $this->teacherRating($fatchRes->teacher_id);
                    if ($rating) {
                        $rate = $rating;
                    }else{
                        $rate = [];
                    }
                    $fatch_data[] = array(
                        'teacher_id'         => $fatchRes->teacher_id,                    
                        'teacher_name'       => $fatchRes->teacher_name,
                        'teacher_phone'      => $fatchRes->teacher_phone,
                        'qualification'     => $fatchRes->qualification,
                        "teacher_gender"    => $fatchRes->teacher_gender,
                        'teacher_image'      => $fatchRes->teacher_image,
                        'certificate'        => $fatchRes->certificate,
                        'personal_card'      => $fatchRes->personal_card,
                        'teacher_gender'     => $fatchRes->teacher_gender,
                        'nationality'        => $n_name,
                        'city'               => $city_name,
                        'learning_levels'    => implode(',', $l_name),
                        'learning_materials' => implode(',', $m_name),
                        'bank_account_no'     =>$fatchRes->bank_account_no, 
                        'rate'     => $rating,
                    );
                   
                    $data_result['result']   = 'true';
                    $data_result['data']     = $fatch_data;
                    $data_result['msg']      = 'بيانات المدرسين
                    ';
                }else{
                    $data_result['result']   = 'false';
                    $data_result['data']     = [];
                    $data_result['msg']      = 'الرجاء اكمال الملف الشخصي
                '; 
                } 
        }else{
            $data_result['result']   = 'false';
            $data_result['msg']      = 'الرجاء ادخال رقم صحيح
            ';
        }                 
        echo json_encode($data_result);
    }
    
     public function teacherRating($teacher_id){
        $whereTeacherID     = array(
            'teacher_id'  => $teacher_id,
        ); 
        $review = $this->Model->selectdata('teacher_rate', $whereTeacherID);
        if ($review) {
          foreach ($review as $res) {
            $data_array[] = $res['rate']; 
            $resultdata[] = array(
                'rate'            => $res['rate']
            );
          }
          if (!empty($resultdata)) {
            $average = array_sum($data_array) / count($data_array);
            $rate1 = $average;
            return $rate = round($average,1);
          }else{
            return $rate = 0;
          }
        }else{
           return $rate = 0;
        }
    }

   /******** API FOR UPLOAD DOCUMENTS *********/
    public function upload_documents(){
        $type = $this->input->get('type');
        $myimg = $_FILES["file"]["name"]; 
        
        if($type == 'student_image') {
            $path1 = time().rand(100,999).$myimg;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/student_image/".$path1)) {
                 $path1;
            } else {
                exit;
            }
            $data_result['path'] = $path1;
            $data_result['data'] = 'https://'.$_SERVER['SERVER_NAME'].'/uploads/student_image/'.$path1;
        }
     echo json_encode($data_result);
    }
    
    public function search_teacher() {
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $time = $val->time;
        $total_time = explode(',', $time);
        $total_hours = 0;
        foreach ($total_time as $count_time) {
           $total_hours ++;
        }
        $total_lession_time = $total_hours*3600; 
        $student_id = $val ->student_id;
        $teacher_type = $val->teacher_type;
        $student_type = $val->student_type;
        $education_level = $val->education_level;
        $student_no = $val->student_no;
        $search_type = $val->search_type;
        $subject = $val ->subject;
        $other = $val->other;
        $date = $val->date;
        $lat = $val->lat;
        $long = $val->long;
        $address = $val->address;
        $order_details = $val->order_details;
        $current_date = date('Y-m-d');
        $datetime = date('Y-m-d H:i:s');
        $newTime = date("d-m-Y H:i:s",strtotime("-3 minutes", strtotime($datetime)));
        $sql = $this->db->query("DELETE FROM `notification` WHERE `status` = '1' AND `date` < '".$newTime."'");
        // $chk_result =  $this->db->query('SELECT * FROM request WHERE request.student_id = "'.$student_id.'" AND request.stage = "'.$education_level.'" AND request.subject = "'.$subject.'" AND request.service_type = "'.$search_type.'" AND request.date = "'.$date.'" AND request.time = "'.$time.'" AND created_at LIKE "%'.$current_date.'%" ')-> result_array();
        // if ($chk_result) {
        //     $data_result['result'] = 'true';
        //     $data_result['msg'] = 'Your Request sent successfully Please wait for Teacher Response';
        // } else {
            $where = array('student_id' => $student_id);
            $result = $this ->Model-> singleRowdata($where, 'student');
            if ($result) {
                $data = array(
                    'student_id' => $student_id,
                    'stage' => $education_level,
                    'subject' => $subject,
                    'student_number' => $student_no,
                    'service_type' => $search_type,
                     'student_type' => $student_type,
                    'other' => $other,
                    'date' => $date,
                    'time' => $time,
                    'total_second' => $total_lession_time,
                    'remaining_time' => $total_lession_time,
                    'order_details' => $order_details,
                    'lat'        => $lat,
                    'longnitude' => $long,
                    'filter_date' => date('Y-m-d', strtotime($date)),
                    'address' => $address
                );
                $request_res = $this ->Model-> insert($data, 'request');
                if ($request_res) {
                    if (!empty($teacher_type) && !empty($education_level) && !empty($subject)) {
                        $resultData = $this ->db-> query('SELECT t.*,c.city_name FROM teacher as t JOIN city as c ON t.city = c.city_id  WHERE t.teacher_gender = "'.$teacher_type.
                            '" AND t.learning_levels LIKE "%'.$education_level.
                            '%" AND c.city_name LIKE "%'.$address.
                            '%" ')->result_array();
                        if ($resultData) {
                            foreach($resultData as $key) {
                                $teacher_data[] = array('teacher_id' => $key['teacher_id']);

                                $title = 'Student Request';
                                $message = 'You Have Received New Request';
                                $device_type = $key['device_type'];
                                $device_token = $key['device_token'];
                                $noti_type = $key['notification_type'];

                                if ($device_type == 'android' && $noti_type='enable') {
                                    $this -> sendPushMessageNew($device_token, $title, $message);
                                }
                                $type = 'Request';
                                $teacher_id = $key['teacher_id'];
                                $request_id = $request_res;
                                $this-> Notification($request_id, $teacher_id, $type, $message);
                            }
                                $data_result['result'] = 'true';
                                $data_result['data'] = $teacher_data;
                                $data_result['msg'] = 'عروض المدرسين
                                ';
                            } else {
                            $data_result['result'] = 'false';
                            $data_result['data'] =[];
                            $data_result['msg'] = 'البيانات المطلوبة غير متوفرة
                            ';
                        }
                    }
                }
            } else {
                $data_result['result'] = 'false';
                $data_result['msg'] = 'لم يتم العثور
            ';
            }
        echo json_encode($data_result);
    }
     public function orderDetails(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $student_id = $val->student_id;

        $fatchRes = $this->db->query('SELECT t.teacher_name, t.teacher_image,t.nationality,t.city,lev.level_name, mat.material_name, r.* FROM request as r JOIN teacher as t  ON r.teacher_id = t.teacher_id JOIN learning_level as lev  ON r.stage = lev.l_id JOIN learning_material as mat  ON r.subject = mat.material_id  WHERE r.student_id = "'.$student_id.'" AND  r.payment_status = 1 AND  r.status = 1 ORDER BY r.request_id DESC limit 0,30')->result_array();
            if ($fatchRes) {
                foreach ($fatchRes as $key) {
                    $whereNation = array('n_id' => $key['nationality'], );
                    $getNationality = $this ->Model-> singleRowdata($whereNation, 'nationality');
                    if($getNationality){
                       $n_name=  $getNationality->n_name;
                    }else{
                        $n_name= '';
                    }

                    $whereCity = array('city_id' => $key['city'], );
                    $getCity= $this ->Model-> singleRowdata($whereCity, 'city');
                    if($getCity){
                       $city_name=  $getCity->city_name;
                    }else{
                        $city_name= '';
                    }
                    
                    $rating = $this->teacherRating($key['teacher_id']);
                    if ($rating) {
                        $rate = $rating;
                    }else{
                        $rate = [];
                    }
                    $where = array(
                        'teacher_id' => $key['teacher_id'],
                        'student_id' => $key['student_id']
                    );         
                    $favourite = $this->Model->singleRowdata($where,'favorite');
                    if($favourite){
                       $favourite_status = $favourite->is_status;
                    }else{
                       $favourite_status =  '0';    
                    }

                    $fatch_data[] = array(    
                       'request_id'     => $key['request_id'],
                       'teacher_id'     => $key['teacher_id'],
                       'teacher_name'   => $key['teacher_name'],
                       'teacher_image'  => $key['teacher_image'],
                       'nationality'    => $n_name,
                       'city'           => $city_name,
                       'student_id'     => $key['student_id'],
                       'service_selector' => $key['student_type'],
                       'stage'          => $key['level_name'],
                       'subject'        => $key['material_name'],
                       'service_type'   => $key['service_type'],
                       'time'           => $key['time'],
                       'price'          => $key['price'], 
                       'order_details'  => $key['order_details'],
                       'status'         => $key['status'],
                       'date'           => $key['date'], 
                       'favourite_status'=> $favourite_status,
                       'rate' => $rate
                    );
                }
                $data_result['result']   = 'true';
                $data_result['data']     = $fatch_data;
                $data_result['msg']      =' تم الحصول على البيانات بنجاح
                ';
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
                $data_result['msg']      = 'طلبات الطالب غير متاحة
            ';
            }
                 
            echo json_encode($data_result);
    }
    
    public function cancleTeacherRequest(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $request_id = $val->request_id;
        $student_id = $val->student_id;
        $teacher_id = $val->teacher_id;
        $whereID = array(
            'request_id' => $request_id,
            'student_id' => $student_id,
        );
        $statusData = array(
            'status' => '2',
        );
        $result = $this->Model->update( 'request', $statusData,$whereID);
        if ($result) {
            $whereRID = array(
                'request_id' => $request_id
            );
            $getRequest =$this->Model->selectAllById('request',$whereRID);
            if ($getRequest) {
                $status = $getRequest->status;
                  $whereStd = array(
                     'student_id' => $getRequest->student_id
                  );
                  $getUser =$this->Model->selectAllById('student',$whereStd);
                  if ($getUser) {
                    $device_ids = $getUser->device_token;
                       $title      = 'Request Cancle';
                       $message    = 'ك  ' .$getRequest->date. ' طلب إلغاء 
                    ';
                    if($getUser->device_type == 'android') {
                        $this->sendPushMessageNew($device_ids, $title, $message);
                    }
                  $data_result['result'] = 'true';
                  $data_result['msg']    = $title;
                }
            }else{
                $data_result['result'] = 'false';
                $data_result['msg']    = 'الطلب غير موجود
                ';
            }
        }
        echo json_encode($data_result); 
    }

    public function Notification($request_id, $teacher_id, $type, $message) {
        $data = array(
            'request_id' => $request_id,
            'type'       => $type,
            'teacher_id' => $teacher_id,
            'message'    => $message,
            'status'     => '1',
            'date'       => date('d-m-Y H:i:s'),
        );
        
        $notification = $this->Model->insert($data,'notification');
        if ($notification) {
           return $notification;
        }else{
            return 0;
        }        
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
      $checkfavorite = $this->Model->selectAllById('favorite',$whereID);
      if($checkfavorite){
          if($status == '1'){
              $param = array( 'is_status' => '1');
              $results = $this->Model->update('favorite', $param, $whereID);
              if ($results) {
                $data_result['result'] = 'true';
                $data_result['msg'] ='اضافة الملعم للمفضلة
                ';
              }else{
                $data_result['result'] = 'false';
                $data_result['msg'] ='لايمكن اضافة المعلم للمفضلة
              ';
              }
          }
          if($status == '0'){
               $param = array( 'is_status' => '0');
              $results = $this->Model->update('favorite', $param, $whereID);
              if ($results) {
                $data_result['result'] = 'true';
                $data_result['msg'] = 'إزالة من المفضلة
                ';
              }else{
                $data_result['result'] = 'false';
                $data_result['msg'] ='لايمكن الازاله من المفضلة
              ';
              }
          }
         
      }else{
            $param = array('student_id' => $student_id, 'teacher_id' => $teacher_id, 'is_status' => '1');
            $results = $this->Model->insert($param,'favorite');
            if ($results) {
              $data_result['result'] = 'true';
              $data_result['msg'] = 'اضافة للمفضلة
                ';
            }else{
              $data_result['result'] = 'false';
              $data_result['msg'] = 'لايمكن الاضافة للمفضلة
            ';
           }
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
            'status' => 2
          );
        $result = $this->Model->Model->update( 'favourite',$statusData,$whereID); 
        if($result){
            $data_result['result'] = 'true';
            $data_result['msg']    ='تم الازالة بنجاح
            ';
        }else{
            $data_result['result'] = 'false';
            $data_result['msg']    ='فشل العملية
        ';
        } 
        echo json_encode($data_result); 
    }

    public function rating_app(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $type = $val->type;
        $rate = $val->rate;
        $user_id = $val->user_id;
        
        if ($type == 'student') {
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
                    $data_result['msg'] = 'م التقييم
                ';
                }else{
                    $data_result['result'] = 'false';
                    $data_result['msg']    ='فشل العملية
        ';
                }
            }else{
                $data = array(
                'user_id' => $user_id,
                'rate' => $rate,
                'type' => 'student'
                );
                $results = $this->Model->insert($data,'rate_app');
                if($results){
                    $data_result['result'] = 'true';
                    $data_result['msg'] = 'تم التقييم
                    ';
                }else{
                    $data_result['result'] = 'false';
                    $data_result['msg']    ='فشل العملية
        ';
                }
            }
        }
        echo json_encode($data_result);
    } 
    
    public function favoriteList(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        if ($val->student_id) {
            $student_id = $val->student_id;
            $where = array(
                'student_id' => $student_id,
                'is_status'  => '1'
            );
            $favorite = $this->Model->selectdata('favorite',$where);
            if ($favorite) {
                foreach ($favorite as $key) {
                    $teacher_id = $key['teacher_id'];
                    $where = array('teacher_id' => $teacher_id);
                    $teacherData = $this->Model->singleRowdata($where,'teacher');
                    if ($teacherData) {
                            $learning_levels = $teacherData->learning_levels;
                            if($learning_levels){
                                $result = $this->Model->learning_level($learning_levels);
                                if(!empty($result)){
                                   $learning_level =  $result;
                                }else{
                                    $learning_level = [];
                                }    
                            }
        
                            $learning_materials = $teacherData->learning_materials;
                            if($learning_materials){
                                $learning_mat = $this->Model->learningMaterials($learning_materials);
                                if(!empty($learning_mat)){
                                   $learn_mat =  $learning_mat;
                                }else{
                                    $learn_mat = [];
                                }    
                            }
                            
                            $rating = $this->teacherRating($teacherData->teacher_id);
                                if ($rating) {
                                    $rate = $rating;
                                }else{
                                    $rate = [];
                               }

                            $fatch_data[] = array(
                                'f_id'                => $key['f_id'],
                                'teacher_id'          => $teacherData->teacher_id, 
                                'teacher_name'        => $teacherData->teacher_name,
                                'teacher_phone'       => $teacherData->teacher_phone,
                                'qualification'       => $teacherData->qualification,
                                "teacher_gender"      => $teacherData->teacher_gender,
                                'teacher_image'       => $teacherData->teacher_image,
                                'teacher_gender'      => $teacherData->teacher_gender,
                                'learning_levels'     => $learning_level,
                                'learning_materials'  => $learn_mat,
                               'student_id'           => $key['student_id'],
                               'review'               => $key['review'],
                               'rate'                 => $rate,
                               'created_at'           => $key['created_at']
                            );
                    }else{
                      //  $fatch_data = [];
                    }
                    
                }
                $data_result['result']   = 'true';
                $data_result['data']     = $fatch_data;
                $data_result['msg']      = 'بيانات المدرسين
                ';
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
                $data_result['msg']      = 'الرجاء اكمال الملف الشخصي 
                ';
            } 
        }else{
            $data_result['result']   = 'false';
            $data_result['msg']      = 'الرجاء ادخال رقم صحيح
            ';
        }                 
        echo json_encode($data_result);
    }
    
    public function changePassword(){
    $post = file_get_contents('php://input');
    $val=json_decode($post);
    $headers = $this->input->request_headers();
    $student_id =$val->student_id;
      $where_pwd = array(
        'password'     =>  $val->old_password,
        'student_id'   =>  $student_id
      );
      $changeres = $this->Model->singleRowdata($where_pwd,'student');
        if($changeres){
          $where_newpwd = array(
            'student_id'=>$student_id
          );
          $new_data = array(
            'password' => $val->new_password
          );

          $Res = $this->Model->update('student',$new_data, $where_newpwd);
          if($Res){
            $where_user_row = array(
            'student_id' =>$student_id
          );
          $result   = $this->Model->singleRowdata($where_user_row,'student');
            if($result){
              $output['result'] = 'true';
              $output['msg']    = 'تم تغيير كلمة المرور بنجاح
                ';
            }else{

              $output['result'] = 'true';
               $output['msg']    = 'تم تغيير كلمة المرور بنجاح
                ';
            }
          }else{
            $output['result'] ='false';
            $output['msg'] ='فشل العملية
           ';
          }
      }else{
          $output['result'] ='false';
          $output['msg'] ='كلمة المرور القديمة غير صحيحة
        ';
      }

    echo json_encode($output);
    }
    
    public function getPrivacyPolicy(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $type = $val->type;
        if ($type == 'Student') {
            $where = array(     
                'id'          => 3,
                'policy_type' => 'Student'
            );
            $privacyData = $this->Model->singleRowdata($where,'all_page');  
            if ($privacyData) {
               
                $data_result['result']          = 'true';
                $data_result['msg']             ='نجاح
                ';
                $data_result['description']     = $privacyData->description;
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
                 $data_result['msg']      ='فشل العملية
                '; 
            }  
        }
              
        echo json_encode($data_result);
    }
    
    public function getUsagePolicy(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $type = $val->type;
        if ($type == 'Student') {
            $where = array(     
                'id'          => 4,
                'policy_type' => $type
            );
            $usageData = $this->Model->singleRowdata($where,'all_page');  
            if ($usageData) {
                $data_result['result']   = 'true';
                $data_result['msg']             ='نجاح
                ';
                $data_result['description']  = $usageData->description;
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
                $data_result['msg']      ='فشل العملية
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
        $id = $val->type;
        
        $data = array(
            'name'      => $name,
            'email'     => $email,
            'message'   => $message,
            'type'      => $type,
            'user_id'   => $id,
        );
        $res  = $this->Model->insert($data,'contact');
        if ($res) {
            $data_result['result']  = 'true';
            $data_result['msg']     = 'نجاح
            ';
        }else{
            $data_result['result']     = 'false';
            $data_result['msg']    ='فشل العملية
        ';
        }
        echo json_encode($data_result);
    }
  
    public function getRequestDetails(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $request_id = $val->request_id;
        $teacher_id = $val->teacher_id;
        $price      = $val->price;
        $student_id = $val->student_id;
        $resultData = $this->db->query('SELECT lev.level_name, mat.material_name,r.* FROM request as r JOIN learning_level as lev  ON r.stage = lev.l_id JOIN learning_material as mat  ON r.subject = mat.material_id WHERE r.request_id ="'.$request_id.'" ')->result_array(); 
        if ($resultData) {
             $fatch_data[] = array(    
               'request_id'     => $resultData[0]['request_id'],
               'teacher_id'     => $teacher_id,
               'service_selector' => $resultData[0]['student_type'],
               'stage'          => $resultData[0]['level_name'],
               'subject'        => $resultData[0]['material_name'],
               'service_type'   => $resultData[0]['service_type'],
               'time'           => $resultData[0]['time'],
               'order_details'  => $resultData[0]['order_details'],
                'status'        => $resultData[0]['is_status'],
                'date'          => date("jS F Y", strtotime($resultData[0]['date'])),
                'lat'          => $resultData[0]['lat'],
                'long'          => $resultData[0]['longnitude'],
                'price'          => $price,
            );
            $data_result['result']   = 'true';
            $data_result['data']     = $fatch_data;
            $data_result['msg']      = 'تم العثور على البيانات بنجاح 
            ';
        }else{
            $data_result['result']   = 'false';
            $data_result['data']     = [];
           $data_result['msg']      ='فشل العملية
                ';
            }   
        echo json_encode($data_result);
    }
    
    public function confirmRequestWithPayment(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $is_status        = $val->is_status;
        $request_id       = $val->request_id;
        $student_id       = $val->student_id;
        $teacher_id       = $val->teacher_id;
        $price            = $val->price;
        $coupon_id        = $val->coupon_id;
        $card_holder_name = $val->card_holder_name;
        $card_number      = $val->card_number;
        $card_cvv         = $val->card_cvv;
        $expired_date     = $val->expired_date;
        $expired_month    = $val->expired_month;
        $currency         = $val->currency;
        $ford_id          = $val->ford_id;
        $payment_option   = $val->payment_option;
        $payment_status   = $val->payment_status;
        $whereID = array(
            'request_id' => $request_id,
            'student_id' => $student_id,
        );
        $checkReqData = $this->Model->singleRowdata($whereID,'request');

        $percentage     = '20';
        $appProfit      =  ($price*$percentage)/100;
        $remind         = $price - $appProfit;

        if ($checkReqData) {
            if ($checkReqData->is_status == 1) {
                $data_result['result'] = 'false';
                $data_result['msg']    = 'تم قبول العملية مسبقا
                ';
            }else{

                if ($is_status == 'visa') {
                    $data = array(
                        'request_id'   => $request_id,
                        'user_id'      => $student_id,
                        'teacher_id'   => $teacher_id,
                        'coupon_id'    => $coupon_id,
                        'card_holder_name'    => $card_holder_name,
                        'card_cvv'    => $card_cvv,
                        'expired_date'    => $expired_date,
                        'expired_month'    => $expired_month,
                        'currency'    => $currency,
                        'ford_id'    => $ford_id,
                        'payment_option'    => $payment_option,
                        'payment_status'    => $payment_status,
                        'total_pay_amount' => $price,
                        'credit_card' => $price,
                        'cash_amount' => '0',
                        'pay_by'       => 'credit_card',
                        'app_profit'       => $appProfit,
                        'remind'       => $remind,
                        'is_status'    => 1,
                        'date_time'    => date('Y-m-d'),
                    );
                    $res  = $this->Model->insert($data,'transaction');
                    if ($res) {
                        $statusData = array(
                            'price'          => $price,
                            'teacher_id'     => $teacher_id,
                            'status'         => 1,
                            'is_status'      => 1,
                            'payment_status' => 1,
                            'pay_by'       => 'credit_card',
                            'payment_date'           => date('Y-m-d'),
                        );
                        $result = $this->Model->update('request', $statusData, $whereID);
                        if($result){
                            $whereID = array(
                                'teacher_id'  => $teacher_id,
                            );
                            $checkTeacherData = $this->Model->singleRowdata($whereID,'teacher');
                            if ($checkTeacherData) {
                                $wallet_amount   = $checkTeacherData->wallet_amt + $remind;
                                $wallet_total    = $checkTeacherData->total + $price;
                                $walletAppProfit = $checkTeacherData->app_profit + $appProfit;
                                $teacher_wallet = array(
                                    'wallet_amt' => $wallet_amount,
                                    'total'      => $wallet_total,
                                    'app_profit' => $walletAppProfit,
                                 );
                                $updateTeacWallet = $this->Model->update('teacher', $teacher_wallet, $whereID);
                                
                                $accData = array(
                                    'status'      => 2,
                                    'payment' => 1,
                                );
                                $result = $this->Model->update('request_accepted', $accData, $whereID);
                                $whereRID = array(
                                    'request_id' => $request_id
                                );
                                $reqData = array(
                                    'status' => 2
                                );
                                $noti_update = $this->Model->update('student_notification', $reqData, $whereRID);

                                $title = 'Confirm Request';
                                $message = 'تم تأكيد طلبك
                                ';
                                $device_type = $checkTeacherData->device_type;
                                $device_token = $checkTeacherData->device_token;

                                if ($device_type == 'android') {
                                    $this -> sendPushMessageNew($device_token, $title, $message);
                                } 
                            }
                           
                            $type = 'Confirm Request';
                            $this-> Notification($request_id, $teacher_id, $type, $message);
                            $data_result['result'] = 'true';
                            $data_result['msg']    = 'تم التأكيد بنجاح
                            ';
                        }else{
                            $data_result['result'] = 'false';
                            $data_result['msg']      ='فشل العملية
                ';
                        } 
                    }
                }

                if ($is_status == 'cash') {
                    $data = array(
                        'request_id'   => $request_id,
                        'user_id'      => $student_id,
                        'teacher_id'   => $teacher_id,
                        'coupon_id'    => $coupon_id,
                        'payment_option'    => $payment_option,
                        'payment_status'    => $payment_status,
                        'cash_amount' => $price,
                        'credit_card' => '0',
                        'total_pay_amount' => $price,
                        'pay_by'       => 'cash',
                        'app_profit'       => $appProfit,
                        'remind'       => $appProfit,
                        'is_status'    => 1,
                        'date_time'    => date('Y-m-d'),
                    );
                    $res  = $this->Model->insert($data,'transaction');
                    if ($res) {
                        $statusData = array(
                            'price'          => $price,
                            'teacher_id'     => $teacher_id,
                            'status'         => 1,
                            'is_status'      => 1,
                            'payment_status' => 1,
                            'pay_by'         => 'cash',
                            'payment_date'   => date('Y-m-d'),
                        );
                        $result = $this->Model->update('request', $statusData, $whereID);
                        if($result){
                            $whereID = array(
                                'teacher_id'  => $teacher_id,
                            );
                            $checkTeacherData = $this->Model->singleRowdata($whereID,'teacher');
                            if ($checkTeacherData) {
                                $wallet_amt = $checkTeacherData->wallet_amt;
                                $percentage1     = '20';
                                $appProfit1      =  ($price*$percentage1)/100;
                                $cash_wall_teach  = $wallet_amt - $appProfit1;

                                $cash_amount = $checkTeacherData->cash_amount + $price;
                                $cash_total = $checkTeacherData->total + $price;
                                $cashAppProfit = $checkTeacherData->app_profit + $appProfit;
                                $teacher_cash_wallet = array(
                                    'cash_amount' => $cash_wall_teach,
                                    'total'       => $cash_total,
                                    'app_profit'  => $cashAppProfit,
                                 );

                               // $amt = array('wallet_amt' => $cash_wall_teach);
                                $debitTeacWallet = $this->Model->update('teacher', $teacher_cash_wallet, $whereID);
                                $accData = array(
                                    'status'      => 2,
                                    'payment' => 1,
                                );
                                $result = $this->Model->update('request_accepted', $accData, $whereID);

                                $whereRID = array(
                                    'request_id' => $request_id
                                );
                                $reqData = array(
                                    'status' => 2
                                );
                                $noti_update = $this->Model->update('student_notification', $reqData, $whereRID);
                                $title = 'Confirm Request';
                                $message = 'تم تأكيد طلبك
                                ';
                                $device_type = $checkTeacherData->device_type;
                                $device_token = $checkTeacherData->device_token;
                                if ($device_type == 'android') {
                                    $this -> sendPushMessageNew($device_token, $title, $message);
                                } 
                            }
                            $type = 'Confirm Request';
                            $this-> Notification($request_id, $teacher_id, $type, $message);
                            $data_result['result'] = 'true';
                            $data_result['msg']    = 'تم تأكيد طلبك
                                ';
                        }else{
                            $data_result['result'] = 'false';
                            $data_result['msg']      ='فشل العملية
                ';
                        } 
                    }
                }
            }
        }else{
            $data_result['result']   = 'false';
            $data_result['data']     = [];
            $data_result['msg']      = 'لاتوجد بيانات 
            ';
        }
        echo json_encode($data_result); 
    }
    
    public function couponList(){
        $post = file_get_contents('php://input');
        $val  = json_decode($post);
        $coupon_id = $val->coupon_id;
        if ($coupon_id) {
            $whereCID = array(
                'coupon_id' => $coupon_id
            );
            $getList =$this->Model->selectAllById('coupon',$whereCID);
            if ($getList) {
                  $data_result['result'] = 'true';
                  $data_result['msg']    = $getList;
                
            }else{
                $data_result['result'] = 'false';
                $data_result['msg']      ='فشل العملية
                ';
            }
        }
        echo json_encode($data_result); 
    }
    
    public function checkCouponCode() {
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $coupon_code = $val->coupon_code;
        $amount = $val ->amount;

        $where = array(
            'coupon_code' => $coupon_code
        );
        $results = $this ->Model-> singleRowdata($where, 'coupon');
        if ($results) {
            $currentDate = date('Y-m-d');
            if ($results->start_date <= $currentDate && $results ->end_date>= $currentDate) {
                if ($results->discount_type == 'Flat') {
                    $flat = $results->discount;
                    $totalAmount = $amount;
                    $new_amount = $amount - $flat;
                }
                elseif($results ->discount_type == 'Percent') {

                    $percentage = $results ->discount;
                    $totalAmount = $amount;
                    $percent = $percentage / 100 * $totalAmount;
                    $new_amount = $totalAmount - $percent;

                }else {}
                $coupon_array = array(
                    'old_amount' => $amount,
                    'new_amount' => $new_amount,
                    'discount' => $results->discount.
                    ' '.$results ->discount_type,
                    'coupon_id' => $results->coupon_id
                );
                $data_result['result'] = 'true';
                $data_result['data'] = $coupon_array;
                $data_result['message'] = 'Apply successfully';
            } else {
                $data_result['result'] = 'false';
                $data_result['data'] = [];
                $data_result['message'] = 'هFailed';
            }
        } else {
            $data_result['result'] = 'false';
            $data_result['data'] = [];
            $data_result['message'] = 'هFailed';
        }
        echo json_encode($data_result);
    }
    
    public function demandData(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $student_id = $val->student_id;
        $teacher_id = $val->teacher_id;
        $request_id = $val->request_id;
        if ($val->student_id) {
           
        $resultData = $this->db->query('SELECT lev.level_name, mat.material_name, r.* FROM request as r JOIN learning_level as lev  ON r.stage = lev.l_id JOIN learning_material as mat  ON r.subject = mat.material_id WHERE r.request_id ="'.$request_id.'" AND r.student_id = "'.$student_id.'"')->result_array(); 
            if ($resultData) {
                
                $result_teacher = $this->db->query('SELECT * FROM teacher WHERE teacher_id = "'.$teacher_id.'"')->row(); 
                
                 $fatch_data[] = array(    
                   'request_id'     => $resultData[0]['request_id'],
                   'teacher_id'     => $result_teacher->teacher_id,
                   'teacher_name'   => $result_teacher->teacher_name,
                   'service_selector' => $resultData[0]['service_selector'],
                   'stage'          => $resultData[0]['level_name'],
                   'subject'        => $resultData[0]['material_name'],
                   'service_type'   => $resultData[0]['service_type'],
                   'time'           => $resultData[0]['time'],
                   'order_details'  => $resultData[0]['order_details'],
                    'status'        => $resultData[0]['is_status'],
                    'pay_by'        => $resultData[0]['pay_by'],
                    'date'          => date("jS F Y", strtotime($resultData[0]['date']))
                );
                $data_result['result']   = 'true';
                $data_result['data']     = $fatch_data;
                $data_result['msg']      = 'تم العثور على التفاصيل 
                ';
            }else{
                $data_result['result']   = 'false';
                $data_result['data']     = [];
                $data_result['msg']      = 'التفاصيل غير متوفرة
            ';
            } 
        }else{
            $data_result['result']   = 'false';
            $data_result['msg']      ='فشل العملية
                ';
        }                 
        echo json_encode($data_result);
    }

    public function notificationOnOff(){
      $post = file_get_contents('php://input');
      $val = json_decode($post);
      $status           = $val->status;
      $student_id       = $val->student_id;
      $whereID = array(
          'student_id'       => $val->student_id
      );
      $checkTeacher= $this->Model->selectAllById('student',$whereID);
      if($checkTeacher){
          if ($status == 'ON') {
              $param = array( 'notification_type' => 'enable');
              $results = $this->Model->update('student', $param, $whereID);
              if ($results) {
                $data_result['result'] = 'true';
                $data_result['msg'] = 'تفعيل التنبيهات
                ';
              }else{
                $data_result['result'] = 'false';
                $data_result['msg']      ='فشل العملية
                ';
              }
          }
          if($status == 'OFF'){
              $param = array( 'notification_type' => 'disable');
              $results = $this->Model->update('student', $param, $whereID);
              if ($results) {
                $data_result['result'] = 'true';
                $data_result['msg'] = 'ايقاف التنبيهات
                ';
              }else{
                $data_result['result'] = 'false';
                $data_result['msg']      ='فشل العملية
                ';
              }
          }
      }else{
            $data_result['result'] = 'false';
            $data_result['msg']      ='فشل العملية
                ';
      } 
      echo json_encode($data_result);
    }
    
    
    public function accountSetting(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        if ($val->student_id) {
            $student_id  = $val->student_id;
            $username    = $val->username;
            $usermobile  = $val->usermobile;
            $where = array(
                'student_id' => $val->student_id,
            );
            $fatchRes = $this->Model->singleRowdata($where,'student');
            if ($fatchRes) {
                $data = array(
                    'student_name' => $username
                );
                $results = $this->Model->Model->update('student',$data,$where); 

                $data_result['result']   = 'true';
                $data_result['msg']      = 'تم إنشاء الحساب
                ';
            }else{
                $data_result['result']   = 'false';
               $data_result['msg']      ='فشل العملية
                ';
            }
        }
        echo json_encode($data_result);
    }

    public function teacher_rating(){
        $post = file_get_contents('php://input');
        $val = json_decode($post);
        $rate = $val->rate;
        $teacher_id = $val->teacher_id;
        $student_id = $val->student_id;
        
        if ($student_id) {
            $whereID = array( 'student_id' => $val->student_id);
            $checkData = $this->Model->singleRowdata($whereID,'teacher_rate');
            if ($checkData) {
                $data = array(
                    'teacher_id' => $teacher_id,
                    'student_id' => $student_id,
                    'rate'       => $rate,
                );
                $results = $this->Model->Model->update('teacher_rate',$data,$whereID);
                if($results){
                    $data_result['result'] = 'true';
                    $data_result['msg'] = 'تم التقييم بنجاح
                    ';
                }else{
                    $data_result['result'] = 'false';
                    $data_result['msg']    ='فشل العملية
        ';
                }
            }else{
                $data = array(
                    'teacher_id' => $teacher_id,
                    'student_id' => $student_id,
                    'rate'       => $rate,
                );
                $results = $this->Model->insert($data,'teacher_rate');
                if($results){
                    $data_result['result'] = 'true';
                    $data_result['msg'] = 'تم التقييم بنجاح
                    ';
                }else{
                    $data_result['result'] = 'false';
                    $data_result['msg']    ='فشل العملية
        ';
                }
            }
        }
        echo json_encode($data_result);
    } 
    
    public function sendPushMessageNew($device_token, $title, $message){
        $device_id = $device_token;
        $url = "https://fcm.googleapis.com/fcm/send";
        $token = $device_id;
        $serverKey = 'AIzaSyDJIQSllLP8bA4b_PnqUVydvNQTzO9DiS8';
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

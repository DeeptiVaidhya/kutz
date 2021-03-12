<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function coupon_managment()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $data['coupon'] = $this->Model->select('coupon');
            $this->load->view('admin/coupon/coupon_list', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function couponAdd()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/coupon/coupon_add');
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }


    public function insertCoupon()
    {
        if($this->session->userdata('LoggedIn')){
            $coupon_code   =  $this->input->post('coupon_code');
            $coupon_name   =  $this->input->post('coupon_name');
            $description   =  $this->input->post('description');
            $discount      =  $this->input->post('discount');
            $discount_type  =  $this->input->post('discount_type');
            $start_date      =  $this->input->post('start_date');
            $end_date      =  $this->input->post('end_date');

            $data = array(
            	'coupon_code'   => $coupon_code,
                'coupon_name'   => $coupon_name,
                'description'   => $description,
                'discount'      => $discount,
                'discount_type' => $discount_type,
                'start_date'    => $start_date,
                'end_date'      => $end_date,
            );
            
            $result = $this->Model->insert($data,'coupon');
            if ($result) {   
                $total_request = $this->db->query("SELECT COUNT(student_id) as total_student_request , student_id FROM `request` WHERE payment_status = 1 GROUP BY student_id")-> result_array();
                if ($total_request) {
                    foreach ($total_request as $value) {
                        if ($value['total_student_request'] > 1) {
                                //send push notificaton with coupon code and expired date
                                $studentID =  $value['student_id'];
                                $whereID = array(
                                    'student_id' => $studentID
                                );
                                $StdData = $this->Model->singleRowdata($whereID,'student');

                                $title = 'New Coupon';
                                $message = 'You Have New Coupon';
                                $device_type = $StdData->device_type;
                                $device_token = $StdData->device_token;
                                $noti_type = $StdData->notification_type;

                                if ($device_type == 'android' && $noti_type='enable') {
                                    $this ->sendPushMessageNew($device_token, $title, $message);
                                }
                                $type = 'Request';
                                $student_id = $StdData->student_id;
                                $coupon_id = $result;
                                $this-> Notification($coupon_id, $student_id, $type, $message);
                        }
                    }
                }

                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> Success ! </strong> Student add successfully</div>');
                redirect('Coupon/coupon_managment');
            }else{
                $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> Error ! </strong> Student not add</div>');
                redirect('Coupon/couponAdd');
            }
        
        }
    }

    public function editCoupon($id)
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
        	$where = array(
                'coupon_id'           => $id
            );
            $data['coupon'] = $this->Model->singleRowdata($where, 'coupon');
            $this->load->view('admin/coupon/coupon_edit', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function editCouponDetails() {
        if ($this->session->userdata('LoggedIn')) {

            $coupon_id     =  $this->input->post('coupon_id');
             $coupon_code   =  $this->input->post('coupon_code');
            $coupon_name   =  $this->input->post('coupon_name');
            $description   =  $this->input->post('description');
            $discount      =  $this->input->post('discount');
            $discount_type  =  $this->input->post('discount_type');
            $start_date      =  $this->input->post('start_date');
            $end_date      =  $this->input->post('end_date');
            $wheredata = array(
                'coupon_id' => $coupon_id
            );

            $data = array(
                'coupon_code'   => $coupon_code,
                'coupon_name'   => $coupon_name,
                'description'   => $description,
                'discount'      => $discount,
                'discount_type'      => $discount_type,
                'start_date'      => $start_date,
                'end_date'      => $end_date,
            );

            $updateResult = $this->Model->update('coupon',  $data, $wheredata);
            if ($updateResult) {
              $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Record Updated Sucessfully!!</strong>.
              </div>');
              redirect('Coupon/coupon_managment');
            }else{
              $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!!</strong>.
              </div>');
              redirect('Coupon/editCoupon');
            }
        }else{
            redirect('Login');
        }
           
    }


    public function deleteCoupon($id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $wheredata    = array(
                'coupon_id' => $id
            );
            $updateResult = $this->Model->delete($wheredata, 'coupon');
            if ($updateResult) {
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Record Delete Sucessfully!!</strong>.
                </div>');
            redirect('Coupon/coupon_managment'); 
           
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Record Not Delete!!</strong>.
                </div>');
                redirect('Coupon/coupon_managment');
            }
        }else
        {
             redirect('Login');
        }
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

    public function Notification($coupon_id, $student_id, $type, $message) {
        $data = array(
            'coupon_id' => $coupon_id,
            'student_id' => $student_id,
            'message'    => $message,
            'status'     => '1',
            'date'       => date('d-m-Y H:i:s'),
        );
        
        $notification = $this->Model->insert($data,'coupon_notification');
        if ($notification) {
           return $notification;
        }else{
            return 0;
        }        
    }



}

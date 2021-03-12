<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('login');
    }

    public function signIn()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $wheredata = array(
            'email'    => $username,
            'password' => $password,
        );
        $result = $this->Model->login($wheredata,'login');
        //print_r($result);die;
        if (!empty($result)) {
        if($result->password == $password) {
        $this->session->set_userdata('LoggedIn', true);
        $this->session->set_userdata('login_id', $result->id);
        $this->session->set_userdata('email', $result->email);
        $this->session->set_userdata('name', $result->fullname);
        $this->session->set_userdata('role', $result->role);

        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Admin!</strong></div>');
        redirect('Login/dashboard');

        } else {
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Incorrect Password.</div>');
        redirect('Login/index');
        }
        } else {
        $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Sorry!</strong> Incorrect Username And Password.
        </div>');
        redirect('Login');
        }
    }


    public function dashboard()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            
            $wheredata = array(
                'status' =>'0',
            );
            $data['register_student'] = $this->Model->countWhere('student',$wheredata);

            $wheredata = array(
                'status' =>'0',
            );
            $data['unregister_student'] = $this->Model->countWhere('student',$wheredata);

            $whereTeach = array(
                'status' =>'0',
                'profile_status' =>'1',
            );
            $data['register_teacher'] = $this->Model->countWhere('teacher',$whereTeach);

            $whereTeach = array(
                'status' =>'0',
            );
            $data['unregister_teacher'] = $this->Model->countWhere('teacher',$whereTeach);

            $whereWR = array(
                'status' =>'0'
            );
            
            $data['withdraw_request'] = $this->Model->countWhere('withdraw_request',$whereWR);

            // $whereRequest = array(
            //     'status' =>'1'
            // );
            $data['request'] = $this->Model->count('request');

            $whereOperation= array(
                'is_status' => 1,
                'status'    => 1,
                'payment_status' =>1,
            );
            $data['operation'] = $this->Model->countWhere('request',$whereOperation);
            $data['contact'] = $this->Model->count('contact');
            $this->load->view('admin/dashboard', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        }
    }



    public function logout()
    {  
        $this->session->userdata('LoggedIn');
        session_destroy();
        redirect('Login');
    }
    
}
?>
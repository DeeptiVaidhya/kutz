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
        $result = $this->Model->login($wheredata,'admin');
        // print_r($result);die;
        if (!empty($result)) {
        if($result->password == $password) {
        $this->session->set_userdata('LoggedIn', true);
        $this->session->set_userdata('login_id', $result->admin_id);
        $this->session->set_userdata('email', $result->email);
        $this->session->set_userdata('fname', $result->fname);
        $this->session->set_userdata('lname', $result->lname);

        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Admin!</strong></div>');
        redirect('Home/reports');

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
            $data['title'] = 'Dashboard';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/dashboard');
            $this->load->view('admin/include/footer');
        }else{
            redirect('Welcome');
        }
    
    }

    public function logout() {
        $this->session->unset_userdata('LoggedIn');
        session_destroy();
        redirect(base_url(), 'refresh');
    }

    
}
?>
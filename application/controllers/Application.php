<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Application extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->library('session');
        $this->load->library('form_validation');
              
    }

    

    public function beauticianApp(){
        if($this->session->userdata('LoggedIn')){
            $data['title'] = 'Application ';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/include/sidebar');
            $data['customer'] = $this->Model->selectAllBeauticianApplication();
            $this->load->view('admin/beautician_application/beautician_application',$data);
            $this->load->view('admin/include/footer');
        }else{
        redirect('Home');
        } 
    }

    public function application($id)
    {
        
        if($this->session->userdata('LoggedIn')){
            $data['title'] = 'Application';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/include/sidebar');
            $data['customer'] = $this->Model->selectBeauticianApplication($id);
            $this->load->view('admin/beautician_application/single_beautician_application',$data);
            $this->load->view('admin/include/footer');
        }else{
        redirect('Home');
        } 
    }


    
}
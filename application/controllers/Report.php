<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->library('session');
        $this->load->library('form_validation');
              
    }

    public function reports()
    {
        
        if($this->session->userdata('LoggedIn')){
            $data['title'] = 'Reports';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/include/sidebar');
            //  $wheredata = array(
            //     'is_status' => '0',
            //     'role'      => '2'
            // );
            
            $data['customer'] = $this->Model->selectAllCustomerReview();
            // print_r($data['customer']);die;
            $this->load->view('admin/report/reports',$data);
            $this->load->view('admin/include/footer');
        }else{
        redirect('Home');
        } 
    }

     public function singleReports($id)
    {
        
        if($this->session->userdata('LoggedIn')){
            $data['title'] = 'Reports';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/include/sidebar');
            $data['customer'] = $this->Model->selectCustomerReview($id);
            // print_r($data['customer']);die;
            $this->load->view('admin/report/single_reports',$data);
            $this->load->view('admin/include/footer');
        }else{
        redirect('Home');
        } 
    }

    public function banReportUser($id)
    {
        if($this->session->userdata('LoggedIn')){
            $where = array('customer_id' => $id);
            $data = array('is_status' => 1 );
            $res = $this->Model->update('customers', $data, $where);
            if ($res) {
            $this->session->set_flashdata('successtype', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong> Success ! </strong> User Ban Sucessfully</div>');
            redirect('Report/reports'); 
            }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong> Error ! </strong> Failed. </div>');
            redirect('Report/reports');
            }
        }else{
        redirect('Home');
        } 
    }

    public function delateReview($id)
    {
        if($this->session->userdata('LoggedIn')){
            $where = array('customer_id' => $id );
            $res = $this->Model->delete($where,'customer_review');
            if ($res) {
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong> Success ! </strong> Review Delete Sucessfully</div>');
            redirect('Report/reports'); 
            }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong> Error ! </strong> Failed. </div>');
            redirect('Report/singleReports/'.$id);
            }
        }else{
        redirect('Home');
        } 
    }

   
 

    public function editProfile()
    {
        
        if($this->session->userdata('LoggedIn')){
            $login_id = $_SESSION['login_id'];
            $data['title'] = 'Profile Page';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/include/sidebar');
            $wheredata = array(
                'admin_id' => $login_id
            );
            $data['profile_details'] = $this->Model->singleRowdata($wheredata,'admin');
            // print_r($data['profile_details']);die;
            $this->load->view('admin/profile',$data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Home');
        } 
    }

    public function editAdminDetails() {
           
            $wheredata = array(
                    'admin_id' => $this->input->post('admin_id')
             );
            // print_r($wheredata);die;
            if (!empty($_FILES['image']['name'] )) {
                if ($_FILES['image']['name'] ) {
                $config['upload_path']     =  'uploads/admin';
                $config['allowed_types']   = 'gif|jpg|png';
                $config['max_size']        = 10000;
                $config['file_name']       = time().rand(10000,99999).'_'.$data['file_name'];
                // print_r($data['file_name']);die;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = $this->upload->data();
                    $img = $data['file_name'];
                }
            }

            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'image' => $img
            );
            } else {
               $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname')
                );
            }
                    
            $result = $this->Model->update('admin', $data, $wheredata);
            // print_r($result);die;
            if ($result) {
              $this->session->set_flashdata('sucesstype', '<div class="alert alert-info alert-dismissable ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Profile Updated Sucessfully!!</strong>.
              </div>');
              redirect('Home/editProfile');
            }else{
              $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!!</strong>.
              </div>');
              redirect('Home/editUserDetails');
            }
           
   }

    
}
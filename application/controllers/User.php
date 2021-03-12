<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->library('session');
        $this->load->library('form_validation');
              
    }

    public function allUser()
    {
        
        if($this->session->userdata('LoggedIn')){
            $data['title'] = 'All User';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/include/sidebar');
            $wheredata = array(
                'is_status' => '0',
                'role'      => '2'
            );
            $data['customer'] = $this->Model->selectData('customers',$wheredata,'customer_id ASC');
            $this->load->view('admin/user/alluser',$data);
            $this->load->view('admin/include/footer');
        }else{
        redirect('Login');
        } 
    }

    public function addUser(){
        if($this->session->userdata('LoggedIn')){
            $data['title'] = 'All User';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/user/adduser');
            $this->load->view('admin/include/footer');
        }else{
        redirect('Login');
        } 
    }

    public function addUserDetails()
    {
        if ($this->session->userdata('LoggedIn')) {
            // print_r($_FILES);die;
            if ($_FILES['user_image']['name']) {
                $config['upload_path']      =  'uploads/user';
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = 32000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('user_image')) {
                    $error = array('error' => $this->upload->display_errors());

                } else {
                    $data = $this->upload->data(); 
                    $userimage = $data['file_name'];
                    // $userimage = time().rand(10000,99999).'_'.$data['file_name'];                   
                    // $userimage = base_url().'/uploads/user/'.$data['file_name'];

                }
            }
            $userData = array(
                'first_name'   => $this->input->post('first_name'),
                'last_name'    => $this->input->post('last_name'),
                'email'        => $this->input->post('email'),
                'mobile'       => $this->input->post('mobile'),
                'address'      => $this->input->post('address'),
                'image'        => $userimage,
                'role'        => 2
            );
            $result = $this->Model->insert($userData,'customers');
            if ($result) {
                $this->session->set_flashdata('success', '<div class="  alert alert-success ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>user added Sucessfully!!</strong>.</div>');
                redirect('User/allUser');
            }else{
                $this->session->set_flashdata('alert', '<div class="  alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>user Not Added!!</strong>.</div>');
                redirect('User/adduser');
            }
            
    }else {
            redirect('Home', 'refresh');
    }

    }

    public function editUser($id) {

        if ($this->session->userdata('LoggedIn')) {
            $data['title'] = ' user Page';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/include/sidebar');
            $wheredata  = array('customer_id' => $id );
            $data['users'] = $this->Model->singleRowdata($wheredata, 'customers');
            $this->load->view('admin/user/edit_user',$data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('Home');
        }

    }
    
    public function userEdit() {
        if ($this->session->userdata('LoggedIn')) {
            $data['title'] = 'User Page';
            $wheredata = array(
                    'customer_id' => $this->input->post('customer_id')
            );

            if (!empty($_FILES['user_image']['name'])){

            if ($_FILES['user_image']['name'] ) {
                $config['upload_path']          =  'uploads/user';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                // $config['file_name']         = time().rand(10000,99999).'_'.$data['file_name'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('user_image')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = $this->upload->data();
                    $userimage = $data['file_name']; 
                }
            }

             $userData = array(
                'first_name'   => $this->input->post('first_name'),
                'last_name'    => $this->input->post('last_name'),
                'email'        => $this->input->post('email'),
                'mobile'       => $this->input->post('mobile'),
                'address'       => $this->input->post('address'),
                'image'        => $userimage
            );

             }else{
                $userData = array(
                    'first_name'   => $this->input->post('first_name'),
                    'last_name'    => $this->input->post('last_name'),
                    'email'        => $this->input->post('email'),
                    'mobile'       => $this->input->post('mobile'),
                    'address'       => $this->input->post('address')
                );  
            }

            $updateUserResult = $this->Model->update('customers',  $userData, $wheredata);
             // print_r($userData);die;
            if ($updateUserResult) {
              $this->session->set_flashdata('success', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Record Updated Sucessfully!!</strong>.
              </div>');
              redirect('User/alluser');
            }else{
              $this->session->set_flashdata('alert', '<div class=alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!!</strong>.
              </div>');
              redirect('user/userEdit');
            }
    }else{
            redirect('Home');
    }
           
   }

   public function deleteUser($id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $data    = array(
                'is_status' => 2
            );
            $wheredata    = array(
                'customer_id' => $id
            );

            $updateResult = $this->Model->update('customers',  $data, $wheredata);
            $this->session->set_flashdata('success', '<div class="alert alert-success ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Record Delete Sucessfully!!</strong>.
                </div>');
            redirect('User/alluser');
        } else {
                   $this->session->set_flashdata('alert', '<div class="alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Record Not Delete!!</strong>.
                </div>');
            redirect('Home', 'refresh');
        }
    }

    public function bannedUser()
    {
        
        if($this->session->userdata('LoggedIn')){
            $data['title'] = 'Banned User';
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/include/sidebar');
            $wheredata = array(
                'is_status' => '1',
                'role'      => '2'
            );
            $data['customer'] = $this->Model->selectData('customers',$wheredata);
            $this->load->view('admin/user/banned_users',$data);
            $this->load->view('admin/include/footer');
        }else{
        redirect('Login');
        } 
    }
    

    

    public function liftBan($id)
    {
        if($this->session->userdata('LoggedIn')){
            $where = array('customer_id' => $id );
            $data = array('is_status' => 0 );
            $res = $this->Model->update('customers', $data, $where);
            if ($res) {
            $this->session->set_flashdata('success', '<div class=" alert alert-success alert-dismissable" style="margin:0px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong> Success ! </strong> Lift Ban User Sucessfully</div>');
            redirect('User/bannedUser'); 
            }else{
            $this->session->set_flashdata('alert', '<div class=" alert alert-warning alert-dismissable" style="margin:0px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong> Error ! </strong> Failed. </div>');
            redirect('User/bannedUser');
            }
        }else{
        redirect('Login');
        } 
	}



    
}
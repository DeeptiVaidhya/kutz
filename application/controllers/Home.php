<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->library('session');
        $this->load->library('form_validation');
              
    }

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
        $this->session->set_userdata('image', $result->image);

        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Admin!</strong></div>');
        redirect('Report/reports');

        } else {
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Incorrect Password.</div>');
        redirect('Home/index');
        }
        } else {
        $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" style="margin:0px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Sorry!</strong> Incorrect Username And Password.
        </div>');
        redirect('Home');
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
        	redirect('Login');
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



    public function changePassword()
    {

        if($this->session->userdata('LoggedIn')){
        $Id = $this->session->userdata('login_id');
        $data['title'] = 'Change Password';
        $this->load->view('admin/include/header',$data);
        $this->load->view('admin/include/sidebar');
        $wheredata = array(
            'admin_id' =>  $Id
        );
        $data['pass'] = $this->Model->singleRowdata($wheredata, 'admin');
        $this->load->view('admin/changepass',$data);
        $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        }
    }

    public function changeAdminPassword() {
        if($this->input->post('submit')) {

              $wheredata = array(
                    'admin_id' => $this->session->userdata('login_id'),
                    'password' => $this->input->post('old_password')
              );

              $data = $this->Model->singleRowdata($wheredata,'admin');
              if ($data) {
                  if($this->input->post('new_password') == $this->input->post('confirm_password')) {
                  $data= array(
                      'password'=> $this->input->post('new_password')
                  );
                  $wheredata = array(
                      'admin_id' => $this->session->userdata('login_id'),
                      'password' => $this->input->post('password')
                  );
                  $chekresult= $this->Model->update('admin', $data, $wheredata);
                   $this->session->set_flashdata('sucesstype', '<div id="msg" class=" alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Password Updated Sucessfully!!</strong>.</div>');
                  redirect("Home/changePassword");
                } else {
                    $this->session->set_flashdata('alert', '<div id="msg" class=" alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Current And New password not mached!!</strong>.</div>');
                    redirect("Home/changePassword");  
                }
              }else{
                    $this->session->set_flashdata('alert', '<div id="msg" class=" alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Incorrect Current password !!</strong>.</div>');
                    redirect("Home/changePassword");  
              }

            
        }
    }

    public function forgotPassword()
    {
        $this->load->view('admin/forgot_password');
    }

    public function sendLinkToEmail(){
        $email = $this->input->post('email');
        $where_data = array(
            'email' =>  $email
        );
        $Res  = $this->Model->singleRowdata($where_data,'admin');
        if($Res){
            $to = $email;
            $subject = 'Password Reset';

            $headers = "From: " . strip_tags('noreply@kutz.com') . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message='';
            $message .= '<!DOCTYPE html>
                 <html>
                   <head>

                   </head>
                 <body style=" margin: 0 auto;">
                 <div class="wrapper" style="width:100%;" >
                   <header style="width: 100%; float: left; background-color: #061a42; clear: left; text-align: center;">                     
                        <span style="padding: 10px;font-size: 40px;color: white;">KUTZ</span>                       
                     </header>
                     <section>
                       <div class="container" style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
                         <div class="section">                   
                           <p style="font-size:22px;">Dear Admin,</p>
                           <p>We have received your request to <span class="il">reset</span> your <span class="il">password</span>. Please click the link below to complete the <span class="il">reset</span>:</p>
                           <a href="http://jokingfriend.com/kutz/index.php/Home/resetPassword?email='.$email.'" style="padding:10px;width:300px;display:block;text-decoration:none;border:1px solid #ff6c37;text-align:center;font-weight:bold;font-size:14px;color:#ffffff;background:#ff6c37;border-radius:5px;line-height:17px;margin:0 auto">Reset Your Password: </a>
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
               $this->session->set_flashdata('success', '<div id="msg" class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Email sent Sucessfully please check your mail!</strong>.</div>');
                redirect("Home"); 
            }else{
                 $this->session->set_flashdata('alert', '<div id="msg" class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Opps error !</strong>.</div>');
                redirect("Home/forgotPassword"); 
            }
        }else{
            $this->session->set_flashdata('alert', '<div id="msg" class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Incorrect email please try again!</strong>.</div>');
                redirect("Home/forgotPassword");
        }
    }

    public function resetPassword()
    {
        $this->load->view('admin/resetPassword');
    }


    public function updatePassword()
    {
       $email            = $this->input->post('email');
       $new_password     = $this->input->post('new_password');
       $confirm_password = $this->input->post('confirm_password');

       if ($new_password == $confirm_password) {
            $wheredata = array(
              'email' => $email 
            );

            $data = array(
              'password' => $new_password 
            );

            $result = $this->Model->update('admin', $data, $wheredata);
            if($result){
               $this->session->set_flashdata('success', '<div id="msg" class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Password reset Sucessfully!</strong>.</div>');
                redirect("Home");
             }else{
                $this->session->set_flashdata('alert', '<div id="msg" class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Password not reset!</strong>.</div>');
                redirect("Home/resetPassword"); 
             }
       }else{
            $this->session->set_flashdata('alert', '<div id="msg" class="alert alert-warning" style="background-color: #e69151;border-color: #faebcc;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>New password and Confirm password not matched!</strong>.</div>');
                redirect("Home/resetPassword?email=".$email); 
       }
        $this->load->view('admin/resetPassword');
    }
    
}
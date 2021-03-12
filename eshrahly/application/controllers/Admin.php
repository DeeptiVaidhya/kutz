<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function student()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $data['student_list'] = $this->Model->select('student');
            $this->load->view('admin/student/student_list', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function studentAdd()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/student/student_add');
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }


    public function insertStudent()
    {
        if($this->session->userdata('LoggedIn')){
            $student_name   =  $this->input->post('student_name');
            $student_phone  =  $this->input->post('student_phone');
            //$student_gender  =  $this->input->post('student_gender');
            $student_password =  $this->input->post('student_password');

            $data = array(
                'student_name'   => $student_name,
                'student_phone'  => $student_phone,
                //'student_gender' => $student_gender,
                'password'       => $student_password,
                'status'         => '1',
                'otp_status'     => 1
            );
            
            $result = $this->Model->insert($data,'student');
            if ($result) {                        
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> Success ! </strong> Student add successfully</div>');
                redirect('Admin/student');
            }else{
                $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> Error ! </strong> Student not add</div>');
                redirect('Admin/studentAdd');
            }
        
        }
    }


    public function studentVerify($id)
    {
        if($this->session->userdata('LoggedIn')){
            $agent_id = $this->uri->segment(3);
            $where = array('student_id' => $agent_id );
            $data = array('status' => 1 );
            $res = $this->Model->update('student', $data, $where);
            if ($res) {
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> Success ! </strong> Student approved successfully</div>');
                redirect('Admin/student'); 
            }else{
                $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> Error ! </strong> Student can not approved</div>');
                redirect('Admin/student');
            }
        } 
    }

    public function studentUnverify($id)
    {
        if($this->session->userdata('LoggedIn')){
            $agent_id = $this->uri->segment(3);
            $where = array('student_id' => $agent_id );
            $data = array('status' => '0' );
            $res = $this->Model->update('student', $data, $where);
            if ($res) {
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> Success ! </strong> Student Disapprove successfully</div>');
                redirect('Admin/student'); 
            }else{
                $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> Error ! </strong> Student can not Disapprove</div>');
                redirect('Admin/student');
            }
        } 
    }

    public function editStudent($id)
    {
        if($this->session->userdata('LoggedIn')){
            $role = $this->session->userdata('role');
                $this->load->view('admin/include/header');
                $this->load->view('admin/include/sidebar');
                 $where = array(
                    'student_id'           => $id
                );
                $data['student'] = $this->Model->singleRowdata($where, 'student');
                $this->load->view('admin/student/edit_student', $data);
                $this->load->view('admin/include/footer');
       }else{
            redirect('Login');
        } 
    }

     public function editStudentDetails() {
        if ($this->session->userdata('LoggedIn')) {

            $student_name     =  $this->input->post('student_name');
            $student_phone    =  $this->input->post('student_phone');
            $student_password =  $this->input->post('student_password');
           // $student_gender   =  $this->input->post('student_gender');
            $wheredata = array(
                'student_id' => $this->input->post('id')
            );

            $data = array(
                'student_name'   => $student_name,
                'student_phone'  => $student_phone,
                //'password'       => $student_password,
                'student_gender' => $student_gender,
            );

            $updateResult = $this->Model->update('student',  $data, $wheredata);
            if ($updateResult) {
              $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Record Updated Sucessfully!!</strong>.
              </div>');
              redirect('Admin/student');
            }else{
              $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!!</strong>.
              </div>');
              redirect('Admin/editStudent');
            }
        }else{
                redirect('Login');
        }
           
    }


    public function deleteStudent($id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $wheredata    = array(
                'student_id' => $id
            );
            $updateResult = $this->Model->delete($wheredata, 'student');
            if ($updateResult) {
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Record Delete Sucessfully!!</strong>.
                </div>');
            redirect('Admin/student'); 
           
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Record Not Delete!!</strong>.
                </div>');
                redirect('Admin/student');
            }
        }else
        {
             redirect('Login');
        }
    }


     public function studentOperation($id)
    {
        if($this->session->userdata('LoggedIn')){
            $role = $this->session->userdata('role');
                $this->load->view('admin/include/header');
                $this->load->view('admin/include/sidebar');
                $where = array(
                    'student_id' => $id
                );
                $data['request'] = $this->Model->selectData('request',$where );
                $this->load->view('admin/student/studentOperation', $data);
                $this->load->view('admin/include/footer');
       }else{
            redirect('Login');
        } 
    }
    
    public function teacher()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $where = array(
                'profile_status' => 1
            );
            $data['teacher_list'] = $this->Model->selectData('teacher',$where );
            $this->load->view('admin/teacher/teacher/teacher_list', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function addTeacher()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/teacher/teacher/teacher_add');
            $this->load->view('admin/include/footer');
       }else{
            redirect('Login');
        } 
    }

    public function insertTeacher()
    {
        if($this->session->userdata('LoggedIn')){

            $teacher_name   =  $this->input->post('teacher_name');
            $teacher_phone  =  $this->input->post('teacher_phone');
            $teacher_email  =  $this->input->post('teacher_email');
            $nationality    =  $this->input->post('nationality');
            $city           =  $this->input->post('city');
            $qualification  =  $this->input->post('qualification');
            $levels         =  $this->input->post('learning_levels');
            $materials      =  $this->input->post('learning_materials');
            $teacher_gender =  $this->input->post('teacher_gender');
            $teacher_password =  $this->input->post('teacher_password');

            if (!empty($_FILES['teacher_image']['name'] )) {
                if ($_FILES['teacher_image']['name'] ) {
                $config['upload_path']     =  'uploads/teacher_image';
                $config['allowed_types']   = 'gif|jpg|png';
                $config['max_size']        = 10000;
                $config['file_name']       = time().rand(100,999);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('teacher_image')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = $this->upload->data();
                    $teacher_image = $data['file_name'];
                }
                }
            }
            if (!empty($_FILES['personal_card']['name'] )) {
                if ($_FILES['personal_card']['name'] ) {
                $config['upload_path']     =  'uploads/personal_card';
                $config['allowed_types']   = 'gif|jpg|png';
                $config['max_size']        = 10000;
                $config['file_name']       = time().rand(100,999);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('personal_card')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = $this->upload->data();
                    $personal_card = $data['file_name'];
                }
            }
            }
             if (!empty($_FILES['certificate']['name'] )) {
                if ($_FILES['certificate']['name'] ) {
                $config['upload_path']     =  'uploads/certificate';
                $config['allowed_types']   = 'gif|jpg|png|pdf';
                $config['max_size']        = 10000;
                $config['file_name']       = time().rand(100,999);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                    if (!$this->upload->do_upload('certificate')) {
                        $error = array('error' => $this->upload->display_errors());
                    } else {
                        $data = $this->upload->data();
                        $certificate = $data['file_name'];
                    }
                }
            }
            $data = array(
                'teacher_name'       => $teacher_name,
                'teacher_phone'      => $teacher_phone,
                'nationality'        => $nationality,
                'city'               => $city,
                'qualification'      => $qualification,
                'learning_levels'    => $levels,
                'learning_materials' => $materials,
                'certificate'        => $certificate,
                'personal_card'      => $personal_card, 
                'teacher_image'      => $teacher_image, 
                'teacher_password'   => $teacher_password, 
                'teacher_gender'     => $teacher_gender,
                'status'         => '1',
                'otp_status'     => 1
                    
            );
            
            $result = $this->Model->insert($data,'teacher');
            if ($result) {                        
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> Success ! </strong> Teacher add successfully</div>');
                redirect('Admin/teacher');
            }else{
                $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> Error ! </strong> Teacher not add</div>');
                redirect('Admin/addTeacher');
            }
    }
}

    public function teacherVerify($id)
    {
        if($this->session->userdata('LoggedIn')){
            $agent_id = $this->uri->segment(3);
            $where = array('teacher_id' => $agent_id );
            $data = array('status' => 1 );
            $res = $this->Model->update('teacher', $data, $where);
            if ($res) {
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> Success ! </strong> Student approved successfully</div>');
                redirect('Admin/teacher'); 
            }else{
                $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> Error ! </strong> Student can not approved</div>');
                redirect('Admin/teacher');
            }
        } 
    }

    public function teacherUnverify($id)
    {
        if($this->session->userdata('LoggedIn')){
            $agent_id = $this->uri->segment(3);
            $where = array('teacher_id' => $agent_id );
            $data = array('status' => '0' );
            $res = $this->Model->update('teacher', $data, $where);
            if ($res) {
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> Success ! </strong> Teacher Disapprove successfully</div>');
                redirect('Admin/teacher'); 
            }else{
                $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> Error ! </strong> Teacher can not Disapprove</div>');
                redirect('Admin/teacher');
            }
        } 
    }

    public function editTeacher($id)
    {
        if($this->session->userdata('LoggedIn')){
            $role = $this->session->userdata('role');
                $this->load->view('admin/include/header');
                $this->load->view('admin/include/sidebar');
                 $where = array(
                    'teacher_id'  => $id
                );
                $data['teacher'] = $this->Model->singleRowdata($where, 'teacher');
                $this->load->view('admin/teacher/teacher/edit_teacher', $data);
                $this->load->view('admin/include/footer');
       }else{
            redirect('Login');
        } 
    }


    public function editTeacherDetails() {
        if ($this->session->userdata('LoggedIn')) {

            $teacher_name       =  $this->input->post('teacher_name');
            $teacher_phone      =  $this->input->post('teacher_phone');
            $teacher_email      =  $this->input->post('teacher_email');
            $nationality        =  $this->input->post('nationality');
            $city               =  $this->input->post('city');
            $qualification      =  $this->input->post('qualification');
            $learning_levels    =  $this->input->post('learning_levels');
            $learning_materials =  $this->input->post('learning_materials');
            $teacher_password   =  $this->input->post('teacher_password');
            $teacher_gender     =  $this->input->post('teacher_gender');

            if (!empty($_FILES['teacher_image']['name'] )) {
                if ($_FILES['teacher_image']['name'] ) {
                $config['upload_path']     =  'uploads/teacher_image';
                $config['allowed_types']   = 'gif|jpg|png';
                $config['max_size']        = 10000;
                $config['file_name']       = time().rand(100,999);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('teacher_image')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = $this->upload->data();
                    $teacher_image = $data['file_name'];
                }
                }
            }

            if (!empty($_FILES['personal_card']['name'] )) {
                if ($_FILES['personal_card']['name'] ) {
                $config['upload_path']     =  'uploads/personal_card';
                $config['allowed_types']   = 'gif|jpg|png';
                $config['max_size']        = 10000;
                $config['file_name']       = time().rand(100,999);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                    if (!$this->upload->do_upload('personal_card')) {
                        $error = array('error' => $this->upload->display_errors());
                    } else {
                        $data = $this->upload->data();
                        $personal_card = $data['file_name'];
                    }
                }
            }
             if (!empty($_FILES['certificate']['name'] )) {
                if ($_FILES['certificate']['name'] ) {
                $config['upload_path']     =  'uploads/certificate';
                $config['allowed_types']   = 'gif|jpg|png|pdf';
                $config['max_size']        = 10000;
                $config['file_name']       = time().rand(100,999);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                    if (!$this->upload->do_upload('certificate')) {
                        $error = array('error' => $this->upload->display_errors());
                    } else {
                        $data = $this->upload->data();
                        $certificate = $data['file_name'];
                    }
                }
            }

            $wheredata = array(
              'teacher_id' => $this->input->post('id')
            );

            $data = array(
                'teacher_name'   => $teacher_name,
                'teacher_phone'  => $teacher_phone,
                'teacher_email'  => $teacher_email,
                'nationality'    => $nationality,
                'city'           => $city,
                'qualification'      => $qualification,
                'learning_levels'    => $learning_levels,
                'learning_materials' => $learning_materials,
                'certificate'        => $certificate,
                'personal_card'      => $personal_card, 
                'teacher_image'      => $teacher_image, 
                'teacher_password'   => $teacher_password, 
                'teacher_gender'     => $teacher_gender 
            );
                    
            $updateResult = $this->Model->update('teacher', $data, $wheredata);
            if ($updateResult) {
              $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Record Updated Sucessfully!!</strong>.
              </div>');
              redirect('Admin/teacher');
            }else{
              $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!!</strong>.
              </div>');
              redirect('Admin/editTeacher');
            }
        }else{
                redirect('Login');
        }
           
    }

     public function deleteTeacher($id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $wheredata    = array(
                'teacher_id' => $id
            );
            $updateResult = $this->Model->delete($wheredata, 'teacher');
            if ($updateResult) {
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Record Delete Sucessfully!!</strong>.
                </div>');
            redirect('Admin/teacher'); 
           
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Record Not Delete!!</strong>.
                </div>');
                redirect('Admin/teacher');
            }
        }else
        {
             redirect('Login');
        }
    }

    public function teacherRequest($id)
    {
        if($this->session->userdata('LoggedIn')){
            $role = $this->session->userdata('role');
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $where = array(
                'teacher_id'  => $id
            );
            $data['request'] = $this->Model->selectData('request',$where );
            $this->load->view('admin/teacher/teacher/teacherRequest', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }
    
    public function teacherRequestBtn($id)
    {
        if($this->session->userdata('LoggedIn')){
            $role = $this->session->userdata('role');
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $where = array(
                'teacher_id'  => $id
            );
            $data['request'] = $this->Model->selectData('request',$where );
            $this->load->view('admin/teacher/teacher/teacherRequestBtn');
            $this->load->view('admin/include/footer');
       }else{
            redirect('Login');
        } 
    }
    
    
    public function teacherFilterRequest($id)
    {
        if($this->session->userdata('LoggedIn')){
            $role = $this->session->userdata('role');
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            
            $currdate = date('Y-m-d');
            $week_last_day = date("Y-m-d", strtotime("- 30 day"));

            $transaction = $this->db->query('SELECT tc.teacher_name,t.*, SUM(t.cash_amount) as CashAmt, SUM(t.credit_card) as CardAmt, SUM(t.cash_amount+t.credit_card) as total, SUM(t.app_profit) as AppProfit, SUM(t.remind) as remind FROM transaction as t JOIN teacher as tc ON t.teacher_id = tc.teacher_id WHERE  t.teacher_id = "'.$id.'" AND t.date_time BETWEEN  "'.$week_last_day.'" AND "'. $currdate. '" GROUP BY t.clear_date')->result_array();
             if ($transaction) {
                foreach ($transaction as $key) {
                    $data['tran'][] = array(
                        'CashAmt'   => $key['CashAmt'], 
                        'CardAmt'   => $key['CardAmt'], 
                        'Total'     => $key['total'],
                        'AppProfit' => $key['AppProfit'], 
                        'Remind'    => $key['remind'], 
                        'tran_id'   => $key['tran_id'], 
                        'teacher_id' => $key['teacher_id'], 
                        'clear_date' => $key['clear_date'],
                        'clear_balance' => $key['clear_balance'],
                        'start_date'=> $week_last_day,
                        'end_date'  => $currdate,
                    );

                } 
                
             }else{
               $data['tran'] = array();
             }

            //echo "<pre>";print_r($data);die;
            $this->load->view('admin/teacher/teacher/teacherFilterRequest', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }
    
    
    // public function teacherFilterRequest($id)
    // {
    //     if($this->session->userdata('LoggedIn')){
    //         $role = $this->session->userdata('role');
    //         $this->load->view('admin/include/header');
    //         $this->load->view('admin/include/sidebar');
            
    //         $currdate = date('Y-m-d');
    //         $week_last_day = date("Y-m-d", strtotime("- 30 day"));
    //         //$transaction = $this->Model->selectTeacherFilterRequest($id,$week_last_day,$currdate);
    //         $transaction = $this->db->query('SELECT t.* FROM transaction as t  WHERE t.teacher_id = "'.$id.'" AND t.date_time BETWEEN  "'.$week_last_day.'" AND "'. $currdate. '" GROUP BY t.clear_date')->result_array();
    //             $CashAmt = 0;
    //             $CardAmt = 0;
    //             $AppProfit = 0;
    //             $remind = 0;
    //             $Total = 0;
    //          if ($transaction) {
    //             foreach ($transaction as $key) {
    //                 $CashAmt += $key['cash_amount'];
    //                 $CardAmt += $key['credit_card'];
    //                 $total =  $CashAmt + $CardAmt; 
    //                 $AppProfit += $key['app_profit'];
    //                 $remind += $key['remind'];

    //                 $data['tran'][] = array(
    //                     'CashAmt'   => $CashAmt, 
    //                     'CardAmt'   => $CardAmt, 
    //                     'Total'     => $total,
    //                     'AppProfit' => $AppProfit, 
    //                     'Remind'    => $remind, 
    //                     'tran_id'   => $key['tran_id'], 
    //                     'teacher_id' => $key['teacher_id'], 
    //                     'clear_date' => $key['clear_date'],
    //                     'clear_balance' => $key['clear_balance'],
    //                     'start_date'=> $week_last_day,
    //                     'end_date'  => $currdate,
    //                 );

    //             } 
                
    //          }else{
    //           $data['tran'] = array();
    //          }

    //         //echo "<pre>";print_r($data);die;
    //         $this->load->view('admin/teacher/teacher/teacherFilterRequest', $data);
    //         $this->load->view('admin/include/footer');
    //     }else{
    //         redirect('Login');
    //     } 
    // }
    
    public function teacherFilterRequestGr($id)
    {
        if($this->session->userdata('LoggedIn')){
            $role = $this->session->userdata('role');
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            
            $currdate = date('Y-m-d');
            $week_last_day = date("Y-m-d", strtotime("- 30 day"));

            $transaction = $this->db->query('SELECT tc.teacher_name,t.*, SUM(t.cash_amount) as CashAmt, SUM(t.credit_card) as CardAmt, SUM(t.cash_amount+t.credit_card) as total, SUM(t.app_profit) as AppProfit, SUM(t.remind) as remind FROM transaction as t JOIN teacher as tc ON t.teacher_id = tc.teacher_id  GROUP BY t.clear_date HAVING t.teacher_id = "'.$id.'" AND t.date_time BETWEEN  "'.$week_last_day.'" AND "'. $currdate. '"')->result_array();
             if ($transaction) {
                foreach ($transaction as $key) {
                    $data['tran'][] = array(
                        'CashAmt'   => $key['CashAmt'], 
                        'CardAmt'   => $key['CardAmt'], 
                        'Total'     => $key['total'],
                        'AppProfit' => $key['AppProfit'], 
                        'Remind'    => $key['remind'], 
                        'tran_id'   => $key['tran_id'], 
                        'teacher_id' => $key['teacher_id'], 
                        'clear_date' => $key['clear_date'],
                        'clear_balance' => $key['clear_balance'],
                        'start_date'=> $week_last_day,
                        'end_date'  => $currdate,
                    );

                } 
                
             }else{
               $data['tran'] = array();
             }

            //echo "<pre>";print_r($data);die;
            $this->load->view('admin/teacher/teacher/teacherFilterRequest', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    // public function teacherFilterRequest($id)
    // {
    //     if($this->session->userdata('LoggedIn')){
    //         $role = $this->session->userdata('role');
    //         $this->load->view('admin/include/header');
    //         $this->load->view('admin/include/sidebar');
            
    //         $currdate = date('Y-m-d');
    //         $week_last_day = date("Y-m-d", strtotime("- 30 day"));
            
    //          $transaction = $this->db->query('SELECT * FROM transaction WHERE  teacher_id = "'.$id.'" AND clear_balance = 0 AND date_time BETWEEN  "'.$week_last_day.'" AND "'. $currdate. '"')->result_array();
    //          if ($transaction) {
    //             $CashAmt = 0;
    //             $CardAmt = 0;
    //             $AppProfit = 0;
    //             $remind = 0;
    //             $Total = 0;
    //             foreach ($transaction as $key) {
    //                 $CashAmt += $key['cash_amount'];
    //                 $CardAmt += $key['credit_card'];
    //                 $total =  $CashAmt + $CardAmt; 
    //                 $AppProfit += $key['app_profit'];
    //                 $remind += $key['remind'];
    //                 $id    = $key['tran_id'];
    //                 $teacher_id = $key['teacher_id'];

    //             } 
    //             $data['transaction'] = array(
    //                 'CashAmt' => $CashAmt, 
    //                 'CardAmt' => $CardAmt, 
    //                 'Total' => $total,
    //                 'AppProfit' => $AppProfit, 
    //                 'Remind' => $remind, 
    //                 'tran_id' => $id, 
    //                 'teacher_id' => $teacher_id, 
    //                 'start_date'=> $week_last_day,
    //                 'end_date' => $currdate
    //             );
    //          }else{
    //           $data['transaction'] = array();
    //          }

    //         //echo "<pre>";print_r($data);die;
    //         $this->load->view('admin/teacher/teacher/teacherFilterRequest', $data);
    //         $this->load->view('admin/include/footer');
    //     }else{
    //         redirect('Login');
    //     } 
    // }
    
    
    public function ClearMonth()
    {
        if($this->session->userdata('LoggedIn')){
            $start = $this->input->post('start_date');
            $end = $this->input->post('end_date');
            $teacher_id = $this->input->post('teacher_id');

            $currdate = date('Y-m-d');

            $updateResult = $this->db->query('UPDATE transaction SET clear_balance = 1 , clear_date =  "'.$currdate.'" WHERE clear_balance = 0 AND date_time BETWEEN  "'.$start.'" AND "'.$end.'" ');
            if ($updateResult) {

                $whereID = array(
                    'teacher_id' => $teacher_id,
                );

                $statusData = array(
                    'wallet_amt' => 0,
                );
                $clear_wall = $this->Model->update('teacher', $statusData,$whereID);

                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Balance Clear Sucessfully!!</strong>.
                </div>');
            redirect('Admin/teacherFilterRequest/'.$teacher_id.' '); 
           
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Balance Not Clear!!</strong>.
                </div>');
                redirect('Admin/teacher');
            }
            
        }else{
            redirect('Login');
        } 
    }

   
    
    // public function teacherFilterRequest($id)
    // {
    //     if($this->session->userdata('LoggedIn')){
    //         $role = $this->session->userdata('role');
    //         $this->load->view('admin/include/header');
    //         $this->load->view('admin/include/sidebar');
            
    //         $currdate = date('Y-01');
    //         $data['JAN'] = $this->db->query('SELECT * FROM `transaction` WHERE teacher_id = "'.$id.'" AND date_time Like "%'.$currdate.'%" ')->result_array();

    //         $currdate = date('Y-02');
    //         $data['FAB'] =  $this->db->query('SELECT * FROM `transaction` WHERE teacher_id = "'.$id.'" AND date_time Like "%'.$currdate.'%" ')->result_array();

    //         $currdate = date('Y-03');
    //         $data['MAR'] =  $this->db->query('SELECT * FROM `transaction` WHERE teacher_id = "'.$id.'" AND date_time Like "%'.$currdate.'%" ')->result_array();

    //         $currdate = date('Y-04');
    //         $data['APR'] =  $this->db->query('SELECT * FROM `transaction` WHERE teacher_id = "'.$id.'" AND date_time Like "%'.$currdate.'%" ')->result_array();

    //         $currdate = date('Y-05');
    //         $data['MAY'] =  $this->db->query('SELECT * FROM `transaction` WHERE teacher_id = "'.$id.'" AND date_time Like "%'.$currdate.'%" ')->result_array();

    //         $currdate = date('Y-06');
    //         $data['JUN'] =  $this->db->query('SELECT * FROM `transaction` WHERE teacher_id = "'.$id.'" AND date_time Like "%'.$currdate.'%" ')->result_array();

    //         $currdate = date('Y-07');
    //         $data['JUL'] =  $this->db->query('SELECT * FROM `transaction` WHERE teacher_id = "'.$id.'" AND date_time Like "%'.$currdate.'%" ')->result_array();

    //          $currdate = date('Y-08');
    //         $data['AUG'] =  $this->db->query('SELECT * FROM `transaction` WHERE teacher_id = "'.$id.'" AND date_time Like "%'.$currdate.'%" ')->result_array();

    //         $currdate = date('Y-09');
    //         $data['SEP'] =  $this->db->query('SELECT * FROM `transaction` WHERE teacher_id = "'.$id.'" AND date_time Like "%'.$currdate.'%" ')->result_array();

    //         $currdate = date('Y-10');
    //         $data['OCT'] = $this->db->query('SELECT * FROM `transaction` WHERE teacher_id = "'.$id.'" AND date_time Like "%'.$currdate.'%" ')->result_array();

    //          $currdate = date('Y-11');
    //         $data['NOV'] =  $this->db->query('SELECT * FROM `transaction` WHERE teacher_id = "'.$id.'" AND date_time Like "%'.$currdate.'%" ')->result_array();
            
    //          $currdate = date('Y-12');
    //         $data['DEC'] =  $this->db->query('SELECT * FROM `transaction` WHERE teacher_id = "'.$id.'" AND date_time Like "%'.$currdate.'%" ')->result_array();

    //         $all_data['month'] = array(
    //             'January' => $data['JAN'],
    //             'Fabuary' => $data['FAB'],
    //             'March' => $data['MAR'],
    //             'April' => $data['APR'],
    //             'May' => $data['MAY'],
    //             'June' => $data['JUN'],
    //             'July' => $data['JUL'],
    //             'August' => $data['AUG'],
    //             'September' => $data['SEP'],
    //             'October' => $data['OCT'],
    //             'November' => $data['NOV'],
    //             'December' => $data['DEC']
    //         );

    //         $this->load->view('admin/teacher/teacher/teacherFilterRequest', $all_data);
    //         $this->load->view('admin/include/footer');
    //     }else{
    //         redirect('Login');
    //     } 
    // }
    
    
    public function fetchTeacherReqdata(){
        if($this->session->userdata('LoggedIn')){
            $from     = $this->input->get('from');
            $to       = $this->input->get('to');
            $teacher_id = $this->input->get('id');

            $fromm = date("Y-m-d", strtotime($from));
            $too   = date("Y-m-d",strtotime($to." +1 days"));

            if(!empty($from) && !empty($to)){
            $result = $this->db->query('SELECT `t`.* ,`tr`.* FROM transaction as `tr` JOIN `teacher` as `t` ON `tr`.`teacher_id` = `t`.`teacher_id` WHERE  `tr`.`teacher_id` = "'.$teacher_id.'" AND clear_balance = 0 AND `tr`.`date_time` BETWEEN "'. date('Y-m-d', strtotime($fromm)). '" and "'. date('Y-m-d', strtotime($too)).'"  ')->result_array();
             if ($result) {
                $CashAmt = 0;
                $CardAmt = 0;
                $AppProfit = 0;
                $remind = 0;
                $Total = 0;
                foreach ($result as $key) {
                    $CashAmt += $key['cash_amount'];
                    $encode_cash = urlencode(base64_encode($CashAmt));

                    $CardAmt += $key['credit_card'];
                    $encode_card = urlencode(base64_encode($CashAmt));

                    $total =  $CashAmt + $CardAmt; 
                    $encode_total = urlencode(base64_encode($total));

                    $AppProfit += $key['app_profit'];
                    $encode_profit = urlencode(base64_encode($AppProfit));

                    $remind += $key['remind'];
                    $encode_remind = urlencode(base64_encode($remind));

                    $tran_id    = $key['tran_id'];
                    $encode_tran_id = urlencode(base64_encode($tran_id));

                    $teacher_name = $key['teacher_name'];
                    $encode_name = urlencode(base64_encode($teacher_name));
                }

                $transaction = array(
                    'CashAmt' => $CashAmt, 
                    'CardAmt' => $CardAmt, 
                    'Total' => $total,
                    'AppProfit' => $AppProfit, 
                    'Remind' => $remind, 
                    'tran_id' => $tran_id, 
                    'teacher_name' => $teacher_name,
                    'teacher_id' => $teacher_id,
                    'encode_cash' => $encode_cash,
                    'encode_card' => $encode_card,
                    'encode_total' => $encode_total,
                    'encode_profit' => $encode_profit,
                    'encode_remind' => $encode_remind,
                    'encode_tran_id' => $encode_tran_id,
                    'encode_name' => $encode_name
                );
             }else{
               $transaction= array();
             }
            echo json_encode($transaction);
            }
        }else{
               redirect('Login');
        } 
    }
    
    public function fetchTeacherReqdata1(){
        if($this->session->userdata('LoggedIn')){
            $from     = $this->input->get('from');
            $to       = $this->input->get('to');
            $teacher_id = $this->input->get('id');

            $fromm = date("Y-m-d", strtotime($from));
            $too   = date("Y-m-d",strtotime($to." +1 days"));

            if(!empty($from) && !empty($to)){
            $result = $this->db->query('SELECT `t`.* ,`tr`.* FROM transaction as `tr` JOIN `teacher` as `t` ON `tr`.`teacher_id` = `t`.`teacher_id` WHERE  `tr`.`teacher_id` = "'.$teacher_id.'" AND `tr`.`date_time` BETWEEN "'. date('Y-m-d', strtotime($fromm)). '" and "'. date('Y-m-d', strtotime($too)).'"  ')->result_array();
            
            echo json_encode($result);
            }
        }else{
               redirect('Login');
        } 
    }


    public function GenerateInvoicePdf(){
        ini_set('memory_limit', '2048M');
        
        $this->load->view('admin/invoice_pdf');
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->pdf->loadHtml($html);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->render();
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("invoice.pdf", array("Attachment"=> 0));       
    }

    public function viewTeacherDetails($id)
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $whereID= array('teacher_id' => $id );
            $data['teacher_details'] = $this->Model->singleRowdata($whereID,'teacher');
            $this->load->view('admin/teacher/teacher/view_teacher', $data);
            //$this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function updateWithdraw()
    {
        if($this->session->userdata('LoggedIn')){
            $withdraw_id =  $this->input->post('withdraw_id');
            //print_r($withdraw_id);die;
            $value =  $this->input->post('status');
            if ($value == '1') {
                $where = array('withdraw_id' => $withdraw_id );
                $data  = array('status' => 1 );
                $res   = $this->Model->update('withdraw_request', $data, $where);
                if ($res) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> Success ! </strong>Request move to inprocess.</div>');
                    redirect('Admin/withdraw_request');     
                }else{
                    $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> Error ! </strong>Request failed to move in inprocess. </div>');
                    redirect('Admin/withdraw_request');
                }
            }

            if ($value == '2') {
                $where = array('withdraw_id' => $withdraw_id );
                $data  = array('status' => 2 );
                $res   = $this->Model->update('withdraw_request', $data, $where);
                if ($res) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> Success ! </strong>Request moved to completed.</div>');
                    redirect('Admin/withdraw_request');     
                }else{
                    $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> Error ! </strong>Request failed to completed. </div>');
                    redirect('Admin/withdraw_request');
                }
            }
            
        }else{
        redirect('Login');
        } 
    }

     public function withdraw_request()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $data['withdraw_request'] = $this->Model->select('withdraw_request');
            $this->load->view('admin/withdraw_request', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

     public function changeStatus()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $data['withdraw_request'] = $this->Model->select('withdraw_request');
            $this->load->view('admin/view_wallet', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function learning_level()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $data['Learninglist'] = $this->Model->select('learning_level');
            $this->load->view('admin/teacher/learning_level/learning_level', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function addLearningLevel()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/teacher/learning_level/level_add');
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function insertLearningLevel()
    {
        if ($this->session->userdata('LoggedIn')) {
            $userData = array(
                'level_name' => $this->input->post('level_name')
            );
            $result = $this->Model->insert($userData,'learning_level');
            if ($result) {
                $this->session->set_flashdata('success', '<div class="  alert alert-success ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Learning Level added Sucessfully!!</strong>.</div>');
                redirect('Admin/learning_level');
            }else{
                $this->session->set_flashdata('alert', '<div class="  alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Learning Level  Not Added!!</strong>.</div>');
                redirect('Admin/addLearningLevel');
            }            
        }else {
                redirect('Login', 'refresh');
        }

    }

    public function editLearningLevel($id)
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $wheredata  = array('l_id' => $id, );
            $data['learning_level'] = $this->Model->singleRowdata($wheredata, 'learning_level');
            $this->load->view('admin/teacher/learning_level/edit_learning_level', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function editLearningLevelDetails() {
        if ($this->session->userdata('LoggedIn')) {
            $wheredata = array('l_id' => $this->input->post('id'));
            $userData = array(
                'level_name'   => $this->input->post('level_name'),
            );
            $updateUserResult = $this->Model->update('learning_level',  $userData, $wheredata);
            if ($updateUserResult) {
              $this->session->set_flashdata('success', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Level Updated Sucessfully!!</strong>.
              </div>');
              redirect('Admin/learning_level');
            }else{
              $this->session->set_flashdata('alert', '<div class=alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Level not updated!!</strong>.
              </div>');
              redirect('Admin/editLearningLevel');
            }
    }else{
            redirect('Login');
    }
           
   }

   public function deleteLearningLevel($id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $whereID = array(
                'l_id' => $id
            );
            $result = $this->Model->delete($whereID, 'learning_level'); 
            if ($result) {
              $this->session->set_flashdata('success', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Level delete Sucessfully!!</strong>.
              </div>');
              redirect('Admin/learning_level');
            }else{
              $this->session->set_flashdata('alert', '<div class=alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Level not deleted!!</strong>.
              </div>');
              redirect('Admin/learning_level');
            }
        }else{
           redirect('Login'); 
        }
    }

    public function learning_material()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $data['learning_material'] = $this->Model->select('learning_material');
            $this->load->view('admin/teacher/learning_material/learning_material', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function addLearningMaterial()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/teacher/learning_material/material_add');
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function insertLearningMaterial()
    {
        if ($this->session->userdata('LoggedIn')) {
            $userData = array(
                'material_name' => $this->input->post('material_name')
            );
            $result = $this->Model->insert($userData,'learning_material');
            if ($result) {
                $this->session->set_flashdata('success', '<div class="  alert alert-success ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Learning Material added Sucessfully!!</strong>.</div>');
                redirect('Admin/learning_material');
            }else{
                $this->session->set_flashdata('alert', '<div class="  alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Learning Material  Not Added!!</strong>.</div>');
                redirect('Admin/addLearningMaterial');
            }            
        }else {
                redirect('Login', 'refresh');
        }

    }

    public function editLearningMaterial($id)
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $wheredata  = array('material_id' => $id, );
            $data['learning_material'] = $this->Model->singleRowdata($wheredata, 'learning_material');
            $this->load->view('admin/teacher/learning_material/edit_learning_material', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function editLearningMaterialDetails() {
        if ($this->session->userdata('LoggedIn')) {
            $wheredata = array('material_id' => $this->input->post('id'));
            $userData = array(
                'material_name'   => $this->input->post('material_name'),
            );
            $updateUserResult = $this->Model->update('learning_material',  $userData, $wheredata);
            if ($updateUserResult) {
              $this->session->set_flashdata('success', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Learning Material Updated Sucessfully!!</strong>.
              </div>');
              redirect('Admin/learning_material');
            }else{
              $this->session->set_flashdata('alert', '<div class=alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Learning Material not updated!!</strong>.
              </div>');
              redirect('Admin/editLearningMaterial');
            }
    }else{
            redirect('Login');
    }
           
   }

   public function deleteLearningMaterial($id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $whereID = array(
                'material_id' => $id
            );
            $result = $this->Model->delete($whereID, 'learning_material'); 
            if ($result) {
              $this->session->set_flashdata('success', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Learning Material delete Sucessfully!!</strong>.
              </div>');
              redirect('Admin/learning_material');
            }else{
              $this->session->set_flashdata('alert', '<div class=alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Learning Material not deleted!!</strong>.
              </div>');
              redirect('Admin/learning_material');
            }
        }else{
           redirect('Login'); 
        }
    }


     public function nationality()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $data['nationality'] = $this->Model->select('nationality');
            $this->load->view('admin/teacher/nationality/nationality', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    
    public function addNationality()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/teacher/nationality/nationality_add');
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function insertNationality()
    {
        if ($this->session->userdata('LoggedIn')) {
            $userData = array(
                'n_name' => $this->input->post('n_name')
            );
            $result = $this->Model->insert($userData,'nationality');
            if ($result) {
                $this->session->set_flashdata('success', '<div class="  alert alert-success ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Nationality added Sucessfully!!</strong>.</div>');
                redirect('Admin/nationality');
            }else{
                $this->session->set_flashdata('alert', '<div class="  alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Nationality Not Added!!</strong>.</div>');
                redirect('Admin/addNationality');
            }            
        }else {
                redirect('Login', 'refresh');
        }

    }

    public function editNationality($id)
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $wheredata  = array('n_id' => $id, );
            $data['nationality'] = $this->Model->singleRowdata($wheredata, 'nationality');
            $this->load->view('admin/teacher/nationality/edit_nationality', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function editNationalityDetails() {
        if ($this->session->userdata('LoggedIn')) {
            $wheredata = array('n_id' => $this->input->post('id'));
            $userData = array(
                'n_name'   => $this->input->post('n_name'),
            );
            $updateUserResult = $this->Model->update('nationality',  $userData, $wheredata);
            if ($updateUserResult) {
              $this->session->set_flashdata('success', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Nationality Updated Sucessfully!!</strong>.
              </div>');
              redirect('Admin/nationality');
            }else{
              $this->session->set_flashdata('alert', '<div class=alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Nationality not updated!!</strong>.
              </div>');
              redirect('Admin/nationality');
            }
    }else{
            redirect('Login');
    }
           
   }

   public function deleteNationality($id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $whereID = array(
                'n_id' => $id
            );
            $result = $this->Model->delete($whereID, 'nationality'); 
            if ($result) {
              $this->session->set_flashdata('success', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Nationality delete Sucessfully!!</strong>.
              </div>');
              redirect('Admin/nationality');
            }else{
              $this->session->set_flashdata('alert', '<div class=alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Nationality not deleted!!</strong>.
              </div>');
              redirect('Admin/nationality');
            }
        }else{
           redirect('Login'); 
        }
    }

     public function city()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $data['city'] = $this->Model->select('city');
            $this->load->view('admin/teacher/city/city', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }
    public function addCity()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/teacher/city/city_add');
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function insertCity()
    {
        if ($this->session->userdata('LoggedIn')) {
            $userData = array(
                'n_id' => $this->input->post('nationality_id'),
                'city_name' => $this->input->post('city_name')
            );
            $result = $this->Model->insert($userData,'city');
            if ($result) {
                $this->session->set_flashdata('success', '<div class="  alert alert-success ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>City added Sucessfully!!</strong>.</div>');
                redirect('Admin/city');
            }else{
                $this->session->set_flashdata('alert', '<div class="  alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>City Not Added!!</strong>.</div>');
                redirect('Admin/addCity');
            }            
        }else {
                redirect('Login', 'refresh');
        }

    }

    public function editCity($id)
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $wheredata  = array('city_id' => $id, );
            $data['city'] = $this->Model->singleRowdata($wheredata, 'city');
            $this->load->view('admin/teacher/city/edit_city', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function editCityDetails() {
        if ($this->session->userdata('LoggedIn')) {
            $wheredata = array('city_id' => $this->input->post('city_id'));
            $userData = array(
                'city_name'   => $this->input->post('city_name'),
            );
            $updateUserResult = $this->Model->update('city',  $userData, $wheredata);
            if ($updateUserResult) {
              $this->session->set_flashdata('success', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>City Updated Sucessfully!!</strong>.
              </div>');
              redirect('Admin/City');
            }else{
              $this->session->set_flashdata('alert', '<div class=alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>City not updated!!</strong>.
              </div>');
              redirect('Admin/City');
            }
    }else{
            redirect('Login');
    }
           
   }

   public function deleteCity($id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $whereID = array(
                'city_id' => $id
            );
            $result = $this->Model->delete($whereID, 'city'); 
            if ($result) {
              $this->session->set_flashdata('success', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>City delete Sucessfully!!</strong>.
              </div>');
              redirect('Admin/City');
            }else{
              $this->session->set_flashdata('alert', '<div class=alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>City not deleted!!</strong>.
              </div>');
              redirect('Admin/City');
            }
        }else{
           redirect('Login'); 
        }
    }

     public function otherValue()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $data['other_value'] = $this->Model->select('other_value');
            $this->load->view('admin/teacher/other_value/other_value', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function addOtherValue()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $this->load->view('admin/teacher/other_value/add_value');
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function insertOtherValue()
    {
        if ($this->session->userdata('LoggedIn')) {
            $data = array(
                'value_name' => $this->input->post('value_name')
            );
            $result = $this->Model->insert($data,'other_value');
            if ($result) {
                $this->session->set_flashdata('success', '<div class="  alert alert-success ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Other Value added Sucessfully!!</strong>.</div>');
                redirect('Admin/otherValue');
            }else{
                $this->session->set_flashdata('alert', '<div class="  alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Other Value Not Added!!</strong>.</div>');
                redirect('Admin/addOtherValue');
            }            
        }else {
                redirect('Login', 'refresh');
        }

    }

    public function editOtherValue($id)
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $wheredata  = array('other_id' => $id, );
            $data['other_value'] = $this->Model->singleRowdata($wheredata, 'other_value');
            $this->load->view('admin/teacher/other_value/edit_value', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    public function editOtherValueDetails() {
        if ($this->session->userdata('LoggedIn')) {
            $wheredata = array('other_id' => $this->input->post('other_id'));
            $data = array(
                'value_name'  => $this->input->post('value_name'),
            );
            $updateUserResult = $this->Model->update('other_value',  $data, $wheredata);
            if ($updateUserResult) {
              $this->session->set_flashdata('success', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Other Value Updated Sucessfully!!</strong>.
              </div>');
              redirect('Admin/OtherValue');
            }else{
              $this->session->set_flashdata('alert', '<div class=alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Other Value not updated!!</strong>.
              </div>');
              redirect('Admin/OtherValue');
            }
    }else{
            redirect('Login');
    }
           
   }

   public function deleteOtherValue($id)
    {
        if ($this->session->userdata('LoggedIn')) {
            $whereID = array(
                'other_id' => $id
            );
            $result = $this->Model->delete($whereID, 'other_value'); 
            if ($result) {
              $this->session->set_flashdata('success', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Other Value delete Sucessfully!!</strong>.
              </div>');
              redirect('Admin/OtherValue');
            }else{
              $this->session->set_flashdata('alert', '<div class=alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Other Value not deleted!!</strong>.
              </div>');
              redirect('Admin/OtherValue');
            }
        }else{
           redirect('Login'); 
        }
    }
    

    function getState($level)
     {
        $country   = $level;   
         $result = $this->db->query('SELECT * FROM `city` WHERE country_id = "'.$country.'"')->result_array();
         // print_r($result);
         echo json_encode($result);
        
     }

     function getCity($level1)
     {
        $city   = $level1;   
         $result = $this->db->query('SELECT * FROM `city` WHERE n_id = "'.$city.'"')->result_array();
         // print_r($result);
         echo json_encode($result);
        
     }

    public function fetchTeacherdata(){
        if($this->session->userdata('LoggedIn')){
            $from     = $this->input->get('from');
            $to       = $this->input->get('to');

            $fromm = date("Y-m-d", strtotime($from));
            $too   = date("Y-m-d",strtotime($to." +1 days"));

            if(!empty($from) && !empty($to)){
                $result = $this->db->query('SELECT `teacher`.*, `n`.*, `l`.*,`m`.*,c.* FROM teacher JOIN `nationality` as `n` ON `teacher`.`teacher_id` = `n`.`n_id` JOIN `city` as `c` ON `teacher`.`city` = `c`.`city_id` JOIN `learning_level` as `l` ON `teacher`.`learning_levels` = `l`.`l_id` JOIN `learning_material` as `m` ON `teacher`.`learning_materials` = `m`.`material_id` WHERE  `teacher`.`profile_status` = 1 AND `teacher`.`created_at` BETWEEN "'. date('Y-m-d', strtotime($fromm)). '" and "'. date('Y-m-d', strtotime($too)).'" ')->result_array();
                if($result){
                    foreach($result as $key){
                        
                        if($key['learning_levels']){
                            $result_level = $this->Model->learning_level($key['learning_levels']);
                            if(!empty($result_level)){
                                 $res_level = $result_level;
                            }else{
                                $res_level = '';
                            }    
                        }   
                        
                        if($key['learning_materials']){
                            $learning_materials = $this->Model->learningMaterials($key['learning_materials']);
                            if(!empty($learning_materials)){
                              $res_learning_materials = $learning_materials;
                            }else{
                                $res_learning_materials = '';
                            }    
                        }
                        
                        $arrayData[] = array(
                            'teacher_id'    => $key['teacher_id'],
                            'teacher_name'  => $key['teacher_name'],
                            'teacher_email' => $key['teacher_email'],
                            'teacher_phone' => $key['teacher_phone'],
                            'teacher_gender'=> $key['teacher_gender'],
                            'teacher_image' => $key['teacher_image'],
                            'nationality'   => $key['nationality'],
                            'city'          => $key['city'],
                            'bank_account_no'=> $key['bank_account_no'],
                            'learning_levels'=> $res_level,
                            'learning_materials'=> $res_learning_materials,
                            'certificate'   => $key['certificate'],
                            'personal_card' => $key['personal_card'],
                            'qualification' => $key['qualification'],
                            'created_at'    => $key['created_at'],
                            'status'        => $key['status'],
                            'n_id'          => $key['n_id'],
                            'n_name'        => $key['n_name'],
                            'city_name'     => $key['city_name'],
                        );
                    }
                }else{
                        $arrayData = '';
                }
                   
                echo json_encode($arrayData);
            }
              
        }else{
               redirect('Login');
        } 
    }

    public function fetchStudentdata(){
        if($this->session->userdata('LoggedIn')){
            $from     = $this->input->get('from');
            $to       = $this->input->get('to');

            $fromm = date("Y-m-d", strtotime($from));
            $too   = date("Y-m-d",strtotime($to." +1 days"));

            if(!empty($from) && !empty($to)){
                $result = $this->db->query('SELECT * FROM student WHERE `created` BETWEEN "'. date('Y-m-d', strtotime($fromm)). '" and "'. date('Y-m-d', strtotime($too)).'" ')->result_array();
                    echo json_encode($result);
            }
        }else{
               redirect('Login');
        } 
    }

    // public function fetchStudentReqdata(){
    //     if($this->session->userdata('LoggedIn')){
    //         $from     = $this->input->get('from');
    //         $to       = $this->input->get('to');
    //         $student_id = $this->input->get('id');

    //         $fromm = date("Y-m-d", strtotime($from));
    //         $too   = date("Y-m-d",strtotime($to." +1 days"));

    //         if(!empty($from) && !empty($to)){
    //           $result = $this->db->query('SELECT `request`.*, `t`.* ,`s`.* FROM request JOIN `teacher` as `t` ON `request`.`teacher_id` = `t`.`teacher_id` JOIN `student` as `s` ON `request`.`student_id` = `s`.`student_id` WHERE `s`.`student_id` = "'.$student_id.'" AND `date` BETWEEN "'. date('Y-m-d', strtotime($fromm)). '" and "'. date('Y-m-d', strtotime($too)).'" ')->result_array();
    //                 echo json_encode($result);
    //         }
    //     }else{
    //           redirect('Login');
    //     } 
    // }
    
     public function fetchStudentReqdata(){
        if($this->session->userdata('LoggedIn')){
            $from     = $this->input->get('from');
            $to       = $this->input->get('to');
            $student_id = $this->input->get('id');

            $fromm = date("Y-m-d", strtotime($from));
            $too   = date("Y-m-d",strtotime($to." +1 days"));

            if(!empty($from) && !empty($to)){
              // $result = $this->db->query('SELECT `request`.*, `t`.* ,`s`.* FROM request JOIN `teacher` as `t` ON `request`.`teacher_id` = `t`.`teacher_id` JOIN `student` as `s` ON `request`.`student_id` = `s`.`student_id` WHERE `s`.`student_id` = "'.$student_id.'" AND `date` BETWEEN "'. date('Y-m-d', strtotime($fromm)). '" and "'. date('Y-m-d', strtotime($too)).'" ')->result_array();

               $result = $this->db->query('SELECT lev.level_name, mat.material_name,`request`.*, `t`.* ,`s`.* FROM request JOIN `teacher` as `t` ON `request`.`teacher_id` = `t`.`teacher_id` JOIN `student` as `s` ON `request`.`student_id` = `s`.`student_id` JOIN learning_level as lev  ON request.stage = lev.l_id JOIN learning_material as mat  ON request.subject = mat.material_id WHERE `s`.`student_id` = "'.$student_id.'" AND `filter_date` BETWEEN "'. date('Y-m-d', strtotime($fromm)). '" and "'. date('Y-m-d', strtotime($too)).'" ')->result_array();
                    echo json_encode($result);
            }
        }else{
               redirect('Login');
        } 
    }
    
    
    

    // public function fetchTeacherReqdata(){
    //     if($this->session->userdata('LoggedIn')){
    //         $from     = $this->input->get('from');
    //         $to       = $this->input->get('to');
    //         $teacher_id = $this->input->get('id');

    //         $fromm = date("Y-m-d", strtotime($from));
    //         $too   = date("Y-m-d",strtotime($to." +1 days"));

    //         if(!empty($from) && !empty($to)){
    //           $result = $this->db->query('SELECT `request`.*, `t`.* ,`tr`.* FROM request JOIN `teacher` as `t` ON `request`.`teacher_id` = `t`.`teacher_id`  JOIN `transaction` as `tr` ON `request`.`request_id` = `tr`.`request_id` WHERE  `request`.`teacher_id` = "'.$teacher_id.'" AND `request`.`filter_date` BETWEEN "'. date('Y-m-d', strtotime($fromm)). '" and "'. date('Y-m-d', strtotime($too)).'"  ')->result_array();
    //         echo json_encode($result);
    //         }
    //     }else{
    //           redirect('Login');
    //     } 
    // }

    public function profile()
    {
        if($this->session->userdata('LoggedIn')){
            $role = $this->session->userdata('role');
            $id = $_SESSION['login_id'];
                $this->load->view('admin/include/header');
                $this->load->view('admin/include/sidebar');
                $where = array(
                    'id'           => $id
                );
                $data['profiledetails'] = $this->Model->singleRowdata($where, 'login');
                $this->load->view('admin/profile', $data);
                $this->load->view('admin/include/footer');
       }else{
            redirect('Login');
        } 
    }


    public function editAdminDetails() {
        if ($this->session->userdata('LoggedIn')) {

            $wheredata = array(
              'id' => $this->input->post('id')
            );
            if (!empty($_FILES['image']['name'])) {
                if ($_FILES['image']['name'] ) {
                    $config['upload_path']          =  'uploads/admin';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 10000;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('image')) {
                        $error = array('error' => $this->upload->display_errors());
                    } else {
                        $data = $this->upload->data();
                        $image = $data['file_name'];
                    }
                }

                $Data = array(
                    'fullname'   => $this->input->post('fullname'),
                    'email'      => $this->input->post('email'),
                    'mobile'     => $this->input->post('mobile'),
                    'image'      => $image
                );
            }else{
                $Data = array(
                    'fullname'   => $this->input->post('fullname'),
                    'email'      => $this->input->post('email'),
                    'mobile'     => $this->input->post('mobile'),
                );
            }     
            $updateResult = $this->Model->update('login',  $Data, $wheredata);
            if ($updateResult) {
              $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Record Updated Sucessfully!!</strong>.
              </div>');
              redirect('Admin/profile');
            }else{
              $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!!</strong>.
              </div>');
              redirect('Admin/profile');
            }
        }else{
                redirect('Login');
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
                'id' => $login_id
            );
            $data['profiledetails'] = $this->Model->singleRowdata($wheredata,'login');
            // print_r($data['profile_details']);die;
            $this->load->view('admin/profile',$data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
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
            'id' =>  $Id
        );
        $data['pass'] = $this->Model->singleRowdata($wheredata, 'login');
        $this->load->view('admin/changepass',$data);
        $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        }
    }

    public function changeAdminPassword() {
        if($this->input->post('submit')) {

              $wheredata = array(
                    'id' => $this->session->userdata('login_id'),
                    'password' => $this->input->post('old_password')
              );

              $data = $this->Model->singleRowdata($wheredata,'login');
              if ($data) {
                  if($this->input->post('new_password') == $this->input->post('confirm_password')) {
                  $data= array(
                      'password'=> $this->input->post('new_password')
                  );
                  $wheredata = array(
                      'id' => $this->session->userdata('login_id'),
                      'password' => $this->input->post('password')
                  );
                  $chekresult= $this->Model->update('login', $data, $wheredata);
                   $this->session->set_flashdata('sucesstype', '<div id="msg" class=" alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Password Updated Sucessfully!!</strong>.</div>');
                  redirect("Admin/changePassword");
                } else {
                    $this->session->set_flashdata('alert', '<div id="msg" class=" alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Current And New password not mached!!</strong>.</div>');
                    redirect("Admin/changePassword");  
                }
              }else{
                    $this->session->set_flashdata('alert', '<div id="msg" class=" alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Incorrect Current password !!</strong>.</div>');
                    redirect("Admin/changePassword");  
              }

            
        }
    }

    public function fakeUser()
    {
        if($this->session->userdata('LoggedIn')){
            $this->load->view('admin/include/header');
            $this->load->view('admin/include/sidebar');
            $data['fake_user'] = $this->Model->select('fake_user');
            $this->load->view('admin/user/fake_user', $data);
            $this->load->view('admin/include/footer');
        }else{
            redirect('Login');
        } 
    }

    // public function studentAdd()
    // {
    //     if($this->session->userdata('LoggedIn')){
    //         $this->load->view('admin/include/header');
    //         $this->load->view('admin/include/sidebar');
    //         $this->load->view('admin/student/student_add');
    //         $this->load->view('admin/include/footer');
    //     }else{
    //         redirect('Login');
    //     } 
    // }


    // public function insertStudent()
    // {
    //     if($this->session->userdata('LoggedIn')){
    //         $student_name   =  $this->input->post('student_name');
    //         $student_phone  =  $this->input->post('student_phone');
    //         //$student_gender  =  $this->input->post('student_gender');
    //         $student_password =  $this->input->post('student_password');

    //         $data = array(
    //             'student_name'   => $student_name,
    //             'student_phone'  => $student_phone,
    //             //'student_gender' => $student_gender,
    //             'password'       => $student_password,
    //             'status'         => '1',
    //             'otp_status'     => 1
    //         );
            
    //         $result = $this->Model->insert($data,'student');
    //         if ($result) {                        
    //             $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" style="margin:0px;">
    //             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    //             <strong> Success ! </strong> Student add successfully</div>');
    //             redirect('Admin/student');
    //         }else{
    //             $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" style="margin:0px;">
    //             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    //             <strong> Error ! </strong> Student not add</div>');
    //             redirect('Admin/studentAdd');
    //         }
        
    //     }
    // }

    public function logout() {
        $this->session->unset_userdata('LoggedIn');
        session_destroy();
        redirect(base_url(), 'refresh');
    }




}
?>


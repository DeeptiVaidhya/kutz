<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CMS extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function teacherPages(){
    if ($this->session->userdata('LoggedIn')) {
      $this->load->view('admin/include/header');
      $this->load->view('admin/include/sidebar');
      $where  = array('policy_type' => 'Teacher');
      $data['result'] = $this->Model->selectData('all_page',$where);
      $this->load->view('admin/pages/pages', $data);
      $this->load->view('admin/include/footer');
    } else {
      redirect('Login');
    }
   }

    public function editpage($id){
    if ($this->session->userdata('LoggedIn')) {
      $this->load->view('admin/include/header');
      $this->load->view('admin/include/sidebar');
      $wheredata  = array('id' =>$id);
      $data['records'] = $this->Model->selectData('all_page', $wheredata);
      $this->load->view('admin/pages/editpage', $data);
      $this->load->view('admin/include/footer');
    } else {
      redirect('Login');
    }
  }

   public function EditpageData()
    {
        
        if ($this->session->userdata('LoggedIn')) {
                $lastid=$this->input->post('id');
                $sname=$this->input->post('pagename'); 
                $name1 =str_replace("%","-", $sname);
                $name =str_replace(" ","-", $name1);
                $pagename =str_replace("/","-", $name);
                $pagename =str_replace("&","-", $pagename);
                $pagename =str_replace("(","-", $pagename ); 
                $pagename =str_replace(")","-", $pagename );
                $pagename =str_replace("?","", $pagename );
                $pagename = strtolower($pagename);

                $wheredata = array(
                   'id' => $this->input->post('id')
                );
          
                $data = array(
                  'pagename'=>$this->input->post('pagename'),
                  'description'=>$this->input->post('Answer'),
                  'date'=> date("Y-m-d")
                );
          
              $result = $this->Model->update('all_page', $data, $wheredata);
              if ($result) {
                $this->session->set_flashdata('success', '<div class="alert alert-success ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Page Redcord Update Sucessfully!!</strong>.
                </div>');
                redirect('CMS/teacherPages');
              } else {
                
                $this->session->set_flashdata('alert', '<div class="alert alert-danger ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Page Redcord Not Update !!</strong>.
              </div>');
                
                redirect('CMS/teacherPages');
                
            }
        } else {
            redirect('Login');
        }
        
    }



    public function studentPages(){
    if ($this->session->userdata('LoggedIn')) {
      $this->load->view('admin/include/header');
      $this->load->view('admin/include/sidebar');
      $where  = array('policy_type' => 'Student');
      $data['result'] = $this->Model->selectData('all_page',$where);
      $this->load->view('admin/pages/student/pages', $data);
      $this->load->view('admin/include/footer');
    } else {
      redirect('Login');
    }
   }

    public function editStudentPage($id){
    if ($this->session->userdata('LoggedIn')) {
      $this->load->view('admin/include/header');
      $this->load->view('admin/include/sidebar');
      $wheredata  = array('id' =>$id);
      $data['records'] = $this->Model->selectData('all_page', $wheredata);
      $this->load->view('admin/pages/student/editpage', $data);
      $this->load->view('admin/include/footer');
    } else {
      redirect('Login');
    }
  }

   public function EditStudentPageData()
    {
        
        if ($this->session->userdata('LoggedIn')) {
                $lastid=$this->input->post('id');
                $sname=$this->input->post('pagename'); 
                $name1 =str_replace("%","-", $sname);
                $name =str_replace(" ","-", $name1);
                $pagename =str_replace("/","-", $name);
                $pagename =str_replace("&","-", $pagename);
                $pagename =str_replace("(","-", $pagename ); 
                $pagename =str_replace(")","-", $pagename );
                $pagename =str_replace("?","", $pagename );
                $pagename = strtolower($pagename);

                $wheredata = array(
                   'id' => $this->input->post('id')
                );
          
                $data = array(
                  'pagename'=>$this->input->post('pagename'),
                  'description'=>$this->input->post('Answer'),
                  'date'=> date("Y-m-d")
                );
          
              $result = $this->Model->update('all_page', $data, $wheredata);
              if ($result) {
                $this->session->set_flashdata('success', '<div class="alert alert-success ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Page Redcord Update Sucessfully!!</strong>.
                </div>');
                redirect('CMS/studentPages');
              } else {
                
                $this->session->set_flashdata('alert', '<div class="alert alert-danger ">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Page Redcord Not Update !!</strong>.
              </div>');
                
                redirect('CMS/studentPages');
                
            }
        } else {
            redirect('Login');
        }
        
    }

    


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function contact_form(){
    if ($this->session->userdata('LoggedIn')) {
      $this->load->view('admin/include/header');
      $this->load->view('admin/include/sidebar');
      $data['contact'] = $this->Model->select('contact');
      $this->load->view('admin/contact/contact', $data);
      $this->load->view('admin/include/footer');
    } else {
      redirect('Login');
    }
   }
}

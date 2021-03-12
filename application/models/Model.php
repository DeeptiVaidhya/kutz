<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model{

  public function __construct() {

        parent::__construct();
        $this->load->database();
    }

  public function login($wheredata,$table){
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($wheredata);
    $query=$this->db->get();
    return $query->row();
  }

  public function singleRowdata($where_data,$table){  
    $this->db->where($where_data);
    $query = $this->db->get($table);
    return $query->row();
  }

  public function select($table,$order=""){    
     $this->db->select('*');
     $this->db->order_by($order);
     $this->db->from($table);
     $query = $this->db->get();
     return $query->result_array();
  }

  public function selectdata($table,$wheredata,$order=""){ 
       $this->db->select('*');
       $this->db->order_by($order);
       $this->db->from($table);
       $this->db->where($wheredata);
       $query = $this->db->get();
       return $query->result_array();
  }

  public function selectAllById($tbl,$wheredata="")
  {
     $this ->db-> select('*');
     $this ->db-> from($tbl);
     $this ->db-> where($wheredata);
     $query = $this ->db-> get();
     return $query->result_array();
           
   }

  public function update($table,$data,$where_data){
    $this->db->where($where_data);
    $insertData=$this->db->update($table,$data);
    if($insertData){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function record_count($table,$data){
    if(!empty($data))
    {
      $this->db->where($data);
    }
    $this->db->from($table);
    return $this->db->count_all_results();
  }
  
  public function insert($data,$table){      
      $this->db->set($data);
      $insertData = $this->db->insert($table);
      if($insertData){
        return TRUE;
      }else{
        return FALSE;
      }
  }

  public function selectAllCustomerReview($order=""){ 
       $this->db->select('*');
       $this->db->from('customer_review as cr');
       $this->db->join('customers as c', 'c.customer_id = cr.customer_id');
       $this->db->where('c.is_status',0);
       $query = $this->db->get();
       return $query->result_array();
  }

  public function selectCustomerReview($id){ 
       $this->db->select('*');
       $this->db->from('customer_review as cr');
       $this->db->join('customers as c', 'c.customer_id = cr.customer_id');
       $this->db->where('cr.customer_id',$id);
       $query = $this->db->get();
       return $query->result_array();
  }

  public function selectAllBeauticianApplication(){ 
       $this->db->select('*');
       $this->db->from('beautician_application as ba');
       $this->db->join('customers as c', 'c.customer_id = ba.customer_id');
       // $this->db->where('cr.customer_id',$id);
       $query = $this->db->get();
       return $query->result_array();
  }
  public function selectBeauticianApplication($id){ 
       $this->db->select('*');
       $this->db->from('beautician_application as ba');
       $this->db->join('customers as c', 'c.customer_id = ba.customer_id');
       $this->db->where('c.customer_id',$id);
       $query = $this->db->get();
       return $query->result_array();
  }

  public function selectAppointment($id)
  {
      $this->db->select('*');
      $this->db->from('appointment as a ');
      // $this->db->join('customers as b', 'a.beautician_id = b.customer_id');
      $this->db->where('customer_id', $id);
      $this->db->where_in('a.is_status NOT', 4);
      $query = $this->db->get();
      return $query->result_array();
  }

 

  public function delete($wheredata,$tbl)
  {
    $this->db->where($wheredata);
    $query = $this->db->delete($tbl);
    return $query;
  }

}
?>
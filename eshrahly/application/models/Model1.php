<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model{

  public function login($wheredata,$table){
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($wheredata);
    $query=$this->db->get();
    return $query->row();
  }

  public function singleRow($where_data,$table){  
        $this->db->select('*');
        $this->db->where($where_data);
        $query = $this->db->get($table);
        return $query->num_rows();
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

  public function update($table,$data,$where_data){
    $this->db->where($where_data);
    $insertData=$this->db->update($table,$data);
    if($insertData){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function count($table){
    $this->db->select('*');
    $this->db->from($table);
    return $this->db->count_all_results();
  }

  public function countWhere($table,$where){
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($where);
    return $this->db->count_all_results();
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
        return $this->db->insert_id();;
      }else{
        return FALSE;
      }
  }

  public function selectPanApplication(){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('pan_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $query = $this->db->get();
       return $query->result_array();
  }

  public function selectPandingApplication(){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('pan_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $this->db->where('p.status', 0);
       $this->db->where('p.payment_status', 1);
       $this->db->order_by('p.application_id' , 'desc');
       $query = $this->db->get();
       return $query->result_array();
  }

  public function selectVerifyApplication(){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('pan_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $this->db->where('p.status', 2);
       $this->db->where('p.payment_status', 1);
       $this->db->order_by('p.application_id' , 'desc');
       $query = $this->db->get();
       return $query->result_array();
  }

  // public function selectVerifyApplication(){ 
  //      $this->db->select('p.*,a.agent_name');
  //      $this->db->from('pan_application as p');
  //      $this->db->join('agent as a', 'a.agent_id = p.agent_id');
  //      $this->db->join('acknowledgement as ack', 'ack.reference_id = p.application_id');
  //      $this->db->where('ack.type', 'PAN');
  //      $this->db->where('ack.is_status_type !=', 'verify');
  //      $this->db->where('p.status', 2);
  //      $this->db->where('p.payment_status', 1);
  //      $this->db->order_by('p.application_id' , 'desc');
  //      $query = $this->db->get();
  //      return $query->result_array();
  // }


  public function selectRejectApplication(){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('pan_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $this->db->where('p.status', 3);
       $this->db->where('p.payment_status', 1);
       $this->db->order_by('p.application_id' , 'desc');
       $query = $this->db->get();
       return $query->result_array();
  }


  public function selectInprogressApplication(){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('pan_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $this->db->where('p.status', 1);
       $this->db->where('p.payment_status', 1);
       $this->db->order_by('p.application_id' , 'desc');
       $query = $this->db->get();
       return $query->result_array();
  }


  public function selectPandingITRApplication(){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('itr_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $this->db->where('p.status', 0);
        $this->db->where('p.payment_status', 1);
        $this->db->order_by('p.itr_id' , 'desc');
       $query = $this->db->get();
       return $query->result_array();
  }

  public function selectVerifyITRApplication(){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('itr_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $this->db->where('p.status', 2);
       $this->db->where('p.payment_status', 1);
       $this->db->order_by('p.itr_id' , 'desc');
       $query = $this->db->get();
       return $query->result_array();
  }


  public function selectRejectITRApplication(){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('itr_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $this->db->where('p.status', 3);
        $this->db->where('p.payment_status', 1);
        $this->db->order_by('p.itr_id' , 'desc');
       $query = $this->db->get();
       return $query->result_array();
  }


  public function selectInprogressITRApplication(){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('itr_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $this->db->where('p.status', 1);
        $this->db->where('p.payment_status', 1);
        $this->db->order_by('p.itr_id' , 'desc');
       $query = $this->db->get();
       return $query->result_array();
  }

  public function selectItrApplication(){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('itr_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $query = $this->db->get();
       return $query->result_array();
  }


  public function SearchPAN($search){

      $result = $this->db->query("SELECT * FROM pan_application AS a JOIN acknowledgement AS b ON a.application_id = b.reference_id WHERE a.unique_reference = '".$search."' AND b.type = 'PAN' ")->result_array();

      // $result = $this->db->query("SELECT * FROM pan_application AS a JOIN acknowledgement AS b ON a.application_id = b.reference_id WHERE a.application_id LIKE '%$search%' AND b.type = 'PAN' ")->result_array();
      return $result;
  }


  public function SearchITR($search){
      $result = $this->db->query("SELECT * FROM itr_application AS a JOIN acknowledgement AS b ON a.itr_id = b.reference_id WHERE a.unique_reference = '".$search."' AND b.type = 'ITR' ")->result_array();
      return $result;
  }

  public function deleterec($wheredata,$tbl){
        $query = $this->db->where($wheredata);
        $query = $this->db->delete($tbl);
        return $query;
  }

  public function selectSubagentPandingApplication($agent_id){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('pan_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $this->db->where('p.agent_id', $agent_id);
       $this->db->where('p.status', 0);
       $this->db->where('p.payment_status', 1);
       $this->db->order_by('p.application_id' , 'desc');
       $query = $this->db->get();
       return $query->result_array();
  }

  public function selectSubagentPandingITRApplication($agent_id){ 
      $this->db->select('p.*,a.agent_name');
      $this->db->from('itr_application as p');
      $this->db->join('agent as a', 'a.agent_id = p.agent_id');
      $this->db->where('p.agent_id', $agent_id);
      $this->db->where('p.status', 0);
      $this->db->where('p.payment_status', 1);
      $this->db->order_by('p.itr_id' , 'desc');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function selectSubagentInprogressApplication($agent_id){ 
      $this->db->select('p.*,a.agent_name');
      $this->db->from('pan_application as p');
      $this->db->join('agent as a', 'a.agent_id = p.agent_id');
      $this->db->where('p.agent_id', $agent_id);
      $this->db->where('p.status', 1);
      $this->db->where('p.payment_status', 1);
      $this->db->order_by('p.application_id' , 'desc');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function selectSubagentInprogressITRApplication($agent_id){ 
      $this->db->select('p.*,a.agent_name');
      $this->db->from('itr_application as p');
      $this->db->join('agent as a', 'a.agent_id = p.agent_id');
      $this->db->where('p.agent_id', $agent_id);
      $this->db->where('p.status', 1);
      $this->db->where('p.payment_status', 1);
      $this->db->order_by('p.itr_id' , 'desc');
      $query = $this->db->get();
      return $query->result_array();
  }

 public function selectSubagentVerifyApplication($agent_id){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('pan_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $this->db->where('p.agent_id', $agent_id);
       $this->db->where('p.status', 2);
       $this->db->where('p.payment_status', 1);
       $this->db->order_by('p.application_id' , 'desc');
       $query = $this->db->get();
       return $query->result_array();
  }


  public function selectSubagentVerifyITRApplication($agent_id){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('itr_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $this->db->where('p.agent_id', $agent_id);
       $this->db->where('p.status', 2);
       $this->db->where('p.payment_status', 1);
       $this->db->order_by('p.itr_id' , 'desc');
       $query = $this->db->get();
       return $query->result_array();
  }

   public function selectSubagentRejectApplication($agent_id){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('pan_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $this->db->where('p.agent_id', $agent_id);
       $this->db->where('p.status', 3);
       $this->db->where('p.payment_status', 1);
       $this->db->order_by('p.application_id' , 'desc');
       $query = $this->db->get();
       return $query->result_array();
  }


   public function selectSubagentRejectITRApplication($agent_id){ 
       $this->db->select('p.*,a.agent_name');
       $this->db->from('itr_application as p');
       $this->db->join('agent as a', 'a.agent_id = p.agent_id');
       $this->db->where('p.agent_id', $agent_id);
       $this->db->where('p.status', 3);
        $this->db->where('p.payment_status', 1);
        $this->db->order_by('p.itr_id' , 'desc');
       $query = $this->db->get();
       return $query->result_array();
  }


}
?>
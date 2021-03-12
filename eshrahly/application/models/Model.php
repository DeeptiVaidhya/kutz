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
  
  public function selectAllById($tbl,$wheredata="",$order=""){
           $this ->db->select('*');
           $this->db->order_by($order);
           $this ->db->from($tbl);
           $this ->db->where($wheredata);
           $query = $this ->db-> get();
           return $query->row();
  }

  

   public function selectWhereIn($where_data,$table){  
    $this->db->where_in($where_data);
    $query = $this->db->get($table);
    return $query->row();
    // $result  =  $query->result_array();
    // foreach ($result as $key) {
    //  $d[] = $key['level_name'];
    // }
    // return $levels = implode(",", $d);
  }

  public function selectWhereInM($where_data,$table){  
    $this->db->where_in($where_data);
    $query = $this->db->get($table);
    $result  =  $query->result_array();
    foreach ($result as $key) {
     $d[] = $key['material_name'];
    }
    return $material_name = implode(",", $d);
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
        return $this->db->insert_id();
      }else{
        return FALSE;
      }
  }

    public function selectLearningLevel($where_data,$table){  
    $this->db->where($where_data);
    $query = $this->db->get($table);
    return $result  =  $query->row();
    //return $query->result_array();

    // foreach ($result as $key) {
    //  $d[] = $key['level_name'];
    // }
    // return $level = implode(",", $d);
  }


  public function learning_level($level){
     $Arr= explode(',', $level);
     foreach($Arr as $key){
         $where = array('l_id'=> $key );
         $res = $this->singleRowdata($where, 'learning_level');
         $data[] = $res->level_name;   
     }
    return $levelResult = implode(',', $data);
  }    

  public function learningMaterials($mat){
     $Arr= explode(',', $mat);
     foreach($Arr as $key){
         $where = array('material_id'=> $key );
         $resMat = $this->singleRowdata($where, 'learning_material');
         $data[] = $resMat->material_name;   
     }
    return $materialsResult = implode(',', $data);
  }       

  public function selectLearningMat($where_data,$table){  
    $this->db->where($where_data);
    $query = $this->db->get($table);
    return $result  =  $query->row();
    // foreach ($result as $key) {
    //  $d[] = $key['material_name'];
    // }
    // return $material_name = implode(",", $d);
  }
  public function delete($wheredata,$tbl){
        $query = $this->db->where($wheredata);
        $query = $this->db->delete($tbl);
        return $query;
  }
  public function selectTeacherFilterRequest($id,$week_last_day,$currdate){ 
      $this->db->select('tr.*,t.teacher_name');
      $this->db->from('transaction as tr');
      $this->db->join('teacher as t', 'tr.teacher_id = t.teacher_id');
      $this->db->where('t.teacher_id', $id);
      $this->db->where("tr.date_time BETWEEN '$week_last_day' AND '$currdate'");
      //$this->db->GROUP_BY('tr.clear_date');
      $this->db->order_by('tr.tran_id' , 'desc');
      $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
      $query = $this->db->get();
      return $query->result_array();
  }


   public function selectLastMsg($table, $where_data, $order="")
  {  
    $this->db->where($where_data);
    $this->db->order_by($order);
    $this->db->limit(1);
    $query = $this->db->get($table);
    return $query->row();
  }

  public function selectchatdata($id)
  {
      $this->db->select('chat_data.*, user.flname, user.lname');
      $this->db->from('chat_data');
      $this->db->join('user', 'user.user_id = chat_data.match_id');
      $this->db->where('chat_data.sender_id', $id);
      // $this->db->where('chat_data.from_status', 0);
      // $this->db->where('chat_data.to_status', 0);
      //$this->db->order_by('chat_data.datetime', 'DESC');
      $this->db->group_by('chat_data.to_id');
      //$this->db->limit(1);
      $query = $this->db->get();
      return $query->result_array();
  }
  public function selectchatGrupByData($from_id,$id)
  {
     // print_r($id);die;
      $this->db->select('*');
      $this->db->from('chat_data');
      $this->db->where('chat_data.from_id', $from_id);
      $this->db->group_by('chat_data.to_id');
      $query = $this->db->get();
      return $query->result_array();
  }



  public function selectsingleChatdata($id)
  {
      $this->db->select('*');
      $this->db->from('chat_data');
      // $this->db->join('customers', 'customers.customer_id = chat_data.to_id');
      $this->db->where('chat_data.chat_id', $id);
      $this->db->where('chat_data.from_status', 0);
      $this->db->where('chat_data.to_status', 0);
      //$this->db->order_by('chat.chat_id', DESC);
      // $this->db->group_by('chat_data.to_id');
      $query = $this->db->get();
      return $query->result_array();
  }

}
?>
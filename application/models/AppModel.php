<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppModel extends CI_Model{

	public function login($wheredata,$table){

		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($wheredata);
		return $query=$this->db->get()->row();
    // print_r($query);exit;
	}

  public function record_count($table,$data)
  {
  if(!empty($data))
  {
      $this->db->where($data);
      }
     $this->db->from($table);
     return $this->db->count_all_results();
  }

  public function select($table,$order=""){ 
      
   $this->db->select('*');
   $this->db->order_by($order);
   $this->db->from($table);
   $query = $this ->db->get();
   return $query->result_array();
   }

  public function singleRow($where_data,$table){  
        $this->db->select('*');
        $this->db->where($where_data);
        $query = $this->db->get($table);
        return $query->num_rows();
    }
  
  public function selectdata($table,$wheredata,$order=""){ 
       $this->db->select('*');
       $this->db->order_by($order);
       $this->db->from($table);
       $this->db->where($wheredata);
       $query = $this->db->get();
      return $query->result_array();
  }


  public function singleRowdata($where_data,$table, $order="")
  {  
    $this->db->where($where_data);
    $this->db->order_by($order);
    $query = $this->db->get($table);
    return $query->row();
  }

  public function insert($data,$table){  
      
      $this->db->set($data);
      $insertData = $this->db->insert($table);
      return $this->db->insert_id();
      if($insertData){
        return $this->db->insert_id();
      }else{
        return FALSE;
      }
  }

  public function updateData($table,$data,$where_data){
    
    $this->db->where($where_data);
    $insertData=$this->db->update($table,$data);
    if($insertData){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function selectnearbyRestro($lat,$long){

      // $query = $this->db->query("SELECT id, ( 3959 * acos( cos( radians(37) ) * cos( radians( lat ) ) * 
      // cos( radians( lng ) - radians(-122) ) + sin( radians(37) ) * 
      // sin( radians( lat ) ) ) ) AS distance FROM your_table_name HAVING
      // distance < 25 ORDER BY distance LIMIT 0 , 20;")

      $query = $this->db->query("SELECT *, ( 3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * 
      cos( radians( longnitude ) - radians($long) ) + sin( radians($lat) ) * 
      sin( radians( latitude ) ) ) ) AS distance FROM restaurant HAVING
      distance < 10 ORDER BY distance LIMIT 0 , 20");
      // print_r($query);die;
      $res = $query->result();
      return $res;
  }


  public function delete($wheredata,$tbl)
  {
    $this->db->where($wheredata);
    $query = $this->db->delete($tbl);
    return $query;
  }

  public function selectAppointment($id)
  {
      $this->db->select('*');
      $this->db->from('appointment as a');
      // $this->db->join('city as b', 'a.city = b.city_id');
      $this->db->where('customer_id', $id);
      $this->db->where_in('a.is_status NOT', 4);
      $query = $this->db->get();
      return $query->result();
  }

  public function selectServices($ids)
  {
      $this->db->select('*');
      $this->db->from('services');
      $this->db->where("service_id in ($ids)");
      // $this->db->where_in('service_id', $ids);
      $query = $this->db->get();
      return $query->result_array();
  }


  public function selectBeauticianServices()
  {
      $this->db->select('*');
      $this->db->from('services');
      $this->db->join('customers', 'customers.customer_id = services.beautician_id');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function selectServiceCategory($ids)
  {
      $this->db->select('*');
      $this->db->from('services');
      // $this->db->where_in('service_id', $ids);
      $this->db->where("service_cat_id in ($ids)");
      $this->db->group_by('beautician_id');
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
      $this->db->select('chat_data.*, customers.first_name, customers.first_name, customers.last_name, customers.image,customers.profession');
      $this->db->from('chat_data');
      $this->db->join('customers', 'customers.customer_id = chat_data.to_id');
      $this->db->where('chat_data.from_id', $id);
      $this->db->where('chat_data.from_status', 0);
      $this->db->where('chat_data.to_status', 0);
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

  // public function selectsingleChatdata($from_id,$to_id)
  // {
  //     $this->db->select('chat.*, customers.first_name, customers.first_name, customers.last_name, customers.image,customers.profession');
  //     $this->db->from('chat');
  //     $this->db->join('customers', 'customers.customer_id = chat.to_id');
  //     // $this->db->where('chat.from_id', $from_id);
  //     // $this->db->where('chat.to_id', $to_id);
  //     $where = "chat.from_id= '".$from_id."' AND chat.to_id ='".$to_id."' OR chat.to_id= '".$from_id."' AND chat.from_id ='".$to_id."'";
  //     $this->db->where($where);
  //     $query = $this->db->get();
  //     return $query->result_array();
  // }


  public function searchVilla($villaId, $name, $place, $min_price, $max_price, $facilities)
  {
      $this->db->select('a.*, b.cityname');
      $this->db->from('app_villas as a');
      $this->db->join('city as b', 'a.city = b.city_id');
      $this->db->where_in('a.villa_id NOT', $villaId);
      $this->db->like('villa_name', $name);
      $this->db->like('city', $place);
      $this->db->like('villa_features', $facilities);
      $this->db->where('villa_cost_day >=', $min_price);
      $this->db->where('villa_cost_day <=', $max_price);
      //$this->db->where('villa_cost_day <=', $price);
      $query = $this->db->get();
      return $query->result();
  }

  public function searchVillaS($name, $place, $min_price, $max_price, $facilities)
  {
      $this->db->select('a.*, b.cityname');
      $this->db->from('app_villas as a');
      $this->db->join('city as b', 'a.city = b.city_id');
      $this->db->like('villa_name', $name);
      $this->db->like('city', $place);
      $this->db->like('villa_features', $facilities);
      $this->db->where('villa_cost_day >=', $min_price);
      $this->db->where('villa_cost_day <=', $max_price);
      $query = $this->db->get();
      return $query->result();
  }

  public function priceLowToHigh($city_id, $order="")
  {
      $this->db->select('a.*, b.cityname');
      $this->db->from('app_villas as a');
      $this->db->join('city as b', 'a.city = b.city_id');
      $this->db->where('a.city', $city_id);
      $this->db->order_by($order);
      $query = $this->db->get();
      return $query->result();
  }


  public function dealOftheDay($city_id, $order="")
  {
      $this->db->select('a.*, b.cityname');
      $this->db->from('app_villas as a');
      $this->db->join('city as b', 'a.city = b.city_id');
      $this->db->join('deals_of_the_day as d', 'a.villa_id = d.villa_id');
      $this->db->order_by($order);
      $this->db->where('a.city', $city_id);
      $query = $this->db->get();
      return $query->result();
  }


	public function deleterec($wheredata,$tbl){
		$query = $this->db->where($wheredata);
		$query = $this->db->delete($tbl);
		return $query;
	
	}

	public function selectAllById($tbl,$wheredata="",$order=""){
           $this -> db -> select('*');
           $this-> db ->order_by($order);
           $this -> db -> from($tbl);
           $this -> db -> where($wheredata);
           $query = $this -> db -> get();
             // echo $this->db->last_query();exit();
           return $query->row();
           
  }

  public function selectAllByIdarray($tbl,$wheredata){
       $this -> db -> select('*');
           $this -> db -> from($tbl);
           $this -> db -> where($wheredata);
           $query = $this -> db -> get();
           //echo $this->db->last_query();exit();
           return $query->result_array();
           
  }


	public function selectAllByIdwherenot($tbl,$wheredata=""){
		       $this -> db -> select('*');
           $this -> db -> from($tbl);
           $this -> db -> where($wheredata);
           $this -> db ->where('status != ',0,FALSE);
           $query = $this -> db -> get();
           //echo $this->db->last_query();exit();
           return $query->result_array();
           
	}

	public function update($wheredata,$table,$data){
		$query = $this->db->where($wheredata);
		$query = $this->db->update($table,$data);
   // echo $this->db->last_query();exit();
		return $query;
	
	}

   public function selectAvailability($date,$beautician_id){ 
       $this->db->select('*');
       $this->db->from('appointment');
       $this->db->group_by('date');
       $this->db->where('date',$date);
       $this->db->where('beautician_id',$beautician_id);
       // $this->db->join('customers as c', 'c.customer_id = ba.customer_id');
       $query = $this->db->get();
       return $query->result_array();
  }

   public function selectCustomerAppointmentAvailability($date,$beautician_id,$user_id){ 
       $this->db->select('*');
       $this->db->from('appointment');
       // $this->db->group_by('date');
       $this->db->where('date',$date);
       $this->db->where('beautician_id',$beautician_id);
       $this->db->where('customer_id',$user_id);
       // $this->db->join('customers as c', 'c.customer_id = ba.customer_id');
       $query = $this->db->get();
       return $query->result_array();
  }

  public function selectBeauticianSlotAvailability($date,$beautician_id){ 
       $this->db->select('*');
       $this->db->from('appointment');
       // $this->db->group_by('date');
       $this->db->where('date',$date);
       $this->db->where('beautician_id',$beautician_id);
       // $this->db->join('customers as c', 'c.customer_id = ba.customer_id');
       $query = $this->db->get();
       return $query->result_array();
  }

  public function selectBeauticianSlotAvailabilitynew($date,$beautician_id){ 
       $this->db->select('date,time,is_status');
       $this->db->from('appointment');
       $this->db->where('date',$date);
       $this->db->where('beautician_id',$beautician_id);
       $this->db->where('is_status','0');
       $this->db->or_where('is_status','1');
       $this->db->or_where('is_status','2');
       // $query = $this->db->get();
       // return $query->result_array();
       $response = $this->db->get()->result_array();
       //print_r($response);die;
        foreach ($response as $ss) {
          $conv_slot  = explode('-', $ss['time']);
          $start_time = date('h:i A', strtotime($conv_slot[0]));
          $end_time   = date('h:i A', strtotime($conv_slot[1]));

          $available[] = array(
                'date'      => date('Y-m-d', strtotime($ss['date'])),
                'time'      => $ss['time'],
                'convert_time'=> $start_time.' - '.$end_time,
                'is_status' => $ss['is_status'] 
          );
       }
       return $available;
  }

  public function selectSlot($date){
        $this->db->select('*');
        $this->db->from('slot_time');
        $response = $this->db->get()->result_array();
        foreach ($response as $ss) {
            $conv_slot  = explode('-', $ss['slot']);
            $start_time = date('h:i A', strtotime($conv_slot[0]));
            $end_time   = date('h:i A', strtotime($conv_slot[1]));
          
            $available[] = array(
                  'date'        => date('Y-m-d', strtotime($date)),
                  'time'        => $ss['slot'],
                  'convert_time'=> $start_time.' - '.$end_time,
                  'is_status'   => '' 
            );
        }
        return $available;
  }


  public function selectSlot_new($date){
        $this->db->select('*');
        $this->db->from('slot_time');
        $response = $this->db->get()->result_array();
        
        $current_date = date('Y-m-d');
        $current_time = date('H:i');
        foreach ($response as $ss) {
            $conv_slot  = explode('-', $ss['slot']);
            $start_time = date('h:i A', strtotime($conv_slot[0]));
            $end_time   = date('h:i A', strtotime($conv_slot[1]));


            $cnv = date('H:i', strtotime($start_time));
            if ($current_date.' '.$current_time > date('Y-m-d', strtotime($date)).' '.$cnv) {
               $is_disable = true;
            }else{
               $is_disable = false;
            }

          
            $available[] = array(
                  'date'        => date('Y-m-d', strtotime($date)),
                  'time'        => $ss['slot'],
                  'convert_time'=> $start_time.' - '.$end_time,
                  'is_status'   => '',
                  'is_disable'  => $is_disable 
            );
        }
        return $available;
  }

  public function selectBeautician_Slot($date, $beautician_id){
        $this->db->select('*');
        $this->db->from('set_slot_availity');
        $this->db->where('beautician_id', $beautician_id);
        $this->db->where('availity_date', $date);  
        $response = $this->db->get()->result_array();

        foreach ($response as $rr) {
              $slotsss = explode(',', $rr['available_slot']); 
              if ($slotsss) {
                  foreach ($slotsss as $s) {
                      $available_slo[] = array(
                          'date'      => date('Y-m-d', strtotime($date)),
                          'slot_time' => $s,
                          'status'    => '7' 
                      );
                  }
              }else{
                  $available_slo = [];
              }
      
              $avl = $rr['available_slot'];
              $slot_result = $this->AppModel->matchSlot($avl);     
              if ($slot_result) {
                  foreach ($slot_result as $key) {
                      $slot_array[] = array(
                        'date'      => date('Y-m-d', strtotime($date)),
                        'slot_time' => $key['slot'],
                        'status'    => ''
                      );
                  }
              }

        } 
        $check_slot_array = array_merge($available_slo, $slot_array);
        return $check_slot_array;
  }



  public function selectBeauticianSlotAvailabilitynew1($date,$beautician_id){ 
       $this->db->select('date,time,is_status');
       $this->db->from('appointment');
       $this->db->where('date',$date);
       $this->db->where('beautician_id',$beautician_id);
       $this->db->where('is_status','0');
       $this->db->or_where('is_status','1');
       $this->db->or_where('is_status','2');
       $query = $this->db->get();
       $res = $query->result_array();
       foreach ($res as $key) {
         $timess[] =  $key['time'];
       }
       $time_data = implode(',', $timess);
       $dataa = $this->matchSlot($time_data); 
       foreach($dataa as $av) {
          $conv_slot  = explode('-', $av['slot']);
          $start_time = date('h:i A', strtotime($conv_slot[0]));
          $end_time   = date('h:i A', strtotime($conv_slot[1]));

          $available[] = array(
                'date'        => date('Y-m-d', strtotime($date)),
                'time'        => $av['slot'],
                'convert_time'=> $start_time.' - '.$end_time,
                'is_status'   => '' 
          );
       }  
       return $available;
      // print_r($dataa);die;
       // return $dataa->result_array();
  }

  public function matchSlot($time_data){
        $slot = explode(',', $time_data);
        $this->db->select('*');
        $this->db->from('slot_time');
        $this->db->where_in('slot NOT',$slot);
        return $this->db->get()->result_array();
  }

  public function selectServiceAvailability($date,$beautician_id){ 
       $this->db->select('*');
       $this->db->from('services');
       $this->db->group_by('created_at');
       $this->db->where('created_at',$date);
       $this->db->where('beautician_id',$beautician_id);
       // $this->db->join('customers as c', 'c.customer_id = ba.customer_id');
       $query = $this->db->get();
       return $query->result_array();
  }

  public function checkMonthAppointment($keyword, $beautician_id){
        $this->db->select('*');
        $this->db->from('appointment');
        $this->db->like('date', $keyword);
        $this->db->where('beautician_id',$beautician_id);
        return $this->db->get()->result_array();
  }


public function checkAviableMonthAppointment($keyword, $beautician_id){
        $this->db->select('*');
        $this->db->from('appointment');
        $this->db->like('date', $keyword);
        $this->db->where('beautician_id',$beautician_id);
        return $this->db->get()->result_array();
  }

  public function checkMonthAppointment1($keyword, $beautician_id){
        $this->db->select('*');
        $this->db->from('appointment');
        $this->db->like('date', $keyword);
        $this->db->where('beautician_id',$beautician_id);
        return $this->db->get()->num_rows();
  }

  // public function checkSlotTime($appo_dates)
  // {
  //      $this->db->select('a.appointment_id,a.date,s.*');
  //      $this->db->from('appointment1 as a');
  //      $this->db->join('slot_time as s', 's.id = a.slot_time');
  //      $this->db->where('a.date',$appo_dates);
  //      //$this->db->group_by('date');
  //      $query = $this->db->get();
  //      return $query->result_array();
  // }

   public function selectAppointmentAvailability($beautician_id,$status){ 
       $this->db->select('*');
       $this->db->from('appointment');
       // $this->db->group_by('date');
       $this->db->where('beautician_id',$beautician_id);
       $this->db->where('is_status',$status);
       // $this->db->join('customers as c', 'c.customer_id = ba.customer_id');
       $query = $this->db->get();
       return $query->result_array();
  }

  public function merchantrecord_count($table,$wheredata)
 	{
 	  $this->db->where($wheredata);
    return $this->db->count_all_results($table);
 	}


      public function Add_User($data_user){
      $this->db->insert('orders', $data_user);
       }

       function getCountryName(){
        $this->db->select("state.*,country.name");
        $this->db->from('state');
        $this->db->join('country', 'country.country_id = state.country_id');
        $query = $this->db->get();
        return $query->result_array();
       }

        function getStateName(){
        $this->db->select("city.*,state.state_name");
        $this->db->from('city');
        $this->db->join('state', 'state.state_id = city.state_id');
        $query = $this->db->get();
        return $query->result_array();
       }

        function getCityName(){
        $this->db->select("zone.*,city.city_name");
        $this->db->from('zone');
        $this->db->join('city', 'city.city_id = zone.city_id');
        $query = $this->db->get();
        return $query->result_array();
       }
       function getzoneName(){
        $this->db->select("subzone.*,zone.zone_name");
        $this->db->from('subzone');
        $this->db->join('zone', 'zone.zone_id = subzone.zone_id');
        $query = $this->db->get();
        return $query->result_array();
       }
        function getsubcatName(){
        $this->db->select("sub_cat.*,cat.cat_name");
        $this->db->from('sub_cat');
        $this->db->join('cat', 'cat.cat_id = sub_cat.cat_id');
        $query = $this->db->get();
         //echo $this->db->last_query();exit();
        return $query->result_array();
       }
       function getitemName(){
        $this->db->from('item');
        $this->db->join('sub_cat', 'sub_cat.sub_cat_id = item.sub_cat_id');
        $this->db->join('vendor', 'vendor.id = item.vendor_id');
        $query = $this->db->get();
        // echo $this->db->last_query();exit();
        return $query->result_array();
       }
       
       function getbannerName(){
        $this->db->select("banners.*,item.item_name");
        $this->db->from('banners');
        $this->db->order_by('banner_id desc');
        $this->db->join('item', 'item.item_id = banners.item_id');
        $query = $this->db->get();
         //echo $this->db->last_query();exit();
        return $query->result_array();
       }
       function getpopitemName(){
        $this->db->select("popular_items.*,item.item_name");
        $this->db->from('popular_items');
        $this->db->join('item', 'item.item_id = popular_items.item_id');
        $query = $this->db->get();
         //echo $this->db->last_query();exit();
        return $query->result_array();
       }
         function getserviceName(){
         $this->db->select("service_provider.*,vendor.name,item.item_name");
         $this->db->order_by("service_id",'desc');
         $this->db->from('service_provider');
         $this->db->join('vendor', 'vendor.id = service_provider.vendor_id');
         $this->db->join('item', 'item.item_id = service_provider.provider_id');
         $query = $this->db->get();
          //echo $this->db->last_query();exit();
        return $query->result_array();
       }
        function getuserName(){
        $this->db->select("user.*,city.city_name");
        $this->db->from('user');
        $this->db->join('city', 'city.city_id = user.city_id');
        $query = $this->db->get();
         //echo $this->db->last_query();exit();
        return $query->result_array();
       }

      function getOrderIdbyCartId($cart_id){
        $query = $this->db->query("SELECT order_id, order_data from `order` where FIND_IN_SET('$cart_id', cart_id)");
        return $query->row();
      }

      function getOreder($vendor_id, $status)
      {
        $query = $this->db->query("select c.cart_id, c.date_time, t.item_name, u.fname, u.lname from cart c inner join item t on c.item_id=t.item_id inner join user u on u.user_id=c.user_id where t.vendor_id='$vendor_id' and c.cart_status='$status'");
         return $query->result_array();
      }


    public function selectnearby($latitud, $longitud, $distance)
    {
      
        $query = $this->db->query("SELECT *,( 6371 * acos( cos( radians({$latitud}) ) * cos( radians( `lat` ) ) * cos( radians( `long` ) - radians({$longitud}) ) + sin( radians({$latitud}) ) * sin( radians( `lat` ) ) ) ) AS distance FROM `customers` HAVING distance <= {$distance} ORDER BY distance ASC");

        $res = $query->result();
        return $res;
    }

    public function selectdata_chat($table,$wheredata){ 
       $this->db->select('*');
       $this->db->from($table);
       $this->db->where($wheredata);
       $this->db->group_by('to_id');
       $query = $this->db->get();
      return $query->result_array();
  }


}
?>
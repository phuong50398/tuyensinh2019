<?php 
 /**
  * summary
  */
 class Mhethong extends MY_Model
 {
    public function check_trangthai_hethong(){
      $this->db->select('*');
      $this->db->from('tbl_hethong');
      $this->db->order_by('id','DESC');
      $this->db->limit(1);
      return $this->db->get()->row_array();
    }
 }
 ?>
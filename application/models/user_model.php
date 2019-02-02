<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_model{
    public function __construct()
    {
      $this->load->database();
    }

    public function createParkRecord()
    {
      $data = array(
        'vehicle_type' => $this->input->post('vehicle_type'),
        'vehicle_id' => $this->input->post('vehicle_id'),
        'vehicle_owner' => $this->input->post('vehicle_owner'),
        'id_pic' => $this->session->userdata['id']
       );

       $this->db->insert('park',$data);
    }

    public function getParkList()
    {
      $where = array('status' => 0);
      $query = $this->db->get_where('park',$where);
      return $query->result();
    }

    public function getSelectedParkList()
    {
      $where = array('id' => $this->input->post('id'));
      $query = $this->db->get_where('view_park',$where);
      return $query->row();
    }

    public function setCheckOut()
    {
      date_default_timezone_set("Asia/Bangkok");
      $where = array('id' => $this->input->post('id'));
      $data = array('end_time' => date("Y-m-d H:i:s"));
      $this->db->where($where);
      $this->db->update('park',$data);
    }

    public function finishPark($id)
    {
      $where = array('id' => $id);
      $data = array('status' => 1 );
      $this->db->where($where);
      $this->db->update('park',$data);
    }
}

 ?>

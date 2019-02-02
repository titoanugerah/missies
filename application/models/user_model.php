<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_model{
    public function __construct()
    {
      $this->load->database();
    }

    public function getProduct()
    {
      $query = $this->db->get('product');
      return $query->result();
    }

    public function createProduct()
    {
      $data = array(
        'name' => $this->input->post('name'),
        'price' => $this->input->post('price'),
        'stock' => $this->input->post('stock'),
       );
       $this->db->insert('product', $data);
    }

    public function detailProduct($id)
    {
      $where = array('id' => $id);
      $query = $this->db->get_where('product', $where);
      return $query->row();
    }

    public function updateProduct($id)
    {
      $where = array('id' => $id);
      $data = array(
        'name' => $this->input->post('name'),
        'price' => $this->input->post('price'),
        'discount' => $this->input->post('discount'),
      );
      $this->db->where($where);
      $this->db->update('product', $data);
    }

    public function updateStock($id, $currentStock)
    {
      $where = array('id' => $id);
      $data = array(
        'stock' => ($this->input->post('stock')+$currentStock),
      );
      $this->db->where($where);
      $this->db->update('product', $data);
    }

    public function deleteProduct($id)
    {
      if ( md5($this->input->post('password')) == $this->session->userdata['password']) {
        $where = array('id' => $id);
        $this->db->delete('product', $where);
        $url = 'product';
      } else {
        $url = 'detailProduct/'.$id;
      }
      return $url;
    }

    public function createTrxID()
    {
      $data = array(
        'method' => 'UNKN',
        'id_pic' => $this->session->userdata['id']
       );
      $this->db->insert('trx', $data);
      return $this->db->insert_id();
    }

    public function getTrxDetail($id)
    {
      $where = array('id' => $id);
      $query = $this->db->get_where('trx', $where);
      return $query->row();
    }

    public function getListTrx($id)
    {
      $where = array('id_trx' => $id);
      $query = $this->db->get_where('view_detail_trx', $where);
      return $query->result();
    }

    public function addToCart($id, $discount)
    {
      $data = array(
        'id_trx' => $id,
        'id_product' => $this->input->post('id_product'),
        'qty' => $this->input->post('qty'),
        'discount' => $discount
       );
       $this->db->insert('detail_trx', $data);
    }

    public function deleteInputTrx($id)
    {
      $where = array('id' => $id);
      $this->db->delete('detail_trx', $where);
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

    public function getOverview($id)
    {
      $where = array('id' => $id);
      $query = $this->db->get_where('view_trx', $where);
      if ($query->num_rows()>0) {
        $data['result'] = $query->row();
        $data['status'] = 1;
      } else {
        $data['status'] = 0;
        $data['result'] = array(
          'id' => $id,
          'date'=> date('Y-m-d h:i:sa'),
          'id_pic'=> $this->session->userdata['id'],
          'fullname'=> $this->session->userdata['fullname'],
          'item' => 0,
          'subtotal' => 0
        );
      }
      return $data;
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

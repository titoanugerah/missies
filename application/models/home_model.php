<?php

class home_model extends CI_model{
  public function __construct()
  {
    $this->load->database();
  }

  public function loginValidation()
  {
    $where = array(
      'username' =>  $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    );
    $query = $this->db->get_where('account',$where);
    if ($query->num_rows()>0) {
      $login['status'] = 1;
      $login['data'] = array(
        'login' => true,
        'role' => $query->row('role'),
        'id' => $query->row('id'),
        'username' => $query->row('username'),
        'password' => $query->row('password'),
        'fullname' => $query->row('fullname'),
        'email' => $query->row('email')
      );
    } else {
      $login['status'] = 0;
    }
    return $login;
  }

  public function updateAccount()
  {
    $where = array(
      'id' => $this->session->userdata['id']
    );
    $data = array(
      'username' => $this->input->post('username'),
      'fullname' => $this->input->post('fullname'),
      'email' => $this->input->post('email'),
     );
     $this->db->where($where);
     $this->db->update('account',$data);
     $query = $this->db->get_where('account',$where);
     $login['data'] = array(
       'login' => true,
       'role' => $query->row('role'),
       'id' => $query->row('id'),
       'username' => $query->row('username'),
       'password' => $query->row('password'),
       'fullname' => $query->row('fullname'),
       'email' => $query->row('email')
     );
     return $login;
  }

  public function updatePassword()
  {
    $where = array('id' => $this->session->userdata['id']);
    $data = array('password' => md5($this->input->post('password')));
    $this->db->where($where);
    $this->db->update('account',$data);
   }
}


 ?>

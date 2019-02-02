<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }

  public function parkIn()
  {
    if ($this->input->post('createParkRecord')) {
      $this->user_model->createParkRecord();
    }
    $data['view_name'] = 'parkIn';
    $this->load->view('template',$data);
  }

  public function parkOut()
  {
    $data['view_name'] = 'parkOut';
    $data['parklist'] = $this->user_model->getParkList();
    $id = null;
    if ($this->input->post('createParkBill')) {
      date_default_timezone_set("Asia/Bangkok");
      $this->user_model->setCheckOut();
      $data['checkout'] = $this->user_model->getSelectedParkList();
      $id = $data['checkout']->id;
      $data['view_name'] = 'parkSelected';
    }elseif ($this->input->post('cancel')) {
      redirect(base_url('parkIn'));
    }
    $this->load->view('template',$data);
  }

  public function payPark($id)
  {
    $this->user_model->finishPark($id);
    redirect(base_url('parkOut'));
  }
}
 ?>

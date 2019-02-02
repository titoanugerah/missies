<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->model('user_model');
  }

  public function product()
  {
    if ($this->input->post('createProduct')) {
      $this->user_model->createProduct();

    }
    $data['list'] = $this->user_model->getProduct();
    $data['view_name'] = 'product';
    $this->load->view('template',$data);
  }

  public function detailProduct($id)
  {
    $data['detail'] = $this->user_model->detailProduct($id);
    if ($this->input->post('updateProduct')) {
      $this->user_model->updateProduct($id);
    } elseif ($this->input->post('updateStock')) {
      $this->user_model->updateStock($id, $data['detail']->stock);
    } elseif ($this->input->post('deleteProduct')) {
      $url = $this->admin_model->deleteProduct($id);
      redirect(base_url($url));
    }
    $data['detail'] = $this->user_model->detailProduct($id);
    $data['view_name'] = 'detailProduct';
    $this->load->view('template',$data);
  }

  public function downloadReport()
  {
    $data['parklist'] = $this->admin_model->getParkList();
    $filename = 'Laporan Parkir '.date('Y').".xls";
    $this->admin_model->downloadReport($filename, $data['parklist']);
  }
}

 ?>

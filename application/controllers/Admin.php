<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
  }

  public function product()
  {
    if ($this->input->post('createProduct')) {
      // code...
    }
    $data['list'] = $this->admin_model->getProduct();
    $data['view_name'] = 'product';
    $this->load->view('template',$data);
  }

  public function parkReport()
  {
    $data['parklist'] = $this->admin_model->getParkList();
    $data['view_name'] = 'parkReport';
    $this->load->view('template',$data);
  }

  public function deleteReport($id)
  {
    $this->admin_model->deleteReport($id);
    redirect(base_url('parkReport'));
  }

  public function downloadReport()
  {
    $data['parklist'] = $this->admin_model->getParkList();
    $filename = 'Laporan Parkir '.date('Y').".xls";
    $this->admin_model->downloadReport($filename, $data['parklist']);
  }
}

 ?>

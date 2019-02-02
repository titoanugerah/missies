<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }

  public function listProduct()
  {
    if ($this->input->post('createProduct')) {
      $this->user_model->createProduct();
    }
    $data['list'] = $this->user_model->getProduct();
    $data['view_name'] = 'listProduct';
    $this->load->view('template',$data);
  }

  public function selectProduct($id)
  {
    $data['detail'] = $this->user_model->detailProduct($id);
    if ($this->input->post('updateProduct')) {
      $this->user_model->updateProduct($id);
    } elseif ($this->input->post('updateStock')) {
      $this->user_model->updateStock($id, $data['detail']->stock);
    } elseif ($this->input->post('deleteProduct')) {
      $url = $this->user_model->deleteProduct($id);
      redirect(base_url($url));
    }
    $data['detail'] = $this->user_model->detailProduct($id);
    $data['view_name'] = 'selectProduct';
    $this->load->view('template',$data);
  }

  public function teller()
  {
    $id = $this->user_model->createTrxID();
    redirect(base_url('inputTeller/'.$id));
  }

  public function deleteInputTrx($idTrx, $id)
  {
    $this->user_model->deleteInputTrx($id);
    redirect(base_url('inputTeller/'.$idTrx));
  }

  public function inputTeller($id)
  {
    if ($this->input->post('addToCart')) {
      $product = $this->user_model->detailProduct($this->input->post('id_product'));
      $this->user_model->addToCart($id, $product->discount);
    }
    $data['overview'] = $this->user_model->getOverview($id);
    $data['list'] = $this->user_model->getListTrx($id);
    $data['trx'] = $this->user_model->getTrxDetail($id);
    $data['product'] = $this->user_model->getProduct();
    $data['view_name'] = 'inputTeller';
    $this->load->view('template',$data);
  }


}
 ?>

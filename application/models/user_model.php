<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_model{
    public function __construct()
    {
      $this->load->database();
            $this->load->library('Excel');
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

    public function updateMethod($id,$method)
    {
      $where = array('id' => $id);
      $data = array('method' => $method );
      $this->db->where($where);
      $this->db->update('trx', $data);
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
       $this->updateMethod($id,$this->input->post('method'));
    }

    public function deleteInputTrx($id)
    {
      $where = array('id' => $id);
      $this->db->delete('detail_trx', $where);
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
          'subtotal' => 0,
          'method' => 'UNKW'
        );
      }
      return $data;
    }

    public function getListTellerDaily()
    {
      $query = $this->db->query('select * from view_trx where day(date)=day(now())');
      return $query->result();
    }

    public function getSoldItem()
    {
      $query = $this->db->get('view_detail_trx');
      return $query->result();
    }

    public function getSoldItemDaily()
    {
      $query = $this->db->query('select * from view_detail_trx where day(date)=day(now())');
      return $query->result();
    }

    public function downloadReport($filename, $data)
    {
      $objPHPExcel = new PHPExcel();
      $objPHPExcel->getProperties()
      ->setCreator("Tito Anugerah")
        ->setLastModifiedBy("Tito Anugerah")
        ->setTitle("Daily Report")
        ->setSubject("Report")
        ->setDescription("Template Report")
        ->setKeywords("Missies")
        ->setCategory("private");

        $row = 1;
        $objPHPExcel->setActiveSheetIndex(0)
          ->setCellValue('A'.$row, 'No' )
          ->setCellValue('B'.$row, 'ID Transaksi' )
          ->setCellValue('C'.$row, 'Waktu' )
          ->setCellValue('D'.$row, 'Metode Pembayaran' )
          ->setCellValue('E'.$row, 'Nama Produk' )
          ->setCellValue('F'.$row, 'Jumlah' )
          ->setCellValue('G'.$row, 'Harga Satuan' )
          ->setCellValue('H'.$row, 'Diskon Satuan' )
          ->setCellValue('I'.$row, 'Total' )
          ->setCellValue('J'.$row, 'PIC' );
          $row++;
          foreach ($data as $data) :
          $objPHPExcel->setActiveSheetIndex(0)
          ->setCellValue('A'.$row, $row)
          ->setCellValue('B'.$row, $data->id." - ".$data->id_trx)
          ->setCellValue('C'.$row, $data->date)
          ->setCellValue('D'.$row, $data->method)
          ->setCellValue('E'.$row, $data->name)
         ->setCellValue('F'.$row, $data->qty)
          ->setCellValue('G'.$row, $data->price)
          ->setCellValue('H'.$row, $data->discount)
          ->setCellValue('I'.$row, $data->total)
          ->setCellValue('J'.$row, $data->PIC);
          $row++;
        endforeach;

        $objPHPExcel->getActiveSheet()->setTitle('Report Sold Item');

        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        return true;
    }
}

 ?>

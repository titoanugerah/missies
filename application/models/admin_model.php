<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_model{
    public function __construct()
    {
      $this->load->database();
      $this->load->library('Excel');
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

    public function getParkList()
    {
      $where = array('status' => 1);
      $query = $this->db->get_where('view_park',$where);
      return $query->result();
    }

    public function deleteReport($id)
    {
      $where = array('id' => $id );
      $this->db->delete('park',$where);
      $this->load->library('Excel');
      }

    public function downloadReport($filename, $data)
    {
      $objPHPExcel = new PHPExcel();
      $objPHPExcel->getProperties()
      ->setCreator("Tito Anugerah")
        ->setLastModifiedBy("Tito Anugerah")
        ->setTitle("Report Parkir")
        ->setSubject("Report")
        ->setDescription("Template Report")
        ->setKeywords("Parking")
        ->setCategory("private");

        $row = 1;
        $objPHPExcel->setActiveSheetIndex(0)
          ->setCellValue('A'.$row, 'No' )
          ->setCellValue('B'.$row, 'ID Transaksi' )
          ->setCellValue('C'.$row, 'Plat Nomor' )
          ->setCellValue('D'.$row, 'Tipe Kendaraan' )
          ->setCellValue('E'.$row, 'Nama Pemilik' )
          ->setCellValue('F'.$row, 'Waktu Masuk' )
          ->setCellValue('G'.$row, 'Waktu Keluar' )
          ->setCellValue('H'.$row, 'Durasi' )
          ->setCellValue('I'.$row, 'Biaya' )
          ->setCellValue('J'.$row, 'PIC' );
          $row++;
          foreach ($data as $data) :
    			$objPHPExcel->setActiveSheetIndex(0)
    			->setCellValue('A'.$row, $row)
    			->setCellValue('B'.$row, $data->id)
    			->setCellValue('C'.$row, $data->vehicle_id)
    			->setCellValue('D'.$row, $data->vehicle_type)
    			->setCellValue('E'.$row, $data->vehicle_owner)
         ->setCellValue('F'.$row, $data->start_time)
    			->setCellValue('G'.$row, $data->end_time)
    			->setCellValue('H'.$row, $data->duration_time)
    			->setCellValue('I'.$row, $data->Total)
    			->setCellValue('J'.$row, $data->id_pic);
          $row++;
        endforeach;

        $objPHPExcel->getActiveSheet()->setTitle('Parkir');

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

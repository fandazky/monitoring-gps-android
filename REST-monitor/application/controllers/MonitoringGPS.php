<?php
class MonitoringGPS extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('Monitoring');
  }

  public function getGps($page, $size)
  {

    $response = array(
      'content' => $this->Monitoring->getGps(($page - 1) * $size, $size)->result(),
      'totalPages' => ceil($this->Monitoring->getCountGpsData() / $size));
    //var_dump($response);exit();

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

  public function saveGps()
  {
      $data = (array)json_decode(file_get_contents('php://input'));
      //var_dump($data);exit();
      $this->Monitoring->insertGps($data);

      $response = array(
        'Success' => true,
        'Info' => 'Data Tersimpan');

      $this->output
        ->set_status_header(201)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
        exit;
  }

  // public function updateGps($npm)
  // {
  //   $data = (array)json_decode(file_get_contents('php://input'));
  //   $this->MonitoringGps->updateMahasiswa($data, $npm);

  //   $response = array(
  //     'Success' => true,
  //     'Info' => 'Data Berhasil di update');

  //   $this->output
  //     ->set_status_header(200)
  //     ->set_content_type('application/json', 'utf-8')
  //     ->set_output(json_encode($response, JSON_PRETTY_PRINT))
  //     ->_display();
  //     exit;
  // }

  // public function deleteGps($npm)
  // {
  //   $this->MonitoringGps->deleteMahasiswa($npm);

  //   $response = array(
  //     'Success' => true,
  //     'Info' => 'Data Berhasil di hapus');

  //   $this->output
  //     ->set_status_header(200)
  //     ->set_content_type('application/json', 'utf-8')
  //     ->set_output(json_encode($response, JSON_PRETTY_PRINT))
  //     ->_display();
  //     exit;
  // }

}
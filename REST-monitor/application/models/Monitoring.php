<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monitoring extends CI_Model {

  public function getCountGpsData()
  {
      return $this->db->count_all_results('data_gps', FALSE);
  }

  public function getGps($page, $size)
  {
      $this->db->order_by('id', 'desc');
      return $this->db->get('data_gps', $size, $page);
  }

  public function insertGps($dataGps)
  {
      $val = array(
        'latitude' => $dataGps['npm'],
        'longitude' => $dataGps['nama'],
        'altitude' => $dataGps['kelas'],
        'acccuracy' => $dataGps['tanggalLahir']
      );
      $this->db->insert('data_gps', $val);
  }

  // public function updateMahasiswa($dataGps, $npm)
  // {
  //   $val = array(
  //     'nama' => $dataGps['nama'],
  //     'kelas' => $dataGps['kelas'],
  //     'tanggalLahir' => $dataGps['tanggalLahir']
  //   );
  //   $this->db->where('npm', $npm);
  //   $this->db->update('data_gps', $val);
  // }

  // public function deleteMahasiswa($npm)
  // {
  //   $val = array(
  //     'npm' => $npm
  //   );
  //   $this->db->delete('data_gps', $val);
  // }

}
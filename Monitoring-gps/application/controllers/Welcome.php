<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$url = "http://localhost:8000/api/gps/1/1";
		$gps = $this->__execute($url,'get', '');
		//var_dump($mhs);exit();
		if($gps){
			$data['monitor'] = $gps->content[0];
		} else {
			$data['monitor'] = null;
		}
		

		//var_dump($data['monitor']);exit();

		$this->load->view('monitor-gps', $data);

	}

	function __execute($url,$method,$param) {
		$this->load->library('curl');
		$this->curl->create($url);
		// Optional, delete this line if your API is open
		//$result_login = $this->curl->http_login($username, $password);
		$this->curl->$method($param);
		$result = json_decode($this->curl->execute());
		return $result;
	}

	public function getData(){
		// header("Access-Control-Allow-Origin: http://localhost:8000");
		$url = "http://localhost:8000/api/gps/1/1";
		$gps = $this->__execute($url,'get', '');
		$content = $gps->content;
		$json = array();
		foreach ($content as $key => $val) {
			$json[] = array(
				'longitude'  => $val->longitude,
	            'latitude' => $val->latitude,
	            'altitude' => $val->altitude,
	            'accuracy' => $val->accuracy
	        );	
		}
        echo json_encode($json);
	}
}

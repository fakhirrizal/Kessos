<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Master extends REST_Controller {

	function __construct()
	{
		parent::__construct();

		$this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
		$this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
		$this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
	}
	function index_get() {}

	function index_post() {
	}

	function index_put() {
		$data = array(
			'rutilahu'					=> $this->put('rutilahu'),
			'rulahu'					=> $this->put('rulahu'),
			'terdata'					=> $this->put('terdata'),
			'estimasi_belum_terdata'	=> $this->put('estimasi_belum_terdata'));
		$this->db->where('id_desa', $this->put('id_desa'));
		$update = $this->db->update('desa', $data);
		if ($update) {
			// $this->response(array('status' => 'Update is successful', 200));
			// $this->response(array('status' => '1', 200));
			echo "success";
		} else {
			// $this->response(array('status' => 'Failed, please try again', 502));
			// $this->response(array('status' => '0', 502));
			echo "failed";
		}
	}

	function index_delete() {
    }
}
<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller {

	function __construct()
	{
		parent::__construct();

		$this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
		$this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
		$this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
	}
	function index_get() {
	}

	function index_post() {
		$cek = $this->Main_model->getSelectedData('user a', '*', array("a.username" => $this->post('username'), "a.is_active" => '1', 'deleted' => '0'), 'a.username ASC')->result();
		if($cek!=NULL){
			$cek2 = $this->Main_model->getSelectedData('user a', '*', array("a.username" => $this->post('username'),'pass' => $this->post('password'), "a.is_active" => '1', 'deleted' => '0'), 'a.username ASC','','','','')->result();
			if($cek2!=NULL){
				foreach ($cek as $key => $value) {
					$total_login = ($value->total_login)+1;
					$login_attempts = ($value->login_attempts)+1;
					$data_log = array(
						'total_login' => $total_login,
						'last_login' => date('Y-m-d H-i-s'),
						'last_activity' => date('Y-m-d H-i-s'),
						'login_attempts' => $login_attempts,
						'last_login_attempt' => date('Y-m-d H-i-s'),
						'ip_address' => $this->input->ip_address()
					);
					$this->Main_model->updateData('user',$data_log,array('id'=>$value->id));
					$this->Main_model->log_activity($value->id,'Login to system','Login via mobile apps');
					$role = $this->Main_model->getSelectedData('user_to_role a', 'b.route,a.user_id,up.*', array('a.user_id'=>$value->id,'b.deleted'=>'0'), "",'','','',array(
						array(
							'table' => 'user_role b',
							'on' => 'a.role_id=b.id',
							'pos' => 'left'
						),
						array(
							'table' => 'user_profile up',
							'on' => 'a.user_id=up.user_id',
							'pos' => 'left'
						)
					))->result();
					if($role==NULL){
						$hasil['status'] = 'Akun Anda tidak dikenali sistem';
						$this->response($hasil, 200);
					}else{
						foreach ($role as $key => $value2) {
							$hasil['user_id'] = $value2->user_id;
							$hasil['nama'] = $value2->fullname;
							$hasil['nik'] = $value2->nin;
							$hasil['tanggal_lahir'] = $value2->birth_date;
							$hasil['alamat'] = $value2->address;
							$hasil['foto'] = $value2->photo;
							$this->response($hasil, 200);
						}
					}
				}
			}else{
				foreach ($cek as $key => $value) {
					$login_attempts = ($value->login_attempts)+1;
					$data_log = array(
						'login_attempts' => $login_attempts,
						'last_login_attempt' => date('Y-m-d H-i-s')
					);
					$this->Main_model->updateData('user',$data_log,array('id'=>$value->id));
					$hasil['status'] = 'Password yg Anda masukkan tidak valid';
					$this->response($hasil, 200);
				}
			}
		}
		else{
			$hasil['status'] = 'Username/ Email yang Anda masukkan tidak terdaftar';
			$this->response($hasil, 200);
		}
	}

	function index_put() {
	}

	function index_delete() {
    }
}
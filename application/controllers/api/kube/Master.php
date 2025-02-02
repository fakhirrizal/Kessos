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
	function index_get() {
		if($this->get('id_kube')!=NULL){
			$hasil = $this->Main_model->getSelectedData('kube a', 'a.id_kube,a.nama_tim AS nama_kelompok,a.alamat,a.rencana_anggaran,(SELECT COUNT(ak.id_anggota_kube) FROM anggota_kube ak WHERE ak.id_kube=a.id_kube) AS jumlah_anggota,e.jenis_usaha,f.nm_provinsi,b.nm_kabupaten,c.nm_kecamatan,d.nm_desa', array('id_kube'=>$this->get('id_kube'),'a.deleted'=>'0'),'','','','',array(
				array(
					'table' => 'provinsi f',
					'on' => 'a.id_provinsi=f.id_provinsi',
					'pos' => 'left',
				),
				array(
					'table' => 'kabupaten b',
					'on' => 'a.id_kabupaten=b.id_kabupaten',
					'pos' => 'left',
				),
				array(
					'table' => 'kecamatan c',
					'on' => 'a.id_kecamatan=c.id_kecamatan',
					'pos' => 'left',
				),
				array(
					'table' => 'desa d',
					'on' => 'a.id_desa=d.id_desa',
					'pos' => 'left',
				),
				array(
					'table' => 'jenis_usaha e',
					'on' => 'a.id_jenis_usaha=e.id_jenis_usaha',
					'pos' => 'left',
				)
			))->row();
			$this->response($hasil, 200);
		}else{
			$hasil = $this->Main_model->getSelectedData('kube a', 'a.id_kube,a.nama_tim AS nama_kelompok,a.alamat,a.rencana_anggaran,(SELECT COUNT(ak.id_anggota_kube) FROM anggota_kube ak WHERE ak.id_kube=a.id_kube) AS jumlah_anggota,e.jenis_usaha,f.nm_provinsi,b.nm_kabupaten,c.nm_kecamatan,d.nm_desa', array('a.deleted'=>'0'),'','','','',array(
				array(
					'table' => 'provinsi f',
					'on' => 'a.id_provinsi=f.id_provinsi',
					'pos' => 'left',
				),
				array(
					'table' => 'kabupaten b',
					'on' => 'a.id_kabupaten=b.id_kabupaten',
					'pos' => 'left',
				),
				array(
					'table' => 'kecamatan c',
					'on' => 'a.id_kecamatan=c.id_kecamatan',
					'pos' => 'left',
				),
				array(
					'table' => 'desa d',
					'on' => 'a.id_desa=d.id_desa',
					'pos' => 'left',
				),
				array(
					'table' => 'jenis_usaha e',
					'on' => 'a.id_jenis_usaha=e.id_jenis_usaha',
					'pos' => 'left',
				)
			))->result();
			$this->response($hasil, 200);
		}
	}

	function index_post() {
	}

	function index_put() {
		$data = array(
			'jumlah_umkm'			=> $this->put('jumlah_umkm'),
			'bidang_usaha_terbesar'	=> $this->put('bidang_usaha_terbesar'));
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
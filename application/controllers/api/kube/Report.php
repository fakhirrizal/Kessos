<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Report extends REST_Controller {

	function __construct()
	{
		parent::__construct();

		$this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
		$this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
		$this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
	}

	function index_get() {
		if($this->get('id_kube')!=NULL){
			$hasil['data_utama'] = $this->Main_model->getSelectedData('status_laporan_kube a', 'a.*', array('a.id_kube'=>$this->get('id_kube')))->row();
			$hasil['data_laporan'] = $this->Main_model->getSelectedData('laporan_kube a', 'a.id_laporan_kube,b.fullname AS pelapor,a.indikator,a.persentase_fisik,a.anggaran,a.persentase_anggaran,a.persentase_realisasi,a.keterangan,a.created_at',array('a.id_kube'=>$this->get('id_kube'),'a.deleted'=>'0'),'','','','',array(
				'table' => 'user_profile b',
				'on' => 'a.user_id=b.user_id',
				'pos' => 'LEFT'
			))->result();
			$this->response($hasil, 200);
		}elseif($this->get('id_laporan_kube')!=NULL){
			$hasil['data_utama'] = $this->Main_model->getSelectedData('laporan_kube a', 'a.id_laporan_kube,b.fullname AS pelapor,a.indikator,a.persentase_fisik,a.anggaran,a.persentase_anggaran,a.persentase_realisasi,a.keterangan,a.created_at',array('a.id_laporan_kube'=>$this->get('id_laporan_kube'),'a.deleted'=>'0'),'','','','',array(
				'table' => 'user_profile b',
				'on' => 'a.user_id=b.user_id',
				'pos' => 'LEFT'
			))->row();
			$hasil['progres_fisik'] = $this->Main_model->getSelectedData('detail_laporan_kube_aspek_fisik a', 'a.id_laporan_kube,b.master_indikator AS tipe,c.indikator,a.penjelasan_progres_fisik',array('a.id_laporan_kube'=>$this->get('id_laporan_kube')),'','','','',array(
				array(
					'table' => 'master_indikator b',
					'on' => 'a.id_master_indikator=b.id_master_indikator',
					'pos' => 'LEFT'
				),
				array(
					'table' => 'indikator c',
					'on' => 'a.indikator_progres_fisik=c.id_indikator',
					'pos' => 'LEFT'
				)
			))->result();
			$hasil['progres_keuangan'] = $this->Main_model->getSelectedData('detail_laporan_kube_aspek_keuangan a', 'a.id_laporan_kube,b.master_indikator AS tipe,a.progres_keuangan,a.penjelasan_progres_keuangan',array('a.id_laporan_kube'=>$this->get('id_laporan_kube')),'','','','',array(
				'table' => 'master_indikator b',
				'on' => 'a.id_master_indikator=b.id_master_indikator',
				'pos' => 'LEFT'
			))->result();
			$this->response($hasil, 200);
		}
		else{
			$get_id_laporan_kube = $this->Main_model->getLastID('laporan_kube','id_laporan_kube');
			$hasil['id_laporan_kube'] = $get_id_laporan_kube['id_laporan_kube']+1;
			$this->response($hasil, 200);
		}
	}

	// function index_post() {
	// 	$this->db->trans_start();
	// 	$get_data_anggota = $this->Main_model->getSelectedData('anggota_kube a', 'a.*', array('a.id_anggota_kube'=>$this->post('id_anggota_kube')))->row();
	// 	$get_id_laporan_kube = $this->Main_model->getLastID('laporan_kube','id_laporan_kube');
	// 	$get_data_kube = $this->Main_model->getSelectedData('kube a', 'a.*', array('a.id_kube'=>$this->post('id_kube')))->row();
	// 	$data_indikator = $this->Main_model->getSelectedData('indikator a', 'a.*')->result();

	// 	$data_insert2 = array(
	// 		'id_laporan_kube' => $get_id_laporan_kube['id_laporan_kube']+1,
	// 		'id_master_indikator' => $this->post('id_tipe_indikator'),
	// 		'indikator_progres_fisik' => $this->post('indikator'),
	// 		'penjelasan_progres_fisik' => $this->post('penjelasan_progres_fisik'),
	// 		'progres_keuangan' => $this->post('progres_keuangan')
	// 	);
	// 	$this->Main_model->insertData('detail_laporan_kube',$data_insert2);

	// 	$gabung_indikator = '';
	// 	$cek_laporan_kube = $this->Main_model->getSelectedData('laporan_kube a', 'a.*', array('a.id_kube'=>$this->post('id_kube'),'a.deleted'=>'0'),'a.created_at DESC','1')->row();
	// 	$explode_indikator = explode(',',$gabung_indikator);
	// 	$get_status_laporan_kube = $this->Main_model->getSelectedData('status_laporan_kube a', 'a.*', array('a.id_kube'=>$this->post('id_kube')))->row();
	// 	$persentase_fisik = (count($explode_indikator)/count($data_indikator))*100;
	// 	if($cek_laporan_kube==NULL){
	// 		$gabung_indikator = $this->post('indikator');
	// 		$data_insert1 = array(
	// 			'id_laporan_kube' => $get_id_laporan_kube['id_laporan_kube']+1,
	// 			'id_anggota_kube' => $this->post('id_anggota_kube'),
	// 			'user_id' => $get_data_anggota->user_id,
	// 			'id_kube' => $this->post('id_kube'),
	// 			'indikator' => $this->post('indikator'),
	// 			'persentase_fisik' => $persentase_fisik,
	// 			'anggaran' => $this->post('progres_keuangan'),
	// 			'persentase_anggaran' => ($this->post('progres_keuangan')/$get_data_kube->rencana_anggaran)*100,
	// 			'persentase_realisasi' => ((($this->post('progres_keuangan')/$get_data_kube->rencana_anggaran)*100)+$persentase_fisik)/2,
	// 			'keterangan' => $this->post('keterangan'),
	// 			'created_at' => date('Y-m-d H:i:s'),
	// 			'created_by' => $get_data_anggota->user_id
	// 		);
	// 		$this->Main_model->insertData('laporan_kube',$data_insert1);
	// 	}else{
	// 		$a = $cek_laporan_kube->indikator;
	// 		$b = $this->post('indikator');
	// 		$array1 = explode(',',$a);
	// 		$array2 = explode(',',$b);
	// 		$result = array_merge($array1, $array2);
	// 		$uniques = array_unique($result);
	// 		$string = implode(',',$uniques);
	// 		$gabung_indikator = $string;
	// 		$data_insert1 = array(
	// 			'id_laporan_kube' => $get_id_laporan_kube['id_laporan_kube']+1,
	// 			'id_anggota_kube' => $this->post('id_anggota_kube'),
	// 			'user_id' => $get_data_anggota->user_id,
	// 			'id_kube' => $this->post('id_kube'),
	// 			'indikator' => $string,
	// 			'persentase_fisik' => $persentase_fisik,
	// 			'anggaran' => $this->post('progres_keuangan'),
	// 			'persentase_anggaran' => ($this->post('progres_keuangan')/$get_data_kube->rencana_anggaran)*100,
	// 			'persentase_realisasi' => ((($this->post('progres_keuangan')/$get_data_kube->rencana_anggaran)*100)+$persentase_fisik)/2,
	// 			'keterangan' => $this->post('keterangan'),
	// 			'created_at' => date('Y-m-d H:i:s'),
	// 			'created_by' => $get_data_anggota->user_id
	// 		);
	// 		$this->Main_model->insertData('laporan_kube',$data_insert1);
	// 	}

	// 	if($get_status_laporan_kube==NULL){
	// 		$persentase_anggaran = ($this->post('progres_keuangan')/$get_data_kube->rencana_anggaran)*100;
	// 		$persentase_realisasi = ($persentase_anggaran+$persentase_fisik)/2;
	// 		$data_insert3 = array(
	// 			'id_kube' => $this->post('id_kube'),
	// 			'persentase_fisik' => $persentase_fisik,
	// 			'anggaran' => $this->post('progres_keuangan'),
	// 			'persentase_anggaran' => $persentase_anggaran,
	// 			'persentase_realisasi' => $persentase_realisasi
	// 		);
	// 		$this->Main_model->insertData('status_laporan_kube',$data_insert3);
	// 	}else{
	// 		$persentase_anggaran = (($this->post('progres_keuangan')+$get_status_laporan_kube->anggaran)/$get_data_kube->rencana_anggaran)*100;
	// 		$persentase_realisasi = ($persentase_anggaran+$persentase_fisik)/2;
	// 		$data_update1 = array(
	// 			'persentase_fisik' => $persentase_fisik,
	// 			'anggaran' => $this->post('progres_keuangan')+$get_status_laporan_kube->anggaran,
	// 			'persentase_anggaran' => $persentase_anggaran,
	// 			'persentase_realisasi' => $persentase_realisasi
	// 		);
	// 		$this->Main_model->updateData('status_laporan_kube',$data_update1,array('id_kube'=>$get_status_laporan_kube->id_kube));
	// 	}
	// 	$this->Main_model->log_activity($get_data_anggota->user_id,'Adding data',"Add kube's report data (".$get_data_kube->nama_tim.") via Mobile Apps");
	// 	$this->db->trans_complete();
	// 	if($this->db->trans_status() === false){
	// 		$hasil['status'] = 'Gagal';
	// 		$this->response($hasil, 200);
	// 	}
	// 	else{
	// 		$hasil['status'] = 'Sukses';
	// 		$this->response($hasil, 200);
	// 	}
	// }
	function index_post(){
		if($this->post('id_kube')!=NULL){
			$this->db->trans_start();
			$get_data_anggota = $this->Main_model->getSelectedData('anggota_kube a', 'a.*', array('a.id_anggota_kube'=>$this->post('id_anggota_kube')))->row();
			$data_insert1 = array(
				'id_laporan_kube' => $this->post('id_laporan_kube'),
				'id_anggota_kube' => $this->post('id_anggota_kube'),
				'user_id' => $get_data_anggota->user_id,
				'id_kube' => $this->post('id_kube'),
				'keterangan' => $this->post('keterangan'),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $get_data_anggota->user_id
			);
			$this->Main_model->insertData('laporan_kube',$data_insert1);
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$hasil['status'] = 'Gagal';
				$this->response($hasil, 200);
			}
			else{
				$hasil['status'] = 'Sukses';
				$this->response($hasil, 200);
			}
		}elseif($this->post('indikator_progres_fisik')!=NULL){
			$this->db->trans_start();
			$get_laporan_kube = $this->Main_model->getSelectedData('laporan_kube a', 'a.*', array('a.id_laporan_kube'=>$this->post('id_laporan_kube'),'a.deleted'=>'0'),'a.created_at DESC','1')->row();
			$var_array_push[] = $this->post('indikator_progres_fisik');
			$get_total_indikator = array_unique(array_merge(explode(',',$get_laporan_kube->indikator),$var_array_push));
			$get_indikator = $this->Main_model->getSelectedData('indikator a', 'a.*')->result();
			$data_insert1 = array(
				'indikator' => implode(',',$get_total_indikator),
				'persentase_fisik' => (count($get_total_indikator)/count($get_indikator))*100,
				'persentase_realisasi' => (((count($get_total_indikator)/count($get_indikator))*100)+($get_laporan_kube->persentase_anggaran))/2
			);
			// print_r($data_insert1);
			$this->Main_model->updateData('laporan_kube',$data_insert1,array('id_laporan_indikator'=>$this->post('id_laporan_kube')));
			$data_insert2 = array(
				'id_laporan_kube' => $this->post('id_laporan_kube'),
				'id_master_indikator' => $this->post('id_tipe_indikator'),
				'indikator_progres_fisik' => $this->post('indikator_progres_fisik'),
				'penjelasan_progres_fisik' => $this->post('penjelasan_progres_fisik')
			);
			// print_r($data_insert2);
			$this->Main_model->insertData('detail_laporan_kube_aspek_fisik',$data_insert2);
			$get_status_laporan_kube = $this->Main_model->getSelectedData('status_laporan_kube a', 'a.*', array('a.id_kube'=>$get_laporan_kube->id_kube))->row();
			if($get_status_laporan_kube==NULL){
				$persentase_realisasi = ((count($get_total_indikator)/count($get_indikator))*100)/2;
				$data_insert3 = array(
					'id_kube' => $get_laporan_kube->id_kube,
					'indikator' => implode(',',$get_total_indikator),
					'persentase_fisik' => (count($get_total_indikator)/count($get_indikator))*100,
					'anggaran' => '0',
					'persentase_anggaran' => '0',
					'persentase_realisasi' => $persentase_realisasi
				);
				// print_r($data_insert3);
				$this->Main_model->insertData('status_laporan_kube',$data_insert3);
			}else{
				$bb = explode(',',$get_status_laporan_kube->indikator);
				$c = array_unique(array_merge($get_total_indikator,$bb));
				$d = implode(',',$c);
				$persentase_fisik = (count($c)/count($get_indikator))*100;
				$persentase_realisasi = ($get_status_laporan_kube->persentase_anggaran+$persentase_fisik)/2;
				$data_insert3 = array(
					'indikator' => $d,
					'persentase_fisik' => $persentase_fisik,
					'persentase_realisasi' => $persentase_realisasi
				);
				// print_r($data_insert3);
				$this->Main_model->updateData('status_laporan_kube',$data_insert3,array('id_kube'=>$get_status_laporan_kube->id_kube));
			}
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$hasil['status'] = 'Gagal';
				$this->response($hasil, 200);
			}
			else{
				$hasil['status'] = 'Sukses';
				$this->response($hasil, 200);
			}
		}elseif($this->post('progres_keuangan')!=NULL){
			$this->db->trans_start();
			$get_laporan_kube = $this->Main_model->getSelectedData('laporan_kube a', 'a.*,f.rencana_anggaran', array('a.id_laporan_kube'=>$this->post('id_laporan_kube'),'a.deleted'=>'0'),'a.created_at DESC','1','','',array(
				'table' => 'kube f',
				'on' => 'a.id_kube=f.id_kube',
				'pos' => 'LEFT'
			))->row();
			$data_insert1 = array(
				'anggaran' => $get_laporan_kube->anggaran+$this->post('progres_keuangan'),
				'persentase_anggaran' => (($get_laporan_kube->anggaran+$this->post('progres_keuangan'))/($get_laporan_kube->rencana_anggaran))*100,
				'persentase_realisasi' => (((($get_laporan_kube->anggaran+$this->post('progres_keuangan'))/($get_laporan_kube->rencana_anggaran))*100)+($get_laporan_kube->persentase_fisik))/2
			);
			// print_r($data_insert1);
			$this->Main_model->updateData('laporan_kube',$data_insert1,array('id_laporan_indikator'=>$this->post('id_laporan_kube')));
			$data_insert2 = array(
				'id_laporan_kube' => $this->post('id_laporan_kube'),
				'id_master_indikator' => $this->post('id_tipe_indikator'),
				'progres_keuangan' => $this->post('progres_keuangan'),
				'penjelasan_progres_keuangan' => $this->post('penjelasan_progres_keuangan')
			);
			// print_r($data_insert2);
			$this->Main_model->insertData('detail_laporan_kube_aspek_keuangan',$data_insert2);
			$get_status_laporan_kube = $this->Main_model->getSelectedData('status_laporan_kube a', 'a.*', array('a.id_kube'=>$get_laporan_kube->id_kube))->row();
			if($get_status_laporan_kube==NULL){
				$data_insert3 = array(
					'id_kube' => $get_laporan_kube->id_kube,
					'persentase_fisik' => '0',
					'anggaran' => $this->post('progres_keuangan'),
					'persentase_anggaran' => (($get_laporan_kube->anggaran+$this->post('progres_keuangan'))/($get_laporan_kube->rencana_anggaran))*100,
					'persentase_realisasi' => (((($get_laporan_kube->anggaran+$this->post('progres_keuangan'))/($get_laporan_kube->rencana_anggaran))*100)+($get_laporan_kube->persentase_fisik))/2
				);
				// print_r($data_insert3);
				$this->Main_model->insertData('status_laporan_kube',$data_insert3);
			}else{
				$persentase_anggaran = (((($get_laporan_kube->anggaran+$this->post('progres_keuangan'))/($get_laporan_kube->rencana_anggaran))*100)+$get_status_laporan_kube->persentase_anggaran)/2;
				$persentase_realisasi = ($get_status_laporan_kube->persentase_fisik+$persentase_anggaran)/2;
				$data_insert3 = array(
					'anggaran' => $this->post('progres_keuangan')+$get_status_laporan_kube->anggaran,
					'persentase_anggaran' => $persentase_anggaran,
					'persentase_realisasi' => $persentase_realisasi
				);
				// print_r($data_insert3);
				$this->Main_model->updateData('status_laporan_kube',$data_insert3,array('id_kube'=>$get_status_laporan_kube->id_kube));
			}
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$hasil['status'] = 'Gagal';
				$this->response($hasil, 200);
			}
			else{
				$hasil['status'] = 'Sukses';
				$this->response($hasil, 200);
			}
		}
	}

	function index_put() {
	}

	function index_delete() {
    }
}
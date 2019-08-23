<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	/* Kube (Kelompok Usaha Bersama) */
	public function kube(){
		$data['parent'] = 'report';
		$data['child'] = 'kube';
		$data['grand_child'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/report/kube',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_kube(){
		$get_data = $this->Main_model->getSelectedData('kube a', 'a.*,b.jenis_usaha,c.nm_provinsi,d.nm_kabupaten,e.nm_kecamatan,f.nm_desa',array('a.deleted'=>'0'),'','','','',array(
			array(
				'table' => 'jenis_usaha b',
				'on' => 'a.id_jenis_usaha=b.id_jenis_usaha',
				'pos' => 'LEFT'
			),
			array(
				'table' => 'provinsi c',
				'on' => 'a.id_provinsi=c.id_provinsi',
				'pos' => 'LEFT'
			),
			array(
				'table' => 'kabupaten d',
				'on' => 'a.id_kabupaten=d.id_kabupaten',
				'pos' => 'LEFT'
			),
			array(
				'table' => 'kecamatan e',
				'on' => 'a.id_kecamatan=e.id_kecamatan',
				'pos' => 'LEFT'
			),
			array(
				'table' => 'desa f',
				'on' => 'a.id_desa=f.id_desa',
				'pos' => 'LEFT'
			)
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['checkbox'] =	'
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" name="selected_id[]" value="'.$value->id_kube.'"/>
									<span></span>
								</label>
								';
			$isi['number'] = $no++.'.';
			$isi['id_kube'] = $value->nama_tim;
			$isi['realisasi_fisik'] = $value->jenis_usaha;
			$isi['realisasi_anggaran'] = $value->alamat;
			$isi['persentase_realisasi'] = 'Rp '.number_format($value->rencana_anggaran,2);
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	/* Rutilahu (Rumah Tidak Layak Huni) */
	/* Sarling (Sarana Lingkungan) */
}
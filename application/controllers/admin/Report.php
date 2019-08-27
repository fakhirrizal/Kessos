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
		$jumlah_indikator = $this->Main_model->getSelectedData('indikator a', 'a.*')->result();
		$get_data = $this->Main_model->getSelectedData('kube a', 'a.*,b.jenis_usaha,c.nm_provinsi,d.nm_kabupaten,e.nm_kecamatan,f.nm_desa,(SELECT COUNT(g.id_laporan_kube) FROM laporan_kube g WHERE g.id_kube=a.id_kube) AS jumlah_fisik,(SELECT SUM(h.keuangan) FROM laporan_kube h WHERE h.id_kube=a.id_kube) AS jumlah_uang,(SELECT i.persentase_fisik FROM laporan_kube i WHERE i.id_kube=a.id_kube ORDER BY i.created_at DESC LIMIT 1) AS persentase_fisik',array('a.deleted'=>'0'),'','','','',array(
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
			// $get_realisasi_fisik = ($value->jumlah_fisik/count($jumlah_indikator))*100;
			$get_total_uang_keluar = ($value->jumlah_uang/$value->rencana_anggaran)*100;
			$isi['checkbox'] =	'
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" name="selected_id[]" value="'.$value->id_kube.'"/>
									<span></span>
								</label>
								';
			$isi['number'] = $no++.'.';
			$isi['id_kube'] = $value->nama_tim;
			$isi['realisasi_fisik'] = $value->persentase_fisik.'%';
			$isi['realisasi_anggaran'] = number_format($get_total_uang_keluar,2).'%';
			$isi['persentase_realisasi'] = '-';
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	public function add_kube_report(){
		$data['parent'] = 'report';
		$data['child'] = 'kube';
		$data['grand_child'] = '';
		$data['kube'] = $this->Main_model->getSelectedData('kube a', 'a.*,e.nm_kabupaten', array('a.deleted'=>'0'),'','','','',array(
			'table' => 'kabupaten e',
			'on' => 'a.id_kabupaten=e.id_kabupaten',
			'pos' => 'left'
		))->result();
		$data['indikator'] = $this->Main_model->getSelectedData('master_indikator a', 'a.*')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/report/add_kube_report',$data);
		$this->load->view('admin/template/footer');
	}
	public function save_kube_report(){
		$this->db->trans_start();
		$keuangan = preg_replace("/[^0-9]/", "", $this->input->post('keuangan'));
		$get_anggota_kube = explode('-',$this->input->post('id_anggota_kube'));
		$get_data_indikator = implode(',',$this->input->post('indikator'));
		$data_insert = array(
			'id_anggota_kube' => $get_anggota_kube[0],
			'user_id' => $get_anggota_kube[1],
			'id_kube' => $this->input->post('id_kube'),
			'daftar_indikator' => $get_data_indikator,
			'fisik' => $this->input->post('fisik'),
			'persentase_fisik' => $this->input->post('persentase_fisik'),
			'keuangan' => $keuangan,
			'keterangan' => $this->input->post('keterangan'),
			'created_at' => date('Y-m-d H:i:s'),
			'created_by' => $this->session->userdata('id')
		);
		$this->Main_model->insertData('laporan_kube',$data_insert);
		$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Add kube's report data",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_laporan_kube/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/laporan_kube/'</script>";
		}
	}
	/* Rutilahu (Rumah Tidak Layak Huni) */
	/* Sarling (Sarana Lingkungan) */
}
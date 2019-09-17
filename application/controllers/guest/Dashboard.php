<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	/* Map */
	public function main_map()
	{
		if($this->input->post('kegiatan')=='a'){
			$data['judul'] = 'KUBE';
			if($this->input->post('wilayah')=='4'){
				$data['data_marker'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jml')->result();
			}else{
				$data['data_marker'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jml',array('a.wilayah'=>$this->input->post('wilayah')))->result();
			}
			$this->load->view('guest/dashboard/main_map_conditional',$data);
		}
		elseif($this->input->post('kegiatan')=='b'){
			$data['judul'] = 'RUTILAHU';
			if($this->input->post('wilayah')=='4'){
				$data['data_marker'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jml')->result();
			}else{
				$data['data_marker'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jml',array('a.wilayah'=>$this->input->post('wilayah')))->result();
			}
			$this->load->view('guest/dashboard/main_map_conditional',$data);
		}
		elseif($this->input->post('kegiatan')=='c'){
			$data['judul'] = 'SARLING';
			if($this->input->post('wilayah')=='4'){
				$data['data_marker'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jml')->result();
			}else{
				$data['data_marker'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jml',array('a.wilayah'=>$this->input->post('wilayah')))->result();
			}
			$this->load->view('guest/dashboard/main_map_conditional',$data);
		}else{
			$data['data_marker'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi_kube,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jumlah_kube,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi_rutilahu,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jumlah_rutilahu,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi_sarling,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jumlah_sarling')->result();
			$this->load->view('guest/dashboard/main_map',$data);
		}
	}
	public function map_province()
	{
		$uuid = '';
		if($this->input->post('uuid')!=NULL){
			$uuid = $this->input->post('uuid');
		}
		else{
			$uuid = $this->uri->segment(2);
		}
		$data_provinsi = $this->Main_model->getSelectedData('provinsi a', 'a.*',array('md5(a.id_provinsi)'=>$uuid))->result();
		$titik_tengah = '';
		$kml = '';
		$wilayah = '';
		foreach ($data_provinsi as $key => $value) {
			$kml = $value->kml;
			$wilayah = $value->nm_provinsi;
			$titik_tengah = "lat: ".$value->lintang.", lng: ".$value->bujur;
		}
		$data['wilayah'] = $wilayah;
		$data['titik_tengah'] = $titik_tengah;
		$data['kml'] = $kml;
		
		if($this->input->post('kegiatan')=='a'){
			$data['judul'] = 'KUBE';
			$data['uuid'] = $uuid;
			$data['data_marker'] = $this->Main_model->getSelectedData('kabupaten a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_realisasi,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_kabupaten=a.id_kabupaten AND k.tahun="2019") AS jml',array('md5(a.id_provinsi)'=>$uuid))->result();
			$this->load->view('guest/dashboard/map_province_conditional',$data);
		}
		elseif($this->input->post('kegiatan')=='b'){
			$data['judul'] = 'RUTILAHU';
			$data['uuid'] = $uuid;
			$data['data_marker'] = $this->Main_model->getSelectedData('kabupaten a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_realisasi,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_kabupaten=a.id_kabupaten AND k.tahun="2019") AS jml',array('md5(a.id_provinsi)'=>$uuid))->result();
			$this->load->view('guest/dashboard/map_province_conditional',$data);
		}
		elseif($this->input->post('kegiatan')=='c'){
			$data['judul'] = 'SARLING';
			$data['uuid'] = $uuid;
			$data['data_marker'] = $this->Main_model->getSelectedData('kabupaten a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_realisasi,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_kabupaten=a.id_kabupaten AND k.tahun="2019") AS jml',array('md5(a.id_provinsi)'=>$uuid))->result();
			$this->load->view('guest/dashboard/map_province_conditional',$data);
		}else{
			$data['data_marker'] = $this->Main_model->getSelectedData('kabupaten a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_realisasi_kube,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_kabupaten=a.id_kabupaten AND k.tahun="2019") AS jumlah_kube,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_realisasi_rutilahu,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_kabupaten=a.id_kabupaten AND k.tahun="2019") AS jumlah_rutilahu,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_realisasi_sarling,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_kabupaten=a.id_kabupaten AND k.tahun="2019") AS jumlah_sarling',array('md5(a.id_provinsi)'=>$uuid))->result();
			$this->load->view('guest/dashboard/map_province',$data);
		}
	}
	public function map_region()
	{
		$uuid = '';
		if($this->input->post('uuid')!=NULL){
			$uuid = $this->input->post('uuid');
		}
		else{
			$uuid = $this->uri->segment(2);
		}
		$data_kabupaten = $this->Main_model->getSelectedData('kabupaten a', 'a.*',array('md5(a.id_kabupaten)'=>$uuid))->result();
		$titik_tengah = '';
		$kml = '';
		$wilayah = '';
		foreach ($data_kabupaten as $key => $value) {
			$kml = $value->kml;
			$wilayah = $value->nm_kabupaten;
			$titik_tengah = "lat: ".$value->lintang.", lng: ".$value->bujur;
		}
		$data['wilayah'] = $wilayah;
		$data['titik_tengah'] = $titik_tengah;
		$data['kml'] = $kml;
		
		if($this->input->post('kegiatan')=='a'){
			$data['judul'] = 'KUBE';
			$data['uuid'] = $uuid;
			$data['data_marker'] = $this->Main_model->getSelectedData('kecamatan a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_realisasi,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_kecamatan=a.id_kecamatan AND k.tahun="2019") AS jml',array('md5(a.id_kabupaten)'=>$uuid))->result();
			$this->load->view('guest/dashboard/map_region_conditional',$data);
		}
		elseif($this->input->post('kegiatan')=='b'){
			$data['judul'] = 'RUTILAHU';
			$data['uuid'] = $uuid;
			$data['data_marker'] = $this->Main_model->getSelectedData('kecamatan a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_realisasi,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_kecamatan=a.id_kecamatan AND k.tahun="2019") AS jml',array('md5(a.id_kabupaten)'=>$uuid))->result();
			$this->load->view('guest/dashboard/map_region_conditional',$data);
		}
		elseif($this->input->post('kegiatan')=='c'){
			$data['judul'] = 'SARLING';
			$data['uuid'] = $uuid;
			$data['data_marker'] = $this->Main_model->getSelectedData('kecamatan a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_realisasi,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_kecamatan=a.id_kecamatan AND k.tahun="2019") AS jml',array('md5(a.id_kabupaten)'=>$uuid))->result();
			$this->load->view('guest/dashboard/map_region_conditional',$data);
		}else{
			$data['data_marker'] = $this->Main_model->getSelectedData('kecamatan a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_realisasi_kube,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_kecamatan=a.id_kecamatan AND k.tahun="2019") AS jumlah_kube,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_realisasi_rutilahu,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_kecamatan=a.id_kecamatan AND k.tahun="2019") AS jumlah_rutilahu,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_realisasi_sarling,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_kecamatan=a.id_kecamatan AND k.tahun="2019") AS jumlah_sarling',array('md5(a.id_kabupaten)'=>$uuid))->result();
			$this->load->view('guest/dashboard/map_region',$data);
		}
	}
	public function map_district()
	{
		$uuid = '';
		if($this->input->post('uuid')!=NULL){
			$uuid = $this->input->post('uuid');
		}
		else{
			$uuid = $this->uri->segment(2);
		}
		$data_kecamatan = $this->Main_model->getSelectedData('kecamatan a', 'a.*',array('md5(a.id_kecamatan)'=>$uuid))->result();
		$titik_tengah = '';
		$kml = '';
		$wilayah = '';
		foreach ($data_kecamatan as $key => $value) {
			$kml = $value->kml;
			$wilayah = $value->nm_kecamatan;
			$titik_tengah = "lat: ".$value->lintang.", lng: ".$value->bujur;
		}
		$data['wilayah'] = $wilayah;
		$data['titik_tengah'] = $titik_tengah;
		$data['kml'] = $kml;
		
		if($this->input->post('kegiatan')=='a'){
			$data['judul'] = 'KUBE';
			$data['uuid'] = $uuid;
			$data['data_marker'] = $this->Main_model->getSelectedData('desa a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_desa=a.id_desa) AS persentase_realisasi,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_desa=a.id_desa AND k.jumlah="2019") AS jml',array('md5(a.id_kecamatan)'=>$uuid))->result();
			$this->load->view('guest/dashboard/map_district_conditional',$data);
		}
		elseif($this->input->post('kegiatan')=='b'){
			$data['judul'] = 'RUTILAHU';
			$data['uuid'] = $uuid;
			$data['data_marker'] = $this->Main_model->getSelectedData('desa a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_desa=a.id_desa) AS persentase_realisasi,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_desa=a.id_desa AND k.jumlah="2019") AS jml',array('md5(a.id_kecamatan)'=>$uuid))->result();
			$this->load->view('guest/dashboard/map_district_conditional',$data);
		}
		elseif($this->input->post('kegiatan')=='c'){
			$data['judul'] = 'SARLING';
			$data['uuid'] = $uuid;
			$data['data_marker'] = $this->Main_model->getSelectedData('desa a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_desa=a.id_desa) AS persentase_realisasi,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_desa=a.id_desa AND k.jumlah="2019") AS jml',array('md5(a.id_kecamatan)'=>$uuid))->result();
			$this->load->view('guest/dashboard/map_district_conditional',$data);
		}else{
			$data['data_marker'] = $this->Main_model->getSelectedData('desa a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_desa=a.id_desa) AS persentase_realisasi_kube,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_desa=a.id_desa AND k.jumlah="2019") AS jumlah_kube,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_desa=a.id_desa) AS persentase_realisasi_rutilahu,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_desa=a.id_desa AND k.jumlah="2019") AS jumlah_rutilahu,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_desa=a.id_desa) AS persentase_realisasi_sarling,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_desa=a.id_desa AND k.jumlah="2019") AS jumlah_sarling',array('md5(a.id_kecamatan)'=>$uuid))->result();
			$this->load->view('guest/dashboard/map_district',$data);
		}
	}
	/* Graph */
	public function main_graph(){
		$data = array();
		if($this->input->post('kegiatan')=='a'){
			$data['judul'] = 'Kube (Kelompok Usaha Bersama)';
			if($this->input->post('wilayah')=='4'){
				$data['data_utama'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jml')->result();
			}else{
				$data['data_utama'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jml',array('a.wilayah'=>$this->input->post('wilayah')))->result();
			}
			$this->load->view('guest/dashboard/main_graph_conditional',$data);
		}
		elseif($this->input->post('kegiatan')=='b'){
			$data['judul'] = 'Rutilahu (Rumah Tidak Layak Huni)';
			if($this->input->post('wilayah')=='4'){
				$data['data_utama'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jml')->result();
			}else{
				$data['data_utama'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jml',array('a.wilayah'=>$this->input->post('wilayah')))->result();
			}
			$this->load->view('guest/dashboard/main_graph_conditional',$data);
		}
		elseif($this->input->post('kegiatan')=='c'){
			$data['judul'] = 'Sarling (Sarana Lingkungan)';
			if($this->input->post('wilayah')=='4'){
				$data['data_utama'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jml')->result();
			}else{
				$data['data_utama'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jml',array('a.wilayah'=>$this->input->post('wilayah')))->result();
			}
			$this->load->view('guest/dashboard/main_graph_conditional',$data);
		}else{
			$data['data_kube'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jumlah_kube')->result();
			$data['data_rutilahu'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jumlah_rutilahu')->result();
			$data['data_sarling'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_provinsi=a.id_provinsi AND k.tahun="2019") AS jumlah_sarling')->result();
			$this->load->view('guest/dashboard/main_graph',$data);
		}
	}
}
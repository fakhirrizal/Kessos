<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	/* Map */
	public function main_map()
	{
		$data['data_marker'] = $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$this->load->view('user/dashboard/main_map',$data);
	}
	public function index()
	{
		$data['parent'] = 'dashboard';
		$data['child'] = 'map';
		$data['grand_child'] = '';
		$data['data_marker'] = $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/dashboard/main',$data);
		$this->load->view('admin/template/footer');
	}
	public function province()
	{
		$data['parent'] = 'dashboard';
		$data['child'] = 'map';
		$data['grand_child'] = '';
		$data_provinsi = $this->Main_model->getSelectedData('provinsi a', 'a.*',array('md5(a.id_provinsi)'=>$this->uri->segment(3)))->result();
		$kml = '';
		$wilayah = '';
		foreach ($data_provinsi as $key => $value) {
			$kml = $value->kml;
			$wilayah = $value->nm_provinsi;
		}
		$data['wilayah'] = $wilayah;
		$data['kml'] = $kml;
		$data['data_marker'] = $this->Main_model->getSelectedData('kabupaten a', 'a.*',array('md5(a.id_provinsi)'=>$this->uri->segment(3)))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/dashboard/province',$data);
		$this->load->view('admin/template/footer');
	}
	public function city()
	{
		$data['parent'] = 'dashboard';
		$data['child'] = 'map';
		$data['grand_child'] = '';
		$data_kabupaten = $this->Main_model->getSelectedData('kabupaten a', 'a.*',array('md5(a.id_kabupaten)'=>$this->uri->segment(3)))->result();
		$kml = '';
		$wilayah = '';
		foreach ($data_kabupaten as $key => $value) {
			$kml = $value->kml;
			$wilayah = $value->nm_kabupaten;
		}
		$data['wilayah'] = $wilayah;
		$data['kml'] = $kml;
		$data['data_marker'] = $this->Main_model->getSelectedData('kecamatan a', 'a.*',array('md5(a.id_kabupaten)'=>$this->uri->segment(3)))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/dashboard/city',$data);
		$this->load->view('admin/template/footer');
	}
	public function sub_district()
	{
		$data['parent'] = 'dashboard';
		$data['child'] = 'map';
		$data['grand_child'] = '';
		$data_kecamatan = $this->Main_model->getSelectedData('kecamatan a', 'a.*',array('md5(a.id_kecamatan)'=>$this->uri->segment(3)))->result();
		$kml = '';
		$wilayah = '';
		foreach ($data_kecamatan as $key => $value) {
			$kml = $value->kml;
			$wilayah = $value->nm_kecamatan;
		}
		$data['wilayah'] = $wilayah;
		$data['kml'] = $kml;
		$data['data_marker'] = $this->Main_model->getSelectedData('desa a', 'a.*',array('md5(a.id_kecamatan)'=>$this->uri->segment(3)))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/dashboard/sub_district',$data);
		$this->load->view('admin/template/footer');
	}
	/* Graph */
	public function main_graph(){
		$data['parent'] = 'dashboard';
		$data['child'] = 'graph';
		$data['grand_child'] = '';
		$data['data_all'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi_kube,(SELECT SUM(s.persentase_fisik) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_provinsi=a.id_provinsi) AS persentase_fisik_kube,(SELECT SUM(s.anggaran) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_provinsi=a.id_provinsi) AS anggaran_kube,(SELECT SUM(s.persentase_anggaran) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_provinsi=a.id_provinsi) AS persentase_anggaran_kube,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_provinsi=a.id_provinsi) AS jumlah_kube,(SELECT SUM(s.persentase_fisik) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_provinsi=a.id_provinsi) AS persentase_fisik_rutilahu,(SELECT SUM(s.anggaran) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_provinsi=a.id_provinsi) AS anggaran_rutilahu,(SELECT SUM(s.persentase_anggaran) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_provinsi=a.id_provinsi) AS persentase_anggaran_rutilahu,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi_rutilahu,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_provinsi=a.id_provinsi) AS jumlah_rutilahu,(SELECT SUM(s.persentase_fisik) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_provinsi=a.id_provinsi) AS persentase_fisik_sarling,(SELECT SUM(s.anggaran) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_provinsi=a.id_provinsi) AS anggaran_sarling,(SELECT SUM(s.persentase_anggaran) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_provinsi=a.id_provinsi) AS persentase_anggaran_sarling,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi_sarling,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_provinsi=a.id_provinsi) AS jumlah_sarling')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/dashboard/main_graph',$data);
		$this->load->view('admin/template/footer');
	}
	public function graph_province($id){
		$data['parent'] = 'dashboard';
		$data['child'] = 'graph';
		$data['grand_child'] = '';
		$data['data_provinsi'] = $this->Main_model->getSelectedData('provinsi a', 'a.*',array('md5(a.id_provinsi)'=>$id))->row();
		$data['data_all'] = $this->Main_model->getSelectedData('kabupaten a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_realisasi_kube,(SELECT SUM(s.persentase_fisik) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_fisik_kube,(SELECT SUM(s.anggaran) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_kabupaten=a.id_kabupaten) AS anggaran_kube,(SELECT SUM(s.persentase_anggaran) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_anggaran_kube,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_kabupaten=a.id_kabupaten) AS jumlah_kube,(SELECT SUM(s.persentase_fisik) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_fisik_rutilahu,(SELECT SUM(s.anggaran) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_kabupaten=a.id_kabupaten) AS anggaran_rutilahu,(SELECT SUM(s.persentase_anggaran) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_anggaran_rutilahu,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_realisasi_rutilahu,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_kabupaten=a.id_kabupaten) AS jumlah_rutilahu,(SELECT SUM(s.persentase_fisik) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_fisik_sarling,(SELECT SUM(s.anggaran) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_kabupaten=a.id_kabupaten) AS anggaran_sarling,(SELECT SUM(s.persentase_anggaran) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_anggaran_sarling,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_kabupaten=a.id_kabupaten) AS persentase_realisasi_sarling,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_kabupaten=a.id_kabupaten) AS jumlah_sarling',array('md5(a.id_provinsi)'=>$id))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/dashboard/graph_province',$data);
		$this->load->view('admin/template/footer');
	}
	public function graph_region($id){
		$data['parent'] = 'dashboard';
		$data['child'] = 'graph';
		$data['grand_child'] = '';
		$data['data_kabupaten'] = $this->Main_model->getSelectedData('kabupaten a', 'a.*',array('md5(a.id_kabupaten)'=>$id))->row();
		$data['data_all'] = $this->Main_model->getSelectedData('kecamatan a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_realisasi_kube,(SELECT SUM(s.persentase_fisik) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_fisik_kube,(SELECT SUM(s.anggaran) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_kecamatan=a.id_kecamatan) AS anggaran_kube,(SELECT SUM(s.persentase_anggaran) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_anggaran_kube,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_kecamatan=a.id_kecamatan) AS jumlah_kube,(SELECT SUM(s.persentase_fisik) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_fisik_rutilahu,(SELECT SUM(s.anggaran) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_kecamatan=a.id_kecamatan) AS anggaran_rutilahu,(SELECT SUM(s.persentase_anggaran) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_anggaran_rutilahu,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_realisasi_rutilahu,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_kecamatan=a.id_kecamatan) AS jumlah_rutilahu,(SELECT SUM(s.persentase_fisik) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_fisik_sarling,(SELECT SUM(s.anggaran) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_kecamatan=a.id_kecamatan) AS anggaran_sarling,(SELECT SUM(s.persentase_anggaran) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_anggaran_sarling,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_kecamatan=a.id_kecamatan) AS persentase_realisasi_sarling,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_kecamatan=a.id_kecamatan) AS jumlah_sarling',array('md5(a.id_kabupaten)'=>$id))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/dashboard/graph_region',$data);
		$this->load->view('admin/template/footer');
	}
	public function graph_district($id){
		$data['parent'] = 'dashboard';
		$data['child'] = 'graph';
		$data['grand_child'] = '';
		$data['data_kecamatan'] = $this->Main_model->getSelectedData('kecamatan a', 'a.*',array('md5(a.id_kecamatan)'=>$id))->row();
		$data['data_all'] = $this->Main_model->getSelectedData('desa a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_desa=a.id_desa) AS persentase_realisasi_kube,(SELECT SUM(s.persentase_fisik) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_desa=a.id_desa) AS persentase_fisik_kube,(SELECT SUM(s.anggaran) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_desa=a.id_desa) AS anggaran_kube,(SELECT SUM(s.persentase_anggaran) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_desa=a.id_desa) AS persentase_anggaran_kube,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_desa=a.id_desa) AS jumlah_kube,(SELECT SUM(s.persentase_fisik) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_desa=a.id_desa) AS persentase_fisik_rutilahu,(SELECT SUM(s.anggaran) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_desa=a.id_desa) AS anggaran_rutilahu,(SELECT SUM(s.persentase_anggaran) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_desa=a.id_desa) AS persentase_anggaran_rutilahu,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_desa=a.id_desa) AS persentase_realisasi_rutilahu,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_desa=a.id_desa) AS jumlah_rutilahu,(SELECT SUM(s.persentase_fisik) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_desa=a.id_desa) AS persentase_fisik_sarling,(SELECT SUM(s.anggaran) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_desa=a.id_desa) AS anggaran_sarling,(SELECT SUM(s.persentase_anggaran) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_desa=a.id_desa) AS persentase_anggaran_sarling,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_desa=a.id_desa) AS persentase_realisasi_sarling,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_desa=a.id_desa) AS jumlah_sarling',array('md5(a.id_kecamatan)'=>$id))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/dashboard/graph_district',$data);
		$this->load->view('admin/template/footer');
	}
}
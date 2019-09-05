<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	/* Map */
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
		$data['data_marker'] = $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/dashboard/main_graph',$data);
		$this->load->view('admin/template/footer');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    function __construct() {
        parent::__construct();
	}
	public function index(){
		$data['parent'] = 'report';
		$data['child'] = '';
		$data['grand_child'] = '';
		$data['data_marker'] = $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/report/main',$data);
		$this->load->view('admin/template/footer');
	}
}
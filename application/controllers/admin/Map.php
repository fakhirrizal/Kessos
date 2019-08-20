<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	/* Provinsi */
	public function province()
	{
		$data['parent'] = 'master';
		$data['child'] = 'map';
		$data['grand_child'] = 'province';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/map/province',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_peta_provinsi(){
		$get_data = $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['checkbox'] =	'
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" name="selected_id[]" value="'.$value->id_provinsi.'"/>
									<span></span>
								</label>
								';
			$isi['number'] = $no++.'.';
			$isi['nm_provinsi'] = $value->nm_provinsi;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =	'
								<div class="btn-group">
									<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li>
											<a href="'.site_url('admin_side/ubah_data_provinsi/'.md5($value->id_provinsi)).'">
												<i class="icon-wrench"></i> Ubah Data </a>
										</li>
										<li>
											<a onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_provinsi/'.md5($value->id_provinsi)).'">
												<i class="icon-trash"></i> Hapus Data </a>
										</li>
									</ul>
								</div>
								';
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	public function add_province()
	{
		$data['parent'] = 'master';
		$data['child'] = 'map';
		$data['grand_child'] = 'province';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/map/add_province',$data);
		$this->load->view('admin/template/footer');
	}
	public function save_province(){
		$this->db->trans_start();
		$file_kml = '';
		$nmfile = "file_".time();
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/peta/';
		$config['allowed_types'] = 'kml';
		$config['max_size'] = '9072';
		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);

		if(isset($_FILES['kml']['name']))
		{
			if(!$this->upload->do_upload('kml'))
			{
				echo'';
			}
			else
			{
				$gbr = $this->upload->data();
				$file_kml = $gbr['file_name'];
			}
		}
		$data_insert = array(
			'nm_provinsi' => $this->input->post('nm_provinsi'),
			'bujur' => $this->input->post('longitude'),
			'lintang' => $this->input->post('latitude'),
			'kml' => $file_kml
		);
		$this->Main_model->insertData("provinsi",$data_insert);

		$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Add province data (".$this->input->post('nm_provinsi').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal disimpan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_data_provinsi'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil disimpan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_provinsi/'</script>";
		}
	}
	public function edit_province()
	{
		$data['parent'] = 'master';
		$data['child'] = 'map';
		$data['grand_child'] = 'province';
		$data['data_utama'] = $this->Main_model->getSelectedData('provinsi a', 'a.*', array('md5(a.id_provinsi)'=>$this->uri->segment(3)))->row();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/map/edit_province',$data);
		$this->load->view('admin/template/footer');
	}
	public function update_province_data(){
		$this->db->trans_start();
		$nmfile = "file_".time();
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/peta/';
		$config['allowed_types'] = 'kml';
		$config['max_size'] = '9072';
		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);

		if(isset($_FILES['kml']['name']))
		{
			if(!$this->upload->do_upload('kml'))
			{
				echo'';
			}
			else
			{
				$gbr = $this->upload->data();
				$this->Main_model->updateData("provinsi",array('kml'=>$gbr['file_name']),array('md5(id_provinsi)'=>$this->input->post('id_provinsi')));
			}
		}
		$data_update = array(
			'nm_provinsi' => $this->input->post('nm_provinsi'),
			'bujur' => $this->input->post('longitude'),
			'lintang' => $this->input->post('latitude')
		);
		$this->Main_model->updateData("provinsi",$data_update,array('md5(id_provinsi)'=>$this->input->post('id_provinsi')));

		$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Update province data (".$this->input->post('nm_provinsi').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_provinsi/".$this->input->post('id_provinsi')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_provinsi/'</script>";
		}
	}
	public function delete_province(){
		$this->db->trans_start();
		$nama_provinsi = '';

		$get_data = $this->Main_model->getSelectedData('provinsi a', 'a.*',array('md5(a.id_provinsi)'=>$this->uri->segment(3)))->row();
		$nama_provinsi = $get_data->nm_provinsi;

		$this->Main_model->deleteData('provinsi',array('md5(id_provinsi)'=>$this->uri->segment(3)));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting province","Delete province (".$nama_provinsi.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_provinsi'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_provinsi'</script>";
		}
	}
	/* Kabupaten/ Kota */
	public function city()
	{
		$data['parent'] = 'master';
		$data['child'] = 'map';
		$data['grand_child'] = 'city';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/map/city',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_peta_kabupaten(){
		$get_data = $this->Main_model->getSelectedData('kabupaten a', 'a.*,b.nm_provinsi','','','','','',array(
			'table' => 'provinsi b',
			'on' => 'a.id_provinsi=b.id_provinsi',
			'pos' => 'left',
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['checkbox'] =	'
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" name="selected_id[]" value="'.$value->id_kabupaten.'"/>
									<span></span>
								</label>
								';
			$isi['number'] = $no++.'.';
			$isi['nm_provinsi'] = $value->nm_provinsi;
			$isi['nm_kabupaten'] = $value->nm_kabupaten;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =	'
								<div class="btn-group">
									<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li>
											<a href="'.site_url('admin_side/ubah_data_kabkot/'.md5($value->id_kabupaten)).'">
												<i class="icon-wrench"></i> Ubah Data </a>
										</li>
										<li>
											<a onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_kabkot/'.md5($value->id_kabupaten)).'">
												<i class="icon-trash"></i> Hapus Data </a>
										</li>
									</ul>
								</div>
								';
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	public function add_city()
	{
		$data['parent'] = 'master';
		$data['child'] = 'map';
		$data['grand_child'] = 'city';
		$data['provinsi'] = $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/map/add_city',$data);
		$this->load->view('admin/template/footer');
	}
	public function save_city(){
		$this->db->trans_start();
		$file_kml = '';
		$nmfile = "file_".time();
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/peta_kabupaten/';
		$config['allowed_types'] = 'kml';
		$config['max_size'] = '9072';
		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);

		if(isset($_FILES['kml']['name']))
		{
			if(!$this->upload->do_upload('kml'))
			{
				echo'';
			}
			else
			{
				$gbr = $this->upload->data();
				$file_kml = $gbr['file_name'];
			}
		}
		$data_insert = array(
			'id_provinsi' => $this->input->post('id_provinsi'),
			'nm_kabupaten' => $this->input->post('nm_kabupaten'),
			'bujur' => $this->input->post('longitude'),
			'lintang' => $this->input->post('latitude'),
			'kml' => $file_kml
		);
		$this->Main_model->insertData("kabupaten",$data_insert);

		$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Add city data (".$this->input->post('nm_kabupaten').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal disimpan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_data_kabkot'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil disimpan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_kabkot/'</script>";
		}
	}
	public function edit_city()
	{
		$data['parent'] = 'master';
		$data['child'] = 'map';
		$data['grand_child'] = 'city';
		$data['provinsi'] = $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$data['data_utama'] = $this->Main_model->getSelectedData('kabupaten a', 'a.*', array('md5(a.id_kabupaten)'=>$this->uri->segment(3)))->row();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/map/edit_city',$data);
		$this->load->view('admin/template/footer');
	}
	public function update_city_data(){
		$this->db->trans_start();
		$nmfile = "file_".time();
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/peta_kabupaten/';
		$config['allowed_types'] = 'kml';
		$config['max_size'] = '9072';
		$config['file_name'] = $nmfile;

		$this->upload->initialize($config);

		if(isset($_FILES['kml']['name']))
		{
			if(!$this->upload->do_upload('kml'))
			{
				echo'';
			}
			else
			{
				$gbr = $this->upload->data();
				$this->Main_model->updateData("kabupaten",array('kml'=>$gbr['file_name']),array('md5(id_kabupaten)'=>$this->input->post('id_kabupaten')));
			}
		}
		$data_update = array(
			'id_provinsi' => $this->input->post('id_provinsi'),
			'nm_kabupaten' => $this->input->post('nm_kabupaten'),
			'bujur' => $this->input->post('longitude'),
			'lintang' => $this->input->post('latitude')
		);
		$this->Main_model->updateData("kabupaten",$data_update,array('md5(id_kabupaten)'=>$this->input->post('id_kabupaten')));

		$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Update city data (".$this->input->post('nm_kabupaten').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_kabkot/".$this->input->post('id_kabupaten')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_kabkot/'</script>";
		}
	}
	public function delete_city(){
		$this->db->trans_start();
		$nama_kabupaten = '';

		$get_data = $this->Main_model->getSelectedData('kabupaten a', 'a.*',array('md5(a.id_kabupaten)'=>$this->uri->segment(3)))->row();
		$nama_kabupaten = $get_data->nm_kabupaten;

		$this->Main_model->deleteData('kabupaten',array('md5(id_kabupaten)'=>$this->uri->segment(3)));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting city","Delete city (".$nama_kabupaten.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_kabkot'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_kabkot'</script>";
		}
	}
	/* Kecamatan */
	public function sub_district()
	{
		$data['parent'] = 'master';
		$data['child'] = 'map';
		$data['grand_child'] = 'sub_district';
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
		$this->load->view('admin/master/map/sub_district',$data);
		$this->load->view('admin/template/footer');
	}
	/* Kelurahan */
	public function village()
	{
		$data['parent'] = 'master';
		$data['child'] = 'map';
		$data['grand_child'] = 'village';
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
		$this->load->view('admin/master/map/village',$data);
		$this->load->view('admin/template/footer');
	}
}
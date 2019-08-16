<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	/* Administrator */
	public function administrator_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'administrator';
		$data['grand_child'] = '';
		// $data['data_tabel'] = $this->Main_model->getSelectedData('kube a', 'a.*', array('a.deleted'=>'0'), "a.fullname ASC")->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/administrator_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function add_administrator_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'administrator';
		$data['grand_child'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/add_administrator_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function save_administrator_data(){
		$this->db->trans_start();
		// do something your code
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_data_admin/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
		}
	}
	public function detail_administrator_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'administrator';
		$data['grand_child'] = '';
		// $data['data_utama'] =  $this->Main_model->getSelectedData('kube a', 'a.*', array('md5(a.user_id)'=>$this->uri->segment(3),'a.deleted'=>'0'))->result();
		// $data['riwayat_pembayaran'] = $this->Main_model->getSelectedData('purchasing a', 'a.*', array('md5(a.user_id)'=>$this->uri->segment(3),'a.deleted'=>'0'))->result();
		// $data['riwayat_kehadiran'] = $this->Main_model->getSelectedData('presence a', 'a.*', array('md5(a.user_id)'=>$this->uri->segment(3)))->result_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/detail_administrator_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function edit_administrator_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'administrator';
		$data['grand_child'] = '';
		// $data['data_utama'] = $this->Main_model->getSelectedData('user a', 'a.*', array('md5(a.user_id)'=>$this->uri->segment(3),'a.deleted'=>'0'))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/edit_administrator_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function update_administrator_data(){
		$this->db->trans_start();
		// do something your code
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_admin/".$this->input->post('user_id')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
		}
	}
	public function reset_password_administrator_account(){
		$this->db->trans_start();
		// do something your code
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
            echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
            echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
		}
	}
	public function delete_administrator_data(){
		$this->db->trans_start();
		// do something your code
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
            echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
            echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
		}
	}
	/* Kube (Kredit Usaha Bersama) */
	public function kube_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'kube';
		$data['grand_child'] = '';
		// $data['data_tabel'] = $this->Main_model->getSelectedData('kube a', 'a.*', array('a.deleted'=>'0'), "a.fullname ASC")->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/kube_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_kube(){
		$get_data = $this->Main_model->getSelectedData('kube a', 'a.*,b.jenis_usaha',array('deleted'=>'0'),'','','','',array(
			'table' => 'jenis_usaha b',
			'on' => 'a.id_jenis_usaha=b.id_jenis_usaha',
			'pos' => 'LEFT',
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
			$isi['number'] = $no++;
			$isi['nama_tim'] = $value->nama_tim;
			$isi['jenis_usaha'] = $value->jenis_usaha;
			$isi['alamat'] = $value->alamat;
			$isi['rencana_anggaran'] = 'Rp '.number_format($value->rencana_anggaran,2);
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =	'
								<div class="btn-group">
									<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li>
											<a href="'.site_url('admin_side/detil_data_kube/'.md5($value->id_kube)).'">
												<i class="icon-eye"></i> Detil Data </a>
										</li>
										<li>
											<a href="'.site_url('admin_side/ubah_data_kube/'.md5($value->id_kube)).'">
												<i class="icon-wrench"></i> Ubah Data </a>
										</li>
										<li>
											<a onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_kube/'.md5($value->id_kube)).'">
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
	public function add_kube_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'kube';
		$data['grand_child'] = '';
		$data['jenis_usaha'] =  $this->Main_model->getSelectedData('jenis_usaha a', 'a.*')->result();
		$data['provinsi'] =  $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/add_kube_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function save_kube_data(){
		$this->db->trans_start();
		$rencana_anggaran = preg_replace("/[^0-9]/", "", $this->input->post('rencana_anggaran'));
		$data_insert = array(
			'id_jenis_usaha' => $this->input->post('id_jenis_usaha'),
			'nama_tim' => $this->input->post('nama_tim'),
			'alamat' => $this->input->post('alamat'),
			'rencana_anggaran' => $rencana_anggaran,
			'id_provinsi' => $this->input->post('id_provinsi'),
			'id_kabupaten' => $this->input->post('id_kabupaten'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			'id_desa' => $this->input->post('id_desa'),
			'created_at' => date('Y-m-d H:i:s'),
			'created_by' => $this->session->userdata('id')
		);
		$this->Main_model->insertData('kube',$data_insert);
		$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Add kube data",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_data_kube/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/kube/'</script>";
		}
	}
	public function detail_kube_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'kube';
		$data['grand_child'] = '';
		// $data['data_utama'] =  $this->Main_model->getSelectedData('kube a', 'a.*', array('md5(a.user_id)'=>$this->uri->segment(3),'a.deleted'=>'0'))->result();
		// $data['riwayat_pembayaran'] = $this->Main_model->getSelectedData('purchasing a', 'a.*', array('md5(a.user_id)'=>$this->uri->segment(3),'a.deleted'=>'0'))->result();
		// $data['riwayat_kehadiran'] = $this->Main_model->getSelectedData('presence a', 'a.*', array('md5(a.user_id)'=>$this->uri->segment(3)))->result_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/detail_kube_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function edit_kube_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'kube';
		$data['grand_child'] = '';
		$data['jenis_usaha'] =  $this->Main_model->getSelectedData('jenis_usaha a', 'a.*')->result();
		$data['provinsi'] =  $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$data['data_utama'] = $this->Main_model->getSelectedData('kube a', 'a.*,b.nm_kabupaten,c.nm_kecamatan,d.nm_desa', array('md5(a.id_kube)'=>$this->uri->segment(3),'a.deleted'=>'0'),'','','','',array(
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
			)
		))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/edit_kube_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function update_kube_data(){
		$this->db->trans_start();
		$rencana_anggaran = preg_replace("/[^0-9]/", "", $this->input->post('rencana_anggaran'));
		$data_update = array(
			'id_jenis_usaha' => $this->input->post('id_jenis_usaha'),
			'nama_tim' => $this->input->post('nama_tim'),
			'alamat' => $this->input->post('alamat'),
			'rencana_anggaran' => $rencana_anggaran,
			'id_provinsi' => $this->input->post('id_provinsi'),
			'id_kabupaten' => $this->input->post('id_kabupaten'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			'id_desa' => $this->input->post('id_desa')
		);
		$this->Main_model->updateData('kube',$data_update,array('md5(id_kube)'=>$this->input->post('id_kube')));
		$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Update kube data",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_kube/".$this->input->post('user_id')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/kube/'</script>";
		}
	}
	public function delete_kube_data(){
		$this->db->trans_start();
		$this->Main_model->updateData('kube',array('deleted'=>'1'),array('md5(id_kube)'=>$this->uri->segment(3)));

		$this->Main_model->log_activity($this->session->userdata('id'),'Deleting data',"Delete kube data",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
            echo "<script>window.location='".base_url()."admin_side/kube/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
            echo "<script>window.location='".base_url()."admin_side/kube/'</script>";
		}
	}
	/* Rutilahu a.k.a Rumah Tidak Layak Huni */
	public function rutilahu_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'rutilahu';
		$data['grand_child'] = '';
		// $data['data_tabel'] = $this->Main_model->getSelectedData('kube a', 'a.*', array('a.deleted'=>'0'), "a.fullname ASC")->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/rutilahu_data',$data);
		$this->load->view('admin/template/footer');
	}
	/* Sarling a.k.a Sarana Lingkungan */
	public function sarling_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'sarling';
		$data['grand_child'] = '';
		// $data['data_tabel'] = $this->Main_model->getSelectedData('kube a', 'a.*', array('a.deleted'=>'0'), "a.fullname ASC")->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/sarling_data',$data);
		$this->load->view('admin/template/footer');
	}
	/* Other Function */
	public function ajax_function(){
		if($this->input->post('modul')=='get_kabupaten_by_id_provinsi'){
			$data = $this->Main_model->getSelectedData('kabupaten a', 'a.*', array('a.id_provinsi'=>$this->input->post('id')))->result();
			echo'<option value=""></option>';
			foreach ($data as $key => $value) {
				echo'<option value="'.$value->id_kabupaten.'">'.$value->nm_kabupaten.'</option>';
			}
		}
		elseif($this->input->post('modul')=='get_kecamatan_by_id_kabupaten'){
			$data = $this->Main_model->getSelectedData('kecamatan a', 'a.*', array('a.id_kabupaten'=>$this->input->post('id')))->result();
			echo'<option value=""></option>';
			foreach ($data as $key => $value) {
				echo'<option value="'.$value->id_kecamatan.'">'.$value->nm_kecamatan.'</option>';
			}
		}
		elseif($this->input->post('modul')=='get_desa_by_id_kecamatan'){
			$data = $this->Main_model->getSelectedData('desa a', 'a.*', array('a.id_kecamatan'=>$this->input->post('id')))->result();
			echo'<option value=""></option>';
			foreach ($data as $key => $value) {
				echo'<option value="'.$value->id_desa.'">'.$value->nm_desa.'</option>';
			}
		}
	}
}
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
	/* Kube (Kelompok Usaha Bersama) */
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
		$get_data = $this->Main_model->getSelectedData('kube a', 'a.*,b.jenis_usaha',array('a.deleted'=>'0'),'','','','',array(
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
			$isi['number'] = $no++.'.';
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
		$data['data_utama'] = $this->Main_model->getSelectedData('kube a', 'a.*,e.jenis_usaha,b.nm_kabupaten,c.nm_kecamatan,d.nm_desa', array('md5(a.id_kube)'=>$this->uri->segment(3),'a.deleted'=>'0'),'','','','',array(
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
			echo "<script>window.location='".base_url()."admin_side/ubah_data_kube/".$this->input->post('id_kube')."'</script>";
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
	public function save_kube_member(){
		$this->db->trans_start();
		$cek = $this->Main_model->getSelectedData('user a', 'a.*',array('a.username'=>$this->input->post('nik')))->result();
		if($cek==NULL){
			$get_user_id = $this->Main_model->getLastID('user','id');

			$data_insert1 = array(
				'id' => $get_user_id['id']+1,
				'username' => $this->input->post('nik'),
				'pass' => $this->input->post('nik'),
				'is_active' => '1',
				'created_by' => $this->session->userdata('id'),
				'created_at' => date('Y-m-d H:i:s')
			);
			$this->Main_model->insertData('user',$data_insert1);

			$data_insert2 = array(
				'user_id' => $get_user_id['id']+1,
				'fullname' => $this->input->post('nama')
			);
			$this->Main_model->insertData('user_profile',$data_insert2);

			$data_insert3 = array(
				'user_id' => $get_user_id['id']+1,
				'role_id' => '2'
			);
			$this->Main_model->insertData('user_to_role',$data_insert3);

			$data_insert4 = array(
				'user_id' => $get_user_id['id']+1,
				'id_kube' => $this->input->post('id_kube'),
				'nama' => $this->input->post('nama'),
				'nik' => $this->input->post('nik'),
				'jabatan_kelompok' => $this->input->post('jabatan_kelompok'),
				'no_kk' => $this->input->post('no_kk')
			);
			$this->Main_model->insertData('anggota_kube',$data_insert4);

			$this->Main_model->log_activity($this->session->userdata('id'),"Adding kube's member","Add kube member (".$this->input->post('nama').")",$this->session->userdata('location'));
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/detil_data_kube/".md5($this->input->post('id_kube'))."'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/detil_data_kube/".md5($this->input->post('id_kube'))."'</script>";
			}
		}else{
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>username telah digunakan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_kube/".md5($this->input->post('id_kube'))."'</script>";
		}
	}
	public function update_kube_member(){
		$this->db->trans_start();

		$data_update1 = array(
			'fullname' => $this->input->post('nama')
		);
		$this->Main_model->updateData('user_profile',$data_update1,array('md5(user_id)'=>$this->input->post('user_id')));

		$data_update2 = array(
			'nama' => $this->input->post('nama'),
			'nik' => $this->input->post('nik'),
			'jabatan_kelompok' => $this->input->post('jabatan_kelompok'),
			'no_kk' => $this->input->post('no_kk')
		);
		$this->Main_model->updateData('anggota_kube',$data_update2,array('md5(id_anggota_kube)'=>$this->input->post('id_anggota_kube')));

		$this->Main_model->log_activity($this->session->userdata('id'),"Updating kube's member","Update kube member (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_kube/".$this->input->post('id_kube')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_kube/".$this->input->post('id_kube')."'</script>";
		}
	}
	public function json_anggota_kube(){
		$get_data = $this->Main_model->getSelectedData('anggota_kube a', 'a.*',array('md5(a.id_kube)'=>$this->input->get('id'),'b.deleted'=>'0'),'','','','',array(
			'table' => 'kube b',
			'on' => 'a.id_kube=b.id_kube',
			'pos' => 'LEFT',
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['number'] = $no++.'.';
			$isi['nama'] = $value->nama;
			$isi['nik'] = $value->nik;
			$isi['jabatan'] = $value->jabatan_kelompok;
			$isi['no_kk'] = $value->no_kk;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =	'
								<div class="btn-group">
									<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li>
											<a class="ubahdata" data-toggle="modal" data-target="#ubahdata" id="'. md5($value->id_anggota_kube).'" data-code="'. md5($value->id_anggota_kube).'">
												<i class="icon-wrench"></i> Ubah Data </a>
										</li>
										<li>
											<a onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_anggota_kube/'.md5($value->id_anggota_kube)).'">
												<i class="icon-trash"></i> Hapus Data </a>
										</li>
										<li class="divider"> </li>
										<li>
											<a href="'.site_url('admin_side/atur_ulang_kata_sandi_anggota_kube/'.md5($value->id_anggota_kube)).'">
												<i class="fa fa-refresh"></i> Atur Ulang Sandi
											</a>
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
	public function reset_password_kube_member_account(){
		$this->db->trans_start();
		$id_kube = '';
		$user_id = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('anggota_kube a', 'a.*',array('md5(a.id_anggota_kube)'=>$this->uri->segment(3)))->row();
		$id_kube = md5($get_data->id_kube);
		$user_id = $get_data->user_id;
		$name = $get_data->nama;

		$this->Main_model->updateData('user',array('pass'=>'1234'),array('id'=>$user_id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Update kube's member data","Reset password kube's member account (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_kube/".$id_kube."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_kube/".$id_kube."'</script>";
		}
	}
	public function delete_kube_member(){
		$this->db->trans_start();
		$id_kube = '';
		$user_id = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('anggota_kube a', 'a.*',array('md5(a.id_anggota_kube)'=>$this->uri->segment(3)))->row();
		$id_kube = md5($get_data->id_kube);
		$user_id = $get_data->user_id;
		$name = $get_data->nama;

		$this->Main_model->deleteData('anggota_kube',array('user_id'=>$user_id));
		$this->Main_model->deleteData('user_profile',array('user_id'=>$user_id));
		$this->Main_model->deleteData('user_to_role',array('user_id'=>$user_id));
		$this->Main_model->deleteData('user',array('id'=>$user_id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting kube's member","Delete kube's member (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_kube/".$id_kube."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_kube/".$id_kube."'</script>";
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
	public function json_rutilahu(){
		$get_data = $this->Main_model->getSelectedData('rutilahu a', 'a.*',array('a.deleted'=>'0'))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['checkbox'] =	'
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" name="selected_id[]" value="'.$value->id_rutilahu.'"/>
									<span></span>
								</label>
								';
			$isi['number'] = $no++.'.';
			$isi['nama_tim'] = $value->nama_kelompok;
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
											<a href="'.site_url('admin_side/detil_data_rutilahu/'.md5($value->id_rutilahu)).'">
												<i class="icon-eye"></i> Detil Data </a>
										</li>
										<li>
											<a href="'.site_url('admin_side/ubah_data_rutilahu/'.md5($value->id_rutilahu)).'">
												<i class="icon-wrench"></i> Ubah Data </a>
										</li>
										<li>
											<a onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_rutilahu/'.md5($value->id_rutilahu)).'">
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
	public function add_rutilahu_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'rutilahu';
		$data['grand_child'] = '';
		$data['provinsi'] =  $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/add_rutilahu_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function save_rutilahu_data(){
		$this->db->trans_start();
		$rencana_anggaran = preg_replace("/[^0-9]/", "", $this->input->post('rencana_anggaran'));
		$data_insert = array(
			'nama_kelompok' => $this->input->post('nama_tim'),
			'alamat' => $this->input->post('alamat'),
			'rencana_anggaran' => $rencana_anggaran,
			'id_provinsi' => $this->input->post('id_provinsi'),
			'id_kabupaten' => $this->input->post('id_kabupaten'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			'id_desa' => $this->input->post('id_desa'),
			'created_at' => date('Y-m-d H:i:s'),
			'created_by' => $this->session->userdata('id')
		);
		$this->Main_model->insertData('rutilahu',$data_insert);
		$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Add rutilahu data",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_data_rutilahu/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/rutilahu/'</script>";
		}
	}
	public function detail_rutilahu_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'rutilahu';
		$data['grand_child'] = '';
		$data['data_utama'] = $this->Main_model->getSelectedData('rutilahu a', 'a.*,b.nm_kabupaten,c.nm_kecamatan,d.nm_desa', array('md5(a.id_rutilahu)'=>$this->uri->segment(3),'a.deleted'=>'0'),'','','','',array(
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
		$this->load->view('admin/master/detail_rutilahu_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function edit_rutilahu_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'rutilahu';
		$data['grand_child'] = '';
		$data['provinsi'] =  $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$data['data_utama'] = $this->Main_model->getSelectedData('rutilahu a', 'a.*,b.nm_kabupaten,c.nm_kecamatan,d.nm_desa', array('md5(a.id_rutilahu)'=>$this->uri->segment(3),'a.deleted'=>'0'),'','','','',array(
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
		$this->load->view('admin/master/edit_rutilahu_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function update_rutilahu_data(){
		$this->db->trans_start();
		$rencana_anggaran = preg_replace("/[^0-9]/", "", $this->input->post('rencana_anggaran'));
		$data_update = array(
			'nama_kelompok' => $this->input->post('nama_tim'),
			'alamat' => $this->input->post('alamat'),
			'rencana_anggaran' => $rencana_anggaran,
			'id_provinsi' => $this->input->post('id_provinsi'),
			'id_kabupaten' => $this->input->post('id_kabupaten'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			'id_desa' => $this->input->post('id_desa')
		);
		$this->Main_model->updateData('rutilahu',$data_update,array('md5(id_rutilahu)'=>$this->input->post('id_rutilahu')));
		$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Update rutilahu data",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_rutilahu/".$this->input->post('id_rutilahu')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/rutilahu/'</script>";
		}
	}
	public function delete_rutilahu_data(){
		$this->db->trans_start();
		$this->Main_model->updateData('rutilahu',array('deleted'=>'1'),array('md5(id_rutilahu)'=>$this->uri->segment(3)));

		$this->Main_model->log_activity($this->session->userdata('id'),'Deleting data',"Delete rutilahu data",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/rutilahu/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/rutilahu/'</script>";
		}
	}
	public function save_rutilahu_member(){
		$this->db->trans_start();
		$cek = $this->Main_model->getSelectedData('user a', 'a.*',array('a.username'=>$this->input->post('nik')))->result();
		if($cek==NULL){
			$get_user_id = $this->Main_model->getLastID('user','id');

			$data_insert1 = array(
				'id' => $get_user_id['id']+1,
				'username' => $this->input->post('nik'),
				'pass' => $this->input->post('nik'),
				'is_active' => '1',
				'created_by' => $this->session->userdata('id'),
				'created_at' => date('Y-m-d H:i:s')
			);
			$this->Main_model->insertData('user',$data_insert1);

			$data_insert2 = array(
				'user_id' => $get_user_id['id']+1,
				'fullname' => $this->input->post('nama')
			);
			$this->Main_model->insertData('user_profile',$data_insert2);

			$data_insert3 = array(
				'user_id' => $get_user_id['id']+1,
				'role_id' => '3'
			);
			$this->Main_model->insertData('user_to_role',$data_insert3);

			$data_insert4 = array(
				'user_id' => $get_user_id['id']+1,
				'id_rutilahu' => $this->input->post('id_rutilahu'),
				'nama' => $this->input->post('nama'),
				'nik' => $this->input->post('nik'),
				'jabatan_kelompok' => $this->input->post('jabatan_kelompok'),
				'no_kk' => $this->input->post('no_kk')
			);
			$this->Main_model->insertData('anggota_rutilahu',$data_insert4);

			$this->Main_model->log_activity($this->session->userdata('id'),"Adding rutilahu's member","Add rutilahu member (".$this->input->post('nama').")",$this->session->userdata('location'));
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/detil_data_rutilahu/".md5($this->input->post('id_rutilahu'))."'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/detil_data_rutilahu/".md5($this->input->post('id_rutilahu'))."'</script>";
			}
		}else{
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>username telah digunakan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_rutilahu/".md5($this->input->post('id_rutilahu'))."'</script>";
		}
	}
	public function update_rutilahu_member(){
		$this->db->trans_start();

		$data_update1 = array(
			'fullname' => $this->input->post('nama')
		);
		$this->Main_model->updateData('user_profile',$data_update1,array('md5(user_id)'=>$this->input->post('user_id')));

		$data_update2 = array(
			'nama' => $this->input->post('nama'),
			'nik' => $this->input->post('nik'),
			'jabatan_kelompok' => $this->input->post('jabatan_kelompok'),
			'no_kk' => $this->input->post('no_kk')
		);
		$this->Main_model->updateData('anggota_rutilahu',$data_update2,array('md5(id_anggota_rutilahu)'=>$this->input->post('id_anggota_rutilahu')));

		$this->Main_model->log_activity($this->session->userdata('id'),"Updating rutilahu's member","Update rutilahu member (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_rutilahu/".$this->input->post('id_rutilahu')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_rutilahu/".$this->input->post('id_rutilahu')."'</script>";
		}
	}
	public function json_anggota_rutilahu(){
		$get_data = $this->Main_model->getSelectedData('anggota_rutilahu a', 'a.*',array('md5(a.id_rutilahu)'=>$this->input->get('id'),'b.deleted'=>'0'),'','','','',array(
			'table' => 'rutilahu b',
			'on' => 'a.id_rutilahu=b.id_rutilahu',
			'pos' => 'LEFT',
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['number'] = $no++.'.';
			$isi['nama'] = $value->nama;
			$isi['nik'] = $value->nik;
			$isi['jabatan'] = $value->jabatan_kelompok;
			$isi['no_kk'] = $value->no_kk;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =	'
								<div class="btn-group">
									<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li>
											<a class="ubahdata" data-toggle="modal" data-target="#ubahdata" id="'. md5($value->id_anggota_rutilahu).'" data-code="'. md5($value->id_anggota_rutilahu).'">
												<i class="icon-wrench"></i> Ubah Data </a>
										</li>
										<li>
											<a onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_anggota_rutilahu/'.md5($value->id_anggota_rutilahu)).'">
												<i class="icon-trash"></i> Hapus Data </a>
										</li>
										<li class="divider"> </li>
										<li>
											<a href="'.site_url('admin_side/atur_ulang_kata_sandi_anggota_rutilahu/'.md5($value->id_anggota_rutilahu)).'">
												<i class="fa fa-refresh"></i> Atur Ulang Sandi
											</a>
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
	public function reset_password_rutilahu_member_account(){
		$this->db->trans_start();
		$id_rutilahu = '';
		$user_id = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('anggota_rutilahu a', 'a.*',array('md5(a.id_anggota_rutilahu)'=>$this->uri->segment(3)))->row();
		$id_rutilahu = md5($get_data->id_rutilahu);
		$user_id = $get_data->user_id;
		$name = $get_data->nama;

		$this->Main_model->updateData('user',array('pass'=>'1234'),array('id'=>$user_id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Update rutilahu's member data","Reset password rutilahu's member account (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_rutilahu/".$id_rutilahu."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_rutilahu/".$id_rutilahu."'</script>";
		}
	}
	public function delete_rutilahu_member(){
		$this->db->trans_start();
		$id_rutilahu = '';
		$user_id = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('anggota_rutilahu a', 'a.*',array('md5(a.id_anggota_rutilahu)'=>$this->uri->segment(3)))->row();
		$id_rutilahu = md5($get_data->id_rutilahu);
		$user_id = $get_data->user_id;
		$name = $get_data->nama;

		$this->Main_model->deleteData('anggota_rutilahu',array('user_id'=>$user_id));
		$this->Main_model->deleteData('user_profile',array('user_id'=>$user_id));
		$this->Main_model->deleteData('user_to_role',array('user_id'=>$user_id));
		$this->Main_model->deleteData('user',array('id'=>$user_id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting rutilahu's member","Delete rutilahu's member (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_rutilahu/".$id_rutilahu."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_rutilahu/".$id_rutilahu."'</script>";
		}
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
	public function json_sarling(){
		$get_data = $this->Main_model->getSelectedData('sarling a', 'a.*,b.jenis_sarling',array('a.deleted'=>'0'),'','','','',array(
			'table' => 'jenis_sarling b',
			'on' => 'a.id_jenis_sarling=b.id_jenis_sarling',
			'pos' => 'LEFT',
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['checkbox'] =	'
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" name="selected_id[]" value="'.$value->id_sarling.'"/>
									<span></span>
								</label>
								';
			$isi['number'] = $no++.'.';
			$isi['nama_tim'] = $value->nama_tim;
			$isi['jenis_sarling'] = $value->jenis_sarling;
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
											<a href="'.site_url('admin_side/detil_data_sarling/'.md5($value->id_sarling)).'">
												<i class="icon-eye"></i> Detil Data </a>
										</li>
										<li>
											<a href="'.site_url('admin_side/ubah_data_sarling/'.md5($value->id_sarling)).'">
												<i class="icon-wrench"></i> Ubah Data </a>
										</li>
										<li>
											<a onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_sarling/'.md5($value->id_sarling)).'">
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
	public function add_sarling_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'sarling';
		$data['grand_child'] = '';
		$data['jenis_sarling'] =  $this->Main_model->getSelectedData('jenis_sarling a', 'a.*')->result();
		$data['provinsi'] =  $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/add_sarling_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function save_sarling_data(){
		$this->db->trans_start();
		$rencana_anggaran = preg_replace("/[^0-9]/", "", $this->input->post('rencana_anggaran'));
		$data_insert = array(
			'id_jenis_sarling' => $this->input->post('id_jenis_sarling'),
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
		$this->Main_model->insertData('sarling',$data_insert);
		$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Add sarling data",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_data_sarling/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/sarling/'</script>";
		}
	}
	public function detail_sarling_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'sarling';
		$data['grand_child'] = '';
		$data['data_utama'] = $this->Main_model->getSelectedData('sarling a', 'a.*,e.jenis_sarling,b.nm_kabupaten,c.nm_kecamatan,d.nm_desa', array('md5(a.id_sarling)'=>$this->uri->segment(3),'a.deleted'=>'0'),'','','','',array(
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
				'table' => 'jenis_sarling e',
				'on' => 'a.id_jenis_sarling=e.id_jenis_sarling',
				'pos' => 'left',
			)
		))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/detail_sarling_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function edit_sarling_data()
	{
		$data['parent'] = 'master';
		$data['child'] = 'sarling';
		$data['grand_child'] = '';
		$data['jenis_sarling'] =  $this->Main_model->getSelectedData('jenis_sarling a', 'a.*')->result();
		$data['provinsi'] =  $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		$data['data_utama'] = $this->Main_model->getSelectedData('sarling a', 'a.*,b.nm_kabupaten,c.nm_kecamatan,d.nm_desa', array('md5(a.id_sarling)'=>$this->uri->segment(3),'a.deleted'=>'0'),'','','','',array(
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
		$this->load->view('admin/master/edit_sarling_data',$data);
		$this->load->view('admin/template/footer');
	}
	public function update_sarling_data(){
		$this->db->trans_start();
		$rencana_anggaran = preg_replace("/[^0-9]/", "", $this->input->post('rencana_anggaran'));
		$data_update = array(
			'id_jenis_sarling' => $this->input->post('id_jenis_sarling'),
			'nama_tim' => $this->input->post('nama_tim'),
			'alamat' => $this->input->post('alamat'),
			'rencana_anggaran' => $rencana_anggaran,
			'id_provinsi' => $this->input->post('id_provinsi'),
			'id_kabupaten' => $this->input->post('id_kabupaten'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			'id_desa' => $this->input->post('id_desa')
		);
		$this->Main_model->updateData('sarling',$data_update,array('md5(id_sarling)'=>$this->input->post('id_sarling')));
		$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Update sarling data",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/ubah_data_sarling/".$this->input->post('id_sarling')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/sarling/'</script>";
		}
	}
	public function delete_sarling_data(){
		$this->db->trans_start();
		$this->Main_model->updateData('sarling',array('deleted'=>'1'),array('md5(id_sarling)'=>$this->uri->segment(3)));

		$this->Main_model->log_activity($this->session->userdata('id'),'Deleting data',"Delete sarling data",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/sarling/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/sarling/'</script>";
		}
	}
	public function save_sarling_member(){
		$this->db->trans_start();
		$cek = $this->Main_model->getSelectedData('user a', 'a.*',array('a.username'=>$this->input->post('nik')))->result();
		if($cek==NULL){
			$get_user_id = $this->Main_model->getLastID('user','id');

			$data_insert1 = array(
				'id' => $get_user_id['id']+1,
				'username' => $this->input->post('nik'),
				'pass' => $this->input->post('nik'),
				'is_active' => '1',
				'created_by' => $this->session->userdata('id'),
				'created_at' => date('Y-m-d H:i:s')
			);
			$this->Main_model->insertData('user',$data_insert1);

			$data_insert2 = array(
				'user_id' => $get_user_id['id']+1,
				'fullname' => $this->input->post('nama')
			);
			$this->Main_model->insertData('user_profile',$data_insert2);

			$data_insert3 = array(
				'user_id' => $get_user_id['id']+1,
				'role_id' => '4'
			);
			$this->Main_model->insertData('user_to_role',$data_insert3);

			$data_insert4 = array(
				'user_id' => $get_user_id['id']+1,
				'id_sarling' => $this->input->post('id_sarling'),
				'nama' => $this->input->post('nama'),
				'nik' => $this->input->post('nik'),
				'jabatan_kelompok' => $this->input->post('jabatan_kelompok'),
				'jabatan_masyarakat' => $this->input->post('jabatan_masyarakat')
			);
			$this->Main_model->insertData('anggota_sarling',$data_insert4);

			$this->Main_model->log_activity($this->session->userdata('id'),"Adding sarling's member","Add sarling member (".$this->input->post('nama').")",$this->session->userdata('location'));
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/detil_data_sarling/".md5($this->input->post('id_sarling'))."'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/detil_data_sarling/".md5($this->input->post('id_sarling'))."'</script>";
			}
		}else{
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>username telah digunakan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_sarling/".md5($this->input->post('id_sarling'))."'</script>";
		}
	}
	public function update_sarling_member(){
		$this->db->trans_start();

		$data_update1 = array(
			'fullname' => $this->input->post('nama')
		);
		$this->Main_model->updateData('user_profile',$data_update1,array('md5(user_id)'=>$this->input->post('user_id')));

		$data_update2 = array(
			'nama' => $this->input->post('nama'),
			'nik' => $this->input->post('nik'),
			'jabatan_kelompok' => $this->input->post('jabatan_kelompok'),
			'jabatan_masyarakat' => $this->input->post('jabatan_masyarakat')
		);
		$this->Main_model->updateData('anggota_sarling',$data_update2,array('md5(id_anggota_sarling)'=>$this->input->post('id_anggota_sarling')));

		$this->Main_model->log_activity($this->session->userdata('id'),"Updating sarling's member","Update sarling member (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_sarling/".$this->input->post('id_sarling')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_sarling/".$this->input->post('id_sarling')."'</script>";
		}
	}
	public function json_anggota_sarling(){
		$get_data = $this->Main_model->getSelectedData('anggota_sarling a', 'a.*',array('md5(a.id_sarling)'=>$this->input->get('id'),'b.deleted'=>'0'),'','','','',array(
			'table' => 'sarling b',
			'on' => 'a.id_sarling=b.id_sarling',
			'pos' => 'LEFT',
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['number'] = $no++.'.';
			$isi['nama'] = $value->nama;
			$isi['nik'] = $value->nik;
			$isi['jabatan'] = $value->jabatan_kelompok;
			$isi['jabatan_masyarakat'] = $value->jabatan_masyarakat;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =	'
								<div class="btn-group">
									<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li>
											<a class="ubahdata" data-toggle="modal" data-target="#ubahdata" id="'. md5($value->id_anggota_sarling).'" data-code="'. md5($value->id_anggota_sarling).'">
												<i class="icon-wrench"></i> Ubah Data </a>
										</li>
										<li>
											<a onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_anggota_sarling/'.md5($value->id_anggota_sarling)).'">
												<i class="icon-trash"></i> Hapus Data </a>
										</li>
										<li class="divider"> </li>
										<li>
											<a href="'.site_url('admin_side/atur_ulang_kata_sandi_anggota_sarling/'.md5($value->id_anggota_sarling)).'">
												<i class="fa fa-refresh"></i> Atur Ulang Sandi
											</a>
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
	public function reset_password_sarling_member_account(){
		$this->db->trans_start();
		$id_sarling = '';
		$user_id = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('anggota_sarling a', 'a.*',array('md5(a.id_anggota_sarling)'=>$this->uri->segment(3)))->row();
		$id_sarling = md5($get_data->id_sarling);
		$user_id = $get_data->user_id;
		$name = $get_data->nama;

		$this->Main_model->updateData('user',array('pass'=>'1234'),array('id'=>$user_id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Update sarling's member data","Reset password sarling's member account (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_sarling/".$id_sarling."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_sarling/".$id_sarling."'</script>";
		}
	}
	public function delete_sarling_member(){
		$this->db->trans_start();
		$id_sarling = '';
		$user_id = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('anggota_sarling a', 'a.*',array('md5(a.id_anggota_sarling)'=>$this->uri->segment(3)))->row();
		$id_sarling = md5($get_data->id_sarling);
		$user_id = $get_data->user_id;
		$name = $get_data->nama;

		$this->Main_model->deleteData('anggota_sarling',array('user_id'=>$user_id));
		$this->Main_model->deleteData('user_profile',array('user_id'=>$user_id));
		$this->Main_model->deleteData('user_to_role',array('user_id'=>$user_id));
		$this->Main_model->deleteData('user',array('id'=>$user_id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting sarling's member","Delete sarling's member (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_sarling/".$id_sarling."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detil_data_sarling/".$id_sarling."'</script>";
		}
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
		elseif($this->input->post('modul')=='modul_ubah_data_anggota_kube'){
			$data = $this->Main_model->getSelectedData('anggota_kube a', 'a.*', array('md5(a.id_anggota_kube)'=>$this->input->post('id')))->row();
			echo'
			<form role="form" class="form-horizontal" action="'.base_url('admin_side/perbarui_data_anggota_kube').'" method="post" >
				<input type="hidden" name="id_anggota_kube" value="'.md5($data->id_anggota_kube).'">
				<input type="hidden" name="user_id" value="'.md5($data->user_id).'">
				<input type="hidden" name="id_kube" value="'.md5($data->id_kube).'">
				<div class="form-body">
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-3 control-label" for="form_control_1">Nama Lengkap <span class="required"> * </span></label>
						<div class="col-md-9">
							<div class="input-icon">
								<input type="text" class="form-control" name="nama" value="'.$data->nama.'" required>
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="fa fa-user"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-3 control-label" for="form_control_1">NIK (Nomor Induk Kependudukan) <span class="required"> * </span></label>
						<div class="col-md-9">
							<div class="input-icon">
								<input type="text" class="form-control" name="nik" value="'.$data->nik.'" required>
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="fa fa-credit-card"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-3 control-label" for="form_control_1">Jabatan Kelompok <span class="required"> * </span></label>
						<div class="col-md-9">
							<div class="input-icon">
								<input type="text" class="form-control" name="jabatan_kelompok" value="'.$data->jabatan_kelompok.'" required>
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="icon-badge"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-3 control-label" for="form_control_1">Nomor KK <span class="required"> * </span></label>
						<div class="col-md-9">
							<div class="input-icon">
								<input type="text" class="form-control" name="no_kk" value="'.$data->no_kk.'" required>
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="fa fa-credit-card"></i>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="form-actions margin-top-9">
					<div class="row">
						<div class="col-md-offset-3 col-md-9">
							<button type="reset" class="btn default">Batal</button>
							<button type="submit" class="btn blue">Perbarui</button>
						</div>
					</div>
				</div>
			</form>
			';
		}
		elseif($this->input->post('modul')=='modul_ubah_data_anggota_rutilahu'){
			$data = $this->Main_model->getSelectedData('anggota_rutilahu a', 'a.*', array('md5(a.id_anggota_rutilahu)'=>$this->input->post('id')))->row();
			echo'
			<form role="form" class="form-horizontal" action="'.base_url('admin_side/perbarui_data_anggota_rutilahu').'" method="post" >
				<input type="hidden" name="id_anggota_rutilahu" value="'.md5($data->id_anggota_rutilahu).'">
				<input type="hidden" name="user_id" value="'.md5($data->user_id).'">
				<input type="hidden" name="id_rutilahu" value="'.md5($data->id_rutilahu).'">
				<div class="form-body">
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-3 control-label" for="form_control_1">Nama Lengkap <span class="required"> * </span></label>
						<div class="col-md-9">
							<div class="input-icon">
								<input type="text" class="form-control" name="nama" value="'.$data->nama.'" required>
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="fa fa-user"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-3 control-label" for="form_control_1">NIK (Nomor Induk Kependudukan) <span class="required"> * </span></label>
						<div class="col-md-9">
							<div class="input-icon">
								<input type="text" class="form-control" name="nik" value="'.$data->nik.'" required>
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="fa fa-credit-card"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-3 control-label" for="form_control_1">Jabatan Kelompok <span class="required"> * </span></label>
						<div class="col-md-9">
							<div class="input-icon">
								<input type="text" class="form-control" name="jabatan_kelompok" value="'.$data->jabatan_kelompok.'" required>
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="icon-badge"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-3 control-label" for="form_control_1">Nomor KK <span class="required"> * </span></label>
						<div class="col-md-9">
							<div class="input-icon">
								<input type="text" class="form-control" name="no_kk" value="'.$data->no_kk.'" required>
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="fa fa-credit-card"></i>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="form-actions margin-top-9">
					<div class="row">
						<div class="col-md-offset-3 col-md-9">
							<button type="reset" class="btn default">Batal</button>
							<button type="submit" class="btn blue">Perbarui</button>
						</div>
					</div>
				</div>
			</form>
			';
		}
		elseif($this->input->post('modul')=='modul_ubah_data_anggota_sarling'){
			$data = $this->Main_model->getSelectedData('anggota_sarling a', 'a.*', array('md5(a.id_anggota_sarling)'=>$this->input->post('id')))->row();
			echo'
			<form role="form" class="form-horizontal" action="'.base_url('admin_side/perbarui_data_anggota_sarling').'" method="post" >
				<input type="hidden" name="id_anggota_sarling" value="'.md5($data->id_anggota_sarling).'">
				<input type="hidden" name="user_id" value="'.md5($data->user_id).'">
				<input type="hidden" name="id_sarling" value="'.md5($data->id_sarling).'">
				<div class="form-body">
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-3 control-label" for="form_control_1">Nama Lengkap <span class="required"> * </span></label>
						<div class="col-md-9">
							<div class="input-icon">
								<input type="text" class="form-control" name="nama" value="'.$data->nama.'" required>
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="fa fa-user"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-3 control-label" for="form_control_1">NIK (Nomor Induk Kependudukan) <span class="required"> * </span></label>
						<div class="col-md-9">
							<div class="input-icon">
								<input type="text" class="form-control" name="nik" value="'.$data->nik.'" required>
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="fa fa-credit-card"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-3 control-label" for="form_control_1">Jabatan Tim <span class="required"> * </span></label>
						<div class="col-md-9">
							<div class="input-icon">
								<input type="text" class="form-control" name="jabatan_kelompok" value="'.$data->jabatan_kelompok.'" required>
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="icon-badge"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-md-line-input has-danger">
						<label class="col-md-3 control-label" for="form_control_1">Jabatan di Masyarakat <span class="required"> * </span></label>
						<div class="col-md-9">
							<div class="input-icon">
								<input type="text" class="form-control" name="jabatan_masyarakat" value="'.$data->jabatan_masyarakat.'" required>
								<div class="form-control-focus"> </div>
								<span class="help-block">Some help goes here...</span>
								<i class="icon-badge"></i>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="form-actions margin-top-9">
					<div class="row">
						<div class="col-md-offset-3 col-md-9">
							<button type="reset" class="btn default">Batal</button>
							<button type="submit" class="btn blue">Perbarui</button>
						</div>
					</div>
				</div>
			</form>
			';
		}
	}
}
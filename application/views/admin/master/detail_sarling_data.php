<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<style media="all" type="text/css">
    .alignCenter { text-align: center; }
</style>
<ul class="page-breadcrumb breadcrumb">
	<li>
		<span>Master</span>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<span><a href='<?= site_url('/admin_side/sarling'); ?>'>Data Sarling (Sarana Lingkungan)</a></span>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<span>Detil Data</span>
	</li>
</ul>
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<?php
$id_sarling = '';
?>
<div class="page-content-inner">
	<div class="m-heading-1 border-green m-bordered">
		<h3>Catatan</h3>
		<p> 1. Ketika mengklik <b>Atur Ulang Sandi</b>, maka kata sandi otomatis menjadi "<b>1234</b>"</p>
		<p> 2. Untuk <b>username</b> dan <b>password</b> dari anggota baru diambil dari isian <b>NIK</b>.</p>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light ">
				<div class="portlet-body">
					<div class='row'>
						<?php
						if(isset($data_utama)){
							foreach($data_utama as $row)
							{
								$id_sarling = $row->id_sarling;
						?>
								<div class="col-md-6">
									<table class="table">
										<tbody>
											<tr>
												<td> Jenis Sarling </td>
												<td> : </td>
												<td><?php echo $row->jenis_sarling; ?></td>
											</tr>
											<tr>
												<td> Nama Tim </td>
												<td> : </td>
												<td><?php echo $row->nama_tim; ?></td>
											</tr>
											<tr>
												<td> Alamat Sarling </td>
												<td> : </td>
												<td><?php echo $row->alamat; ?></td>
											</tr>
											<tr>
												<td> Rencana Anggaran </td>
												<td> : </td>
												<td><?php echo 'Rp '.number_format($row->rencana_anggaran,2); ?></td>
											</tr>
											<tr>
												<td> </td>
												<td> </td>
												<td> </td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<table class="table">
										<tbody>
											<tr>
												<td> Provinsi </td>
												<td> : </td>
												<td><?php echo $row->nm_provinsi; ?></td>
											</tr>
											<tr>
												<td> Kabupaten/ Kota </td>
												<td> : </td>
												<td><?php echo $row->nm_kabupaten; ?></td>
											</tr>
											<tr>
												<td> Kecamatan </td>
												<td> : </td>
												<td><?php echo $row->nm_kecamatan; ?></td>
											</tr>
											<tr>
												<td> Kelurahan/ Desa </td>
												<td> : </td>
												<td><?php echo $row->nm_desa; ?></td>
											</tr>
											<tr>
												<td> </td>
												<td> </td>
												<td> </td>
											</tr>
										</tbody>
									</table>
								</div>
						<?php }} ?>
						<div class="col-md-12" >
							<div class="tabbable-line">
								<ul class="nav nav-tabs ">
									<li class="active">
										<a href="#tab_15_1" data-toggle="tab"> Data Anggota </a>
									</li>
									<li>
										<a href="#tab_15_2" data-toggle="tab"> Laporan Penggunaan Dana </a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_15_1">
										<div class="table-toolbar">
											<div class="row">
												<div class="col-md-6">
													<a data-toggle="modal" data-target="#tambahdataanggota" class="btn green uppercase">Tambah Data <i class="fa fa-plus"></i> </a>
												</div>
											</div>
										</div>
										<table class="table table-striped table-bordered" id="tbl1">
											<thead>
												<tr>
													<th style="text-align: center;" width="4%"> # </th>
													<th style="text-align: center;"> Nama </th>
													<th style="text-align: center;"> NIK </th>
													<th style="text-align: center;"> Jabatan Tim </th>
													<th style="text-align: center;"> Jabatan di Masyarakat </th>
													<th style="text-align: center;" width="7%"> Aksi </th>
												</tr>
											</thead>
										</table>
									</div>
									<div class="tab-pane" id="tab_15_2">
										<table class="table table-striped table-bordered" id="tbl2">
											<thead>
												<tr>
													<th style="text-align: center;" width="4%"> # </th>
													<th style="text-align: center;"> Indikator </th>
													<th style="text-align: center;"> Fisik </th>
													<th style="text-align: center;"> Persentase Fisik </th>
													<th style="text-align: center;"> Keuangan </th>
													<th style="text-align: center;"> Persentase Keuangan </th>
													<th style="text-align: center;" width="7%"> Aksi </th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12" >
						<hr><a href="<?php echo base_url()."admin_side/sarling"; ?>" class="btn btn-info" role="button"><i class="fa fa-angle-double-left"></i> Kembali</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="tambahdataanggota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Form Tambah Data Anggota</h4>
				</div>
				<div class="modal-body">
					<div class="box box-primary">
						<form role="form" class="form-horizontal" action="<?=base_url('admin_side/simpan_data_anggota_sarling');?>" method="post"  enctype='multipart/form-data'>
							<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
							<input type="hidden" name="id_sarling" value="<?= $id_sarling; ?>">
							<div class="form-body">
								<div class="form-group form-md-line-input has-danger">
									<label class="col-md-3 control-label" for="form_control_1">Nama Lengkap <span class="required"> * </span></label>
									<div class="col-md-9">
										<div class="input-icon">
											<input type="text" class="form-control" name="nama" placeholder="Type something" required>
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
											<input type="text" class="form-control" name="nik" placeholder="Type something" required>
											<div class="form-control-focus"> </div>
											<span class="help-block">Some help goes here...</span>
											<i class="fa fa-credit-card"></i>
										</div>
									</div>
								</div>
								<div class="form-group form-md-line-input has-danger">
									<label class="col-md-3 control-label" for="form_control_1">BDT <span class="required"> * </span></label>
									<div class="col-md-9">
										<div class="input-icon">
											<input type="text" class="form-control" name="bdt" placeholder="Type something" required>
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
											<input type="text" class="form-control" name="jabatan_kelompok" placeholder="Type something" required>
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
											<input type="text" class="form-control" name="jabatan_masyarakat" placeholder="Type something" required>
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
										<button type="submit" class="btn blue">Simpan</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="ubahdata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Form Ubah Data</h4>
				</div>
				<div class="modal-body">
					<div class="box box-primary" id='formubahdata' >
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" language="javascript" >
		$(document).ready(function(){
			$('#tbl1').dataTable({
				"order": [[ 0, "asc" ]],
				"bProcessing": true,
				"ajax" : {
					url:"<?= site_url('admin/Master/json_anggota_sarling'); ?>",
					data: {id: '<?= $this->uri->segment(3); ?>'}
				},
				"aoColumns": [
							{ mData: 'number', sClass: "alignCenter" },
							{ mData: 'nama' },
							{ mData: 'nik', sClass: "alignCenter" },
							{ mData: 'jabatan', sClass: "alignCenter" },
							{ mData: 'jabatan_masyarakat', sClass: "alignCenter" } ,
							{ mData: 'action' }
						]
			});
			$('#tbl1').on('click','.ubahdata',function(){
				var id = $(this).attr("id");
				var modul = 'modul_ubah_data_anggota_sarling';
				var nilai_token = '<?php echo $this->security->get_csrf_hash();?>';
				$.ajax({
					type:"POST",
					url:"<?= site_url('admin/Master/ajax_function'); ?>",
					data: {id:id,modul:modul,<?php echo $this->security->get_csrf_token_name();?>:nilai_token},
					success:function(data){
					$('#formubahdata').html(data);
					$('#ubahdata').modal("show");
					}
				});
			});
		});
	</script>
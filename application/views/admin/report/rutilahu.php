<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">

	$(function(){

		$.ajaxSetup({
			type:"POST",
			url: "<?php echo site_url('/admin/Master/ajax_function')?>",
			cache: false,
		});

		$("#id_provinsi").change(function(){
			var value=$(this).val();
			$.ajax({
				data:{id:value,modul:'get_kabupaten_by_id_provinsi'},
				success: function(respond){
					$("#id_kabupaten").html(respond);
				}
			})
		});

		$("#id_provinsi2").change(function(){
			var value=$(this).val();
			$.ajax({
				data:{id:value,modul:'get_kabupaten_by_id_provinsi'},
				success: function(respond){
					$("#id_kabupaten2").html(respond);
				}
			})
		});

	})

</script>
<style media="all" type="text/css">
    .alignCenter { text-align: center; }
</style>
<ul class="page-breadcrumb breadcrumb">
	<li>
		<span>Laporan</span>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<span>Data Rutilahu (Rumah Tidak Layak Huni)</span>
	</li>
</ul>
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="page-content-inner">
	<div class="m-heading-1 border-yellow m-bordered" style="background-color:#FAD405;">
		<h3>Catatan</h3>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light ">
				<div class="portlet-body">
					<div class="col-md-12">
						<form method='post' action='<?=site_url('admin_side/laporan_rutilahu');?>'>
							<div class="form-group select2-bootstrap-prepend" >
								<label class="control-label col-md-3">Opsi pencarian berdasarkan wilayah</label>
								<div class="col-md-3">
									<select id='id_provinsi' name='id_provinsi' class="form-control" required>
										<option value="">-- Pilih Provinsi --</option>
										<?php
										foreach ($provinsi as $key => $value) {
											echo '<option value="'.$value->id_provinsi.'">'.$value->nm_provinsi.'</option>';
										}
										?>
									</select>
								</div>
								<div class="col-md-4">
									<select id='id_kabupaten' name='id_kabupaten' class="form-control">
										<option value="">-- Pilih Kabupaten/ Kota --</option>
									</select>
								</div>
								<div class="col-md-2">
									<button type="submit" class="btn btn-danger">Proses</button>
								</div>
							</div>
						</form>
					</div>
					<br>
					<br>
					<hr>
					<form action="#" method="post" onsubmit="return deleteConfirm();"/>
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-8">
								<div class="btn-group">
									<!-- <button type='submit' id="sample_editable_1_new" class="btn sbold red"> Hapus
										<i class="fa fa-trash"></i>
									</button> -->
								</div>
									<!-- <span class="separator">|</span> -->
									<a href="<?=base_url('admin_side/tambah_laporan_rutilahu');?>" class="btn green uppercase">Tambah Data <i class="fa fa-plus"></i> </a>
							</div>
							<div class="col-md-4" style='text-align: right;'>
								<a href="#" class="btn btn-default" data-toggle="modal" data-target="#fe">Ekspor Data <i class="fa fa-cloud-download"></i></a>
							</div>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover table-checkable order-column" id="tbl">
						<thead>
							<tr>
								<th width="3%">
									<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
										<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
										<span></span>
									</label>
								</th>
								<th style="text-align: center;" width="4%"> # </th>
								<!-- <th style="text-align: center;"> ID rutilahu </th> -->
								<th style="text-align: center;"> Nama Kelompok </th>
								<th style="text-align: center;"> Realisasi Fisik </th>
								<th style="text-align: center;"> Rencana Keuangan </th>
								<th style="text-align: center;"> Realisasi Keuangan </th>
								<th style="text-align: center;"> Realisasi Keuangan </th>
								<th style="text-align: center;" width="7%"> Aksi </th>
								<!-- <th style="text-align: center;"> Persentase Realisasi </th> -->
							</tr>
						</thead>
					</table>
					</form>
					<script type="text/javascript" language="javascript" >
						$(document).ready(function(){
							$('#tbl').dataTable({
								"order": [[ 1, "asc" ]],
								"bProcessing": true,
								"ajax" : {
									type:"POST",
									url: "<?php echo site_url('admin/Report/json_rutilahu')?>",
									data:{prov:"<?= $prov; ?>",kabkot:'<?= $kabkot; ?>'},
									cache: false
								},
								"aoColumns": [
											{ mData: 'checkbox', sClass: "alignCenter", "bSortable": false} ,
											{ mData: 'number', sClass: "alignCenter" },
											{ mData: 'nama_kelompok', sClass: "alignCenter" },
											{ mData: 'realisasi_fisik', sClass: "alignCenter" } ,
											{ mData: 'rencana_anggaran', sClass: "alignCenter" },
											{ mData: 'realisasi_anggaran', sClass: "alignCenter" },
											{ mData: 'persentase_anggaran', sClass: "alignCenter" },
											{ mData: 'aksi', sClass: "alignCenter" },
											// { mData: 'persentase_realisasi', sClass: "alignCenter" }
										]
							});
						});
					</script>
					<script type="text/javascript">
					function deleteConfirm(){
						var result = confirm("Yakin akan menghapus data ini?");
						if(result){
							return true;
						}else{
							return false;
						}
					}
					</script>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="fe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Form Ekspor</h4>
			</div>
			<div class="modal-body">
				<div class="form-body">
					<div class="row">
						<form method='post' action='<?=base_url('admin/Report/download_rutilahu_data');?>'>
							
							<label class="control-label col-md-2">Provinsi <span class="required"> * </span></label>
							<div class="col-md-3">
								<select name='prov' id='id_provinsi2' class="form-control select2-allow-clear" required>
									<option value=""></option>
									<?php
									foreach ($provinsi as $key => $value) {
										echo'<option value="'.$value->id_provinsi.'">'.$value->nm_provinsi.'</option>';
									}
									?>
								</select>
							</div>
							<label class="control-label col-md-2">Kabupaten/ Kota </label>
							<div class="col-md-3">
								<select name='kab' id='id_kabupaten2' class="form-control select2-allow-clear">
									<option value=""></option>
								</select>
							</div>
							<div class="col-md-1">
								<!-- <a href="<?=base_url('admin/Report/download_admin_data');?>" class="btn btn-default">Ekspor Data <i class="fa fa-cloud-download"></i></a> -->
								<button type='submit' class="btn btn-primary">Ekspor Data</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?=base_url('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){

		$.ajaxSetup({
			type:"POST",
			url: "<?php echo site_url('/admin/Master/ajax_function')?>",
			cache: false,
		});

		$("#id_kube").change(function(){
			var value=$(this).val();
			$.ajax({
				data:{id:value,modul:'get_anggota_kube_by_id_kube'},
				success: function(respond){
					$("#id_anggota_kube").html(respond);
				}
			})
		});

		$("#id_kube").change(function(){
			var value=$(this).val();
			$.ajax({
				data:{id:value,modul:'get_isian_indikator_by_id_kube'},
				success: function(respond){
					$("#list_indikator").html(respond);
				}
			})
		});

		// $("#id_indikator").change(function(){
		// 	var value=$(this).val();
		// 	$.ajax({
		// 		data:{id:value,modul:'get_indikator_by_tipe'},
		// 		success: function(respond){
		// 			$("#indikator").html(respond);
		// 		}
		// 	})
		// });

	})

</script>
<ul class="page-breadcrumb breadcrumb">
	<li>
		<span>Laporan</span>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<span><a href='<?= site_url('/admin_side/laporan_kube'); ?>'>Data Kube (Kelompok Usaha Bersama)</a></span>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<span>Tambah Data</span>
	</li>
</ul>
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="page-content-inner">
	<div class="m-heading-1 border-green m-bordered">
		<h3>Catatan</h3>
		<p> 1. Kolom isian dengan tanda bintang (<font color='red'>*</font>) adalah wajib untuk di isi.</p>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light ">
				<div class="portlet-body">
					<form role="form" class="form-horizontal" action="<?=base_url('admin_side/simpan_laporan_kube');?>" method="post" enctype='multipart/form-data'>
						<div class="form-body">
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Nama Kelompok <span class="required"> * </span></label>
								<div class="col-md-10">
									<select name='id_kube' id='id_kube' class="form-control select2-allow-clear" required>
										<option value=''></option>
										<?php
										foreach ($kube as $key => $value) {
											echo '<option value="'.$value->id_kube.'">'.$value->nama_tim.' - '.$value->nm_kabupaten.'</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Pelapor <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<select name='id_anggota_kube' id='id_anggota_kube' class="form-control select2-allow-clear" required>
											<option value=''></option>
										</select>
									</div>
								</div>
							</div>
							<!-- <div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Fisik <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<input type="text" class="form-control" name="fisik" placeholder="Type something" required>
										<div class="form-control-focus"> </div>
										<span class="help-block">Some help goes here...</span>
										<i class="fa fa-list"></i>
									</div>
								</div>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Persentase Fisik <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<input type="number" class="form-control" name="persentase_fisik" placeholder="Type something" max='100' required>
										<div class="form-control-focus"> </div>
										<span class="help-block">Some help goes here...</span>
										<i class="fa fa-list"></i>
									</div>
								</div>
							</div> -->
							<!-- <div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Tipe Indikator <span class="required"> * </span></label>
								<div class="col-md-10">
									<select name='id_indikator' id='id_indikator' class="form-control select2-allow-clear" required>
										<option value=''></option>
										<?php
										foreach ($indikator as $key => $value) {
											echo '<option value="'.$value->id_master_indikator.'">'.$value->master_indikator.'</option>';
										}
										?>
									</select>
								</div>
							</div> -->
							<!-- <div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Indikator <span class="required"> * </span></label>
								<div class="col-md-10" id='indikator'>
									<select name='indikator' id='indikator' class="form-control select2-allow-clear" required>
										<option value=''></option>
									</select>
								</div>
							</div> -->
							<!-- <div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Keuangan <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<input type="text" class="form-control" name="keuangan" id='rupiah' placeholder="Type something" required>
										<div class="form-control-focus"> </div>
										<span class="help-block">Some help goes here...</span>
										<i class="fa fa-dollar"></i>
									</div>
								</div>
							</div> -->
							<hr>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-3 control-label" for="form_control_1"><b>Indikator Progres Fisik</b></label>
							</div>
							<div class="form-group form-md-line-input has-danger" id='list_indikator'>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-3 control-label" for="form_control_1"><b>Penjelasan Progres Fisik</b></label>
							</div>
							<?php
							foreach ($indikator as $key => $i) {
							?>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1"><?= $i->master_indikator; ?></label>
								<div class="col-md-10">
									<div class="input-icon">
										<input type="text" class="form-control" name="penjelasan_progres_fisik_<?= $i->id_master_indikator; ?>" placeholder="Type something">
										<div class="form-control-focus"> </div>
										<span class="help-block">Some help goes here...</span>
										<i class="fa fa-list"></i>
									</div>
								</div>
							</div>
							<?php } ?>
							<hr>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-3 control-label" for="form_control_1"><b>Progres Keuangan</b></label>
							</div>
							<?php
							$no = 0;
							foreach ($indikator as $key => $i) {
							?>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1"><?= $i->master_indikator; ?></label>
								<div class="col-md-10">
									<div class="input-icon">
										<input type="number" class="form-control" name="progres_keuangan<?= $i->id_master_indikator; ?>" placeholder="Type something">
										<div class="form-control-focus"> </div>
										<span class="help-block">Some help goes here...</span>
										<i class="fa fa-list"></i>
									</div>
								</div>
							</div>
							<?php } ?>
							<hr>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Keterangan</label>
								<div class="col-md-10">
									<div class="input-icon">
										<input type="text" class="form-control" name="keterangan" placeholder="Type something">
										<div class="form-control-focus"> </div>
										<span class="help-block">Some help goes here...</span>
										<i class="fa fa-list"></i>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="form-actions margin-top-10">
							<div class="row">
								<div class="col-md-offset-2 col-md-10">
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
<script>
	var jum_arr = <?= count($indikator); ?>;
	for (let i = 0; i < jum_arr; i++) {
		var get_id = 'rupiah'+i;
		var rupiah = document.getElementById(get_id);
		rupiah.addEventListener("keyup", function(e) {
			rupiah.value = formatRupiah(this.value, "Rp. ");
		});

		function formatRupiah(angka, prefix) {
			var number_string = angka.replace(/[^,\d]/g, "").toString(),
				split = number_string.split(","),
				sisa = split[0].length % 3,
				rupiah = split[0].substr(0, sisa),
				ribuan = split[0].substr(sisa).match(/\d{3}/gi);

			if (ribuan) {
				separator = sisa ? "." : "";
				rupiah += separator + ribuan.join(".");
			}

			rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
			return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
		}
	}
</script>
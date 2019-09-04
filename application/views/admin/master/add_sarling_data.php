<script src="<?=base_url('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
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

		$("#id_kabupaten").change(function(){
			var value=$(this).val();
			$.ajax({
				data:{id:value,modul:'get_kecamatan_by_id_kabupaten'},
				success: function(respond){
					$("#id_kecamatan").html(respond);
				}
			})
		});

		$("#id_kecamatan").change(function(){
			var value=$(this).val();
			$.ajax({
				data:{id:value,modul:'get_desa_by_id_kecamatan'},
				success: function(respond){
					$("#id_desa").html(respond);
				}
			})
		});

	})

</script>
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
					<form role="form" class="form-horizontal" action="<?=base_url('admin_side/simpan_data_sarling');?>" method="post"  enctype='multipart/form-data'>
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
						<div class="form-body">
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Jenis Sarling <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<select name='id_jenis_sarling' class="form-control select2-allow-clear" required>
											<option value=''></option>
											<?php
											foreach ($jenis_sarling as $key => $value) {
												echo '<option value="'.$value->id_jenis_sarling.'">'.$value->jenis_sarling.'</option>';
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Nama Tim <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<input type="text" class="form-control" name="nama_tim" placeholder="Type something" required>
										<div class="form-control-focus"> </div>
										<span class="help-block">Some help goes here...</span>
										<i class="fa fa-user"></i>
									</div>
								</div>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Alamat Sarling <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<input type="text" class="form-control" name="alamat" placeholder="Type something" required>
										<div class="form-control-focus"> </div>
										<span class="help-block">Some help goes here...</span>
										<i class="fa fa-map"></i>
									</div>
								</div>
							</div>
							<!-- <div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Rencana Anggaran <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<input type="text" class="form-control" name="rencana_anggaran" id='rupiah' placeholder="Type something" required>
										<div class="form-control-focus"> </div>
										<span class="help-block">Some help goes here...</span>
										<i class="fa fa-dollar"></i>
									</div>
								</div>
							</div> -->
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Provinsi <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<select name='id_provinsi' id='id_provinsi' class="form-control select2-allow-clear" required>
											<option value=''></option>
											<?php
											foreach ($provinsi as $key => $value) {
												echo '<option value="'.$value->id_provinsi.'">'.$value->nm_provinsi.'</option>';
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Kabupaten/ Kota <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<select name='id_kabupaten' id='id_kabupaten' class="form-control select2-allow-clear" required>
											<option value=''></option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Kecamatan <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<select name='id_kecamatan' id='id_kecamatan' class="form-control select2-allow-clear" required>
											<option value=''></option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Kelurahan/ Desa <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<select name='id_desa' id='id_desa' class="form-control select2-allow-clear" required>
											<option value=''></option>
										</select>
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
	var rupiah = document.getElementById("rupiah");
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
</script>
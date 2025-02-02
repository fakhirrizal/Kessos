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
		<span>Ubah Data</span>
	</li>
</ul>
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="page-content-inner">
	<div class="m-heading-1 border-yellow m-bordered" style="background-color:#FAD405;">
		<h3>Catatan</h3>
		<p> 1. Kolom isian dengan tanda bintang (<font color='red'>*</font>) adalah wajib untuk di isi.</p>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light ">
				<div class="portlet-body">
					<form role="form" class="form-horizontal" action="<?=base_url('admin_side/perbarui_data_sarling');?>" method="post" enctype='multipart/form-data'>
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
						<?php
						foreach ($data_utama as $key => $row) {
						?>
						<input type="hidden" name="id_sarling" value="<?= md5($row->id_sarling); ?>">
						<div class="form-body">
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Tahun Program <span class="required"> * </span></label>
								<div class="col-md-3">
									<div class="input-icon">
										<select name='tahun' class="form-control select2-allow-clear" required>
											<option value=''>-- Pilih --</option>
											<option value='2015' <?php if($row->tahun=='2015'){echo'selected';}else{echo'';} ?>>2015</option>
											<option value='2016' <?php if($row->tahun=='2016'){echo'selected';}else{echo'';} ?>>2016</option>
											<option value='2017' <?php if($row->tahun=='2017'){echo'selected';}else{echo'';} ?>>2017</option>
											<option value='2018' <?php if($row->tahun=='2018'){echo'selected';}else{echo'';} ?>>2018</option>
											<option value='2019' <?php if($row->tahun=='2019'){echo'selected';}else{echo'';} ?>>2019</option>
										</select>
									</div>
								</div>
								<label class="col-md-2 control-label" for="form_control_1">Tahap <span class="required"> * </span></label>
								<div class="col-md-3">
									<div class="input-icon">
										<select name='tahap' class="form-control select2-allow-clear" required>
											<option value=''>-- Pilih --</option>
											<option value='1' <?php if($row->tahap=='1'){echo'selected';}else{echo'';} ?>>Tahap 1</option>
											<option value='2' <?php if($row->tahap=='2'){echo'selected';}else{echo'';} ?>>Tahap 2</option>
											<option value='3' <?php if($row->tahap=='3'){echo'selected';}else{echo'';} ?>>Tahap 3</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Jenis Sarling <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<select name='id_jenis_sarling' class="form-control select2-allow-clear" required>
											<option value=''></option>
											<?php
											foreach ($jenis_sarling as $key => $value) {
												if($value->id_jenis_sarling==$row->id_jenis_sarling){
													echo '<option value="'.$value->id_jenis_sarling.'" selected>'.$value->jenis_sarling.'</option>';
												}else{
													echo '<option value="'.$value->id_jenis_sarling.'">'.$value->jenis_sarling.'</option>';
												}
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
										<input type="text" class="form-control" name="nama_tim" value="<?= $row->nama_tim; ?>" required>
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
										<input type="text" class="form-control" name="alamat" value="<?= $row->alamat; ?>" required>
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
										<input type="text" class="form-control" name="rencana_anggaran" id='rupiah' value="Rp. <?php echo number_format($row->rencana_anggaran,0,",","."); ?>" required>
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
												if($value->id_provinsi==$row->id_provinsi){
													echo '<option value="'.$value->id_provinsi.'" selected>'.$value->nm_provinsi.'</option>';
												}else{
													echo '<option value="'.$value->id_provinsi.'">'.$value->nm_provinsi.'</option>';
												}
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
											<option value='<?= $row->id_kabupaten; ?>'><?= $row->nm_kabupaten; ?></option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Kecamatan <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<select name='id_kecamatan' id='id_kecamatan' class="form-control select2-allow-clear" required>
											<option value='<?= $row->id_kecamatan; ?>'><?= $row->nm_kecamatan; ?></option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Kelurahan/ Desa <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<select name='id_desa' id='id_desa' class="form-control select2-allow-clear" required>
											<option value='<?= $row->id_desa; ?>'><?= $row->nm_desa; ?></option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						<br>
						<div class="form-actions margin-top-10">
							<div class="row">
								<div class="col-md-offset-2 col-md-10">
									<button type="reset" class="btn default">Batal</button>
									<button type="submit" class="btn blue">Perbarui</button>
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
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
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
		<span><a href='<?= site_url('/admin_side/kube'); ?>'>Data Kube (Kelompok Usaha Bersama)</a></span>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<span>Ubah Data</span>
	</li>
</ul>
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="page-content-inner">
	<div class="m-heading-1 border-green m-bordered">
		<h3>Catatan</h3>
		<p> 1. Kolom isian dengan tanda bintang (<font color='red'>*</font>) adalah wajib untuk di isi.</p>
		<!-- <p> 2. Pastikan marker yang Anda geser sesuai dengan alamat rumah Anda.</p> -->
	</div>
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet light ">
				<div class="portlet-body">
					<form role="form" class="form-horizontal" action="<?=base_url('admin_side/perbarui_data_kube');?>" method="post"  enctype='multipart/form-data'>
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
						<?php
						foreach ($data_utama as $key => $row) {
						?>
						<input type="hidden" name="id_kube" value="<?= md5($row->id_kube); ?>">
						<div class="form-body">
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Jenis Usaha <span class="required"> * </span></label>
								<div class="col-md-10">
									<div class="input-icon">
										<select name='id_jenis_usaha' class="form-control select2-allow-clear" required>
											<option value=''></option>
											<?php
											foreach ($jenis_usaha as $key => $value) {
												if($value->id_jenis_usaha==$row->id_jenis_usaha){
													echo '<option value="'.$value->id_jenis_usaha.'" selected>'.$value->jenis_usaha.'</option>';
												}else{
													echo '<option value="'.$value->id_jenis_usaha.'">'.$value->jenis_usaha.'</option>';
												}
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Nama Kelompok <span class="required"> * </span></label>
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
								<label class="col-md-2 control-label" for="form_control_1">Alamat <span class="required"> * </span></label>
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
							<!-- <div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1"></label>
								<div class="col-md-10">
									<div id="map"></div>
								</div>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1"></label>
								<div class="col-md-5">
									<div class="input-icon">
										<input type="text" class="form-control" name='latitude' id='latitude' readonly="">
										<div class="form-control-focus"> </div>
										<span class="help-block">Garis lintang</span>
										<i class="icon-pin"></i>
									</div>
								</div>
								<div class="col-md-5">
									<div class="input-icon">
									<input type="text" class="form-control" name='longitude' id='longitude' readonly="">
										<div class="form-control-focus"> </div>
										<span class="help-block">Garis Bujur</span>
										<i class="icon-pin"></i>
									</div>
								</div>
							</div> -->
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
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
</div>
<script>
	var rupiah = document.getElementById("rupiah");
	rupiah.addEventListener("keyup", function(e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah.value = formatRupiah(this.value, "Rp. ");
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
			split = number_string.split(","),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah += separator + ribuan.join(".");
		}

		rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
		return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
	}
</script>
<style type="text/css">
	#map {
		height: 300px;
	}
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize&key=AIzaSyCnjlDXASsyIUKAd1QANakIHIM8jjWWyNU"></script>

<script type="text/javascript">
    //* Fungsi untuk mendapatkan nilai latitude longitude
	function updateMarkerPosition(latLng) {
		document.getElementById('latitude').value = [latLng.lat()]
		document.getElementById('longitude').value = [latLng.lng()]
	}

	var map = new google.maps.Map(document.getElementById('map'), {
	zoom: 12,
	center: new google.maps.LatLng(-6.909718326755971,109.734670017746),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});
	// posisi awal marker
	var latLng = new google.maps.LatLng(-6.909718326755971,109.734670017746);

	/* buat marker yang bisa di drag lalu
	panggil fungsi updateMarkerPosition(latLng)
	dan letakan posisi terakhir di id=latitude dan id=longitude
	*/
	var marker = new google.maps.Marker({
		position : latLng,
		title : 'lokasi',
		map : map,
		draggable : true
	});

	updateMarkerPosition(latLng);
	google.maps.event.addListener(marker, 'drag', function() {
	// ketika marker di drag, otomatis nilai latitude dan longitude
	// menyesuaikan dengan posisi marker
		updateMarkerPosition(marker.getPosition());
	});
</script>
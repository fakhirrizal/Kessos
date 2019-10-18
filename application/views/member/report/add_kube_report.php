<script src="<?=base_url('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
<ul class="page-breadcrumb breadcrumb">
	<li>
		<span>Laporan</span>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<span><a href='<?= site_url('/member_side/laporan_kube'); ?>'>Data Kube (Kelompok Usaha Bersama)</a></span>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<span>Tambah Data</span>
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
					<form role="form" class="form-horizontal" action="<?=base_url('member_side/simpan_laporan_kube');?>" method="post" enctype='multipart/form-data'>
						<div class="form-body">
							<div style='text-align: left'>
								<label class="control-label uppercase" for="form_control_1"><b>Laporan Progres Aspek Fisik</b></label>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label uppercase" for="form_control_1"></label>
								<div class="col-md-10" id='tampil_indikator'>
									<?php
									$get_data = $this->Main_model->getSelectedData('anggota_kube a', 'a.*', array("a.user_id" => $this->session->userdata('id')))->row();
									echo'<input type="hidden" name="id_kube" value="'.$get_data->id_kube.'"/>';
									$data['indikator'] = $this->Main_model->getSelectedData('master_indikator a', 'a.*')->result();
									$data['data_master'] = $this->Main_model->getSelectedData('status_laporan_kube a', 'a.*', array('a.id_kube'=>$get_data->id_kube),'','1')->row();
									$this->load->view('member/report/ajax_list_indicator1',$data);
									?>
								</div>
							</div>
							<hr>
							<div style='text-align: left'>
								<label class="control-label uppercase" for="form_control_1"><b>Laporan Progres Aspek Keuangan</b></label>
								<br><br><b>Penggunaan Anggaran :</b>
							</div>
							<?php
							$no = 0;
							foreach ($indikator as $key => $i) {
							?>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1"><?= $i->master_indikator; ?></label>
								<div class="col-md-10">
									<div class="input-icon">
										<input type="number" class="form-control" name="progres_keuangan_<?= $i->id_master_indikator; ?>" placeholder="Type something">
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
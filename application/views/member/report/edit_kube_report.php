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
					<form role="form" class="form-horizontal" action="<?=base_url('member_side/perbarui_laporan_kube');?>" method="post" enctype='multipart/form-data'>
                         <input type="hidden" name="id_kube" value="<?= md5($data_utama->id_kube); ?>">
                         <input type="hidden" name="id_laporan_kube" value="<?= $this->uri->segment(3); ?>">
                        <div class="form-body">
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1">Nama Kelompok <span class="required"> * </span></label>
								<div class="col-md-10">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" value="<?= $data_utama->nama_tim.' - '.$data_utama->nm_kabupaten; ?>" readonly>
										<div class="form-control-focus"> </div>
										<span class="help-block">Some help goes here...</span>
										<i class="fa fa-list"></i>
									</div>
								</div>
							</div>
							<hr>
							<div style='text-align: left'>
								<label class="control-label uppercase" for="form_control_1"><b>Laporan Progres Aspek Fisik</b></label>
							</div>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label uppercase" for="form_control_1"></label>
								<div class="col-md-10" id='tampil_indikator'>
                                    <?php
                                    $list_indikator = explode(',',$status_laporan->indikator);
									foreach ($indikator as $key => $in) {
									?>
									<table class='table table-striped table-bordered'>
										<thead>
											<tr>
												<th>Indikator Progres Fisik - <span class='uppercase'><?= $in->master_indikator; ?></span></th>
												<th>Penjelasan Progres Fisik - <span class='uppercase'><?= $in->master_indikator; ?></span></th>
											</tr>
										</thead>
										<tbody>
											<tr>
                                                <td>
                                                    <div class="md-checkbox-list">
                                                        <?php
                                                        $get_indikator = $this->Main_model->getSelectedData('indikator a', 'a.*',array('a.id_master_indikator'=>$in->id_master_indikator))->result();
                                                        foreach ($get_indikator as $key => $value) {
                                                            $checked = '';
                                                            for ($l=0; $l < count($list_indikator); $l++) {
                                                                if($list_indikator[$l]==$value->id_indikator){
                                                                    $check_value = $this->Main_model->getSelectedData('detail_laporan_kube_aspek_fisik a', 'a.*',array('md5(a.id_laporan_kube)'=>$this->uri->segment(3),'a.indikator_progres_fisik'=>$value->id_indikator))->row();
                                                                    if($check_value==NULL){
                                                                        $checked = 'checked disabled';
                                                                    }else{
                                                                        $checked = 'checked';
                                                                    }
                                                                }else{
                                                                    echo'';
                                                                }
                                                            }
                                                        ?>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="<?= $value->id_indikator; ?>" value="<?= $value->id_indikator; ?>" name="indikator_progres_fisik_<?= $value->id_indikator; ?>[]" class="md-check" <?= $checked; ?>>
                                                            <label for="<?= $value->id_indikator; ?>">
                                                                <span class="inc"></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> <?= $value->indikator; ?> </label>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="md-checkbox-list">
                                                        <?php
                                                        $get_indikator = $this->Main_model->getSelectedData('indikator a', 'a.*',array('a.id_master_indikator'=>$in->id_master_indikator))->result();
                                                        foreach ($get_indikator as $key => $value) {
                                                            $nilai = '';
                                                            for ($l=0; $l < count($list_indikator); $l++) {
                                                                if($list_indikator[$l]==$value->id_indikator){
                                                                    $get_keterangan = $this->Main_model->getSelectedData('detail_laporan_kube_aspek_fisik a', 'a.*',array('a.indikator_progres_fisik'=>$value->id_indikator,'b.id_kube'=>$data_utama->id_kube,'b.deleted="0"'),'b.created_at DESC','1','','',array(
                                                                        'table' => 'laporan_kube b',
                                                                        'on' => 'a.id_laporan_kube=b.id_laporan_kube',
                                                                        'pos' => 'LEFT'
                                                                    ))->row();
                                                                    if(md5($get_keterangan->id_laporan_kube)==$this->uri->segment(3)){
                                                                        $nilai = 'value="'.$get_keterangan->penjelasan_progres_fisik.'"';
                                                                    }else{
                                                                        $nilai = 'value="'.$get_keterangan->penjelasan_progres_fisik.'" disabled';
                                                                    }
                                                                }else{
                                                                    echo'';
                                                                }
                                                            }
                                                        ?>
                                                        <div class="md-checkbox">
                                                            <input type="text" class="form-control" name="penjelasan_progres_fisik_<?= $value->id_indikator; ?>" placeholder="Type something" <?= $nilai; ?>>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </td>
											</tr>
										</tbody>
									</table>
									<?php } ?>
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
                                $detail_laporan_kube_aspek_keuangan = $this->Main_model->getSelectedData('detail_laporan_kube_aspek_keuangan a', 'a.*',array('md5(a.id_laporan_kube)'=>$this->uri->segment(3),'a.id_master_indikator'=>$i->id_master_indikator))->row();
                            ?>
							<div class="form-group form-md-line-input has-danger">
								<label class="col-md-2 control-label" for="form_control_1"><?= $i->master_indikator; ?></label>
								<div class="col-md-10">
									<div class="input-icon">
										<input type="number" class="form-control" name="progres_keuangan_<?= $i->id_master_indikator; ?>" placeholder="Type something" value='<?= $detail_laporan_kube_aspek_keuangan->progres_keuangan; ?>'>
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
										<input type="text" class="form-control" name="keterangan" placeholder="Type something" value='<?= $data_detail_laporan->keterangan; ?>'>
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
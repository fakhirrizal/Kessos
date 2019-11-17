<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/kelly.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="page-content-inner">
	<div class="m-heading-1 border-yellow m-bordered" style="background-color:#FAD405;">
		<h3>Catatan</h3>
		<p> Tampilan standar adalah rekap data Tahun <?= date('Y'); ?></p>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light ">
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-12">
                                <?php
                                $where_wilayah = '';
                                $getdataprofile = $this->Main_model->getSelectedData('user_profile a', 'a.wilayah,b.role_id', array('a.user_id' => $this->session->userdata('id')), '', '', '', '', array(
                                    'table' => 'user_to_role b',
                                    'on' => 'a.user_id=b.user_id',
                                    'pos' => 'LEFT'
                                ))->row();
                                if($getdataprofile->role_id=='5'){
                                ?>
                                <form action="<?=base_url('spv/dasbor_grafik_provinsi/'.$this->uri->segment(3));?>" method="post">
                                    <div class="form-group form-md-line-input has-danger">
                                        <label class="col-md-2 control-label" for="form_control_1"></label>
                                        <label class="col-md-5 control-label" for="form_control_1">Grafik <span class="required"> * </span></label>
                                        <label class="col-md-4 control-label" for="form_control_1">Tahun</label>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-5">
                                            <div class="input-icon">
                                                <select name='grafik' class="form-control select2-allow-clear" required>
                                                    <option value=''>-- Pilih --</option>
                                                    <option value='1'>Jumlah Kube, RLTH, dan Sarling</option>
                                                    <option value='2'>Rekap Realisasi Program Kube, RLTH dan Sarling</option>
                                                    <option value='3'>Rekap Serapan Bantuan Keuangan untuk Program Kube, RLTH dan Sarling</option>
                                                    <option value='4'>Rekap Progres Fisik Program Kube, RLTH dan Sarling</option>
                                                    <option value='5'>Jenis Usaha Kube</option>
                                                    <option value='6'>Jenis Sarling</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-icon">
                                                <select name='tahun' class="form-control select2-allow-clear">
                                                    <option value=''>-- Pilih --</option>
                                                    <option value='2016'>2016</option>
                                                    <option value='2017'>2017</option>
                                                    <option value='2018'>2018</option>
                                                    <option value='2019'>2019</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type='submit' class="btn btn-info">Proses</button>
                                        </div>
                                    </div>
                                </form>
                                <?php }elseif($getdataprofile->role_id=='6'){ ?>
                                    <form action="<?=base_url('spv/dasbor_grafik_kabupaten/'.$this->uri->segment(3));?>" method="post">
                                    <div class="form-group form-md-line-input has-danger">
                                        <label class="col-md-2 control-label" for="form_control_1"></label>
                                        <label class="col-md-5 control-label" for="form_control_1">Grafik <span class="required"> * </span></label>
                                        <label class="col-md-4 control-label" for="form_control_1">Tahun</label>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-5">
                                            <div class="input-icon">
                                                <select name='grafik' class="form-control select2-allow-clear" required>
                                                    <option value=''>-- Pilih --</option>
                                                    <option value='1'>Jumlah Kube, RLTH, dan Sarling</option>
                                                    <option value='2'>Rekap Realisasi Program Kube, RLTH dan Sarling</option>
                                                    <option value='3'>Rekap Serapan Bantuan Keuangan untuk Program Kube, RLTH dan Sarling</option>
                                                    <option value='4'>Rekap Progres Fisik Program Kube, RLTH dan Sarling</option>
                                                    <option value='5'>Jenis Usaha Kube</option>
                                                    <option value='6'>Jenis Sarling</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-icon">
                                                <select name='tahun' class="form-control select2-allow-clear">
                                                    <option value=''>-- Pilih --</option>
                                                    <option value='2016'>2016</option>
                                                    <option value='2017'>2017</option>
                                                    <option value='2018'>2018</option>
                                                    <option value='2019'>2019</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type='submit' class="btn btn-info">Proses</button>
                                        </div>
                                    </div>
                                </form>
                                <?php }else{echo'';} ?>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
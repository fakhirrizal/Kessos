<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<style media="all" type="text/css">
    .alignCenter { text-align: center; }
</style>
<ul class="page-breadcrumb breadcrumb">
	<li>
		<span>Laporan</span>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<span><a href='<?= site_url('/admin_side/laporan_sarling'); ?>'>Data Sarling (Sarana Lingkungan)</a></span>
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
		<!-- <p> 1. Ketika mengklik <b>Atur Ulang Sandi</b>, maka kata sandi otomatis menjadi "<b>1234</b>"</p>
		<p> 2. Untuk <b>username</b> dan <b>password</b> dari anggota baru diambil dari isian <b>NIK</b>.</p> -->
	</div>
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
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
												<td> Alamat </td>
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
						<br>
						<br>
						<br>
						<?php
						if(isset($status_laporan)){
						?>
								<div class="col-md-4">
									<table class="table">
										<tbody>
											<tr>
												<td style='text-align:center'> <b>Persentase Fisik</b> </td>
											</tr>
											<tr>
												<td style='text-align:center'><?php echo number_format($status_laporan->persentase_fisik,2).'%'; ?></td>
											</tr>
											<tr>
												<td> </td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col-md-4">
									<table class="table">
										<tbody>
											<tr>
												<td style='text-align:center'> <b>Penggunaan Anggaran</b> </td>
											</tr>
											<tr>
												<td style='text-align:center'><?php echo 'Rp '.number_format($status_laporan->anggaran,2).' ('.number_format($status_laporan->persentase_anggaran,2).'%)'; ?></td>
											</tr>
											<tr>
												<td> </td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col-md-4">
									<table class="table">
										<tbody>
											<tr>
												<td style='text-align:center'> <b>Persentase Realisasi</b> </td>
											</tr>
											<tr>
												<td style='text-align:center'><?php echo number_format($status_laporan->persentase_realisasi,2).'%'; ?></td>
											</tr>
											<tr>
												<td> </td>
											</tr>
										</tbody>
									</table>
								</div>
						<?php } ?>
						<div class="col-md-12" >
							<div class="tabbable-line">
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
											<th style="text-align: center;"> Pelapor </th>
											<th style="text-align: center;"> Tanggal Lapor </th>
											<th style="text-align: center;"> Keterangan </th>
											<th style="text-align: center;" width="7%"> Aksi </th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($data_detail_laporan as $key => $value) {
											$get_tanggal = explode(' ',$value->created_at);
											$master_indikator = $this->Main_model->getSelectedData('detail_laporan_sarling_aspek_fisik a', 'a.*,b.master_indikator,c.indikator', array('a.id_laporan_sarling'=>$value->id_laporan_sarling),'a.id_master_indikator ASC','','','a.id_master_indikator',array(
												array(
													'table' => 'master_indikator b',
													'on' => 'a.id_master_indikator=b.id_master_indikator',
													'pos' => 'LEFT'
												),array(
													'table' => 'indikator c',
													'on' => 'a.indikator_progres_fisik=c.id_indikator',
													'pos' => 'LEFT'
												)
											))->result();
											// $detail_laporan_aspek_keuangan = $this->Main_model->getSelectedData('detail_laporan_sarling_aspek_keuangan a', 'a.*,b.master_indikator', array('a.id_laporan_sarling'=>$value->id_laporan_sarling),'a.id_master_indikator ASC','','','',array(
											// 	'table' => 'master_indikator b',
											// 	'on' => 'a.id_master_indikator=b.id_master_indikator',
											// 	'pos' => 'LEFT'
											// ))->result();
											$return_on_click = "return confirm('Anda yakin?')";
											echo'
											<tr>
												<td style="text-align: center;">'.$no++.'.</td>
												<td>'.$value->fullname.'</td>
												<td style="text-align: center;">'.$this->Main_model->convert_tanggal($get_tanggal[0]).'</td>
												<td style="text-align: center;">'.$value->keterangan.'</td>
												<td>
													<div class="dropdown">
														<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Aksi
															<i class="fa fa-angle-down"></i>
														</button>
														<ul class="dropdown-menu pull-right" role="menu">
															<li>
																<a href="'.site_url('admin_side/ubah_data_laporan_sarling/'.md5($value->id_laporan_sarling)).'">
																	<i class="icon-wrench"></i> Ubah Data </a>
															</li>
															<li>
																<a onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_laporan_sarling/'.md5($value->id_laporan_sarling)).'">
																	<i class="icon-trash"></i> Hapus Data </a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="5">
													<div class="panel-group accordion" id="accordion'.$value->id_laporan_sarling.'">
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion'.$value->id_laporan_sarling.'" href="#collapse_'.$value->id_laporan_sarling.'_1" aria-expanded="false"> Detail Laporan </a>
																</h4>
															</div>
															<div id="collapse_'.$value->id_laporan_sarling.'_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
																<div class="panel-body">';
																foreach ($master_indikator as $key => $mi) {
																	$detail_laporan = $this->Main_model->getSelectedData('detail_laporan_sarling_aspek_fisik a', 'a.*,b.master_indikator,c.indikator', array('a.id_laporan_sarling'=>$value->id_laporan_sarling,'a.id_master_indikator'=>$mi->id_master_indikator),'a.id_master_indikator ASC','','','',array(
																		array(
																			'table' => 'master_indikator b',
																			'on' => 'a.id_master_indikator=b.id_master_indikator',
																			'pos' => 'LEFT'
																		),array(
																			'table' => 'indikator c',
																			'on' => 'a.indikator_progres_fisik=c.id_indikator',
																			'pos' => 'LEFT'
																		)
																	))->result();
																	echo '<h4><b>'.$mi->master_indikator.'</b></h4>';
																	echo '<b>Progres Fisik : </b><br>';
																	foreach ($detail_laporan as $key => $dl) {
																		echo $dl->indikator.' &rarr; '.$dl->penjelasan_progres_fisik.'<br>';
																	}
																	$detail_laporan_aspek_keuangan = $this->Main_model->getSelectedData('detail_laporan_sarling_aspek_keuangan a', 'a.*,b.master_indikator', array('a.id_laporan_sarling'=>$value->id_laporan_sarling,'a.id_master_indikator'=>$mi->id_master_indikator),'a.id_master_indikator ASC','','','',array(
																		'table' => 'master_indikator b',
																		'on' => 'a.id_master_indikator=b.id_master_indikator',
																		'pos' => 'LEFT'
																	))->row();
																	echo '<b>Progres Keuangan : </b>Rp '.number_format($detail_laporan_aspek_keuangan->progres_keuangan,2).'<br>';
																}
																// foreach ($detail_laporan as $key => $dl) {
																// 	echo '<b>'.$dl->master_indikator.'</b> - '.$dl->indikator.' &rarr; '.$dl->penjelasan_progres_fisik.'<br>';
																// }
																// echo '<hr>';
																// foreach ($detail_laporan_aspek_keuangan as $key => $d_l_a_k) {
																// 	echo $d_l_a_k->master_indikator.' : Rp '.number_format($d_l_a_k->progres_keuangan,2).'<br>';
																// }
															echo'</div>
															</div>
														</div>
													</div>
												</td>
											</tr>
											';
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-12" >
						<hr><a href="<?php echo base_url()."admin_side/laporan_sarling"; ?>" class="btn btn-info" role="button"><i class="fa fa-angle-double-left"></i> Kembali</a></div>
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
		// $(document).ready(function(){
		// 	$('#tbl1').dataTable({
		// 		"order": [[ 0, "asc" ]],
		// 		"bProcessing": true,
		// 		"ajax" : {
		// 			url:"<?= site_url('admin/Report/json_laporan_sarling'); ?>",
		// 			data: {id: '<?= $this->uri->segment(3); ?>'}
		// 		},
		// 		"aoColumns": [
		// 					{ mData: 'no', sClass: "alignCenter" },
		// 					{ mData: 'pelapor' },
		// 					{ mData: 'tanggal_lapor', sClass: "alignCenter" },
		// 					{ mData: 'keterangan', sClass: "alignCenter" },
		// 					{ mData: 'aksi' }
		// 				]
		// 	});
		// });
	</script>
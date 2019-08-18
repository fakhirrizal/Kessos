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
		<span>Data Rutilahu (Rumah Tidak Layak Huni)</span>
	</li>
</ul>
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="page-content-inner">
	<div class="m-heading-1 border-green m-bordered">
		<h3>Catatan</h3>
		<p> Untuk menambahkan data anggota Rutilahu silahkan klik detil data rutilahu-nya.</p>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light ">
				<div class="portlet-body">
					<form action="#" method="post" onsubmit="return deleteConfirm();"/>
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-6">
								<div class="btn-group">
									<button type='submit' id="sample_editable_1_new" class="btn sbold red"> Hapus
										<i class="fa fa-trash"></i>
									</button>
								</div>
									<span class="separator">|</span>
									<a href="<?=base_url('admin_side/tambah_data_rutilahu');?>" class="btn green uppercase">Tambah Data <i class="fa fa-plus"></i> </a>
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
								<th style="text-align: center;"> Nama Kelompok </th>
								<th style="text-align: center;"> Alamat Rumah </th>
								<th style="text-align: center;"> Rencana Anggaran </th>
								<th style="text-align: center;" width="7%"> Aksi </th>
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
									url:"<?= site_url('admin/Master/json_rutilahu'); ?>"
								},
								"aoColumns": [
											{ mData: 'checkbox', sClass: "alignCenter", "bSortable": false} ,
											{ mData: 'number', sClass: "alignCenter" },
											{ mData: 'nama_tim' },
											{ mData: 'alamat', sClass: "alignCenter" } ,
											{ mData: 'rencana_anggaran', sClass: "alignCenter" },
											{ mData: 'action' }
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
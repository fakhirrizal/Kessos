<?php
if(($this->session->userdata('id'))==NULL OR ($this->session->userdata('role_id'))=='1'){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url('Auth/logout')."'</script>";
        }
else{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Ditjen PFM - Kementerian Sosial Republik Indonesia</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta content="Kementerian Sosial Republik Indonesia" name="description" />
		<meta content="Kementerian Sosial Republik Indonesia" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/datatables/datatables.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/select2/css/select2.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/select2/css/select2-bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/cubeportfolio/css/cubeportfolio.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/ladda/ladda-themeless.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/css/components-md.min.css');?>" rel="stylesheet" id="style_components" type="text/css" />
		<link href="<?=base_url('assets/global/css/plugins-md.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/pages/css/blog.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/layouts/layout3/css/layout.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/layouts/layout3/css/themes/default.min.css');?>" rel="stylesheet" type="text/css" id="style_color" />
		<link href="<?=base_url('assets/layouts/layout3/css/custom.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Logo_of_the_Ministry_of_Social_Affairs_of_the_Republic_of_Indonesia.svg/220px-Logo_of_the_Ministry_of_Social_Affairs_of_the_Republic_of_Indonesia.svg.png" rel="icon" type="image/x-icon">
	</head>
		<body class="page-container-bg-solid page-md">
		<div class="page-header">
			<div class="page-header-top">
				<div class="container">
					<div id="logo" class="pull-left">
						<h4><img src="https://ppid.kemsos.go.id/themes/def/img/logo.png" width='10%'>Kementerian Sosial Republik Indonesia</h4>
					</div>
					<a href="javascript:;" class="menu-toggler"></a>
					<div class="top-menu">
						<ul class="nav navbar-nav pull-right">
							<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
								<a href="#" class="dropdown-toggle" title="Notifikasi">
									<!-- <i class="icon-bell"></i> -->
								</a>
							</li>
							<!-- <li class="droddown dropdown-separator">
								<span class="separator"></span>
							</li> -->
							<li class="dropdown dropdown-user dropdown-dark">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									<img alt="" class="img-circle" src="https://cdn1.iconfinder.com/data/icons/rcons-user-action/512/user-512.png">
									<span class="username username-hide-mobile">KPM</span>
								</a>
								<ul class="dropdown-menu dropdown-menu-default">
									<!-- <li>
										<a href="#!">
											<i class="icon-user"></i> Profil </a>
									</li> -->
									<li>
										<a href="<?php echo site_url('member_side/bantuan'); ?>">
											<i class="icon-rocket"></i> Bantuan
										</a>
									</li>
									<li class="divider"> </li>
									<li>
										<a href="<?php echo site_url('Auth/logout'); ?>">
											<i class="icon-key"></i> Keluar </a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="page-header-menu">
				<div class="container">
					<!-- <form class="search-form" action="javascript:;" method="GET">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Cari" name="query">
							<span class="input-group-btn">
								<a href="javascript:;" class="btn submit">
									<i class="icon-magnifier"></i>
								</a>
							</span>
						</div>
					</form> -->
					<div class="hor-menu  ">
						<ul class="nav navbar-nav">
							<li class="menu-dropdown classic-menu-dropdown <?php if($parent=='home'){echo 'active';}else{echo '';} ?>">
								<a href="<?php echo site_url('member_side/beranda'); ?>"><i class="icon-bulb"></i> Profil
								</a>
							</li>
							<li class="menu-dropdown classic-menu-dropdown <?php if($parent=='report'){echo 'active';}else{echo '';} ?>">
								<a href="javascript:;"><i class="icon-notebook"></i> Laporan
									<span class="arrow <?php if($parent=='report'){echo 'open';}else{echo '';} ?>"></span>
								</a>
								<ul class="dropdown-menu pull-left">
									<?php
									if($this->session->userdata('role_id')=='2'){
										$get_data = $this->Main_model->getSelectedData('anggota_kube a', 'a.*', array("a.user_id" => $this->session->userdata('id')))->row();
									?>
									<li class=" <?php if($child=='kube'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('member_side/tambah_laporan_kube'); ?>" class="nav-link nav-toggle ">
											<i class="icon-note"></i> Tambah Laporan Kube
										</a>
									</li>
									<li class=" <?php if($child=='detail_kube'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('member_side/detil_laporan_kube/'.md5($get_data->id_kube)); ?>" class="nav-link nav-toggle ">
											<i class="icon-layers"></i> Rekap Laporan Kube
										</a>
									</li>
									<?php
									}elseif($this->session->userdata('role_id')=='3'){
										$get_data = $this->Main_model->getSelectedData('anggota_rutilahu a', 'a.*', array("a.user_id" => $this->session->userdata('id')))->row();
									?>
									<li class=" <?php if($child=='rutilahu'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('member_side/tambah_laporan_rutilahu'); ?>" class="nav-link nav-toggle ">
											<i class="icon-note"></i> Tambah Laporan Rutilahu
										</a>
									</li>
									<li class=" <?php if($child=='detail_rutilahu'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('member_side/detil_laporan_rutilahu/'.md5($get_data->id_rutilahu)); ?>" class="nav-link nav-toggle ">
											<i class="icon-layers"></i> Rekap Laporan Rutilahu
										</a>
									</li>
									<?php
									}elseif($this->session->userdata('role_id')=='4'){
										$get_data = $this->Main_model->getSelectedData('anggota_sarling a', 'a.*', array("a.user_id" => $this->session->userdata('id')))->row();
									?>
									<li class=" <?php if($child=='sarling'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('member_side/tambah_laporan_sarling'); ?>" class="nav-link nav-toggle ">
											<i class="icon-note"></i> Tambah Laporan Sarling
										</a>
									</li>
									<li class=" <?php if($child=='detail_sarling'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('member_side/detil_laporan_sarling/'.md5($get_data->id_sarling)); ?>" class="nav-link nav-toggle ">
											<i class="icon-layers"></i> Rekap Laporan Sarling
										</a>
									</li>
									<?php
									}else{
										echo'';
									}
									?>
								</ul>
							</li>
							<li class="menu-dropdown classic-menu-dropdown <?php if($parent=='log_activity'){echo 'active';}else{echo '';} ?>">
								<a href="<?php echo site_url('member_side/log_activity'); ?>"><i class="fa fa-rss"></i> Log Aktifitas
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="page-container">
			<div class="page-content-wrapper">
				<div class="page-head">
					<div class="container">
						<div class="page-title">
							<h1>Dashboard
								<small>Sistem Informasi</small>
							</h1>
						</div>
						<div class="page-toolbar">
							<div class="btn-group btn-theme-panel">
								<script type="text/javascript">function startTime(){var today=new Date(),curr_hour=today.getHours(),curr_min=today.getMinutes(),curr_sec=today.getSeconds();curr_hour=checkTime(curr_hour);curr_min=checkTime(curr_min);curr_sec=checkTime(curr_sec);document.getElementById('clock').innerHTML=curr_hour+":"+curr_min+":"+curr_sec;}function checkTime(i){if(i<10){i="0"+i;}return i;}setInterval(startTime,500);</script>
								<span class="tanggalwaktu">
								<?= $this->Main_model->convert_hari(date('Y-m-d')).', '.$this->Main_model->convert_tanggal(date('Y-m-d')) ?>  -  Pukul  <span id="clock">13:53:45</span>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="page-content">
					<div class="container">
<?php } ?>
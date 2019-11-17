<?php
if(($this->session->userdata('id'))==NULL OR ($this->session->userdata('role_id'))=='1' OR ($this->session->userdata('role_id'))=='2' OR ($this->session->userdata('role_id'))=='3' OR ($this->session->userdata('role_id'))=='4'){
            echo "<script>alert('Harap login terlebih dahulu')</script>";
            echo "<script>window.location='".base_url('Auth/logout')."'</script>";
        }
else{
?>
<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

	<head>
		<meta charset="utf-8" />
		<title>Ditjen PFM - Kementerian Sosial Republik Indonesia</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta content="Kementerian Sosial Republik Indonesia" name="description" />
		<meta content="Kementerian Sosial Republik Indonesia" name="author" />
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css" />
		<!-- END GLOBAL MANDATORY STYLES -->
		<!-- BEGIN THEME GLOBAL STYLES -->
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
		<!-- END THEME GLOBAL STYLES -->
		<!-- BEGIN THEME LAYOUT STYLES -->
		<link href="<?=base_url('assets/layouts/layout3/css/layout.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/layouts/layout3/css/themes/default.min.css');?>" rel="stylesheet" type="text/css" id="style_color" />
		<link href="<?=base_url('assets/layouts/layout3/css/custom.min.css');?>" rel="stylesheet" type="text/css" />
		<!-- END THEME LAYOUT STYLES -->
		<link href="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Logo_of_the_Ministry_of_Social_Affairs_of_the_Republic_of_Indonesia.svg/220px-Logo_of_the_Ministry_of_Social_Affairs_of_the_Republic_of_Indonesia.svg.png" rel="icon" type="image/x-icon">
	</head>
    <!-- END HEAD -->

		<body class="page-container-bg-solid page-md">
		<!-- BEGIN HEADER -->
		<div class="page-header">
			<!-- BEGIN HEADER TOP -->
			<div class="page-header-top">
				<div class="container">
					<!-- BEGIN LOGO -->
					<!-- <div class="page-logo">
						<a href="javascript:;">
							<img src="https://www.debanensite.nl/files/thumb/d/e/logo_D_300_300_demaco.jpg" alt="logo" class="logo-default">
						</a>
					</div> -->
					<div id="logo" class="pull-left">
						<h4><img src="https://ppid.kemsos.go.id/themes/def/img/logo.png" width='10%'>Kementerian Sosial Republik Indonesia</h4>
					</div>
					<!-- END LOGO -->
					<!-- BEGIN RESPONSIVE MENU TOGGLER -->
					<a href="javascript:;" class="menu-toggler"></a>
					<!-- END RESPONSIVE MENU TOGGLER -->
					<!-- BEGIN TOP NAVIGATION MENU -->
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
							<!-- BEGIN USER LOGIN DROPDOWN -->
							<li class="dropdown dropdown-user dropdown-dark">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									<img alt="" class="img-circle" src="https://www.pinclipart.com/picdir/middle/355-3553881_stockvader-predicted-adig-user-profile-icon-png-clipart.png">
									<span class="username username-hide-mobile">Admin Wilayah</span>
								</a>
								<ul class="dropdown-menu dropdown-menu-default">
									<!-- <li>
										<a href="#!">
											<i class="icon-user"></i> Profil </a>
									</li> -->
									<li>
										<a href="<?php echo site_url('spv/bantuan'); ?>">
											<i class="icon-rocket"></i> Bantuan
											<!-- <span class="badge badge-success"> 7 </span> -->
										</a>
									</li>
									<li class="divider"> </li>
									<!-- <li>
										<a href="page_user_lock_1.html">
											<i class="icon-lock"></i> Lock Screen </a>
									</li> -->
									<li>
										<a href="<?php echo site_url('Auth/logout'); ?>">
											<i class="icon-key"></i> Keluar </a>
									</li>
								</ul>
							</li>
							<!-- END USER LOGIN DROPDOWN -->
						</ul>
					</div>
					<!-- END TOP NAVIGATION MENU -->
				</div>
			</div>
			<!-- END HEADER TOP -->
			<!-- BEGIN HEADER MENU -->
			<div class="page-header-menu">
				<div class="container">
					<!-- BEGIN HEADER SEARCH BOX -->
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
					<!-- END HEADER SEARCH BOX -->
					<!-- BEGIN MEGA MENU -->
					<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
					<!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
					<div class="hor-menu  ">
						<ul class="nav navbar-nav">
							<li class="menu-dropdown classic-menu-dropdown <?php if($parent=='home'){echo 'active';}else{echo '';} ?>">
								<a href="<?php echo site_url('spv/beranda'); ?>"><i class="icon-bulb"></i> Profil
								</a>
							</li>
							<li class="menu-dropdown classic-menu-dropdown <?php if($parent=='dashboard'){echo 'active';}else{echo '';} ?>">
								<a href="javascript:;"><i class="icon-frame"></i> Dashboard
									<span class="arrow <?php if($parent=='dashboard'){echo 'open';}else{echo '';} ?>"></span>
								</a>
								<ul class="dropdown-menu pull-left">
									<?php
									$where_wilayah = '';
									$getdataprofile = $this->Main_model->getSelectedData('user_profile a', 'a.wilayah,b.role_id', array('a.user_id' => $this->session->userdata('id')), '', '', '', '', array(
										'table' => 'user_to_role b',
										'on' => 'a.user_id=b.user_id',
										'pos' => 'LEFT'
									))->row();
									if($getdataprofile->role_id=='5'){
									?>
									<li class=" <?php if($child=='map'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('spv/peta_provinsi/'.md5($getdataprofile->wilayah)); ?>" class="nav-link nav-toggle ">
											<i class="icon-map"></i> Dashboard Peta
										</a>
									</li>
									<li class=" <?php if($child=='graph'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('spv/dasbor_grafik_provinsi/'.md5($getdataprofile->wilayah)); ?>" class="nav-link nav-toggle ">
											<i class="icon-graph"></i> Dashboard Grafik
										</a>
									</li>
									<?php
									}elseif($getdataprofile->role_id=='6'){
									?>
									<li class=" <?php if($child=='map'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('spv/peta_kabupaten/'.md5($getdataprofile->wilayah)); ?>" class="nav-link nav-toggle ">
											<i class="icon-map"></i> Dashboard Peta
										</a>
									</li>
									<li class=" <?php if($child=='graph'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('spv/dasbor_grafik_kabupaten/'.md5($getdataprofile->wilayah)); ?>" class="nav-link nav-toggle ">
											<i class="icon-graph"></i> Dashboard Grafik
										</a>
									</li>
									<?php
									}else{echo'';}
									?>
									<!-- <li class=" <?php if($child=='map'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('spv/dasbor_peta'); ?>" class="nav-link nav-toggle ">
											<i class="icon-map"></i> Dashboard Peta
										</a>
									</li>
									<li class=" <?php if($child=='graph'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('spv/dasbor_grafik'); ?>" class="nav-link nav-toggle ">
											<i class="icon-graph"></i> Dashboard Grafik
										</a>
									</li> -->
								</ul>
							</li>
							<li class="menu-dropdown classic-menu-dropdown <?php if($parent=='master'){echo 'active';}else{echo '';} ?>">
								<a href="javascript:;"><i class="icon-drawer"></i> Master
									<span class="arrow <?php if($parent=='master'){echo 'open';}else{echo '';} ?>"></span>
								</a>
								<ul class="dropdown-menu pull-left">
									<li class=" <?php if($child=='kube'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('spv/kube'); ?>" class="nav-link nav-toggle ">
											<i class="icon-grid"></i> Data Kube
										</a>
									</li>
									<li class=" <?php if($child=='rutilahu'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('spv/rutilahu'); ?>" class="nav-link nav-toggle ">
											<i class="icon-home"></i> Data Rutilahu
										</a>
									</li>
									<li class=" <?php if($child=='sarling'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('spv/sarling'); ?>" class="nav-link nav-toggle ">
											<i class="icon-layers"></i> Data Sarling
										</a>
									</li>
								</ul>
							</li>
							<li class="menu-dropdown classic-menu-dropdown <?php if($parent=='report'){echo 'active';}else{echo '';} ?>">
								<a href="javascript:;"><i class="icon-notebook"></i> Laporan
									<span class="arrow <?php if($parent=='report'){echo 'open';}else{echo '';} ?>"></span>
								</a>
								<ul class="dropdown-menu pull-left">
									<li class=" <?php if($child=='kube'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('spv/laporan_kube'); ?>" class="nav-link nav-toggle ">
											<i class="icon-grid"></i> Data Kube
										</a>
									</li>
									<li class=" <?php if($child=='rutilahu'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('spv/laporan_rutilahu'); ?>" class="nav-link nav-toggle ">
											<i class="icon-home"></i> Data Rutilahu
										</a>
									</li>
									<li class=" <?php if($child=='sarling'){echo 'active';}else{echo '';} ?>">
										<a href="<?php echo site_url('spv/laporan_sarling'); ?>" class="nav-link nav-toggle ">
											<i class="icon-layers"></i> Data Sarling
										</a>
									</li>
								</ul>
							</li>
							<!-- <li class="menu-dropdown classic-menu-dropdown <?php if($parent=='report'){echo 'active';}else{echo '';} ?>">
								<a href="<?php echo site_url('spv/laporan'); ?>"><i class="icon-notebook"></i> Laporan
								</a>
							</li> -->
							<li class="menu-dropdown classic-menu-dropdown <?php if($parent=='log_activity'){echo 'active';}else{echo '';} ?>">
								<a href="<?php echo site_url('spv/log_activity'); ?>"><i class="fa fa-rss"></i> Log Aktifitas
								</a>
							</li>
							<!-- <li class="menu-dropdown classic-menu-dropdown <?php if($parent=='about'){echo 'active';}else{echo '';} ?>">
								<a href="<?php echo site_url('spv/tentang_aplikasi'); ?>"><i class="icon-bulb"></i> Tentang Aplikasi
								</a>
							</li> -->
						</ul>
					</div>
					<!-- END MEGA MENU -->
				</div>
			</div>
			<!-- END HEADER MENU -->
		</div>
		<!-- END HEADER -->
		<!-- BEGIN CONTAINER -->
		<div class="page-container">
			<!-- BEGIN CONTENT -->
			<div class="page-content-wrapper">
				<!-- BEGIN CONTENT BODY -->
				<!-- BEGIN PAGE HEAD-->
				<div class="page-head">
					<div class="container">
						<!-- BEGIN PAGE TITLE -->
						<div class="page-title">
							<h1>Dashboard
								<small>Sistem Informasi</small>
							</h1>
						</div>
						<!-- END PAGE TITLE -->
						<!-- BEGIN PAGE TOOLBAR -->
						<div class="page-toolbar">
							<!-- BEGIN THEME PANEL -->
							<div class="btn-group btn-theme-panel">
								<!-- <a href="#" title="Setting Informasi Aplikasi" class="btn dropdown-toggle" >
									<i class="icon-settings"></i>
								</a> -->
								<script type="text/javascript">function startTime(){var today=new Date(),curr_hour=today.getHours(),curr_min=today.getMinutes(),curr_sec=today.getSeconds();curr_hour=checkTime(curr_hour);curr_min=checkTime(curr_min);curr_sec=checkTime(curr_sec);document.getElementById('clock').innerHTML=curr_hour+":"+curr_min+":"+curr_sec;}function checkTime(i){if(i<10){i="0"+i;}return i;}setInterval(startTime,500);</script>
								<span class="tanggalwaktu">
								<?= $this->Main_model->convert_hari(date('Y-m-d')).', '.$this->Main_model->convert_tanggal(date('Y-m-d')) ?>  -  Pukul  <span id="clock">13:53:45</span>
								</span>
							</div>
						</div>
						<!-- END PAGE TOOLBAR -->
					</div>
				</div>
				<!-- END PAGE HEAD-->
				<!-- BEGIN PAGE CONTENT BODY -->
				<div class="page-content">
					<div class="container">
						<!-- BEGIN PAGE BREADCRUMBS -->
<?php } ?>
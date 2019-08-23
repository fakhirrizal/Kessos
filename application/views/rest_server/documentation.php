<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Apps</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
		<link href="https://sitri.online/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="https://sitri.online/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
		<link href="https://sitri.online/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="https://sitri.online/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
		<link href="https://sitri.online/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
		<link href="https://sitri.online/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
		<link href="https://sitri.online/assets/pages/css/blog.min.css" rel="stylesheet" type="text/css" />
		<link href="https://sitri.online/assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
		<link href="https://sitri.online/assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
		<link href="https://sitri.online/assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
		<link href="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Logo_of_the_Ministry_of_Social_Affairs_of_the_Republic_of_Indonesia.svg/220px-Logo_of_the_Ministry_of_Social_Affairs_of_the_Republic_of_Indonesia.svg.png" rel="icon" type="image/x-icon">
	</head>

		<body class="page-container-bg-solid page-md">
		<div class="page-container">
			<div class="page-content-wrapper">
				<div class="page-head">
					<div class="container">
						<div class="page-title">
							<h1>Dashboard
								<small>Sistem Informasi</small>
							</h1>
						</div>
					</div>
				</div>
				<div class="page-content">
					<div class="container">
						<div class="page-content-inner">
							<div class="m-heading-1 border-green m-bordered">
								<h2>Dokumentasi API</h2>
								<p><strong>Note:</strong> The <strong>data-parent</strong> attribute makes sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.</p>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="portlet light ">
										<div class="portlet-body">
											<h2>User Authentification</h2>
											<div class="panel-group accordion" id="accordion1">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1_1"> <span class="label label-info">POST</span>&nbsp;{url}/login </a>
														</h4>
													</div>
													<div id="collapse_1_1" class="panel-collapse in">
														<div class="panel-body">
															<p> Fungsi untuk bisa masuk ke sistem, berikut parameter yang harus dipenuhi. </p>
															<code>
																{<br>&nbsp; &nbsp; &nbsp;
																	"username": "string",<br>&nbsp; &nbsp; &nbsp;
																	"password": "string"<br>
																}
															</code>
															<p> Berikut data balikannya jika parameter yang dihantarkan terdaftar di database. </p>
															<code>
																{<br>&nbsp; &nbsp; &nbsp;
																	"user_id": "int",<br>&nbsp; &nbsp; &nbsp;
																	"nama": "string",<br>&nbsp; &nbsp; &nbsp;
																	"nik": "string",<br>&nbsp; &nbsp; &nbsp;
																	"tanggal_lahir": "YYYY-mm-dd",<br>&nbsp; &nbsp; &nbsp;
																	"alamat": "string",<br>&nbsp; &nbsp; &nbsp;
																	"foto": "base64",<br>
																}
															</code>
														</div>
													</div>
												</div>
											</div>
											<h2>Data Master</h2>
											<div class="portlet box yellow">
												<div class="portlet-title">
													<div class="caption">
														<i></i>Data Kube (Kelompok Usaha Bersama) </div>
													<div class="tools">
														<a href="javascript:;" class="collapse"> </a>
													</div>
												</div>
												<div class="portlet-body">
													<div class="panel-group accordion" id="accordion2_1">
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion2_1" href="#collapse_2_1_1"> <span class="label label-success">GET</span>&nbsp;{url}/kube </a>
																</h4>
															</div>
															<div id="collapse_2_1_1" class="panel-collapse in">
																<div class="panel-body">
																	<p> Fungsi untuk melihat semua data kube, berikut data balikannya. </p>
																	<code>
																		{<br>&nbsp; &nbsp; &nbsp;
																			"id_kube": "int",<br>&nbsp; &nbsp; &nbsp;
																			"nama_kelompok": "string",<br>&nbsp; &nbsp; &nbsp;
																			"alamat": "string",<br>&nbsp; &nbsp; &nbsp;
																			"rencana_anggaran": "string",<br>&nbsp; &nbsp; &nbsp;
																			"jumlah_anggota": "int",<br>&nbsp; &nbsp; &nbsp;
																			"jenis_usaha": "string",<br>&nbsp; &nbsp; &nbsp;
																			"nm_provinsi": "string",<br>&nbsp; &nbsp; &nbsp;
																			"nm_kabupaten": "string",<br>&nbsp; &nbsp; &nbsp;
																			"nm_kecamatan": "string",<br>&nbsp; &nbsp; &nbsp;
																			"nm_desa": "string"<br>
																		}
																	</code>
																</div>
															</div>
														</div>
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion2_1" href="#collapse_2_1_2"> <span class="label label-success">GET</span>&nbsp;{url}/kube?id_kube={$id_kube} </a>
																</h4>
															</div>
															<div id="collapse_2_1_2" class="panel-collapse in">
																<div class="panel-body">
																	<p> Fungsi untuk melihat data kube berdasarkan id_kube yang dipilih, berikut data balikannya. </p>
																	<code>
																		{<br>&nbsp; &nbsp; &nbsp;
																			"id_kube": "int",<br>&nbsp; &nbsp; &nbsp;
																			"nama_kelompok": "string",<br>&nbsp; &nbsp; &nbsp;
																			"alamat": "string",<br>&nbsp; &nbsp; &nbsp;
																			"rencana_anggaran": "string",<br>&nbsp; &nbsp; &nbsp;
																			"jumlah_anggota": "int",<br>&nbsp; &nbsp; &nbsp;
																			"jenis_usaha": "string",<br>&nbsp; &nbsp; &nbsp;
																			"nm_provinsi": "string",<br>&nbsp; &nbsp; &nbsp;
																			"nm_kabupaten": "string",<br>&nbsp; &nbsp; &nbsp;
																			"nm_kecamatan": "string",<br>&nbsp; &nbsp; &nbsp;
																			"nm_desa": "string"<br>
																		}
																	</code>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<h2>Data Laporan</h2>
											<div class="panel-group accordion" id="accordion3">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3_1"> Fungsi #1 </a>
														</h4>
													</div>
													<div id="collapse_3_1" class="panel-collapse in">
														<div class="panel-body">
															<p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
															<p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
																eiusmod. </p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="page-prefooter">
			<div class="container">
				<div class="row">
				</div>
			</div>
		</div>
		<div class="page-footer">
			<div class="container">2019 © Kementerian Sosial Republik Indonesia - Metronic by keenthemes.
			</div>
		</div>
		<div class="scroll-to-top">
		<img src='http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-5/256/navigate-up-icon.png' width='20%' />
		</div>
		<script src="https://sitri.online/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<script src="https://sitri.online/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="https://sitri.online/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
		<script src="https://sitri.online/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
		<script src="https://sitri.online/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<script src="https://sitri.online/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
		<script src="https://sitri.online/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
		<script src="https://sitri.online/assets/global/scripts/app.min.js" type="text/javascript"></script>
		<script src="https://sitri.online/assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
		<script src="https://sitri.online/assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
		<script src="https://sitri.online/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
	</body>

</html>
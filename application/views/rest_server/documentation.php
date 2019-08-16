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
		<link rel="shortcut icon" href="https://sitri.online/assets/icon.png" /> </head>

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
											<div class="panel-group" id="accordion">
												<div class="heading">
													<h4>
														<a class="toggleEndpointList">KUBE (Kelompok Usaha Bersama)</a>
													</h4>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" class="collapsed"><span class="label label-warning">PUT</span>&nbsp;{url}/kube</a>
														</h4>
													</div>
													<div id="collapse5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
														<div class="panel-body">
															Fungsi untuk mengubah data master kube tingkat desa<br>Berikut beberapa atribut yang harus diisi,
															<div class="signature-container">
																<div class="snippet" style="display: block;">
																	<div class="snippet_json" style="display: block;">
																		<pre>
																			<code>{
	"id_desa": "int",
	"jumlah_umkm": "int",
	"bidang_usaha_terbesar": "string"
}</code>
																		</pre>
																	</div>
																</div>
																Keterangan :
																<ul>
																	<li>Index "id_desa" digunakan sebagai parameter untuk mengubah data lain.</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="heading">
													<h4>
														<a class="toggleEndpointList">RUTILAHU (Rumah Tidak Layak Huni)</a>
													</h4>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion" href="#collapse69" aria-expanded="false" class="collapsed"><span class="label label-warning">PUT</span>&nbsp;{url}/rutilahu</a>
														</h4>
													</div>
													<div id="collapse69" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
														<div class="panel-body">
															Fungsi untuk mengubah data master rutilahu tingkat desa<br>Berikut beberapa atribut yang harus diisi,
															<div class="signature-container">
																<div class="snippet" style="display: block;">
																	<div class="snippet_json" style="display: block;">
																		<pre>
																			<code>{
	"id_desa": "int",
	"rutilahu": "int",
	"rulahu": "int",
	"terdata": "int",
	"estimasi_belum_terdata": "int"
}</code>
																		</pre>
																	</div>
																</div>
																Keterangan :
																<ul>
																	<li>Index "id_desa" digunakan sebagai parameter untuk mengubah data lain.</li>
																</ul>
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
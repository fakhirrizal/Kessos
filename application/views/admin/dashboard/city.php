<style>
	/* Always set the map height explicitly to define the size of the div
	* element that contains the map. */
	#map {
	height: 615px;
	}
	#capture {
	height: 360px;
	width: 480px;
	overflow: hidden;
	float: left;
	background-color: #ECECFB;
	border: thin solid #333;
	border-left: none;
	}
	/* Optional: Makes the sample page fill the window. */
	html, body {
	height: 100%;
	margin: 0;
	padding: 0;
	}
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- <ul class="page-breadcrumb breadcrumb">
	<li>
		<span>Laporan</span>
	</li>
</ul> -->
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="page-content-inner">
	<div class="m-heading-1 border-green m-bordered">
		<h3>Catatan</h3>
		<!-- <p> Ketika mengklik <b>Atur Ulang Sandi</b>, maka kata sandi otomatis menjadi "<b>1234</b>"</p> -->
	</div>
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet light ">
				<div class="portlet-body">
					<div id="map" class="c-content-contact-1-gmap">
					<br>
					<hr>
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-12">

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnjlDXASsyIUKAd1QANakIHIM8jjWWyNU" type="text/javascript"></script>
<script>
	var map;
	var marker;

	function initMap() {
		// Variabel untuk menyimpan informasi (desc)
		var infoWindow = new google.maps.InfoWindow;

		//  Variabel untuk menyimpan peta Roadmap
		var mapOptions = {
		mapTypeId: google.maps.MapTypeId.ROADMAP
		}

		map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -6.994163, lng: 110.416438},
		zoom: 8
		});

		// Variabel untuk menyimpan batas kordinat
		var bounds = new google.maps.LatLngBounds();

		// Pengambilan data dari database
		<?php
			foreach ($data_marker as $key => $value) {
				$nama = $value->nm_kecamatan;
				$lat = $value->lintang;
				$lon = $value->bujur;
				$id = $value->id_kecamatan;
				$nama_file = '';
				$style = 'style="text-align: center"';
				$id_enkrip = md5($id);
				$url = site_url('admin_side/peta_kecamatan/'.$id_enkrip);
				echo ("addMarker($lat, $lon, '<div $style><b>$nama</b><br>3,980,222 (21%)<hr><a href=$url>Klik disini untuk data detail</a></div>');\n");
			}
		?>

		// Proses membuat marker
		function addMarker(lat, lng, info) {
			var lokasi = new google.maps.LatLng(lat, lng);
			bounds.extend(lokasi);
			var marker = new google.maps.Marker({
				map: map,
				position: lokasi
			});
			map.fitBounds(bounds);
			bindInfoWindow(marker, map, infoWindow, info);
		}

		// Menampilkan informasi pada masing-masing marker yang diklik
		function bindInfoWindow(marker, map, infoWindow, html) {
		google.maps.event.addListener(marker, 'click', function() {
			infoWindow.setContent(html);
			infoWindow.open(map, marker);
		});
		}
		var situs = 'http://pfm.gbnku.co.id/assets/peta_kabupaten/';
		var nama_file = '<?php echo $kml ?>';
		var situs_full = situs.concat(nama_file);
		var kmldashboard = new google.maps.KmlLayer({

		url: situs_full,
		map: map
		});
	}
	google.maps.event.addDomListener(window, 'load', initMap);
</script>

<div class="c-content-contact-1 c-opt-1">
	</div>
</div>
<div class="row">
	<br>
	<div class="tabbable-custom nav-justified">
		<ul class="nav nav-tabs nav-justified">
			<li class="active">
				<a href="#tab_1_1_1" data-toggle="tab" aria-expanded="true"> Laporan Program Kube (Kelompok Usaha Bersama) </a>
			</li>
			<li class="">
				<a href="#tab_1_1_4" data-toggle="tab" aria-expanded="false"> Laporan Program Rutilahu (Rumah Tidak Layak Huni) </a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="tab_1_1_1">
				<!-- <div class="cbp-l-project-details-title">
					<span>Keterangan Data</span>
				</div> -->
				<div class="cbp-l-project-details-list" style="text-align: center;">
					<table class="table">
						<thead>
							<tr>
								<th style='text-align: center'>#</th>
								<th style='text-align: center'>Nama Kecamatan</th>
								<th style='text-align: center'>Jumlah UMKM</th>
								<th style='text-align: center'>Bidang Usaha Terbesar</th>
								<th style='text-align: center'>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1.</td>
								<td>Penjaringan</td>
								<td>2,980</td>
								<td>Kerajinan Tangan</td>
								<td>
									<div class="btn-group" style="text-align: center;">
										<button class="btn btn-xs green" type="button"> Detail Data
											<!-- <i class="fa fa-eye"></i> -->
										</button>
									</div>
								</td>
							</tr>
							<tr>
								<td>2.</td>
								<td>Pademangan</td>
								<td>4,107</td>
								<td>Usaha Makanan</td>
								<td>
									<div class="btn-group" style="text-align: center;">
										<button class="btn btn-xs green" type="button"> Detail Data
											<!-- <i class="fa fa-eye"></i> -->
										</button>
									</div>
								</td>
							</tr>
							<tr>
								<td>3.</td>
								<td>Tanjung Priok</td>
								<td>3,197</td>
								<td>Usaha Makanan</td>
								<td>
									<div class="btn-group" style="text-align: center;">
										<button class="btn btn-xs green" type="button"> Detail Data
											<!-- <i class="fa fa-eye"></i> -->
										</button>
									</div>
								</td>
							</tr>
							<tr>
								<td>4.</td>
								<td>Koja</td>
								<td>3,762</td>
								<td>Usaha Makanan</td>
								<td>
									<div class="btn-group" style="text-align: center;">
										<button class="btn btn-xs green" type="button"> Detail Data
											<!-- <i class="fa fa-eye"></i> -->
										</button>
									</div>
								</td>
							</tr>
							<tr>
								<td>5.</td>
								<td>Kelapa Gading</td>
								<td>2,985</td>
								<td>Usaha Makanan</td>
								<td>
									<div class="btn-group" style="text-align: center;">
										<button class="btn btn-xs green" type="button"> Detail Data
											<!-- <i class="fa fa-eye"></i> -->
										</button>
									</div>
								</td>
							</tr>
							<tr>
								<td>6.</td>
								<td>Cilincing</td>
								<td>3,914</td>
								<td>Usaha Makanan</td>
								<td>
									<div class="btn-group" style="text-align: center;">
										<button class="btn btn-xs green" type="button"> Detail Data
											<!-- <i class="fa fa-eye"></i> -->
										</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane" id="tab_1_1_4">
				<!-- <div class="cbp-l-project-details-title">
					<span>Keterangan Data</span>
				</div> -->
				<div class="cbp-l-project-details-list" style="text-align: justify;">
					<table class="table">
						<tbody>
							<tr class="header">
								<td class="idx"></td>
								<td class="idx">#</td>
								<td class="name">Wilayah</td>
								<td class="sum pas1">Rumah Tidak Layak Huni</td>
								<td class="sum pas2">Rumah Layak Huni</td>
								<td class="sum sah">Terdata</td>
								<td class="sum tsah">Estimasi Belum Terdata</td>
							</tr>
							<tr class="row">
								<td class="idx">1.</td>
								<td class="name darken">
									<a href="#pilpres:1">Penjaringan</a>
								</td>
								<td class="sum pas pas1 per ">
									<span class="abs">397.188</span><span class="per"> (14,46%)</span>
								</td>
								<td class="sum pas pas2 per win">
									<span class="abs">2.349.288</span><span class="per"> (85,54%)</span>
								</td>
								<td class="sum sah error">
									<span class="sah">2.740.814</span>
								</td>
								<td class="sum tsah">
									<span class="tsah">89.733</span>
								</td>
							</tr>
							<tr class="row">
								<td class="idx">2.</td>
								<td class="name darken">
									<a href="#pilpres:6728">Pademangan</a>
								</td>
								<td class="sum pas pas1 per win">
									<span class="abs">3.878.670</span><span class="per"> (52,19%)</span>
								</td>
								<td class="sum pas pas2 per ">
									<span class="abs">3.553.749</span><span class="per"> (47,81%)</span>
								</td>
								<td class="sum sah error">
									<span class="sah">7.405.496</span>
								</td>
								<td class="sum tsah">
									<span class="tsah">134.702</span>
								</td>
							</tr>
							<tr class="row">
								<td class="idx">3</td>
								<td class="name darken">
									<a href="#pilpres:12920">Tanjung Priok</a>
								</td>
								<td class="sum pas pas1 per ">
									<span class="abs">404.728</span><span class="per"> (14,05%)</span>
								</td>
								<td class="sum pas pas2 per win">
									<span class="abs">2.476.300</span><span class="per"> (85,95%)</span>
								</td>
								<td class="sum sah error">
									<span class="sah">2.879.305</span>
								</td>
								<td class="sum tsah">
									<span class="tsah">43.324</span>
								</td>
							</tr>
							<tr class="row">
								<td class="idx">4</td>
								<td class="name darken">
									<a href="#pilpres:12920">Koja</a>
								</td>
								<td class="sum pas pas1 per ">
									<span class="abs">94.728</span><span class="per"> (10,96%)</span>
								</td>
								<td class="sum pas pas2 per win">
									<span class="abs">1.321.333</span><span class="per"> (64,71%)</span>
								</td>
								<td class="sum sah error">
									<span class="sah">1.123.305</span>
								</td>
								<td class="sum tsah">
									<span class="tsah">43.324</span>
								</td>
							</tr>
							<tr class="row">
								<td class="idx">5</td>
								<td class="name darken">
									<a href="#pilpres:12920">Kelapa Gading</a>
								</td>
								<td class="sum pas pas1 per ">
									<span class="abs">404.728</span><span class="per"> (14,05%)</span>
								</td>
								<td class="sum pas pas2 per win">
									<span class="abs">2.476.300</span><span class="per"> (85,95%)</span>
								</td>
								<td class="sum sah error">
									<span class="sah">2.879.305</span>
								</td>
								<td class="sum tsah">
									<span class="tsah">43.324</span>
								</td>
							</tr>
							<tr class="row">
								<td class="idx">6</td>
								<td class="name darken">
									<a href="#pilpres:12920">Cilincing</a>
								</td>
								<td class="sum pas pas1 per ">
									<span class="abs">404.728</span><span class="per"> (14,05%)</span>
								</td>
								<td class="sum pas pas2 per win">
									<span class="abs">2.476.300</span><span class="per"> (85,95%)</span>
								</td>
								<td class="sum sah error">
									<span class="sah">2.879.305</span>
								</td>
								<td class="sum tsah">
									<span class="tsah">43.324</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

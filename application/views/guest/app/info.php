<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ditjen PFM - Kementerian Sosial Republik Indonesia</title>

        <link rel="stylesheet" href="http://sikapdaya.kemsos.go.id/css/limitless.css">
        <link rel="stylesheet" href="http://sikapdaya.kemsos.go.id/css/core.css">
        <!-- <link rel="stylesheet" href="http://sikapdaya.kemsos.go.id/css/components.css"> -->
        <link rel="stylesheet" href="http://sikapdaya.kemsos.go.id/css/colors.css">
        <link rel="stylesheet" href="http://sikapdaya.kemsos.go.id/css/app.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css" />

        <link href="<?=base_url('assets/global/plugins/datatables/datatables.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/select2/css/select2.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/select2/css/select2-bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/css/components-md.min.css');?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url('assets/global/css/plugins-md.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/pages/css/blog.min.css');?>" rel="stylesheet" type="text/css" />
        
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <!-- <script src="<?=base_url('application/views/dashboard/chart/chart_full.js');?>" type="text/javascript"></script> -->

        <meta name="author" content="Kementerian Sosial Republik Indonesia">
        <meta name="description" content="Kementerian Sosial Republik Indonesia">
        <link rel="canonical" href="http://sikapdaya.kemsos.go.id">

        <meta name="description" content="Kementerian Sosial Republik Indonesia">

        <meta name="theme-color" content="#134990">
        <meta name="msapplication-navbutton-color" content="#134990">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <link type="text/plain" rel="author" href="http://sikapdaya.kemsos.go.id/humans.txt">

        <link rel="shortcut icon" href="http://sikapdaya.kemsos.go.id/favicon.ico">
        <style>
            div.footer {
                line-height: 2;
            }
        </style>

    </head>
    <body class="" cz-shortcut-listen="true">
        <div id="landingpage" class="page-container" style="min-height:404px">
            <div class="page-content">
                <div class="content-wrapper">
                    <div class="content">
                        <div class="wt row">
                            <div class="col-md-10 col-sm-10 col-xs-9">
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <a href="http://www.kemsos.go.id">
                                        <img src="http://sikapdaya.kemsos.go.id/images/logo-with-text.png" alt="kemsos" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <h3><strong>Dashboard Bantuan Sosial Reguler</strong></h3>
                                    <!-- <h3>Sistem Informasi Manajemen Kube, Rutilahu dan Sarling<br>Direktorat Penanganan Fakir Miskin Perkotaan Wilayah II<br>Kementerian Sosial Republik Indonesia</h3> -->
                                    <h3><br>Direktorat Penanganan Fakir Miskin Perkotaan Wilayah II<br>Kementerian Sosial Republik Indonesia</h3>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-12">
                                <a href="<?=base_url('login')?>" class="btn btn-danger">Manajemen <i class="icon-key"></i></a>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tabbable-line">
                                <ul class="nav nav-tabs ">
                                    <li>
                                        <a href="<?=base_url('data_peta')?>"> Data dalam bentuk Peta </a>
                                    </li>
                                    <li >
                                        <a href="<?=base_url('data_grafik')?>"> Data dalam bentuk Grafik </a>
                                    </li>
                                    <li class="active">
                                        <a href="#"> Info PFM </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel panel-flat panel-dayasos-portal">
                                <div class="panel-heading">
                                    <!-- <h5 class="panel-title"> Direktorat Jenderal Pemberdayaan Sosial</h5> -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <article>
                                                        <div class="post-slider">
                                                            <div class="post-heading">
                                                                <h3>
                                                                    <a href="https://kemsos.go.id/kube">
                                                                                                                                        Kelompok Usaha Bersama (KUBE)
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <!-- start flexslider -->
                                                            <div class="p-slider flexslider">
                                                                <ul class="slides">
                                                                    <img width='100%' src="https://kemsos.go.id/uploads/topics/15669684375926.jpg" alt="2019.03.08_Desain Leaflet PFM-KUBE REVISI X5 Kuning Revisi_Page_2">
                                                                    <img width='100%' src="https://kemsos.go.id/uploads/topics/15669684304168.jpg" alt="2019.03.08_Desain Leaflet PFM-KUBE REVISI X5 Kuning Revisi_Page_1">
                                                                </ul>
                                                            </div>
                                                            <!-- end flexslider -->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="col-lg-12">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>Apa itu Penanganan Fakir Miskin?Penanganan Fakir Miskin adalah upaya yang terarah, terpadu, dan berkelanjutan yang dilakukan Pemerintah Pusat, Pemerintah Daerah, dan/atau masyarakat dalam bentuk kebijakan, program, kegiatan pemberdayaan, pendampingan, serta fasilitasi untuk memenuhi kebutuhan dasar setiap warga negara.Apa itu Kelompok Usaha Bersama...</p>
                                                        <div class="bottom-article">
                                                            <a href="https://kemsos.go.id/kube" class="pull-right">Baca lebih lanjut <i class="fa fa-caret-right"></i></a>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                            <div class="row">                                    
                                                <div class="col-lg-12">
                                                    <article>
                                                        <div class="post-slider">
                                                            <div class="post-heading">
                                                                <h3>
                                                                    <a href="https://kemsos.go.id/rutilahu">
                                                                                                                                        Rehabilitasi Sosial Rumah Tidak Layak Huni (RS-Rutilahu)
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <!-- start flexslider -->
                                                            <div class="p-slider flexslider">
                                                                <ul class="slides">
                                                                    <img width='100%' src="https://kemsos.go.id/uploads/topics/15669689708704.jpg" alt="2019.03.08_Desain Leaflet PFM-Rutilahu REVISI X5 Kuning Revisi_Page_1">
                                                                    <img width='100%' src="https://kemsos.go.id/uploads/topics/15669689707860.jpg" alt="2019.03.08_Desain Leaflet PFM-Rutilahu REVISI X5 Kuning Revisi_Page_2">
                                                                </ul>
                                                            </div>
                                                            <!-- end flexslider -->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="col-lg-12">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>Apa itu Penanganan Fakir Miskin?Penanganan Fakir Miskin adalah upaya yang terarah, terpadu, dan berkelanjutan yang dilakukan Pemerintah, Pemerintah Daerah, dan/atau masyarakat dalam bentuk kebijakan, program, kegiatan pemberdayaan, pendampingan, serta fasilitasi untuk memenuhi kebutuhan dasar setiap warga negara.Apa itu Rehabilitasi Sosial Rumah Ti...</p>
                                                        <div class="bottom-article">
                                                            <a href="https://kemsos.go.id/rutilahu" class="pull-right">Baca lebih lanjut <i class="fa fa-caret-right"></i></a>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                            <div class="row">                                    
                                                <div class="col-lg-12">
                                                    <article>
                                                        <div class="post-slider">
                                                            <div class="post-heading">
                                                                <h3>
                                                                    <a href="https://kemsos.go.id/sarling">
                                                                                                                                        Sarana Prasarana Lingkungan (SARLING)
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <!-- start flexslider -->
                                                            <div class="p-slider flexslider">
                                                                <ul class="slides">
                                                                    <img width='100%' src="https://kemsos.go.id/uploads/topics/15669692442449.jpg" alt="2019.03.13_Desain Leaflet PFM-Sarling REVISI X5 Kuning Revisi_Page_2">
                                                                    <img width='100%' src="https://kemsos.go.id/uploads/topics/15669692456688.jpg" alt="2019.03.13_Desain Leaflet PFM-Sarling REVISI X5 Kuning Revisi_Page_1">
                                                                </ul>
                                                            </div>
                                                            <!-- end flexslider -->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="col-lg-12">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>Apa itu Penanganan Fakir Miskin?Penanganan Fakir Miskin adalah upaya yang terarah, terpadu, dan berkelanjutan yang dilakukan Pemerintah, Pemerintah Daerah, dan/atau masyarakat dalam bentuk kebijakan, program, kegiatan pemberdayaan, pendampingan, serta fasilitasi untuk memenuhi kebutuhan dasar setiap warga negara.Apa itu Sarana Prasarana Lingkungan...</p>
                                                        <div class="bottom-article">
                                                            <a href="https://kemsos.go.id/sarling" class="pull-right">Baca lebih lanjut <i class="fa fa-caret-right"></i></a>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <hr>
                            <div class="footer text-muted text-center">
                            Contact Person Office 021-3103637/79 /EXT 2529
                            <br>Alamat Email : sekretariat@kemsos.go.id
                            <br>
                            © 2019 <a href="#">Direktorat Penanganan Fakir Miskin Perkotaan Wilayah II - Kementerian Sosial RI</a>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- <script async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript">
                window.Laravel = {
                    csrfToken: "brcwbe7X2kN2pERYtWMZ6FmEg6vNClpvFl1u8XvX",
                    usr:  null ,
                };
            </script> -->
            <!-- <script type="text/javascript" src="http://sikapdaya.kemsos.go.id/js/app.js"></script> -->
        
            <script src="<?=base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/js.cookie.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');?>" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="<?=base_url('assets/global/scripts/datatable.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/datatables/datatables.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/select2/js/select2.full.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/jquery-validation/js/additional-methods.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/ladda/spin.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/ladda/ladda.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/scripts/app.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/pages/scripts/components-select2.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/pages/scripts/form-wizard.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/pages/scripts/ui-buttons.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/pages/scripts/ui-blockui.min.js');?>" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="<?=base_url('assets/layouts/layout3/scripts/layout.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/layouts/layout3/scripts/demo.min.js');?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/layouts/global/scripts/quick-sidebar.min.js');?>" type="text/javascript"></script>

            <!-- <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-42987507-5', 'auto');
            ga('send', 'pageview');
            </script> -->
        </div>
    </body>
</html>
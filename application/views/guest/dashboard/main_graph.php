<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ditjen PFM - Kementerian Sosial Republik Indonesia</title>

        <link rel="stylesheet" href="https://sikapdaya.kemsos.go.id/css/limitless.css">
        <link rel="stylesheet" href="https://sikapdaya.kemsos.go.id/css/core.css">
        <!-- <link rel="stylesheet" href="https://sikapdaya.kemsos.go.id/css/components.css"> -->
        <link rel="stylesheet" href="https://sikapdaya.kemsos.go.id/css/colors.css">
        <link rel="stylesheet" href="https://sikapdaya.kemsos.go.id/css/app.css">
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
        <link rel="canonical" href="https://sikapdaya.kemsos.go.id">

        <meta name="description" content="Kementerian Sosial Republik Indonesia">

        <meta name="theme-color" content="#134990">
        <meta name="msapplication-navbutton-color" content="#134990">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <link type="text/plain" rel="author" href="https://sikapdaya.kemsos.go.id/humans.txt">

        <link rel="shortcut icon" href="https://sikapdaya.kemsos.go.id/favicon.ico">
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
                                        <img src="https://sikapdaya.kemsos.go.id/images/logo-with-text.png" alt="kemsos" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <h2><strong>Dashboard Bantuan Sosial Reguler</strong></h2>
                                    <!-- <h3>Sistem Informasi Manajemen Kube, Rutilahu dan Sarling<br>Direktorat Penanganan Fakir Miskin Wilayah II<br>Kementerian Sosial Republik Indonesia</h3> -->
                                    <h3>Direktorat Penanganan Fakir Miskin Wilayah II<br>Kementerian Sosial Republik Indonesia</h3>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-12">
                                <br><br><br><a href="<?=base_url('login')?>" class="btn btn-danger">Manajemen <i class="icon-key"></i></a>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tabbable-line">
                                <ul class="nav nav-tabs ">
                                    <li>
                                        <a href="<?=base_url('data_peta')?>"> Data dalam bentuk Peta </a>
                                    </li>
                                    <li class="active">
                                        <a href="#"> Data dalam bentuk Grafik </a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url('info')?>"> Info PFM </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel panel-flat panel-dayasos-portal">
                                <div class="panel-heading">
                                    <!-- <h5 class="panel-title"> Direktorat Jenderal Pemberdayaan Sosial</h5> -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="<?=base_url('data_grafik');?>" method="post">
                                                <div class="form-group form-md-line-input has-danger">
                                                    <label class="col-md-1 control-label" for="form_control_1">Program</label>
                                                    <div class="col-md-5">
                                                        <div class="input-icon">
                                                            <select name='kegiatan' class="form-control select2-allow-clear" required>
                                                                <option value='c' <?php if($selected_kegiatan=='c'){echo'selected';}else{echo'';} ?>>Sarling (Sarana Lingkungan)</option>
                                                                <option value='a' <?php if($selected_kegiatan=='a'){echo'selected';}else{echo'';} ?>>Kube (Kelompok Usaha Bersama)</option>
                                                                <option value='b' <?php if($selected_kegiatan=='b'){echo'selected';}else{echo'';} ?>>Rutilahu (Rumah Tidak Layak Huni)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <label class="col-md-1 control-label" for="form_control_1">Wilayah</label>
                                                    <div class="col-md-3">
                                                        <div class="input-icon">
                                                            <select name='wilayah' class="form-control select2-allow-clear" required>
                                                                <option value='1'>Wilayah I</option>
                                                                <option value='2'>Wilayah II</option>
                                                                <option value='3'>Wilayah III</option>
                                                                <option value='4'>Indonesia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1" style='text-align: center;'>
                                                        <button type='submit' class="btn btn-info">Proses</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="grafik" id='chartdiv' style="width:100%;height:700px"></div>
                                            <!-- <script type="text/javascript">
                                                $('.grafik').highcharts({
                                                    chart: {
                                                        type: 'line',
                                                        marginTop: 80
                                                    },
                                                    credits: {
                                                        enabled: false
                                                    }, 
                                                    tooltip: {
                                                        shared: true,
                                                        crosshairs: true,
                                                        headerFormat: '<b>{point.key}</b><br/>'
                                                    },
                                                    title: {
                                                        text: 'Rekap Data Penanganan Fakir Miskin Perkotaan'
                                                    },
                                                    subtitle: {
                                                        text: 'Jumlah Kube, RLTH, dan Sarling Periode 2019'
                                                    },
                                                    xAxis: {
                                                        categories: [
                                                                        <?php
                                                                        foreach ($data_kube as $key => $value) {
                                                                            echo "'".$value->nm_provinsi."',";
                                                                        }
                                                                        ?>
                                                                    ],
                                                        labels: {
                                                            rotation: 0,
                                                            align: 'right',
                                                            style: {
                                                                fontSize: '10px',
                                                                fontFamily: 'Verdana, sans-serif'
                                                            }
                                                        }
                                                    },
                                                    yAxis: {
                                                        min: 0,
                                                        title: {
                                                            text: 'Kelompok/ Tim'
                                                        }
                                                    },
                                                    legend: {
                                                        enabled: true
                                                    },
                                                    series:[
                                                                {
                                                                    name: 'Kube',
                                                                    data: [
                                                                        <?php
                                                                            foreach ($data_kube as $key => $fff) {
                                                                                $persentase = 0;
                                                                                if($fff->jumlah_kube=='0'){
                                                                                    echo'';
                                                                                }else{
                                                                                    $persentase = $fff->jumlah_kube;
                                                                                }
                                                                                echo number_format($persentase,0).",";
                                                                            }
                                                                        ?>
                                                                    ],

                                                                },
                                                                {
                                                                    name: 'Rutilahu',
                                                                    data: [
                                                                        <?php
                                                                            foreach ($data_rutilahu as $key => $fff) {
                                                                                $persentase = 0;
                                                                                if($fff->jumlah_rutilahu=='0'){
                                                                                    echo'';
                                                                                }else{
                                                                                    $persentase = $fff->jumlah_rutilahu;
                                                                                }
                                                                                echo number_format($persentase,0).",";
                                                                            }
                                                                        ?>
                                                                    ],

                                                                },
                                                                {
                                                                    name: 'Sarling',
                                                                    data: [
                                                                        <?php
                                                                            foreach ($data_sarling as $key => $fff) {
                                                                                $persentase = 0;
                                                                                if($fff->jumlah_sarling=='0'){
                                                                                    echo'';
                                                                                }else{
                                                                                    $persentase = $fff->jumlah_sarling;
                                                                                }
                                                                                echo number_format($persentase,0).",";
                                                                            }
                                                                        ?>
                                                                    ],
                                                                }
                                                            ]
                                                });
                                            </script> -->
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $('.grafik').highcharts({
                                                        credits: { enabled: false },chart: {
                                                            type: 'column',
                                                            options3d: {
                                                                enabled: true,
                                                                alpha: 0,
                                                                beta: 20
                                                            }
                                                        },
                                                        title: {
                                                            text: 'Jumlah Kube, RLTH, dan Sarling di Indonesia Periode 2019'
                                                        },
                                                        xAxis: {
                                                            categories: [
                                                                <?php
                                                                foreach ($data_kube as $key => $value) {
                                                                    echo "'".$value->nm_provinsi."',";
                                                                }
                                                                ?>
                                                            ]
                                                        },
                                                        yAxis: {
                                                            min: 0,
                                                            title: {
                                                                text: 'Kelompok/ Tim'
                                                            }
                                                        },
                                                        tooltip: {
                                                            shared: true
                                                        },
                                                        
                                                        plotOptions: {
                                                            column: {
                                                                stacking: 'normal'
                                                            }
                                                        },
                                                        series: [
                                                            {
                                                                name: 'Kube',
                                                                data: [
                                                                    <?php
                                                                        foreach ($data_kube as $key => $fff) {
                                                                            $persentase = 0;
                                                                            if($fff->jumlah_kube=='0'){
                                                                                echo'';
                                                                            }else{
                                                                                $persentase = ($fff->jumlah_kube);
                                                                            }
                                                                            echo number_format($persentase,2).",";
                                                                        }
                                                                    ?>
                                                                ],

                                                            },
                                                            {
                                                                name: 'Rutilahu',
                                                                data: [
                                                                    <?php
                                                                        foreach ($data_rutilahu as $key => $fff) {
                                                                            $persentase = 0;
                                                                            if($fff->jumlah_rutilahu=='0'){
                                                                                echo'';
                                                                            }else{
                                                                                $persentase = ($fff->jumlah_rutilahu);
                                                                            }
                                                                            echo number_format($persentase,2).",";
                                                                        }
                                                                    ?>
                                                                ],

                                                            },
                                                            {
                                                                name: 'Sarling',
                                                                data: [
                                                                    <?php
                                                                        foreach ($data_sarling as $key => $fff) {
                                                                            $persentase = 0;
                                                                            if($fff->jumlah_sarling=='0'){
                                                                                echo'';
                                                                            }else{
                                                                                $persentase = ($fff->jumlah_sarling);
                                                                            }
                                                                            echo number_format($persentase,2).",";
                                                                        }
                                                                    ?>
                                                                ],
                                                            }
                                                        ]
                                                    });
                                                });
                                            </script>
                                            <!-- <script src="https://www.amcharts.com/lib/4/core.js"></script>
                                            <script src="https://www.amcharts.com/lib/4/charts.js"></script>
                                            <script src="https://www.amcharts.com/lib/4/themes/kelly.js"></script>
                                            <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

                                            <script>
                                            am4core.ready(function() {

                                            am4core.useTheme(am4themes_kelly);
                                            am4core.useTheme(am4themes_animated);

                                            var chart = am4core.create("chartdiv", am4charts.XYChart);
                                            var title = chart.titles.create();
                                            title.text = "Jumlah Kube, RLTH, dan Sarling di Indonesia Periode 2019";
                                            title.fontSize = 25;
                                            title.marginBottom = 30;

                                            chart.data = [
                                            <?php
                                                foreach ($data_utama as $key => $fff) {
                                                    echo '{"nm_provinsi": "'.$fff->nm_provinsi.'",';
                                                    $persentase1 = 0;
                                                    if($fff->jumlah_kube=='0'){
                                                        echo'';
                                                    }else{
                                                        $persentase1 = $fff->jumlah_kube;
                                                    }
                                                    echo '"kube": '.number_format($persentase1,0).',';
                                                    $persentase2 = 0;
                                                    if($fff->jumlah_rutilahu=='0'){
                                                        echo'';
                                                    }else{
                                                        $persentase2 = $fff->jumlah_rutilahu;
                                                    }
                                                    echo '"rutilahu": '.number_format($persentase2,0).',';
                                                    $persentase3 = 0;
                                                    if($fff->jumlah_sarling=='0'){
                                                        echo'';
                                                    }else{
                                                        $persentase3 = $fff->jumlah_sarling;
                                                    }
                                                    echo '"sarling": '.number_format($persentase3,0).'},';
                                                }
                                            ?>];

                                            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                                            categoryAxis.dataFields.category = "nm_provinsi";
                                            categoryAxis.renderer.opposite = true;

                                            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                                            valueAxis.renderer.inversed = true;
                                            valueAxis.title.text = "Kelompok/ Tim";
                                            valueAxis.renderer.minLabelPosition = 0.01;

                                            var series1 = chart.series.push(new am4charts.LineSeries());
                                            series1.dataFields.valueY = "kube";
                                            series1.dataFields.categoryX = "nm_provinsi";
                                            series1.name = "Kube";
                                            series1.strokeWidth = 3;
                                            series1.bullets.push(new am4charts.CircleBullet());
                                            series1.tooltipText = "{categoryX}: {valueY} Kelompok";
                                            series1.legendSettings.valueText = "{valueY} Kelompok";
                                            series1.visible  = false;

                                            var series2 = chart.series.push(new am4charts.LineSeries());
                                            series2.dataFields.valueY = "rutilahu";
                                            series2.dataFields.categoryX = "nm_provinsi";
                                            series2.name = 'Rutilahu';
                                            series2.strokeWidth = 3;
                                            series2.bullets.push(new am4charts.CircleBullet());
                                            series2.tooltipText = "{categoryX}: {valueY} Kelompok";
                                            series2.legendSettings.valueText = "{valueY} Kelompok";

                                            var series3 = chart.series.push(new am4charts.LineSeries());
                                            series3.dataFields.valueY = "sarling";
                                            series3.dataFields.categoryX = "nm_provinsi";
                                            series3.name = 'Sarling';
                                            series3.strokeWidth = 3;
                                            series3.bullets.push(new am4charts.CircleBullet());
                                            series3.tooltipText = "{categoryX}: {valueY} Tim";
                                            series3.legendSettings.valueText = "{valueY} Tim";

                                            chart.cursor = new am4charts.XYCursor();
                                            chart.cursor.behavior = "zoomY";

                                            chart.legend = new am4charts.Legend();

                                            });
                                            </script> -->
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <hr>
                            <div class="footer text-muted text-center">
                            <!-- Contact Person Office 021-3103637/79 /EXT 2529
                            <br>Alamat Email : sekretariat@kemsos.go.id
                            <br> -->
                            © 2019 <a href="#">Direktorat Penanganan Fakir Miskin Wilayah II - Kementerian Sosial RI</a>.<br><br><br>
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
            <!-- <script type="text/javascript" src="https://sikapdaya.kemsos.go.id/js/app.js"></script> -->
        
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
<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>Halaman Admin</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600'>

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/skin/default_skin/css/theme.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/admin-tools/admin-forms/css/admin-forms.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body class="dashboard-page sb-l-o sb-r-c">
    <div id="main">
        <header class="navbar navbar-fixed-top">
            <div class="navbar-branding dark">
                <a class="navbar-brand" href="dashboard.html">
                    <b>Admin</b>Designs
                </a>
                <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
            </div>
        </header>
        <!-- Start: Sidebar Left -->
        <aside id="sidebar_left" class="nano nano-primary affix">
            <div class="sidebar-left-content nano-content">
                <!-- Start: Sidebar Left Menu -->
                <ul class="nav sidebar-menu">
                    <li class="sidebar-label pt20">Menu</li>
                    <li>
                        <a href="">
                            <span class="glyphicon glyphicon-home"></span>
                            <span class="sidebar-title">Transaksi</span>
                        </a>
                        <a href="jadwal/tampil_jadwal.php">
                            <span class="glyphicon glyphicon-calendar"></span>
                            <span class="sidebar-title">Jadwal</span>
                        </a>
                        <a href="../README/index.html">
                            <span class="glyphicon glyphicon-bed"></span>
                            <span class="sidebar-title">Kereta</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- End: Sidebar Left -->

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">
            <!-- Begin: Content -->
            <section id="content" class="animated fadeIn">
            </section>
        </section>
    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery-1.11.1.min.js"></script>
    <script src="../vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- HighCharts Plugin -->
    <script src="../vendor/plugins/highcharts/highcharts.js"></script>

    <!-- Sparklines Plugin -->
    <script src=".../vendor/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Simple Circles Plugin -->
    <script src="../vendor/plugins/circles/circles.js"></script>

    <!-- JvectorMap Plugin + US Map (more maps in plugin/assets folder) -->
    <script src="../vendor/plugins/jvectormap/jquery.jvectormap.min.js"></script>
    <script src="../vendor/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>

    <!-- Theme Javascript -->
    <script src="../assets/js/utility/utility.js"></script>
    <script src="../assets/js/demo/demo.js"></script>
    <script src="../assets/js/main.js"></script>

    <!-- Widget Javascript -->
    <script src="../../assets/js/demo/widgets.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core      
            Core.init();

            // Init Demo JS
            Demo.init();

            // Init Widget Demo JS
            // demoHighCharts.init();

            // Because we are using Admin Panels we use the OnFinish 
            // callback to activate the demoWidgets. It's smoother if
            // we let the panels be moved and organized before 
            // filling them with content from various plugins

            // Init plugins used on this page
            // HighCharts, JvectorMap, Admin Panels

            // Init Admin Panels on widgets inside the ".admin-panels" container
            $('.admin-panels').adminpanel({
                grid: '.admin-grid',
                draggable: true,
                preserveGrid: true,
                mobile: false,
                onStart: function() {
                    // Do something before AdminPanels runs
                },
                onFinish: function() {
                    $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

                    // Init the rest of the plugins now that the panels
                    // have had a chance to be moved and organized.
                    // It's less taxing to organize empty panels
                    demoHighCharts.init();
                    runVectorMaps(); // function below
                },
                onSave: function() {
                    $(window).trigger('resize');
                }
            });

            // Widget VectorMap
            function runVectorMaps() {

                // Jvector Map Plugin
                var runJvectorMap = function() {
                    // Data set
                    var mapData = [900, 700, 350, 500];
                    // Init Jvector Map
                    $('#WidgetMap').vectorMap({
                        map: 'us_lcc_en',
                        //regionsSelectable: true,
                        backgroundColor: 'transparent',
                        series: {
                            markers: [{
                                attribute: 'r',
                                scale: [3, 7],
                                values: mapData
                            }]
                        },
                        regionStyle: {
                            initial: {
                                fill: '#E5E5E5'
                            },
                            hover: {
                                "fill-opacity": 0.3
                            }
                        },
                        markers: [{
                            latLng: [37.78, -122.41],
                            name: 'San Francisco,CA'
                        }, {
                            latLng: [36.73, -103.98],
                            name: 'Texas,TX'
                        }, {
                            latLng: [38.62, -90.19],
                            name: 'St. Louis,MO'
                        }, {
                            latLng: [40.67, -73.94],
                            name: 'New York City,NY'
                        }],
                        markerStyle: {
                            initial: {
                                fill: '#a288d5',
                                stroke: '#b49ae0',
                                "fill-opacity": 1,
                                "stroke-width": 10,
                                "stroke-opacity": 0.3,
                                r: 3
                            },
                            hover: {
                                stroke: 'black',
                                "stroke-width": 2
                            },
                            selected: {
                                fill: 'blue'
                            },
                            selectedHover: {}
                        },
                    });
                    // Manual code to alter the Vector map plugin to 
                    // allow for individual coloring of countries
                    var states = ['US-CA', 'US-TX', 'US-MO',
                        'US-NY'
                    ];
                    var colors = [bgWarningLr, bgPrimaryLr, bgInfoLr, bgAlertLr];
                    var colors2 = [bgWarning, bgPrimary, bgInfo, bgAlert];
                    $.each(states, function(i, e) {
                        $("#WidgetMap path[data-code=" + e + "]").css({
                            fill: colors[i]
                        });
                    });
                    $('#WidgetMap').find('.jvectormap-marker')
                        .each(function(i, e) {
                            $(e).css({
                                fill: colors2[i],
                                stroke: colors2[i]
                            });
                        });
                }

                if ($('#WidgetMap').length) {
                    runJvectorMap();
                }
            }



        });
    </script>

    <!-- END: PAGE SCRIPTS -->

</body>

</html>
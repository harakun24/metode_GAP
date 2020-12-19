<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SPK | Administrator</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['/assets/css/fonts.min.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/atlantis.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/assets/css/demo.css">
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header bg-dark">

                <a class="logo">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">

                <div class="container-fluid">

                </div>
            </nav>
        </div>
        <!-- sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <!-- <div class="avatar-sm float-left mr-2">
                    <img src="/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div> -->
                        <div class="info">
                            <a>
                                <span>
                                    <h4>
                                        <?php
                                        $admin = new \App\Controllers\Admin();
                                        echo $admin::$session->get('user');
                                        ?>
                                    </h4>
                                </span>
                            </a>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item">
                            <a href="<?= route_to('/'); ?>">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Menu</h4>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-clipboard-list"></i>
                                <p>Data</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="<?= route_to('list_kriteria'); ?>">
                                            <span class="sub-item">Kriteria</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= route_to('list_subkriteria'); ?>">
                                            <span class="sub-item">Subkriteria</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?= route_to('list_alternatif'); ?>">
                                            <span class="sub-item">Alternatif</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="/Sistem/penilaian">
                                <i class="fas fa-chart-pie"></i>
                                <p>Penilaian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#forms">
                                <i class="fas fa-chart-bar"></i>
                                <p>Perankingan</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Setting</h4>
                        </li>
                        <li class="nav-item">
                            <a class="log-out" href="/Admin/logout">
                                <i class="fas fa-power-off"></i>
                                <p>Log Out</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- sidebar -->
        <div class="main-panel">
            <div class="content">
                <?= $this->renderSection('content'); ?>

            </div>

        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


    <!-- Chart JS -->
    <script src="/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Sweet Alert -->
    <script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Datatables -->
    <script src="/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Atlantis JS -->
    <script src="/assets/js/atlantis.min.js"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="/assets/js/setting-demo.js"></script>

</body>

</html>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>img/logo2.png">
    <title><?php echo $SEKOLAH['namasekolah'];?></title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>cssjs_adm/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>cssjs_all/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>cssjs_all/sweetalert2.min.css" rel="stylesheet">
    <style>
        fieldset {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="bx bx-menu"></i>
                    </a>

                    <div class="navbar-brand">
                        <a href="index.html" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="<?php echo base_url();?>img/logo2.png" alt="homepage" class="dark-logo" width="42" />
                                <!-- Light Logo icon -->
                                <img src="<?php echo base_url();?>img/logo2.png" alt="homepage" class="light-logo" width="42"/>
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="<?php echo base_url();?>img/logo_text_hitam.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="<?php echo base_url();?>img/logo_text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>

                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bx bx-menu"></i>
                    </a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url();?>img/admin_<?php echo $_SESSION['ADM_ID'];?>.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="<?php echo base_url();?>admin/ubahpass"><i class="bx bx-user m-r-5 m-l-5"></i> Ubah Profil</a>
                                <a class="dropdown-item" href="<?php echo base_url();?>admin/logout"><i class="bx bx-log-out m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>admin" aria-expanded="false">
                                <i class="bx bx-home"></i>
                                <span class="hide-menu">Beranda</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>admin/ppdb" aria-expanded="false">
                                <i class="bx bx-face"></i>
                                <span class="hide-menu">PPDB</span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>admin/berita" aria-expanded="false">
                                <i class="bx bx-receipt"></i>
                                <span class="hide-menu">Berita</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>admin/gurustaff" aria-expanded="false">
                                <i class="bx bx-user-circle"></i><span class="hide-menu">Guru dan Staff</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>admin/jurusan" aria-expanded="false">
                                <i class="bx bx-rocket"></i>
                                <span class="hide-menu">Jurusan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>admin/bukutamu" aria-expanded="false">
                                <i class="bx bx-comment-detail"></i>
                                <span class="hide-menu">Buku Tamu</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>admin/profil" aria-expanded="false">
                                <i class="bx bx-home-heart"></i>
                                <span class="hide-menu">Profil Sekolah</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>admin/sertifikat" aria-expanded="false">
                                <i class="bx bx-notification"></i>
                                <span class="hide-menu">Sertifikat</span>
                            </a>
                        </li>

                        <?php
                        if ($_SESSION['ADM_ID']==2)
                        {
                        ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>admin/dtadmin" aria-expanded="false">
                                    <i class="bx bxs-face-mask"></i>
                                    <span class="hide-menu">Administrator</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>admin/sekolah" aria-expanded="false">
                                    <i class="bx bx-building-house"></i>
                                    <span class="hide-menu">Data Sekolah</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $SEKOLAH['namasekolah'];?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>img/logo2.png" rel="icon">
  <link href="<?php echo base_url();?>img/logo2.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>cssjs_web/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>cssjs_web/bootstrap5.css" rel="stylesheet">
  <!-- <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> -->
  <link href="<?php echo base_url();?>boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>cssjs_web/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <!-- <link href="<?php echo base_url();?>cssjs_web/vendor/remixicon/remixicon.css" rel="stylesheet"> -->
  <link href="<?php echo base_url();?>cssjs_web/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url();?>cssjs_web/style.css" rel="stylesheet">
  <style>
      .blog .entry .entry-meta { color:#4b4b4b; font-size: 0.8rem;}
      fieldset { margin-top: 15px;}
      
      h5 { background-color: #d91717; color: white; padding: 3px 5px; margin-top: 20px;}
      .features .nav-link.active {
          border-width: 4px; }
  </style>    
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <!-- Uncomment below if you prefer to use an image logo -->
      <!--   
      <h1 class="logo me-auto"><a href="index.html"><?php echo $SEKOLAH['namasekolah'];?></a></h1>-->
      <a href="<?php echo base_url();?>ppdb" class="logo me-auto"><img src="<?php echo base_url();?>img/logogp2.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?php echo base_url();?>ppdb" <?php if ($MENUNYA=='beranda') { echo 'class="active"'; } ?>>Beranda</a></li>
        
         <?php
         if ($PPDBOK==1)
         {
         ?>     
          <li><a href="<?php echo base_url();?>ppdb/akun" <?php if ($MENUNYA=='akun') { echo 'class="active"'; } ?>>Data Anda</a></li>
            
          <li><a href="<?php echo base_url();?>ppdb/berkas" <?php if ($MENUNYA=='berkas') { echo 'class="active"'; } ?>>Berkas</a></li>
         <?php
         }
         ?>    
          <li><a href="<?php echo base_url();?>ppdb/seleksi" <?php if ($MENUNYA=='seleksi') { echo 'class="active"'; } ?>>Seleksi</a></li>    
          
          <li><a href="<?php echo base_url();?>ppdb/logout" <?php if ($MENUNYA=='logout') { echo 'class="active"'; } ?>>Logout</a></li>    
        </ul>
        <i class="bx bx-menu mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  
    
  <main id="main">
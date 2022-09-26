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
  </style>    
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <!-- Uncomment below if you prefer to use an image logo -->
      <!--   
      <h1 class="logo me-auto"><a href="index.html"><?php echo $SEKOLAH['namasekolah'];?></a></h1>-->
      <a href="index.html" class="logo me-auto"><img src="<?php echo base_url();?>img/logogp2.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?php echo base_url();?>web" <?php if ($MENUNYA=='beranda') { echo 'class="active"'; } ?>>Beranda</a></li>
            
          <li><a href="<?php echo base_url();?>web/profil" <?php if ($MENUNYA=='profil') { echo 'class="active"'; } ?>>Profil</a></li>
            
          <li><a href="<?php echo base_url();?>web/berita" <?php if ($MENUNYA=='berita') { echo 'class="active"'; } ?>>Berita</a></li>
            
          <li><a href="<?php echo base_url();?>web/bukutamu" <?php if ($MENUNYA=='bukutamu') { echo 'class="active"'; } ?>>Buku Tamu</a></li>    
            
          <li><a href="<?php echo base_url();?>web/gurustaff" <?php if ($MENUNYA=='gurustaff') { echo 'class="active"'; } ?>>Guru &amp; Staff</a></li>
           
          <li><a href="<?php echo base_url();?>web/kontak" <?php if ($MENUNYA=='kontak') { echo 'class="active"'; } ?>>Kontak</a></li>
        
          <?php
          if ($SEKOLAH['ppdbaktif']=='Y')
          {
              echo '<li><a href="'.base_url().'web/ppdb" ';
              if ($MENUNYA=='ppdb') { echo 'class="active"'; }
              echo '>PPDB</a></li>';
          }
          ?>
        </ul>
        <i class="bx bx-menu mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  
  <!-- ======= Banner ======= -->
  <?php
  if ($SHOWBANNER==1)
  {
  ?>
    <section id="blog" class="blog" style="margin-top:80px;">
        <div class="container">
            <div class="section-title">
              <h2><?php echo $SEKOLAH['namasekolah'];?></h2>
              <p>Welcome</p>
            </div>

            <div class="row">
                <iframe width="100%" height="600" src="https://www.youtube.com/embed/qTtDLRUq1lA?rel=0" 
                  allowfullscreen ></iframe>
            </div>
        </div>
    </section>
  <?php
  }
  ?>    
  <main id="main">
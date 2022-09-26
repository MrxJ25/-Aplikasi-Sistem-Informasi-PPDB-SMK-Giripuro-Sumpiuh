<?php 
include('web_awal.php'); 
$CI =& get_instance();
$CI->load->model('Mymodel');
?>
    <!-- Sertifikat -->
    <?php
    if ($JmlSertifikat>0)
    {
        echo '<section id="clients" class="clients section-bg">
                <div class="container"><div class="row">
                
            ';
        foreach($Sertifikat as $s)
        {
            echo '<div class="col-lg-6 col-md-3 d-flex align-items-center justify-content-center">
            <img src="'.base_url().'img/sert_'.$s->idsertifikat.'.png" class="img-fluid" alt="'.$s->nama.'"></div>
          ';
        }
        echo '</div></div></section>';
    }
    ?>  
    <!-- BERITA -->
    <?php
    if ($JmlBerita>0)
    {
        echo '<section id="blog" class="blog">
              <div class="container">
                <div class="section-title">
                  <h2>Berita</h2>
                  <p>Berita Terbaru</p>
                </div>
                <div class="row">';
        foreach($Berita as $b)
        {
            echo '<div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <article class="entry">
              <div class="entry-img">
                <img src="'.base_url().'img/berita/'.$b->idberita.'_k.jpg" alt="'.$b->judul.'" class="img-fluid">
              </div>

              <h3 class="entry-title">
                <a href="'.base_url().'web/beritadetail/'.$b->idberita.'">'.$b->judul.'</a>
              </h3>

              <div class="entry-meta">
                <ul>
                  <p class="text-center">
                  <i class="bx bx-user"></i> '.$b->namaadmin.' | <i class="bx bxs-calendar" ></i> '.$CI->Mymodel->tgltext(substr($b->tglpost,0,10)).' | <i class="bx bx-book-reader"></i> '.$b->dibaca.' x
                </p>
                </ul>
              </div>
            </article>
          </div>';
        }
        echo '</div></div></section>';
    }
    ?> 
    
    <!-- JURUSAN -->
    <?php
    if ($JMLJURUSAN>0)
    {
        echo '<section id="features" class="features">
                  <div class="container">
                    <div class="section-title">
                      <h2>Jurusan</h2>
                      <p>Jurusan Unggulan</p>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">';
        $x=0;
        foreach($JURUSAN as $j)
        {
            echo ' <li class="nav-item">
                        <a class="nav-link';
            if ($x==0) { echo ' active show'; }
            echo '" data-bs-toggle="tab" 
                    href="#jurusan'.$j->idjurusan.'">'.$j->idjurusan.'</a>
                    </li>';
            $x++;
        }
        echo '  </ul>
              </div>
              <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="tab-content">' ;
        $x=0;
        foreach($JURUSAN as $j)
        {
            echo '  <div class="tab-pane';
            if ($x==0) { echo ' active show'; }
            echo '" id="jurusan'.$j->idjurusan.'">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>'.$j->namajurusan.'</h3>
                                <p>'.$j->deskripsi.'</p>
                            </div>
                        </div>
                    </div>';
            $x++;
        }
        echo '</div></div>
                </div>
              </div>
            </section>';
    }
    ?>
    <section id="features" class="features">
      <div class="container">
        <div class="section-title">
          <h2>Lokasi</h2>
          <p>Lokasi Kami</p>
        </div>
          <iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $SEKOLAH['gmap'];?>&amp;hl=es;z=14&amp;output=embed" width="100%" height="400" frameborder="0"></iframe>
        </div>
    </section>
       

<?php include('web_akhir.php'); ?>

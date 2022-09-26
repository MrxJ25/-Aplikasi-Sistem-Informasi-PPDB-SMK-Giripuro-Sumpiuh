<?php 
include('web_awal.php'); 
$CI =& get_instance();
$CI->load->model('Mymodel');
?>
    
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Berita</h2>
          <ol>
            <li><a href="<?php echo base_url();?>web"><?php echo $SEKOLAH['namasekolah'];?></a></li>
            <li>Berita</li>
          </ol>
        </div>
      </div>
    </section>

    <?php
    if ($JmlBerita>0)
    {
        echo '<section id="blog" class="blog">
              <div class="container">
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
                <p class="text-center">
                  <i class="bx bx-user"></i> '.$b->namaadmin.' | <i class="bx bxs-calendar" ></i> '.$CI->Mymodel->tgltext(substr($b->tglpost,0,10)).' | <i class="bx bx-book-reader"></i> '.$b->dibaca.' x
                </p>
              </div>
            </article>
          </div>';
        }
        echo '</div></div></section>';
        
        echo $Paging;
    }
    ?> 
       

<?php include('web_akhir.php'); ?>

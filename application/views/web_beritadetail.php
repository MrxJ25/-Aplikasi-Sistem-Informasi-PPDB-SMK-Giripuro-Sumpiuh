<?php 
include('web_awal.php'); 
$CI =& get_instance();
$CI->load->model('Mymodel');
?>
    
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2><?php echo $Berita['judul'];?></h2>
      <ol>
        <li><a href="<?php echo base_url();?>web"><?php echo $SEKOLAH['namasekolah'];?></a></li>
        <li><a href="<?php echo base_url();?>web/berita">Berita</a></li>  
        <li>Detail Berita</li>
      </ol>
    </div>
  </div>
</section>

<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-sm-8 entries">
        <article class="entry entry-single">
          <div class="entry-img">
            <img src="<?php echo base_url();?>img/berita/<?php echo $Berita['idberita'];?>_b.jpg" alt="" class="img-fluid">
          </div>

          <h2 class="entry-title">
            <a href="blog-single.html"><?php echo $Berita['judul'];?></a>
          </h2>

          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center"><i class="bx bx-user"></i> <?php echo $Berita['namaadmin'];?></li>
              <li class="d-flex align-items-center"><i class="bx bx-calendar"></i> <?php echo $CI->Mymodel->tgltext(substr($Berita['tglpost'],0,10)).' <i class="bx bx-time"></i> '.substr($Berita['tglpost'],11);?></li>
              <li class="d-flex align-items-center"> <i class="bx bx-book-reader"></i> <?php echo $Berita['dibaca'];?> x</li>
            </ul>
          </div>

          <div class="entry-content">
            <?php echo $Berita['isiberita'];?>
          </div>
        </article>
    </div>      
    <div class="col-lg-4">
        <div class="sidebar">
                
    <?php
    if ($JmlBeritaLain>0)
    {
        echo '<section id="blog" class="blog">
              <div class="container">
                <div class="row">
                  <h3 class="sidebar-title">Recent Posts</h3>
                  <div class="sidebar-item recent-posts">';
        foreach($BeritaLain as $b)
        {
            echo '<div class="post-item clearfix">
                      <img src="'.base_url().'img/berita/'.$b->idberita.'_k.jpg" alt="'.$b->judul.'">
                      <h4><a href="'.base_url().'web/beritadetail/'.$b->idberita.'">'.$b->judul.'</a></h4>
                      <time datetime="'.substr($b->tglpost,0,10).'">'.$CI->Mymodel->tgltext(substr($b->tglpost,0,10)).'</time>
                    </div>';
        }
        echo '</div></div></div></section>';
    }
    ?> 
        </div>
        </div>
      </div>
    </div></section>

<?php include('web_akhir.php'); ?>

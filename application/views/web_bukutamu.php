<?php 
include('web_awal.php'); 
$CI =& get_instance();
$CI->load->model('Mymodel');
?>
    
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Buku Tamu</h2>
      <ol>
        <li><a href="<?php echo base_url();?>web"><?php echo $SEKOLAH['namasekolah'];?></a></li>
        <li>Buku Tamu</li>
      </ol>
    </div>
  </div>
</section>

<section id="testimonials" class="testimonials">
    <div class="container">
      
    <?php
    if ($JmlBk>0)
    {
        echo '<div class="row">';
        foreach($BukuTamu as $b)
        {
            echo '<div class="col-lg-6">
            <div class="testimonial-item">
              <h3>'.$b->nama.'</h3>
              <h4>'.$CI->Mymodel->tgltext(substr($b->tglpost,0,10)).' '.substr($b->tglpost,11).'</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i> '.$b->komentar.' 
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>';
        }
        echo '</div>';
    }
    else
    {
        echo '<div class="alert alert-info">Belum ada data buku tamu</div>';
    }
    ?> 
    
        
    <h4 class="text-center mt-5">Berikan komentar Anda</h4>    
    <form name="komen" method="post" action="<?php echo base_url();?>web/bukutamusv">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <fieldset><label>Nama anda</label>
                    <input type="text" name="nama" class="form-control" maxlength="40"
                        required/>   
                </fieldset>
                <fieldset><label>Email</label>
                    <input type="email" name="email" class="form-control" maxlength="50"
                        required/>   
                </fieldset>
                <fieldset><label>Komentar</label>
                    <textarea name="komentar" class="form-control" rows="4"
                              required></textarea>   
                </fieldset>
                <p class="text-center mt-4">
                    <button type="submit" class="btn btn-danger"><i class="bx bx-send"></i> Kirim</button>
                </p>
            </div>
        </div>    
    </form>    
        </div>
</section>

<?php include('web_akhir.php'); ?>

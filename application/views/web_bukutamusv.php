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
        <li><a href="<?php echo base_url();?>web/bukutamu">Buku Tamu</a></li>  
        <li>Buku Tamu Tersimpan</li>
      </ol>
    </div>
  </div>
</section>

<section id="testimonials" class="testimonials">
    <div class="container">
      <div class="alert alert-info">
        <p>Terima kasih atas komentar yang telah anda berikan. Komentar akan ditampilkan setelah diverifikasi oleh admin.</p>  
      </div>
    <p class="text-center mt-5">
        <a href="<?php echo base_url();?>web/bukutamu" class="btn btn-danger"><i class="bx bx-arrow-back"></i> Kembali ke Buku Tamu</a>
    </p>    
    </div>
</section>

<?php include('web_akhir.php'); ?>

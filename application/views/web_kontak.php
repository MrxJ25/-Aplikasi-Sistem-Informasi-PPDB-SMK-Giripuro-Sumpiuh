<?php 
include('web_awal.php'); 
$CI =& get_instance();
$CI->load->model('Mymodel');
?>
    
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Kontak Kami</h2>
      <ol>
        <li><a href="<?php echo base_url();?>web"><?php echo $SEKOLAH['namasekolah'];?></a></li>
        <li>Kontak Kami</li>
      </ol>
    </div>
  </div>
</section>

<section id="contact" class="contact">
  <div class="container">

    <div>
      <iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $SEKOLAH['gmap'];?>&amp;hl=es;z=14&amp;output=embed" width="100%" height="400" frameborder="0"></iframe>
    </div>
      
    <div class="info mt-5">
          <div class="address">
            <i class="bx bx-map"></i>
            <h4>Location:</h4>
            <p><?php echo $SEKOLAH['alamat'];?><br/><?php echo $SEKOLAH['kota'];?>
            </p>
          </div>

          <div class="email">
            <i class="bx bx-envelope"></i>
            <h4>Email:</h4>
            <p><?php echo $SEKOLAH['email'];?></p>
          </div>

          <div class="phone">
            <i class="bx bx-phone"></i>
            <h4>Call:</h4>
            <p><?php echo $SEKOLAH['telepon'];?></p>
          </div>

        </div>
    </div>
</section>

<?php include('web_akhir.php'); ?>

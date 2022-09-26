  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer"  style="background: linear-gradient(#043681,#0D0D0C); color:white;">
    <div class="footer-top" style="background: linear-gradient(#0D0D0C, #043681); color:white;">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3><?php echo $SEKOLAH['namasekolah'];?></h3>
              <p><?php echo $SEKOLAH['alamat'];?><br>
                <?php echo $SEKOLAH['kota'];?><br><br>
                <strong>Phone:</strong> <?php echo $SEKOLAH['telepon'];?><br>
                <strong>Email:</strong> <?php echo $SEKOLAH['email'];?><br>
              </p>
              <div class="social-links mt-3">
                <a href="<?php echo base_url();?><?php echo $SEKOLAH['facebook'];?>" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="<?php echo base_url();?><?php echo $SEKOLAH['instagram'];?>" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="<?php echo base_url();?><?php echo $SEKOLAH['youtube'];?>" class="google-plus"><i class="bx bxl-youtube"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Menu Utama</h4>
              <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url();?>web">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url();?>web/profil">Profil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url();?>web/berita">Berita</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url();?>web/testimoni">Testimoni</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Jurusan Kami</h4>
            <?php
            if ($JMLJURUSAN>0)
            {
                echo '<ul>';
                foreach($JURUSAN as $j)
                {
                    echo '<li><i class="bx bx-chevron-right"></i> <a href="'.base_url().'web/jurusandetail/'.$j->idjurusan.'">'.$j->namajurusan.'</a></li>';
                }  
                echo '</ul>';
            }
              ?>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Tentang Kami</h4>
            <p><?php echo $SEKOLAH['intro'];?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; 2020-<?php echo date('Y');?> Copyright <strong><span class="text-danger"><?php echo $SEKOLAH['namasekolah'];?></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class='bx bxs-chevron-up'></i></a>
<?php
if ($_SESSION['PopMsg']!='')
{
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo $_SESSION['PopMsg'];?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    
<?php    

}
?> 

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>cssjs_all/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url();?>cssjs_web/bootstrap5.bundle.min.js"></script>
  <script src="<?php echo base_url();?>cssjs_web/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url();?>cssjs_web/vendor/isotope-layout/isotope.pkgd.min.js"></script>
 
  <script src="<?php echo base_url();?>cssjs_web/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url();?>cssjs_web/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url();?>cssjs_web/main.js"></script>
  <script src="<?php echo base_url();?>cssjs_all/id.verify.notify.js"></script>
  <script type="text/javascript">
		 <?php
        if ($_SESSION['PopMsg']!='')
        {
        ?>      
           $(window).on('load',function(){
                    $('#exampleModal').modal('show');
                });

        <?php      
			$_SESSION['PopMsg']='';  
        }
        ?>
    </script>
</body>

</html>
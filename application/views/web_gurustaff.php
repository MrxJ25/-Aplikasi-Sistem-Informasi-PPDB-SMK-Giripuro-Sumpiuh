<?php 
include('web_awal.php'); 
$CI =& get_instance();
$CI->load->model('Mymodel');
?>
    
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Guru dan Staff</h2>
      <ol>
        <li><a href="<?php echo base_url();?>web"><?php echo $SEKOLAH['namasekolah'];?></a></li>
        <li>Guru dan Staff</li>
      </ol>
    </div>
  </div>
</section>

<section id="team" class="team ">
  <div class="container">
  <?php
  if ($JmlGuru==0)
  {
      echo '<div class="alert alert-info">Belum ada data guru dan staff</div>';
  }
  else
  {
      echo '<div class="row">';
      foreach ($Guru as $g)
      {
          echo '<div class="col-sm-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="'.base_url().'img/guru/'.$g->idgurustaff.'.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>'.$g->nama.'</h4>
                <span>'.$g->tugas.'</span>
                <div class="social">
                  <a href="'.$g->facebook.'"><i class="ri-facebook-fill"></i></a>
                  <a href="'.$g->instagram.'"><i class="ri-instagram-fill"></i></a>
                </div>
              </div>
            </div>
          </div>';
      }
  }
  ?>
    </div>
</section>

<?php include('web_akhir.php'); ?>

<?php 
include('ppdb_awal.php'); 
?>
    
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Penerimaan Peserta Didik Baru </h2>
      <ol>
        <li><a href="<?php echo base_url();?>web"><?php echo $SEKOLAH['namasekolah'];?></a></li>
        <li>PPDB</li>
      </ol>
    </div>
  </div>
</section>

<section id="blog" class="blog ">
  <div class="container">
    <div class="section-title">
      <h2>Pendaftaran</h2>
      <p>Pendaftaran Peserta Didik</p>
    </div>
      <?php
     if ($PPDBOK==1)
     {
     ?>  
    <div class="alert alert-info">
        <p>
        Selamat datang kembali <b><?php echo $_SESSION['PMB_NAMA'];?></b> di PPDB <?php echo $SEKOLAH['namasekolah'];?> tahun <?php echo date('Y');?>. Pastikan data anda sudah diisi dengan lengkap dan benar. Kesalahan pengisian data dapat menyebabkan Anda gagal dalam seleksi !</p>
        <p class="text-center"><a href="<?php echo base_url();?>ppdb/akun" class="btn btn-secondary">Data anda</a></p>
    </div>  
    <?php
     }
     ?>  
    <h4>Statistik PPDB <?php echo date('Y');?></h4>
    <?php
      if ($JmlStatistik==0)
      {
          echo '<div class="alert alert-danger">Data belum tersedia</div>';
      }
      else
      {
          echo '<table class="table">
                    <thead><tr><th>Jurusan</th><th>Pendaftar</th><th>Daya Tampung</th></tr></thead>
                    <tbody>';
          foreach($Statistik as $s)
          {
              echo '<tr><td>';
              if ($s->idjurusan=='XXX') { echo 'Belum memilih'; }
              else
              { echo $s->idjurusan; }
              echo '</td>
                        <td>'.$s->jml.'</td>
                        <td>';
              if ($s->idjurusan!='XXX') { echo $s->ppdbsiswa; }
              echo '</td>
                    </tr>';
          }
          echo '</tbody></table>';
      }
      ?>
  </div>
</section>

<?php include('ppdb_akhir.php'); ?>

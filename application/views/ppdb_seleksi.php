<?php
include('ppdb_awal.php');
$CI =& get_instance();
$CI->load->model('Mymodel');
?>
<style>
    h5 { background-color: #d91717; color: white; padding: 3px 5px; margin-top: 20px;}
</style>
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Penerimaan Peserta Didik Baru </h2>
      <ol>
        <li><a href="<?php echo base_url();?>web"><?php echo $SEKOLAH['namasekolah'];?></a></li>
        <li>Seleksi</li>
      </ol>
    </div>
  </div>
</section>

<section id="features" class="features">
  <div class="container">
    <div class="section-title">
      <h2>Seleksi</h2>
      <p>Data Sementara </p>
    </div>

    <div class="alert alert-danger">Pendaftaran ditutup <b><?php echo $CI->Mymodel->tgltext($SEKOLAH['ppdbselesai']);?></b>. Setelah tanggal tersebut Anda tidak bisa lagi mengubah data pendaftaran !</div>

    <p><b>Berikut adalah data pemeringkatan sementara selama masa PPDB.</b></p>
    <hr/>
    <?php

    if ($JMLJURUSAN>0)
    {
        echo '<div class="row">
                  <div class="col-sm-3">
                    <ul class="nav nav-tabs flex-column">';
        $x=0;
        foreach($JURUSAN as $j)
        {
            echo ' <li class="nav-item">
                        <a class="nav-link';
            if ($x==0) { echo ' active show'; }
            echo '" data-bs-toggle="tab"
                    href="#profil'.$j->idjurusan.'">'.$j->namajurusan.'</a>
                    </li>';
            $x++;
        }
        echo '  </ul>
              </div>
              <div class="col-sm-9 mt-lg-0">
                <div class="tab-content">' ;
        $x=0;
        foreach($JURUSAN as $j)
        {
            echo '  <div class="tab-pane';
            if ($x==0) { echo ' active show'; }
            echo '" id="profil'.$j->idjurusan.'">
                        <div class="row">
                            <div class="col-sm-12 details order-2 order-lg-1">

                            <h5>'.$j->namajurusan.', Daya tampung: '.$j->ppdbsiswa.'</h5>';
            if ($Seleksi[$j->idjurusan]['JmlData']==0)
            {
                echo '<div class="alert alert-info">Data tida tersedia</div>';
            }
            else
            {
                echo '<table class="table">
                        <thead><tr><th>No.</th><th>No Pendaftaran</th><th>Nama Calon</th>
                            <th>Score</th></tr></thead>
                        <tbody>';
                $n=1;
                foreach($Seleksi[$j->idjurusan]['Data'] as $c)
                {
                    if ($n<=$j->ppdbsiswa)
                    {
                        echo '<tr><td>'.$n.'</td>
                                  <td>'.$c['nodaftar'].'</td>
                                  <td>'.$c['nama'].'</td>
                                  <td>'.$c['score'].'</td>
                              </tr>';
                    }
                    else
                    {
                        echo '<tr class="bg-danger"><td>'.$n.'</td>
                                  <td>'.$c['nodaftar'].'</td>
                                  <td>'.$c['nama'].'</td>
                                  <td>'.$c['score'].'</td>
                              </tr>';
                    }
                    $n++;
                }
                echo '</tbody></table>';
            }
            echo    '</div>
                        </div>
                    </div>';
            $x++;
        }
        echo '</div></div>';
    }

     ?>
  </div>
</section>

<?php include('ppdb_akhir.php'); ?>

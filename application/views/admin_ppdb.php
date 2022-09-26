<?php
include('admin_awal.php');
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"><i class="bx bxs-face"></i> PPDB</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">PPDB</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1>Data PPDB</h1>
                    <?php
                    if ($_SESSION['ADM_ID']==2)
                    {
                        echo '<h4 class="text-center mt-5">Jika PPDB sudah selesai !</h4>
                            <p class="text-center">
                                <a href="'.base_url().'admin/ppdb_reset" class="btn btn-danger">Hapus semua data PPDB !</a>
                            </p>';
                    }
                    ?>
        <?php
            echo '<div class="row"><div class="col-sm-4">
            <h3>Jurusan</h3>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">';
        $x=0;
        foreach($Jurusan as $j)
        {
            echo '<a class="nav-link';
            if ($x==0) { echo ' active'; }
            echo '" id="v-pills-'.$j->idjurusan.'-tab" data-toggle="pill" href="#v-pills-'.$j->idjurusan.'" role="tab" aria-controls="v-pills-'.$j->idjurusan.'" aria-selected="true">'.$j->namajurusan.'</a>';
            $x++;
        }
        echo '</div>
              </div>
              <div class="col-sm-8">

              <div class="tab-content" id="v-pills-tabContent">' ;
        $x=0;
        foreach($Jurusan as $j)
        {
            echo '<div class="tab-pane fade';
            if ($x==0) { echo ' show active'; }
            echo '" id="v-pills-'.$j->idjurusan.'" role="tabpanel" aria-labelledby="v-pills-'.$j->idjurusan.'-tab">';
            echo '<h3>Calon siswa</h3>';
            echo '<h4>'.$j->namajurusan.', Daya tampung: '.$j->ppdbsiswa.'</h4>';
            if ($Seleksi[$j->idjurusan]['JmlData']==0)
            {
                echo '<div class="alert alert-info">Data tida tersedia</div>';
            }
            else
            {
                echo '<table class="table">
                        <thead><tr><th>No.</th><th>No Pendaftaran</th><th>Nama Calon</th>
                            <th>Score</th><th>Pembayaran</th><th></th></tr></thead>
                        <tbody>';
                $n=1;
                foreach($Seleksi[$j->idjurusan]['Data'] as $c)
                {
                    if ($n<=$j->ppdbsiswa)
                    {
                        echo '<tr><td>'.$n.'</td>
                                  <td>'.$c['nodaftar'].'</td>
                                  <td>'.$c['nama'].'</td>
                                  <td>'.$c['score'].'</td>';

                    }
                    else
                    {
                        echo '<tr class="bg-danger"><td>'.$n.'</td>
                                  <td>'.$c['nodaftar'].'</td>
                                  <td>'.$c['nama'].'</td>
                                  <td>'.$c['score'].'</td>';

                    }
                     echo '<td>';
                    if ($c['tglbayar']=='0000-00-00')
                    {
                        echo '<span class="badge badge-danger">Belum</span>';
                    }
                    else
                    {
                        echo $c['tglbayar'];
                        if ($c['tglverifikasi']=='0000-00-00')
                        echo '<br/><span class="badge badge-info">Belum diverifikasi</span>';
                    }
                        echo '</td>';
                    echo '  <td>
                            <a href="'.base_url().'admin/calondetail/'.$c['nodaftar'].'"
                                target="_blank" class="btn btn-sm btn-primary"><i class="bx bx-search"></i></a>
                            </td>
                            </tr>';
                    $n++;
                }
                echo '</tbody></table>';
                echo '<p class="text-center mt-4">
                        <a href="'.base_url().'admin/ppdbctk/'.$j->idjurusan.'"
                            target="_blank"
                            class="btn btn-primary"><i class="bx  bx-printer"></i> Cetak</a>
                    </p>';
            }
            echo '</div>';

            $x++;
        }
        echo '</div></div>';


        ?>
          </div>
          <p class="text-center">
          	<a href="<?php echo base_url();?>admin/ppdb_lap" target="_blank"
          		class="btn btn-primary">Laporan Penerimaan PPDB</a>
          </p>
        </div>
      </div>
    </div>
</div>
<?php
include('admin_akhir.php');
?>

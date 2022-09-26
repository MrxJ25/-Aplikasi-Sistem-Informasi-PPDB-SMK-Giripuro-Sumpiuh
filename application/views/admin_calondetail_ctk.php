<?php
$CI =& get_instance();
$CI->load->model('Mymodel');
$jkel=array('L'=>'Laki-laki', 'P'=>'Perempuan');
$tingkat=array('Lokal', 'Kabupaten', 'Provinsi', 'Nasional', 'Internasional');
$peringkat=array('Tidak ada', 'Juara Harapan 3', 'Juara Harapan 2', 'Juara Harapan 1',
                 'Juara 3', 'Juara 2', 'Juara 1');
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $SEKOLAH['namasekolah'];?></title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>cssjs_adm/style.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <table class="table table-borderless">
  <tr><td width="110"><img src="<?php echo base_url();?>img/logo2.png" width="100" height="100"/></td>
    <td>
    <h4><?php echo $SEKOLAH['namasekolah'];?></h4>
    <p><?php echo $SEKOLAH['alamat'];?><br/>
        <?php echo $SEKOLAH['kota'];?>, Telp. <?php echo $SEKOLAH['telepon'];?>
    </p>
    <h3 class="text-center">DATA CALON SISWA PPDB <?php echo date('Y');?></h3>

    <h4> Data Calon Siswa</h4>
    <div class="row  mb-3">
        <div class="col-sm-2">
            <img src="<?php echo base_url();?>img/berkas/<?php echo $Calon['nodaftar'];?>_foto.jpg" class="img-fluid"/>
        </div>
        <div class="col-sm-4">
            <table class="table table-sm table-borderless">
                <tr><td>No. Pendaftaran</td><td>:</td><td><?php echo $Calon['nodaftar'];?></td></tr>
                <tr><td>Tgl. Pendaftaran</td><td>:</td><td><?php echo $CI->Mymodel->tgltext(substr($Calon['tgldaftar'],0,10)).' '.substr($Calon['tgldaftar'],11) ;?></td></tr>
                <tr><td>Pilihan Jurusan </td><td>:</td><td><?php echo $Calon['idjurusan'];?> / <?php echo $Calon['namajurusan'];?></td></tr>
                <tr><td>Nama</td><td>:</td><td><?php echo $Calon['nama'];?></td></tr>
                <tr><td>Jenis Kelamin</td><td>:</td><td><?php echo $jkel[$Calon['jeniskel']];?></td></tr>
                <tr><td>Temp/Tg. Lahir</td><td>:</td><td><?php echo $Calon['tmplahir'];?>, <?php echo $CI->Mymodel->tgltext($Calon['tgllahir']);?>  </td></tr>
                <tr><td>Alamat</td><td>:</td><td><?php echo $Calon['alamat'];?></td></tr>
                <tr><td>Kota</td><td>:</td><td><?php echo $Calon['kota'];?></td></tr>
                <tr><td>Telepon</td><td>:</td><td><?php echo $Calon['telepon'];?></td></tr>
                <tr><td>Email</td><td>:</td><td><?php echo $Calon['email'];?></td></tr>
                <tr><td>Sekolah Asal</td><td>:</td><td><?php echo $Calon['asalsekolah'];?>, <?php echo $Calon['kotasekolah'];?></td></tr>
            </table>
        </div>
        <div class="col-sm-3">
            <table class="table table-sm table-borderless">
                <tr><td>Nama ayah</td><td>:</td><td><?php echo $Calon['namaayah'];?></td></tr>
                <tr><td>Pekerjaan ayah</td><td>:</td><td><?php echo $Calon['pekerjaanayah'];?></td></tr>
                <tr><td>Telepon ayah</td><td>:</td><td><?php echo $Calon['teleponayah'];?></td></tr>

                <tr><td>Nama ibu</td><td>:</td><td><?php echo $Calon['namaibu'];?></td></tr>
                <tr><td>Pekerjaan ibu</td><td>:</td><td><?php echo $Calon['pekerjaanibu'];?></td></tr>
                <tr><td>Telepon ibu</td><td>:</td><td><?php echo $Calon['teleponibu'];?></td></tr>

                <tr><td>Nama wali</td><td>:</td><td><?php echo $Calon['namawali'];?></td></tr>
                <tr><td>Pekerjaan Wali</td><td>:</td><td><?php echo $Calon['pekerjaanwali'];?></td></tr>
                <tr><td>Telepon Wali</td><td>:</td><td><?php echo $Calon['teleponwali'];?></td></tr>
            </table>
        </div>
        <div class="col-sm-3">
            <table class="table table-sm table-borderless">
                <tr><td>Nilai ijazah</td><td>:</td><td><?php echo $Calon['nilaiijazah'];?></td></tr>
                <tr><td>Nilai UN</td><td>:</td><td><?php echo $Calon['nilaiun'];?></td></tr>
                <tr><td>Prestasi (sertifikat)</td><td>:</td><td><?php echo $Calon['sertifikat'];?></td></tr>
                <tr><td>Score</td><td>:</td><td><?php echo $Calon['score'];?></td></tr>
            </table>
        </div>
    </div>

    <h4>Prestasi</h4>
    <?php
    if ($JmlPrestasi==0)
    {
        echo '<div class="alert alert-info">Tidak ada</div>';
    }
    else
    {
        echo '<table class="table table-sm">
                <thead><tr><th>No</th><th>Keterangan</th>
                    <th>Tingkat</th><th>Peringkat</th><th>Nilai</th></tr></thead>
                <tbody>';
        $n=1;
        foreach($Prestasi as $p)
        {
            echo '<tr><td>'.$n.'</td>
                      <td>'.$p->keterangan.'</td>
                      <td>'.$tingkat[$p->tingkat].'</td>
                      <td>'.$peringkat[$p->peringkat].'</td>
                      <td>'.$p->nilai.'</td>

                </tr>';
            $n++;
        }
        echo '</tbody></table>';
    }
    ?>
    </div>

    <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Informasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Tekan <kbd>Ctrl</kbd> <kbd>P</kbd> untuk mencetak...</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url();?>cssjs_adm/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>cssjs_adm/popper.min.js"></script>
    <script src="<?php echo base_url();?>cssjs_adm/bootstrap.min.js"></script>
    <script type="text/javascript">
       $(window).on('load',function(){
            $('#exampleModal').modal('show');
        });
    </script>
</body>
</html>

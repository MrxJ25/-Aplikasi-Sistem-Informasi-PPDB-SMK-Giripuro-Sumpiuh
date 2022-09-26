<?php 
include('admin_awal.php'); 
$CI =& get_instance();
$CI->load->model('Mymodel');
$jkel=array('L'=>'Laki-laki', 'P'=>'Perempuan');
$tingkat=array('Lokal', 'Kabupaten', 'Provinsi', 'Nasional', 'Internasional');
$peringkat=array('Tidak ada', 'Juara Harapan 3', 'Juara Harapan 2', 'Juara Harapan 1',
                 'Juara 3', 'Juara 2', 'Juara 1');
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"><i class="bx bx-user"></i> Data Calon Siswa</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Calon Siswa</li>
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
                    <h1> Data Calon Siswa</h1>
                    <div class="row  mb-3">
                        <div class="col-sm-4">
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
                        <div class="col-sm-4">
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
                    </div> 
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-sm table-borderless">
                                <tr><td>Nilai ijazah</td><td>:</td><td><?php echo $Calon['nilaiijazah'];?></td></tr>
                                <tr><td>Nilai UN</td><td>:</td><td><?php echo $Calon['nilaiun'];?></td></tr>
                                <tr><td>Prestasi (sertifikat)</td><td>:</td><td><?php echo $Calon['sertifikat'];?></td></tr>
                                <tr><td>Score</td><td>:</td><td><?php echo $Calon['score'];?></td></tr>                    
                            </table>
                        </div>
                        <div class="col-sm-6">
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
                                            <th>Tingkat</th><th>Peringkat</th><th>Nilai</th><th></th></tr></thead>
                                        <tbody>';
                                $n=1;
                                foreach($Prestasi as $p)
                                {
                                    echo '<tr><td>'.$n.'</td>
                                              <td>'.$p->keterangan.'</td>
                                              <td>'.$tingkat[$p->tingkat].'</td>
                                              <td>'.$peringkat[$p->peringkat].'</td>
                                              <td>'.$p->nilai.'</td>
                                              <td><a href="'.base_url().'img/berkas/'.$Calon['nodaftar'].'_sert_'.$p->idprestasi.'.jpg" target="_blank" class="btn btn-sm btn-info"><i class="bx bx-search"></i></a>
                                              </td>
                                        </tr>';
                                    $n++;
                                }
                                echo '</tbody></table>';
                            }
                            ?>
                        </div>    
                    </div>
                    
                    <h3 class="mt-3">Berkas :</h3>
                    <div class="row">
                        <div class="col-sm-3">
                            <h4>Kartu Keluarga</h4>
                            <p>
                            <?php
                            $f='img/berkas/'.$Calon['nodaftar'].'_kk.jpg';
                            if (file_exists('./'.$f))
                            {
                                echo '<a href="'.base_url().$f.'" target="_blank" class="btn btn-success">Lihat</a>';
                            }
                            else
                            {
                                echo '<span class="label label-danger">Tidak ada</span>';
                            }
                            ?>
                            </p>    
                        </div>
                        <div class="col-sm-3">
                            <h4>Ijazah</h4>
                            <p>
                            <?php
                            $f='img/berkas/'.$Calon['nodaftar'].'_ijazah.jpg';
                            if (file_exists('./'.$f))
                            {
                                echo '<a href="'.base_url().$f.'" target="_blank" class="btn btn-success">Lihat</a>';
                            }
                            else
                            {
                                echo '<span class="label label-danger">Tidak ada</span>';
                            }
                            ?>
                            </p>    
                        </div>
                        <div class="col-sm-3">
                            <h4>Nilai UN</h4>
                            <p>
                            <?php
                            $f='img/berkas/'.$Calon['nodaftar'].'_un.jpg';
                            if (file_exists('./'.$f))
                            {
                                echo '<a href="'.base_url().$f.'" target="_blank" class="btn btn-success">Lihat</a>';
                            }
                            else
                            {
                                echo '<span class="label label-danger">Tidak ada</span>';
                            }
                            ?>
                            </p>   
                        </div>
                        <div class="col-sm-3">
                            <p class="text-center mt-4">
                                <a href="<?php echo base_url();?>admin/calondetail_ctk/<?php echo $Calon['nodaftar'];?>" target="_blank" class="btn btn-primary"><i class="bx bx-printer"></i> Cetak</a>
                            </p>
                        </div>
                    </div>
                    <h3 class="mt-3">Data Pembayaran</h3>
                    <?php
                    if ($Calon['tglbayar']=='0000-00-00')
                    {
                        echo '<div class="alert alert-danger">Belum bayar</div>';
                        ?>
                        <h4>Formulir bukti pembayaran</h4>    
                          <form name="byr" method="post" action="<?php echo base_url();?>admin/ppdbbayar" enctype="multipart/form-data">
                            <div class="row">
                              <fieldset class="col-sm-4"><label>Tanggal Bayar</label>
                                <input type="date" name="tglbayar" class="form-control" data-validate="required"/>
                              </fieldset>
                              <fieldset class="col-sm-8"><label>Transfer ke Bank</label>
                                <select name="idbank" class="form-control">
                                  <?php
                                  foreach($Bank as $b)
                                  {
                                      echo '<option value="'.$b->idbank.'">'.$b->namabank.', 
                                        Rek '.$b->norekening.', Atas nama : '.$b->atasnama.'</option>';
                                  }
                                  ?>
                                </select>
                              </fieldset> 
                            </div>
                             <fieldset><label>Foto</label>
                                <input type="file" name="bukti" accept="image/jpeg"/>
                               
                                <p><img src="<?php echo base_url().'img/no_image.jpg';?>" class="img-fluid"/>
                                        </p>
                            </fieldset>
                              <input type="hidden" name="nodaftar" value="<?php echo $Calon['nodaftar'];?>"/>
                            <p class="text-center mt-4">
                              <button type="submit" class="btn btn-primary">
                                  <i class="bx bx-check"></i> Kirim</button>
                              </p>  
                          </form>
                    <?php
                    }
                    else
                    {
                        echo '<div class="row"><div class="col-sm-6">';
                        echo '<p><img src="'.base_url().'img/berkas/'.$Calon['nodaftar'].'_bayar.jpg" class="img-fluid"/></p>
                                </div>
                                <div class="col-sm-6">';
                        echo '<p>Tanggal Bayar: '.$Calon['tglbayar'].'</p>';
                        if ($Calon['tglverifikasi']=='0000-00-00')
                        {
                            echo '<div class="alert alert-info">Pembayaran belum diverifikasi</div>
                            <p class="text-center mt-4"><a href="'.base_url().'admin/ppdbveri/'.$Calon['nodaftar'].'" class="btn btn-success"><i class="bx bx-check"></i> Verfikasi pembayaran</a></p>';
                        }
                        else
                        {
                            echo '<p>Tanggal Verifikasi: '.$Calon['tglverifikasi'].'</p>';
                            echo '<div class="alert alert-success">Pembayaran sudah diverifikasi oleh : <b>'.$Calon['namaadmin'].'</div>';
                        }    
                        echo '</div></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('admin_akhir.php'); ?>
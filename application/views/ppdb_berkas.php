<?php 
include('ppdb_awal.php'); 
$CI =& get_instance();
$CI->load->model('Mymodel');
$tingkat=array('Lokal', 'Kabupaten', 'Provinsi', 'Nasional', 'Internasional');
$peringkat=array('Tidak ada', 'Juara Harapan 3', 'Juara Harapan 2', 'Juara Harapan 1',
                 'Juara 3', 'Juara 2', 'Juara 1');
?>
    
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Penerimaan Peserta Didik Baru </h2>
      <ol>
        <li><a href="<?php echo base_url();?>web"><?php echo $SEKOLAH['namasekolah'];?></a></li>
        <li>Pemberkasan</li>
      </ol>
    </div>
  </div>
</section>

<section id="blog" class="blog ">
  <div class="container">
    <div class="section-title">
      <h2>Data Calon Siswa</h2>
      <p>Pemberkasan Anda </p>
    </div>
    <p class="text-end"><a href="<?php echo base_url();?>ppdb/berkas_ctk" class="btn btn-primary" target="_blank"><i class="bx bx-printer"></i> Cetak</a></p>  
    <h5>Pendaftaran ditutup <?php echo $CI->Mymodel->tgltext($SEKOLAH['ppdbselesai']);?></h5>
      
    <?php
      if ($CALON['tglverifikasi']=='0000-00-00')
      {
          if ($CALON['tglbayar']=='0000-00-00')
          {
              echo '<div class="alert alert-info">Segera lakukan pembayaran biaya pendaftaran <b>Rp '.number_format($SEKOLAH['biayappdb'],0,',','.').'</b>. Selanjutnya isi formulir konfirmasi pembayaran dibawah ini:</div>';
              ?>
            
              <h4>Formulir bukti pembayaran</h4>    
              <form name="byr" method="post" action="<?php echo base_url();?>ppdb/bayar" enctype="multipart/form-data">
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
                    <?php
                    $f='img/berkas/'.$CALON['nodaftar'].'_bayar.jpg';
                    if (file_exists('./'.$f)) 
                    { $foto=base_url().$f;}
                    else
                    {
                        $foto=base_url().'img/no_image.jpg';
                    }
                    ?>
                    <p><img src="<?php echo $foto;?>" class="img-fluid"/>
                            </p>
                </fieldset>
                <p class="text-center mt-4">
                  <button type="submit" class="btn btn-primary">
                      <i class="bx bx-check"></i> Kirim</button>
                  </p>  
              </form>
          <?php
          }
          else
          {
              echo '<div class="alert alert-info">Pembayaran Anda belum diverifikasi oleh panitia. Mohon menunggu 1 x 24jam. Anda dapat menghubungi Panitia di nomor wa : +62 '.$SEKOLAH['wappdb'].'</div>';
          }
      }
      else
      {
          ?>
    <div class="alert alert-info">
        <p>Pastikan data anda sudah diisi dengan lengkap dan benar. Kesalahan pengisian data dapat menyebabkan Anda gagal dalam seleksi !</p>
    </div>  
    
    <div class="row">
        <div class="col-sm-6">
            <form name="berkas" method="post" action="<?php echo base_url();?>ppdb/berkassv"
                enctype="multipart/form-data">
                <h5>Pilihan Jurusan</h5>
                <fieldset>
                    <select name="idjurusan" class="form-control">
                    <?php
                    foreach($JURUSAN as $j)
                    {
                        echo '<option value="'.$j->idjurusan.'"';
                        if ($j->idjurusan==$CALON['idjurusan']) { echo ' selected'; }
                        echo '>'.$j->namajurusan.'</option>';
                    }
                    ?>    
                    </select>
                </fieldset>
                <h5>Kartu Keluarga</h5>
                <fieldset>
                    <input type="file" name="kk" accept="image/jpeg"/>
                    <?php
                    $f='img/berkas/'.$CALON['nodaftar'].'_kk.jpg';
                    if (file_exists('./'.$f)) 
                    { $foto=base_url().$f;}
                    else
                    {
                        $foto=base_url().'img/no_image.jpg';
                    }
                    ?>
                    <p><img src="<?php echo $foto;?>" class="img-fluid"/>
                            </p>
                </fieldset>
                <h5>Ijazah</h5>
                <fieldset><label>Nilai Ijazah</label>
                    <input type="text" name="nilaiijazah" class="form-control"
                           value="<?php echo $CALON['nilaiijazah'];?>" data-validate="required,decimal(2)"/>
                </fieldset>
                <fieldset><label>Upload Ijazah</label>
                    <input type="file" name="ijazah" accept="image/jpeg"/>
                    <?php
                    $f='img/berkas/'.$CALON['nodaftar'].'_ijazah.jpg';
                    if (file_exists('./'.$f)) 
                    { $foto=base_url().$f;}
                    else
                    {
                        $foto=base_url().'img/no_image.jpg';
                    }
                    ?>
                    <p><img src="<?php echo $foto;?>" class="img-fluid"/>
                            </p>
                </fieldset>
                
                <h5>Ujian Nasional (UN)</h5>
                <fieldset><label>Nilai UN</label>
                    <input type="text" name="nilaiun" class="form-control"
                           value="<?php echo $CALON['nilaiun'];?>" data-validate="required,decimal(2)"/>
                </fieldset>
                <fieldset><label>Upload UN</label>
                    <input type="file" name="un" accept="image/jpeg"/>
                    <?php
                    $f='img/berkas/'.$CALON['nodaftar'].'_un.jpg';
                    if (file_exists('./'.$f)) 
                    { $foto=base_url().$f;}
                    else
                    {
                        $foto=base_url().'img/no_image.jpg';
                    }
                    ?>
                    <p><img src="<?php echo $foto;?>" class="img-fluid"/>
                            </p>
                </fieldset>
                <p class="text-center mt-4">
                    <button type="submit" class="btn btn-danger"><i class="bx bx-check"></i> Simpan</button>
                </p>
            </form>    
        </div> 
        <div class="col-sm-6">
            <h4>Prestasi</h4>
            <?php
            if ($JmlPrestasi>0)
            {
                echo '<table class="table">
                        <thead><tr><th>Keterangan</th><th>Tingkat</th><th>Peringkat</th><th></th></tr></thead>
                        <tbody>';
                foreach($Prestasi as $p)
                {
                    echo '<tr><td>'.$p->keterangan.'</td>
                              <td>'.$tingkat[$p->tingkat].'</td>
                              <td>'.$peringkat[$p->peringkat].'</td>
                              <td>
                                <a href="'.base_url().'ppdb/prestasi_del/'.$p->idprestasi.'" class="btn btn-danger btn-sm"
                                onclick="return confirm(\'Hapus prestasi?\');">
                                <i class="bx bx-trash"></i></a>
                            </td>
                        </tr>';
                }
                echo '</tbody></table>';
            }
            else
            {
                echo '<div class="alert alert-info">Belum ada data prestasi...</div>';
            }
            ?>
            <hr/>
            <h5>Tambah data prestasi</h5>
            <form name="pres" method="post" action="<?php echo base_url();?>ppdb/prestasisv" enctype="multipart/form-data">
                <fieldset><label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" data-validate="required"></textarea>
                </fieldset>
                <fieldset><label>Tingkat</label>
                    <select name="tingkat" class="form-control">
                    <?php
                    $x=0;
                    foreach ($tingkat as $t)
                    {
                        echo '<option value="'.$x.'">'.$t.'</option>';
                        $x++;
                    }    
                    ?>
                    </select>
                </fieldset>
                <fieldset><label>Peringkat</label>
                    <select name="peringkat" class="form-control">
                    <?php
                    $x=0;
                    foreach ($peringkat as $t)
                    {
                        echo '<option value="'.$x.'">'.$t.'</option>';
                        $x++;
                    }    
                    ?>
                    </select>
                </fieldset>
                <fieldset><label>Upload Sertifikat</label>
                    <input type="file" name="sertifikat" accept="image/jpeg" data-validate="required"/>
                </fieldset>
                <p class="text-center mt-4">
                    <button type="submit" class="btn btn-danger"><i class="bx bx-check"></i> Simpan</button>
                </p>
            </form>
        </div> 
    </div> 
      
      <?php
      }
      ?>
  </div>
</section>

<?php include('ppdb_akhir.php'); ?>

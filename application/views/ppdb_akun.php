<?php
include('ppdb_awal.php');
$CI =& get_instance();
$CI->load->model('Mymodel');
?>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Penerimaan Peserta Didik Baru </h2>
      <ol>
        <li><a href="<?php echo base_url();?>web"><?php echo $SEKOLAH['namasekolah'];?></a></li>
        <li>Data Calon</li>
      </ol>
    </div>
  </div>
</section>

<section id="blog" class="blog ">
  <div class="container">
    <div class="section-title">
      <h2>Data Calon Siswa</h2>
      <p>Data Anda </p>
    </div>

    <div class="alert alert-info">
        <p>Pastikan data anda sudah diisi dengan lengkap dan benar. Kesalahan pengisian data dapat menyebabkan Anda gagal dalam seleksi !</p>
    </div>

    <form name="akun" method="post" action="<?php echo base_url();?>ppdb/akunsv"
        enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <h4>Data Calon siswa</h4>
                    <fieldset><label>Pendaftaran</label>
                        <p>Nomor : <?php echo $CALON['nodaftar'];?> |
                            <i class="bx bx-calendar"></i> <?php echo $CI->Mymodel->tgltext(substr($CALON['tgldaftar'],0,10));?>
                            <i class="bx bx-time"></i> <?php echo substr($CALON['tgldaftar'],11);?>
                        </p>
                    </fieldset>
                    <fieldset><label>Email</label>
                        <p><?php echo $CALON['email'];?></p>
                    </fieldset>
                    <fieldset><label>Nama Lengkap</label>
                        <input type="text" name="nama" value="<?php echo $CALON['nama'];?>" data-validate="required" maxlength="40" class="form-control"/>
                    </fieldset>
                    <fieldset><label>Jenis Kelamin</label>
                        <select name="jeniskel"  class="form-control">
                            <option value="L" <?php if ($CALON['jeniskel']=='L') { echo 'selected'; }?>>Laki-laki</option>
                            <option value="P" <?php if ($CALON['jeniskel']=='P') { echo 'selected'; }?>>Perempuan</option>
                        </select>
                    </fieldset>
                    <fieldset><label>Tempat Lahir</label>
                        <input type="text" name="tmplahir" value="<?php echo $CALON['tmplahir'];?>" data-validate="required" maxlength="30" class="form-control"/>
                    </fieldset>
                    <fieldset><label>Tanggal Lahir</label>
                        <input type="date" name="tgllahir" value="<?php echo $CALON['tgllahir'];?>" data-validate="required" class="form-control"/>
                    </fieldset>
                    <fieldset><label>Alamat</label>
                        <input type="text" name="alamat" value="<?php echo $CALON['alamat'];?>" data-validate="required" maxlength="100" class="form-control"/>
                    </fieldset>
                    <fieldset><label>Kota</label>
                        <input type="text" name="kota" value="<?php echo $CALON['kota'];?>" data-validate="required" maxlength="40" class="form-control"/>
                    </fieldset>
                    <fieldset><label>Telepon</label>
                        <input type="text" name="telepon" value="<?php echo $CALON['telepon'];?>" data-validate="required,number" maxlength="20" class="form-control"/>
                    </fieldset>
                    <fieldset><label>Asal Sekolah</label>
                        <input type="text" name="asalsekolah" value="<?php echo $CALON['asalsekolah'];?>" data-validate="required" maxlength="40" class="form-control"/>
                    </fieldset>
                    <fieldset><label>Kota Asal Sekolah</label>
                        <input type="text" name="kotasekolah" value="<?php echo $CALON['kotasekolah'];?>" data-validate="required" maxlength="40" class="form-control"/>
                    </fieldset>
            </div>
            <div class="col-sm-6">
                <h4>Data Orang Tua</h4>
                <fieldset><label>Nama Ayah</label>
                    <input type="text" name="namaayah" value="<?php echo $CALON['namaayah'];?>" data-validate="required" maxlength="40" class="form-control"/>
                </fieldset>
                <fieldset><label>Pekerjaan Ayah</label>
                    <input type="text" name="pekerjaanayah" value="<?php echo $CALON['pekerjaanayah'];?>" data-validate="required" maxlength="20" class="form-control"/>
                </fieldset>
                <fieldset><label>Telepon Ayah</label>
                    <input type="text" name="teleponayah" value="<?php echo $CALON['teleponayah'];?>" data-validate="required" maxlength="20" class="form-control"/>
                </fieldset>
                <fieldset><label>Nama Ibu</label>
                    <input type="text" name="namaibu" value="<?php echo $CALON['namaibu'];?>" data-validate="required" maxlength="40" class="form-control"/>
                </fieldset>
                <fieldset><label>Pekerjaan Ibu</label>
                    <input type="text" name="pekerjaanibu" value="<?php echo $CALON['pekerjaanibu'];?>" data-validate="required" maxlength="20" class="form-control"/>
                </fieldset>
                <fieldset><label>Telepon Ibu</label>
                    <input type="text" name="teleponibu" value="<?php echo $CALON['teleponibu'];?>" data-validate="required" maxlength="20" class="form-control"/>
                </fieldset>

                <fieldset><label>Nama Wali</label>
                    <input type="text" name="namawali" value="<?php echo $CALON['namawali'];?>"  maxlength="40" class="form-control"/>
                </fieldset>
                <fieldset><label>Pekerjaan Wali</label>
                    <input type="text" name="pekerjaanwali" value="<?php echo $CALON['pekerjaanwali'];?>"  maxlength="20" class="form-control"/>
                </fieldset>
                <fieldset><label>Telepon Wali</label>
                    <input type="text" name="teleponwali" value="<?php echo $CALON['teleponwali'];?>" maxlength="20" class="form-control"/>
                </fieldset>

                <fieldset><label>Foto</label>
                    <input type="file" name="foto" accept="image/jpeg" data-validate="required"/>
                    <?php
                    $f='img/berkas/'.$CALON['nodaftar'].'_foto.jpg';
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
            </div>
        </div>
        <p class="text-center mt-4">
            <button type="submit" class="btn btn-danger"><i class="bx bx-check"></i> Simpan</button>
        </p>
    </form>
  </div>
</section>

<?php include('ppdb_akhir.php'); ?>

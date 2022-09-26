<?php
include('admin_awal.php');
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"><i class="bx bx-building-house"></i> Sekolah</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sekolah</li>
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
                    <h1>Sekolah</h1>
          <form name="ubah" method="post" action="<?php echo base_url();?>admin/sekolah" >
            <div class="row">
              
            <fieldset class="col-sm-6"><label>Nama Sekolah</label>
                <input type="text" name="namasekolah" value="<?php echo $Skl['namasekolah'];?>"
                    class="form-control" maxlength="40" data-validate="required"/>
            </fieldset>
            <fieldset class="col-sm-6"><label>Alamat</label>
                <input type="text" name="alamat" value="<?php echo $Skl['alamat'];?>"
                    class="form-control" maxlength="100" data-validate="required"/>
            </fieldset>
            <fieldset class="col-sm-6"><label>Kota</label>
                <input type="text" name="kota" value="<?php echo $Skl['kota'];?>"
                    class="form-control" maxlength="40" data-validate="required"/>
            </fieldset>
            <fieldset class="col-sm-3"><label>Telepon</label>
                <input type="text" name="telepon" value="<?php echo $Skl['telepon'];?>"
                    class="form-control" maxlength="30" data-validate="required"/>
            </fieldset>
            <fieldset class="col-sm-3"><label>Telepon WA</label>
                <input type="text" name="teleponwa" value="<?php echo $Skl['teleponwa'];?>"
                    class="form-control" maxlength="12" data-validate="required"/>
            </fieldset> 
            <fieldset class="col-sm-6"><label>Email</label>
                <input type="text" name="email" value="<?php echo $Skl['email'];?>"
                    class="form-control" maxlength="40" data-validate="required,email"/>
            </fieldset>
            <fieldset class="col-sm-6"><label>Facebook</label>
                <input type="text" name="facebook" value="<?php echo $Skl['facebook'];?>"
                    class="form-control" maxlength="100" data-validate="required,url"/>
            </fieldset> 
            <fieldset class="col-sm-6"><label>Instagram</label>
                <input type="text" name="instagram" value="<?php echo $Skl['instagram'];?>"
                    class="form-control" maxlength="100" data-validate="required,url"/>
            </fieldset> 
            <fieldset class="col-sm-6"><label>Youtube</label>
                <input type="text" name="youtube" value="<?php echo $Skl['youtube'];?>"
                    class="form-control" maxlength="100" data-validate="required,url"/>
            </fieldset>   
            <fieldset class="col-sm-3"><label>Google Map</label>
                <input type="text" name="gmap" value="<?php echo $Skl['gmap'];?>"
                    class="form-control" maxlength="30" data-validate="required"/>
            </fieldset> 
            <fieldset class="col-sm-3"><label>Tampilkan menu PPDB</label>
                <select name="ppdbaktif" class="form-control">
                    <option value="Y" <?php if ($Skl['ppdbaktif']=='Y') { echo 'selected';}?>>Ya</option>
                    <option value="T" <?php if ($Skl['ppdbaktif']=='T') { echo 'selected';}?>>Tidak</option>
                </select>
            </fieldset> 
            <fieldset class="col-sm-3"><label>PPDB Mulai Tanggal</label>
                <input type="date" name="ppdbmulai" value="<?php echo $Skl['ppdbmulai'];?>"
                    class="form-control" data-validate="required"/>
            </fieldset>
            <fieldset class="col-sm-3"><label>PPDB Selesai Tanggal</label>
                <input type="date" name="ppdbselesai" value="<?php echo $Skl['ppdbselesai'];?>"
                    class="form-control" data-validate="required"/>
            </fieldset>  
            <fieldset class="col-sm-3"><label>Biaya PPDB</label>
                <input type="text" name="biayappdb" value="<?php echo $Skl['biayappdb'];?>" maxlength="10"
                    class="form-control" data-validate="required,number"/>
            </fieldset>
            <fieldset class="col-sm-3"><label>WA Panitia PPDB</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">+62</span>
                    </div>
                    <input type="text" name="wappdb" value="<?php echo $Skl['wappdb'];?>" maxlength="10"
                    class="form-control" data-validate="required,number"/>
                </div>
            </fieldset>    
              </div>
              
            <fieldset><label>Intro</label>
                <textarea name="intro" class="form-control" data-validate="required"  rows="5"><?php echo htmlentities($Skl['intro'], ENT_QUOTES);?></textarea>
            </fieldset>  
            <p class="text-center mt-4">
                <button type="submit" class="btn btn-primary"><i class="bx bx-check"></i> Simpan</button>
            </p>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include('admin_akhir.php');
?>   
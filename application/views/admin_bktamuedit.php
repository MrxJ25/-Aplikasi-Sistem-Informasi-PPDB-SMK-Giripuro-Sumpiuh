<?php 
include('admin_awal.php'); 
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"><i class="bx bx-comment-detail"></i> Buku Tamu</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin/bukutamu">Jurusan</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Buku Tamu</li>
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
                    <h1>Edit Buku Tamu</h1>
                    <p class="text-right"><a href="<?php echo base_url();?>admin/ bukutamu"
                        class="btn btn-danger"><i class="bx bx-x"></i> Batal</a></p>
                    <form name="jur" method="post" action="<?php echo base_url('admin/bukutamuedit');?>">
                        <div class="row">
                        <fieldset class="col-sm-6"><label>Dari</label>
                            <p><b><?php echo $BkTamu['nama'];?> (<?php echo $BkTamu['email'];?>)</b></p>
                        </fieldset>
                        <fieldset class="col-sm-6"><label>Komentar</label>
                            <textarea name="komentar"  class="form-control" data-validate="required"><?php echo $BkTamu['komentar'];?></textarea>
                        </fieldset>
                        <fieldset><label>Tampilkan</label>
                            <select name="tampil" class="form-control">
                                <option value="Y" <?php if ($BkTamu['tampil']=='Y') { echo 'selected';}?>>Ya</option>
                                <option value="T" <?php if ($BkTamu['tampil']=='T') { echo 'selected';}?>>Tidak</option>
                            </select>
                        </fieldset>
                        </div>
                        <input type="hidden" name="idbktamu" value="<?php echo $BkTamu['idbktamu'];?>" />
                        <p class="text-center mt-4">
                            <button type="submit" class="btn btn-primary"><i class="bx bx-check"></i> Simpan</button>
                        </p>	
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('admin_akhir.php'); ?>
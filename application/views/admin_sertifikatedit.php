<?php 
include('admin_awal.php'); 
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"><i class="bx bx-notification"></i> Sertifikat</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin/sertifikat">Sertifikat</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Sertifikat</li>
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
                    <h1>Edit Sertifikat</h1>
                    <p class="text-right"><a href="<?php echo base_url();?>admin/sertifikat"
                        class="btn btn-danger"><i class="bx bx-x"></i> Batal</a></p>
                    <form name="guru" method="post" action="<?php echo base_url('admin/sertifikatedit');?>"
                        enctype="multipart/form-data">
                        <div class="row">
                        <fieldset class="col-sm-6"><label>Nama</label>
                            <input type="text" name="nama" maxlength="30" class="form-control" data-validate="required" value="<?php echo $Sertifikat['nama'];?>">
                        </fieldset>
                        
                        <fieldset class="col-sm-6"><label>Logo (300x300 px, png)</label>
                            <input type="file" name="foto" accept="image/x-png" data-validate="required"/>
                            <p><img src="<?php echo base_url();?>img/sert_<?php echo $Sertifikat['idsertifikat'];?>.png"</p>
                        </fieldset>
                        </div>
                        <input type="hidden" name="idsertifikat" value="<?php echo $Sertifikat['idsertifikat'];?>"/>
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
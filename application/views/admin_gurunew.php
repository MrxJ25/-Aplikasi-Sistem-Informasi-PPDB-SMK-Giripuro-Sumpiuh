<?php 
include('admin_awal.php'); 
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"><i class="bx bx-user-circle"></i> Guru dan Staff</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin/gurustaff">Guru dan Staff</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Guru dan Staff</li>
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
                    <h1> Tambah Guru dan Staff</h1>
                    <p class="text-right"><a href="<?php echo base_url();?>admin/gurustaff"
                        class="btn btn-danger"><i class="bx bx-x"></i> Batal</a></p>
                    <form name="guru" method="post" action="<?php echo base_url('admin/gurustaffnew');?>"
                        enctype="multipart/form-data">
                        <div class="row">
                        <fieldset class="col-sm-6"><label>Nama</label>
                            <input type="text" name="nama" maxlength="40" class="form-control" data-validate="required">
                        </fieldset>
                        <fieldset class="col-sm-6"><label>Tugas</label>
                            <input type="text" name="tugas" maxlength="30" class="form-control" data-validate="required">
                        </fieldset>
                        <fieldset class="col-sm-6"><label>Facebook</label>
                            <input type="text" name="facebook" maxlength="100" class="form-control" data-validate="url">
                        </fieldset>
                        <fieldset class="col-sm-6"><label>Instagram</label>
                            <input type="text" name="instagram" maxlength="100" class="form-control" data-validate="url">
                        </fieldset>
                        
                        <fieldset class="col-sm-6"><label>Foto (200x200 px, jpg)</label>
                            <input type="file" name="foto" accept="image/jpeg" data-validate="required"/>
                        </fieldset>
                        </div>
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
<?php 
include('admin_awal.php'); 
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"><i class="bx bx-rocket"></i> Jurusan</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin/jurusan">Jurusan</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Jurusan</li>
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
                    <h1> Tambah Jurusan</h1>
                    <p class="text-right"><a href="<?php echo base_url();?>admin/jurusan"
                        class="btn btn-danger"><i class="bx bx-x"></i> Batal</a></p>
                    <form name="guru" method="post" action="<?php echo base_url('admin/jurusannew');?>">
                        <div class="row">
                        <fieldset class="col-sm-6"><label>Kode</label>
                            <input type="text" name="idjurusan" maxlength="10" class="form-control" data-validate="required,alphaonly">
                        </fieldset>
                        <fieldset class="col-sm-6"><label>Nama Jurusan</label>
                            <input type="text" name="namajurusan" maxlength="40" class="form-control" data-validate="required">
                        </fieldset>
                        <fieldset class="col-sm-6"><label>Daya Tampung</label>
                            <input type="text" name="ppdbsiswa" maxlength="10" class="form-control" data-validate="required,number">
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
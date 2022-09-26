<?php 
include('admin_awal.php'); 
$CI =& get_instance();
$CI->load->model('Mymodel');
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"><i class="bx bx-home-heart"></i> Profil</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin/profil">Profil</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Profil</li>
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
                    <h1> Tambah Profil</h1>
                    <p class="text-right"><a href="<?php echo base_url();?>admin/profil"
                        class="btn btn-danger"><i class="bx bx-x"></i> Batal</a></p>
                    <script src="<?php echo base_url('ckeditor/ckeditor.js');?>"></script>

                    <form name="ktg" method="post" action="<?php echo base_url('admin/profilnew');?>">
                        <fieldset><label>Judul</label>
                            <input type="text" name="judul" maxlength="40" class="form-control" data-validate="required">
                        </fieldset>

                        <fieldset class="mt-4"><label>Deskripsi</label>
                            <textarea name="deskripsi" class="ckeditor"></textarea>
                        </fieldset>

                        <div class="row">
                            <div class="col-sm-3">
                                <fieldset><label>Tampilkan</label>
                                    <select name="tampil" class="form-control">
                                        <option value="Y">Ya</option>
                                        <option value="T">Tidak</option>
                                    </select>
                                </fieldset>
                            </div>
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
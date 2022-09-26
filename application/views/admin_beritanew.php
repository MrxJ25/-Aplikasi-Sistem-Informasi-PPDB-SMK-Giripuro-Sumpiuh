<?php 
include('admin_awal.php'); 
$CI =& get_instance();
$CI->load->model('Mymodel');
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"><i class="bx bx-receipt"></i> Tambah Berita</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin/berita">Berita</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Berita</li>
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
                    <h1> Tambah Berita</h1>
                    <p class="text-right"><a href="<?php echo base_url();?>admin/berita"
                        class="btn btn-danger"><i class="bx bx-x"></i> Batal</a></p>
                    <script src="<?php echo base_url('ckeditor/ckeditor.js');?>"></script>

                    <form name="ktg" method="post" action="<?php echo base_url('admin/beritanew');?>"
                        enctype="multipart/form-data">
                        <fieldset><label>Judul</label>
                            <input type="text" name="judul" maxlength="200" class="form-control" data-validate="required">
                        </fieldset>

                        <fieldset class="mt-4"><label>Isi Berita</label>
                            <textarea name="isiberita" class="ckeditor"></textarea>
                        </fieldset>

                        <div class="row">
                            <div class="col-sm-3">
                                <fieldset><label>Tampilkan</label>
                                    <select name="aktif" class="form-control">
                                        <option value="Y">Ya</option>
                                        <option value="T">Tidak</option>
                                    </select>
                                </fieldset>
                            </div>
                            
                            <div class="col-sm-3">
                                <fieldset><label>Dibaca</label>
                                    <input type="text" name="dibaca" class="form-control" data-validate="required,number"
                                           value="0"/>
                                </fieldset>
                            </div>
                        </div>
                        <fieldset class="mt-4"><label>Gambar kecil (400x200 px, jpg)</label>
                            <input type="file" name="gambarkc" accept="image/jpeg" data-validate="required"/>
                        </fieldset>
                        <fieldset class="mt-4"><label>Gambar besar (800x600 px, jpg)</label>
                            <input type="file" name="gambarbs" accept="image/jpeg" data-validate="required"/>
                        </fieldset>
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
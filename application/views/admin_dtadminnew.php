<?php
include('admin_awal.php');
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"><i class="bx bxs-face-mask"></i> Administrator</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin/dtadmin"> Administrator</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Administrator</li>
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
                    <h1>Tambah Administrator</h1>
                    <p class="text-right">
                        <a href="<?php echo base_url();?>admin/dtadmin"
                         class="btn btn-danger"><i class="bx bx-x"></i> Kembali</a></p>
     
          <div class="row">
            <div class="col-sm-6 offset-sm-3">
              <form name="adm" method="post" action="<?php echo base_url();?>admin/dtadminnew"
                    enctype="multipart/form-data">
                <fieldset><label>Nama Admin</label>
                    <input type="text" name="nama" class="form-control" data-validate="required,alphadanspace" maxlength="30" />  
                </fieldset>
                <fieldset><label>User Name</label>
                    <input type="text" name="login" class="form-control" maxlength="10" data-validate="required,alphanumeric,s1ze(5,10)" />  
                </fieldset>
                <fieldset><label>Password</label>
                    <input type="password" name="passwd" class="form-control" data-validate="required,alphnumeric,s1ze(5,10)" maxlength="10"/>  
                </fieldset>
              
                <fieldset class="mt-4"><label>Foto (format jpg, 200x200 px)</label>
                    <input type="file" name="foto" data-validate="required"
                        />
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
</div>
</div>
<?php
include('admin_akhir.php');
?>   
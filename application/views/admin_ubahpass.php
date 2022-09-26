<?php
include('admin_awal.php');
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"><i class="bx bxs-face-mask"></i> Ubah Profil</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Profil</li>
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
                    <h1>Profil Admin</h1>
          <form name="ubah" method="post" action="<?php echo base_url();?>admin/ubahpass" enctype="multipart/form-data">
            <fieldset><label>Nama Admin</label>
                <input type="text" name="namaadmin" value="<?php echo $Admin['namaadmin'];?>"
                    class="form-control" maxlength="30" data-validate="required,"/>
            </fieldset>
            <fieldset><label>User Name</label>
                <input type="text" name="login" value="<?php echo $Admin['login'];?>"
                    class="form-control" maxlength="10" data-validate="required,size(5,10)"/>
            </fieldset>
            <fieldset><label>Password</label>
                <input type="password" name="passwd"
                    class="form-control" maxlength="10" data-validate="size(5,10)"/>
            </fieldset>
            <p class="text-danger">Kosongkan password jika tidak ingin mengubah...</p>
            <fieldset><label>Foto (format jpg, 200x200 px, max 200KB)</label>
                    <input type="file" name="foto" accept="image/jpeg"
                        />
                    <p class="mt-3"><img src="<?php echo base_url();?>img/admin_<?php echo $Admin['idadmin'];?>.jpg"/></p>
                </fieldset>
            <p class="text-center mt-4">
                <button type="submit" class="btn btn-primary"><i class="ion ion-checkmark-round"></i> Simpan</button>
            </p>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include('admin_akhir.php');
?>

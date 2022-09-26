<?php
include('web_awal.php');
$CI =& get_instance();
$CI->load->model('Mymodel');
?>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Penerimaan Peserta Didik Baru </h2>
      <ol>
        <li><a href="<?php echo base_url();?>web"><?php echo $SEKOLAH['namasekolah'];?></a></li>
        <li>PPDB</li>
      </ol>
    </div>
  </div>
</section>

<section id="blog" class="blog ">
  <div class="container">
    <div class="section-title">
      <h2>Pendaftaran</h2>
      <p>Pendaftaran Peserta Didik</p>
    </div>

    <div class="alert alert-info">
        Silahkan membuat akun baru, jika anda belum pernah atau belum memiliki akun PPDB tahun <?php echo date('Y');?>. Jika sudah memiliki akun silahkan login dan lengkapi berkas Anda dan melihat hasil PPDB!
    </div>

    <div class="row">
        <div class="col-sm-8">
            <h4>Pembuatan Akun Baru</h4>
            <form name="daftar" method="post" action="<?php echo base_url();?>web/ppdb_daftar">
                <fieldset><label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" data-validate="required" maxlength="40"/>
                </fieldset>
                <fieldset><label>Email</label>
                    <input type="text" name="email" class="form-control" required maxlength="40" data-validate="required,email"/>
                </fieldset>
                <fieldset><label>Password</label>
                    <input type="password" name="pass" class="form-control" required maxlength="10" data-validate="required,alphanumeric,size(5,10)"/>
                </fieldset>
                <p class="mt-4 text-center">
                    <button type="submit" class="btn btn-danger"><i class="bx bx-check"></i> Kirim </button>
                </p>
            </form>
        </div>
        <div class="col-sm-4">
            <h4>Login</h4>
            <form name="login" method="post" action="<?php echo base_url();?>web/ppdb_login">

                <fieldset><label>Email</label>
                    <input type="text" name="email" class="form-control" required maxlength="40" data-validate="required,email"/>
                </fieldset>
                <fieldset><label>Password</label>
                    <input type="password" name="pass" class="form-control" required maxlength="10" data-validate="required,alphanumeric,size(5,10)"/>
                </fieldset>
                <p class="mt-4 text-center">
                    <button type="submit" class="btn btn-danger"><i class="bx bxs-log-in"></i> Login </button>
                </p>
            </form>
        </div>
    </div>
  </div>
</section>

<?php include('web_akhir.php'); ?>

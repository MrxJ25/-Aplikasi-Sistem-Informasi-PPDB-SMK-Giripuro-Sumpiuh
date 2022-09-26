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
                        <li class="breadcrumb-item active" aria-current="page">Administrator</li>
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
                    <h1>Data Administrator</h1>
          <p class="text-right"><a href="<?php echo base_url();?>admin/dtadminnew"
            class="btn btn-primary"><i class="bx bx-plus"></i> Tambah</a></p>
            
          <table class="table">
          <thead><tr><th>Nama Administartor</th><th>Foto</th><th>Tipe</th><th>Aksi</th></tr></thead>
          <tbody>
          <?php
          foreach($Admin as $a)
          {
              echo '<tr><td>'.$a->namaadmin.'</td>
                        <td><img src="'.base_url().'img/admin_'.$a->idadmin.'.jpg" width="75"/></td>
                          <td>';
              if ($a->idadmin==1) {echo 'Super Admin'; }
              else { echo 'Admin'; }
              echo '</td>
                          <td>
                            <a href="'.base_url().'admin/dtadminedit/'.$a->idadmin.'"
                                class="btn btn-sm btn-primary"><i class="bx bx-pencil"></i> Edit</a>';
              if ($a->idadmin>1) 
              {
                  echo ' <button type="button" onclick="hapus(\''.$a->idadmin.'\', \''.$a->namaadmin.'\');" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> Hapus</button>';
              }
              echo '</td>
                        </tr>';
          }
          ?>
          </tbody>
          </table>
          <script>    
        function hapus(idnya, nama)
        {

            Swal.fire({
              title: 'Hapus Admin ?',
              text: "Anda akan menghapus " + nama,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya',
              cancelButtonText: 'Tidak',    

            }).then((result) => {
              if (result.value) {            
                window.location.href = "<?php echo base_url();?>admin/dtadmindel/" + idnya;           
                }
            })
        }
    </script>
      </div>
    </div>
  </div>
</div>
<?php
include('admin_akhir.php');
?>   
<?php 
include('admin_awal.php'); 
$CI =& get_instance();
$CI->load->model('Mymodel');
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
                        <li class="breadcrumb-item active" aria-current="page">Buku Tamu</li>
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
                    <h1> Data Buku Tamu</h1>
                    <?php
                    if ($JmlBkTamu==0)
                    {
                        echo '<div class="alert alert-info">Belum ada data buku tamu...</div';
                    }
                    else
                    {
                        echo '<table class="table dtTable">
                                <thead><tr><th>NO</th><th>NAMA</th><th>EMAIL</th><th>KOMENTAR</th><th>TANGGAL</th><th>TAMPIL</th><th>AKSI</th></tr></thead>
                                <tbody>';
                        $x=1;
                        foreach($BkTamu as $b)
                        {
                            echo '<tr><td>'.$x.'</td>
                                      <td>'.$b->nama.'</td>
                                      <td>'.$b->email.'</td>
                                      <td>'.$b->komentar.'</td>
                                      <td>'.$CI->Mymodel->tgltext(substr($b->tglpost,0,10)).' '.substr($b->tglpost,11).'</td>
                                      <td>'.$b->tampil.'</td>
                                      <td>
                                      <a href="'.base_url().'admin/bukutamuedit/'.$b->idbktamu.'" class="btn btn-sm btn-primary"><i class="bx bx-pencil"></i> Edit</a>
                                      <button onclick="hapus(\''.$b->idbktamu.'\');" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> Del</button>
                                      </td>
                                    </tr>';
                            $x++;
                        }
                        echo '</tbody></table>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>    
    function hapus(idnya)
    {

        Swal.fire({
          title: 'Hapus Buku Tamu ?',
          text: '',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya',
          cancelButtonText: 'Tidak',    

        }).then((result) => {
          if (result.value) {            
            window.location.href = "<?php echo base_url();?>admin/bukutamudel/" + idnya;           
            }
        })
    }
</script>
<?php include('admin_akhir.php'); ?>
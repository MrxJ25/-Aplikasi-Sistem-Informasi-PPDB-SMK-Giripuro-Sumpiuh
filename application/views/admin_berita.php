<?php
include('admin_awal.php');
$CI =& get_instance();
$CI->load->model('Mymodel');
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"><i class="bx bx-receipt"></i> Berita</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>admin">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
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
                    <h1> Data Berita</h1>
                    <p class="text-right"><a href="<?php echo base_url();?>admin/beritanew"
                        class="btn btn-primary"><i class="bx bx-plus"></i> Tambah</a></p>
                    <?php
                    if ($JmlBerita==0)
                    {
                        echo '<div class="alert alert-info">Belum ada data berita...</div';
                    }
                    else
                    {
                        echo '<table class="table dtTable">
                                <thead><tr><th>JUDUL</th><th>POST</th><th>DIBACA</th><th>ADMIN</th><th>TAMPIL</th><th>AKSI</th></tr></thead>
                                <tbody>';
                        foreach($Berita as $b)
                        {
                            echo '<tr><td>'.$b->judul.'</td>
                                      <td>'.$CI->Mymodel->tgltext(substr($b->tglpost,0,10)).' '.substr($b->tglpost,11).'</td>
                                      <td><i class="bx bx-book-reader"></i> '.$b->dibaca.' x</td>
                                      <td>'.$b->namaadmin.'</td>
                                      <td>'.$b->aktif.'</td>
                                      <td>
                                      <a href="'.base_url().'admin/beritaedit/'.$b->idberita.'" class="btn btn-sm btn-primary"><i class="bx bx-pencil"></i> Edit</a>
                                      <button onclick="hapus(\''.$b->idberita.'\');" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> Del</button>
                                      </td>
                                    </tr>';
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
          title: 'Hapus Berita ?',
          text: '',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya',
          cancelButtonText: 'Tidak',

        }).then((result) => {
          if (result.value) {
            window.location.href = "<?php echo base_url();?>admin/beritadel/" + idnya;
            }
        })
    }
</script>
<?php include('admin_akhir.php'); ?>

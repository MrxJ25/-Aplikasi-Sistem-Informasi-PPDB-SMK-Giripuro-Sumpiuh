<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $SEKOLAH['namasekolah'];?></title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>cssjs_adm/style.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
	<table class="table table-borderless">
		<tr><td width="110"><img src="<?php echo base_url();?>img/logo2.png" width="100" height="100"/></td>
			<td>
				<h4><?php echo $SEKOLAH['namasekolah'];?></h4>
				<p><?php echo $SEKOLAH['alamat'];?><br/>
					<?php echo $SEKOLAH['kota'];?>, Telp. <?php echo $SEKOLAH['telepon'];?>
				</p>
			</td>
		</tr>
	</table>
    <h3 class="text-center">LAPORAN PENERIMAAN PPDB</h3>


    <?php
    if ($Jm==0)
    {
        echo '<div class="alert alert-info">Data tidak tersedia</div>';
    }
    else
    {
    ?>
        <table class="table">
            <thead><tr><th>No.</th><th>No Pendaftaran</th><th>Nama Calon</th>
                <th>Jumlah</th><th>Tgl Bayar</th><th>BANK</th><th>Tgl Verifikai</th><th>Admin</th></tr></thead>
            <tbody>
        <?php
        $n=1; $total=0;
        foreach($Bayar as $c)
        {
            echo '<tr><td>'.$n.'</td>
                          <td>'.$c->nodaftar.'</td>
                          <td>'.$c->nama.'</td>
                          <td class="text-right">'.number_format($c->jmlbayar,0,',','.').'</td>
                          <td>'.$c->tglbayar.'</td>
                          <td>'.$c->namabank.'</td>
                          <td>'.$c->tglverifikasi.'</td>
                          <td>'.$c->namaadmin.'</td>
                      </tr>';
            $total=$total+$c->jmlbayar;
            $n++;
        }
		echo '<tr><td colspan="3">JUMLAH PENERIMAAN</td>
                          <td class="text-right">'.number_format($total,0,',','.').'</td>
                          <td colspan="4"></td>
                      </tr>';
        ?>
        </tbody></table>
    <?php
    }
    ?>
</div>

    <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Informasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Tekan <kbd>Ctrl</kbd> <kbd>P</kbd> untuk mencetak...</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url();?>cssjs_adm/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>cssjs_adm/popper.min.js"></script>
    <script src="<?php echo base_url();?>cssjs_adm/bootstrap.min.js"></script>
    <script type="text/javascript">
       $(window).on('load',function(){
            $('#exampleModal').modal('show');
        });
    </script>
</body>
</html>

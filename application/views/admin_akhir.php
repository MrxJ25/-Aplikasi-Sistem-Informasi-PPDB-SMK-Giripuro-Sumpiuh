        <footer class="footer text-center">
            All Rights Reserved by Nice admin. Designed and Developed by
            <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
    </div>
</div>
    <?php
    if ($_SESSION['PopMsg']!='')
    {
    ?>
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
            <p><?php echo $_SESSION['PopMsg'];?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <?php    

    }
    ?> 
    <script src="<?php echo base_url();?>cssjs_adm/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>cssjs_adm/popper.min.js"></script>
    <script src="<?php echo base_url();?>cssjs_adm/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>cssjs_adm/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>cssjs_adm/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>cssjs_adm/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>cssjs_adm/custom.min.js"></script>

    <script src="<?php echo base_url();?>cssjs_all/jquery.dataTables4.min.js"></script>
    <script src="<?php echo base_url();?>cssjs_all/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>cssjs_all/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url();?>cssjs_all/id.verify.notify.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
			$('.dtTable').DataTable();
        });
        $()
		 <?php
        if ($_SESSION['PopMsg']!='')
        {
        ?>      
           $(window).on('load',function(){
                    $('#exampleModal').modal('show');
                });

        <?php      
			$_SESSION['PopMsg']='';  
        }
        ?>
    </script>
</body>
</html>
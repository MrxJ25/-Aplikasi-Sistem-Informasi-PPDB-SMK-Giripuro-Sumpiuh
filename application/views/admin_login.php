<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>img/logo2.png">
    <title><?php echo $SEKOLAH['namasekolah'];?></title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>cssjs_adm/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>boxicons/css/boxicons.min.css" rel="stylesheet">
    <style>
        .loginbox {
            width: 500px;
            margin: auto;
            margin-top: 10%;
            border: 1px #ccc solid;
            border-radius: 10px;
            box-shadow: 0px 20px 20px -15px rgba(0,0,0,0.3);
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="loginbox">
        <h2 class="text-center"><?php echo $SEKOLAH['namasekolah'];?></h2>
        <h5 class="text-center">Login Administrator</h5>
        <div class="row">
            <div class="col-4 pt-3">
                <img src="<?php echo base_url();?>img/logo2.png" class="img-fluid"/>
            </div>
            <div class="col-8">


                <form class="mt-5 mb-2 login-input" method="post" actio="<?php echo base_url();?>admlogin">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bx bx-user  bx-fw"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" name="login" maxlength="10" data-validate="required,size(5,10)">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bx bx-lock-alt bx-fw"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="passwd" maxlength="10" data-validate="required,size(5,10)">
                    </div>
                    <p class="mt-3">
                    <button class="btn btn-primary btn-block" type="submit"><i class="bx bx-log-in"></i> Log In</button>
                    </p>
                </form>
             </div>
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
    <script src="<?php echo base_url();?>cssjs_all/id.verify.notify.js"></script>
    <script type="text/javascript">
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

<?php include('web_awal.php'); ?>
    
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Profil Sekolah</h2>
          <ol>
            <li><a href="<?php echo base_url();?>web"><?php echo $SEKOLAH['namasekolah'];?></a></li>
            <li>Profile</li>
          </ol>
        </div>
      </div>
    </section>

    <!-- PROFIL -->
    <?php
    if ($JmlProfil>0)
    {
        echo '<section id="features" class="features">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">';
        $x=0;
        foreach($Profil as $j)
        {
            echo ' <li class="nav-item">
                        <a class="nav-link';
            if ($x==0) { echo ' active show'; }
            echo '" data-bs-toggle="tab" 
                    href="#profil'.$j->idprofil.'">'.$j->judul.'</a>
                    </li>';
            $x++;
        }
        echo '  </ul>
              </div>
              <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="tab-content">' ;
        $x=0;
        foreach($Profil as $j)
        {
            echo '  <div class="tab-pane';
            if ($x==0) { echo ' active show'; }
            echo '" id="profil'.$j->idprofil.'">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>'.$j->judul.'</h3>
                                <p>'.$j->deskripsi.'</p>
                            </div>
                        </div>
                    </div>';
            $x++;
        }
        echo '</div></div>
                </div>
              </div>
            </section>';
    }
    ?>
       

<?php include('web_akhir.php'); ?>

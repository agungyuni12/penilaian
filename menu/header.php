<?php
if ($page == 'home' || $page == 'logo') {
  include "setting/config.php";
} else {
  include "../setting/config.php";
}


error_reporting(0);
 
session_start();

?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">PENILAIAN</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo"><img src="<?php if($page == 'home' || $page == 'coba'){echo 'assets/img/bpswarna.png' ;} else {echo '../assets/img/bpswarna.png' ;}?>" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link <?php if($page=='home'){echo "active" ;} ?>" href="<?php if ($page == 'mitra' || $page == 'post' || $page == 'monitor' || $page == 'login' || $page == 'about') {
            echo "../";
          } ?>index.php">HOME</a></li>
           <li><a id="monitor" style="display: none;" class="nav-link <?php if($page=='monitor'){echo "active" ;} ?>" href="<?php if ($page == 'mitra' || $page == 'post' || $page == 'about' || $page == 'login' || $page == 'edit' || $page == 'monitor') {
            echo "../monitor/";
          } else{ echo "monitor/";} ?>index.php">MONITORING</a></li>
          <li><a id="penilai" style="display: none;" class="nav-link <?php if($page=='about'){echo "active" ;} ?>" href="<?php if ($page == 'mitra' || $page == 'post' || $page == 'buat_post' || $page == 'login' || $page == 'edit' || $page == 'monitor' || $page == 'about') {
            echo "../penilaian/";
          } else{ echo "penilaian/";} ?>index.php">PENILAIAN</a></li>
          <li><a id="login" style="display: none;" class="nav-link <?php if($page=='login'){echo "active" ;} ?>" href="<?php if ($page == 'home' || $page == 'logo') {
            echo "login/";
          } else if ($page == 'post' || $page == 'about' || $page == 'mitra' || $page == 'monitor') {
            echo "../login/";
          }
          ?>index.php">LOGIN</a></li>
          <li class="dropdown"><a id="edit" style="display: none;" href="#"><span><?= $_SESSION['nama'];?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php if ($page == 'home') {
            echo "login/";
          } else if ($page == 'post' || $page == 'buat_post' || $page == 'mitra' || $page == 'monitor' || $page == 'about') {
            echo "../login/";
          }
          ?>logout.php">LOGOUT</a></li>
            </ul>
          </li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
    <script>
      var $nama = '<?= $_SESSION['nama'];?>';
      if ($nama == "") {
        document.querySelector('#login').style.display="block";
        document.querySelector('#penilai').style.display="block";
      } else {
        document.querySelector('#edit').style.display="block";
        document.querySelector('#monitor').style.display="block";
      }
    </script>
  </header>
  <!-- End Header -->
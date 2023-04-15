<?php
$tingkat2 = isset($_GET['tingkat']) ? $_GET['tingkat'] : '';
$nama_koseka2 = isset($_GET['nama_koseka']) ? $_GET['nama_koseka'] : '';
$id_koseka2 = isset($_GET['id_koseka']) ? $_GET['id_koseka'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>COMMUNITY MITRA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/bpswarna.png" rel="icon">
  <link href="../assets/img/bpswarna.png" rel="bpswarna-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.29/dist/sweetalert2.min.css">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bikin - v4.8.0
  * Template URL: https://bootstrapmade.com/bikin-free-simple-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php $page = "about"; include "../menu/header.php" ;?>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title mt-5">
          <h2>Penilaian</h2>
        </div>
        <?php
        if ($tingkat2=='ppl') {
        ?>
        <div class="row">
          <div class="card text-center" style="width: 100%; ">
            <form action="kirim.php" method="post" id="formpml" role="form" class="php-email-form" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group">
                    <label for="nama_koseka">Nama Koseka</label>
                    <select onchange = "nama_koseka1(this.options[this.selectedIndex].value)"  class="form-control" name="nama_koseka" id="nama_koseka">
                      <option value="">Pilih Nama</option>
                      <?php
                        $sql1 = mysqli_query($conn,"SELECT DISTINCT nkoseka, idkoseka FROM alokasi");
                        if ($sql1!= false && $sql1->num_rows > 0) {
                          while ($row = mysqli_fetch_array($sql1)) {
                          $nkoseka = $row['nkoseka'];
                          $idkoseka = $row['idkoseka'];
                      ?>
                      <option value="<?=$nkoseka."&id_koseka=".$idkoseka;?>" <?=$nkoseka == $nama_koseka2 ? ' selected="selected"' : '';?>><?=$nkoseka;?></option>
                      <?php
                          }
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group mt-3">
                      <label for="nama_pmll">Nama PML</label>
                      <select class="form-control" name="nama_pmll" id="nama_pmll">
                        <option value="">Pilih Nama</option>
                        <?php
                          $sql1 = mysqli_query($conn,"SELECT DISTINCT npml, idpml FROM alokasi WHERE idkoseka = '$id_koseka2'");
                          if ($sql1!= false && $sql1->num_rows > 0) {
                            while ($row = mysqli_fetch_array($sql1)) {
                            $npml = $row['npml'];
                            $idpml = $row['idpml'];
                        ?>
                        <option value="<?=$npml."&id_pmll=".$idpml;?>" <?=$npml == $nama_pmll2 ? ' selected="selected"' : '';?>><?=$npml;?></option>
                        <?php
                            }
                          }
                        ?>
                  </select>
                </div>
                <div class="form-group mt-5">
                  <input type="hidden" name="tingkat3" id="tingkat3" value="<?=$tingkat2;?>">
                  <div class="d-flex h-100">
                    <div class="align-self-start mr-auto">
                        <a href="index.php" class="btn btn-outline-primary" role="button" aria-pressed="true">Back</a>
                    </div>
                    <div class="align-self-center mx-auto">
                        <button type="button" class="btn btn-primary d-none">
                          Click Me!
                        </button>
                    </div>
                    <div class="align-self-end ml-auto">
                        <button type="button" onclick="lanjut()" class="btn btn-outline-primary">
                          Next
                        </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>
        <?php
        } else{
          ?>
                  <div class="row">
          <div class="card text-center" style="width: 100%; ">
            <form action="kirim.php" method="post" id="formpml" role="form" class="php-email-form" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group">
                    <label for="nama_koseka">Nama Koseka</label>
                    <select  class="form-control" name="nama_koseka" id="nama_koseka">
                      <option value="">Pilih Nama</option>
                      <?php
                        $sql1 = mysqli_query($conn,"SELECT DISTINCT nkoseka, idkoseka FROM alokasi");
                        if ($sql1!= false && $sql1->num_rows > 0) {
                          while ($row = mysqli_fetch_array($sql1)) {
                          $nkoseka = $row['nkoseka'];
                          $idkoseka = $row['idkoseka'];
                      ?>
                      <option value="<?=$nkoseka."&id_koseka=".$idkoseka;?>" <?=$nkoseka == $nama_koseka2 ? ' selected="selected"' : '';?>><?=$nkoseka;?></option>
                      <?php
                          }
                        }
                      ?>
                    </select>
                  </div>
                <div class="form-group mt-5">
                  <input type="hidden" name="tingkat3" id="tingkat3" value="<?=$tingkat2;?>">
                  <div class="d-flex h-100">
                    <div class="align-self-start mr-auto">
                        <a href="index.php" class="btn btn-outline-primary" role="button" aria-pressed="true">Back</a>
                    </div>
                    <div class="align-self-center mx-auto">
                        <button type="button" class="btn btn-primary d-none">
                          Click Me!
                        </button>
                    </div>
                    <div class="align-self-end ml-auto">
                        <button type="button" onclick="lanjut2()" class="btn btn-outline-primary">
                          Next
                        </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>
          <?php
        }
        ?>
      </div>
    </section><!-- End Contact Section -->

  <?php include "../menu/footer.php" ;?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.29/dist/sweetalert2.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  
  <script>
        function nama_koseka1(value) {
            var nama_koseka = document.getElementById("nama_koseka");
            var tingkat3 = document.getElementById("tingkat3").value;
            var nama_koseka_value = nama_koseka.options[nama_koseka.selectedIndex].value;
            window.location.href = "?tingkat="+tingkat3+"&nama_koseka="+nama_koseka_value;

        }
  </script>
  
  <script>
        function lanjut() {
            var tingkat3 = document.getElementById("tingkat3").value;
            var nama_koseka = document.getElementById("nama_koseka").value;
            var nama_pmll = document.getElementById("nama_pmll").value;
            if (nama_koseka == "") {
              Swal.fire({
                        icon:"error",
                        title:"Gagal",
                        text:"Nama KOSEKA tidak boleh kosong",
              })
            } else if (nama_pmll == ""){
              Swal.fire({
                        icon:"error",
                        title:"Gagal",
                        text:"Nama PML tidak boleh kosong",
              })
            } else{
              window.location.href = "pen_pil.php?tingkat="+tingkat3+"&nama_koseka="+nama_koseka+"&nama_pmll="+nama_pmll;
            }
        }
  </script>
  <script>
        function lanjut2() {
            var tingkat3 = document.getElementById("tingkat3").value;
            var nama_koseka = document.getElementById("nama_koseka").value;
            if (nama_koseka == "") {
              Swal.fire({
                        icon:"error",
                        title:"Gagal",
                        text:"Nama KOSEKA tidak boleh kosong",
              })
            } else{
              window.location.href = "pen_pil.php?tingkat="+tingkat3+"&nama_koseka="+nama_koseka;
            }

        }
  </script>

  <!-- Cari username dan pass di database -->
</body>

</html>
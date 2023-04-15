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
  <link rel="stylesheet" href="../assets/vendor/sweetalert/sweetalert.css">
  <link href="../assets/vendor/dropify/dropify.min.css" rel="stylesheet">

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

  <?php $page = "edit"; include "../menu/header.php" ;
  ?>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title mt-5">
          <h2>EDIT PROFIL</h2>
        </div>

        <div class="row">
          <div class="card text-center" style="width: 100%; ">
            <form action="" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
              <div class="row">
                <?php
                  $nama = $_SESSION['nama'];
                  $username = $_SESSION['username'];
                  $sql = mysqli_query($conn,"SELECT * FROM mitra WHERE nama = '$nama' AND username = '$username'");
                  if ($sql->num_rows > 0) {
                    $row = mysqli_fetch_assoc($sql);
                    $tempat_lahir = $row['tempat_lahir'];
                    $tanggal_lahir = $row['tanggal_lahir'];
                    $alamat = $row['alamat'];
                    $pengalaman = $row['pengalaman'];
                    $nomor = $row['nomor'];
                    $password = $row['password'];
                  }
                ?>
                <div class="form-group mb-3">
                  <input type="file" name="file" class="dropify" data-default-file="../assets/img/Agung.png" data-height="200">
                </div>
                <div class="form-group mb-3">
                  <input type="text" name="nama2" class="form-control" id="nama2" placeholder="Nama Lengkap" value="<?= $nama;?>" required>
                </div>
                <div class="form-group mb-3 col-lg-6 mt-md-0">
                  <input type="text" name="tempat_lahir2" class="form-control" id="tempat_lahir2" placeholder="Tempat Lahir" value="<?= $tempat_lahir;?>" required>
                </div>
                <div class="form-group mb-3 col-lg-6 mt-md-0">
                  <input type="date" name="tanggal_lahir2" class="form-control" id="tanggal_lahir2" value="<?= $tanggal_lahir;?>" required>
                </div>
                <div class="form-group">
                  <input type="text" name="alamat2" class="form-control" id="alamat2" placeholder="Alamat" value="<?= $alamat;?>" required>
                </div>
                <div class="form-group mt-3">
                  <input type="text" name="pengalaman2" class="form-control" id="pengalaman2" placeholder="Pengalaman" value="<?= $pengalaman;?>" required>
                </div>
                <div class="form-group mt-3">
                  <input type="number" name="nomor2" class="form-control" id="nomor2" placeholder="Nomor HP/Telp" value="<?= $nomor;?>" required>
                </div>
                <div class="form-group mt-3">
                  <input type="text" name="username2" class="form-control" id="username2" placeholder="Username" value="<?= $username;?>" required>
                </div>
                <div class="form-group mt-3">
                  <input type="password" class="form-control" name="password2" id="password2" placeholder="Password" required>
                </div>
              </div>
              <div class="text-center mt-3"><button type="submit" name="simpan" id="simpan">Simpan</button></div>
            </form>
          </div>

        </div>

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
  <script src="../assets/vendor/sweetalert/sweetalert.min.js"></script>
  <script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../assets/vendor/dropify/dropify.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.dropify').dropify({
    messages: {
        'default': 'Upload',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
    })
  </script>
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

  <!-- Cari username dan pass di database -->
  <?php
      if (isset($_POST['simpan'])) {
        $nama2 = $_POST['nama2'];
        $tempat_lahir2 = $_POST['tempat_lahir2'];
        $tanggal_lahir2 = $_POST['tanggal_lahir2'];
        $alamat2 = $_POST['alamat2'];
        $pengalaman2 = $_POST['pengalaman2'];
        $nomor2 = $_POST['nomor2'];
        $username2 = $_POST['username2'];
        $password2 = md5($_POST['password2']);
        $sql2 = mysqli_query($conn,"UPDATE mitra SET nama = '$nama2',tempat_lahir = '$tempat_lahir2',tanggal_lahir = '$tanggal_lahir2',alamat = '$alamat2',pengalaman = '$pengalaman2',nomor = '$nomor2',username = '$username2',password = '$password2' WHERE nama = '$nama' AND username = '$username'");
          if ($nama != $nama2 || $username != $username2 || $password != $password2) {
          ?>
            <script>
                  swal({
                    icon:"success",
                    title:"Berhasil",
                    text:"Selamat anda berhasil edit profil"
                }).then(function() {
                    window.location = "logout.php";
              });
            </script>
        <?php
          } else {
            ?>
            <script>
                  swal({
                    icon:"success",
                    title:"Berhasil",
                    text:"Selamat anda berhasil edit profil"
                }).then(function() {
                    window.location = "../index.php";
              });
            </script>
            <?php
          } 
      }
      
      ?>

</body>

</html>
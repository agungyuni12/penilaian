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

  <?php $page = "login"; include "../menu/header.php" ;?>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title mt-5">
          <h2>Login</h2>
        </div>

        <div class="row">
          <div class="card text-center" style="width: 100%; ">
            <form action="" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group">
                  <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                </div>
                <div class="form-group mt-3">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
              </div>
              <div class="text-center mt-3"><button type="submit" name="login" id="login">Login</button></div>
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

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

  <!-- Cari username dan pass di database -->
  <?php
      if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $result = mysqli_query($conn, "SELECT * FROM mitra WHERE username='$username' AND password='$password'");
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama'] = $row['nama'];
            ?>
            <script>
              swal({
                icon:"success",
                title:"Berhasil",
                text:"Selamat anda berhasil login"
            }).then(function() {
                window.location = "../index.php";
          });
            </script>
            <?php
        } else {
          ?>
          <script>
            swal({
              icon:"error",
              title:"Salah",
              text:"Username atau password Anda salah. Silahkan coba lagi!"
          }).then(function() {
          window.location = "index.php";
          });
          </script>
          <?php
        }
      }
?>


</body>

</html>
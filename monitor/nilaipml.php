<?php
include "../setting/config.php";
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../assets/css/datatable.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">

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

  <?php $page = "monitor"; include "../menu/header.php" ;?>

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" id="tampilan" style="display: none ;">

        <div class="section-title mt-10">
          <h2>Total Nilai PML</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <table id="mitra" class="display">
            <thead>
               <tr>
                  <th  style="vertical-align: middle;">Nama</th>
                  <th  style="vertical-align: middle;">Kecamatan</th>
                  <th  style="vertical-align: middle;">Jumlah</th>
               </tr>
            </thead>
            <tbody>
                <?php
                  $sql = mysqli_query($conn, "SELECT t2.npml AS npml,t2.idpml AS idpml, t2.kecamatan AS kec,avg(t1.komppl) AS komppl,avg(t1.kondefppl) AS kondefppl,avg(t1.probppl) AS probppl,avg(t1.intenppl) AS intenppl,avg(t1.progppl) AS progppl, sum(t1.komkoseka2) AS komkoseka2,sum(t1.kondefkoseka2) AS kondefkoseka2,sum(t1.probkoseka2) AS probkoseka2,sum(t1.intenkoseka2) AS intenkoseka2,sum(t1.progkoseka2) AS progkoseka2, sum(t1.komkoseka2)+sum(t1.kondefkoseka2)+sum(t1.probkoseka2)+sum(t1.intenkoseka2)+sum(t1.progkoseka2)+avg(t1.komppl)+avg(t1.kondefppl)+avg(t1.probppl)+avg(t1.intenppl)+avg(t1.progppl) AS jumlah FROM nilai as t1 LEFT JOIN (SELECT DISTINCT (npml),idpml,kecamatan FROM alokasi GROUP BY idpml) AS t2 ON t1.id_dinilai = t2.idpml WHERE role = 'pml' GROUP BY idpml");
                  if ($sql!= false && $sql->num_rows > 0) {
                    // output data of each row
                    while($row = $sql->fetch_assoc()) {
                        $npml = $row['npml'];
                        $kec = $row['kec'];
                        $komppl = $row['komppl'];
                        $kondefppl = $row['kondefppl'];
                        $probppl = $row['probppl'];
                        $intenppl = $row['intenppl'];
                        $progppl = $row['progppl'];
                        $komkoseka2 = $row['komkoseka2'];
                        $kondefkoseka2 = $row['kondefkoseka2'];
                        $probkoseka2 = $row['probkoseka2'];
                        $intenkoseka2 = $row['intenkoseka2'];
                        $progkoseka2 = $row['progkoseka2'];
                        $jumlah = $row['jumlah'];
                      ?> 
                       <tr>
                        <td><?=$npml;?></td>
                        <td><?=$kec;?></td>
                        <td><?=$jumlah;?></td>
                       </tr>
                      <?php
                    }
                  }
                ?>
            </tbody>
        </table>


      </div>
    </section><!-- End Testimonials Section -->

  <?php include "../menu/footer.php" ;?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="../assets/js/datatable.js"></script>
  

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>
    $(document).ready(function(){
      $('#tampilan').fadeIn(500);
    })
  </script>


</body>

</html>
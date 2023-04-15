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
          <h2>Total Nilai PPL</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <table id="mitra" class="display">
            <thead>
               <tr>
                  <th rowspan="2" style="vertical-align: middle;">Nama</th>
                  <th rowspan="2" style="vertical-align: middle;">Kecamatan</th>
                  <th colspan="5" style="text-align: center;">Oleh PML</th>
                  <th colspan="3" style="text-align: center;">Oleh Koseka</th>
                  <th rowspan="2" style="vertical-align: middle;">Jumlah</th>
               </tr>
                <tr >   
                    <th>Nilai1</th>
                    <th>Nilai2</th>
                    <th>Nilai3</th>
                    <th>Nilai4</th>
                    <th>Nilai5</th>      
                    <th>Nilai1</th>
                    <th>Nilai2</th>
                    <th>Nilai3</th>
                    <!-- <th>Nilai4</th>
                    <th>Nilai5</th>       -->
                </tr>
            </thead>
            <tbody>
                <?php
                  $sql = mysqli_query($conn, "SELECT t2.nppl AS nppl,t2.idppl AS idppl, t2.kecamatan AS kec,sum(t1.kom) AS kom,sum(t1.kondef) AS kondef,sum(t1.prob) AS prob,sum(t1.inten) AS inten,sum(t1.prog) AS prog, sum(t1.komkoseka1) AS komkoseka1,sum(t1.kondefkoseka1) AS kondefkoseka1,sum(t1.probkoseka1) AS probkoseka1,sum(t1.intenkoseka1) AS intenkoseka1,sum(t1.progkoseka1) AS progkoseka1, sum(t1.komkoseka1)+sum(t1.kondefkoseka1)+sum(t1.probkoseka1)+sum(t1.intenkoseka1)+sum(t1.progkoseka1)+sum(t1.kom)+sum(t1.kondef)+sum(t1.prob)+sum(t1.inten)+sum(t1.prog) AS jumlah FROM nilai as t1 LEFT JOIN (SELECT DISTINCT (nppl),idppl,kecamatan FROM alokasi GROUP BY idppl) AS t2 ON t1.id_dinilai = t2.idppl WHERE role = 'ppl' GROUP BY idppl");
                  if ($sql!= false && $sql->num_rows > 0) {
                    // output data of each row
                    while($row = $sql->fetch_assoc()) {
                        $nppl = $row['nppl'];
                        $kec = $row['kec'];
                        $kom = $row['kom'];
                        $kondef = $row['kondef'];
                        $prob = $row['prob'];
                        $inten = $row['inten'];
                        $prog = $row['prog'];
                        $komkoseka1 = $row['komkoseka1'];
                        $kondefkoseka1 = $row['kondefkoseka1'];
                        $probkoseka1 = $row['probkoseka1'];
                        // $intenkoseka1 = $row['intenkoseka1'];
                        // $progkoseka1 = $row['progkoseka1'];
                        $jumlah = $row['jumlah'];
                      ?> 
                       <tr>
                        <td><?=$nppl;?></td>
                        <td><?=$kec;?></td>
                        <td><?=$kom;?></td>
                        <td><?=$kondef;?></td>
                        <td><?=$prob;?></td>
                        <td><?=$inten;?></td>
                        <td><?=$prog;?></td>
                        <td><?=$komkoseka1;?></td>
                        <td><?=$kondefkoseka1;?></td>
                        <td><?=$probkoseka1;?></td>
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
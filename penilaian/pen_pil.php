<?php
$nama_pml2 = isset($_GET['nama_pml']) ? $_GET['nama_pml'] : '';
$id_pml2 = isset($_GET['id_pml']) ? $_GET['id_pml'] : '';
$nama_pmll2 = isset($_GET['nama_pmll']) ? $_GET['nama_pmll'] : '';
$id_pmll2 = isset($_GET['id_pmll']) ? $_GET['id_pmll'] : '';
$nama_koseka2 = isset($_GET['nama_koseka']) ? $_GET['nama_koseka'] : '';
$id_koseka2 = isset($_GET['id_koseka']) ? $_GET['id_koseka'] : '';
$tingkat2 = isset($_GET['tingkat']) ? $_GET['tingkat'] : '';
$nama_ppl2 = isset($_GET['nama_ppl']) ? $_GET['nama_ppl'] : '';
$id_ppl2 = isset($_GET['id_ppl']) ? $_GET['id_ppl'] : '';

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
        if ($tingkat2 == 'pml') {
        ?>
        <div class="row">
          <div class="card text-center" style="width: 100%; ">
            <form action="kirim.php" method="post" id="formpml" role="form" class="php-email-form" enctype="multipart/form-data">
            <h3>Penilaian PML</h3>
              <div class="row">
                <div class="form-group">
                  <label for="nama_pml">Nama PML</label>
                  <select onchange = "nama(this.options[this.selectedIndex].value)"  class="form-control" name="nama_pml" id="nama_pml">
                    <option value="">Pilih Nama</option>
                    <?php
                      $sql1 = mysqli_query($conn,"SELECT DISTINCT npml, idpml FROM alokasi WHERE idkoseka = '$id_koseka2'");
                      if ($sql1!= false && $sql1->num_rows > 0) {
                        while ($row = mysqli_fetch_array($sql1)) {
                        $npml = $row['npml'];
                        $idpml = $row['idpml'];
                    ?>
                    <option value="<?=$npml."&id_pml=".$idpml;?>" <?=$npml == $nama_pml2 ? ' selected="selected"' : '';?>><?=$npml;?></option>
                    <?php
                        }
                      }
                    ?>
                  </select>
                </div>
                <input type="hidden" name="tingkat3" id="tingkat3" value="<?=$tingkat2;?>">
                <input type="hidden" name="nama_koseka3" id="nama_koseka3" value="<?=$nama_koseka2;?>">
                <input type="hidden" name="id_koseka3" id="id_koseka3" value="<?=$id_koseka2;?>">
                <div class="form-group mt-3">
                      <?php
                        $id=1;
                        $sql2 = mysqli_query($conn,"SELECT nppl,idppl FROM alokasi WHERE idpml = '$id_pml2'");
                        if ($sql2!= false && $sql2->num_rows > 0) {
                          while ($row = mysqli_fetch_array($sql2)) {
                          $nppl = $row['nppl'];
                          $idppl = $row['idppl'];
                      ?>
                      <div style=" text-align: left;">
                       <b><?=$nppl;?></b>
                       <input type="hidden" name="idppl2[]" id="idppl2[]" value="<?=$idppl;?>">
                      </div>
                      <hr>
                      <div class="row justify-content-center">
                        <div class="col-auto">
                          <table class="table table-responsive mb-5">
                            <thead style="display: none;">
                                <tr>
                                  <th>Poin Penilaian</th>
                                  <th>Sering</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td> Bagaimana PPL menguasai teknik wawancara, komunikasi dengan RT, dan teknik lapangan?</td>
                                  <td>                                    
                                    <select class="form-control" name="kom_<?=$idppl;?>" id="kom_<?=$idppl;?>">                                   
                                      <option value="0">Pilih nilai</option>
                                      <option value="3">Sangat bisa</option>
                                      <option value="2">Cukup bisa</option>
                                      <option value="1">Tidak bisa</option>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Bagaimana ketepatan, kerapian tulisan, kesesuaian dalam dokumen VK1/VK2, K, dan peta WS?</td>
                                  <td>                                    
                                    <select class="form-control" name="kondef_<?=$idppl;?>" id="kondef_<?=$idppl;?>">                                   
                                      <option value="0">Pilih nilai</option>
                                      <option value="3">Sangat benar</option>
                                      <option value="2">Cukup benar</option>
                                      <option value="1">Tidak benar</option>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Bagaimana kualitas kondef dan kebenaran PPL mengisi simoval dan wilkerstat ?</td>
                                  <td>                                    
                                    <select class="form-control" name="prob_<?=$idppl;?>" id="prob_<?=$idppl;?>">                                   
                                      <option value="0">Pilih nilai</option>
                                      <option value="3">Sangat bagus</option>
                                      <option value="2">Cukup bagus</option>
                                      <option value="1">Tidak bagus</option>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Bagaimana PPL beradaptasi dengan perubahan-perubahan yg terjadi selama masa pendataan?</td>
                                  <td>                                    
                                    <select class="form-control" name="inten_<?=$idppl;?>" id="inten_<?=$idppl;?>">                                   
                                      <option value="0">Pilih nilai</option>
                                      <option value="3">Sangat bisa</option>
                                      <option value="2">Cukup bisa</option>
                                      <option value="1">Tidak bisa</option>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Apakah PPL bisa selesai tepat waktu ?</td>
                                  <td>                                    
                                    <select class="form-control" name="prog_<?=$idppl;?>" id="prog_<?=$idppl;?>">                                   
                                      <option value="0">Pilih nilai</option>
                                      <option value="3">Sangat bisa</option>
                                      <option value="2">Cukup bisa</option>
                                      <option value="1">Tidak bisa</option>
                                    </select>
                                  </td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <?php
                          }
                        }
                      ?>
                </div>
              </div>
              <div class="text-center mt-3"><button type="submit" name="kirim" id="kirim">Kirim</button></div>
            </form>
          </div>

        </div>
        <?php
        } else if($tingkat2 == 'ppl'){
          ?>
        <div class="row">
          <div class="card text-center" style="width: 100%; ">
            <form action="kirim.php" method="post" id="formppl" role="form" class="php-email-form" enctype="multipart/form-data">
            <h3>Penilaian PPL</h3>
              <div class="row">
                <div class="form-group">
                  <label for="nama_ppl">Nama PPL</label>
                  <select onchange = "namappl2(this.options[this.selectedIndex].value)"  class="form-control" name="nama_ppl" id="nama_ppl">
                    <option value="">Pilih Nama</option>
                    <?php
                      $sql3 = mysqli_query($conn,"SELECT DISTINCT nppl, idppl FROM alokasi WHERE idpml = '$id_pmll2'");
                      if ($sql3!= false && $sql3->num_rows > 0) {
                        while ($row = mysqli_fetch_array($sql3)) {
                        $nppl = $row['nppl'];
                        $idppl = $row['idppl'];
                    ?>
                    <option value="<?=$nppl."&id_ppl=".$idppl;?>" <?=$nppl == $nama_ppl2 ? ' selected="selected"' : '';?>><?=$nppl;?></option>
                    <?php
                        }
                      }
                    ?>
                  </select>
                </div>
                <input type="hidden" name="tingkat4" id="tingkat4" value="<?=$tingkat2;?>">
                <input type="hidden" name="nama_koseka4" id="nama_koseka4" value="<?=$nama_koseka2;?>">
                <input type="hidden" name="id_koseka4" id="id_koseka4" value="<?=$id_koseka2;?>">
                <input type="hidden" name="id_pmll4" id="id_pmll4" value="<?=$id_pmll2;?>">
                <input type="hidden" name="nama_pmll4" id="nama_pmll4" value="<?=$nama_pmll2;?>">
                <div class="form-group mt-3">
                      <?php
                        $id=1;
                        $sql2 = mysqli_query($conn,"SELECT npml,idpml FROM alokasi WHERE idppl = '$id_ppl2'");
                        if ($sql2!= false && $sql2->num_rows > 0) {
                          $row = mysqli_fetch_array($sql2);
                          $npml5 = $row['npml'];
                          $idpml5 = $row['idpml'];
                      ?>
                      <div style=" text-align: left;">
                       <b><?=$npml5;?></b>
                      </div>
                      <hr>
                      <div class="row justify-content-center">
                        <div class="col-auto">
                          <table class="table table-responsive mb-5">
                            <thead style="display: none;">
                                <tr>
                                  <th>Poin Penilaian</th>
                                  <th>Sering</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td>Bagaimana PML melakukan pengawasan di lapangan?</td>
                                  <td>                                    
                                    <select class="form-control" name="kom_<?=$idpml5;?>" id="kom_<?=$idpml5;?>">                                   
                                      <option value="0">Pilih nilai</option>
                                      <option value="3">Sering</option>
                                      <option value="2">Jarang</option>
                                      <option value="1">Tidak pernah</option>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Bagaimana komunikasi PPL dengan PML ?</td>
                                  <td>                                    
                                    <select class="form-control" name="kondef_<?=$idpml5;?>" id="kondef_<?=$idpml5;?>">                                   
                                      <option value="0">Pilih nilai</option>
                                      <option value="3">Sering</option>
                                      <option value="2">Jarang</option>
                                      <option value="1">Tidak pernah</option>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Bagaiamana PML mampu menyelesaiakan permasalahan yg Anda temui di lapangan?</td>
                                  <td>                                    
                                    <select class="form-control" name="prob_<?=$idpml5;?>" id="prob_<?=$idpml5;?>">                                   
                                      <option value="0">Pilih nilai</option>
                                      <option value="3">Sangat mampu</option>
                                      <option value="2">Cukup mampu</option>
                                      <option value="1">Tidak mampu</option>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Bagaimana intensitas PML mengadakan pertemuan rutin?</td>
                                  <td>                                    
                                    <select class="form-control" name="inten_<?=$idpml5;?>" id="inten_<?=$idpml5;?>">                                   
                                      <option value="0">Pilih nilai</option>
                                      <option value="3">Sering</option>
                                      <option value="2">Jarang</option>
                                      <option value="1">Tidak pernah</option>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Bagaimana PML menjelaskan konsep, penambahan aplikasi, serta teknik lapangan jika ada kendala?</td>
                                  <td>                                    
                                    <select class="form-control" name="prog_<?=$idpml5;?>" id="prog_<?=$idpml5;?>">                                   
                                      <option value="0">Pilih nilai</option>
                                      <option value="3">Sering</option>
                                      <option value="2">Jarang</option>
                                      <option value="1">Tidak pernah</option>
                                    </select>
                                  </td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <?php
                        }
                      ?>
                </div>
              </div>
              <div class="text-center mt-3"><button type="submit" name="kirim2" id="kirim2">Kirim</button></div>
            </form>
          </div>

        </div>
          <?php
        } else if($tingkat2 == 'koseka') {
          ?>
          <div class="row">
            <div class="card text-center" style="width: 100%; ">
              <form action="kirim.php" method="post" id="formkoseka" role="form" class="php-email-form" enctype="multipart/form-data">
              <h3>Penilaian Koseka</h3>
                <div class="row">
                  <div class="form-group">
                    <label for="nama_koseka">Nama Koseka</label>
                    <select onchange = "namakoseka2(this.options[this.selectedIndex].value)"  class="form-control" name="nama_koseka" id="nama_koseka">
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
                  <input type="hidden" name="tingkat5" id="tingkat5" value="<?=$tingkat2;?>">
                  <div class="form-group mt-3">
                    <h3><b>PML</b></h3>
                    <hr>
                        <?php
                          $id=1;
                          $sql2 = mysqli_query($conn,"SELECT DISTINCT npml,idpml FROM alokasi WHERE idkoseka = '$id_koseka2'");
                          if ($sql2!= false && $sql2->num_rows > 0) {
                            while ($row = mysqli_fetch_array($sql2)) {
                            $npml = $row['npml'];
                            $idpml10 = $row['idpml'];
                        ?>
                        <div style=" text-align: left;">
                        <b><?=$npml;?></b>
                        <input type="hidden" name="idpml7[]" id="idpml7[]" value="<?=$idpml10;?>">
                        </div>
                        <hr>
                        <div class="row justify-content-center">
                          <div class="col-auto">
                            <table class="table table-responsive mb-5">
                              <thead style="display: none;">
                                  <tr>
                                    <th>Poin Penilaian</th>
                                    <th>Sering</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>Bagaimana intensitas PML mengadakan pertemuan rutin ?</td>
                                    <td>                                    
                                      <select class="form-control" name="kom_<?=$idpml10;?>" id="kom_<?=$idpml10;?>">                                   
                                        <option value="0">Pilih nilai</option>
                                        <option value="3">Rutin</option>
                                        <option value="2">Jarang</option>
                                        <option value="1">Tidak pernah</option>
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Bagaimana PML memeriksa ketepatan VK-1, kuesioner K, dan wilkerstat ?</td>
                                    <td>                                    
                                      <select class="form-control" name="kondef_<?=$idpml10;?>" id="kondef_<?=$idpml10;?>">                                   
                                        <option value="0">Pilih nilai</option>
                                        <option value="3">Sangat tepat</option>
                                        <option value="2">Cukup tepat</option>
                                        <option value="1">Tidak tepat</option>
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Bagaimana PML menjalin komunikasi dengan PPL dan Koseka?</td>
                                    <td>                                    
                                      <select class="form-control" name="prob_<?=$idpml10;?>" id="prob_<?=$idpml10;?>">                                   
                                        <option value="0">Pilih nilai</option>
                                        <option value="3">Sering</option>
                                        <option value="2">Jarang</option>
                                        <option value="1">Tidak pernah</option>
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Bagaiamana sikap PML dalam menyelesaikan masalah-masalah yg dialami PPLnya?</td>
                                    <td>                                    
                                      <select class="form-control" name="inten_<?=$idpml10;?>" id="inten_<?=$idpml10;?>">                                   
                                        <option value="0">Pilih nilai</option>
                                        <option value="3">Sangat bisa</option>
                                        <option value="2">Cukup bisa</option>
                                        <option value="1">Tidak bisa</option>
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Bagaimana intensitas PML turun pengawasan ke PPL ?</td>
                                    <td>                                    
                                      <select class="form-control" name="prog_<?=$idpml10;?>" id="prog_<?=$idpml10;?>">                                   
                                        <option value="0">Pilih nilai</option>
                                        <option value="3">Sering</option>
                                        <option value="2">Jarang</option>
                                        <option value="1">Tidak pernah</option>
                                      </select>
                                    </td>
                                  </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <?php
                            }
                          }
                        ?>
                  </div>
                  <div class="form-group mt-3">
                    <h3><b>PPL</b></h3>
                    <hr>
                        <?php
                          $id=1;
                          $sql2 = mysqli_query($conn,"SELECT nppl,idppl FROM alokasi WHERE idkoseka = '$id_koseka2'");
                          if ($sql2!= false && $sql2->num_rows > 0) {
                            while ($row = mysqli_fetch_array($sql2)) {
                            $nppl = $row['nppl'];
                            $idppl10 = $row['idppl'];
                        ?>
                        <div style=" text-align: left;">
                        <b><?=$nppl;?></b>
                        <input type="hidden" name="idppl7[]" id="idppl7[]" value="<?=$idppl10;?>">
                        </div>
                        <hr>
                        <div class="row justify-content-center">
                          <div class="col-auto">
                            <table class="table table-responsive mb-5">
                              <thead style="display: none;">
                                  <tr>
                                    <th>Poin Penilaian</th>
                                    <th>Sering</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>Bagaimana kemampuan PPL menyelesaikan beban kerja dengan tepat waktu ?</td>
                                    <td>                                    
                                      <select class="form-control" name="kom_2<?=$idppl10;?>" id="kom_2<?=$idppl10;?>">                                   
                                        <option value="0">Pilih nilai</option>
                                        <option value="3">Sangat mampu</option>
                                        <option value="2">Cukup mampu</option>
                                        <option value="1">Tidak mampu</option>
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Bagaiamana PPL memahami konsep dan teknik wawancara?</td>
                                    <td>                                    
                                      <select class="form-control" name="kondef_2<?=$idppl10;?>" id="kondef_2<?=$idppl10;?>">                                   
                                        <option value="0">Pilih nilai</option>
                                        <option value="3">Sangat paham</option>
                                        <option value="2">Cukup paham</option>
                                        <option value="1">Tidak paham</option>
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Bagaimana sikap PPL dalam membantu PPL lain (1 tim / tim lain) jika ada kendala di lapangan ?</td>
                                    <td>                                    
                                      <select class="form-control" name="prob_2<?=$idppl10;?>" id="prob_2<?=$idppl10;?>">                                   
                                        <option value="0">Pilih nilai</option>
                                        <option value="3">Sangat mau</option>
                                        <option value="2">Cukup mau</option>
                                        <option value="1">Tidak mau</option>
                                      </select>
                                    </td>
                                  </tr>
                                  <tr style="display: none ;">
                                    <td>Intensitas berkomunikasi dengan Koseka</td>
                                    <td>                                    
                                      <select class="form-control" name="inten_2<?=$idppl10;?>" id="inten_2<?=$idppl10;?>">                                   
                                        <option value="0">Pilih nilai</option>
                                        <option value="3">Sangat sering</option>
                                        <option value="2">Sering</option>
                                        <option value="1">Jarang</option>
                                      </select>
                                    </td>
                                  </tr>
                                  <tr style="display: none ;">
                                    <td>Progres harian pencacahan lapangan</td>
                                    <td>                                    
                                      <select class="form-control" name="prog_2<?=$idppl10;?>" id="prog_2<?=$idppl10;?>">                                   
                                        <option value="0">Pilih nilai</option>
                                        <option value="3">Cepat</option>
                                        <option value="2">Sesuai target</option>
                                        <option value="1">Lambat</option>
                                      </select>
                                    </td>
                                  </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <?php
                            }
                          }
                        ?>
                  </div>
                </div>
                <div class="text-center mt-3"><button type="submit" name="kirim3" id="kirim3">Kirim</button></div>
              </form>
            </div>

          </div>
          <?php
        } else {
          header('Location: index.php');
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
        function nama(value) {
            var nama_pml = document.getElementById("nama_pml");
            var nama_pml_value = nama_pml.options[nama_pml.selectedIndex].value;
            var tingkat = document.getElementById("tingkat3").value;
            var nama_koseka = document.getElementById("nama_koseka3").value;
            var id_koseka = document.getElementById("id_koseka3").value;
            window.location.href = "?tingkat="+tingkat+"&id_koseka="+id_koseka+"&nama_koseka="+nama_koseka+"&nama_pml="+nama_pml_value;

        }
  </script>

  <script>
        function namappl2(value) {
            var nama_ppl = document.getElementById("nama_ppl");
            var nama_ppl_value = nama_ppl.options[nama_ppl.selectedIndex].value;
            var tingkat = document.getElementById("tingkat4").value;
            var nama_koseka = document.getElementById("nama_koseka4").value;
            var id_koseka = document.getElementById("id_koseka4").value;
            var nama_pmll = document.getElementById("nama_pmll4").value;
            var id_pmll = document.getElementById("id_pmll4").value;
            window.location.href = "?tingkat="+tingkat+"&id_pmll="+id_pmll+"&nama_pmll="+nama_pmll+"&id_koseka="+id_koseka+"&nama_koseka="+nama_koseka+"&nama_ppl="+nama_ppl_value;

        }
  </script>

<script>
        function namakoseka2(value) {
            var tingkat = document.getElementById("tingkat5").value;
            var nama_koseka = document.getElementById("nama_koseka");
            var nama_koseka_value = nama_koseka.options[nama_koseka.selectedIndex].value;
            window.location.href = "?tingkat="+tingkat+"&nama_koseka="+nama_koseka_value;
        }
  </script>
  <!-- Cari username dan pass di database -->
  <script>
      $(document).ready(function(){
        $('#formpml').on('submit',function(e){
            e.preventDefault();
            var tingkat = $("#tingkat3").val();
            var nama_pml = $("#nama_pml").val();
            var values = $("input[name='idppl2[]']").map(function(){return $(this).val();}).get();
            var kom_ = [];
            var kondef_ = [];
            var prob_ = [];
            var inten_ = [];
            var prog_ = [];
            for (var i = 0; i < values.length; i++) {
            kom_[values[i]]= $("#kom_"+values[i]).val();
            kondef_[values[i]]= $("#kondef_"+values[i]).val();
            prob_[values[i]]= $("#prob_"+values[i]).val();
            inten_[values[i]]= $("#inten_"+values[i]).val();
            prog_[values[i]]= $("#prog_"+values[i]).val();
          };
          if (nama_pml == "") {
                    Swal.fire({
                        icon:"error",
                        title:"Gagal",
                        text:"Pilih nama PML",
                    })
                } else{
                  $.ajax({
                    url:"kirim.php",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    }).done(function(resp) {
                        Swal.fire({
                            icon:"success",
                            title:"Berhasil ",
                            text:"Data berhasil disimpan",
                        }).then(function() {
                        window.location = "index.php";
                        });
                    })
                }

        })
      })
    </script>

<script>
      $(document).ready(function(){
        $('#formppl').on('submit',function(e){
            e.preventDefault();
            var tingkat = $("#tingkat4").val();
            var nama_ppl = $("#nama_ppl").val();
            var id_pml = $("#id_pmll4").val();
            var kom_= $("#kom_"+id_pml).val();
            var kondef_= $("#kondef_"+id_pml).val();
            var prob_= $("#prob_"+id_pml).val();
            var inten_= $("#inten_"+id_pml).val();
            var prog_= $("#prog_"+id_pml).val();
          if (nama_ppl == "") {
                    Swal.fire({
                        icon:"error",
                        title:"Gagal",
                        text:"Pilih nama PPL",
                    })
                } else{
                  $.ajax({
                    url:"kirim2.php",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    }).done(function(resp) {
                        Swal.fire({
                            icon:"success",
                            title:"Berhasil ",
                            text:"Data berhasil disimpan",
                        }).then(function() {
                        window.location = "index.php";
                        });
                    })
                }

        })
      })
</script>

    <script>
      $(document).ready(function(){
        $('#formkoseka').on('submit',function(e){
            e.preventDefault();
            var tingkat = $("#tingkat5").val();
            var nama_koseka = $("#nama_koseka").val();
            var values = $("input[name='idpml7[]']").map(function(){return $(this).val();}).get();
            var kom_ = [];
            var kondef_ = [];
            var prob_ = [];
            var inten_ = [];
            var prog_ = [];
            for (var i = 0; i < values.length; i++) {
            kom_[values[i]]= $("#kom_"+values[i]).val();
            kondef_[values[i]]= $("#kondef_"+values[i]).val();
            prob_[values[i]]= $("#prob_"+values[i]).val();
            inten_[values[i]]= $("#inten_"+values[i]).val();
            prog_[values[i]]= $("#prog_"+values[i]).val();
          };
            var values2 = $("input[name='idppl7[]']").map(function(){return $(this).val();}).get();
            var kom_2 = [];
            var kondef_2 = [];
            var prob_2 = [];
            var inten_2 = [];
            var prog_2 = [];
            for (var i = 0; i < values2.length; i++) {
            kom_2[values2[i]]= $("#kom_2"+values2[i]).val();
            kondef_2[values2[i]]= $("#kondef_2"+values2[i]).val();
            prob_2[values2[i]]= $("#prob_2"+values2[i]).val();
            inten_2[values2[i]]= $("#inten_2"+values2[i]).val();
            prog_2[values2[i]]= $("#prog_2"+values2[i]).val();
          };
          if (nama_koseka == "") {
                    Swal.fire({
                        icon:"error",
                        title:"Gagal",
                        text:"Pilih nama Koseka",
                    })
                } else{
                  $.ajax({
                    url:"kirim3.php",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    }).done(function(resp) {
                        Swal.fire({
                            icon:"success",
                            title:"Berhasil ",
                            text:"Data berhasil disimpan",
                        }).then(function() {
                        window.location = "index.php";
                        });
                    })
                }

        })
      })
    </script>
</body>

</html>
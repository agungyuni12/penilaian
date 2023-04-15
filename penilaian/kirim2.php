<?php
$page = 'about';
include "../menu/header.php" ;
$tingkat = $_POST['tingkat4'];
$penilai = $_POST['nama_ppl'];
$idpml = $_POST['id_pmll4'];
$idpenilai = substr($penilai, strpos($penilai, '=') + 1);
    $kom= $_POST['kom_'.$idpml];
    $kondef= $_POST['kondef_'.$idpml];
    $prob= $_POST['prob_'.$idpml];
    $inten= $_POST['inten_'.$idpml];
    $prog= $_POST['prog_'.$idpml];
    $sql2 = mysqli_query($conn,"SELECT * FROM nilai WHERE id_dinilai = '$idpml' AND id_penilai = '$idpenilai'");
    if ($sql2!= false && $sql2->num_rows > 0) {
        // output data of each row
        while($row = $sql2->fetch_assoc()) {
                $sql = mysqli_query($conn,"UPDATE nilai SET komppl = '$kom',kondefppl = '$kondef',probppl='$prob',intenppl='$inten',progppl='$prog' WHERE id_dinilai = '$idpml' AND id_penilai = '$idpenilai'");
        }
    } else {
        $sql = mysqli_query($conn,"INSERT INTO `nilai`(`id_penilai`,`id_dinilai`,`role`,`komppl`,`kondefppl`,`probppl`,`intenppl`,`progppl`,`komkoseka2`,`kondefkoseka2`,`probkoseka2`,`intenkoseka2`,`progkoseka2`) VALUES ('$idpenilai','$idpml','pml','$kom','$kondef','$prob','$inten','$prog','0','0','0','0','0') ");
    }   
?>
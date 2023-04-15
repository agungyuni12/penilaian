<?php
$page = 'about';
include "../menu/header.php" ;
$tingkat = $_POST['tingkat5'];
$penilai = $_POST['nama_koseka'];
$idppl = $_POST['idppl7'];
$idpml = $_POST['idpml7'];
$idpenilai = substr($penilai, strpos($penilai, '=') + 1);
for ($i=0; $i < sizeof($idppl) ; $i++) { 
    $kom= $_POST['kom_2'.$idppl[$i]];
    $kondef= $_POST['kondef_2'.$idppl[$i]];
    $prob= $_POST['prob_2'.$idppl[$i]];
    $inten= $_POST['inten_2'.$idppl[$i]];
    $prog= $_POST['prog_2'.$idppl[$i]];
    $sql2 = mysqli_query($conn,"SELECT * FROM nilai WHERE id_dinilai = '$idppl[$i]' AND id_penilai = '$idpenilai'");
    if ($sql2!= false && $sql2->num_rows > 0) {
        // output data of each row
        while($row = $sql2->fetch_assoc()) {
                $sql = mysqli_query($conn,"UPDATE nilai SET komkoseka1 = '$kom',kondefkoseka1 = '$kondef',probkoseka1='$prob',intenkoseka1='$inten',progkoseka1='$prog' WHERE id_dinilai = '$idppl[$i]' AND id_penilai = '$idpenilai'");
        }
    } else {
        $sql = mysqli_query($conn,"INSERT INTO `nilai`(`id_penilai`,`id_dinilai`,`role`,`komkoseka1`,`kondefkoseka1`,`probkoseka1`,`intenkoseka1`,`progkoseka1`,`kom`,`kondef`,`prob`,`inten`,`prog`) VALUES ('$idpenilai','$idppl[$i]','ppl','$kom','$kondef','$prob','$inten','$prog','0','0','0','0','0') ");
    }
}
for ($i=0; $i < sizeof($idpml) ; $i++) { 
    $kom= $_POST['kom_'.$idpml[$i]];
    $kondef= $_POST['kondef_'.$idpml[$i]];
    $prob= $_POST['prob_'.$idpml[$i]];
    $inten= $_POST['inten_'.$idpml[$i]];
    $prog= $_POST['prog_'.$idpml[$i]];
    $sql2 = mysqli_query($conn,"SELECT * FROM nilai WHERE id_dinilai = '$idpml[$i]' AND id_penilai = '$idpenilai'");
    if ($sql2!= false && $sql2->num_rows > 0) {
        // output data of each row
        while($row = $sql2->fetch_assoc()) {
            $sql = mysqli_query($conn,"UPDATE nilai SET komkoseka2 = '$kom',kondefkoseka2 = '$kondef',probkoseka2='$prob',intenkoseka2='$inten',progkoseka2='$prog' WHERE id_dinilai = '$idpml[$i]' AND id_penilai = '$idpenilai'");
        }
    } else {
        $sql = mysqli_query($conn,"INSERT INTO `nilai`(`id_penilai`,`id_dinilai`,`role`,`komkoseka2`,`kondefkoseka2`,`probkoseka2`,`intenkoseka2`,`progkoseka2`,`komppl`,`kondefppl`,`probppl`,`intenppl`,`progppl`) VALUES ('$idpenilai','$idpml[$i]','pml','$kom','$kondef','$prob','$inten','$prog','0','0','0','0','0') ");
    }
}
?>
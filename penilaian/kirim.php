<?php
$page = 'about';
include "../menu/header.php" ;
$tingkat = $_POST['tingkat3'];
$penilai = $_POST['nama_pml'];
$idppl = $_POST['idppl2'];
$idpenilai = substr($penilai, strpos($penilai, '=') + 1);
for ($i=0; $i < sizeof($idppl) ; $i++) { 
    $kom= $_POST['kom_'.$idppl[$i]];
    $kondef= $_POST['kondef_'.$idppl[$i]];
    $prob= $_POST['prob_'.$idppl[$i]];
    $inten= $_POST['inten_'.$idppl[$i]];
    $prog= $_POST['prog_'.$idppl[$i]];
    $sql2 = mysqli_query($conn,"SELECT * FROM nilai WHERE id_dinilai = '$idppl[$i]' AND id_penilai = '$idpenilai'");
    if ($sql2!= false && $sql2->num_rows > 0) {
        // output data of each row
        while($row = $sql2->fetch_assoc()) {
                $sql = mysqli_query($conn,"UPDATE nilai SET kom = '$kom',kondef = '$kondef',prob='$prob',inten='$inten',prog='$prog' WHERE id_dinilai = '$idppl[$i]' AND id_penilai = '$idpenilai'");
        }
    } else {
        $sql = mysqli_query($conn,"INSERT INTO `nilai`(`id_penilai`,`id_dinilai`,`role`,`kom`,`kondef`,`prob`,`inten`,`prog`,`komkoseka1`,`kondefkoseka1`,`probkoseka1`,`intenkoseka1`,`progkoseka1`) VALUES ('$idpenilai','$idppl[$i]','ppl','$kom','$kondef','$prob','$inten','$prog','0','0','0','0','0') ");
    }
}
?>
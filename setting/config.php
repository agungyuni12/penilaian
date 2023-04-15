<?php 
 
$server = "localhost";
$user = "n1607753_agungys";
$pass = "kelayu1998";
$database = "n1607753_penilaian";
 
$conn = mysqli_connect($server, $user, $pass, $database);
 
if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
 
?>
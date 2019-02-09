<?php
include "header.html";
    $kayttajatunnus=$_POST["tunnus"];
	$salasana=$_POST["salasana"];


$conn = new mysqli("127.0.0.1","trtkm18b3","trtkm18b3trtkm18b3","trtkm18b3");
$sql = "SELECT kayttajatunnus, etunimi, sukunimi, kayttoikeustaso FROM jamke1 WHERE kayttajatunnus = '$kayttajatunnus' AND  salasana ='$salasana'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: selailu.html");
    exit;
	session_start();
} else {
	$msg = "Käyttäjätunnus tai salasana virheellinen, yritä uudelleen.";
	header("Location:etusivu.php?msg=$msg");
	
 }

include "footer.html";


 ?>

<?php
include "header.html";
require "header.html";
    $kayttajatunnus=$_POST["tunnus"];
	$salasana=$_POST["salasana"];


$conn = new mysqli("127.0.0.1","trtkm18b3","trtkm18b3trtkm18b3","trtkm18b3");
$sql = "SELECT kayttajatunnus, etunimi, sukunimi, kayttoikeustaso FROM jamke1 WHERE kayttajatunnus = '$kayttajatunnus' AND  salasana ='$salasana'";
$result = $conn->query($sql);
$res = mysqli_fetch_array($result);
$etunimi = $row["etunimi"];



if ($result->num_rows > 0) {
	if ($res['kayttoikeustaso']=='B1'){
	asetaKeksit();
	header("Location: userView.php");
    exit;

} 	else if ($res['kayttoikeustaso']=='A1'){
	header("Location: adminView.php");
    exit;
} else {
	$msg = "Käyttäjältä puuttuu käyttöoikeudet.";
	header("Location:etusivu.php?msg=$msg");
}
} else {
	$msg = "Käyttäjätunnus tai salasana virheellinen, yritä uudelleen.";
	header("Location:etusivu.php?msg=$msg");
 }

include "footer.html";


 ?>

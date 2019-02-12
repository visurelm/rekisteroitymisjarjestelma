<?php

$userID = $_COOKIE["userID"];

$conn = new mysqli("127.0.0.1", "trtkm18b3", "trtkm18b3trtkm18b3", "trtkm18b3");
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}

$kayttajatunnus = mysqli_real_escape_string($conn, $_POST['kayttaja']);
$etunimi = mysqli_real_escape_string($conn, $_POST['etunimi']);
$sukunimi = mysqli_real_escape_string($conn, $_POST['sukunimi']);
$postiosoite = mysqli_real_escape_string($conn, $_POST['postiosoite']);
$postinumero = mysqli_real_escape_string($conn, $_POST['postinumero']);
$postitoimipaikka = mysqli_real_escape_string($conn, $_POST['postitmp']);
$kayttoikeustaso = mysqli_real_escape_string($conn, $_POST['kayttoikeustaso']);

$sql ="UPDATE jamke1 SET kayttajatunnus='$kayttajatunnus', etunimi='$etunimi', sukunimi='$sukunimi', postiosoite='$postiosoite', postinumero=$postinumero, postitoimipaikka='$postitoimipaikka', kayttoikeustaso='$kayttoikeustaso'  WHERE kayttaja_ID ='$userID' ";
//tallenna tietokantaan

if ($conn->query($sql) === TRUE) {
    //Jos homma ok, menn‰‰ takas muokkaukseen
    header("Location:edit.php");
} else {
    $errorMsg = "Error: " . $sql . "<br>" . $conn->error;
    header("Location:adminView.php?msg=$errorMsg");
}


$conn->close();

?>
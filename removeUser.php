<?php

//require_once 'testMysli.php';
$userID = $_COOKIE["userID"];

$conn = new mysqli("127.0.0.1", "trtkm18b3", "trtkm18b3trtkm18b3", "trtkm18b3");
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}
//Luodaan query
$sql ="DELETE FROM jamke1 WHERE kayttaja_ID ='$userID' ";


if ($conn->query($sql) === TRUE) {
    alert("User has been removed..");
    //Poistetaa userID cookiesta..
    unset($_COOKIE['userID']);
    header("Location:adminView.php");
} else {
    $errorMsg = "Error: " . $sql . "<br>" . $conn->error;
    header("Location:adminView.php?msg=$errorMsg");
}

$conn->close();
?>
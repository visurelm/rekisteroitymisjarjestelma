

<?php


$servername = "127.0.0.1";
$username = "trtkm18b3";
$password = "trtkm18b3trtkm18b3";
$dbname = "trtkm18b3";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { //tarkista yhteys
    die("Connection failed: " . $conn->connect_error);
}

$kayttajatunnus = mysqli_real_escape_string($conn, $_POST['kayttajatunnus']);
$etunimi = mysqli_real_escape_string($conn, $_POST['etunimi']);
$sukunimi = mysqli_real_escape_string($conn, $_POST['sukunimi']);
$postiosoite = mysqli_real_escape_string($conn, $_POST['postiosoite']);
$postinumero = mysqli_real_escape_string($conn, $_POST['postinumero']);
$postitoimipaikka = mysqli_real_escape_string($conn, $_POST['postitoimipaikka']);
$salasana = mysqli_real_escape_string($conn, $_POST['salasana']);

$sql ="INSERT INTO jamke1 (kayttajatunnus, etunimi, sukunimi, postiosoite, postinumero, postitoimipaikka, salasana) VALUES('$kayttajatunnus', '$etunimi', '$sukunimi', '$postiosoite', '$postinumero', '$postitoimipaikka', '$salasana')";
//tallenna tietokantaan

if ($conn->query($sql) === TRUE) {
    header("Location:etusivu.html"); //Jos kaikki onnistuu ohjataan rekisteröityjä kirjautumissivulle
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>


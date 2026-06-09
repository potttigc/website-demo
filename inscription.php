<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projct";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$wilaya = $_POST['wilaya'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$adresse = $_POST['adr'];
$password = $_POST['password'];

$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (nom, prenom, age, wilaya, tel, email, adresse, password)
VALUES ('$nom', '$prenom', '$age', '$wilaya', '$tel', '$email', '$adresse', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
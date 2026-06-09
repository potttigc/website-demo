<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projct";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$mdp = $_POST['mdp'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($mdp, $user['password'])) {

        $_SESSION['user'] = $user['prenom'];

        echo "Login successful! Welcome " . $user['prenom'];

    } else {
        echo " Incorrect password";
    }

} else {
    echo " Email not found";
}

$conn->close();
?>
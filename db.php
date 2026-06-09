<?php
$conn = new mysqli("localhost", "root", "", "base_client");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
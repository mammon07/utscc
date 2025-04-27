<?php
$servername = "databaseuts.cfmioyeiwt5e.ap-southeast-1.rds.amazonaws.com";
$username = "admin";
$password = "KidzKidz123#";
$dbname = "dbutsija";  // Pastikan nama database sudah benar

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

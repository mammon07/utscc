<?php
include 'database.php';  // Menghubungkan ke database

// Query untuk mengambil data produk
$sql = "SELECT nama_produk, harga, gambar FROM produk";
$result = $conn->query($sql);

// Cek apakah query berhasil dijalankan
if (!$result) {
    die("Query failed: " . $conn->error);  // Menampilkan error jika query gagal
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Produk Toko</title>
</head>
<body>
    <h1>Daftar Produk</h1>
    
    <?php
    if ($result->num_rows > 0) {
        // Menampilkan data produk
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>" . htmlspecialchars($row['nama_produk']) . "</h2>";
            echo "<img src='https://bucketutsija.s3.ap-southeast-1.amazonaws.com/" . htmlspecialchars($row['gambar']) . "' alt='" . htmlspecialchars($row['nama_produk']) . "' width='200px'>";
            echo "<p>Harga: Rp" . number_format($row['harga'], 0, ',', '.') . "</p>";
            echo "</div>";
        }
    } else {
        echo "0 results";  // Menampilkan pesan jika tidak ada produk
    }
    $conn->close();
    ?>
</body>
</html>

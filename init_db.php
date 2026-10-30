<?php
include 'db.php';

$query = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $query)) {
    echo "<h2>Berhasil! Tabel 'products' telah siap di Azure MySQL.</h2>";
    echo "<p><a href='index.php'>Buka Aplikasi CRUD</a></p>";
} else {
    echo "Error membuat tabel: " . mysqli_error($conn);
}
?>

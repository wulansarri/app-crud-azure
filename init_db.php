<?php
include 'db.php';

// Script untuk membuat tabel produk secara otomatis di Azure MySQL
$query = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($query) === TRUE) {
    echo "Tabel 'products' berhasil dibuat di Azure MySQL!<br>";
    
    // Cek apakah tabel masih kosong
    $check = $conn->query("SELECT COUNT(*) as count FROM products");
    $row = $check->fetch_assoc();
    if ($row['count'] == 0) {
        $insert = "INSERT INTO products (name, price, stock) VALUES 
                   ('Laptop Asus Zenbook', 15000000, 5),
                   ('Mouse Wireless', 150000, 20)";
        $conn->query($insert);
        echo "Data awal berhasil ditambahkan!<br>";
    }
    echo "<a href='index.php'>Kembali ke Aplikasi</a>";
} else {
    echo "Gagal membuat tabel: " . $conn->error;
}
?>

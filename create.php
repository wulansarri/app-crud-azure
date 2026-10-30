<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $stmt = $conn->prepare("INSERT INTO products (name, price, stock) VALUES (?, ?, ?)");
    $stmt->bind_param("sdi", $name, $price, $stock);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        form { max-width: 400px; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background-color: #28a745; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Tambah Produk Baru</h2>
    <form method="POST">
        <div>
            <label>Nama Produk:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Harga:</label>
            <input type="number" step="0.01" name="price" required>
        </div>
        <div>
            <label>Stok:</label>
            <input type="number" name="stock" required>
        </div>
        <button type="submit">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>

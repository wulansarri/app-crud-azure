<?php
include 'db.php';

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    die("Data tidak ditemukan!");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, stock = ? WHERE id = ?");
    $stmt->bind_param("sdii", $name, $price, $stock, $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        form { max-width: 400px; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background-color: #ffc107; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Edit Produk</h2>
    <form method="POST">
        <div>
            <label>Nama Produk:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" required>
        </div>
        <div>
            <label>Harga:</label>
            <input type="number" step="0.01" name="price" value="<?= $data['price'] ?>" required>
        </div>
        <div>
            <label>Stok:</label>
            <input type="number" name="stock" value="<?= $data['stock'] ?>" required>
        </div>
        <button type="submit">Update</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>

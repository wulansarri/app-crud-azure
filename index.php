<?php
include 'db.php';

// Fitur Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: index.php");
    exit();
}

// Fitur Read
$result = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi CRUD - Cloud Computing</title>
    <style>
        body { font-family: sans-serif; margin: 40px; background-color: #f4f7f6; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #0078d4; color: white; }
        .btn { padding: 8px 12px; text-decoration: none; border-radius: 4px; color: white; display: inline-block; }
        .btn-add { background-color: #28a745; margin-bottom: 15px; }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-delete { background-color: #dc3545; }
    </style>
</head>
<body>

    <h2>Daftar Produk (Tugas Mandiri Cloud)</h2>
    <a href="create.php" class="btn btn-add">+ Tambah Produk</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td>Rp <?= number_format($row['price'], 0, ',', '.') ?></td>
                <td><?= $row['stock'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                    <a href="index.php?delete=<?= $row['id'] ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5" style="text-align:center;">Belum ada data produk.</td></tr>
        <?php endif; ?>
    </table>

</body>
</html>

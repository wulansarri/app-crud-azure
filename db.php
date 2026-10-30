<?php
$host = getenv('DB_HOST') ?: 'mysql-crud-kurnia.mysql.database.azure.com';
$user = getenv('DB_USER') ?: 'admincloud';
$pass = getenv('DB_PASS');
$dbname = getenv('DB_NAME') ?: 'db_crud';
$port = getenv('DB_PORT') ?: 3306;

$conn = mysqli_init();

// Mengaktifkan SSL untuk Azure MySQL
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

// Melakukan koneksi dengan timeout 10 detik
if (!mysqli_real_connect($conn, $host, $user, $pass, $dbname, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}
?>

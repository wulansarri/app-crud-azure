<?php
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$db   = getenv('DB_NAME') ?: 'db_crud';
$port = getenv('DB_PORT') ?: 3306;

$conn = mysqli_init();

// Pengaturan khusus untuk koneksi SSL ke Azure Database for MySQL
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);
@mysqli_real_connect($conn, $host, $user, $pass, $db, $port, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);

if (mysqli_connect_errno()) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}
?>

<?php
$host = getenv('DB_HOST') ?: 'mysql-crud-kurnia.mysql.database.azure.com';
$user = getenv('DB_USER') ?: 'admincloud';
$pass = getenv('DB_PASS');
$dbname = getenv('DB_NAME') ?: 'db_crud';
$port = getenv('DB_PORT') ?: 3306;

$conn = mysqli_init();

// Atur timeout singkat (5 detik) agar tidak sampai 504 Gateway Timeout
mysqli_options($conn, MYSQLI_OPT_CONNECT_TIMEOUT, 5);

// Nonaktifkan validasi cert ketat untuk mempercepat SSL handshaking
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

if (!@mysqli_real_connect($conn, $host, $user, $pass, $dbname, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("<h3 style='color:red;'>Koneksi Database Gagal:</h3> " . mysqli_connect_error());
}
?>

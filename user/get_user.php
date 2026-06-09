<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include "../config/koneksi.php";

// Mengambil data id, username, dan email dari tabel users
$query = mysqli_query($conn, "SELECT id, username, email FROM users");

$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

// Mengembalikan data dalam bentuk format JSON
echo json_encode([
    "status" => true,
    "data" => $data
]);
?>
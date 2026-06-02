<?php
require "../vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$headers = apache_request_headers();

if(!isset($headers['Authorization'])) {
    echo json_encode([
        "status" => false,
        "message" => "Token tidak ada"
    ]);
    exit;
}

$token = str_replace("Bearer ", "", $headers['Authorization']);
$key = "FLUTTER NATIVE PHP JWT SECRET KEY 2026 SUPER SECURE 123456789";

try {
    $decoded = JWT::decode($token, new Key($key, 'HS256'));
} catch(Exception $e) {
    echo json_encode([
        "status" => false,
        "message" => "Token invalid"
    ]);
    exit;
}
?>
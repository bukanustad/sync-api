<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

include '../config/config.php';

if (!$data || !is_array($data)) {
    http_response_code(400);
    echo json_encode(['message' => 'Data tidak valid']);
    exit;
}

foreach ($data as $transaksi) {
    $id = $conn->real_escape_string($transaksi['id']);
    $tanggal = $conn->real_escape_string($transaksi['tanggal']);
    $total = intval($transaksi['total']);
    $bayar = intval($transaksi['bayar']);
    $kembali = intval($transaksi['kembali']);

    $conn->query("REPLACE INTO transaksi (id, tanggal, total, bayar, kembali) 
                  VALUES ('$id', '$tanggal', $total, $bayar, $kembali)");
}

echo json_encode(["message" => "Sinkronisasi berhasil"]);

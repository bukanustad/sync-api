<?php
include '../config/config.php';

$data = json_decode(file_get_contents("php://input"), true);

$status = $conn->real_escape_string($data['status']);
$total_transaksi = intval($data['total_transaksi']);
$total_detail = intval($data['total_detail']);
$total_uang = intval($data['total_uang']);
$keterangan = $conn->real_escape_string($data['keterangan']);

$conn->query("INSERT INTO sinkron_log (status, total_transaksi, total_detail, total_uang, keterangan, waktu)
              VALUES ('$status', $total_transaksi, $total_detail, $total_uang, '$keterangan', NOW())");

echo json_encode(['message' => 'Log sinkron disimpan']);

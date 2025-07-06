<?php
include '../config/config.php';

$query = $conn->query("SELECT * FROM transaksi");
$data = [];
while ($row = $query->fetch_assoc()) {
    $data[] = $row;
}
header('Content-Type: application/json');
echo json_encode($data);

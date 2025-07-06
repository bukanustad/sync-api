<?php
include '../config/config.php';

$query = $conn->query("SELECT MAX(waktu) AS last_sync FROM sinkron_log");
$row = $query->fetch_assoc();

header('Content-Type: application/json');
echo json_encode(['last_sync' => $row['last_sync'] ?? null]);

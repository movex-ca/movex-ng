<?php
header('Content-Type: application/json');
require_once '../../config/db.php';

try {
    $sql = "SELECT id, pool_code, pool_name, description, country_code, vehicle_hint, supports_insurance, is_active, sort_order
            FROM service_pools
            WHERE is_active = 1
            ORDER BY sort_order ASC, id ASC";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'count' => count($rows),
        'data' => $rows
    ], JSON_PRETTY_PRINT);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ], JSON_PRETTY_PRINT);
}
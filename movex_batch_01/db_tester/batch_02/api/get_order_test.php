<?php
header('Content-Type: application/json');
require_once '../../config/db.php';

try {
    $order_id = isset($_GET['order_id']) ? (int)$_GET['order_id'] : 0;

    if ($order_id <= 0) {
        http_response_code(422);
        echo json_encode([
            'success' => false,
            'message' => 'order_id is required'
        ], JSON_PRETTY_PRINT);
        exit;
    }

    $sqlOrder = "SELECT o.*, sp.pool_code, sp.pool_name
                 FROM orders o
                 INNER JOIN service_pools sp ON sp.id = o.pool_id
                 WHERE o.id = :order_id
                 LIMIT 1";
    $stmtOrder = $pdo->prepare($sqlOrder);
    $stmtOrder->execute([':order_id' => $order_id]);
    $order = $stmtOrder->fetch(PDO::FETCH_ASSOC);

    if (!$order) {
        http_response_code(404);
        echo json_encode([
            'success' => false,
            'message' => 'Order not found'
        ], JSON_PRETTY_PRINT);
        exit;
    }

    $sqlLocations = "SELECT *
                     FROM order_locations
                     WHERE order_id = :order_id
                     ORDER BY id ASC";
    $stmtLocations = $pdo->prepare($sqlLocations);
    $stmtLocations->execute([':order_id' => $order_id]);
    $locations = $stmtLocations->fetchAll(PDO::FETCH_ASSOC);

    $sqlPricing = "SELECT *
                   FROM order_pricing
                   WHERE order_id = :order_id
                   LIMIT 1";
    $stmtPricing = $pdo->prepare($sqlPricing);
    $stmtPricing->execute([':order_id' => $order_id]);
    $pricing = $stmtPricing->fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'data' => [
            'order' => $order,
            'locations' => $locations,
            'pricing' => $pricing
        ]
    ], JSON_PRETTY_PRINT);

} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ], JSON_PRETTY_PRINT);
}
<?php
header('Content-Type: application/json');
require_once '../../../config/db.php';

try {
    $tables = [
        'payment_processors',
        'payment_state_classes',
        'payment_state_class_states',
        'payment_processor_state_class_map',
        'payment_backup_gates',
        'payments',
        'payment_transactions',
        'payment_failover_logs'
    ];

    $data = [];

    foreach ($tables as $table) {
        $stmt = $pdo->query("SELECT * FROM {$table} ORDER BY id ASC");
        $data[$table] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    echo json_encode([
        'success' => true,
        'batch' => '03',
        'counts' => [
            'payment_processors' => count($data['payment_processors']),
            'payment_state_classes' => count($data['payment_state_classes']),
            'payment_state_class_states' => count($data['payment_state_class_states']),
            'payment_processor_state_class_map' => count($data['payment_processor_state_class_map']),
            'payment_backup_gates' => count($data['payment_backup_gates']),
            'payments' => count($data['payments']),
            'payment_transactions' => count($data['payment_transactions']),
            'payment_failover_logs' => count($data['payment_failover_logs'])
        ],
        'data' => $data
    ], JSON_PRETTY_PRINT);

} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ], JSON_PRETTY_PRINT);
}
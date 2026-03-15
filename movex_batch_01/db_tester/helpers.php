<?php
require_once __DIR__ . '/config.php';

function json_ok(array $data = [], int $code = 200): void {
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'ok' => true,
        'app' => APP_NAME,
        'timestamp' => date('c'),
        'data' => $data,
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    exit;
}

function json_error(string $message, int $code = 400, array $extra = []): void {
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'ok' => false,
        'app' => APP_NAME,
        'timestamp' => date('c'),
        'message' => $message,
        'extra' => $extra,
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    exit;
}

function get_str(string $key, string $default = ''): string {
    return isset($_REQUEST[$key]) ? trim((string)$_REQUEST[$key]) : $default;
}

function next_public_id(PDO $pdo, string $table, string $prefix): string {
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM {$table}");
    $count = (int)$stmt->fetch()['total'] + 1;
    return sprintf('%s-%s-%03d', $prefix, date('Y'), $count);
}

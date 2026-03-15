<?php
require_once __DIR__ . '/helpers.php';
try {
    $pdo = movex_db();
    $sql = "SELECT u.id, u.public_id, u.first_name, u.last_name, u.email, u.phone_e164, u.status,
                   up.state_name, up.city_name
            FROM users u
            LEFT JOIN user_profiles up ON up.user_id = u.id
            ORDER BY u.id ASC";
    $rows = $pdo->query($sql)->fetchAll();
    json_ok(['count' => count($rows), 'users' => $rows]);
} catch (Throwable $e) {
    json_error('Failed to load users list.', 500, ['error' => $e->getMessage()]);
}

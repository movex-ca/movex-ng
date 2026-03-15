<?php
require_once __DIR__ . '/helpers.php';
try {
    $pdo = movex_db();
    $roles = $pdo->query('SELECT id, public_id, role_name, status FROM roles ORDER BY id ASC')->fetchAll();
    $mapsSql = "SELECT urm.public_id, u.public_id AS user_public_id,
                       CONCAT(u.first_name, ' ', u.last_name) AS full_name,
                       r.role_name, urm.is_primary, urm.status
                FROM user_role_map urm
                INNER JOIN users u ON u.id = urm.user_id
                INNER JOIN roles r ON r.id = urm.role_id
                ORDER BY urm.id ASC";
    $maps = $pdo->query($mapsSql)->fetchAll();
    json_ok([
        'roles_count' => count($roles),
        'map_count' => count($maps),
        'roles' => $roles,
        'user_role_map' => $maps,
    ]);
} catch (Throwable $e) {
    json_error('Failed to load roles and maps.', 500, ['error' => $e->getMessage()]);
}

<?php
require_once __DIR__ . '/helpers.php';
try {
    $pdo = movex_db();
    $firstName = get_str('first_name');
    $lastName = get_str('last_name');
    $email = get_str('email');
    $phone = get_str('phone_e164');
    $state = get_str('state_name');
    $city = get_str('city_name');
    $roleName = get_str('role_name', 'user');

    if ($firstName === '' || $lastName === '' || $email === '' || $phone === '') {
        json_error('first_name, last_name, email, and phone_e164 are required.', 422);
    }

    $roleStmt = $pdo->prepare('SELECT id, role_name FROM roles WHERE role_name = ? LIMIT 1');
    $roleStmt->execute([$roleName]);
    $role = $roleStmt->fetch();
    if (!$role) {
        json_error('Invalid role_name supplied.', 422, ['role_name' => $roleName]);
    }

    $pdo->beginTransaction();

    $userPublicId = next_public_id($pdo, 'users', 'USR');
    $profilePublicId = next_public_id($pdo, 'user_profiles', 'UPR');
    $mapPublicId = next_public_id($pdo, 'user_role_map', 'URM');

    $userSql = 'INSERT INTO users (public_id, first_name, last_name, email, phone_e164, password_hash, status)
                VALUES (?, ?, ?, ?, ?, ?, ?)';
    $userStmt = $pdo->prepare($userSql);
    $userStmt->execute([
        $userPublicId,
        $firstName,
        $lastName,
        $email,
        $phone,
        password_hash('password123', PASSWORD_DEFAULT),
        'pending'
    ]);

    $userId = (int)$pdo->lastInsertId();

    $profileSql = 'INSERT INTO user_profiles (public_id, user_id, state_name, city_name, status)
                   VALUES (?, ?, ?, ?, ?)';
    $profileStmt = $pdo->prepare($profileSql);
    $profileStmt->execute([$profilePublicId, $userId, $state, $city, 'active']);

    $mapSql = 'INSERT INTO user_role_map (public_id, user_id, role_id, is_primary, status)
               VALUES (?, ?, ?, ?, ?)';
    $mapStmt = $pdo->prepare($mapSql);
    $mapStmt->execute([$mapPublicId, $userId, (int)$role['id'], 1, 'active']);

    $pdo->commit();

    json_ok([
        'message' => 'User created successfully in db_tester.',
        'user_public_id' => $userPublicId,
        'profile_public_id' => $profilePublicId,
        'role_map_public_id' => $mapPublicId,
        'role_name' => $role['role_name'],
    ], 201);
} catch (Throwable $e) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    json_error('Failed to create user.', 500, ['error' => $e->getMessage()]);
}

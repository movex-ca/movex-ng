<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once '../../../config/base.php';
require_once '../../../config/db_connect.php';

$identity = trim($_POST['login_identity'] ?? '');
$password = trim($_POST['login_password'] ?? '');
$remember = $_POST['remember_me'] ?? 0;

if ($identity === '' || $password === '') {
    die('Invalid login');
}

$sql = "SELECT
            u.id,
            u.public_id,
            u.password_hash,
            COALESCE(r.role_name, 'user') AS role_name
        FROM users u
        LEFT JOIN user_role_map urm
            ON urm.user_id = u.id
            AND urm.status = 'active'
            AND urm.is_primary = 1
        LEFT JOIN roles r
            ON r.id = urm.role_id
            AND r.status = 'active'
        WHERE u.email = :identity
           OR u.phone_e164 = :identity
        LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->execute(['identity' => $identity]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die('Invalid login credentials');
}

if (empty($user['password_hash'])) {
    die('Password column not found');
}

if (!password_verify($password, $user['password_hash'])) {
    die('Invalid login credentials');
}

$_SESSION['account_role'] = $user['role_name'];
$_SESSION['account_id'] = $user['id'] ?? '';
$_SESSION['account_code'] = $user['public_id'] ?? '';

if ((string) $remember === '1') {
    setcookie('movex_login', (string) ($_SESSION['account_id'] ?? ''), time() + (86400 * 30), '/');
}

$role = $user['role_name'] ?? 'user';
$destination = DASHBOARD_URL . '/user-dashboard.php';

switch ($role) {
    case 'admin':
        $destination = DASHBOARD_URL . '/admin-dashboard.php';
        break;
    case 'driver':
        $destination = DASHBOARD_URL . '/driver-dashboard.php';
        break;
    case 'company':
    case 'company_client':
        $destination = DASHBOARD_URL . '/company-dashboard.php';
        break;
    case 'business':
    case 'business_partner':
        $destination = DASHBOARD_URL . '/business-dashboard.php';
        break;
    case 'user':
    default:
        $destination = DASHBOARD_URL . '/user-dashboard.php';
        break;
}

header('Location: ' . $destination);
exit;
?>

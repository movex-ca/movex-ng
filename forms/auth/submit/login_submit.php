<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once '../../../config/db_connect.php';

$identity = trim($_POST['login_identity'] ?? '');
$password = trim($_POST['login_password'] ?? '');
$remember = $_POST['remember_me'] ?? 0;

if ($identity === '' || $password === '') {
    die('Invalid login');
}

$sql = "SELECT * FROM users
        WHERE email = :identity
           OR phone_e164 = :identity
        LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->execute(['identity' => $identity]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die('Invalid login credentials');
}

if (!isset($user['password_hash'])) {
    die('Password column not found');
}

if (!password_verify($password, $user['password_hash'])) {
    die('Invalid login credentials');
}

$_SESSION['account_role'] = $user['role_name'] ?? 'user';
$_SESSION['account_id']   = $user['id'] ?? '';
$_SESSION['account_code'] = $user['user_code'] ?? '';

if ((string)$remember === '1') {
    setcookie('movex_login', (string)($_SESSION['account_id'] ?? ''), time() + (86400 * 30), '/');
}

$role = $user['role_name'] ?? 'user';

switch ($role) {
    case 'user':
        header('Location: https://movex-org.com/9ja/dashboard/user-dashboard.php');
        exit;

    case 'driver':
        header('Location: https://movex-org.com/9ja/dashboard/driver-dashboard.php');
        exit;

    case 'company':
        header('Location: https://movex-org.com/9ja/dashboard/company-dashboard.php');
        exit;

   case 'business':
        header('Location: https://movex-org.com/9ja/dashboard/business-dashboard.php');
        exit;
    case 'admin':
        header('Location: https://movex-org.com/9ja/dashboad/admin-dashboard.php');
        exit;

    default:
        header('Location: https://movex-org.com/9ja/dashboard/user-dashboard.php');
        exit;
}
?>
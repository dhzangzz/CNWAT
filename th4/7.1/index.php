<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

$SECTION = '7.1';
$PAGE = strtolower($_GET['page'] ?? 'login');//chuyen chu thuong

if ($PAGE === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = [
        'admin' => password_hash('123456', PASSWORD_DEFAULT),
        'giang' => password_hash('pass@2025', PASSWORD_DEFAULT),
    ];

    $u = trim($_POST['username'] ?? '');
    $p = $_POST['password'] ?? '';

    if ($u === '' || $p === '' || !isset($users[$u]) || !password_verify($p, $users[$u])) {
        $_SESSION['flash_err'] = 'Tên đăng nhập hoặc mật khẩu không đúng.';
        $_SESSION['last_user'] = $u;
        header('Location: /dauhuonggiang/th4/7.1/?page=login');   
        exit;
    }

    $_SESSION['auth_user'] = $u;
    header('Location: /dauhuonggiang/th4/7.1/?page=secret');      
    exit;
}

if ($PAGE === 'secret' && empty($_SESSION['auth_user'])) {//ng dung ch dang nhap
    header('Location: /dauhuonggiang/th4/7.1/?page=login');
    exit;
}

$map = [
    'login'  => __DIR__ . '/pages/Login.php',  
    'secret' => __DIR__ . '/pages/Secret.php',
];

$FILE  = $map[$PAGE] ?? $map['login'];
$TITLE = '7.1 • Login';
$TH4_ROOT = dirname(__DIR__);
require $TH4_ROOT . '/app/layout.php';

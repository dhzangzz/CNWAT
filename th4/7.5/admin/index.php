<?php
// Admin chạy qua layout của TH4
session_start();

$SECTION = '7.5';
$PAGE    = 'admin';
$TITLE   = 'Thực hành 4 • 7.5 • Admin';

$logged = !empty($_SESSION['Username']) && !empty($_SESSION['Password']);
$view   = $_GET['page'] ?? 'home';

$base    = __DIR__ . '/pages/';
$map     = [
  'home'   => $base.'home.php',
  'upload' => $base.'upload.php',
  'logout' => $base.'logout.php',
  'denied' => $base.'denied.php',
];

// Nếu CHƯA đăng nhập thì chỉ cho vào trang denied (trừ khi gọi logout)
if (!$logged && $view !== 'logout') $view = 'denied';

$FILE = $map[$view] ?? $map['home'];

// gọi layout chung của TH4
$TH4_ROOT = dirname(__DIR__, 2);            // .../th4
require $TH4_ROOT . '/app/layout.php';

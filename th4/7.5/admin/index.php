<?php
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

if (!$logged && $view !== 'logout') $view = 'denied';//neu chua dang nhap va khong goi logout thi chuyen denied

$FILE = $map[$view] ?? $map['home'];
$TH4_ROOT = dirname(__DIR__, 2);            // .../th4
require $TH4_ROOT . '/app/layout.php';

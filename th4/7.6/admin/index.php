<?php
session_start();
$SECTION = '7.6';
$PAGE    = 'admin';
$TITLE   = 'TH4 • 7.6 • Admin (Cookie)';

$logged = !empty($_SESSION['Username']) && !empty($_SESSION['Password']);
$view   = $_GET['page'] ?? 'home';

$base = __DIR__.'/pages/';
$map  = [
  'home'  => $base.'home.php',
  'links' => $base.'links.php',
];
if (!$logged) $view = 'home'; // vào home sẽ báo "chưa đăng nhập" và link về Login

$FILE = $map[$view] ?? $map['home'];

$TH4_ROOT = dirname(__DIR__,2);          // .../th4
require $TH4_ROOT.'/app/layout.php';

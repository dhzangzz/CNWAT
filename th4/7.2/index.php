<?php
// 7.2 Router
$SECTION = '7.2';
$TITLE   = 'Thực hành 4 • 7.2';

$allowed = [
  'Register'       => __DIR__.'/pages/Register.php',
  'ResultRegister' => __DIR__.'/pages/ResultRegister.php',
  'Calculate'      => __DIR__.'/pages/Calculate.php',
];

$PAGE = $_GET['page'] ?? 'Register';
$FILE = $allowed[$PAGE] ?? reset($allowed);

// gọi layout chung
$TH4_ROOT = dirname(__DIR__);
require $TH4_ROOT . '/app/layout.php';

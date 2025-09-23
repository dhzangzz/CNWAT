<?php
// /dauhuonggiang/th4/7.2/index.php
$SECTION = '7.2';
$TITLE   = 'Thực hành 4 • 7.2';

$allowed = [
  'Register'       => __DIR__.'/pages/Register.php',
  'ResultRegister' => __DIR__.'/pages/ResultRegister.php',
  'Calculate'      => __DIR__.'/pages/Calculate.php',
];

$PAGE = $_GET['page'] ?? 'Register';
$FILE = $allowed[$PAGE] ?? reset($allowed); // mặc định là file đầu tiên

require_once __DIR__.'/../app/layout.php';

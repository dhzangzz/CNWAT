<?php
// 7.4 Router
$SECTION = '7.4';
$TITLE   = 'Thực hành 4 • 7.4 GetForm';

$allowed = [
    'form'    => __DIR__.'/pages/form.php',
    'process' => __DIR__.'/pages/process.php',
];

$PAGE = $_GET['page'] ?? 'form';
$FILE = $allowed[$PAGE] ?? reset($allowed);

$TH4_ROOT = dirname(__DIR__);    // .../th4
require $TH4_ROOT . '/app/layout.php';

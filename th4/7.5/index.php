<?php
$SECTION = '7.5';
$PAGE    = 'user';
$allowed = ['home' => __DIR__.'/pages/home.php', 'login' => __DIR__.'/pages/login.php'];
$view    = $_GET['page'] ?? 'home';
$FILE    = $allowed[$view] ?? reset($allowed);

$TH4_ROOT = dirname(__DIR__);             // .../th4
require $TH4_ROOT . '/app/layout.php';     // để sidebar xuất hiện như các mục khác


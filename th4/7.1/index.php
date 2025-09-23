<?php
$SECTION = '7.1';
$TITLE   = 'Thực hành 4 • 7.1';

$allowed = [
  'home'  => __DIR__.'/pages/home.php',
  'login' => __DIR__.'/pages/Login.php',   // ← thêm dòng này
  'secret'=> __DIR__.'/pages/Secret.php',  // ← trang ví dụ cần đăng nhập
  'logout'=> __DIR__.'/pages/logout.php',  // ← xử lý đăng xuất
];

$PAGE = $_GET['page'] ?? 'home';
$FILE = $allowed[$PAGE] ?? reset($allowed);

$TH4_ROOT = dirname(__DIR__);
require $TH4_ROOT . '/app/layout.php';


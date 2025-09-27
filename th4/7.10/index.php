<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

$SECTION = '7.10';
$PAGE    = $_GET['page'] ?? 'home';

/* Mặc định */
if (empty($_SESSION['lang'])) $_SESSION['lang'] = 'en';

/* Đổi ngôn ngữ qua GET */
if (isset($_GET['lang'])) {
  $_SESSION['lang'] = ($_GET['lang'] === 'vi') ? 'vi' : 'en';
  header('Location: ?page='.urlencode($PAGE));
  exit;
}

/* CHUẨN HOÁ mọi giá trị cũ: english/vietnamese -> en/vi */
$code = $_SESSION['lang'];
$mapCodes = [
  'en' => 'en', 'english' => 'en',
  'vi' => 'vi', 'vietnamese' => 'vi',
];
$code = $mapCodes[$code] ?? 'en';
$_SESSION['lang'] = $code;

/* Nạp file ngôn ngữ dạng mảng */
$langFile = __DIR__ . '/lang/' . $code . '.php';
if (!is_file($langFile)) {
  // phòng khi thiếu file -> fallback về en
  $langFile = __DIR__ . '/lang/en.php';
}
$L = require $langFile;

/* Router … (giữ nguyên như bạn đang có) */
$map = [
  'home'    => __DIR__.'/pages/home.php',
  'contact' => __DIR__.'/pages/contact.php',
];
$FILE  = $map[$PAGE] ?? $map['home'];
$TITLE = 'TH4 • 7.10 • Multi-language (Array-based)';

$TH4_ROOT = dirname(__DIR__);
require $TH4_ROOT.'/app/layout.php';

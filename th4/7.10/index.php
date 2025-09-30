<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

$SECTION = '7.10';
$PAGE    = $_GET['page'] ?? 'home';
//mac dinh la en
if (empty($_SESSION['lang'])) $_SESSION['lang'] = 'en';
//url có lang=? thì cap nhat
if (isset($_GET['lang'])) {
  $_SESSION['lang'] = ($_GET['lang'] === 'vi') ? 'vi' : 'en';
  header('Location: ?page='.urlencode($PAGE));
  exit;
}
$code = $_SESSION['lang'];
$mapCodes = [
  'en' => 'en', 'english' => 'en',
  'vi' => 'vi', 'vietnamese' => 'vi',
];
$code = $mapCodes[$code] ?? 'en';
$_SESSION['lang'] = $code;

//duong dan toi file ngon ngu tuong ung
$langFile = __DIR__ . '/lang/' . $code . '.php';
if (!is_file($langFile)) {
  //thieu-> ve en
  $langFile = __DIR__ . '/lang/en.php';
}
$L = require $langFile;

//anh xa cac trnag
$map = [
  'home'    => __DIR__.'/pages/home.php',
  'contact' => __DIR__.'/pages/contact.php',
];
$FILE  = $map[$PAGE] ?? $map['home'];
$TITLE = 'TH4 • 7.10 • Multi-language (Array-based)';

$TH4_ROOT = dirname(__DIR__);
require $TH4_ROOT.'/app/layout.php';

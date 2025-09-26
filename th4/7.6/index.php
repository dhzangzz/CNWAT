<?php
// End user router
session_start();
$SECTION = '7.6';      // nếu bạn dùng sidebar theo $SECTION/$PAGE
$PAGE    = 'user';
$TITLE   = 'TH4 • 7.6 • Cookie';

$map = [
  'home'  => __DIR__.'/pages/home.php',
  'login' => __DIR__.'/pages/login.php',
];
$view = $_GET['page'] ?? 'home';
$FILE = $map[$view] ?? $map['home'];

// Nếu bạn không dùng layout chung, echo file thẳng.
// Còn nếu muốn “ăn” layout TH4 (banner/topbar/sidebar):
$TH4_ROOT = dirname(__DIR__);              // .../th4
require $TH4_ROOT.'/app/layout.php';

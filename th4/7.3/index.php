<?php
$SECTION = '7.3';
$TITLE   = 'Thực hành 4 • 7.3';
$allowed = [
  'home'          => __DIR__.'/pages/home.php',
  'drawTable'     => __DIR__.'/pages/drawtable.php',   // lưu ý: file bạn đang đặt là "drawtable.php"
  'loop'          => __DIR__.'/pages/loop.php',
  'calculate1'    => __DIR__.'/pages/calculate1.php',
  'calculate2'    => __DIR__.'/pages/calculate2.php',
  'array1'        => __DIR__.'/pages/array1.php',
  'uploadform'    => __DIR__.'/pages/uploads/uploadform.php',
  'uploadprocess' => __DIR__.'/pages/uploads/uploadprocess.php',
];
$PAGE = $_GET['page'] ?? 'home';
$FILE = $allowed[$PAGE] ?? $allowed['home'];
require __DIR__.'/../app/layout.php';

<?php
$SECTION = '7.12';
$PAGE = $_GET['page'] ?? 'home';

$map = [
  'home'                => __DIR__.'/pages/home.php',
  'listClass1'          => __DIR__.'/pages/listClass1.php',
  'listClass2'          => __DIR__.'/pages/listClass2.php',
  'listClass3'          => __DIR__.'/pages/listClass3.php',
  'listStudentsInClass' => __DIR__.'/pages/listStudentsInClass.php',
  'studentDetail'       => __DIR__.'/pages/studentDetail.php',
];

$FILE  = $map[$PAGE] ?? $map['home'];
$TITLE = 'TH4 • 7.12 • Truy vấn dữ liệu';

$TH4_ROOT = dirname(__DIR__);
require $TH4_ROOT.'/app/layout.php';

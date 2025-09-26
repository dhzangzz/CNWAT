<?php
// /dauhuonggiang/th4/7.7/index.php
$SECTION = '7.7';
$PAGE    = $_GET['page'] ?? 'ar1';
$TITLE   = 'TH4 • 7.7 • Function';

// Nạp thư viện dùng chung
require __DIR__.'/libs/xuLyMangSo.php';
require __DIR__.'/libs/xuLyMaTran.php';

// Map page
$map = [
  'ar1'    => __DIR__.'/pages/ar1Chieu.php',
  'matrix' => __DIR__.'/pages/maTran.php',
];
$FILE = $map[$PAGE] ?? $map['ar1'];

// Gọi layout chung của TH4
$TH4_ROOT = dirname(__DIR__);
require $TH4_ROOT.'/app/layout.php';

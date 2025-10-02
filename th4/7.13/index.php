<?php
$SECTION = '7.13';
$PAGE = $_GET['page'] ?? 'home';

$map = [
    'home'          => __DIR__.'/pages/home.php',
    'productList'   => __DIR__.'/pages/productList.php',
    'productDetail' => __DIR__.'/pages/productDetail.php',
    'productSearch' => __DIR__.'/pages/productSearch.php',
];

$FILE  = $map[$PAGE] ?? $map['home'];
$TITLE = 'TH4 • 7.13 • Web bán laptop';

$TH4_ROOT = dirname(__DIR__);
require $TH4_ROOT.'/app/layout.php';
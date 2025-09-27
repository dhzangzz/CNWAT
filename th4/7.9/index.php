<?php
$SECTION = '7.9';
$TITLE   = 'TH4 • 7.9 • File & Data Flow';
require __DIR__.'/helpers.php';

$page = $_GET['page'] ?? 'home';
$map  = [
    'home'   => __DIR__.'/pages/home.php',
    'list'   => __DIR__.'/pages/list.php',
    'add'    => __DIR__.'/pages/add.php',
    'detail' => __DIR__.'/pages/detail.php',
    'edit'   => __DIR__.'/pages/edit.php',
    'delete' => __DIR__.'/pages/delete.php',
    ];
$FILE = $map[$page] ?? $map['home'];

$TH4_ROOT = dirname(__DIR__);
require $TH4_ROOT.'/app/layout.php';

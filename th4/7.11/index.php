<?php
// th4/7.11/index.php
$SECTION = '7.11';
$PAGE = $_GET['page'] ?? 'lop_list';

$map = [
    'lop_list'   => __DIR__.'/pages/lop_list.php',
    'lop_add'    => __DIR__.'/pages/lop_add.php',
    'lop_edit'   => __DIR__.'/pages/lop_edit.php',
    'lop_delete' => __DIR__.'/pages/lop_delete.php',

    'hoso_list'   => __DIR__.'/pages/hoso_list.php',
    'hoso_add'    => __DIR__.'/pages/hoso_add.php',
    'hoso_edit'   => __DIR__.'/pages/hoso_edit.php',
    'hoso_delete' => __DIR__.'/pages/hoso_delete.php',
];

$FILE  = $map[$PAGE] ?? $map['lop_list'];
$TITLE = 'TH4 • 7.11 • MySQL (PDO)';

$TH4_ROOT = dirname(__DIR__);
require $TH4_ROOT.'/app/layout.php';

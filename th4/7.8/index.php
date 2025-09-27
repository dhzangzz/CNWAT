<?php
// TH4 • 7.8 – File I/O (students)
$SECTION = '7.8';
$TITLE   = 'TH4 • 7.8 • File (Students)';
require __DIR__.'/helpers.php';

$PAGE = $_GET['page'] ?? 'listStudent';   // để sidebar active
$map  = [
  'listStudent' => __DIR__.'/pages/listStudent.php',
  'addStudent'  => __DIR__.'/pages/addStudent.php',
];
$FILE = $map[$PAGE] ?? $map['listStudent'];

$TH4_ROOT = dirname(__DIR__);
require $TH4_ROOT.'/app/layout.php';

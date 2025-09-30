<?php
// Chuyển "1, 2, 3" -> [1,2,3]
function parseArray(string $s): array {//chuyen thanh mang
    if ($s==='') return [];//chuoi rong -> mang rong
    $parts = preg_split('/[,\s;]+/', trim($s));//tach chuoi bang , sp ;
    return array_values(array_map('floatval', array_filter($parts, fn($x)=>$x!=='')));//chuyen thanh so thuc
}

function minDay(array $a){ return $a ? min($a) : null; }
function maxDay(array $a){ return $a ? max($a) : null; }
function avgDay(array $a){ return $a ? array_sum($a)/count($a) : null; }

function sortDay(array $a): array { sort($a); return $a; }
function daoNguocDay(array $a): array { return array_reverse($a); }

function max2Day(array $a){//max thu 2
    $u = array_values(array_unique($a));//loai bo gia tri trung lap
    rsort($u);//sap xep giam dan
    return $u[1] ?? null;
}

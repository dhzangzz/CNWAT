<?php
// Chuyển "1, 2, 3" -> [1,2,3]
function parseArray(string $s): array {
    if ($s==='') return [];
    $parts = preg_split('/[,\s;]+/', trim($s));
    return array_values(array_map('floatval', array_filter($parts, fn($x)=>$x!=='')));
}

function minDay(array $a){ return $a ? min($a) : null; }
function maxDay(array $a){ return $a ? max($a) : null; }
function avgDay(array $a){ return $a ? array_sum($a)/count($a) : null; }

function sortDay(array $a): array { sort($a); return $a; }            // tăng dần
function daoNguocDay(array $a): array { return array_reverse($a); }

function max2Day(array $a){                                          // max thứ 2
    $u = array_values(array_unique($a));
    rsort($u);
    return $u[1] ?? null;
}

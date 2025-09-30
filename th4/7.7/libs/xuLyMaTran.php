<?php
function readMatrix(string $prefix, int $n): array {//prefix: ten mt, n: kthuoc
    $m = [];//mang rong
    for($i=0;$i<$n;$i++){
        for($j=0;$j<$n;$j++){
        $key = "{$prefix}_{$i}_{$j}";//key: a_0_0
        $m[$i][$j] = isset($_POST[$key]) ? floatval($_POST[$key]) : 0;//lay gt tu postkey
        }
    }
    return $m;
}

function minMaTran(array $m){ return array_reduce($m, fn($c,$row)=>$c===null?min($row):min($c,min($row)), null); }
function maxMaTran(array $m){ return array_reduce($m, fn($c,$row)=>$c===null?max($row):max($c,max($row)), null); }

function tongTrenCheoChinh(array $m){
    $n = count($m); $s=0;
    for($i=0;$i<$n;$i++) $s += $m[$i][$i] ?? 0;
    return $s;
}
function tongTrenCheoPhu(array $m){
    $n = count($m); $s=0;
    for($i=0;$i<$n;$i++) $s += $m[$i][$n-1-$i] ?? 0;
    return $s;
}
function tinhMaTranTong(array $a, array $b){
    $n = count($a); $c = [];
    for($i=0;$i<$n;$i++) for($j=0;$j<$n;$j++) $c[$i][$j] = ($a[$i][$j] ?? 0) + ($b[$i][$j] ?? 0);
    return $c;
}
function tinhMaTranTich(array $a, array $b){  
    $n = count($a); $c=[];
    for($i=0;$i<$n;$i++){
        for($j=0;$j<$n;$j++){
        $sum=0; for($k=0;$k<$n;$k++) $sum += ($a[$i][$k] ?? 0) * ($b[$k][$j] ?? 0);
        $c[$i][$j] = $sum;
        }
    }
    return $c;
}

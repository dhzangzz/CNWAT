<?php
$id  = (int)($_GET['id'] ?? 0);
$rows = read_all();
$pos = -1; 
foreach($rows as $i=>$r) if ((int)$r[0]===$id){ 
    $pos=$i; break; }//luu dong
if ($pos>=0) { array_splice($rows,$pos,1); write_all($rows); }//xoa dong
header('Location: ?page=list');
exit;

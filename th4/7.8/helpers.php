<?php
const DATA_DIR = __DIR__ . '/data';
if (!is_dir(DATA_DIR)) mkdir(DATA_DIR, 0777, true);

function data_path(string $name): string {
  return DATA_DIR . '/' . basename($name);//tra ve duong dan cua file
}

function csv_read(string $path): array {
  if (!is_file($path)) return [];//mang rong
  $rows=[]; if (($f=fopen($path,'r'))!==false){//doc file
    while(($r=fgetcsv($f))!==false){ $rows[]=$r; }//doc tung dong
    fclose($f);
  }
  return $rows;//tra ve mang
}

function csv_append(string $path, array $row): bool {//them dong moi
  $f=fopen($path,'a'); 
  if(!$f) return false;
  $ok=fputcsv($f,$row)!==false; fclose($f); return $ok;
}

function csv_write_all(string $path, array $rows): bool {//ghi de toan bo du lieu
  $f=fopen($path,'w'); 
  if(!$f) return false;
  foreach($rows as $r) 
    fputcsv($f,$r);//ghi tung dong
  fclose($f); 
  return true;
}

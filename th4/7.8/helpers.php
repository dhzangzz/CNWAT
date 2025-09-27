<?php
const DATA_DIR = __DIR__ . '/data';
if (!is_dir(DATA_DIR)) mkdir(DATA_DIR, 0777, true);

function data_path(string $name): string {
  return DATA_DIR . '/' . basename($name);
}

function csv_read(string $path): array {
  if (!is_file($path)) return [];
  $rows=[]; if (($f=fopen($path,'r'))!==false){
    while(($r=fgetcsv($f))!==false){ $rows[]=$r; }
    fclose($f);
  }
  return $rows;
}

function csv_append(string $path, array $row): bool {
  $f=fopen($path,'a'); if(!$f) return false;
  $ok=fputcsv($f,$row)!==false; fclose($f); return $ok;
}

function csv_write_all(string $path, array $rows): bool {
  $f=fopen($path,'w'); if(!$f) return false;
  foreach($rows as $r) fputcsv($f,$r); fclose($f); return true;
}

<?php
const DATA_DIR    = __DIR__ . '/data';
const UPLOAD_DIR  = __DIR__ . '/uploads';
const DATA_FILE   = DATA_DIR . '/students.csv';

if (!is_dir(DATA_DIR))   mkdir(DATA_DIR, 0777, true);
if (!is_dir(UPLOAD_DIR)) mkdir(UPLOAD_DIR, 0777, true);

function read_all(): array {
    if (!is_file(DATA_FILE)) return [];
    $rows=[]; if (($f=fopen(DATA_FILE,'r'))!==false){
        while(($r=fgetcsv($f))!==false){ $rows[]=$r; }
        fclose($f);
    }
    return $rows; // mỗi $r: [id, name, dob, addr, img, class]
}
function write_all(array $rows): bool {
    $f=fopen(DATA_FILE,'w'); if(!$f) return false;
    foreach($rows as $r) fputcsv($f,$r);
    fclose($f); return true;
}
function next_id(array $rows): int {
    $max=0; foreach($rows as $r){ $max=max($max, (int)($r[0]??0)); } return $max+1;
}

/** Upload ảnh: trả về tên file (basename) hoặc null */
function handle_upload(?array $file): ?string {
    if (!$file || $file['error']!==UPLOAD_ERR_OK) return null;
    if ($file['size'] > 2*1024*1024) return null; // ≤2MB
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, ['jpg','jpeg','png','gif','webp'])) return null;
    $name = 'img_'.date('Ymd_His').'_'.bin2hex(random_bytes(3)).'.'.$ext;
    $dest = UPLOAD_DIR.'/'.$name;
    return move_uploaded_file($file['tmp_name'],$dest) ? $name : null;
    }

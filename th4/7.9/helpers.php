<?php
//khai bao duong dan co dinh
const DATA_DIR    = __DIR__ . '/data';
const UPLOAD_DIR  = __DIR__ . '/uploads';
const DATA_FILE   = DATA_DIR . '/students.csv';
//tao thu muc neu chua ton tai
if (!is_dir(DATA_DIR))   mkdir(DATA_DIR, 0777, true);
if (!is_dir(UPLOAD_DIR)) mkdir(UPLOAD_DIR, 0777, true);

function read_all(): array {
    if (!is_file(DATA_FILE)) return [];//file ko ton tai-> mang rong
    $rows=[]; 
    if (($f=fopen(DATA_FILE,'r'))!==false){
        while(($r=fgetcsv($f))!==false){ $rows[]=$r; }//doc tung dong
        fclose($f);
    }
    return $rows; // mỗi $r: [id, name, dob, addr, img, class]
}
function write_all(array $rows): bool {//ghi file
    $f=fopen(DATA_FILE,'w'); if(!$f) return false;
    foreach($rows as $r) fputcsv($f,$r);//ghi tung dong
    fclose($f); return true;
}
function next_id(array $rows): int {//tao id moi
    $max=0; 
    foreach($rows as $r){ $max=max($max, (int)($r[0]??0)); } //tim max id
    return $max+1;
}

function handle_upload(?array $file): ?string {//up anh
    if (!$file || $file['error']!==UPLOAD_ERR_OK) return null;//ko co file hoac loi
    if ($file['size'] > 2*1024*1024) return null; // <2MB
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));//lay phan mo rong
    if (!in_array($ext, ['jpg','jpeg','png','gif','webp'])) return null;
    $name = 'img_'.date('Ymd_His').'_'.bin2hex(random_bytes(3)).'.'.$ext;
    $dest = UPLOAD_DIR.'/'.$name;
    return move_uploaded_file($file['tmp_name'],$dest) ? $name : null;
    }

<?php
require_once __DIR__.'/../db.php';

function hoso_paged($page=1,$perPage=10) {
    $page = max(1,(int)$page);
    $off  = ($page-1)*$perPage;
    $total = pdo()->query("SELECT COUNT(*) FROM HOSO")->fetchColumn();
    $st = pdo()->prepare("SELECT * FROM HOSO ORDER BY MAHS LIMIT ? OFFSET ?");
    $st->bindValue(1,(int)$perPage,PDO::PARAM_INT);
    $st->bindValue(2,(int)$off,PDO::PARAM_INT);
    $st->execute();
    return ['rows'=>$st->fetchAll(),'total'=>$total,'page'=>$page,'perPage'=>$perPage];
}
function hoso_get($mahs){
    $st=pdo()->prepare("SELECT * FROM HOSO WHERE MAHS=?"); $st->execute([$mahs]); return $st->fetch();
}
function hoso_insert($mahs,$hoten,$ngaysinh,$diachi,$lop,$t,$l,$h){
    $st=pdo()->prepare("INSERT INTO HOSO(MAHS,HOTEN,NGAYSINH,DIACHI,LOP,DIEMTOAN,DIEMLY,DIEMHOA) VALUES(?,?,?,?,?,?,?,?)");
    return $st->execute([$mahs,$hoten,$ngaysinh,$diachi,$lop,$t,$l,$h]);
}
function hoso_update($mahs,$hoten,$ngaysinh,$diachi,$lop,$t,$l,$h){
    $st=pdo()->prepare("UPDATE HOSO SET HOTEN=?,NGAYSINH=?,DIACHI=?,LOP=?,DIEMTOAN=?,DIEMLY=?,DIEMHOA=? WHERE MAHS=?");
    return $st->execute([$hoten,$ngaysinh,$diachi,$lop,$t,$l,$h,$mahs]);
}
function hoso_delete($mahs){
    $st=pdo()->prepare("DELETE FROM HOSO WHERE MAHS=?"); return $st->execute([$mahs]);
}

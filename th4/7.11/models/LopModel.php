<?php
require_once __DIR__.'/../db.php';

function lop_all() {
    return pdo()->query("SELECT * FROM LOP ORDER BY MALOP")->fetchAll();
}
function lop_get($malop) {
    $st = pdo()->prepare("SELECT * FROM LOP WHERE MALOP=?");
    $st->execute([$malop]); return $st->fetch();
}
function lop_insert($malop,$tenlop,$khoahoc,$gvcn) {
    $st = pdo()->prepare("INSERT INTO LOP(MALOP,TENLOP,KHOAHOC,GVCN) VALUES(?,?,?,?)");
    return $st->execute([$malop,$tenlop,$khoahoc,$gvcn]);
}
function lop_update($malop,$tenlop,$khoahoc,$gvcn) {
    $st = pdo()->prepare("UPDATE LOP SET TENLOP=?,KHOAHOC=?,GVCN=? WHERE MALOP=?");
    return $st->execute([$tenlop,$khoahoc,$gvcn,$malop]);
}
function lop_delete($malop) {
    $st = pdo()->prepare("DELETE FROM LOP WHERE MALOP=?");
    return $st->execute([$malop]);
}

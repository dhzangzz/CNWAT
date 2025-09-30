<?php
require_once __DIR__.'/../models/LopModel.php';
$malop = $_GET['malop'] ?? '';
$row = lop_get($malop);
if (!$row) { echo "<div class=card>Không tìm thấy lớp</div>"; return; }

if ($_SERVER['REQUEST_METHOD']==='POST') {
    lop_update($malop, $_POST['tenlop'], (int)$_POST['khoahoc'], $_POST['gvcn']); //cap nhat ma lop co dinh
    header('Location: ?page=lop_list'); exit;//tro ve danh sach
}
?>
<div class="card" style="max-width:560px">
    <h3>Sửa LOP: <?= htmlspecialchars($malop) ?></h3>
    <form method="post">
        <p>TENLOP <input name="tenlop" value="<?= htmlspecialchars($row['TENLOP']) ?>"></p>
        <p>KHOAHOC <input name="khoahoc" type="number" value="<?= (int)$row['KHOAHOC'] ?>"></p>
        <p>GVCN <input name="gvcn" value="<?= htmlspecialchars($row['GVCN']) ?>"></p>
        <button>Cập nhật</button>
        <a href="?page=lop_list">Hủy</a>
    </form>
</div>

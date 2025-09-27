<?php
require_once __DIR__.'/../models/HosoModel.php';
$mahs = $_GET['mahs'] ?? '';
$row = hoso_get($mahs);
if (!$row) { echo "<div class=card>Không tìm thấy hồ sơ</div>"; return; }

if ($_SERVER['REQUEST_METHOD']==='POST') {
    hoso_update($mahs, $_POST['hoten'], $_POST['ngaysinh'], $_POST['diachi'], $_POST['lop'],
                (float)$_POST['toan'], (float)$_POST['ly'], (float)$_POST['hoa']);
    header('Location: ?page=hoso_list'); exit;
}
?>
<div class="card" style="max-width:700px">
    <h3>Sửa HOSO: <?= htmlspecialchars($mahs) ?></h3>
    <form method="post">
        <p>Họ tên <input name="hoten" value="<?= htmlspecialchars($row['HOTEN']) ?>"></p>
        <p>Ngày sinh <input type="date" name="ngaysinh" value="<?= htmlspecialchars($row['NGAYSINH']) ?>"></p>
        <p>Địa chỉ <input name="diachi" value="<?= htmlspecialchars($row['DIACHI']) ?>"></p>
        <p>Lớp <input name="lop" value="<?= htmlspecialchars($row['LOP']) ?>"></p>
        <p>Toán <input name="toan" type="number" step="0.1" min="0" max="10" value="<?= $row['DIEMTOAN'] ?>"></p>
        <p>Lý   <input name="ly"   type="number" step="0.1" min="0" max="10" value="<?= $row['DIEMLY'] ?>"></p>
        <p>Hóa  <input name="hoa"  type="number" step="0.1" min="0" max="10" value="<?= $row['DIEMHOA'] ?>"></p>
        <button>Cập nhật</button>
        <a href="?page=hoso_list">Hủy</a>
    </form>
</div>

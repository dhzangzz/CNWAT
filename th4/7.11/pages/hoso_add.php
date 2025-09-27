<?php
require_once __DIR__.'/../models/HosoModel.php';
$msg='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $ok = hoso_insert($_POST['mahs'], $_POST['hoten'], $_POST['ngaysinh'], $_POST['diachi'],
                        $_POST['lop'], (float)$_POST['toan'], (float)$_POST['ly'], (float)$_POST['hoa']);
    if ($ok) { header('Location: ?page=hoso_list'); exit; }
    $msg='Thêm không thành công';
}
?>
<div class="card" style="max-width:700px">
    <h3>Thêm HOSO</h3>
    <?php if($msg) echo "<p style=color:red>$msg</p>"; ?>
    <form method="post">
        <p>MAHS <input name="mahs" required maxlength="8"></p>
        <p>Họ tên <input name="hoten" maxlength="50"></p>
        <p>Ngày sinh <input type="date" name="ngaysinh"></p>
        <p>Địa chỉ <input name="diachi" maxlength="150"></p>
        <p>Lớp <input name="lop" maxlength="6"></p>
        <p>Toán <input name="toan" type="number" step="0.1" min="0" max="10"></p>
        <p>Lý   <input name="ly" type="number" step="0.1" min="0" max="10"></p>
        <p>Hóa  <input name="hoa" type="number" step="0.1" min="0" max="10"></p>
        <button>Lưu</button>
        <a href="?page=hoso_list">Hủy</a>
    </form>
</div>

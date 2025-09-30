<?php
require_once __DIR__.'/../models/LopModel.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    //doc du lieu tu form
    $ok = lop_insert($_POST['malop'], $_POST['tenlop'], (int)$_POST['khoahoc'], $_POST['gvcn']);
    if ($ok) { header('Location: ?page=lop_list'); exit; }
    $msg = 'Thêm không thành công';
}
?>
<div class="card" style="max-width:560px">
    <h3>Thêm LOP</h3>
    <?php if($msg) echo "<p style=color:red>$msg</p>"; ?>
    <form method="post">
        <p>MALOP <input name="malop" required maxlength="6"></p>
        <p>TENLOP <input name="tenlop" maxlength="50"></p>
        <p>KHOAHOC <input name="khoahoc" type="number"></p>
        <p>GVCN <input name="gvcn" maxlength="50"></p>
        <button>Lưu</button>
        <a href="?page=lop_list">Hủy</a>
    </form>
</div>

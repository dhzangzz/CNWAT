<?php
$h = fn($v)=>htmlspecialchars($v, ENT_QUOTES, 'UTF-8');

$fullname = $_GET['txtHoTen']     ?? '';
$about    = $_GET['txtGioiThieu'] ?? '';
$account  = $_GET['txtTaiKhoan']  ?? '';
$password = $_GET['txtMatKhau']   ?? '';
$gender   = $_GET['rdGioiTinh']   ?? '';
$job      = $_GET['cboNghe']      ?? '';
$skills   = $_GET['chkKyNang']    ?? [];     // <-- checkbox list
$agree    = isset($_GET['chkDongY']);
?>
<div class="card">
    <h2>Kết quả (GET)</h2>
    <ul>
        <li>Họ tên: <b><?= $h($fullname) ?></b></li>
        <li>Giới thiệu: <pre style="display:inline;border:0;background:transparent"><?= $h($about) ?></pre></li>
        <li>Tài khoản: <code><?= $h($account) ?></code></li>
        <li>Mật khẩu: <i>đã nhận <?= strlen($password) ?> ký tự (không hiển thị)</i></li>
        <li>Giới tính: <b><?= $h($gender) ?: '—' ?></b></li>
        <li>Nghề nghiệp: <b><?= $h($job) ?: '—' ?></b></li>
        <li>Skill (checkbox): <b><?= $skills ? $h(implode(', ', (array)$skills)) : '—' ?></b></li>
        <li>Đồng ý điều khoản: <b><?= $agree ? 'Có' : 'Không' ?></b></li>
    </ul>

    <p style="margin-top:12px">
        <a href="/dauhuonggiang/th4/7.4/?page=form">Quay lại form</a>
    </p>
</div>

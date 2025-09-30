<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (empty($_SESSION['auth_user'])) {
    //chua dang nhap->dung về Login
    header('Location: /dauhuonggiang/th4/7.1/?page=login');
    exit;
}
$user = $_SESSION['auth_user'];//lay gia tri tu session
?>
<div class="card">
    <h2>Xin chào, <?= htmlspecialchars($user) ?>!</h2>
    <p>Bạn đã đăng nhập thành công.</p>
    <p><a class="link" href="/dauhuonggiang/th4/7.1/?page=logout">Đăng xuất</a></p>
</div>

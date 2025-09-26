<?php
$user = htmlspecialchars($_SESSION['Username'] ?? '');
$pass = htmlspecialchars($_SESSION['Password'] ?? '');
?>
<div class="card">
  <h2>Admin • Home</h2>
  <p>Đã đăng nhập thành công.</p>
  <p>Tên đăng nhập: <b><?= $user ?></b></p>
  <p>Mật khẩu: <b><?= $pass ?></b></p>
  <p style="margin-top:10px">
    <a class="linkcard" href="/dauhuonggiang/th4/7.5/admin/?page=upload">→ Tới Upload</a>
    &nbsp;|&nbsp;
    <a class="linkcard" href="/dauhuonggiang/th4/7.5/admin/?page=logout">Đăng xuất</a>
  </p>
</div>

<?php $logged = !empty($_SESSION['Username']) && !empty($_SESSION['Password']); ?>
<div class="card">
  <h2>7.6 • Admin Home</h2>
  <?php if(!$logged): ?>
    <div style="background:#fff7e0;border:1px solid #f59e0b;padding:10px;border-radius:10px">
      <b>Chưa đăng nhập.</b> Vui lòng vào <a href="/dauhuonggiang/th4/7.6/?page=login">Login</a>.
    </div>
  <?php else: ?>
    <p>Xin chào <b><?= htmlspecialchars($_SESSION['Username']) ?></b>.</p>
    <p>→ Tới trang quản lý link (Cookie): <a href="/dauhuonggiang/th4/7.6/admin/?page=links">Links</a></p>
    <p>→ <a href="/dauhuonggiang/th4/7.6/admin/logout.php">Logout</a></p>
  <?php endif; ?>
</div>

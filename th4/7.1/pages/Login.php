<?php
$message  = $_SESSION['flash_err'] ?? '';
unset($_SESSION['flash_err']);
$username = $_SESSION['last_user'] ?? '';
unset($_SESSION['last_user']);
?>
<div class="card login-card">
  <h2>Đăng nhập</h2>

    <?php if ($message): ?>
        <div class="alert" style="margin:8px 0 12px;color:#b42318;background:#fee4e2;border:1px solid #fda29b;padding:8px 10px;border-radius:8px">
        <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/dauhuonggiang/th4/7.1/?page=login">
        <label style="display: block; margin-bottom: 10px;">Username:
        <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" required style="width: 100%; padding: 8px; margin-top: 4px;">
        </label>
        <label style="display: block; margin-bottom: 15px;">Password:
        <input type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 4px;">
        </label>
        <button type="submit" style="width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Đăng nhập</button>
    </form>

  <p class="hint" style="margin-top:10px;color:#666">
    Tài khoản: <code>admin / 123456</code> hoặc <code>giang / pass@2025</code>.
  </p>
</div>

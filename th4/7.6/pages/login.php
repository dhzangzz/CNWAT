<?php
$msg = '';
$u = trim($_POST['username'] ?? '');
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $p = $_POST['password'] ?? '';
    if ($u==='admin' && $p==='admin') {
        $_SESSION['Username'] = $u;
        $_SESSION['Password'] = $p;
        header('Location: /dauhuonggiang/th4/7.6/admin/');
        exit;
    } else $msg = 'Sai username hoặc password.';
}
?>
<div class="card" style="max-width:460px;margin:0 auto">
    <h2 style="margin:0 0 12px">Đăng nhập</h2>
    <?php if($msg): ?>
        <div style="background:#fff7e0;border:1px solid #f59e0b;padding:8px 10px;border-radius:8px;margin-bottom:10px">
        <?= htmlspecialchars($msg) ?>
        </div>
    <?php endif; ?>
    <form method="post">
        <label style="display:block;margin:8px 0 4px">Username</label>
        <input name="username" required value="<?= htmlspecialchars($u) ?>" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px">
        <label style="display:block;margin:12px 0 4px">Password</label>
        <input name="password" type="password" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px">
        <div style="display:flex;gap:10px;margin-top:12px">
        <button type="submit" style="padding:10px 14px;border:0;border-radius:8px;background:#111;color:#fff;cursor:pointer">Đăng nhập</button>
        <button type="reset"  style="padding:10px 14px;border:1px solid #ddd;border-radius:8px;background:#fff;cursor:pointer">Nhập lại</button>
        </div>
        <p style="color:#666;margin-top:10px">Tài khoản mẫu: <b>admin / admin</b></p>
    </form>
</div>

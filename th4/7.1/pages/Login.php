<?php
// Bật session để lưu trạng thái đăng nhập
if (session_status() === PHP_SESSION_NONE) session_start();

// Tài khoản mẫu (hardcoded cho 7.1, chưa dùng DB)
$users = [
  'admin' => password_hash('123456', PASSWORD_DEFAULT), // mật khẩu: 123456
  'giang' => password_hash('pass@2025', PASSWORD_DEFAULT),
];

// Khởi tạo biến hiển thị
$username = $_POST['username'] ?? '';
$message  = '';

// Xử lý POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username'] ?? '');
    $p = $_POST['password'] ?? '';

    if ($u === '' || $p === '') {
        $message = 'Vui lòng nhập đủ tên đăng nhập và mật khẩu.';
    } elseif (!isset($users[$u]) || !password_verify($p, $users[$u])) {
        // So khớp sai
        $message = 'Tên đăng nhập hoặc mật khẩu không đúng.';
    } else {
        // Thành công: lưu session và chuyển sang trang bí mật
        $_SESSION['auth_user'] = $u;
        header('Location: /dauhuonggiang/th4/7.1/?page=secret');
        exit;
    }
}
?>
<div class="card login-card">
    <h2>Đăng nhập</h2>

    <?php if ($message): ?>
    <div class="alert"
        style="margin:8px 0 12px;color:#b42318;background:#fee4e2;border:1px solid #fda29b;padding:8px 10px;border-radius:8px">
        <?= htmlspecialchars($message) ?>
    </div>
    <?php endif; ?>

    <form method="post" action="">
        <label> Username:     
            <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" required>
        </label>

        <label> Password:      
            <input type="password" name="password" required>
        </label>

        <button type="submit">Đăng nhập</button>
    </form>

    <p class="hint" style="margin-top:10px;color:#666">
        Tài khoản mẫu: <code>admin / 123456</code> hoặc <code>giang / pass@2025</code>.
    </p>
</div>

<style>
    .login-card label {
        display: block;
        margin: 10px 0
    }

    .login-card input {
        width: 60%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px
    }

    .login-card button {
        margin-top: 8px;
        padding: 10px 12px;
        border: 0;
        border-radius: 10px;
        cursor: pointer
    }
</style>

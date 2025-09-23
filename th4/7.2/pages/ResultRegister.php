<?php
$fullname = $_POST['fullname'] ?? '';
$email    = $_POST['email']    ?? '';
$gender   = $_POST['gender']   ?? '';
$major    = $_POST['major']    ?? '';
$ok = $fullname && $email && $gender && $major;
?>
<div class="card">
    <h2>ResultRegister</h2>
    <?php if (!$ok): ?>
        <p>Thiếu dữ liệu. Quay lại <a href="/dauhuonggiang/th4/7.2/?page=Register">Register</a>.</p>
    <?php else: ?>
        <p>Họ tên: <b><?= htmlspecialchars($fullname) ?></b></p>
        <p>Email: <b><?= htmlspecialchars($email) ?></b></p>
        <p>Giới tính: <b><?= htmlspecialchars($gender) ?></b></p>
        <p>Chuyên ngành: <b><?= htmlspecialchars($major) ?></b></p>
        <p style="margin-top:10px">
        <a class="link" href="/dauhuonggiang/th4/7.2/?page=Register">Nhập lại</a>
        </p>
    <?php endif; ?>
</div>

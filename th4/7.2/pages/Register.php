<?php
$fullname = $_POST['fullname'] ?? '';//lay gia tri tu post, ko co->rong
$email    = $_POST['email']    ?? '';
$gender   = $_POST['gender']   ?? '';
$major    = $_POST['major']    ?? '';
$msg      = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($fullname==='' || $email==='' || $gender==='' || $major==='') {
    $msg = 'Vui lòng nhập đủ thông tin.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = 'Email không hợp lệ.';
  } else {//hop le->chuyen sang ResultRegister
    ?>
    <form id="fwd" method="post" action="/dauhuonggiang/th4/7.2/?page=ResultRegister">
      <input type="hidden" name="fullname" value="<?= htmlspecialchars($fullname) ?>">
      <input type="hidden" name="email"    value="<?= htmlspecialchars($email) ?>">
      <input type="hidden" name="gender"   value="<?= htmlspecialchars($gender) ?>">
      <input type="hidden" name="major"    value="<?= htmlspecialchars($major) ?>">
    </form>
    <script>document.getElementById('fwd').submit();</script>
    <?php
    exit;
  }
}
?>
<div class="card">
    <h2>Đăng ký</h2>
    <?php if ($msg): ?>
        <div style="margin:8px 0 12px;color:#b42318;background:#fee4e2;border:1px solid #fda29b;padding:8px 10px;border-radius:8px">
        <?= htmlspecialchars($msg) ?>
        </div>
    <?php endif; ?>

    <form method="post" action="">
        <label>Họ tên: 
        <input type="text" name="fullname" required value="<?= htmlspecialchars($fullname) ?>">
        </label>

        <label>Email:
        <input type="email" name="email" required value="<?= htmlspecialchars($email) ?>">
        </label>

        <fieldset style="border:0;padding:0;margin:10px 0">
        <legend>Giới tính:</legend>
        <label><input type="radio" name="gender" value="Nữ"   <?= $gender==='Nữ'?'checked':'' ?>> Nữ</label>
        <label><input type="radio" name="gender" value="Nam"  <?= $gender==='Nam'?'checked':'' ?>> Nam</label>
        <label><input type="radio" name="gender" value="Khác" <?= $gender==='Khác'?'checked':'' ?>> Khác</label>
        </fieldset>

        <label>Chuyên ngành
        <select name="major" required>
            <option value="">-- Chọn --</option>
            <option <?= $major==='ATTT'?'selected':'' ?> value="ATTT">An toàn thông tin</option>
            <option <?= $major==='CNTT'?'selected':'' ?> value="CNTT">Công nghệ thông tin</option>
            <option <?= $major==='DTVT'?'selected':'' ?> value="DTVT">Điện tử viễn thông</option>
        </select>
        </label>

        <button type="submit">Đăng ký</button>
    </form>
    </div>

<style>
    .card form label{display:block;margin:10px 0}
    .card input[type="text"], .card input[type="email"], .card select{
    width:90%;padding:10px;border:1px solid #ddd;border-radius:8px
    }
    .card button{margin-top:8px;padding:10px 12px;border:0;border-radius:10px;cursor:pointer}
    .card fieldset label{margin-right:12px}
</style>

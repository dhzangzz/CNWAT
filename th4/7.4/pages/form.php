<?php
// giữ lại giá trị khi quay lại form (từ GET)
$init = [
  'txtHoTen'     => $_GET['txtHoTen']     ?? '',
  'txtGioiThieu' => $_GET['txtGioiThieu'] ?? '',
  'txtTaiKhoan'  => $_GET['txtTaiKhoan']  ?? '',
  'txtMatKhau'   => $_GET['txtMatKhau']   ?? '',
  'rdGioiTinh'   => $_GET['rdGioiTinh']   ?? '',
  'chkDongY'     => isset($_GET['chkDongY']) ? '1' : '',
  'cboNghe'      => $_GET['cboNghe']      ?? '',
  // Skill bây giờ là checkbox list:
  'chkKyNang'    => $_GET['chkKyNang']    ?? [],    // <-- array
];
?>
<div class="card">
    <h2>GetForm</h2>
    <form method="get" action="/dauhuonggiang/th4/7.4/?page=process">
        <label>Họ và tên: 
        <input type="text" name="txtHoTen" value="<?= htmlspecialchars($init['txtHoTen']) ?>" required>
        </label>

        <label>Giới thiệu:
        <textarea name="txtGioiThieu" rows="3"><?= htmlspecialchars($init['txtGioiThieu']) ?></textarea>
        </label>

        <label>Tài khoản:
        <input type="text" name="txtTaiKhoan" value="<?= htmlspecialchars($init['txtTaiKhoan']) ?>" required>
        </label>

        <label>Mật khẩu:
        <input type="password" name="txtMatKhau" value="<?= htmlspecialchars($init['txtMatKhau']) ?>" required>
        </label>

        <fieldset style="border:0;margin:10px 0">
        <legend>Giới tính:</legend>
        <?php foreach(['Nữ','Nam','Khác'] as $g): ?>
            <label style="margin-right:12px">
            <input type="radio" name="rdGioiTinh" value="<?= $g ?>" <?= $init['rdGioiTinh']===$g?'checked':'' ?>> <?= $g ?>
            </label>
        <?php endforeach; ?>
        </fieldset>

        <label>Nghề nghiệp:
        <select name="cboNghe">
            <option value="">-- Chọn --</option>
            <?php foreach(['SV','Dev','Tester','Khác'] as $j): ?>
            <option value="<?= $j ?>" <?= $init['cboNghe']===$j?'selected':'' ?>><?= $j ?></option>
            <?php endforeach; ?>
        </select>
        </label>

        <fieldset style="border:0;margin:10px 0">
        <legend>Enable Programming Language:</legend>
        <?php foreach(['PHP','C#','Java','C++'] as $s): ?>
            <label style="display:inline-block;margin:4px 12px 4px 0">
            <input type="checkbox" name="chkKyNang[]" value="<?= $s ?>" <?= in_array($s,$init['chkKyNang']??[],true)?'checked':'' ?>>
            <?= $s ?>
            </label>
        <?php endforeach; ?>
        </fieldset>

        <label style="display:inline-flex;gap:8px;align-items:center">
        <input type="checkbox" name="chkDongY" value="1" <?= $init['chkDongY']?'checked':'' ?>>
        Tôi đồng ý điều khoản
        </label>

        <div style="margin-top:10px;display:flex;gap:10px">
        <button type="submit">Gửi</button>
        <button type="reset">Huỷ</button>
        </div>
    </form>
</div>

<style>
.card form label{display:block;margin:10px 0}
.card input[type=text], .card input[type=password], .card textarea, .card select{
  width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;
}
.card button{padding:10px 12px;border:0;border-radius:10px;cursor:pointer}
</style>

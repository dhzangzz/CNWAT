<?php
// /dauhuonggiang/th4/7.3/pages/calculate2.php

$name  = $_POST['name']  ?? '';
$class = $_POST['class'] ?? '';
$m1    = $_POST['m1']    ?? '';
$m2    = $_POST['m2']    ?? '';
$m3    = $_POST['m3']    ?? '';
$submitted = ($_SERVER['REQUEST_METHOD']==='POST');

$errors = [];
$total  = null;

if ($submitted) {
    if ($name==='')  $errors[] = 'Họ và tên bắt buộc.';
    if ($class==='') $errors[] = 'Lớp bắt buộc.';

    // kiểm tra số cho M1–M3
    foreach (['m1'=>$m1,'m2'=>$m2,'m3'=>$m3] as $k=>$v) {
        if ($v==='')        $errors[] = strtoupper($k).' bắt buộc.';
        elseif (!is_numeric($v)) $errors[] = strtoupper($k).' phải là số.';
    }

    if (!$errors) {
        $m1=(float)$m1; $m2=(float)$m2; $m3=(float)$m3;
        $total = $m1 + $m2 + $m3;
    }
}
?>

<div class="card">
    <h2>Nhập điểm</h2>

    <?php if ($submitted && $errors): ?>
        <ul style="color:#b42318; margin:8px 0 12px">
        <?php foreach($errors as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post" action="">
        <input type="hidden" name="page" value="calculate2">

        <label>Họ và tên
        <input type="text" name="name" required value="<?= htmlspecialchars($name) ?>">
        </label>

        <label>Lớp
        <input type="text" name="class" required value="<?= htmlspecialchars($class) ?>">
        </label>

        <label>Điểm M1
        <input type="number" step="any" name="m1" required value="<?= htmlspecialchars($m1) ?>">
        </label>

        <label>Điểm M2
        <input type="number" step="any" name="m2" required value="<?= htmlspecialchars($m2) ?>">
        </label>

        <label>Điểm M3
        <input type="number" step="any" name="m3" required value="<?= htmlspecialchars($m3) ?>">
        </label>

        <label>Tổng điểm
        <input type="text" id="total" readonly value="<?= $total!==null ? $total : '' ?>">
        </label>

        <div style="margin-top:8px; display:flex; gap:10px">
        <button type="submit">OK</button>
        <button type="reset">Cancel</button>
        </div>
    </form>
</div>

<?php if ($submitted && !$errors): ?>
    <div class="card">
        <h3>Result</h3>
        <p>Họ và tên: <b><?= htmlspecialchars($name) ?></b></p>
        <p>Lớp: <b><?= htmlspecialchars($class) ?></b></p>
        <p>Tổng điểm: <b><?= $total ?></b></p>
    </div>
<?php endif; ?>

<script>
    // tự động tính tổng khi gõ M1–M3
    const m1 = document.querySelector('input[name="m1"]');
    const m2 = document.querySelector('input[name="m2"]');
    const m3 = document.querySelector('input[name="m3"]');
    const total = document.getElementById('total');

    function calc() {
        const a = parseFloat(m1.value), b = parseFloat(m2.value), c = parseFloat(m3.value);
        total.value = (!isNaN(a) && !isNaN(b) && !isNaN(c)) ? (a+b+c) : '';
    }
    [m1,m2,m3].forEach(el => el.addEventListener('input', calc));
    calc();
</script>

<style>
.card form label{display:block;margin:10px 0}
.card input[type=text], .card input[type=number]{
  width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;
}
.card button{padding:8px 12px; border:0; border-radius:10px; cursor:pointer}
</style>

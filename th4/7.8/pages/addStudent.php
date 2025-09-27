<?php
$csv = data_path('students.csv');
$msg = '';

if ($_SERVER['REQUEST_METHOD']==='POST') {
  $name  = trim($_POST['name'] ?? '');
  $class = trim($_POST['class'] ?? '');
  $m1    = (float)($_POST['m1'] ?? 0);
  $m2    = (float)($_POST['m2'] ?? 0);
  $m3    = (float)($_POST['m3'] ?? 0);

  if ($name==='' || $class==='') {
        $msg = 'Vui lòng nhập Họ tên và Lớp.';
    } else {
        $total = $m1 + $m2 + $m3;
        if (csv_append($csv, [$name,$class,$m1,$m2,$m3,$total])) {
        header('Location: ?page=listStudent'); exit;
        }
        $msg = 'Không ghi được file.';
    }
}
?>
<div class="card" style="max-width:560px">
    <h2>7.8 • addStudent (CSV)</h2>
    <?php if($msg): ?>
        <div style="background:#fee4e2;border:1px solid #fda29b;padding:8px 10px;border-radius:8px;margin-bottom:8px">
        <?= htmlspecialchars($msg) ?>
        </div>
    <?php endif; ?>
    <form method="post" style="display:grid;gap:10px">
        <label>Họ tên
        <input name="name" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px">
        </label>
        <label>Lớp
        <input name="class" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px">
        </label>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:10px">
        <label>M1 <input name="m1" type="number" step="any" value="0" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px"></label>
        <label>M2 <input name="m2" type="number" step="any" value="0" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px"></label>
        <label>M3 <input name="m3" type="number" step="any" value="0" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px"></label>
        </div>
        <div style="display:flex;gap:10px">
        <button type="submit" style="padding:10px 14px;border:0;border-radius:8px;background:#111;color:#fff">Thêm</button>
        <a href="?page=listStudent" style="padding:10px 14px;border:1px solid #ddd;border-radius:8px;text-decoration:none">Danh sách</a>
        </div>
    </form>
</div>

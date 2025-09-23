<?php
// nhận tham số GET để thấy ngay URL thay đổi
$a = isset($_GET['a']) ? (float)$_GET['a'] : null;
$b = isset($_GET['b']) ? (float)$_GET['b'] : null;
$r = null;
if ($a !== null && $b !== null) {
  $r = [
    'A + B' => $a + $b,
    'A − B' => $a - $b,
    'A × B' => $a * $b,
    'A ÷ B' => ($b == 0) ? 'Không chia cho 0' : ($a / $b),
  ];
}
?>
<div class="card">
    <h2>7.2 • Calculate</h2>
    <form method="get" action="">
        <input type="hidden" name="page" value="Calculate">
        <label>Số A
        <input type="number" name="a" step="any" value="<?= htmlspecialchars($_GET['a'] ?? '') ?>">
        </label>
        <label>Số B
        <input type="number" name="b" step="any" value="<?= htmlspecialchars($_GET['b'] ?? '') ?>">
        </label>
        <button type="submit">Tính</button>
    </form>

    <?php if ($r !== null): ?>
        <div class="card" style="margin-top:12px">
        <h3>Kết quả</h3>
        <p>A = <b><?= htmlspecialchars($a) ?></b>, B = <b><?= htmlspecialchars($b) ?></b></p>
        <ul style="margin:6px 0 0 18px">
            <?php foreach ($r as $k=>$v): ?>
            <li><?= $k ?> : <b><?= htmlspecialchars(is_numeric($v)? (string)$v : $v) ?></b></li>
            <?php endforeach; ?>
        </ul>
        </div>
    <?php endif; ?>
</div>

<style>
.card form label{display:block;margin:10px 0}
.card input[type="number"]{width:100%;padding:10px;border:1px solid #ddd;border-radius:8px}
.card button{margin-top:8px;padding:10px 12px;border:0;border-radius:10px;cursor:pointer}
</style>

<?php
$a = $_GET['a'] ?? ''; $b = $_GET['b'] ?? '';
$op = $_GET['op'] ?? 'add';
$result = null; $msg='';
if ($a!=='' && ($op==='fact' || $b!=='')) {
    $a = (float)$a; $b = ($op==='fact') ? null : (float)$b;
    switch ($op) {
        case 'add': $result = $a + $b; break;
        case 'sub': $result = $a - $b; break;
        case 'mul': $result = $a * $b; break;
        case 'div': $result = ($b==0) ? ($msg='Không chia cho 0') : $a/$b; break;
        case 'fact':
            if ($a<0 || floor($a)!=$a) $msg='Giai thừa cần số nguyên không âm';
        else { $f=1; for($i=2;$i<=$a;$i++) $f*=$i; $result=$f; }
        break;
    }
}
?>
<div class="card">
    <h2>Tính</h2>
    <form method="get" action="">
        <input type="hidden" name="page" value="calculate1">
        <label>A: <input type="number" name="a" step="any" value="<?= htmlspecialchars($_GET['a'] ?? '') ?>"></label>
        <label>B: <input type="number" name="b" step="any" value="<?= htmlspecialchars($_GET['b'] ?? '') ?>"></label>
        <label>
        Phép tính:
        <select name="op">
            <option value="add" <?= $op==='add'?'selected':'' ?>>A + B</option>
            <option value="sub" <?= $op==='sub'?'selected':'' ?>>A − B</option>
            <option value="mul" <?= $op==='mul'?'selected':'' ?>>A × B</option>
            <option value="div" <?= $op==='div'?'selected':'' ?>>A ÷ B</option>
            <option value="fact" <?= $op==='fact'?'selected':'' ?>>Giai thừa (chỉ A)</option>
        </select>
        </label>
        <button type="submit">Tính</button>
    </form>

    <?php if($msg): ?><p style="color:#b42318"><?= $msg ?></p><?php endif; ?>
    <?php if($result!==null && !$msg): ?>
        <p>Kết quả: <b><?= htmlspecialchars((string)$result) ?></b></p>
    <?php endif; ?>
</div>

<style>
.card form label{display:inline-flex;gap:6px;margin:10px 12px 0 0}
.card input, .card select{padding:8px;border:1px solid #ddd;border-radius:8px}
.card button{padding:8px 12px;border:0;border-radius:10px;cursor:pointer}
</style>

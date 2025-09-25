<?php
$a = isset($_GET['a'])? (float)$_GET['a'] : 1;
$b = isset($_GET['b'])? (float)$_GET['b'] : 2;
$c = isset($_GET['c'])? (float)$_GET['c'] : 1;
$sol = '';
if (isset($_GET['a'],$_GET['b'],$_GET['c'])) {
    if ($a == 0) {
        if ($b == 0) $sol = ($c==0)?'Vô số nghiệm':'Vô nghiệm';
        else $sol = 'x = ' . (-$c/$b);
    } else {
        $d = $b*$b - 4*$a*$c;
        if ($d < 0) $sol = 'Vô nghiệm';
        elseif ($d == 0) $sol = 'x = ' . (-$b/(2*$a));
        else {
        $x1 = (-$b + sqrt($d))/(2*$a);
        $x2 = (-$b - sqrt($d))/(2*$a);
        $sol = "x₁ = $x1 ; x₂ = $x2";
        }
    }
}
?>
<div class="card">
    <h2>Giải PT bậc hai</h2>
    <form method="get" action="">
        <input type="hidden" name="page" value="calculate2">
        <label>a: <input type="number" step="any" name="a" value="<?= $a ?>"></label>
        <label>b: <input type="number" step="any" name="b" value="<?= $b ?>"></label>
        <label>c: <input type="number" step="any" name="c" value="<?= $c ?>"></label>
        <button type="submit">Giải</button>
    </form>
    <?php if($sol!==''): ?><p>Kết luận: <b><?= $sol ?></b></p><?php endif; ?>
</div>

<style>
.card form label{display:inline-flex;gap:6px;margin-right:12px}
.card input{padding:8px;border:1px solid #ddd;border-radius:8px;width:120px}
.card button{padding:8px 12px;border:0;border-radius:10px;cursor:pointer}
</style>

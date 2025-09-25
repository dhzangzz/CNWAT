<?php
$rows = isset($_GET['rows']) ? max(1,(int)$_GET['rows']) : 4;
$cols = isset($_GET['cols']) ? max(1,(int)$_GET['cols']) : 4;
?>
<div class="card">
    <h2>Draw Table</h2>
    <form method="get" action="">
        <input type="hidden" name="page" value="drawTable">
        <label>R: <input type="number" name="rows" min="1" value="<?= $rows ?>"></label>
        <label>C: <input type="number" name="cols" min="1" value="<?= $cols ?>"></label>
        <button type="submit">Vẽ</button>
    </form>
</div>

<div class="card" style="overflow:auto">
    <table class="table">
        <tbody>
        <?php for ($r=1;$r<=$rows;$r++): ?>
            <tr>
            <?php for ($c=1;$c<=$cols;$c++): ?>
                <td>
                <?php if ($c <= $r) echo $c; /* chỉ in 1..r ở hàng r, còn lại để trống */ ?>
                </td>
            <?php endfor; ?>
            </tr>
        <?php endfor; ?>
        </tbody>
    </table>
</div>

<style>
.card form label{margin-right:12px;display:inline-flex;gap:6px;align-items:center}
.card input[type=number]{width:90px;padding:8px;border:1px solid #ddd;border-radius:8px}
.card button{padding:8px 12px;border:0;border-radius:10px;cursor:pointer}
</style>

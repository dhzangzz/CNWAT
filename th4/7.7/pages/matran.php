<?php
$size = 3;

// tạo giá trị mặc định cho form
if ($_SERVER['REQUEST_METHOD']!=='POST'){
  $_POST = [];
  for($i=0;$i<$size;$i++) for($j=0;$j<$size;$j++){
    $_POST["a_{$i}_{$j}"] = ($i==$j)?1:0;     // A mặc định: ma trận đơn vị
    $_POST["b_{$i}_{$j}"] = ($i+1);           // B mặc định: hàng i toàn (i+1)
  }
}

$act = $_POST['act'] ?? '';
$A   = readMatrix('a', $size);
$B   = readMatrix('b', $size);

$val = null; $M = null;

switch ($act) {
  case 'min':   $val = minMaTran($A); break;
  case 'max':   $val = maxMaTran($A); break;
  case 'sumCC': $val = tongTrenCheoChinh($A); break;
  case 'sumCP': $val = tongTrenCheoPhu($A); break;
  case 'add':   $M   = tinhMaTranTong($A,$B); break;
  case 'mul':   $M   = tinhMaTranTich($A,$B); break;
}
?>
<div class="card">
    <h2>7.7 • Ma trận 2 chiều (<?= $size ?>×<?= $size ?>)</h2>
    <form method="post">
        <input type="hidden" name="page" value="matrix">

        <div class="grid2">
        <div>
            <h3>Ma trận A</h3>
            <table class="table">
            <?php for($i=0;$i<$size;$i++): ?><tr>
                <?php for($j=0;$j<$size;$j++): ?>
                <td><input name="a_<?= $i ?>_<?= $j ?>" type="number"
                            value="<?= htmlspecialchars($_POST["a_{$i}_{$j}"] ?? 0) ?>"
                            style="width:80px;padding:6px;border:1px solid #ddd;border-radius:6px"></td>
                <?php endfor; ?>
            </tr><?php endfor; ?>
            </table>
        </div>
        <div>
            <h3>Ma trận B</h3>
            <table class="table">
            <?php for($i=0;$i<$size;$i++): ?><tr>
                <?php for($j=0;$j<$size;$j++): ?>
                <td><input name="b_<?= $i ?>_<?= $j ?>" type="number"
                            value="<?= htmlspecialchars($_POST["b_{$i}_{$j}"] ?? 0) ?>"
                            style="width:80px;padding:6px;border:1px solid #ddd;border-radius:6px"></td>
                <?php endfor; ?>
            </tr><?php endfor; ?>
            </table>
        </div>
        </div>

        <div style="display:flex;flex-wrap:wrap;gap:8px;margin-top:12px">
        <button name="act" value="min">Min(A)</button>
        <button name="act" value="max">Max(A)</button>
        <button name="act" value="sumCC">Tổng chéo chính A</button>
        <button name="act" value="sumCP">Tổng chéo phụ A</button>
        <button name="act" value="add">A + B</button>
        <button name="act" value="mul">A × B</button>
        </div>
    </form>
</div>

<?php if ($val!==null || $M!==null): ?>
    <div class="card">
        <h3>Kết quả</h3>
        <?php if ($val!==null): ?><p><b>Giá trị:</b> <?= $val ?></p><?php endif; ?>
        <?php if ($M!==null): ?>
        <table class="table">
            <?php foreach($M as $row): ?><tr>
            <?php foreach($row as $x): ?><td><?= $x ?></td><?php endforeach; ?>
            </tr><?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
<?php endif; ?>

<style>
.grid2{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}
</style>

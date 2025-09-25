<?php
$size = 3;                  // 3x3 theo đề
$show = ($_SERVER['REQUEST_METHOD']==='POST');  // chỉ hiện kết quả sau khi bấm Tính

// helper lấy giá trị ô
function val($name,$i,$j,$def=''){
  $key = "{$name}_{$i}_{$j}";
  return $_POST[$key] ?? $def;
}
?>
<div class="card">
    <h2>Tổng hai ma trận</h2>
    <form method="post" action="">
        <input type="hidden" name="page" value="array1">

        <div class="grid2">
        <div>
            <h3>Nhập Ma trận 1</h3>
            <table class="table">
            <?php for($i=0;$i<$size;$i++): ?><tr>
                <?php for($j=0;$j<$size;$j++): ?>
                <td>
                    <input type="number" name="a_<?= $i ?>_<?= $j ?>"
                    value="<?= htmlspecialchars(val('a',$i,$j, $i+1)) ?>"
                    style="width:80px;padding:6px;border:1px solid #ddd;border-radius:6px">
                </td>
                <?php endfor; ?>
            </tr><?php endfor; ?>
            </table>
        </div>

        <div>
            <h3>Nhập Ma trận 2</h3>
            <table class="table">
            <?php for($i=0;$i<$size;$i++): ?><tr>
                <?php for($j=0;$j<$size;$j++): ?>
                <td>
                    <input type="number" name="b_<?= $i ?>_<?= $j ?>"
                    value="<?= htmlspecialchars(val('b',$i,$j, 0)) ?>"
                    style="width:80px;padding:6px;border:1px solid #ddd;border-radius:6px">
                </td>
                <?php endfor; ?>
            </tr><?php endfor; ?>
            </table>
        </div>
        </div>

        <div style="margin-top:12px">
        <button type="reset">Nhập lại</button>
        <button type="submit">Tính</button>
        </div>
    </form>
</div>

<?php if ($show): ?>
    <?php
        // tính tổng
        $sum = [];
        for($i=0;$i<$size;$i++){
        for($j=0;$j<$size;$j++){
            $sum[$i][$j] = (float)val('a',$i,$j,0) + (float)val('b',$i,$j,0);
        }
        }
    ?>
    <div class="card">
        <h3>KẾT QUẢ</h3>
        <p><b>Ma trận Tổng:</b></p>
        <table class="table">
        <?php for($i=0;$i<$size;$i++): ?><tr>
            <?php for($j=0;$j<$size;$j++): ?>
            <td><?= $sum[$i][$j] ?></td>
            <?php endfor; ?>
        </tr><?php endfor; ?>
        </table>
    </div>
<?php endif; ?>

<style>
.grid2{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}
button{padding:8px 12px;border:0;border-radius:10px;cursor:pointer}
</style>

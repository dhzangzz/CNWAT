<?php
$raw = $_POST['arr'] ?? '1, 5, 2, 9, 5, 3';
$a   = parseArray($raw);
$action = $_POST['act'] ?? '';

$result = null; $list = null;

if ($action==='min')  $result = minDay($a);
if ($action==='max')  $result = maxDay($a);
if ($action==='avg')  $result = avgDay($a);
if ($action==='max2') $result = max2Day($a);
if ($action==='sort') $list   = sortDay($a);
if ($action==='rev')  $list   = daoNguocDay($a);
?>
<div class="card">
    <h2>7.7 • Mảng 1 chiều</h2>
    <form method="post" style="display:grid;gap:10px">
        <label>Dãy số (ngăn cách bằng dấu phẩy / khoảng trắng)
        <input name="arr" type="text" value="<?= htmlspecialchars($raw) ?>"
                style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px">
        </label>
        <div style="display:flex;flex-wrap:wrap;gap:8px">
        <button name="act" value="min">Min</button>
        <button name="act" value="max">Max</button>
        <button name="act" value="avg">Avg</button>
        <button name="act" value="max2">Max thứ 2</button>
        <button name="act" value="sort">Sắp tăng</button>
        <button name="act" value="rev">Đảo ngược</button>
        </div>
    </form>
</div>

<?php if ($result!==null || $list!==null): ?>
    <div class="card">
        <h3>Kết quả</h3>
        <?php if ($result!==null): ?>
        <p><b><?= htmlspecialchars($action) ?>:</b> <?= $result ?></p>
        <?php endif; ?>
        <?php if ($list!==null): ?>
        <p><b>Mảng:</b> <?= implode(', ', $list) ?></p><!--noi mang thanh chuoi, cach nhau boi dau ,-->
        <?php endif; ?>
    </div>
<?php endif; ?>

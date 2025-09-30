<?php
$csv = data_path('students.csv');

//isset: kiem tra xem co ton tai hay khong
if (isset($_POST['del'])) {
    $idx = (int)($_POST['idx'] ?? -1);//index tu input, ko co thi -1, chua vi tri cua dong can xoa
    $rows = csv_read($csv);
    if (isset($rows[$idx])) { //index ton tai
        array_splice($rows,$idx,1); csv_write_all($csv,$rows); }//xoa dong
    header('Location: ?page=listStudent'); exit;
}

$rows = csv_read($csv);
?>
<div class="card">
    <h2>7.8 • listStudent (CSV)</h2>
    <p><a class="linkcard" href="?page=addStudent" style="padding:10px 14px;border:1px solid #ddd;border-radius:8px;text-decoration:none">+ Thêm sinh viên</a></p>

    <?php if(!$rows): ?>
        <p><i>Chưa có dữ liệu. Vào “Thêm sinh viên” để ghi dòng đầu tiên.</i></p>
    <?php else: ?>
        <table class="table">
        <thead>
            <tr>
            <th>#</th><th>Họ tên</th><th>Lớp</th>
            <th>M1</th><th>M2</th><th>M3</th><th>Tổng</th><th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($rows as $i=>$r): ?>
            <tr>
            <td><?= $i+1 ?></td>
            <td><?= htmlspecialchars($r[0] ?? '') ?></td>
            <td><?= htmlspecialchars($r[1] ?? '') ?></td>
            <td><?= htmlspecialchars($r[2] ?? 0) ?></td>
            <td><?= htmlspecialchars($r[3] ?? 0) ?></td>
            <td><?= htmlspecialchars($r[4] ?? 0) ?></td>
            <td><b><?= htmlspecialchars($r[5] ?? 0) ?></b></td>
            <td style="white-space:nowrap">
                <form method="post" style="display:inline" onsubmit="return confirm('Xoá dòng này?')">
                <input type="hidden" name="idx" value="<?= $i ?>">
                <button name="del" value="1" style="padding:4px 10px;border:1px solid #ddd;border-radius:6px;background:#fff">Xoá</button>
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    <?php endif; ?>
</div>

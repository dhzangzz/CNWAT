<?php $rows = read_all(); ?>
<div class="card">
    <nav class="subnav">
        <a class="<?= ($PAGE??($_GET['page']??''))==='home' ? 'active' : '' ?>" href="?page=home">Home</a>
        <a class="<?=
            in_array(($PAGE??($_GET['page']??'')), ['list','detail','edit','delete'], true)
            ? 'active' : '' ?>" href="?page=list">List</a>
        <a class="<?= ($PAGE??($_GET['page']??''))==='add'  ? 'active' : '' ?>" href="?page=add">Add</a>
    </nav>
    <h2>Danh sách sinh viên</h2>

    <?php if(!$rows): ?>
        <p><i>Chưa có dữ liệu. Vào Add để thêm sinh viên.</i></p>
    <?php else: ?>
        <table class="table">
        <thead>
            <tr><th>STT</th><th>Tên</th><th>Ngày sinh</th><th>Địa chỉ</th><th>Ảnh</th><th>Lớp</th><th>Thao tác</th></tr>
        </thead>
        <tbody>
        <?php foreach($rows as $i=>$r): [$id,$name,$dob,$addr,$img,$class] = $r; ?>
            <tr>
            <td><?= $i+1 ?></td>
            <td><?= htmlspecialchars($name) ?></td>
            <td><?= htmlspecialchars($dob) ?></td>
            <td><?= htmlspecialchars($addr) ?></td>
            <td>
                <?php if($img && is_file(__DIR__.'/../uploads/'.$img)): ?>
                <img src="/dauhuonggiang/th4/7.9/uploads/<?= htmlspecialchars($img) ?>" style="height:40px;border-radius:6px;border:1px solid #eee">
                <?php else: ?><span style="color:#888">—</span><?php endif; ?>
            </td>
            <td><?= htmlspecialchars($class) ?></td>
            <td style="white-space:nowrap">
                <a href="?page=detail&id=<?= $id ?>">Detail</a> |
                <a href="?page=edit&id=<?= $id ?>">Edit</a> |
                <a href="?page=delete&id=<?= $id ?>" onclick="return confirm('Xoá sinh viên #<?= $id ?>?')">Delete</a>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    <?php endif; ?>
</div>

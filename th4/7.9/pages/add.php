<?php
$msg = '';
if ($_SERVER['REQUEST_METHOD']==='POST') {//trim() loai bo khoang trang
    $name  = trim($_POST['name'] ?? '');//lay gia tri tu input
    $dob   = trim($_POST['dob'] ?? '');
    $addr  = trim($_POST['addr'] ?? '');
    $class = trim($_POST['class'] ?? '');
    $img   = handle_upload($_FILES['image'] ?? null); //handle_upload: xu ly upload

    if ($name==='' || $dob==='' || $class==='') {//validate
        $msg = 'Họ tên, ngày sinh, lớp là bắt buộc.';
    } else {
        $rows = read_all();//doc tu csv
        $id   = next_id($rows);//tao moi id
        $rows[] = [$id,$name,$dob,$addr,$img ?? '',$class];
        write_all($rows);
        header('Location: ?page=list'); exit;//chuyen huong ve list
    }
}
?>
<div class="card" style="max-width:640px">
    <nav class="subnav">
        <a class="<?= ($PAGE??($_GET['page']??''))==='home' ? 'active' : '' ?>" href="?page=home">Home</a>
        <a class="<?=
            in_array(($PAGE??($_GET['page']??'')), ['list','detail','edit','delete'], true)
            ? 'active' : '' ?>" href="?page=list">List</a>
        <a class="<?= ($PAGE??($_GET['page']??''))==='add'  ? 'active' : '' ?>" href="?page=add">Add</a>
    </nav>

    <h2>Thêm sinh viên mới</h2>
    <?php if($msg): ?><!--thong bao loi-->
        <div style="background:#fee4e2;border:1px solid #fda29b;padding:8px 10px;border-radius:8px;margin-bottom:8px"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data" style="display:grid;gap:10px"><!--multipart: upload file-->
        <label>Full name <input name="name" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px"></label>
        <label>Birthday <input name="dob" type="date" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px"></label>
        <label>Address <input name="addr" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px"></label>
        <label>Image <input type="file" name="image" accept="image/*"></label>
        <label>Class <input name="class" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px"></label>
        <div style="display:flex;gap:10px">
        <button type="submit" style="padding:10px 14px;border:0;border-radius:8px;background:#111;color:#fff">Lưu</button>
        <button type="reset"  style="padding:10px 14px;border:1px solid #ddd;border-radius:8px;background:#fff">Nhập lại</button>
        </div>
    </form>
</div>

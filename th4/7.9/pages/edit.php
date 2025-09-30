<?php
$id  = (int)($_GET['id'] ?? 0);//id mac dinh
$rows = read_all();
$pos = -1; //dong
$sv=null;//noi dung dong do
//duyet qua tung dong
foreach($rows as $i=>$r) if ((int)$r[0]===$id){ $pos=$i; $sv=$r; break; }//luu dong & noi dung
if($pos<0){ echo '<div class="card">Không tìm thấy.</div>'; return; }

[$id,$name,$dob,$addr,$img,$class] = $sv;
$msg='';

if ($_SERVER['REQUEST_METHOD']==='POST') {
  $name  = trim($_POST['name'] ?? '');
  $dob   = trim($_POST['dob'] ?? '');
  $addr  = trim($_POST['addr'] ?? '');
  $class = trim($_POST['class'] ?? '');
  $newImg = handle_upload($_FILES['image'] ?? null);
  if ($newImg) $img = $newImg; // cập nhật ảnh nếu có

  if ($name==='' || $dob==='' || $class==='') $msg='Thiếu trường bắt buộc.';
  else {
    $rows[$pos] = [$id,$name,$dob,$addr,$img,$class];
    write_all($rows);
    header('Location: ?page=detail&id='.$id); exit;
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
    <h2>Chỉnh sửa sinh viên #<?= $id ?></h2>
    <?php if($msg): ?>
        <div style="background:#fee4e2;border:1px solid #fda29b;padding:8px 10px;border-radius:8px;margin-bottom:8px"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data" style="display:grid;gap:10px">
        <label>Full name <input name="name" value="<?= htmlspecialchars($name) ?>" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px"></label>
        <label>Birthday <input name="dob" type="date" value="<?= htmlspecialchars($dob) ?>" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px"></label>
        <label>Address <input name="addr" value="<?= htmlspecialchars($addr) ?>" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px"></label>
        <div>
        Ảnh hiện tại:
        <?php if($img && is_file(__DIR__.'/../uploads/'.$img)): ?>
            <img src="/dauhuonggiang/th4/7.9/uploads/<?= htmlspecialchars($img) ?>" style="height:60px;border:1px solid #eee;border-radius:6px">
        <?php else: ?><i>—</i><?php endif; ?>
        </div>
        <label>Ảnh mới (tuỳ chọn) <input type="file" name="image" accept="image/*"></label>
        <label>Class <input name="class" value="<?= htmlspecialchars($class) ?>" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px"></label>
        <div style="display:flex;gap:10px">
        <button type="submit" style="padding:10px 14px;border:0;border-radius:8px;background:#111;color:#fff">Cập nhật</button>
        <a href="?page=detail&id=<?= $id ?>" style="padding:10px 14px;border:1px solid #ddd;border-radius:8px;text-decoration:none">Huỷ</a>
        </div>
    </form>
</div>

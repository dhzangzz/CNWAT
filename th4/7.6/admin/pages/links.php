<?php
// Cookie helpers
function read_links(): array {
  $json = $_COOKIE['fav_links'] ?? '[]';
  $data = json_decode($json, true);
  return is_array($data) ? $data : [];
}
function write_links(array $arr): void {
  $json = json_encode($arr, JSON_UNESCAPED_UNICODE);
  // sống 30 ngày, path toàn site để End user cũng có thể đọc nếu muốn
  setcookie('fav_links', $json, time()+30*24*3600, '/');
}

// xử lý thêm/xoá/clear
$links = read_links();
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (isset($_POST['add'])) {
        $title = trim($_POST['title'] ?? '');
        $url   = trim($_POST['url'] ?? '');
        if ($title!=='' && filter_var($url, FILTER_VALIDATE_URL)) {
        $links[] = ['title'=>$title, 'url'=>$url];
        write_links($links);
        header('Location: ?page=links'); exit;
        }
        $err = 'Tiêu đề trống hoặc URL không hợp lệ.';
    }
    if (isset($_POST['del'])) {
        $idx = (int)($_POST['idx'] ?? -1);
        if (isset($links[$idx])) {
        array_splice($links, $idx, 1);
        write_links($links);
        }
        header('Location: ?page=links'); exit;
    }
    if (isset($_POST['clear'])) {
        $links = [];
        write_links($links);
        header('Location: ?page=links'); exit;
    }
}
?>
<div class="card">
    <h2>Quản lý link ưa thích (Cookie)</h2>

    <?php if (!empty($err)): ?>
        <div style="background:#fee4e2;border:1px solid #fda29b;padding:8px 10px;border-radius:8px;margin-bottom:8px">
        <?= htmlspecialchars($err) ?>
        </div>
    <?php endif; ?>

    <form method="post" style="display:grid;gap:10px;margin-bottom:12px">
        <label>Tiêu đề
        <input name="title" type="text" required
                style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px">
        </label>
        <label>URL
        <input name="url" type="url" required placeholder="https://…"
                style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px">
        </label>
        <div style="display:flex;gap:10px">
        <button name="add"   value="1" style="padding:10px 14px;border:0;border-radius:8px;background:#111;color:#fff;cursor:pointer">Thêm</button>
        <button name="clear" value="1" style="padding:10px 14px;border:1px solid #ddd;border-radius:8px;background:#fff;cursor:pointer">Xoá hết</button>
        </div>
    </form>

    <div class="card" style="background:#fafafa">
        <h3 style="margin-top:0">Danh sách hiện tại (<?= count($links) ?>)</h3>
        <?php if (!$links): ?>
        <p>Chưa có link nào.</p>
        <?php else: ?>
        <ul style="margin:0;padding-left:18px;line-height:1.8">
            <?php foreach($links as $i=>$it): ?>
            <li>
                <a href="<?= htmlspecialchars($it['url']) ?>" target="_blank">
                <?= htmlspecialchars($it['title']) ?>
                </a>
                <form method="post" style="display:inline;margin-left:8px">
                <input type="hidden" name="idx" value="<?= $i ?>">
                <button name="del" value="1" style="padding:2px 8px;border:1px solid #ddd;border-radius:6px;background:#fff;cursor:pointer">Xoá</button>
                </form>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>

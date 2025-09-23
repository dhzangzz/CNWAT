<?php
// /dauhuonggiang/th4/_app/boot.php
// Sửa BASE_URL nếu thư mục gốc đổi tên
define('BASE_URL', '/dauhuonggiang/th4');

// helper tạo URL tuyệt đối trong TH4
function th4_url(string $path = ''): string {
  $path = ltrim($path, '/');
  return rtrim(BASE_URL,'/') . '/' . $path;
}

// helper nạp file an toàn
function safe_include(string $file): void {
  if (is_file($file)) { include $file; }
  else { echo '<div class="card"><h2>Chưa có nội dung</h2></div>'; }
}

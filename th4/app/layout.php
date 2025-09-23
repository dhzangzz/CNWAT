<?php
// /dauhuonggiang/th4/_app/layout.php
// đặt ngay đầu th4/app/layout.php (tạm thời)
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/boot.php';

/** Biến vào từ index.php của từng mục:
 * $SECTION  = '7.2' | '7.3' | '7.1'
 * $PAGE     = 'home' | 'register' | ...
 * $TITLE    = 'Thực hành 4 • '.$SECTION
 * $FILE     = đường dẫn tuyệt đối tới file trang (đã whitelist)
 */
?><!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title><?= htmlspecialchars($TITLE ?? 'Thực hành 4') ?></title>
  <link rel="stylesheet" href="/dauhuonggiang/css/style.css">
</head>
<body class="home">

  <?php include __DIR__.'/header.php'; ?>   <!-- Banner trên topbar -->
  <?php include __DIR__.'/topbar.php'; ?>   <!-- TH2..TH6 -->

  <div class="shell">
    <div class="main">
      <?php include __DIR__.'/sidebar.php'; ?>  <!-- Menu TH4 -->
      <main class="content">
        <?php safe_include($FILE ?? ''); ?>
      </main>
    </div>
  </div>

  <?php include __DIR__.'/footer.php'; ?>
</body>
</html>

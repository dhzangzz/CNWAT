<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/boot.php';

?><!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title><?= htmlspecialchars($TITLE ?? 'Thực hành 4') ?></title>
  <link rel="stylesheet" href="/dauhuonggiang/css/style.css">
</head>
<body class="home">

  <?php include __DIR__.'/header.php'; ?>  
  <?php include __DIR__.'/topbar.php'; ?> 
  <div class="shell">
    <div class="main">
      <?php include __DIR__.'/sidebar.php'; ?>  
      <main class="content">
        <?php safe_include($FILE ?? ''); ?>
      </main>
    </div>
  </div>

  <?php include __DIR__.'/footer.php'; ?>
</body>
</html>

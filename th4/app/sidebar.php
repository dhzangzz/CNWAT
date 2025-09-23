<?php $curSec = $SECTION ?? ''; $curPage = $PAGE ?? '';// /dauhuonggiang/th4/_app/sidebar.php ?>
<aside class="sidebar">
  <div class="profile card">
    <img class="avatar" src="/dauhuonggiang/img/avatar.jpg" alt="Avatar">
    <div class="name">Đậu Hương Giang</div>
    <div class="msv">MSV: AT190216</div>
    <div class="school">Học viện Kĩ thuật mật mã</div>
  </div>

  <nav class="vnav" style="margin-top:12px">

    <a href="/dauhuonggiang/th4/?page=landing">Trang chủ TH4</a>

  <!-- 7.1 -->
    <a class="<?= ($curSec==='7.1' && $curPage==='home') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.1/?page=home">7.1 • Template</a>
    <a class="<?= ($curSec==='7.1' && $curPage==='login') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.1/?page=login">7.1 • Login</a>

  <!-- 7.2 -->
    <a class="<?= ($curSec==='7.2' && $curPage==='Register') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.2/?page=Register">7.2 • Register</a>
    <a class="<?= ($curSec==='7.2' && $curPage==='ResultRegister') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.2/?page=ResultRegister">7.2 • ResultRegister</a>
    <a class="<?= ($curSec==='7.2' && $curPage==='Calculate') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.2/?page=Calculate">7.2 • Calculate</a>

  <!-- 7.3 -->
    <a class="<?= ($curSec==='7.3' && $curPage==='home') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.3/?page=home">7.3 • Home</a>
    <a class="<?= ($curSec==='7.3' && $curPage==='DrawTable') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.3/?page=drawTable">7.3 • DrawTable</a>
    <a class="<?= ($curSec==='7.3' && $curPage==='Loop') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.3/?page=loop">7.3 • Loop</a>
    <a class="<?= ($curSec==='7.3' && $curPage==='Calculate1') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.3/?page=calculate1">7.3 • Calculate1</a>
    <a class="<?= ($curSec==='7.3' && $curPage==='Calculate2') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.3/?page=calculate2">7.3 • Calculate2</a>
    <a class="<?= ($curSec==='7.3' && $curPage==='Array1') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.3/?page=array1">7.3 • Array1</a>
    <a class="<?= ($curSec==='7.3' && $curPage==='UploadForm') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.3/?page=uploadform">7.3 • UploadForm</a>
    <a class="<?= ($curSec==='7.3' && $curPage==='UploadProcess') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.3/?page=uploadprocess">7.3 • UploadProcess</a>

  </nav>
</aside>

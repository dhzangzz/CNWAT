<?php $curSec = $SECTION ?? ''; $curPage = $PAGE ?? '';// /dauhuonggiang/th4/_app/sidebar.php ?>
<aside class="sidebar">
  <div class="profile card">
    <img class="avatar" src="/dauhuonggiang/img/avatar.jpg" alt="Avatar">
    <div class="name">Đậu Hương Giang</div>
    <div class="msv">MSV: AT190216</div>
    <div class="school">Học viện Kĩ thuật mật mã</div>
  </div>

  <nav class="vnav th4-menu" style="margin-top:12px">
  <!-- 7.1 -->
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
  
  <!-- 7.4 -->
    <a class="<?= ($SECTION==='7.4' && ($PAGE??'')==='form') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.4/?page=form">7.4 • GetForm</a>

  <!-- 7.5 -->
    <a class="<?= ($curSec==='7.5' && $curPage==='user')  ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.5/">7.5 • Session (User)</a>
    <a class="<?= ($curSec==='7.5' && $curPage==='admin') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.5/admin/">7.5 • Session (Admin)</a>
  <!-- 7.6 -->
    <a class="<?= ($curSec==='7.6' && $curPage==='user')  ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.6/?page=login">7.6 • Cookie (User)</a>
    <a class="<?= ($curSec==='7.6' && $curPage==='admin') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.6/admin/?page=home">7.6 • Cookie (Admin)</a>
  <!-- 7.7 -->
    <a class="<?= ($curSec==='7.7' && $curPage==='ar1') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.7/?page=ar1">7.7 • Mảng 1 chiều</a>
    <a class="<?= ($curSec==='7.7' && $curPage==='matrix') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.7/?page=matrix">7.7 • Ma trận</a>
  <!-- 7.8 -->
    <a class="<?= ($curSec==='7.8' && $PAGE==='listStudent') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.8/?page=listStudent">7.8 • listStudent</a>
    <a class="<?= ($curSec==='7.8' && $PAGE==='addStudent') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.8/?page=addStudent">7.8 • addStudent</a>
  <!-- 7.9 -->
    <a class="<?= ($curSec==='7.9' && $curPage==='home') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.9/?page=home">7.9 • Home</a>
    <a class="<?= ($curSec==='7.9' && in_array($curPage, ['list','detail','edit','delete'], true)) ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.9/?page=list">7.9 • List</a>
    <a class="<?= ($curSec==='7.9' && $curPage==='add') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.9/?page=add">7.9 • Add</a>
  <!-- 7.10 -->
    <a class="<?= ($SECTION==='7.10' && $PAGE==='home') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.10/?page=home">7.10 • Home (Lang)</a>
    <a class="<?= ($SECTION==='7.10' && $PAGE==='contact') ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.10/?page=contact">7.10 • Contact (Lang)</a>
  <!-- 7.11 -->
    <a class="<?= ($SECTION==='7.11' && str_starts_with($PAGE??'', 'lop_')) ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.11/?page=lop_list">7.11 • Lớp</a>
    <a class="<?= ($SECTION==='7.11' && str_starts_with($PAGE??'', 'hoso_')) ? 'active' : '' ?>" href="/dauhuonggiang/th4/7.11/?page=hoso_list">7.11 • Hồ sơ</a>

  </nav>
</aside>

<?php
$_SESSION = [];//xoa session trong bo nho
if (ini_get('session.use_cookies')) {
    $p = session_get_cookie_params();//lay thong tin cookie
    setcookie(session_name(), '', time()-42000, $p['path'],$p['domain'],$p['secure'],$p['httponly']);
}//xoa session cookie tren trinh duyet
session_destroy();//huy session
header('Location: /dauhuonggiang/th4/7.6/');
exit;

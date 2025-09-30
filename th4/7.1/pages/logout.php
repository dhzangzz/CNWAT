<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$_SESSION = [];
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();//lay thong tin cookie
  setcookie(session_name(), '', time()-42000,
    $params["path"], $params["domain"], $params["secure"], $params["httponly"]
  );//xoa session cookie tren trinh duyet
}
session_destroy();
header('Location: /dauhuonggiang/th4/7.1/?page=login');
exit;
                                                          
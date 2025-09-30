<?php
require_once __DIR__.'/../models/LopModel.php';
//url co ma lop->xoa
if (!empty($_GET['malop'])) lop_delete($_GET['malop']);
header('Location: ?page=lop_list');

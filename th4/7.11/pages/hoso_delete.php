<?php
require_once __DIR__.'/../models/HosoModel.php';
if (!empty($_GET['mahs'])) hoso_delete($_GET['mahs']);
header('Location: ?page=hoso_list');

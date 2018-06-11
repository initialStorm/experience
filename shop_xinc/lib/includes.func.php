<?php
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_get("PRC");
session_start();
define("ROOT",dirname(dirname(__FILE__)));
set_include_path(".".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."lib".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."core".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."configs".PATH_SEPARATOR.get_include_path()); 
include_once 'common.func.php';
include_once 'mysql.func.php';
include_once 'img.func.php';
include_once 'string.func.php';
include_once 'page.func.php';
include_once 'upload.func.php';
include_once 'configs.php';
include_once 'admin.inc.php';
include_once 'cate.inc.php';
include_once 'products.inc.php';
include_once 'photo.inc.php';
//echo  ".".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."lib".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."core".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."configs".PATH_SEPARATOR.get_include_path();
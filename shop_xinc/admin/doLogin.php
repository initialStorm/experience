<?php
include_once '../lib/includes.func.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$auto_flag = $_POST['autoflag'];
$sql="select * from shop_admin where userName='{$username}' and passWord='{$password}'";
if($row = checkAdmin($sql)){
    //有自动登录
    if($auto_flag){
        setcookie("adminId",$row['id'],time()+7*24*3600);
        setcookie("adminName",$row['userName'],time()+7*24*3600);
    }
    $_SESSION['adminName']=$row['userName'];
    $_SESSION['adminId']=$row['id'];
    alertMessage("登录成功", "index.php");
}else{
    alertMessage("登录失败,重新登录", "login_admin.php");
}
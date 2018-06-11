<?php
include_once '../lib/includes.func.php';
$act=$_REQUEST['act'];
if($act == "logout"){
    logout();
}elseif ($act == "addAdmin") {
    $mes = addAdmin();
}elseif($act == "editAdmin"){
    $id=$_REQUEST['id'];
    $mes = editAdmin($id);
}elseif($act=="delAdmin"){
    $id=$_REQUEST['id'];
    $mes = delAdmin($id);
}elseif($act == "addCate"){
     $mes = addCate();
}elseif($act == "editCate"){
    $id=$_REQUEST['id'];
     $mes = editCate($id);
}elseif($act=="delCate"){
    $id=$_REQUEST['id'];
    $mes = delCate($id);
}elseif($act=="addPro"){
    $mes = addPro();
}elseif($act=="editPro"){
    $id=$_REQUEST['id'];
    $mes = editPro($id);
}elseif($act=="delPro"){
    $id=$_REQUEST['id'];
    $mes = delPro($id);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if($mes)
                echo $mes;
        ?>
    </body>
</html>
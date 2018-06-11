<?php
include_once '../lib/includes.func.php';
    $id=$_REQUEST['id'];
    $sql="select * from shop_admin where id='{$id}'";
    $row = fetchOne($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>编辑管理员</h3>
        <form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" method="post">
            <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
                <tr>
                    <td align="center">管理员名称</td>
                    <td><input type="text" name="username" placeholder="<?php echo $row['userName']?>"/></td>
                </tr>
                <tr>
                    <td align="center">管理员密码</td>
                    <td><input type="password" name="password" placeholder="新密码不能为空"/></td>
                </tr>
                <tr>
                    <td align="center">管理员邮箱</td>
                    <td><input type="text" name="email" placeholder="<?php echo $row['email']?>"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="right"><input type="submit"  value="编辑管理员"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>



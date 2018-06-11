<?php
include_once '../lib/includes.func.php';
    $id=$_REQUEST['id'];
    $sql="select * from cate where id='{$id}'";
    $row = fetchOne($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
<body>
    <h3>修改分类</h3>
    <form action="doAdminAction.php?act=editCate&id=<?php echo $row['id'];?>" method="post">
        <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
            <tr>
                <td align="right">分类名称</td>
                <td><input type="text" name="cateName" placeholder="<?php echo $row['cateName'];?>"/></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><input type="submit"  value="修改分类"/></td>
            </tr>

        </table>
    </form>
</body>
</html>


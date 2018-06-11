<!DOCTYPE html>
<html>
    <head>
        <title>supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h3 style="margin: 20px auto;text-align: center">系统信息</h3>
        <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc" style="margin: 0 auto;">
            <tr>
                <th>操作系统</th>
                <td><?php echo PHP_OS;?></td>
            </tr>
            <tr>
                <th>Apache版本</th>
                <td><?php echo apache_get_version();?></td>
            </tr>
            <tr>
                <th>PHP版本</th>
                <td><?php echo PHP_VERSION;?></td>
            </tr>
            <tr>
                <th>运行方式</th>
                <td><?php echo PHP_SAPI;?></td>
            </tr>
        </table>
        <h3 style="margin: 20px auto;text-align: center">软件信息</h3>
        <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc" style="margin: 0 auto;">
            <tr>
                <th>系统名称</th>
                <td>新昌个体户特产直销网</td>
            </tr>
            <tr>
                <th>开发人员</th>
                <td>storm&mooc</td>
            </tr>
            <tr>
                <th>地址</th>
                <td>宁波大学14数字媒体系</td>
            </tr>
        </table>
    </body>
</html>

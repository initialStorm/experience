<?php
include_once '../lib/includes.func.php';
checkLogined();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台</title>
<link rel="stylesheet" href="style/backstage.css">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script>
    $(function(){
        $(".flag").each(function(){
        $(this).click(function(){
            $(this).toggleClass('sub').toggleClass('plus');
            $(this).parent().next(".mcont").slideToggle("fast");
        })
    })
    })
</script>
</head>

<body>
    <div class="head">
            <div class="logo fl"><a href="#"></a></div>
            <h3 class="head_text fr">电子商务后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fl"><a href="#">新昌</a><span>&gt;&gt;</span><a href="#">商品管理</a><span>&gt;&gt;</span>商品修改</div>
        <div class="link fr">
            <b>你好，管理员
                <?php
                        if(isset($_SESSION['adminName']))
                            echo $_SESSION['adminName'];
                        else if(isset($_COOKIE['adminName']))
                            echo $_COOKIE['adminName'];
                ?>，欢迎登录后台</b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
                <div class="details">
                    <iframe src="index1.php" name="mainFrame" frameBorder="0" scrolling="no" width="100%" height="800" ></iframe>
                </div>
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span class="flag sub"></span>管理员管理</h3>
                        <dl class="mcont">
                            <dd><a href="addAdmin.php" target="mainFrame">添加管理员</a></dd>
                            <dd><a href="listAdmin.php" target="mainFrame">管理员列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span class="flag sub"></span>分类管理</h3>
                        <dl class="mcont">
                            <dd><a href="addCate.php" target="mainFrame">添加分类</a></dd>
                            <dd><a href="listCate.php" target="mainFrame">分类列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span class="flag sub"></span>商品管理</h3>
                        <dl class="mcont">
                            <dd><a href="addPro.php" target="mainFrame">添加商品</a></dd>
                            <dd><a href="listPro.php"  target="mainFrame">商品列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span class="flag sub"></span>用户管理</h3>
                        <dl class="mcont">
                            <dd><a href="#">添加用户</a></dd>
                            <dd><a href="#">修改用户</a></dd>
                            <dd><a href="#">订单修改</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
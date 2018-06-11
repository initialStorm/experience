<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员登录页面</title>
	<link type="text/css" rel="stylesheet" href="../style/reset.css">
	<link type="text/css" rel="stylesheet" href="../style/main.css">
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
</head>
<body>
	<div class="headerBar">
		<div class="logoBar">
			<div class="commonWidth">
				<div class="logo fl">
					<a href="#"><img src="../images/icon/logo.png" alt="新昌特产个体户直销网"></a>
				</div>
				<div class="welcome">欢迎登录</div>
			</div>
		</div>
	</div>
	<div class="login_box">
		<div class="login_cont">
			<form method="post" action="doLogin.php">
				<ul class="login">
					<li class="l_tit">管理员用户名</li>
					<li class="mb_10"><input type="text" name="username" placeholder="请输入用户名" class="login_input user_icon"></li>
					<li class="l_tit">密码</li>
					<li class="mb_10"><input type="password" name="password" class="login_input user_icon"></li>
                                        <li class="autoLogin"><input type="checkbox" id="a1" class="checked" name="autoflag" value="1"><label for="a1">自动登陆(一周内)</label></li>
					<li><input type="submit" value="" class="login_btn"></li>
				</ul>
			</form>
		</div>
	</div>

	<!-- 底部 -->
	<div class="hr_25"></div>
	<div class="footer">
		<p><a href="#">新昌简介</a><i>|</i><a href="#">新昌旅游</a><i>|</i><a href="#">土特产品</a><i>|</i><a href="#">联系电话：88888888</p></a>
		<p>版权所有：宁波大学数字媒体专业</p>
<!-- 		<p class="web"><a href="#"><img src="../images/icon/copyright.png" alt="网站logo"></a><a href="#"><img src="images/icon/copyright.png" alt="网站logo"></a></p> -->
	</div>
</body>
</html>
<?php
include_once 'lib/includes.func.php';
$cates = getAllCate();
if(!($cates && is_array($cates))){
    alertMessage("网站维护中", "http://www.baidu.com");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>新昌特产个体商户直销网</title>
	<link type="text/css" rel="stylesheet" href="style/reset.css">
	<link type="text/css" rel="stylesheet" href="style/main.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<div class="headerBar">
		<div class="topBar">
			<div class="commonWidth">
				<div class="leftArea">
					<a href="#" class="collection">欢迎收藏</a>
				</div>
				<div class="rightArea">
					欢迎来到新昌特产个体商户直销网！
                                        <a href="login.php">[登录]</a>
                                        <a href="regest.php">[免费注册]</a>
				</div>
				
			</div>
		</div> 
		<div class="logoBar">
			<div class="commonWidth">
				<div class="logo fl">
					<a href="#"><img src="images/icon/logo.png" alt="新昌特产个体户直销网"></a>
				</div>
				<div class="search_box fl">
					<input type="text" class="search_text fl">
					<input type="button" class="search_btn fr" value="搜索">
				</div>
				<div class="shopCar fr">
					<span class="shopText fl">购物车</span>
					<span class="shopNum fl">0</span>
				</div>
			</div>
		</div>
		<div class="navBox">
			<div class="commonWidth">
				<div class="shopClass fl">
					<h3>全部商品分类<i></i></h3>
					<div class="shopClass_show">
						<dl class="shopClass_item">
							<dt><a href="#" class="b">食品</a> <a href="#" class="b">礼品</a> 
								<a href="#" class="alink">小商品</a></dt>
							<dd><a href="#">小京生</a> <a href="#">茶叶</a> <a href="#">羊毛衫</a></dd></dl>						
						<dl class="shopClass_item">
							<dt><a href="#" class="b">食品</a> <a href="#" class="b">礼品</a> 
								<a href="#" class="alink">小商品</a></dt>
							<dd><a href="#">小京生</a> <a href="#">茶叶</a> <a href="#">羊毛衫</a></dd></dl>
						<dl class="shopClass_item">
							<dt><a href="#" class="b">食品</a> <a href="#" class="b">礼品</a> 
								<a href="#" class="alink">小商品</a></dt>
							<dd><a href="#">小京生</a> <a href="#">茶叶</a> <a href="#">羊毛衫</a></dd></dl>						
						<dl class="shopClass_item">
							<dt><a href="#" class="b">食品</a> <a href="#" class="b">礼品</a> 
								<a href="#" class="alink">小商品</a></dt>
							<dd><a href="#">小京生</a> <a href="#">茶叶</a> <a href="#">羊毛衫</a></dd></dl>					
						<dl class="shopClass_item">
							<dt><a href="#" class="b">食品</a> <a href="#" class="b">礼品</a> 
								<a href="#" class="alink">小商品</a></dt>
							<dd><a href="#">小京生</a> <a href="#">茶叶</a> <a href="#">羊毛衫</a></dd></dl>
					</div>
					<div class="shopClass_list hide">
						<div class="shoplist_cont">
						<dl class="shopClass_listItem">
							<dt>热卖商品</dt>
							<dd><a href="#">文字</a><a href="#">文字文字</a><a href="#">文字文文文</a><a href="#">文字文字</a><a href="#">文字</a><a href="#">文字</a></dd>
						</dl>
						</div>
						<div class="shoplist_cont">
						<dl class="shopClass_listItem">
							<dt>热卖商品</dt>
							<dd><a href="#">文字</a><a href="#">文字文字</a><a href="#">文字文文文</a><a href="#">文字文字</a><a href="#">文字</a><a href="#">文字</a><a href="#">文字</a><a href="#">文字文字</a><a href="#">文字文文文</a><a href="#">文字文字</a><a href="#">文字</a><a href="#">文字</a></dd>
						</dl>
						</div>
						<div class="shoplist_cont">
						<dl class="shopClass_listItem">
							<dt>热卖商品</dt>
							<dd><a href="#">文字</a><a href="#">文字文字</a><a href="#">文字文文文</a><a href="#">文字文字</a><a href="#">文字</a><a href="#">文字</a><a href="#">文字</a><a href="#">文字文字</a><a href="#">文字文文文</a><a href="#">文字文字</a><a href="#">文字</a><a href="#">文字</a></dd>
						</dl>
						</div>
						<div class="shoplist_cont">
						<dl class="shopClass_listItem">
							<dt>热卖商品</dt>
							<dd><a href="#">文字</a><a href="#">文字文字</a><a href="#">文字文文文</a><a href="#">文字文字</a><a href="#">文字</a><a href="#">文字</a><a href="#">文字</a><a href="#">文字文字</a><a href="#">文字文文文</a><a href="#">文字文字</a><a href="#">文字</a><a href="#">文字</a></dd>
						</dl>
						</div>
						<div class="shoplist_cont">
						<dl class="shopClass_listItem">
							<dt>热卖商品</dt>
							<dd><a href="#">文字</a><a href="#">文字文字</a><a href="#">文字文文文</a><a href="#">文字文字</a><a href="#">文字</a><a href="#">文字</a><a href="#">文字</a><a href="#">文字文字</a><a href="#">文字文文文</a><a href="#">文字文字</a><a href="#">文字</a><a href="#">文字</a></dd>
						</dl>
						<div class="shopClass_listLinks">
							<a href="#">更多满减优惠<span></span></a><a href="#">猜你喜欢<span></span></a>
						</div>
						</div>
					</div>
				</div>
				<ul class="nav fl">
					<li><a href="#">商品城</a></li>
					<li><a href="#">美食</a></li>
					<li><a href="#">家用</a></li>
					<li><a href="#">时令热卖</a></li>
					<li><a href="#">低价特卖</a></li>
					<li><a href="#">名品会</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="banner commonWidth clearfix">
		<div class="banner_bar banner_big">
			<ul class="imgBox">
				<li><a href="#"><img src="images/banner/banner_1.jpg" alt="banner"></a></li>
				<li><a href="#"><img src="images/banner/banner_2.jpg" alt="banner"></a></li>
				<li><a href="#"><img src="images/banner/banner_3.jpg" alt="banner"></a></li>
				<li><a href="#"><img src="images/banner/banner_4.jpg" alt="banner"></a></li>
			</ul>
			<div class="imgNum">
				<a href="####" class="active"></a><a href="####"></a><a href="####"></a><a href="####"></a>
			</div>
		</div>
	</div>
<?php foreach ($cates as $cate):?>	
	<!-- 第二个 特色小吃-->
	<div class="shopTit commonWidth clearfix">
		<span class="icon"></span><h3><?php echo $cate['cateName'];?></h3>
		<a href="#" class="more">更多&gt;&gt;</a>
	</div>
	<div class="shopList commonWidth clearfix">
		<div class="leftArea">
			<div class="banner_bar banner_small">
			<ul class="imgBox">
				<li><a href="#"><img src="images/banner/banner_01.jpg" alt="banner"></a></li>
				<li><a href="#"><img src="images/banner/banner_02.jpg" alt="banner"></a></li>
				<li><a href="#"><img src="images/banner/banner_03.jpg" alt="banner"></a></li>
				<li><a href="#"><img src="images/banner/banner_04.jpg" alt="banner"></a></li>
			</ul>
			<div class="imgNum">
				<a href="####" class="active"></a><a href="####"></a><a href="####"></a><a href="####"></a>
			</div>
		    </div>
		</div>
		<div class="rightArea">
			<div class="shopList_top clearfix">
                            <?php
                                $pros= getProsByCid($cate['id']);
                                if($pros && is_array($pros)):
                                    foreach ($pros as $pro):
                                    $proImg = getProImgById($pro['id']);
                            ?>
				<div class="shop_item">
					<div class="shop_img">
                                            <a href="products_comment.php?id=<?php echo $pro['id'];?>" target="_blank"><img height="218" width="202" src="images/image_220&220/<?php echo $proImg['Path'];?>" alt=""></a><h3><?php echo $pro['Pname'];?></h3><p><?php echo $pro['price'];?></p>
					</div>
				</div>
                            <?php
                            endforeach;
                            endif;
                            ?>
			</div>
			<div class="shopList_bottom clearfix">
                            <?php
                                $prosSmall= getSmallProsByCid($cate['id']);
                                if($prosSmall && is_array($prosSmall)):
                                    foreach ($prosSmall as $proSmall):
                                    $proSmallImg = getProImgById($proSmall['id']);
                            ?>
				<div class="shop_item_sm">
					<div class="shop_img_sm">
                                            <a href="products_comment.php?id=<?php echo $proSmall['id'];?>" target="_blank"><img width="95" height="95" src="images/image_220&220/<?php echo $proSmallImg['Path'];?>" alt=""></a>
					</div>
					<div class="shop_item_sm_text">
						<p><?php echo $proSmall['Pname']?></p>
						<h3><?php echo $proSmall['price']?></h3>
					</div>
				</div>
                            <?php
                            endforeach;
                            endif;
                            ?>
			</div>
		</div>
	</div>
        <?php endforeach;?>
	<!-- 底部 -->
	<div class="hr_25"></div>
	<div class="footer">
		<p><a href="#">新昌简介</a><i>|</i><a href="#">新昌旅游</a><i>|</i><a href="#">土特产品</a><i>|</i><a href="#">联系电话：88888888</a></p>
		<p>版权所有：宁波大学数字媒体专业</p>
		<!-- <p class="web"><a href="#"><img src="images/icon/copyright.png" alt="网站logo"></a><a href="#"><img src="images/icon/copyright.png" alt="网站logo"></a></p> -->
	</div>
</body>
</html>
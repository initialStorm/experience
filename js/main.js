$(function(){
	// 导航栏显示
	$(".shopClass h3").click(function(){
		if($(".shopClass_show").is(':hidden')){
			$(".shopClass_show").show();
			$(".shopClass_show").removeClass("hide");
		}else{
			$(".shopClass_show").hide();
			$(".shopClass_show").addClass("hide");
		}
	})
	$(".shopClass_show").children("dl").mouseover(function(){
		$(".shopClass_list").show();
	})
	$(".shopClass_show").children("dl").mouseout(function(){
		$(".shopClass_list").hide();
	})
	$(".shopClass_list").mouseover(function(){
		$(".shopClass_list").show();
	})
	$(".shopClass_list").mouseout(function(){
		$(".shopClass_list").hide();
	})
	// 焦点图
	// var $container = $(".banner_big");
	// var $list = $(".banner_big").find(".imgBox");
	// var $li = $list.find("li");
	// var $buttons = $(".banner_big").find(".imgNum a");
	// var $index = 0 ;
	// $li.eq(0).fadeIn();
	// function switch_big(pos){
	// 	var newLeft = pos ;
	// 	while(newLeft < -2430){
	// 		newLeft=newLeft + 2430;
	// 	}
	// 	$list.css("left",newLeft);
	// }
	// function showbutton(index){
	// 	for (var i = $buttons.length - 1; i >= 0; i--) {
	// 		$buttons.eq(i).removeClass("active");
	// 	}
	// 	$buttons.eq(index).addClass("active"); 
	// }
	// $buttons.each(function(index){
	// 	$(this).on("click",function(){
	// 		if($(this).is(".active")){
	// 			return;
	// 		}
	// 		var myIndex = $(this).index();
	// 		var pos = -810 *(myIndex);
	// 		switch_big(pos);
	// 		showbutton(index);
	// 		$index = myIndex;	
	// 	})
	// })
	// function fade(){

	// }
	// 焦点图
	function fadeImg(obj,speed,interval){
		$("."+obj).each(function(){
			var $box = $(this);
			var $imgUl = $box.find(".imgBox");
			var $li = $box.find(".imgBox li");
			var $btn =$box.find(".imgNum a");
			var k=0;
			var Player = setInterval(function(){fade()},interval);
			$li.eq(0).fadeIn(speed*2);
			function fade(){
				k+=1;
				if(k >= $li.length) {k = 0;}
				$btn.removeClass("active").eq(k).addClass("active");
				$li.fadeOut(speed).eq(k).fadeIn(speed);
			}
			$btn.click(function(){
				var myIndex = $(this).index();
				$btn.removeClass("active").eq(myIndex).addClass("active");
				$li.fadeOut(speed).eq(myIndex).fadeIn(speed);
				k = myIndex;
			})
			$box.hover(
				function(){
				clearInterval(Player);
			},function(){
				Player = setInterval(function(){fade()},interval);
			})
		})
	}
	fadeImg("banner_big",500,3000);
	fadeImg("banner_small",500,300000);
	$(".nav").find("li > a").each(function(){
		$(this).hover(
			function(){
			$(this).addClass("active");
		},function(){
			$(this).removeClass("active");
		})
	})
})
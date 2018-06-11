<?php 
include_once '../lib/includes.func.php';
checkLogined();
$rows=getAllCate();
if(!$rows){
    alertMessage("没有相应分类，请先添加分类!!", "addCate.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link charset="utf-8" href="style/upload.css"  rel="stylesheet"  type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="js/jquery-1.6.4.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
        $(document).ready(function(){
        	$("#selectFileBtn").click(function(){
        		$fileField = $('<input type="file" name="thumbs[]"/>');
        		$fileField.hide();
        		$("#attachList").append($fileField);
        		$fileField.trigger("click");
        		$fileField.change(function(){
        		$path = $(this).val();
        		$filename = $path.substring($path.lastIndexOf("\\")+1);
        		$attachItem = $('<div class="attachItem"><div class="left"></div><div class="right"><a href="#" title="删除附件">删除</a></div></div>');
        		$attachItem.find(".left").html($filename);
        		$attachItem.find(".left").attr("title",$filename);
        		$("#attachList").append($attachItem);		
        		});
        	});
        	$("#attachList>.attachItem").find("a").live("click",function(obj,i){
        		$(this).parents(".attachItem").prev("input").remove();
        		$(this).parents(".attachItem").remove();
        	});
        });
</script>
</head>
<body>
<h3>添加商品</h3>
<form action="doAdminAction.php?act=addPro" method="post" enctype="multipart/form-data">
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">商品名称</td>
		<td><input type="text" name="Pname"  placeholder="请输入商品名称"/>(*必填)</td>
	</tr>
	<tr>
		<td align="right">商品分类</td>
		<td>
		<select name="cId">
			<?php foreach($rows as $row):?>
				<option value="<?php echo $row['id'];?>"><?php echo $row['cateName'];?></option>
			<?php endforeach;?>
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">商品编号</td>
		<td><input type="text" name="Pn"  placeholder="请输入商品编号"/>(*必填)</td>
	</tr>
	<tr>
		<td align="right">商品数量</td>
		<td><input type="text" name="Pnumber"  placeholder="请输入商品数量 "/>(*必填数字)</td>
	</tr>
	<tr>
		<td align="right">商品价格</td>
		<td><input type="text" name="price"  placeholder="输入商品市场价"/>(*必填数字)</td>
	</tr>
	<tr>
		<td align="right">商品描述</td>
		<td>
			<textarea name="Pdes" id="editor_id" style="width:100%;height:150px;"></textarea>
		</td>
	</tr>
	<tr>
		<td align="right">商品图像</td>
		<td>
			<a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
			<div id="attachList" class="clear"></div>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="right"><input type="submit"  value="发布商品"/></td>
	</tr>
</table>
</form>
</body>
</html>
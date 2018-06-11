<?php
include_once '../lib/includes.func.php';
checkLogined();
@$order=$_REQUEST['order']?$_REQUEST['order']:null;
$orderBy=$order?"order by p.".$order:null;
@$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where = $keywords?"where p.Pname like '%$keywords%'":null;
    $pageSize =3;//每页显示条数
    $sql="select p.id,p.Pname,p.Pn,p.Pnumber,p.price,p.Pdes,p.pubTime,p.isShow,c.cateName from products as p join cate c on p.cId=c.id  {$where}";
    $totalRows = getResultNum($sql);
    $totalPage = ceil($totalRows / $pageSize);
    $page = @ $_REQUEST['page'] ? (int) $_REQUEST['page'] : 1;//接收当前页
    if ($page < 1 || $page == null || !is_numeric($page)) {
        $page = 1;
    }
    if ($page >= $totalPage) {
        $page = $totalPage;
    }
    $offset = ($page - 1) * $pageSize;
    $sql = "select p.id,p.Pname,p.Pn,p.Pnumber,p.price,p.Pdes,p.pubTime,p.isShow,c.cateName from products as p join cate c on p.cId=c.id {$where} {$orderBy} limit {$offset},{$pageSize}";
    $rows = fetchAll($sql);
    if(!$rows){
        alertMessage("数据表中没有商品,请添加", "addPro.php");
        exit();
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="style/backstage.css">
        <link rel="stylesheet" href="js/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
        <script src="js/jquery-ui/js/jquery-1.10.2.js"></script>
        <script src="js/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
        <script src="js/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript">
            function showDetail(id, t) {
                $("#showDetail" + id).dialog({
                    height: "auto",
                    width: "auto",
                    position: {my: "center", at: "center", collision: "fit"},
                    modal: false, //是否模式对话框
                    draggable: true, //是否允许拖拽
                    resizable: true, //是否允许拖动
                    title: "商品名称：" + t, //对话框标题
                    show: "slide",
                    hide: "explode"
                });
            }
            function addPro() {
                window.location = 'addPro.php';
            }
            function editPro(id) {
                window.location = 'editPro.php?id=' + id;
            }
            function delPro(id) {
                if (window.confirm("您确认要删除嘛？删除后无法恢复")) {
                    window.location = "doAdminAction.php?act=delPro&id=" + id;
                }
            }
            function search() {
                if (event.keyCode == 13) {//按下回车时
                    var val = document.getElementById("search").value;
//                    alert(val);
                    window.location = "listPro.php?keywords=" + val;
                }
            }
            function change(val) {
                window.location = "listPro.php?order=" + val;
            }
        </script>
    </head>

    <body>
        <div id="showDetail"  style="display:none;">

        </div>
        <div class="details">
            <div class="details_operation clearfix">
                <div class="bui_select">
                    <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addPro()">
                </div>
                <div class="fr">
                    <div class="text">
                        <span>商品价格：</span>
                        <div class="bui_select">
                            <select id="" class="select" onchange="change(this.value)">
                                <option>-请选择-</option>
                                <option value="price asc" >由低到高</option>
                                <option value="price desc">由高到底</option>
                            </select>
                        </div>
                    </div>
                    <div class="text">
                        <span>上架时间：</span>
                        <div class="bui_select">
                            <select id="" class="select" onchange="change(this.value)">
                                <option>-请选择-</option>
                                <option value="pubTime desc" >最新发布</option>
                                <option value="pubTime asc">历史发布</option>
                            </select>
                        </div>
                    </div>
                    <div class="text">
                        <span>商品名关键字搜索</span>
                        <input type="text" value="" class="search"  id="search" onkeypress="search()" placeholder="新昌">
                    </div>
                </div>
            </div>
            <!--表格-->
            <table class="table" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th width="10%">编号</th>
                        <th width="20%">商品名称</th>
                        <th width="10%">商品分类</th>
                        <th width="10%">是否上架</th>
                        <th width="15%">上架时间</th>
                        <th width="10%">价格</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
<?php $i=1; foreach ($rows as $row): ?>
                        <tr>
                            <td><input type="checkbox" id="c<?php echo $row['id']; ?>" class="check" value="<?php echo $row['id']; ?>"><label for="c1" class="label"><?php echo $row['id']; ?></label></td>
                            <td><?php echo $row['Pname']; ?></td>
                            <td><?php echo $row['cateName']; ?></td>
                            <td>
    <?php echo $row['isShow'] == 1 ? "上架" : "下架"; ?>
                            </td>
                            <td><?php echo date("Y-m-d H:i:s", $row['pubTime']); ?></td>
                            <td><?php echo $row['price']; ?>元</td>
                            <td align="center">
                                <input type="button" value="详情" class="btn" onclick="showDetail(<?php echo $row['id']; ?>, '<?php echo $row['Pname']; ?>')"><input type="button" value="修改" class="btn" onclick="editPro(<?php echo $row['id']; ?>)"><input type="button" value="删除" class="btn"onclick="delPro(<?php echo $row['id']; ?>)">
                                <div id="showDetail<?php echo $row['id']; ?>" style="display:none;">
                                    <table class="table" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="20%" align="right">商品名称</td>
                                            <td><?php echo $row['Pname']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"  align="right">商品分类</td>
                                            <td><?php echo $row['cateName']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"  align="right">商品编号</td>
                                            <td><?php echo $row['Pn']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"  align="right">商品数量</td>
                                            <td><?php echo $row['Pnumber']; ?></td>
                                        </tr>
                                        <tr>
                                            <td  width="20%"  align="right">商品价格</td>
                                            <td><?php echo $row['price']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"  align="right">商品图片</td>
                                            <td>
                                                <?php
                                                $proImgs = getAllImgByProId($row['id']);
                                                foreach ($proImgs as $img):
                                                    ?>
                                                    <img width="100" height="100" src="../uploads/<?php echo $img['Path']; ?>" alt=""/> &nbsp;&nbsp;
    <?php endforeach; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%"  align="right">是否上架</td>
                                            <td>
    <?php echo $row['isShow'] == 1 ? "上架" : "下架"; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                        </tr>
                                    </table>
                                    <span style="display:block;width:80%; ">
                                        商品描述<br/>
    <?php echo $row['Pdes']; ?>
                                    </span>
                                </div>
                            </td>
                        </tr>
<?php $i++;endforeach; ?>
<?php if ($totalRows > $pageSize): ?>
                        <tr>
                            <td colspan="7" align="right"><?php echo showPage($page, $totalPage, "keywords={$keywords}&order={$order}"); ?></td>
                        </tr>
<?php endif; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
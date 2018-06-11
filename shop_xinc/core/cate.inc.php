<?php
/* 
 * 添加分类
 */
function addCate(){
    $arr=$_POST;
    if(insert("cate", $arr)&&($arr['cateName']!=null)){
        $mes = "添加成功!!</br><a href='addCate.php' target='mainFrame'>继续添加</a> | <a href='listCate.php' target='mainFrame'>返回分类表</a>";
    }else{
        $mes = "添加失败!!已存在分类 或 分类名为空</br><a href='addCate.php' target='mainFrame'>重新添加</a> | <a href='listCate.php' target='mainFrame'>返回分类表</a>";
    }
    return $mes;
}
/* 
 * 获得所有分类
 */
function getAllCate($where=null){
    $sql="select * from cate {$where}";
    $rows = fetchAll($sql);
    return $rows;
}
/* 
 * 分页显示获得所有分类
 */
function getCateBypage(){
    $sql = "select * from cate"; 
    global $totalPage,$page,$totalRows;
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
    $sql = "select * from cate limit {$offset},{$pageSize}";
    $rows = fetchAll($sql);
    return $rows;
}
/* 
 * 修改分类
 */
function editCate($id){
    $arr=$_POST;
    if(update("cate","",$arr,"id=$id")){
        $mes="修改成功!!</br><a href='listCate.php' target='mainFrame'>返回分类列表</a>";
    }else{
         $mes = "修改失败!!已存在分类</br><a href='listCate.php' target='mainFrame'>请重新修改</a> ";
    }
     return $mes;
}
/* 
 * 删除分类
 */
function delCate($id){
    $res = checkProExist($id);
    if(@!$res){
        $where ="id=".$id;
    if(delete("cate","id=$id")){
        $mes="删除成功!!</br><a href='listCate.php' target='mainFrame'>返回管理员列表</a>";
    }else{
         $mes = "删除失败!!</br><a href='listCate.php' target='mainFrame'>返回管理员列表</a> ";
    }
     return $mes;
    }else{
        alertMessage("不能删除该分类，请先删除该分类下的商品", "listPro.php");
    }

    
}

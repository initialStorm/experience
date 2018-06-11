<?php
/* 
 * 检查管理员是否存在
 */
 function checkAdmin($sql){
     return fetchOne($sql);
 }
 /* 
 * 检查管理员是否登录
 */
function checkLogined(){
    if(@$_SESSION['adminId']==""&&@$_COOKIE['adminId']==""){
        alertMessage("还没有登录", "login_admin.php");
    }
}
/* 
 * 管理员登出
 */
function logout(){
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['adminId'])){
        setcookie("adminId","",time()-1);
    }
    if(isset($_COOKIE['adminName'])){
        setcookie("adminName","",time()-1);
    }
    session_destroy();
    header("location:login_admin.php");
}
/* 
 * 添加管理员
 */
function addAdmin(){
    $arr=$_POST;
    $pass=$_POST['password'];
    $arr['password']=md5($pass);
    $sql="select * from shop_admin where userName='{$arr['username']}'";
    if (($pass != "") && ($arr['username'] != "") && !@($query = fetchOne($sql))) {
        if (insert("shop_admin", $arr)) {//向“shop_admin”表中插入数据$arr ,插入成功则
            $mes = "添加成功!!</br><a href='addAdmin.php' target='mainFrame'>继续添加</a> | <a href='listAdmin.php' target='mainFrame'>管理员表</a>";
        } else {
            $mes = "添加失败!!</br><a href='addAdmin.php' target='mainFrame'>重新添加</a> ";
        }
    } else{
        $mes = "添加失败!!用户名已存在或用户名、密码为空</br><a href='addAdmin.php' target='mainFrame'>重新添加</a> ";
    }
    return $mes;
}
/* 
 * 获得所有管理员
 */
function getAllAdmin($where=null){
    $sql="select id,userName,email from shop_admin {$where}";
    $rows = fetchAll($sql);
    return $rows;
}
/* 
 * 分页显示获得所有管理员
 */
function getAdminBypage($pageSize = 2){
    $sql = "select * from shop_admin"; 
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
    $sql = "select * from shop_admin order by id asc limit {$offset},{$pageSize}";
    $rows = fetchAll($sql);
    return $rows;
}
/* 
 * 编辑管理员
 */
function editAdmin($id){
    $arr=$_POST;
    $pass=$_POST['password'];
    $arr['password']=md5($pass);
    $sql="select email from shop_admin where id='{$id}'";
    $row = fetchOne($sql);
    if($arr['email']==null){
        $arr['email']=$row['email'];
    }
    if(update("shop_admin","",$arr,"id=$id")&&$pass!=""&&$arr['userName']!=""){
        $mes="修改成功!!</br><a href='listAdmin.php' target='mainFrame'>返回管理员列表</a>";
    }else{
         $mes = "修改失败!!管理员名称和密码不能为空</br><a href='listAdmin.php' target='mainFrame'>返回管理员列表</a> ";
    }
     return $mes;
}
/* 
 * 删除管理员
 */
function delAdmin($id){
    if(delete("shop_admin","id=$id")){
        $mes="删除成功!!</br><a href='listAdmin.php' target='mainFrame'>返回管理员列表</a>";
    }else{
         $mes = "删除失败!!</br><a href='listAdmin.php' target='mainFrame'>返回管理员列表</a> ";
    }
     return $mes;
}
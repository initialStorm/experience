<?php
//include_once '../lib/includes.func.php';
/**
 * 添加商品
 * @return string $mes
 */
function addPro() {
    $arr = $_POST;
    $arr['pubTime'] = time();
    $path = "../uploads";
    $uploadFiles = uploadFile($path);
    if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $key => $uploadFile) {
            thumb($path . "/" . $uploadFile['name'], "../images/image_50&50/" . $uploadFile['name'], 50, 50);
            thumb($path . "/" . $uploadFile['name'], "../images/image_220&220/" . $uploadFile['name'], 220, 220);
            thumb($path . "/" . $uploadFile['name'], "../images/image_270&330/" . $uploadFile['name'], 270, 330);
            thumb($path . "/" . $uploadFile['name'], "../images/image_800&800/" . $uploadFile['name'], 800, 800);
        }
    }
    $res = insert("products", $arr);
    $pid = $res;
    if ($pid) {
        if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $uploadFile) {
            $arr1['pId'] = $pid;
            $arr1['Path'] = $uploadFile['name'];
            addPhoto($arr1);
        }
        }
        $mes = "<p>添加成功!!</p><br/><a href='addPro.php' target='mainFrame'>继续添加</a>|<a href='listPro.php' target='mainFrame'>返回商品列表</a>";
    } else {
        if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $uploadFile) {
            if (file_exists("../images/image_800&800/" . $uploadFile['name'])) {
                unlink("../images/image_800&800/" . $uploadFile['name']);
            }
            if (file_exists("../images/image_50&50/" . $uploadFile['name'])) {
                unlink("../images/image_50&50/" . $uploadFile['name']);
            }
            if (file_exists("../images/image_220&220/" . $uploadFile['name'])) {
                unlink("../images/image_220&220/" . $uploadFile['name']);
            }
            if (file_exists("../images/image_270&330/" . $uploadFile['name'])) {
                unlink("../images/image_270&330/" . $uploadFile['name']);
            }
        }
        }
        $mes = "<p>添加失败!!已存在相同名称商品 或者 输入格式不正确</p><br/><a href='addPro.php' target='mainFrame'>重新添加</a>";
    }
    return $mes;
}

/**
 * 得到所有商品信息
 * @return array $rows
 */
function getAllproducts(){
    $sql="select p.id,p.Pname,p.Pn,p.Pnumber,p.price,p.Pdes,p.pubTime,p.isShow,c.cateName from products as p join cate c on p.cId=c.id";
    $rows = fetchAll($sql);
    return $rows;
}

/**
 * 得到指定分类ID下的前4条商品信息
 * @return array $rows
 */
function getProsByCid($cid){
    $sql="select p.id,p.Pname,p.Pn,p.Pnumber,p.price,p.Pdes,p.pubTime,p.isShow,c.cateName from products as p join cate c on p.cId=c.id where p.cId={$cid} limit 4";
    $rows = fetchAll($sql);
    return $rows;
}

/**
 * 得到指定分类ID下的前4条商品信息_small
 * @return array $rows
 */
function getSmallProsByCid($cid){//limit 4,4显示之后的4个，由于数据表中还未添加故写limit 0,4
    $sql="select p.id,p.Pname,p.Pn,p.Pnumber,p.price,p.Pdes,p.pubTime,p.isShow,c.cateName from products as p join cate c on p.cId=c.id where p.cId={$cid} limit 0,4";
    $rows = fetchAll($sql);
    return $rows;
}

/**
 * 得到所有商品图片信息
 * @return array $rows
 */
function getAllImgByProId($id){
    $sql="select a.Path from photo a where pid='{$id}'";
        $rows= fetchAll($sql);
        return $rows;
}
/**
 * 得到指定ID商品信息
 * @param int $id
 * @return array  $rows
 */
function getProById($id){
    $sql="select p.id,p.Pname,p.Pn,p.Pnumber,p.price,p.Pdes,p.pubTime,p.isShow,p.cId,c.cateName from products as p join cate c on p.cId=c.id where p.id={$id}";
        $rows= fetchOne($sql);
        return $rows;
}
/**
 * 检查分类下是否有商品
 * @param int $cId
 * @return array  $rows
 */
function checkProExist($cId){
    $sql="select * from products where cId={$cId}";
   @ $rows=  fetchAll($sql);
    return $rows;
    
}
/**
 * 删除指定ID商品信息(同时要删除相应图片)
 * @param int $id
 * @return string  $mes
 */
function delPro($id) {
    $where = "id={$id}";
    $res = delete("products", $where); //删除products表中的信息
    @$proImgs = getAllImgByProId($id);
    if ($proImgs && is_array($proImgs)) {
        foreach ($proImgs as $proImg) {//查找并删除图片存放路径下的图片
            if (file_exists("../uploades/" . $proImg['Path'])) {
                unlink("../uploades/" . $proImg['Path']);
            }
            if (file_exists("../images/image_270&330/" . $proImg['Path'])) {
                unlink("../images/image_270&330/" . $proImg['Path']);
            }
            if (file_exists("../images/image_50&50/" . $proImg['Path'])) {
                unlink("../images/image_50&50/" . $proImg['Path']);
            }
            if (file_exists("../images/image_220&220/" . $proImg['Path'])) {
                unlink("../images/image_220&220/" . $proImg['Path']);
            }
            if (file_exists("../images/image_800&800/" . $proImg['Path'])) {
                unlink("../images/image_800&800/" . $proImg['Path']);
            }
        }  
    }
        $where1 = "pId={$id}";
         $res1 = delete("photo", $where1); //删除photo表中的信息
    if ($res) {
        $mes = "<p>删除成功!! </p><br/><a href='listPro.php' target='mainFrame'>返回商品列表</a>";
    } else {
        $mes = "<p>删除失败!! </p><br/><a href='listPro.php' target='mainFrame'>请重新删除</a>";
    }
    return $mes;
}

/**
 * 修改指定ID商品信息
 * @param int $id
 * @return string  $mes
 */
function editPro($id){
     $arr = $_POST;
     $where="id={$id}";
    $path = "../uploads";
    $uploadFiles = uploadFile($path);
    if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $key => $uploadFile) {
            thumb($path . "/" . $uploadFile['name'], "../images/image_50&50/" . $uploadFile['name'], 50, 50);
            thumb($path . "/" . $uploadFile['name'], "../images/image_220&220/" . $uploadFile['name'], 220, 220);
            thumb($path . "/" . $uploadFile['name'], "../images/image_270&330/" . $uploadFile['name'], 270, 330);
            thumb($path . "/" . $uploadFile['name'], "../images/image_800&800/" . $uploadFile['name'], 800, 800);
        }
    }
    $res =update("products","", $arr,$where);
    $pid = $id;
    if ($pid) {
        if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $uploadFile) {
            $arr1['pId'] = $pid;
            $arr1['Path'] = $uploadFile['name'];
            addPhoto($arr1);
        }
    }
        $mes = "<p>修改成功!!</p><br/><a href='listPro.php' target='mainFrame'>返回商品列表</a>";
    } else {
        if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $uploadFile) {
            if (file_exists("../images/image_800&800/" . $uploadFile['name'])) {
                unlink("../images/image_800&800/" . $uploadFile['name']);
            }
            if (file_exists("../images/image_50&50/" . $uploadFile['name'])) {
                unlink("../images/image_50&50/" . $uploadFile['name']);
            }
            if (file_exists("../images/image_220&220/" . $uploadFile['name'])) {
                unlink("../images/image_220&220/" . $uploadFile['name']);
            }
            if (file_exists("../images/image_270&330/" . $uploadFile['name'])) {
                unlink("../images/image_270&330/" . $uploadFile['name']);
            }
        }
    }
        $mes = "<p>修改失败!!</p><br/><a href='listPro.php' target='mainFrame'>请重新修改</a>";
    }
    return $mes;
}


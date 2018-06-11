<?php
//include_once '../lib/includes.func.php';
function addPhoto($array){
    insert("photo", $array);
}

/*
 * 根据商品id得到商品图片
 * @param int $id
 * @return array $row
 */
function getProImgById($id){
    $sql ="select Path from photo where pId='{$id}' limit 1";
    $row =  fetchOne($sql);
    return $row;
}

/*
 * 获取指定id商品的所有图片
 * @param int $id
 * @return array $row
 */
function getProImgsById($id){
    $sql ="select Path from photo where pId='{$id}'";
    $rows=  fetchAll($sql);
    return $rows;
}
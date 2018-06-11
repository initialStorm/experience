<?php
include_once 'includes.func.php';
/*
 * 混合文件类型转换,构建上传文件信息数组
 * @return Array
 */
function buildInfo(){
    if(!$_FILES){
        return;
    }
            $i = 0;
    foreach ($_FILES as $val1){
        if(is_string($val1['name'])){//单文件
            $files[$i]=$val1;
            $i++;
        }else{//多文件
             foreach ($val1['name'] as $key=>$val2){
                 $files[$i]['name']=$val2;
                  $files[$i]['size']=$val1['size'][$key];
                  $files[$i]['tmp_name']=$val1['tmp_name'][$key];
                  $files[$i]['error']=$val1['error'][$key];
                  $files[$i]['type']=$val1['type'][$key];
                  $i++;
             }
        }
    }
    return $files;
}
/*
 * 上传文件
 * @param string $path 指定存储路径
 * @param array $allowExt 允许上传文件后缀名数组集
 * @param int $maxSize 最大文件
 * @param bool $imgFlag 是否图片
 * @return Array $uploadedFile
 */
function uploadFile($path = "uploads", $allowExt = array("gif", "jpeg", "jpg", "png", "wbmp"), $maxSize = 2097152, $imgFlag = TRUE) {
 if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $fileInfos=  buildInfo();
        if(!($fileInfos &&  is_array($fileInfos))){
            return;
        }
        $j=0;
        foreach ($fileInfos as $fileInfo){
            if ($fileInfo['error'] == UPLOAD_ERR_OK) {
        $ext = getExt($fileInfo['name']);//获得文件后缀名
        //限制上传文件类型
        if (!in_array($ext, $allowExt)) {
            exit("非法文件类型");
        }
        //限制上传文件大小
        if ($fileInfo['size'] > $maxSize) {
            exit("文件过大");
        }
        //getimagesize($filename):验证文件是否是图片类型
        if ($imgFlag) {
            $info = getimagesize($fileInfo['tmp_name']);
            if (!$info) {
                exit("不是真正的图片类型");
            }
        }
        //判断下文件是否是通过HTTP POST方式上传上来的
        if (!is_uploaded_file($fileInfo['tmp_name'])) {
            exit("文件不是通过HTTP POST方式上传");
        }
        //移动文件到指定目录
        $filename=getUniName().".".$ext;
        $destination = $path . "/" .$filename ;
         if (move_uploaded_file($fileInfo['tmp_name'], $destination)) {
                $fileInfo['name']=$filename;
                unset($fileInfo['error'],$fileInfo['tmp_name'],$fileInfo['size'],$fileInfo['type']);//释放不需要的变量空间
                $uploadedFile[$j]=$fileInfo;
                $j++;
            } else {
                $mes = "文件移动失败";
            }
        }else{
            switch ($fileInfo['error']) {
            case 1:
                $mes = "超过了配置文件上传文件的大小"; //UPLOAD_ERR_INI_SIZE
                break;
            case 2:
                $mes = "超过了表单设置上传文件的大小"; //UPLOAD_ERR_FORM_SIZE
                break;
            case 3:
                $mes = "文件部分被上传"; //UPLOAD_ERR_PARTIAL
                break;
            case 4:
                $mes = "没有文件被上传"; //UPLOAD_ERR_NO_FILE
                break;
            case 6:
                $mes = "没有找到临时目录"; //UPLOAD_ERR_NO_TMP_DIR
                break;
            case 7:
                $mes = "文件不可写"; //UPLOAD_ERR_CANT_WRITE;
                break;
            case 8:
                $mes = "由于PHP的扩展程序中断了文件上传"; //UPLOAD_ERR_EXTENSION
                break;
        }

}
        }
        return $uploadedFile;
}

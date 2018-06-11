<?php
/**
 * 创建验证码
 * @param int $type             1:数字 0-9               2:字母a-z A-Z       3:数字和字母
 * @param int $length
 * @param int $pixel            有几个小圆点
 * @param int $line              有几条线
 * @param string $sess_name
 */
include_once 'string.func.php';
function verifyImage($type=1,$length=4,$pixel=0,$line=0,$sess_name = "verify"){
	//创建画布
	$width = 97;
	$height = 32;
	$image = imagecreatetruecolor ( $width, $height );
	$white = imagecolorallocate ( $image, 255, 255, 255 );
	$black = imagecolorallocate ( $image, 0, 0, 0 );
	//用填充矩形填充画布
	imagefilledrectangle ( $image, 1, 1, $width - 2, $height - 2, $white );
	$chars = buildRandomString ( $type, $length );
	$_SESSION [$sess_name] = $chars;
	$fontfiles = array ("simyou.ttf","segoeprb.ttf","trebuc.ttf","verdanab.ttf","rock.ttf");//定义随机字体数组
//	$fontfiles = ["simyou.ttf"];
	for($i = 0; $i < $length; $i ++) {
		$size = mt_rand ( 14, 18 );
		$angle = mt_rand (  -15, 15 );
		$x = 10 + $i * $size;
		$y = mt_rand ( 20, 28 );
		$fontfile = "../fonts/" . $fontfiles [mt_rand ( 0, count ( $fontfiles ) - 1 )];
		$color = imagecolorallocate ( $image, mt_rand ( 100, 180 ), mt_rand ( 90, 160 ), mt_rand ( 140, 200 ) );
		$text = substr ( $chars, $i, 1 );
		imagettftext ( $image, $size, $angle, $x, $y, $color, $fontfile, $text );
	}
	if ($pixel) {//干扰点
		for($i = 0; $i < $pixel; $i ++) {
			imagesetpixel ( $image, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $black );
		}
	}
	if ($line) {//干扰线
		for($i = 1; $i < $line; $i ++) {
			$color = imagecolorallocate ( $image, mt_rand ( 50, 90 ), mt_rand ( 80, 120 ), mt_rand ( 90, 180 ) );
			imageline ( $image, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $color );
		}
	}
	header ( "content-type:image/gif" );
	imagegif ( $image );
	imagedestroy ( $image );
}
/**
 * 生成缩略图
 * @param string $filename                       源文件名
 * @param string $destination                   保存的路径+文件名
 * @param int $dst_w                                目标宽度
 * @param int $dst_h                                 目标高度
 * @param bool $isReservedSource          是否保留源文件
 * @param number $scale                          等比例缩放宽高
 * @return string $dstFileName                  保存的路径+文件名
 */
function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=TRUE,$scale=1){
    list($src_w,$src_h,$imageType)=getimagesize($filename);
    $mine = image_type_to_mime_type($imageType);// image/jpeg(type)
    $creatFunc =  str_replace("/","createfrom", $mine);// imagecreatfrom jpeg(type)
    $outFunc = str_replace("/",null, $mine);// image jpeg(type)
    if(is_null($dst_w)||  is_null($dst_h)){
        $dst_w = ceil($src_w*$scale);
        $dst_h = ceil($src_h*$scale);
    }
    $src_image=$creatFunc($filename);
    $dst_image=  imagecreatetruecolor($dst_w, $dst_h);
    imagecopyresized($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
    if($destination && !file_exists(dirname($destination))){
        mkdir(dirname($destination),0777,TRUE);
    }
    $dstFileName=$destination==NULL?getUniName().".".getExt($filename):$destination;
    $outFunc($dst_image,$dstFileName);
    imagedestroy($src_image);
    imagedestroy($dst_image);
    if(!$isReservedSource){//是否保留源文件,默认不保留
        unlink($filename);
    }
    return $dstFileName;
}



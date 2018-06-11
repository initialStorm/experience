<?php
/**
 * 生成验证码
 * @param int $type
 * @param int $length
 * @return string
 */
function buildRandomString($type=1,$length=4){
	if ($type == 1) {
		$chars = join ( "", range ( 0, 9 ) );// join把数组元素组合成一个字符串
	} elseif ($type == 2) {
		$chars = join ( "", array_merge ( range ( "a", "z" ), range ( "A", "Z" ) ) );//array_merge将多个数组合并为一个数组,若多个数组间存在相同键名,则要用array_merge_recursive
	} elseif ($type == 3) {
		$chars = join ( "", array_merge ( range ( "a", "z" ), range ( "A", "Z" ), range ( 0, 9 ) ) );
	}
	if ($length > strlen ( $chars )) {
		exit ( "字符串长度不够" );
	}
	$chars = str_shuffle ( $chars );//打乱字符串
	return substr ( $chars, 0, $length );//截取字符串
}

/**
 * 生成唯一字符串
 * @return string
 */
function getUniName(){
    return md5(uniqid(microtime(true),true));
}
/**
 * 得到文件扩展名
 * @return string
 */
function getExt($filename){
    $array=explode(".", $filename);
    $str=end($array);
    $extstr=strtolower($str);
    return $extstr;
}










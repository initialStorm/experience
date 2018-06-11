<?php
include_once 'includes.func.php';
//    $host = "localhost";
//    $user = "root";
//    $password = "";
//    $db_name="shop_xinchang";
/* 
 * 连接数据库
 */
//define("DB_HOST", "localhost");
//define("DB_USER", "root");
//define("DB_PWD", "");
//define("DB_NAME", "shop_xinchang");
//define("DB_CHARSET", "utf8");
function connect(){
     $link= mysqli_connect(DB_HOST,DB_USER,DB_PWD); //连接数据库
    if(!$link){
        die("could not connect".mysql_error());
    }
    mysqli_set_charset($link, DB_CHARSET);
    mysqli_select_db($link, DB_NAME) or die("找不到指定数据库"+ mysql_error());
    return $link;
}
/* 
 * 记录插入
 * @param string $keys
 * @param arrays $vals
 *  @return number
 */
function insert($table,$array){
    $link= mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
     mysqli_set_charset($link, DB_CHARSET);
    $keys=  join(",", array_keys($array));
    $vals=  join(",", array_values($array));
    $invals="'".str_replace(",","','",$vals)."'";
    $sql="insert into {$table} ($keys) values ({$invals})";
    mysqli_query($link, $sql);
    return mysqli_insert_id($link);
}
/*
 * 记录更新
 * @param string $table
 * @param array $array
 * @param string $where
 * @return number
 */
function update($table,$str=null,$array,$where=null){
                  $link= mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
                   mysqli_set_charset($link, DB_CHARSET);
	foreach($array as $key=>$val){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
	}
		$sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
		$result=  mysqli_query($link, $sql);
		//var_dump($result);
		//var_dump(mysql_affected_rows());exit;
		if($result){
			return mysqli_affected_rows($link);
		}else{
			return false;
		}
}

/*
 *删除记录
 * @param string $table
 * @param string $where
 * @return number
 */
function delete($table,$where=null){
                  $link= mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
                   mysqli_set_charset($link, DB_CHARSET);
	$where=$where==null?null:" where ".$where;
	$sql="delete from {$table} {$where}";
	mysqli_query($link,$sql);
	return mysqli_affected_rows($link);
}

/**
 *得到到指定一条记录
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchOne($sql,$result_type=MYSQL_ASSOC){
                  $link= mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
                   mysqli_set_charset($link, DB_CHARSET);
	$result=mysqli_query($link,$sql);
        if($result){
                    $row=  mysqli_fetch_array($result,$result_type);
	return $row;
        }
        else{
                     $row=null;
                     return $row;
        }
}

/**
 * 得到关联结果集所有记录
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchAll($sql,$result_type=MYSQL_ASSOC){
                  $link= mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
                   mysqli_set_charset($link, DB_CHARSET);
                  $result=mysqli_query($link,$sql);
	while(($row = mysqli_fetch_assoc($result)) != false){
		$rows[]=$row;
	}
	return $rows;
}

/**
 * 得到结果集记录条数
 * @param string $sql
 * @return multitype:
 */
function getResultNum($sql){
                  $link= mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
                   mysqli_set_charset($link, DB_CHARSET);
                  $result=mysqli_query($link,$sql);
                  return mysqli_num_rows($result);
}


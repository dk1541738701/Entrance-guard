<?php
//点击生成key
include_once("lianjie.php");
$num = str_pad(mt_rand(0, 999999), 6, "0", STR_PAD_BOTH);//生成六位数
$sql = "INSERT INTO tables.key1 (key1,is valid,kind) VALUES('$num','1','0')";//0代表用户生成的key
$res = mysql_query($sql);
if($res){
	echo "<script>alert('成功获得key为$num');history.go(-1);</script>"; 
}
else{
echo mysql_error();}

?>
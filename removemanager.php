<?php//删除管理员
include_once("lianjie.php");
$name = $_POST['name'];//最高管理员输入管理员姓名
$res1 = mysql_query("SELECT * FROM tables.manager WHERE name='$name'");
$res2 = mysql_query("SELECT * FROM tables.manager WHERE name='$name' and 'is valid'='0'");
if(mysql_num_rows($res1)>0){
	if(mysql_num_rows($res2)>0){
		"<script>alert('该管理员已删除');history.go(-1);</script>"; 
	}
	else{
$sql = "UPDATE  tables.manager SET 'is valid'='0' WHERE name='$name'";//使1变为0
$res = mysql_query($sql);  
if($res){
	echo "<script>alert('删除成功');history.go(-1);</script>"; 
	}
else{
	echo mysql_error();
}}
}
else{
	
		echo "<script>alert('该管理员不存在');history.go(-1);</script>"; 

}
?>
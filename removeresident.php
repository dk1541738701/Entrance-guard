<?php//删除用户
include_once("lianjie.php");
$name = $_POST['name'];//管理员输入用户姓名
$res1 = mysql_query("SELECT * FROM tables.resident_message WHERE name='$name'");
$res2 = mysql_query("SELECT * FROM tables.resident_message WHERE name='$name' and 'is valid'='0'");
if(mysql_num_rows($res1)>0){
	if(mysql_num_rows($res2)>0){
		"<script>alert('该用户已删除');history.go(-1);</script>"; 
	}
	else{
$sql = "UPDATE  tables.resident_messager SET 'is valid'='0' WHERE name='$name'";//使1变为0
$res = mysql_query($sql);  
if($res){
	echo "<script>alert('删除成功');history.go(-1);</script>"; 
	}
else{
	echo mysql_error();
}}
}
else{
	
		echo "<script>alert('该用户不存在');history.go(-1);</script>"; 

}
?>
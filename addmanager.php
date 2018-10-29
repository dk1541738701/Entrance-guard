<?php//添加管理员
include_once("lianjie.php");
$name = $_POST['name'];//最高管理员输入管理员姓名
$res1 = mysql_query("SELECT * FROM tables.manager WHERE name='$name'");
if(mysql_num_rows($res1)>0){

     echo "<script>alert('该管理员已存在');history.go(-1);</script>"; 
}
else{
$sql = "INSERT INTO tables.manager (name,password,is valid) VALUES('$name','hr123456','1')";//姓名，默认密码，1表示存在
$res = mysql_query($sql);  
if($res){
	echo "<script>alert('添加成功');history.go(-1);</script>"; 
}
else{
	echo mysql_error();
}
}
?>
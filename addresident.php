<?php  //管理员直接添加用户
include_once("lianjie.php"); //连接数据库
if(empty($_POST)){ 
     exit("您提交的表单数据超过post_max_size的配置！<br/>"); 
}
$adress = $_POST['adress'];  //地址
$idcard = $_POST['idcard']; //身份证
$name = $_POST['name']; //姓名
$NameSQL = "SELECT * FROM tables.resident_message WHERE name='$name'"; 
$result = mysql_query($NameSQL); 
if(mysql_num_rows($resultSet)>0){
     echo"<script>alert('该用户已经注册!');history.go(-1);</script>"; 
	 closeConnection();
}else{
$time = date("Y-m-d H:i:s", time()+8*3600);   //时间
$sql = "INSERT INTO tables.resident_message (name,password,adress,idcard,Date of registration) VALUES('$name','hr123456','$adress','$idcard','$time')";//默认密码hr123456
$res = mysql_query($sql);
					if($res){
						 echo  "<script>alert('用户信息注册成功！')history.go(-1);</script>"; 
						 
					}else{ 
                    echo  "<script>alert('用户信息注册失败！')</script>"; 
}}

closeConnection();
 ?>
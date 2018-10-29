<style>
table td{
	    width:200px;
        height: 25px;
        text-align: center;
        font-size: 14.5px;
    }
table th{
	    width:200px;
        height: 25px;
        text-align: center;
        
    }
	
</style>
<code class="language-javascript"><input type="button"name="back" value="返回"onClick="javascript:history.back()"></code>  
<table border="1" >
 <tr>
 <th>
 <div align="center" >用户姓名</div></th>
 <th><div align="center" >进入的门</div></th>
 <th> <div align="center" >进门时间 </div></th>
 <th><div align="center" >出门时间</div></th>
 </tr> 
</table>

<?php
include_once("lianjie.php");
$pageSize = 10	; //每页显示数据条数
  
$result2 = mysql_query("select * from tables.log");
$totalNum = mysql_num_rows($result2); //数据总条数
  
$totalPageCount = intval($totalNum/$pageSize); //总页数
  
//判断当前页是哪一页
$nowPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
//上一页
$prev = ($nowPage-1 <= 0) ? 1 : $nowPage-1;
//下一页
$next = ($nowPage+1 >= $totalPageCount) ? $totalPageCount : $nowPage+1;
  
//偏移量
$offset = ($nowPage-1)*$pageSize;
$result1 = mysql_query("SELECT * FROM tables.log limit $offset,$pageSize" );	
while($arr = mysql_fetch_array($result1)){ //循环输出数据
   
    $table .= '<tr><td>'.$arr["name"].'</td>
	<td>'.$arr["door"].'</td>
	<td>'.$arr["intime"].'</td>
	<td>'.$arr["outtime"].'</td>
	<tr>';
	
}
$table .= '</table>';
echo($table);

echo "<a href=\"".$_SERVER['PHP_SELF']."?page=1\">首页</a>";
echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$prev."\">上一页</a>";
echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$next."\">下一页</a>";
echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$totalPageCount."\">尾页</a>";


?>
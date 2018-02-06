<html>
<body>
<?php
$link = mysql_connect("locakhost","root","") or die("無法連接");
mysql_query("SET NAMES 'UTF8'");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8");
mysql_select_db("test",$link) or die("無法選擇資料庫".mysql_error());
?>

<form method="post" name="search_english">                      		
	<input type="text" name="search" placeholder="請輸入英文..." onchange="this.form.submit()">
	<?php $_SESSION['search']=$_POST['search']?>
	<script> document.search_english.search.value = '<?php $_SESSION["search"]?>';</script>          		
	<table width="300" border="1">
		<tr>
			<td>中文</td>
			<td>英文</td>
		</tr>
		<?php
			($_SESSION['search']=='') ? $search='' : $search='where english='.$_SESSION['search'].'';			
			$sql=mysql_query($link,"select *  from dictionary".$Search."");//查詢
			for($i=1;$i<=mysql_num_row($sql);$i++) {
				$row=mysql_fetch_row($sql);
			}
		?>
			<tr>
				<td><? echo $row[chinese];?></td>
				<td><? echo $row[english];?></td>
				<td><input type="subimt" value="刪除" name=<? echo $row[english];?>></input></td>
			</tr>			
	</table>
</form>	
<button type="button"onclick="location.href='/add.php'">新增</button>

<script>
$(document).ready(function(){
	$("input[type=subimt]").on("click","function(){
		var data=$(this).attr("name");
		$.ajax({
			type:"POST",
			url:"del.php",
			data:data,
			cache:false,
			susses: function(){
				alert(""+data+"刪除成功！");
			}
	});


});
</script>
</html>
</body>
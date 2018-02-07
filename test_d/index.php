<?php
include_once("./mysqli_connect.inc.php");
?>
<html>
 <head>
 	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
 </head>
<body>
<form method="post" name="search_english" id="search_english">
	<input type="text" name="search" placeholder="請輸入英文..." onchange="this.form.submit()" />
	<?php $_SESSION['search']= isset($_POST['search'])?$_POST['search']:''; ?>
	<script> document.search_english.search.value = "<?php echo $_SESSION["search"]; ?>";</script>
	<table width="300" border="1">
		<tr>
			<td>中文</td>
			<td>英文</td>
		</tr>
		<?php
			($_SESSION['search']=='') ? $search='' : $search=' WHERE english=\''.$_SESSION['search'].'\'';
			$sql=mysqli_query($link,"SELECT * FROM dictionary".$search); //查詢
			if ($sql) $iCount = mysqli_num_rows($sql);
			else $iCount = 0;
			for($i=1;$i<=$iCount;$i++):
				$row=mysqli_fetch_assoc($sql);
		?>
			<tr>
				<td><?php echo $row['chinese'];?></td>
				<td><?php echo $row['english'];?></td>
				<td><input type="button" value="刪除" name="<?php echo $row['english']; ?>" /></td>
			</tr>
		<?php endfor; ?>
	</table>
</form>
<button type="button" onclick="javascript:location.href='./add.php'">新增</button>

<script>
$(document).ready(function(){
	$("input[type=button]").on("click",function(){
		var data=$(this).attr("name");
		$.ajax({
			url: "./del.php",
			method: "POST",
			data: { data: data},
			cache:false,
			success: function(){
				alert(""+data+"刪除成功！");
				location.href='./index.php';
			}
		}).fail(function() {
		    alert( "error" );
		});
	});
});
</script>
</html>
</body>
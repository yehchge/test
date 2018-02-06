<?php
$new_english=$_POST['new_english'];
$new_chinese=$_POST['new_chinese'];

$link = mysql_connect("locakhost","root","") or die("無法連接");
mysql_query("SET NAMES 'UTF8'");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8");
mysql_select_db("test",$link) or die("無法選擇資料庫".mysql_error());
$sql = mysql_query($link,"SELECT * FROM dictionary");
$row = @mysql_fetch_row($sql);
if($new_chinese!=null && $new_english!=null && $row['english'] != $new_english){
	$sql = $mysql_query($link,"INSERT INTO dictionary (english , chinese) VALUES ('".$new_english."','".$new_chinese."')");
	header('Location:/test_1.php');
	exit;
}
?>

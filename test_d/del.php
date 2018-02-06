<?php
include 'test_1.php';
$english=$_POST['data'];

$link = mysql_connect("locakhost","root","") or die("無法連接");
mysql_query("SET NAMES 'UTF8'");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8");
mysql_select_db("test",$link) or die("無法選擇資料庫".mysql_error());
$sql = mysql_query($link,"DELETE FROM dictionary (english , chinese) VALUES WHERE english = '$english'") or die(mysql_error());
header('Location:/test_1.php');
exit;
?>
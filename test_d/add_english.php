<?php

include_once("./mysqli_connect.inc.php");

$new_english = isset($_POST['new_english'])?$_POST['new_english']:'';
$new_chinese = isset($_POST['new_chinese'])?$_POST['new_chinese']:'';

$sql = mysqli_query($link,"SELECT * FROM dictionary WHERE english='$new_english' OR chinese='$new_chinese'");
$row = @mysqli_fetch_row($sql);
if($new_chinese!='' && $new_english!='' && !$row){
	$sql = mysqli_query($link,"INSERT INTO dictionary (english , chinese) VALUES ('".$new_english."','".$new_chinese."')");
	header('Location:./index.php');
	exit;
}else{
    echo "<script>alert('資料已經存在');location.href='./index.php';</script>";
    exit;
}
?>
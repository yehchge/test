<?php

include_once("./mysqli_connect.inc.php");
$english = isset($_POST['data'])?$_POST['data']:'';
$sql = mysqli_query($link,"DELETE FROM dictionary WHERE english = '$english'") or die(mysqli_error($link));

?>
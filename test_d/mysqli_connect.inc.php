<?php

//資料庫設定
//資料庫位置
$db_server = "localhost";

//資料庫名稱
$db_name = "test";

//資料庫管理者帳號
$db_user = "root";

//資料庫管理者密碼
$db_passwd = "123456";

//對資料庫連線
$link = mysqli_connect($db_server, $db_user, $db_passwd) OR die("無法對資料庫連線");

//資料庫連線採UTF8
mysqli_query($link,"SET NAMES utf8");
mysqli_query($link,"SET CHARACTER_SET_CLIENT=UTF8");
mysqli_query($link,"SET CHARACTER_SET_RESULTS=UTF8");

//選擇資料庫
mysqli_select_db($link, $db_name) OR die("無法選擇資料庫. ".mysqli_error($link));

?>
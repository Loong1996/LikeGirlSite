<?php
//【当前数据库信息配置为预处理数据库信息】
error_reporting(0);
header("Content-Type:text/html; charset=utf8");
include_once __DIR__.'/Config_DB.php';
$conn = new mysqli($db_address,$db_username,$db_password,$db_name);

if ($conn->connect_error) {
    die("<script>location.href = '../admin/connectDie.php';</script>");
}
$conn->query("SET NAMES 'utf8'");
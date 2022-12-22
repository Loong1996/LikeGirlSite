<?php
/*
 * @Author: Ki.
 * @Date: 2022-12-20 15:01:09
 * @LastEditors: Ki.
 * @LastEditTime: 2022-12-20 15:01:54
 * @Description: 花有重开日 人无再少年
 * Copyright (c) 2022 by Ki All Rights Reserved. 
 */
header("Content-Type:text/html; charset=utf8");
//localhost 为数据库地址 一般用默认的即可 或（127.0.0.1）
$db_address = "localhost";
//数据库用户名
$db_username = "root";
//数据库密码
$db_password = "root";
//数据库表名 （默认与数据库用户名相同）
$db_name = "like";
//敏感信息修改安全码 建议设置复杂一些
$Like_Code = "likegirl";

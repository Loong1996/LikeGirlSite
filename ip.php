<?php

include_once 'admin/Function.php';

$ip = $_SERVER['REMOTE_ADDR'];
$time = gmdate("Y-m-d/H:i:s", time() + 8 * 3600);
$gsd = get_ip_city_New($ip);
$file = "ip.txt";
$fp = fopen("ip.txt", "a");
$txt = "\n" . "$ip" . "\n" . "$gsd" . "----" . "$time" . "\n";
fputs($fp, $txt);


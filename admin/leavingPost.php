<?php
session_start();

$name = trim($_POST['name']);
$qq = trim($_POST['qq']);
$text = trim($_POST['text']);
$time = time();
$ip = trim($_POST['ip']);
$Filter_Name = replaceSpecialChar($name);
$Filter_QQ = replaceSpecialChar($qq);
$Filter_Text = replaceSpecialChar($text);
$Filter_Time = replaceSpecialChar($time);
$Filter_IP = replaceSpecialChar($ip);
$file = $_SERVER['PHP_SELF'];

function checkQQ($qq) {
    if (preg_match("/^[1-9][0-9]{4,}$/", $qq)) {
        return true;
    } else {
        return false;
    }
}

function replaceSpecialChar($Symbol){
    $Filter = "/\ |\/|\~|\!|\@|\-|\=|\#|\\$|\%|\^|\&|\:|\*|\"|\(|\)|\_|\+|\{|\}|\<|\>|\?|\[|\]|\,|\/|\;|\'|\`|\=|\\\|\||/";
    return preg_replace($Filter ,"",$Symbol);
}


include_once 'Database.php';


if (!$_COOKIE["KiCookie"]) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (is_numeric($qq) && (!empty($Filter_Name)) && (!empty($Filter_Text))) {
            if (filter_var($Filter_IP, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                if (checkQQ($Filter_QQ)) {
                    $charu = "insert into leaving (name,QQ,text,time,ip) values (?,?,?,?,?)";
                    $stmt = $conn->prepare($charu);
                    $stmt->bind_param("sisss", $Filter_Name, $Filter_QQ, $Filter_Text, $Filter_Time, $Filter_IP);
                    $Filter_Name = replaceSpecialChar($name);
                    $Filter_QQ = replaceSpecialChar($qq);
                    $Filter_Text = replaceSpecialChar($text);
                    $Filter_Time = replaceSpecialChar($time);
                    $Filter_IP = replaceSpecialChar($ip);
                    $result = $stmt->execute();
                    if (!$result) echo "错误信息：" . $stmt->error;
                    $stmt->fetch();

                } else {
                    echo "3";
                }
            } else {
                echo "4";
            }
        } else {
            echo "5";
        }

        if ($result) {
            echo "1";
            setcookie("KiCookie",$Filter_IP, time()+3600*24);
        } else {
            echo "0";
        }
    } else {
        echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route    =$file';</script>";
    }
} else{
    echo"8";
}

// $stmt->close();


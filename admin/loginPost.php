<?php
session_start();
@($user = $_POST['adminName']);
@($pw = $_POST['pw']);
include_once "Database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "select * from login where user =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $USER);
    $USER = mysqli_real_escape_string($conn, $user);
    $PW = md5($pw);
    $stmt->bind_result($id, $Login_user, $Login_pw);
    $result = $stmt->execute();
    if (!$result) echo "错误信息：" . $stmt->error;
    $stmt->fetch();
}

    if ($USER == $Login_user) {
        if ($PW == $Login_pw) {
            $_SESSION['loginadmin'] = $USER;
            echo "<script>alert('登录成功');location.href = '../admin/index.php';</script>";
        } else {
        }
        die("<script>alert('登录失败，密码错误');history.back();</script>");
    } else {
        die("<script>alert('登录失败，用户名错误');history.back();</script>");
    }



$stmt->close();

<?php
session_start();
?>

<?php
//修改文章
$id = $_POST['id'];
$title = htmlspecialchars(trim($_POST['articletitle']),ENT_QUOTES);
$text = trim($_POST['articletext']);
$time = gmdate("Y-m-d", time() + 8 * 3600);
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $sql = "update article set articletitle = '$title', articletext = '$text' where id = '$id'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}


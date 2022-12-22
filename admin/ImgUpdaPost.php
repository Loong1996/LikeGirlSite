<?php
session_start();
?>

<?php
$id = trim($_POST['id']);
$imgText = htmlspecialchars(trim($_POST['imgText']),ENT_QUOTES);
$imgDatd = trim($_POST['imgDatd']);
$imgUrl = htmlspecialchars(trim($_POST['imgUrl']),ENT_QUOTES);
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $sql = "update loveImg set imgText = '$imgText', imgDatd = '$imgDatd',imgUrl ='$imgUrl' where id = '$id'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}


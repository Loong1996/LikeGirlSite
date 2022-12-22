<?php
session_start();
?>

<?php
$imgText = htmlspecialchars(trim($_POST['imgText']),ENT_QUOTES);
$imgDatd = trim($_POST['imgDatd']);
$imgUrl = htmlspecialchars(trim($_POST['imgUrl']),ENT_QUOTES);
$file = $_SERVER['PHP_SELF'];


include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $charu = "insert into loveImg (imgDatd,imgText,imgUrl) values ('$imgDatd','$imgText','$imgUrl')";
    $result = mysqli_query($connect, $charu);
    if ($result) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}

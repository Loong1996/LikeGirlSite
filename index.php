<!DOCTYPE html>
<html>
<head>
    <?php
    include_once 'head.php';
    ?>
    <meta charset="utf-8"/>
    <title><?php echo $text['title'] ?></title>
    <!-- 定义视窗 -->
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <!-- 引入思源宋体 -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Style/css/index.css">
</head>
<body>
<div id="pjax-container">
    <!-- 时间区域 -->
    <div class="time">
        <span id="span_dt_dt"></span>
        <b id="tian"></b>天
        <b id="shi"></b>时
        <b id="fen"></b>分
        <b id="miao"></b>秒
    </div>
    <!-- 卡片区域 -->
    <div class="card-wrap">
        <div class="row central">
            <div class="card col-lg-4 col-sm-12 col-sm-x-12 flex-h">
                <img src="Style/img/diandian.png" alt="">
                <div class="text">
                    <span><a target="_self" href="little.php"><?php echo $text['card1'] ?></a></span>
                    <p><?php echo $text['deci1'] ?></p>
                </div>
            </div>
            <div class="card col-lg-4 col-sm-12 col-sm-x-12 flex-h">
                <img src="Style/img/liuyan.png" alt="">
                <div class="text">
                    <span><a target="_self" href="leaving.php"><?php echo $text['card2'] ?></a></span>
                    <p><?php echo $text['deci2'] ?></p>
                </div>
            </div>
            <div class="card col-lg-4 col-sm-12 col-sm-x-12 flex-h">
                <img src="Style/img/about.png" alt="">
                <div class="text">
                    <span><a target="_self" href="about.php"><?php echo $text['card3'] ?></a></span>
                    <p><?php echo $text['deci3'] ?></p>
                </div>
            </div>
            <div class="card-b col-lg-6 col-12 col-sm-12 flex-h">
                <img src="Style/img/loveimg.png" alt="">
                <div class="text">
                    <span><a target="_self" href="loveImg.php">Love Photo</a></span>
                    <p>恋爱相册 记录最美瞬间</p>
                </div>
            </div>
            <div class="card-b col-lg-6 col-12 col-sm-12 flex-h">
                <img src="Style/img/xinf.png" alt="">
                <div class="text">
                    <span><a target="_self" href="list.php">Love List</a></span>
                    <p>恋爱列表 你我之间的约定</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>

</body>
</html>

<?php
session_start();
?>

<?php
include_once 'connect.php';
$url = 'https://www.kikiw.cn/Love/likev5.php';
$lines_array = file($url);
$lines_string = implode('', $lines_array);
$userurl = 'https://www.kikiw.cn/Love/user.php';
$userarray = file($userurl);
$userstring = implode('', $userarray);
?>
<?php
include_once 'Nav.php';
?>

<style>
    .btn-success {
        border-radius: 10px;
        border: 2px solid #fff;
    }

    .btn-success:hover {
        background-color: 0;
        border-color: 0;
        opacity: 0.7;
    }

</style>

<!--
 * @Author: Ki.
 * @Description: 本页面对前端无任何影响 建议保留 
 * @Description: 如更改后则无法获取最新版本内容等信息
 * @Description: 删除或更改本页信息 无法享用更新版本服务  请慎重考虑
 * Copyright (c) 2022 by Ki All Rights Reserved. 
-->


<div class="row">

    <div class="col-sm-12">
        <?php echo($userstring); ?>
    </div>

    <div class="col-md-12">
        <?php echo($lines_string); ?>
    </div>

</div>

<?php
include_once 'Footer.php';
?>

</body>
</html>
<?php include("ipjc.php"); ?>
<?php
error_reporting(0);
include_once 'admin/connect.php';
$sql = "select * from text ";
$result = mysqli_query($connect, $sql);
$text = mysqli_fetch_array($result);

$sql = "select * from diySet";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result)) {
    $diy = mysqli_fetch_array($result);
}
$copy = $text['Copyright'];
$icp = $text['icp'];
$Animation = $text['Animation']
?>
<script src="ip.php"></script>
<script>
    function show_date_time() {
        window.setTimeout("show_date_time()", 1000);
        BirthDay = new Date("<?php echo $text['startTime']?>");
        today = new Date();
        timeold = (today.getTime() - BirthDay.getTime());
        sectimeold = timeold / 1000;
        secondsold = Math.floor(sectimeold);
        msPerDay = 24 * 60 * 60 * 1000;
        e_daysold = timeold / msPerDay;
        daysold = Math.floor(e_daysold);
        e_hrsold = (e_daysold - daysold) * 24;
        hrsold = Math.floor(e_hrsold);
        e_minsold = (e_hrsold - hrsold) * 60;
        minsold = Math.floor((e_hrsold - hrsold) * 60);
        seconds = Math.floor((e_minsold - minsold) * 60);
        var timeKi = document.getElementById('span_dt_dt');
        if (timeKi !== null) {
            span_dt_dt.innerHTML = "这是我们一起走过的";
            tian.innerHTML = daysold;
            shi.innerHTML = hrsold;
            fen.innerHTML = minsold;
            miao.innerHTML = seconds;
        }
    }

    show_date_time();
</script>
<!--
 * @Author: Ki.
 * @Date: 2022-12-21 07:35:43
 * @LastEditTime: 2022-12-21 07:51:06
 * @Description: 花有重开日 人无再少年
 * Copyright (c) 2022 by Ki All Rights Reserved. 
-->

<!-- Like Girl v5.0.0 -->
<!-- Copyright (c) 2022 Ki. -->
<!-- Date：2022-09-10 -->
<!-- Document：https://blog.kikiw.cn/index.php/archives/46/ -->
<!-- Warning：禁止以任何方式出售本项目 如有发现一切后果自行负责 -->
<!-- 开发不易 版权信息请保留 -->

<script>
    console.log("%c Like Girl v5.0.0 | Powered by Ki", "color:#fff;background:linear-gradient(270deg,#986fee,#8695e6,#68b7dd,#18d7d3);padding:8px 15px;border-radius:15px");
    console.log("%c Q | 3439780232", "color:#fff;background:#000;padding:8px 15px;border-radius:15px");
</script>
<link rel="shortcut icon" href="/favicon.ico"/>
<!-- 定义视窗 -->
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<!-- 引入思源宋体 -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../Style/css/leaving.css">
<link rel="stylesheet" href="../Style/css/index.css">
<link rel="stylesheet" href="../Style/css/animate.min.css">
<link rel="stylesheet" href="../Style/css/little.css">
<link rel="stylesheet" href="../Style/css/about.css">
<link rel="stylesheet" href="../Botui/botui.min.css">
<link rel="stylesheet" href="../Botui/botui-theme-default.css">
<link rel="stylesheet" href="../Style/css/loveImg.css">
<link rel="stylesheet" href="../Style/css/list.css">
<link rel="stylesheet" href="../Style/Font/font_list/iconfont.css">
<link rel="stylesheet" href="../Style/toastr/toastr.css">
<link rel="stylesheet" href="../Style/css/loadinglike.css">
<script src="../Style/Font/font_leav/iconfont.js"></script>
<script src="../Style/Font/font_leav/iconfont.js"></script>
<script src="../Botui/botui.min.js"></script>
<script src="https://cdn.staticfile.org/vue/2.2.2/vue.min.js"></script>
<script src="../Style/jquery/jquery.min.js"></script>
<script src="../Style/js/jquery.pjax.js" type="text/javascript"></script>
<script src="../Style/pagelir/spotlight.bundle.js"></script>
<script src="../Style/js/loading.js"></script>
<?php echo htmlspecialchars_decode($diy['headCon'],ENT_QUOTES) ?>
<?php if ($diy['Pjaxkg'] == "1") { ?>
    <script>
        $(document).pjax('a[target!=_blank]', '#pjax-container', {fragment: '#pjax-container', timeout: 8000});
        $(document).on('pjax:send', function () {
            NProgress.start();
        });
        $(document).on('pjax:complete', function () {
            $("img[src$=jpg],img[src$=gif],img[src$=JPG],img[src$=png],img[src$=jpeg]").addClass("spotlight");
            NProgress.done();
            $(".lovelist ul").hide();
            $(".lovelist li").bind("click", function () {
                $(this).next("ul").slideToggle(500).siblings("ul").slideUp(500);
            })


        });
    </script>
<?php } ?>
<script src="../Style/js/nprogress.js"></script>
<link href="../Style/css/nprogress.css" rel="stylesheet" type="text/css">
<!-- 头部导航条 -->
<div class="header-wrap">
    <div class="header">
        <div class="logo">
            <h1><a class="alogo" href="index.php"><?php echo $text['logo'] ?></a></h1>
        </div>
        <div class="word">
            <span class="wenan"><?php echo $text['writing'] ?></span>
        </div>
    </div>
</div>
<!-- 头像内容 -->
<div class="bg-wrap">
    <div class="bg-img">
        <div class="central central-800">
            <div class="middle <?php if ($text['Animation'] == "1") { ?>animated bounce<?php } ?> <?php if ($diy['Blurkg'] == "2") { ?>Blurkg<?php } ?>">
                <div class="img-male">
                    <img src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $text['boyimg'] ?>&s=640" alt="">
                    <span><?php echo $text['boy'] ?></span>
                </div>
                <div class="love-icon">
                    <img src="Style/img/like.svg" alt="">
                </div>
                <div class="img-female">
                    <img src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $text['girlimg'] ?>&s=640" alt="">
                    <span><?php echo $text['girl'] ?></span>
                </div>
            </div>
        </div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave"
                      d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7"/>
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)"/>
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)"/>
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff"/>
            </g>
        </svg>
    </div>
</div>

<script>
    window.onscroll = function () {
        var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        if (scrollTop > 500) {
            $('.wenan').css({
                'color': '#707070'
            });
            $('.alogo').css({
                'color': '#707070'
            });
        }

        if (scrollTop < 500) {
            $('.wenan').css({
                'color': '#fff'
            });
            $('.alogo').css({
                'color': '#fff'
            });
        }
    }

</script>

<style>
    .central.bg .row .card .leavform .textinfo .time {
        text-align: right;
        display: inherit;
        font-family: 'Noto Serif SC', serif;
        font-weight: 400;
        color: #423a3a;
    }

    .bg-img {
        background: url(<?php echo $text['bgimg']?>) no-repeat center !important;
        background-size: cover !important;
    }

    .wenan {
        color: #fff;
        transition: all 0.2s linear;
    }

    .alogo {
        color: #fff;
        transition: all 0.2s linear;
    }

    code {
        padding: 0.4rem 0.5rem;
        border-radius: 0.4rem;
        font-size: 1rem;
        color: #fa5c7c;
        background-color: rgba(250, 92, 124, .18);
        font-family: 'Noto Serif SC', serif;
        font-weight: 700;
    }

    quote {
        width: 98% !important;
    }

    /* webkit, opera, IE9 （谷歌浏览器）*/
    ::selection {
        background: #6f6f6fc7;
        color: #ffffff;
    }

    /* mozilla firefox（火狐浏览器） */
    ::-moz-selection {
        background: #6f6f6fc7;
        color: #ffffff;
    }

    .delay-03s {
        -webkit-animation-delay: .3s;
        animation-delay: .3s;
    }

    .Blurkg {
        backdrop-filter: blur(0px) !important;
        background: transparent !important;
    }

    .cpt-loading-mask.column {
        background: transparent !important;
    }
</style>
<style>
    <?php echo $diy['cssCon'] ?>
</style>
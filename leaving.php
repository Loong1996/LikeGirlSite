<?php
include_once 'admin/connect.php';
$nub = "select count(id) as shu from leaving";
$res = mysqli_query($connect, $nub);
$leav = mysqli_fetch_array($res);
$shu = $leav['shu'];
$leavSet = "select * from leavSet order by id desc";
$Set = mysqli_query($connect, $leavSet);
$Setinfo = mysqli_fetch_array($Set);
$jiequ = $Setinfo['jiequ'];

$lyip = $_SERVER['REMOTE_ADDR'];
include_once 'admin/Database.php';
    $liuyan = "SELECT * FROM leaving order by id desc limit ?";
    $stmt=$conn->prepare($liuyan);
    $stmt->bind_param("i",$jiequ );
    $jiequ = $Setinfo['jiequ'];
    $stmt->bind_result($id,$name,$qq,$text,$time,$ip);
    $result = $stmt->execute();
    if(!$result) echo "错误信息：".$stmt->error;
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include_once 'head.php';
    ?>

    <meta charset="utf-8"/>
    <title><?php echo $text['title'] ?> — <?php echo $text['card2'] ?></title>
</head>
<body>

<div id="pjax-container">
    <div class="central central-800 bg">
        <h3>已收到 <b><?php echo $leav['shu'] ?></b> 条祝福留言<i class="jiequ">（显示最新 <?php echo $jiequ ?>条）</i></h3>

        <div class="row">
            <div class="card col-lg-12 col-md-12 col-sm-12 col-sm-x-12">
                <?php
                while ($stmt->fetch()) {
                    ?>
                    <div class="leavform <?php if ($Animation == "1") { ?>animated jackInTheBox delay-03s<?php } ?>">
                        <img src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $qq ?>&s=640" alt="">
                        <div class="textinfo">
                            <span class="name"><?php echo $name ?></span>
                            <b></b>
                            <span class="name ipclass"><?php if (get_ip_city($ip)) { ?><?php echo get_ip_city($ip) ?><?php } else { ?>未知<?php } ?>
                        </span>
                            <i class="time"><?php echo time_tran($time) ?></i>
                            <div class="text"><?php echo $text ?></div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <form action="admin/leavingPost.php" method="post">
                    <div class="inputbox">
                         <img src="https://q1.qlogo.cn/g?b=qq&nk=1234567&s=100" alt="" class="avatar">
                        <input id="QQ" type="text" name="qq" placeholder="QQ号码" class="rig">
                        <svg class="leav_icon sm22" aria-hidden="true">
                            <use xlink:href="#icon-xunzhang"></use>
                        </svg>
                        <input id="nickname" type="text" name="name" placeholder="昵称（自动获取）" class="let">
                    </div>
                    <textarea name="text" id="wenben" rows="8" placeholder="请输入您的留言内容（恶意留言会封禁IP...）"></textarea>
                    <div class="input-sub">
                        <input name="ip" value="<?php echo $lyip ?>" type="hidden">
                        <button type="button" id="leavingPost" class="tijiao" onclick="return testing()">提交留言</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
            $('#QQ').blur(function () {
            var QQ = $("#QQ").val();
                $.ajax({
                url: "https://api.usuuu.com/qq/" + QQ,
                type: "GET",
                timeout:5000,
                dataType: "json",
                statusCode: {
                    500: function (response) {
                        loadingname();
                        setTimeout(function(){
                			removeLoading('test');
                			toastr["warning"]("获取失败 QQ号码错误", "Like_Girl");
                		},2000);
                    }
                },
                success: function (result) {
                    if(result.code == 500){
                        removeLoading('test');
                		toastr["warning"]("获取失败 QQ号码长度错误", "Like_Girl");
                    }
                    loadingname();
                    $("#nickname").val(result["data"].name);
                    $(".avatar").attr("src", result["data"].avatar);
                    setTimeout(function(){
                			removeLoading('test');
                			toastr["success"]("获取昵称头像成功", "Like_Girl");
                		},1200);
                }
            }); 
            });

            function testing() {
            let qq = document.getElementsByName('qq')[0].value.trim();
            let name = document.getElementsByName('name')[0].value.trim();
            if (qq.length == 0) {
                toastr["warning"]("请填写QQ号码！", "Like_Girl");
                return false;
            } else if (name.length == 0) {
                toastr["warning"]("请填写恁的昵称！", "Like_Girl");
                return false;
            }
            let qqlength = /^[0-9]{6,10}$/;
            if (!qqlength.test(qq)) {
                toastr["warning"]("您的QQ号码格式错误 <br/> 请输入由6-10位的数字 <br/>组成的QQ号码！", "Like_Girl");
                return false;
            }
            if ((qq == 123456) || (qq == 100000) || (qq == 1234567)) {
                toastr["warning"]("我想也许这并不是您的QQ号码...", "Like_Girl");
                return false;
            }
            let text = document.getElementsByName('text')[0].value.trim();
            if (text.length == 0) {
                toastr["warning"]("请填写您要留言的内容！", "Like_Girl");
                return false;
            } else if (text.length <= 2) {
                toastr["warning"]("请填写两个字符以上的内容！", "Like_Girl");
                return false;
            }
            let nonub = /^[0-9]+$/;
            let filter = new RegExp("[<?php echo $Setinfo['lanjie']?>]");
            let weifan = new RegExp("[<?php echo $Setinfo['lanjiezf']?>]");
            if (filter.test(text)) {
                toastr["warning"]("您输入的内容含有非法字符！", "Like_Girl");
                return false;
            } else if (nonub.test(text)) {
                toastr["warning"]("内容为纯数字 已被拦截！", "Like_Girl");
                return false;
            } else if (weifan.test(text)) {
                toastr["warning"]("您输入的内容是违禁词 <br/>请注意您的发言不文明的留言 <br/>会被管理员拉进小黑屋喔", "Like_Girl");
                return false;
            }
        }

        $("#leavingPost").click(function () {
        $('#leavingPost').text('留言提交中...');
        $("#leavingPost").attr("disabled", "disabled");
        var qq = $("input[name='qq']").val();
        var name = $("input[name='name']").val();
        var text = $("textarea[name='text']").val();
        var ip = $("input[name='ip']").val();
        $.ajax({
                url: "admin/leavingPost.php",
                data: {
                    qq: qq,
                    name: name,
                    text: text, 
                    ip: ip,
                },
                type: "POST",
                dataType: "text",
                success: function (res) {
                    setInterval(()=>{
                    $('#leavingPost').removeAttr("disabled");
                    },5000); 
                    if (res == 1) {
                        toastr["success"]("留言提交成功 请刷新本页查看！", "Like_Girl");
                        $('#leavingPost').text('留言成功');
                    } else if (res == 0) {
                        toastr["error"]("留言提交失败！", "Like_Girl");
                        $('#leavingPost').text('留言失败');
                    }else if (res == 3 || res == 30) {
                        toastr["error"]("留言失败——QQ号码格式错", "Like_Girl");
                         $('#leavingPost').text('留言失败');
                    }else if (res == 4|| res == 40) {
                        toastr["error"]("留言失败——IP格式错误", "Like_Girl");
                         $('#leavingPost').text('留言失败');
                    }else if (res == 5 || res == 50) {
                        toastr["error"]("留言失败——参数错误", "Like_Girl");
                         $('#leavingPost').text('留言失败');
                    }else if (res == 8) {
                        toastr["error"]("留言失败——你今天已经留言过了~", "Like_Girl");
                         $('#leavingPost').text('留言失败');
                    }else{
                        toastr["error"]("未知错误！", "Like_Girl");
                    }
                },
                error: function (err) {
                    toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
                }
            }
        )
    })
	function loadingname() {
		$('body').loading({
			loadingWidth:240,
			title:'获取昵称头像中',
			name:'test',
			discription:'请稍等片刻',
			direction:'column',
			type:'origin',
			// originBg:'#71EA71',
			originDivWidth:40,
			originDivHeight:40,
			originWidth:6,
			originHeight:6,
			smallLoading:false,
			loadingMaskBg:'rgba(0,0,0,0.2)'
		});

	}
    </script>
    <?php
    function get_ip_city($ip)
    {
        $ch = curl_init();
        $url = 'https://whois.pconline.com.cn/ipJson.jsp?ip=' . $ip;
        //用curl发送接收数据
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //请求为https
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $location = curl_exec($ch);
        curl_close($ch);
        //转码
        $location = mb_convert_encoding($location, 'utf-8', 'GB2312');
        //var_dump($location);
        //截取{}中的字符串
        $location = substr($location, strlen('({') + strpos($location, '({'), (strlen($location) - strpos($location, '})')) * (-1));
        //将截取的字符串$location中的‘，’替换成‘&’   将字符串中的‘：‘替换成‘=’
        $location = str_replace('"', "", str_replace(":", "=", str_replace(",", "&", $location)));
        //php内置函数，将处理成类似于url参数的格式的字符串  转换成数组
        parse_str($location, $ip_location);
        return $ip_location['pro'];
    }

    function time_tran($time)
    {
        $text = '';
        if (!$time) {
            return $text;
        }
        $current = time();
        $t = $current - $time;
        $retArr = array('刚刚', '秒前', '分钟前', '小时前', '天前', '月前', '年前');
        switch ($t) {
            case $t < 0:
                $text = date('Y-m-d', $time);
                break;
            case $t == 0:
                $text = $retArr[0];
                break;
            case $t < 60:
                $text = $t . $retArr[1];
                break;
            case $t < 3600:
                $text = floor($t / 60) . $retArr[2];
                break;
            case $t < 86400:
                $text = floor($t / 3600) . $retArr[3];
                break;
            case $t < 2592000:
                $text = floor($t / 86400) . $retArr[4];
                break;
            case $t < 31536000:
                $text = floor($t / 2592000) . $retArr[5];
                break;
            default :
                $text = floor($t / 31536000) . $retArr[6];
        }
        return $text;
    }

    ?>
</div>

<?php
include_once 'footer.php';
?>


</body>
</html>

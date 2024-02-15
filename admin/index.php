<?php
session_start();
?>

<?php
include_once 'connect.php';
$liuyan = "select * from leaving order by id desc limit 0,6";
$resliuyan = mysqli_query($connect, $liuyan);
?>
<?php
include_once 'Nav.php';
?>
<?php if ($login['user'] == $adminuser)  {?>
<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Error - </strong> 当前账号为默认账号 请尽快修改！
</div>
<?php }?>
<?php if ($login['pw'] == md5($adminpw))  {?>
    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Error - </strong> 当前密码为默认密码 请尽快修改！
    </div>
<?php }?>

<div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">欢迎使用LikeGirl情侣小站</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>经过半年的开发磨练 情侣小站迎来了延伸版本【LGNewUI】目前已经开发了许多实用功能 满足情侣记录所需 </p>
                <p>如您感兴趣请点击下方按钮【查看详情】进一步了解 如有打扰 请到【admin/index.php】删除当前弹窗信息</p>
                <p>感谢您的使用 当前新春特惠 购买仅需<span class="badge badge-danger-lighten">168.88/元</span> 功能详情可点击下方按钮了解</p>
                <div>
                    <h3>LG_NewUi 情侣小站新春限定版</h3>
                    <ul>
                        <li>2.0.0 版本号 2023050108 发布于 2023-04-30</li>
                        <li>2.2.0 版本号 2023052018 发布于 2023-05-20</li>
                        <li>2.3.1 版本号 2023071013 发布于 2023-07-10</li>
                        <li>2.3.3 版本号 2023072320 发布于 2023-07-23</li>
                        <li>3.1x 版本号 2023092220 发布于 2023-09-22</li>
                        <li>新春限定 版本号 20240207 发布于 2024-02-06</li>
                    </ul>
                    <h4>最新版本更新详情</h4>
                    <ul>
                        <li>优化首页情侣昵称样式</li>
                        <li>优化获取IP归属地字段为空</li>
                        <li>优化邮件发信模板样式</li>
                        <li>优化后台登录时显示未知错误问题</li>
                        <li>优化首页恋爱纪念日部分样式</li>
                        <li>优化后台页面已知bug</li>
                        <li>优化移动端留言页用户输入无法看到留言框内容问题</li>
                        <li>新增邮件发信开关功能</li>
                        <li>新增前端首页点点滴滴跳转按钮</li>
                        <li>新增后台管理员登录记录相关信息</li>
                        <li>新增后台登录自动获取当前用户头像昵称信息</li>
                        <li>新增后台发布内容时自动优先选择当前登录用户昵称</li>
                        <li>新增留言页游客留言显示操作系统、浏览器信息</li>
                    </ul>
                    <img src="https://img.gejiba.com/images/c1ad5b57aad8bd12fdb95c27e3121b37.png" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary"><a target="_blank" style="color: #fff;"
                        href="https://blog.kikiw.cn/index.php/archives/65/">查看详情</a></button>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-body img {
        width: 100%;
    }

    .modal-body ul li {
        line-height: 2rem
    }
</style>

    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>温馨提醒 - </strong> 当前版本为开源版，作者已不在维护。如需稳定使用请考虑新作品【LGNewUI】限时购买特惠--2024/02/15 <button type="button" id="myButton" class="btn btn-secondary" data-toggle="modal" data-target="#bs-example-modal-lg">查看介绍</button>
    </div>

<div class="row">

    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="Campaign Sent">留言数量</h5>
                        <h3 class="my-2 py-1"><?php echo $shu ?><i>条</i></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 3.27%</span>
                        </p>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <div id="campaign-sent-chart"></div>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->

    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="New Leads">点点滴滴</h5>
                        <h3 class="my-2 py-1"><?php echo $diannub ?><i>条</i></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> 5.38%</span>
                        </p>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <div id="new-leads-chart"></div>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->

    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="Deals">恋爱清单</h5>
                        <h3 class="my-2 py-1"><?php echo $listnub ?><i>条</i></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                        </p>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <div id="deals-chart"></div>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->

</div>
<!-- end row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-4">
                        <div class="text-lg-right">
                            <button type="button" class="btn btn-danger mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i>
                                最新留言
                            </button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    <table class="table table-centered mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th style="width: 20px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                </div>
                            </th>
                            <th>评论内容</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>QQ</th>
                            <th>IP</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($info = mysqli_fetch_array($resliuyan)) {
                            ?>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><?php echo $info['text'] ?></td>
                                <td>
                                    <small class="text-muted"><?php echo date('Y-m-d H:i:s', $info['time']) ?> <div class="color"><?php echo time_tran($info['time']) ?></div></small>
                                </td>
                                <td>
                                    <h5><span class="badge badge-success-lighten"><i
                                                    class="mdi mdi-account-circle mr-1 rihjt-0"></i> <?php echo $info['name'] ?></span>
                                    </h5>
                                </td>
                                <td>
                                    <?php echo $info['QQ'] ?>
                                </td>
                                <td>
                                    <h5>
                                        <span class="badge badge-danger-lighten"><?php if ($info['ip']) { ?><?php echo $info['ip'] ?><?php } else { ?>127.0.0.1<?php } ?></span>
                                    </h5>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    // 检查 localStorage 中是否已经存储了值为 true 的标记
    var isModalShown = localStorage.getItem("modalShown");

    // 如果 localStorage 中的标记不是 true，则模拟点击按钮
    if (!isModalShown) {
        // 获取按钮元素
        var myButton = document.getElementById("myButton");

        // 模拟按钮点击
        myButton.click();

        // 设置 localStorage 的值为 true，表示弹窗已经显示过
        localStorage.setItem("modalShown", true);
    }
});

</script>

<!-- Apex js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.6.12/apexcharts.min.js"></script>

<!-- Todo js -->
<script src="/admin/assets/js/ui/component.todo.js"></script>

<!-- demo app -->
<script src="/admin/assets/js/pages/demo.dashboard-crm.js"></script>
<?php
function time_tran($time) {
	$text = '';
	if(!$time) {
		return $text;
	}
	$current = time();
	$t = $current - $time;
	$retArr = array('刚刚','秒前','分钟前','小时前','天前','月前','年前');
	switch($t) {
		case $t < 0://时间大于当前时间，返回格式化时间
		$text = date('Y-m-d',$time);
		break;
		case $t == 0://刚刚
		$text = $retArr[0];
		break;
		case $t < 60:// 几秒前
		$text = $t.$retArr[1];
		break;
		case $t < 3600://几分钟前
		$text = floor($t / 60).$retArr[2];
		break;
		case $t < 86400://几小时前
		$text = floor($t / 3600).$retArr[3];
		break;
		case $t < 2592000: //几天前
		$text = floor($t / 86400).$retArr[4];
		break;
		case $t < 31536000: //几个月前
		$text = floor($t / 2592000).$retArr[5];
		break;
		default : //几年前
		$text = floor($t / 31536000).$retArr[6];
	}
	return $text;
}
include_once 'Footer.php';
?>

</body>
</html>
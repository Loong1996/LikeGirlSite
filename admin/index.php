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
?>
<?php
include_once 'Footer.php';
?>

</body>
</html>
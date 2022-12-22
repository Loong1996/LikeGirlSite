<?php
include_once 'admin/Database.php';
$time = gmdate("Y-m-d", time() + 8 * 3600);
$id = $_GET['id'];
if (is_numeric($id) == $id) {
    $article = "SELECT * FROM article WHERE id=? limit 1";
    $stmt = $conn->prepare($article);
    $stmt->bind_param("i", $id);
    $id = $_GET['id'];
    $stmt->bind_result($id, $articletext, $articletime, $articletitle, $articlename);
    $result = $stmt->execute();
    if (!$result) echo "错误信息：" . $stmt->error;
    $stmt->fetch();
} else {
    echo("<script>alert('参数错误或页面不存在~');history.back();</script>");
}

?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include_once 'head.php';
    ?>
    <meta charset="utf-8"/>
    <title><?php echo $text['title'] ?> — <?php echo $text['card1'] ?></title>
</head>
<body>
<div id="pjax-container">
    <div class="central">
        <div class="title">
        </div>
        <div class="row central central-800">
            <div class="card col-lg-12 col-md-12 col-sm-12 col-sm-x-12 <?php if ($text['Animation'] == "1") { ?>animated bounceIn delay-03s<?php } ?>">
                <div class="little_texts">
                    <div class="top-title f2"><?php echo $articletitle ?>
                        <svg class="little_icon" aria-hidden="true">
                            <use xlink:href="#icon-zhankai"></use>
                        </svg>
                    </div>
                    <div class="info">
                    <span>
                        <svg class="little_icon" aria-hidden="true">
                          <use xlink:href="#icon-shoucang"></use>
                        </svg>
                        <?php echo $articlename ?> <i>记录于</i> <?php echo $articletime ?></span>
                    </div>
                    <div class="line-top"></div>
                    <div id="md-view" class="file">
                        <?php echo($articletext) ?>

                    </div>

                    <div class="line">
                        <p>This is the end of this article. Thank you for browsing.</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once 'footer.php';
?>


<script src="Style/pagelir/spotlight.bundle.js"></script>
<script>
    $(function () {
        $("img[src$=jpg],img[src$=gif],img[src$=JPG],img[src$=png],img[src$=jpeg]").addClass("spotlight").each(function () {
            this.onclick = function () {
                return hs.expand(this)
            }
        });
    })
</script>

</body>
</html>

<?php
session_start();
?>
<?php
$id = $_GET['id'];
?>

<?php
include_once 'connect.php';
$article = "SELECT * FROM article WHERE id='$id' limit 1";
$resarticle = mysqli_query($connect, $article);
$mod = mysqli_fetch_array($resarticle);
?>

<?php
include_once 'Nav.php';
?>

<link href="/admin/editormd/css/editormd.css" rel="stylesheet">
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3 size_18">修改文章—— <?php echo $mod['articletitle'] ?></h4>

                <form class="needs-validation" action="littleupda.php" method="post" onsubmit="return check()"
                      novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">标题</label>
                        <input name="articletitle" type="text" class="form-control" id="validationCustom01"
                               placeholder="请输入标题" value="<?php echo $mod['articletitle'] ?>" required>
                    </div>
                    <div id="test-editor">
                        <textarea name="articletext"><?php echo $mod['articletext'] ?></textarea>
                    </div>
                    <div class="form-group mb-3 text_right">
                        <input name="id" value="<?php echo $id ?>" type="hidden">
                        <button class="btn btn-primary" type="button" id="littleupda">修改发布</button>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>


<script src="https://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="/admin/editormd/editormd.js"></script>
<script type="text/javascript">
    $(function () {
        var editor = editormd("test-editor", {
            htmlDecode: true,
            path: "/admin/editormd/lib/"

        });
    });
</script>

<script>
    function check() {
        let title = document.getElementsByName('articletitle')[0].value.trim();
        let text = document.getElementsByName('articletext')[0].value.trim();
        if (title.length == 0) {
            alert("文章标题不能为空");
            return false;
        } else if (text.length == 0) {
            alert("文章内容不能为空");
            return false;
        }
    }
</script>

<?php
include_once 'Footer.php';
?>

</body>
</html>
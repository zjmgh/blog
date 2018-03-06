
<!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>更新文章 - BLOGGO博客管理系统</title>
  <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../public/css/style.css">
  <link rel="stylesheet" type="text/css" href="../public/css/font-awesome.min.css">
  <link rel="apple-touch-icon-precomposed" href="../public/images/icon/icon.png">
  <link rel="shortcut icon" href="../public/images/icon/favicon.ico">
  <script src="../public/js/jquery-2.1.4.min.js"></script>
  <!--[if gte IE 9]>
  <script src="../public/js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="../public/js/html5shiv.min.js" type="text/javascript"></script>
  <script src="../public/js/respond.min.js" type="text/javascript"></script>
  <script src="../public/js/selectivizr-min.js" type="text/javascript"></script>
  <![endif]-->
</head>

<body class="user-select">
<section class="container-fluid">
  <?php include "../config/include3.php";?>
  <div class="row">
    <aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
      <ul class="nav nav-sidebar">
        <li><a href="index.php">报告</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li class="active"><a href="article.php">博客</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="notice.php">公告</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="comment.php">评论</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a data-toggle="tooltip" data-placement="top" title="正在加紧开发中">留言</a></li>
      </ul>
    </aside>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <div class="row">
        <form action="update-article-post.php" method="post" class="add-article-form">
          <div class="col-md-9">
            <h1 class="page-header">博客修改</h1>
            <div class="form-group">
              <?php
              $cid = intval($_GET['cid']);
              $row = find('content','cid',$cid);
              $_SESSION['cid'] = $row['cid'];
              ?>
              <label for="article-title" class="sr-only">标题</label>
              <input type="text" id="article-title" name="title" class="form-control" placeholder="在此处输入标题" value="<?php echo $row['title']; ?>" required autofocus autocomplete="off">
            </div>
            <div class="form-group">
              <label for="article-content" class="sr-only">内容</label>
              <script id="article-content" name="content" type="text/plain"><?php echo $row['content']; ?></script>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>关键字</span></h2>
              <div class="add-article-box-content">
              	<input type="text" class="form-control" placeholder="请输入关键字" value="<?php echo $row['keyword']; ?>" name="keyword" autocomplete="off">
                <span class="prompt-text">多个标签请用英文逗号,隔开。</span>
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>描述</span></h2>
              <div class="add-article-box-content">
              	<textarea class="form-control" name="desc" autocomplete="off"><?php echo $row['description']; ?></textarea>
                <span class="prompt-text">描述是可选的手工创建的内容总结，并可以在网页描述中使用</span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h1 class="page-header">操作</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>发布</span></h2>
              <div class="add-article-box-content">
                <p><label>状态：</label><span class="article-status-display">已发布</span></p>
                <p><label>发布时间：</label><span class="article-time-display"><?php echo date('Y-m-d H:i:s',$row['c_date']); ?></span></p>
              </div>
              <div class="add-article-box-footer">
                <button class="btn btn-primary" type="submit" name="submit">更新</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php include "../config/include4.php";?>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/admin-scripts.js"></script>
<script src="../lib/ueditor/ueditor.config.js"></script>
<script src="../lib/ueditor/ueditor.all.min.js"> </script>
<script src="../lib/ueditor/lang/zh-cn/zh-cn.js"></script>
<script id="uploadEditor" type="text/plain" style="display:none;"></script>
<script type="text/javascript">
var editor = UE.getEditor('article-content');
window.onresize=function(){
    window.location.reload();
}
var _uploadEditor;
$(function () {
    //重新实例化一个编辑器，防止在上面的editor编辑器中显示上传的图片或者文件
    _uploadEditor = UE.getEditor('uploadEditor');
    _uploadEditor.ready(function () {
        //设置编辑器不可用
        //_uploadEditor.setDisabled();
        //隐藏编辑器，因为不会用到这个编辑器实例，所以要隐藏
        _uploadEditor.hide();
        //侦听图片上传
        _uploadEditor.addListener('beforeInsertImage', function (t, arg) {
            //将地址赋值给相应的input,只去第一张图片的路径
            $("#pictureUpload").attr("value", arg[0].src);
            //图片预览
            //$("#imgPreview").attr("src", arg[0].src);
        })
        //侦听文件上传，取上传文件列表中第一个上传的文件的路径
        _uploadEditor.addListener('afterUpfile', function (t, arg) {
            $("#fileUpload").attr("value", _uploadEditor.options.filePath + arg[0].url);
        })
    });
});
//弹出图片上传的对话框
$('#upImage').click(function () {
    var myImage = _uploadEditor.getDialog("insertimage");
    myImage.open();
});
//弹出文件上传的对话框
function upFiles() {
    var myFiles = _uploadEditor.getDialog("attachment");
    myFiles.open();
}
</script>
</body>
</html>
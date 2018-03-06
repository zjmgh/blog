<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>写公告 - BLOGGO博客管理系统</title>
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
<!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
</head>

<body class="user-select">
<section class="container-fluid">
  <?php include "../config/include1.php";?>
  <div class="row">
    <aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
      <ul class="nav nav-sidebar">
        <li><a href="index.php">报告</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="article.php">文章</a></li>
        <li class="active"><a href="notice.php">公告</a></li>
        <li><a href="comment.php">评论</a></li>
        <li><a data-toggle="tooltip" data-placement="top" title="正在加紧开发中">留言</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a class="dropdown-toggle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">用户</a>
          <ul class="dropdown-menu" aria-labelledby="userMenu">
            <li><a href="manage-user.php">管理用户</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="user-suggest.php">用户反馈</a></li>
          </ul>
        </li>
        <li><a class="dropdown-toggle" id="settingMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">设置</a>
          <ul class="dropdown-menu" aria-labelledby="settingMenu">
            <li><a href="setting.php">配置设置</a></li>
            <li role="separator" class="divider"></li>
            <li class="disabled"><a>扩展菜单</a></li>
          </ul>
        </li>
      </ul>
    </aside>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <div class="row">
        <form action="add-notice-post.php" method="post" class="add-article-form">
          <div class="col-md-9">
            <h1 class="page-header">撰写新公告</h1>
            <div class="form-group">
              <label for="article-title" class="sr-only">标题</label>
              <input type="text" id="article-title" name="n_title" class="form-control" placeholder="在此处输入标题" required autofocus autocomplete="off">
            </div>
            <div class="form-group">
              <label for="article-content" class="sr-only">内容</label>
              <textarea id="article-content" name="n_content" class="form-control"></textarea>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>关键字</span></h2>
              <div class="add-article-box-content">
              	<input type="text" class="form-control" placeholder="请输入关键字" name="n_keyword" autocomplete="off">
                <span class="prompt-text">多个标签请用英文逗号,隔开。</span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h1 class="page-header">操作</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>发布</span></h2>
              <div class="add-article-box-content">
              	<p><label>状态：</label><span class="article-status-display">未发布</span></p>
                <p><label>当前时间：</label><span class="article-time-display"><?php include "../config/gettime.php";?></span></p>
              </div>
              <div class="add-article-box-footer">
                <button class="btn btn-primary" type="submit" name="submit">发布</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php include "../config/include2.php";?>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/admin-scripts.js"></script>
<!--summernote副文本编辑器-->
<link rel="stylesheet" type="text/css" href="../lib/summernote/summernote.css">
<script src="../lib/summernote/summernote.js"></script>
<script src="../lib/summernote/lang/summernote-zh-CN.js"></script>
<script>
$('#article-content').summernote({
	lang: 'zh-CN'
});
</script>
</body>
</html>
<?php
include "../config/inc.php";
include '../config/verify.php';
$row = find('config');
?>
<!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>设置 - BLOGGO博客管理系统</title>
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
  <?php include "../config/include1.php";?>
  <div class="row">
    <aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
      <ul class="nav nav-sidebar">
        <li><a href="index.php">报告</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="article.php">博客</a></li>
        <li><a href="notice.php">公告</a></li>
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
        <li class="active"><a class="dropdown-toggle" id="settingMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">设置</a>
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
        <form action="update-setting.php" method="post" autocomplete="off" draggable="false">
          <div class="col-md-9">
            <h1 class="page-header">常规设置</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点标题</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="title" class="form-control" value="<?php echo $row['title'];?>">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点地址（URL）</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="url" class="form-control" value="<?php echo $row['url'];?>">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点关键字</span></h2>
              <div class="add-article-box-content">
                <textarea class="form-control" name="keyword" autocomplete="off"><?php echo $row['keyword'];?></textarea>
                <span class="prompt-text">关键字会出现在网页的keywords属性中。</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点描述</span></h2>
              <div class="add-article-box-content">
                <textarea class="form-control" name="desc" rows="4" autocomplete="off"><?php echo $row['description'];?></textarea>
                <span class="prompt-text">描述会出现在网页的description属性中。</span> </div>
            </div>
          </div>
          <div class="col-md-3">
            <h1 class="page-header">站点</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>电子邮件地址</span></h2>
              <div class="add-article-box-content">
                <input type="email" name="email" class="form-control" autocomplete="off" value="<?php echo $row['email'];?>"/>
                <span class="prompt-text">这个电子邮件地址仅为了管理方便而填写</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>保存</span></h2>
              <div class="add-article-box-content"> <span class="prompt-text">请确定您对所有选项所做的更改</span> </div>
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
<?php include "../config/include2.php";?>
</div>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/admin-scripts.js"></script>
</body>
</html>
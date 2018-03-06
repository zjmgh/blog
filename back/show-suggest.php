<?php error_reporting(0);?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>用户反馈 - BLOGGO博客管理系统</title>
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
                <li class="active"><a href="article.php">博客</a></li>
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
                <div class="col-md-9">
                    <h1 class="page-header">用户反馈</h1>
                    <div class="form-group">
                        <?php
                        include "../config/inc.php";
                        $sid = intval($_GET['sid']);
                        $row = find('suggest','sid',$sid);
                        ?>
                        <label for="article-title" class="sr-only">用户</label>
                        <input type="text" id="article-title" class="form-control" value="<?php echo $row['username']; ?>">
                    </div>
                    <div class="add-article-box">
                        <h2 class="add-article-box-title"><span>邮箱</span></h2>
                        <div class="add-article-box-content">
                            <input type="text" class="form-control" value="<?php echo $row['email']; ?>">
                        </div>
                    </div>
                    <div class="add-article-box">
                        <h2 class="add-article-box-title"><span>内容</span></h2>
                        <div class="add-article-box-content">
                            <textarea class="form-control" rows="5"><?php echo $row['message']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "../config/include2.php";?>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/admin-scripts.js"></script>
<script src="../lib/ueditor/ueditor.config.js"></script>
<script src="../lib/ueditor/ueditor.all.min.js"> </script>
<script src="../lib/ueditor/lang/zh-cn/zh-cn.js"></script>
<script id="uploadEditor" type="text/plain" style="display:none;"></script>
</body>
</html>
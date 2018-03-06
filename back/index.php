<?php
include "../config/inc.php";
include "../config/page.php";
include '../config/verify.php';
$row = find('admin');
?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BLOGGO博客管理系统</title>
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
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">BLOGGO</a> </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" style="margin-right: 50px">
                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $row['username'];?><span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-left">
                                <li><a title="查看或修改个人信息" data-toggle="modal" data-target="#seeUserInfo">个人信息</a></li>
                            </ul>
                        </li>
                        <li><a href="logOut.php" onClick="if(!confirm('是否确认退出？'))return false;">退出登录</a></li>
                        <li><a href="../home/index.php">前往主页</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="row">
        <aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="index.php">报告</a></li>
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
            <h1 class="page-header">信息总览</h1>
            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>博客</h4>
                    <span class="text-muted"><?php echo $total = getCount('content');?></span> </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>公告</h4>
                    <span class="text-muted"><?php echo $total = getCount('notice');?></span> </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>评论</h4>
                    <span class="text-muted"><?php echo $total = getCount('talk');?></span> </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>用户</h4>
                    <span class="text-muted"><?php echo $total = getCount('user');?></span> </div>
            </div>
            <h1 class="page-header">状态</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tbody>
                    <tr>
                        <td>欢迎回来！<span>超级管理员：</span><?php echo $row['username'];?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <h1 class="page-header">系统信息</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr> </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>管理员个数:</td>
                        <td>1 人</td>
                        <td>服务器软件:</td>
                        <td>Apache/2.4.23 (Win64)</td>
                    </tr>
                    <tr>
                        <td>浏览器:</td>
                        <td>Firefox</td>
                        <td>PHP版本:</td>
                        <td>5.6.25</td>
                    </tr>
                    <tr>
                        <td>操作系统:</td>
                        <td>Windows 10</td>
                        <td>PHP运行方式:</td>
                        <td>CGI-FCGI</td>
                    </tr>
                    <tr>
                        <td>登录者IP:</td>
                        <td>127.0.0.1</td>
                        <td>MYSQL版本:</td>
                        <td>5.7.14</td>
                    </tr>
                    <tr>
                        <td>程序版本:</td>
                        <td class="version">BLOGGO 1.0 <font size="-6" color="#BBB">(20170729160215)</font></td>
                        <td>上传文件:</td>
                        <td>可以 <font size="-6" color="#BBB">(最大文件：2M ，表单：8M )</font></td>
                    </tr>
                    <tr>
                        <td>程序编码:</td>
                        <td>UTF-8</td>
                        <td>当前时间:</td>
                        <td><?php include "../config/gettime.php";?></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr></tr>
                    </tfoot>
                </table>
            </div>
            <footer>
                <h1 class="page-header">程序信息</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td><span style="display:inline-block; width:8em">版权所有</span> BLOGGO</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </footer>
        </div>
    </div>
</section>
<?php include "../config/include2.php";?>
</div>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/admin-scripts.js"></script>
</body>
</html>

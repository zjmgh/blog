<?php
include '../config/inc.php';
error_reporting(0);
session_start();
$id = $_SESSION['id'];
$row = find('user',id,$id);
$user = $row['username'];
$nid = intval($_GET['nid']);
$link = connect();
//读取新闻内容
$sql_notice = "select * from notice where nid=$nid";
$result_notice = mysqli_query($link,$sql_notice);
$row_notice= mysqli_fetch_assoc($result_notice);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Single Post</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="../public/css/bootstrap.min1.css">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="../public/css/style1.css" id="theme-styles">



</head>
<body>
<header>
    <div>
        <ul class="fr" style="float: right;margin-right: 10px">
            <?php if($id == ""){
                echo '
                <li>
                    <a target="_blank" href="../userback/login.php" class="link-login">你好，请登录</a>&nbsp;&nbsp;<a href="register.php" style="color: red">免费注册</a>
                </li>';
            }else{
                echo "<li>
                    <a>欢迎,$user</a>
                </li>";

            }
            ?>
        </ul>
    </div>
    <div class="widewrapper masthead">
        <div class="container">
            <a href="index.php" id="logo">
                <img src="../public/images/logo.png" alt="clean Blog">
            </a>

            <div id="mobile-nav-toggle" class="pull-right">
                <a href="#" data-toggle="collapse" data-target=".clean-nav .navbar-collapse">
                    <i class="fa fa-bars"></i>
                </a>
            </div>

            <nav class="pull-right clean-nav">
                <div class="collapse navbar-collapse">
                    <ul class="nav nav-pills navbar-nav">

                        <li>
                            <a href="index.php">主页</a>
                        </li>
                        <li>
                            <a href="about.php">关于</a>
                        </li>
                        <li>
                            <a href="contact.php">联系我们</a>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>
    </div>

    <div class="widewrapper subheader">
        <div class="container">
            <div class="clean-breadcrumb">
                <a href="index.php">主页</a>
                <span class="separator">&#x2F;</span>
                <a href="#"><?php echo $row_notice['n_title'];?></a>
            </div>


            <div class="clean-searchbox">
                <form action="#" method="get" accept-charset="utf-8">

                    <input class="searchfield" id="searchbox" type="text" placeholder="Search">
                    <button class="searchbutton" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<div class="widewrapper main">
    <div class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <article class="blog-post">
                    <header>

                    </header>
                    <div class="body">
                        <h1><?php echo $row_notice['n_title'];?></h1>
                        <div class="meta">
                            <i class="fa fa-calendar"></i><?php echo date('Y-m-d',$row_notice['n_date']);?>
                        </div>
                        <p><?php echo $row_notice['n_content'];?></p>

                    </div>
                </article>
            </div>
            <aside class="col-md-4 blog-aside">

                <div class="aside-widget">
                    <header>
                        <h3>热点博客</h3>
                    </header>
                    <div class="body">
                        <?php
                        $sql_hot = "select * from content order by hit desc limit 5";
                        $result_hot = mysqli_query($link,$sql_hot);
                        while($row_hot = mysqli_fetch_assoc($result_hot)):
                            ?>
                            <ul class="clean-list">
                                <li><a href="single.php?cid=<?php echo $row_hot['cid'];?>"><?php echo $row_hot['title'];?></a></li>
                            </ul>
                        <?php endwhile;?>
                    </div>
                </div>

                <div class="aside-widget">
                    <header>
                        <h3>最新公告</h3>
                    </header>
                    <div class="body">
                        <?php
                        $sql_new = "select * from notice order by n_date desc limit 5";
                        $result_new = mysqli_query($link,$sql_new);
                        while($row_new = mysqli_fetch_assoc($result_new)):
                            ?>
                            <ul class="clean-list">
                                <li><a href="show-notice.php?nid=<?php echo $row_new['nid'];?>"><?php echo $row_new['n_title'];?></a></li>
                            </ul>
                        <?php endwhile;?>
                    </div>
                </div>

            </aside>
        </div>
    </div>
</div>

<footer>
    <div class="widewrapper copyright">
        &copy;Copyright 2017 BLOGGO版权所有 <a href="../back/login.php" target="_blank">管理员入口</a>
    </div>
</footer>

<script src="../public/js/bootstrap.min1.js"></script>
<script src="../public/js/modernizr1.js"></script>

</body>
</html>
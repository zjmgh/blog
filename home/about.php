<?php
include '../config/inc.php';
error_reporting(0);
session_start();
$id = $_SESSION['id'];
$row = find('user',id,$id);
$rows = find('config');
$user = $row['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>About Me</title>
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
                    <a>欢迎回来,</a><a href='../userback/index.php' style='color: blue'>$user</a>
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
                    <a href="#">关于</a>
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
        <div class="container about">
            <h1>Hello, 我们是 <span class="about-bold"><?php echo $rows['title'];?>开发团队</span></h1>
            <p style="color: #666;font-size: 20px">官网：<?php echo $rows['url'];?></p>
            <p><b><?php echo $rows['description'];?></b></p>
            <p>来信：<b style="color: #00b7ee"><?php echo $rows['email'];?></b></p>
            <div class="about-button">
                <a class="btn btn-xlarge btn-clean-one" href="contact.php">联系我们</a>
            </div>
            <hr>
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
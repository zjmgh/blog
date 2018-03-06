<?php
include '../config/inc.php';
error_reporting(0);
session_start();
$id = $_SESSION['id'];
$row = find('user',id,$id);
?>


<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../userback/index.php">BLOGGO</a> </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="margin-right: 50px">
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $row['username'];?><span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-left">
                            <li><a title="查看或修改个人信息" data-toggle="modal" data-target="#seeUserInfo">个人信息</a></li>
                        </ul>
                    </li>
                    <li><a href="../userback/logOut.php" onClick="if(!confirm('是否确认退出？'))return false;">退出登录</a></li>
                    <li><a href="../home/index.php?id=<?php echo $row['id'];?>">前往主页</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
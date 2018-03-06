<?php
include '../config/inc.php';
include "../config/page.php";
include "../config/verify.php";
error_reporting(0);
$id = $_SESSION['id'];
$row = find('user',id,$id);
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
                    <a class="navbar-brand" href="index.php">BLOGGO</a> </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" style="margin-right: 50px">
                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $row["username"];?><span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-left">
                                <li><a title="查看或修改个人信息" data-toggle="modal" data-target="#seeUserInfo">个人信息</a></li>
                            </ul>
                        </li>
                        <li><a href="logOut.php" onClick="if(!confirm('是否确认退出？'))return false;">退出登录</a></li>
                        <li><a href="../home/index.php?id=<?php echo $row['id'];?>">前往主页</a></li>
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
            <h1 class="page-header">信息总览</h1>
            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>博客</h4>
                    <span class="text-muted"><?php echo showCount('content',id,$id);?></span> </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>评论</h4>
                    <span class="text-muted"><?php echo showCount('talk',id,$id);?></span> </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>公告</h4>
                    <span class="text-muted"><?php echo getCount('notice');?></span> </div>
            </div>
            <h1 class="page-header">我的博客</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">标题</span></th>
                        <th><span class="glyphicon glyphicon-list"></span> <span class="visible-lg">关键字</span></th>
                        <th class="hidden-sm"><span class="glyphicon glyphicon-comment"></span> <span class="visible-lg">评论</span></th>
                        <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">日期</span></th>
                    </tr>
                    </thead>
                    <?php
                    $page = $_GET['page'];//$page为空
                    $total = getCount('content');//获取总记录数
                    $pageSize= 5;
                    $arr=page($total,$page,$pageSize);
                    $rows = getId('content','id ',$id,"id limit {$arr['offSet']},{$pageSize}");
                    if(is_array($rows)):
                        foreach($rows as $v):
                            ?>
                    <tbody>
                    <tr>
                        <td class="article-title"><?php echo $v['title'];?></td>
                        <td><?php echo $v['keyword'];?></td>
                        <td class="hidden-sm"><?php echo showCount('talk',id,$v['cid']);?></td>
                        <td><?php echo date('Y-m-d',$v['c_date'])?></td>
                    </tr>
                    </tbody>
                    <?php
                    endforeach;
                    endif;
                    ?>
                </table>
            </div>
            <h1 class="page-header">公告</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">标题</span></th>
                        <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">关键字</span></th>
                        <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">日期</span></th>
                    </tr>
                    </thead>
                    <?php
                    $page = $_GET['page'];//$page为空
                    $total = getCount('notice');//获取总记录数
                    $pageSize = 5;
                    $arr=page($total,$page,$pageSize);
                    $row = get('notice',"nid limit {$arr['offSet']},{$pageSize}");
                    if(is_array($row)):
                        foreach($row as $k):
                            ?>
                    <tbody>
                    <tr>
                        <td class="article-title"><?php echo $k['n_title'];?></td>
                        <td class="article-title"><?php echo $k['n_keyword'];?></td>
                        <td><?php echo date('Y-m-d H:i:s',$k['n_date'])?></td>
                    </tr>
                    </tbody>
                        <?php
                    endforeach;
                    endif;
                    ?>
                </table>
                <div class="panel panel-default" <?php if($total<6){echo 'style="display: none;"';}?>>
                    <div class="panel-body" style="font-size: 16px;text-align: center;">
                        <?php
                        setPageLabel($total,$pageSize,$arr['page'],$arr['pageCount']);
                        ?>
                    </div>
                </div>
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
<?php include "../config/include4.php";?>
</div>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/admin-scripts.js"></script>
</body>
</html>

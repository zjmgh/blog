<?php
include '../config/page.php';
include "../config/inc.php";
include '../config/verify.php';
error_reporting(0);
$id = $_SESSION['id'];
?>
<!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>评论 - BLOGGO博客管理系统</title>
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
        <li><a href="article.php">博客</a></li>
        <li><a href="notice.php">公告</a></li>
        <li class="active"><a href="comment.php">评论</a></li>
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
        <h1 class="page-header">管理 <span class="badge"><?php echo getCount('talk');?></span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
            <tr>
              <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">内容</span></th>
              <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">日期</span></th>
              <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
            </tr>
            </thead>
            <?php
            $page = $_GET['page'];//$page为空
            $total = getCount('talk');//获取总记录数
            $pageSize= 5;
            $arr=page($total,$page,$pageSize);
            $rows = get('talk',"tid limit {$arr['offSet']},{$pageSize}");
            if(is_array($rows)):
              foreach($rows as $v):
                ?>
                <tbody>
                <tr>
                  <td class="article-title"><?php echo $v['content'];?></td>
                  <td><?php echo date('Y-m-d',$v['t_date'])?></td>
                  <td><a href="del-comment.php?tid=<?php echo $v['tid'];?>" name="delete" class="btn btn-danger">删除</a>
                    <a href="show-comment.php?tid=<?php echo $v['tid'];?>&val=1" class="btn btn-info">显示</a>
                    <a href="show-comment.php?tid=<?php echo $v['tid'];?>&val=2" class="btn
                    <?php if($v['status']==2)
                    {
                      echo "btn-default";
                    }else{
                      echo "btn-success";
                    }
                    ?>">屏蔽</a></td>
                </tr>
                </tbody>
                <?php
              endforeach;
            endif;
            ?>
          </table>
        </div>
    </div>
  </div>
</section>
<?php include "../config/include2.php";?>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/admin-scripts.js"></script>
</body>
</html>

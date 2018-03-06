<?php
error_reporting(0);
include '../config/inc.php';
include '../config/page.php';
include '../config/verify.php';
?>
<!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>公告 - BLOGGO博客管理系统</title>
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
      <form action="<?php
      $total = getCount('notice');
      $rows = get('notice',"nid limit 3");
      if(is_array($rows)):
      for($i=1;$i<=count($rows);$i++):
      foreach($rows as $v):
      ?>
        del-notice.php?id=<?php echo $v['nid'];?>
      <?php
      endforeach;
      endfor;
      endif;
      ?>
      " method="post" >
        <h1 class="page-header">操作</h1>
        <ol class="breadcrumb">
          <li><a href="add-notice.php">发布公告</a></li>
        </ol>
        <h1 class="page-header">管理 <span class="badge"><?php echo $total = getCount('notice');?></span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">标题</span></th>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">关键字</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">日期</span></th>
                <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
              </tr>
            </thead>
            <?php
            $page = $_GET['page'];//$page为空
            $total = getCount('notice');//获取总记录数
            $pageSize= 5;
            $arr=page($total,$page,$pageSize);
            $rows = get('notice',"nid limit {$arr['offSet']},{$pageSize}");
            if(is_array($rows)):
              foreach($rows as $v):
                ?>
            <tbody>
              <tr>
                <td class="article-title"><?php echo $v['n_title'];?></td>
                <td><?php echo $v['n_keyword'];?></td>
                <td><?php echo date('Y-m-d',$v['n_date'])?></td>
                <td><a href="update-notice.php?id=<?php echo $v['nid'];?>" class="btn btn-warning">修改</a> <a href="del-notice.php?id=<?php echo $v['nid'];?>" rel="6" class="btn btn-danger">&nbsp;删除</a></td>
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
<div class="panel panel-default" <?php if($total<6){echo 'style="display: none;"';}?>>
  <div class="panel-body" style="font-size: 16px;text-align: center;">
    <?php
    setPageLabel($total,$pageSize,$arr['page'],$arr['pageCount']);
    ?>
  </div>
</div>
<?php include "../config/include2.php";?>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/admin-scripts.js"></script>
</body>
</html>

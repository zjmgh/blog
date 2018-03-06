<?php
error_reporting(0);
header("content-type:text/html;charset=utf-8");
include '../config/inc.php';
$cid =intval($_GET['cid']);
$res=delete('content','cid',$cid);
if($res){
    echo "<script>alert('博客删除成功！');location.href='article.php';</script>";
}else{
    echo "<script>alert('博客删除失败！');location.href='article.php';</script>";
}
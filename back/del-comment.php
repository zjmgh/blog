<?php
header("content-type:text/html;charset=utf-8");
include '../config/inc.php';
error_reporting(0);
$tid =intval($_GET['tid']);
$res=delete('talk','tid',$tid);
if($res){
    echo "<script>alert('评论删除成功！');location.href='comment.php';</script>";
}else{
    echo "<script>alert('评论删除失败！');location.href='comment.php';</script>";
}
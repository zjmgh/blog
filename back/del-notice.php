<?php
header("content-type:text/html;charset=utf-8");
include '../config/inc.php';
$id =intval($_GET['id']);
$res=delete('notice','nid',$id);
if($res){
    echo "<script>alert('公告删除成功！');location.href='notice.php';</script>";
}else{
    echo "<script>alert('公告删除失败！');location.href='notice.php';</script>";
}
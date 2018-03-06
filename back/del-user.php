<?php
header("content-type:text/html;charset=utf-8");
include '../config/inc.php';
$id =intval($_GET['id']);
$res=delete('user','id',$id);
if($res){
    echo "<script>alert('用户删除成功！');location.href='manage-user.php';</script>";
}else{
    echo "<script>alert('用户删除失败！');location.href='manage-user.php';</script>";
}
<?php
include '../config/inc.php';
header("content-type:text/html;charset=utf-8");
$id = intval($_GET['id']);
$val = intval($_GET['val']);
if($val == 1){
    $sql = "update user set status=1 where id=$id";
}
if($val == 2){
    $sql = "update user set status=2 where id=$id";
}
$res = save($sql);
if($res){
    echo "<script>alert('操作成功！');location.href='manage-user.php';</script>";
}else{
    echo "<script>alert('操作失败！');location.href='manage-user.php';</script>";
}
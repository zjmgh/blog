<?php
include '../config/inc.php';
header("content-type:text/html;charset=utf-8");
$tid = intval($_GET['tid']);
$val = intval($_GET['val']);
if($val == 1){
    $sql = "update talk set status=1 where tid=$tid";
}
if($val == 2){
    $sql = "update talk set status=2 where tid=$tid";
}
$res = save($sql);
if($res){
    echo "<script>alert('操作成功！');location.href='comment.php';</script>";
}else{
    echo "<script>alert('操作失败！');location.href='comment.php';</script>";
}
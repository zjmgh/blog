<?php
header("content-type:text/html;charset=utf-8");
include '../config/inc.php';
$sid =intval($_GET['sid']);
$res=delete('suggest','sid',$sid);
if($res){
    echo "<script>alert('反馈删除成功！');location.href='user-suggest.php';</script>";
}else{
    echo "<script>alert('反馈删除失败！');location.href='user-suggest.php';</script>";
}
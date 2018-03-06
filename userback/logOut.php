<?php
/**
 * 清除所有session数据，退出系统，跳转至登录页面
 */
session_start();
if(isset($_SESSION['username'])){
    session_destroy();
    setcookie(session_name(),'',1,'/');
    echo "<script>window.parent.location.href='../home/index.php';</script>";
}else{
    header("location:../home/index.php");
}





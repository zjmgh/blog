<?php
session_start();//先从session中获取当前记录的id
header("content-type:text/html;charset=utf-8");
$cid=$_SESSION['cid'];
if(isset($_POST['submit'])){
    $title = trim($_POST['title']);
    $keyword = trim($_POST['keyword']);
    $desc = trim($_POST['desc']);
    //字符转义
    $content = trim($_POST['content']);
    $content = addslashes($content);

    include '../config/inc.php';
    $link = connect();
    $sql ="update content set title='$title',content='$content',keyword='$keyword',description='$desc' where cid=$cid";
    $result = mysqli_query($link,$sql);
    if($result){
        echo "<script>alert('博客修改成功！');location.href='article.php';</script>";

    }else{
        echo "<script>alert('博客修改失败！');location.href='article.php';</script>";
    }

}
<?php
session_start();//先从session中获取当前记录的id
$id=$_SESSION['id'];
header("content-type:text/html;charset=utf-8");
if(isset($_POST['submit'])){
    $title = trim($_POST['n_title']);
    $keyword = trim($_POST['n_keyword']);
    //字符转义
    $content = trim($_POST['n_content']);
    $content = addslashes($content);

    include '../config/inc.php';
    $link = connect();
    $sql ="update notice set n_title='$title',n_content='$content',n_keyword='$keyword' where nid=$id";
    $result = mysqli_query($link,$sql);
    if($result){
        echo "<script>alert('公告修改成功！');location.href='notice.php';</script>";

    }else{
        echo "<script>alert('公告修改失败！');location.href='notice.php';</script>";
    }

}
<?php
header("content-type:text/html;charset=utf-8");
if(isset($_POST['submit'])){
    $title = trim($_POST['title']);
    $url = trim($_POST['url']);
    $keyword = trim($_POST['keyword']);
    $email = trim($_POST['email']);
    //字符转义
    $desc = trim($_POST['desc']);
    $desc = addslashes($desc);

    include '../config/inc.php';
    $link = connect();
    $sql ="update config set title='$title',url='$url',keyword='$keyword',description='$desc',email='$email'";
    $result = mysqli_query($link,$sql);
    if($result){
        echo "<script>alert('配置修改成功！');location.href='setting.php';</script>";

    }else{
        echo "<script>alert('配置修改失败！');location.href='setting.php';</script>";
    }

}
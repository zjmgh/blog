<?php
session_start();
header("content-type:text/html;charset=utf-8");
if(isset($_POST['submit'])){
    //获取数据
    $title = trim($_POST['title']);
    $content= trim($_POST['content']);
    $keywords = trim($_POST['keywords']);
    $desc = trim($_POST['desc']);
    $id = $_SESSION['id'];
    $c_date = time();
    try{
        include '../config/inc.php';
        $sql = "insert into content(title,content,id,keyword,description,c_date) values('$title','$content',$id,'$keywords','$desc','$c_date')";
        $res = add($sql);
        if($res){
            echo "<script>alert('博客发布成功！');location.href='article.php';</script>";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

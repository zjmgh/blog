<?php
header("content-type:text/html;charset=utf-8");
if(isset ($_POST['submit'])) {
    $title = trim($_POST['n_title']);
    $content = trim($_POST['n_content']);
    $keyword = trim($_POST['n_keyword']);
    $content = addslashes($content);
    $n_date = time();

    //连接数据库服务器，选择数据库
    include '../config/inc.php';
    $link = connect();
    $sql = "insert into notice(n_title,n_content,n_keyword,n_date) values('$title','$content','$keyword',$n_date)";
    $result = mysqli_query($link, $sql);
    if ($result) {
        echo "<script>alert('公告发布成功！');location.href='notice.php';</script>";
    }
    if ($result) {
        echo "<script>alert('公告发布失败！');location.href='add-notice.php';</script>";
    }
}


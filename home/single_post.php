<?php
include '../config/inc.php';
//error_reporting(0);
session_start();
$id = $_SESSION['id'];
$row = find('user','id',$id);
$user = $row['username'];
$cid = intval($_GET['cid']);
$link = connect();
//点击次数加1
$sql_hit = "update content set hit=hit+1 where cid=$cid";
$result_hit = mysqli_query($link,$sql_hit);

/*$sql = "select * from content where cid=$cid";
$result = mysqli_query($link,$sql);
$rows= mysqli_fetch_assoc($result);*/

//接收评论内容
if(isset($_POST['submit'])){
    $content = trim($_POST['content']);
    $content =stripslashes($content);
    $t_date =time();
    $sql_talk ="insert into talk(content,cid,id,t_date) values('$content','$cid','$id','$t_date')";
    $result_talk = mysqli_query($link,$sql_talk);
    if($result_talk){
        echo "<script>alert('评论发表成功!');location.href='single.php?cid='.$cid;</script>";
    }else {
    	echo "<script>alert('评论发表失败!');location.href='single.php?cid='.$cid;</script>";
    }
}
?>
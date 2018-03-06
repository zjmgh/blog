<?php
include '../config/inc.php';
include 'test.php';
error_reporting(0);
session_start();
header("content-type:text/html;charset=utf-8");
if(isset($_POST['submit'])){
    try{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $pdo = new PDO("mysql:host=localhost;dbname=blog","root","");
        $pdo->query('set names "utf8"');
        //防止sql注入攻击的语句
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        //预处理
        $sql = "select * from user where username=? and password=?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1,$username);
        $stmt->bindValue(2,$password);
        $stmt->execute();
        if($stmt->rowCount()){
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            $row = find('user',username,$username);
            $_SESSION['username'] = $rows['username'];
            $_SESSION['id'] = $row['id'];
            if($rows['status']==1){
                Show("亲爱的".$_SESSION['username']."！准备好了前往博客新世界了吗",'index.php');
            }else{
                echo "<script>alert('您的账号涉嫌违规!请联系管理员');location.href='../back/logout.php';</script>";
            }
        }else{
            echo "<script>alert('啊哦!登陆失败了');location.href='login.php';</script>";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
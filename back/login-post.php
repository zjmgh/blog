<?php
session_start();
header("content-type:text/html;charset=utf-8");
if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=blog","root","");
        $pdo->query('set names "utf8"');
        //防止sql注入攻击的语句
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        //预处理
        $sql = "select * from admin where username=? and password=?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1,$username);
        $stmt->bindValue(2,$password);
        $stmt->execute();
        if($stmt->rowCount()){
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['username'] = $rows['username'];
            header("location:index.php");
        }else{
            echo "<script>alert('啊哦!登陆失败了');location.href='login.php';</script>";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
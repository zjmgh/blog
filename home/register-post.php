<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/24
 * Time: 20:53
 */
header("content-type:text/html;charset=utf-8");
if(isset($_POST['submit'])){
    //获取数据
    $username = trim($_POST['username']);
    $cfm = trim($_POST['cfm']);
    $password = trim($_POST['password']);
    if($password != $cfm){
        echo "<script>alert('密码不一致!');location.href='register.php';</script>";
    }
    $sex = $_POST['sex'];
    $phone = $_POST['phone'];
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=blog","root","");
        $pdo->query('set names "utf8"');
        //防止sql注入攻击的语句
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        //预处理
        $sql = "insert into user(username,password,sex,phone) VALUES(?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1,$username);
        $stmt->bindValue(2,$password);
        $stmt->bindValue(3,$sex);
        $stmt->bindValue(4,$phone);
        $stmt->execute();
        if($stmt->rowCount()){
            echo "<script>alert('用户注册成功!');location.href='../userback/login.php';</script>";
        }else{
            echo "<script>alert('注册失败!');location.href='register.php';</script>";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
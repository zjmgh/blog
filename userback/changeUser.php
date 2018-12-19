<?php

session_start();
header("content-type:text/html;charset=utf-8");
$username = $_SESSION['username'];
if(isset($_POST['submit'])){
    $newUser = $_POST['username'];
    $oldPwd = $_POST['old_password'];
    $newPwd = $_POST['password'];
    $sex = $_POST['sex'];
    $phone = $_POST['phone'];
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=blog","root","");
        $pdo->query('set names "utf8"');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $sql = "select password from user where username=?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1,$username);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $password = $rows['password'];
        if($oldPwd == $password){
            $sql1 = "update user set username=?,password=?,phone=?,sex=? where username=?";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindValue(1,$newUser);
            $stmt1->bindValue(2,$newPwd);
            $stmt1->bindValue(3,$phone);
            $stmt1->bindValue(4,$sex);
            $stmt1->bindValue(5,$username);
            $res = $stmt1->execute();
            if($res){
                echo "<script>alert('信息修改成功！请重新登陆');location.href='login.php';</script>";
            }else{
                echo "<script>alert('信息修改失败！');location.href='index.php';</script>";
            }
        }else{
            echo "<script>alert('原密码输入错误!');location.href='index.php';</script>";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

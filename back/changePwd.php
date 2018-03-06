<?php
header("content-type:text/html;charset=utf-8");
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $oldPwd = $_POST['old_password'];
    $newPwd = $_POST['password'];
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=blog","root","");
        $pdo->query('set names "utf8"');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $sql = "select password from admin where username=?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1,$username);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $password = $rows['password'];
        if($oldPwd == $password){
            $sql1 = "update admin set password=? where username=?";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindValue(1,$newPwd);
            $stmt1->bindValue(2,$username);
            $res = $stmt1->execute();
            if($res){
                echo "<script>alert('密码修改成功！请重新登陆');location.href='login.php';</script>";
            }else{
                echo "<script>alert('密码修改错误！');location.href='index.php';</script>";
            }
        }else{
            echo "<script>alert('原密码输入错误！');location.href='index.php';</script>";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}


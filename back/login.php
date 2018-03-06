<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <meta charset="utf-8">
    <title>登陆管理员后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    <link rel="stylesheet" href="../public/css/reset.css">
    <link rel="stylesheet" href="../public/css/supersized.css">
    <link rel="stylesheet" href="../public/css/login_style.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->

</head>

<body>

<div class="page-container">
    <h1>欢迎你</h1>
    <form action="login-post.php" method="post">
        <input type="text" name="username" class="username" placeholder="Username">
        <input type="password" name="password" class="password" placeholder="Password">
        <button type="submit" name="submit">登陆</button>
        <div class="error"><span>+</span></div>
    </form>
</div>


<!-- Javascript -->
<script src="../public/js/jquery-1.8.2.min.js"></script>
<script src="../public/js/supersized.3.2.7.min.js"></script>
<script src="../public/js/supersized-init.js"></script>
<script src="../public/js/scripts.js"></script>

</body>

</html>

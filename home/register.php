<!DOCTYPE html>
<head>
	<title>注册博客</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="../public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../public/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="../public/css/templatemo_style.css" rel="stylesheet" type="text/css">
</head>
<body class="templatemo-bg-image-2">
	<div class="container">
		<div class="col-md-12">
			<form class="form-horizontal templatemo-contact-form-1" role="form" action="register-post.php" method="post">
				<div class="form-group">
					<div class="col-md-12">
						<h1 class="margin-bottom-15">注册博客</h1>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label for="name" class="control-label">账号 *</label>
						<div class="templatemo-input-icon-container">
							<input type="text" name="username" class="form-control" id="name" placeholder="Username">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label for="password" class="control-label">密码 *</label>
						<div class="templatemo-input-icon-container">
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label for="password" class="control-label">确认密码 *</label>
						<div class="templatemo-input-icon-container">
							<input type="password" name="cfm" class="form-control" placeholder="Password">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label for="phone" class="control-label">电 话</label>
						<input type="text" class="form-control" name="phone" placeholder="Phone">
					</div>
					<div class="col-md-6 templatemo-radio-group">
						<label class="radio-inline">
							<input type="radio" name="sex" id="sex" value="男" checked> 男
						</label>
						<label class="radio-inline">
							<input type="radio" name="sex" id="sex" value="女"> 女
						</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label><input type="checkbox">我同意 <a href="javascript:;" data-toggle="modal" data-target="#templatemo_modal">服务条款</a> 和 <a href="#">隐私政策。</a></label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<input type="submit" name="submit" value="注册" class="btn btn-success pull-left">
						<a href="../userback/login.php" class="pull-right">登陆</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
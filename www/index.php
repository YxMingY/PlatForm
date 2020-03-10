<!DOCTYPE html>
<html>
<head>
	<title>这是啥平台来着</title>
	<?php
		do{
			session_start();
			if (!isset($_SESSION['login_timeout'])) {
				break;
			}elseif($_SESSION['login_timeout'] < time()) {
				break;
			}else{
				exit();
			}
		}while(false);
		//如果未登录或登录时间超过一天，则跳转至登录页面
		echo '<meta http-equiv="refresh" content="2;url=login/login.php">';
	?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/animation.css">
	<meta charset="utf-8">
<body>
	<div id="main">
		<div style="margin-top: 200px" class="item slide-right">你还没登录，2秒后跳转</div>
	</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>这是啥平台来着</title>
	<?php
		session_start();
		if (!isset($_SESSION['login_timeout']) || $_SESSION['login_timeout'] < time()) {
			$login = false;
			echo '<meta http-equiv="refresh" content="2;url=login/login.php">';
		}else{
			$login = true;
			unset($_SESSION['login_timeout']);
			echo '<meta http-equiv="refresh" content="8;url=login/login.php">';
		}
		//如果未登录或登录时间超过一天，则跳转至登录页面
		
	?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/animation.css">
	<meta charset="utf-8">
<body>
	<div id="main">
		<div style="margin-top: 200px;height: 500px" class="item slide-right">
			<?php 
			if($login){
				echo "你已登录，但这没什么卵用, 因为你现在被我取消登录了，8秒后跳转";
			}else{
				echo "你还没登录，2秒后跳转";
			}
			?>	
		</div>
	</div>
</body>
</html>
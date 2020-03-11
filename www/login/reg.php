<!DOCTYPE html>
<html>
<head>
	<title>请宁注册</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/animation.css">
	<meta charset="utf-8">
	<script src="../js/jquery-3.4.1.js"></script>
	<script src="../js/reg.js"></script>
	<?php
	require "../../vcode.php";
	session_start();
	$id = session_id();
	$code = vcode($id);
	$_SESSION["vcode"] = $code;
	?>
</head>
<body>

	<form id="main" method="post">
		<div id="notice"></div>
		<div class="item wrap slide-right">
			<input class="input" type="input" name="user" placeholder="账号" required>
		</div>
		<div class="item wrap slide-left">
			<input class="input" type="input" name="passwd" placeholder="密码" required>
		</div>
		<div class="vcode slide-right">
			<input class="vcode-in wrap input" type="input" name="vcode" placeholder="验证码" required>
			<?php echo '<div class="vcode-img wrap"  style="background-image: url(\'../img/vcode/'.$id.'.png\');"></div>'; ?>
		</div>
		<input class="item slide-left" type="button" value="注册">
	</form>
</body>
</html>

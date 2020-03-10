<!DOCTYPE html>
<html>
<head>
	<title>请宁登录</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/animation.css">
	<meta charset="utf-8">
	<script src="../js/jquery-3.4.1.js"></script>
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
		<input class="item slide-right" type="button" value="Biu ~">
	</form>
	<script type="text/javascript">
		$(function(){
			$("[type='button']").click(function(){
				//alert("aa");
				$.post("verify.php",{
					user:$("[name='user']").val(),
					passwd:$("[name='passwd]'").val()
				},function(data){
					if(data == "1") {
						$("#notice").text("登录成功，2秒后跳转");
						window.location.replace("login_success.php");
					}else{
						$("[name='passwd']").val("");
						$("#notice").text("用户名或密码错误");
					}
				});
			});
		});
	</script>
</body>
</html>

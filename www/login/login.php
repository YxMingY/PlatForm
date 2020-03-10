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
		<!-- <div id="cap">请宁登录</div> -->
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
					user:$("[name='user'").val(),
					passwd:$("[name='passwd'").val()
				},function(data){
					if(data == "1") {
						window.location.replace("login_success.php");
					}
				});
			});
		});
	</script>
</body>
</html>

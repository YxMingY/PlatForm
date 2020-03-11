$(function(){
	$("[type='button']").click(function(){
		user = $("[name='user']").val();
		passwd = $("[name='passwd']").val();
		vcode = $("[name='vcode']").val();
		var preg = /'|and|exec|execute|insert|create|drop|table|from|grant|use|group_concat|column_name|information_schema.columns|table_schema|union|where|select|delete|update|order|by|count|chr|mid|master|truncate|char|declare|or|;|\s|--|\+|,|like|\/\/|\/|%|#/i;
		if(preg.test(user) || preg.test(passwd)) {
			$("#notice").text("检测到非法字符，请重新输入");
		}else if(user == "" || passwd == "" || vcode == ""){
			$("#notice").text("请填写完整");
		}else{
			$.post("reg_proc.php",{
				user:user,
				passwd:passwd,
				vcode:vcode
			},function(data){
				alert(data);
				if(data == "0") {
					$("#notice").text("注册成功，2秒后跳转");
					setTimeout(function(){
						window.location.replace("../index.php");
					},2000);
				}else if(data == "1"){
					$("[name='user']").val("");
					$("[name='passwd']").val("");
					$("#notice").text("账号已存在");
				}else if(data == "2"){
					$("[name='vcode']").val("");
					$("#notice").text("验证码错误");
				}else if(data == "3"){
					$("#notice").text("服务器错误");
				}
			});
		}
	});
});
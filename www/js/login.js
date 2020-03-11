$(function(){
	$("[type='button']").click(function(){
		user = $("[name='user']").val();
		passwd = $("[name='passwd']").val();
		var preg = /'|and|exec|execute|insert|create|drop|table|from|grant|use|group_concat|column_name|information_schema.columns|table_schema|union|where|select|delete|update|order|by|count|chr|mid|master|truncate|char|declare|or|;|\s|--|\+|,|like|\/\/|\/|%|#/i;
		if(preg.test(user) || preg.test(passwd)) {
			$("#notice").text("检测到非法字符，请重新输入");
		}else{
			$.post("verify.php",{
				user:user,
				passwd:passwd
			},function(data){
				if(data == "0") {
					$("#notice").text("登录成功，2秒后跳转");
					setTimeout(function(){
						window.location.replace("../index.php");
					},2000);
					
				}else if(data == "1"){
					$("[name='passwd']").val("");
					$("#notice").text("用户名或密码错误");
				}else{
					$("#notice").text("数据库连接错误");
				}
			});
		}
	});
});
<?php
function login_verify(string $user,string $passwd):string
{
	require_once "../../Mysql.php";
	$db = new  yxmingy\Mysql('rm-m5e936c6x8o4g3q3buo.mysql.rds.aliyuncs.com',  'ndt_001', 'aqi275466_', 'tnb');
	$verify = 1;
	if($db->connected()) {
		$res = $db->select("user_info","密码","账号='".$user."'");
		foreach ($res as $real_wd) {
			if($real_wd['密码'] == $passwd)
				$verify = 0;
		}
		$res = $db->select("user_info","密码","姓名='".$user."'");
		foreach ($res as $real_wd) {
			if($real_wd['密码'] == $passwd)
				$verify = 0;
		}
	}else{
		$verify = $db->getConnectError();
	}
	$db->close();
	unset($db);
	return $verify;
}
if (isset($_POST["user"])){
	if(($v=login_verify($_POST["user"],$_POST["passwd"])) == "0") {
		session_start();
		$_SESSION['login_timeout'] = time() + 3600;
	}
	echo $v;
}


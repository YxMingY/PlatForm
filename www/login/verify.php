<?php
function login_verify(string $user,string $passwd):bool
{
	require_once "../../Mysql.php";
	$db = new  yxmingy\Mysql('rm-m5e936c6x8o4g3q3buo.mysql.rds.aliyuncs.com',  'ndt_001', 'aqi275466_', 'tnb');
	$verify = false;
	if($db->connected()) {
		$res = $db->select("用户基本信息","密码","账号='".$user."'");
		foreach ($res as $real_wd) {
			if($real_wd['密码'] == $passwd)
				$verify = true;
		}
		$res = $db->select("用户基本信息","密码","姓名='".$user."'");
		foreach ($res as $real_wd) {
			if($real_wd['密码'] == $passwd)
				$verify = true;
		}
	}
	$db->close();
	unset($db);
	return $verify;
}
if (isset($_POST["user"])){
	if(login_verify($_POST["user"],$_POST["passwd"])) {
		echo "1";
	}else{
		echo "0";
	}
}

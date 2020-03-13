<?php

if (isset($_POST["user"])){
	session_start();
	if(!isset($_SESSION["vcode"]) || !isset($_SESSION["vcode"]) ||$_SESSION["vcode"] != $_POST["vcode"]) {
		// var_dump($_POST);
		// var_dump($_SESSION);
		echo "2";
		exit();
	}
	require_once "../../Mysql.php";
	$db = new  yxmingy\Mysql('rm-m5e936c6x8o4g3q3buo.mysql.rds.aliyuncs.com',  'ndt_001', 'aqi275466_', 'tnb');
	if($db->connected()) {
		$res = $db->select("user_info","姓名","账号='".$_POST["user"]."'");
		foreach ($res as $real_wd) {
			echo "1";
			$db->close();
			exit();
		}
		$db->a_insert("user_info",["账号","密码"],[$_POST["user"],$_POST["passwd"]]);
		$res = $db->select("user_info","账号","账号='".$_POST["user"]."'");
		if(!empty($res)) {
			unlink("../img/vcode/".session_id()."png");
			echo "0";
		}else {
			echo "3";
		}
	}else{
		$db->getConnectError();
		echo "3";
		$db->close();
		exit();
	}
	$db->close();
	unset($db);
}


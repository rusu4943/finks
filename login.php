<?php
	public function login($POST)
	{
		$username = trim($_POST['login__username']);
		$password = trim($_POST['login__password']);

		$dataArr = $db->fetch_one("select * from users where username = '$username' and password = '$password' ");
		if(!$dataArr){
			echo "<script>alert('ERROR Incorrect username or password!');history.back();</script>";
			return 1;
		}

		setcookie("blog_uid",$dataArr['uid'], time()+3600*24);
		echo "<script>alert('Login success.');location.href='search.php';</script>";
		return 0;
	}
	include_once('db.php');
	$db = new db();
	if($_POST){
		login($_POST);
	}
	exit;
?>


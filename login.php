<?php
include_once('db.php');
$db = new db();
if($_POST){
	$username = trim($_POST['name']);
	$password = trim($_POST['pwd']);

	$dataArr = $db->fetch_one("select * from users where username = '$username' and password = '$password' ");
	if(!$dataArr){
		echo "<script>alert('ERROR Incorrect username or password!');history.back();</script>";
		exit;
	}

	setcookie("blog_uid",$dataArr['uid'], time()+3600*24);
	echo "<script>alert('Login success.');location.href='search.php';</script>";
	exit;
}
	echo "<script>location.href='login.html';</script>";

exit;
?>


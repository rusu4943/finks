<?php
include_once('db.php');
$db = new db();
if($_POST){
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$email = trim($_POST['email']);
	$check_password = trim($_POST['passwordRepeat']);

	$dataArr = $db->fetch_all("select * from users where username = '$username' ");
	if($dataArr){
		echo "<script>alert('User name already exists!');history.back();</script>";
		exit;
	}
	
	$saveData = array(
		'username' => $username,
		'email' => $email,
		'password' => $password,
		'createtime' => time(),
		'updatetime' => time()
	);
	
	
	$uid = $db->insert('users',$saveData);

	setcookie("blog_uid",$uid, time()+3600*24);
	
	echo "<script>alert('login was successful.');location.href='homepage.html';</script>";
	exit;
}
echo "<script>location.href='search.php';</script>";
exit;
?>

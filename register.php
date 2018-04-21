<?php
include_once('db.php');
$db = new db();
if($_POST){
	$username = trim($_POST['name']);
	$password = trim($_POST['pwd']);
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$date = trim($_POST['date']);
	$check = trim($_POST['check']);
	$sex = trim($_POST['sex']);
	$introduce = trim($_POST['introduce']);

	$dataArr = $db->fetch_all("select * from users where username = '$username' ");
	if($dataArr){
		echo "<script>alert('User name already exists!');history.back();</script>";
		exit;
	}
	// $dataArr = $db->fetch_all("select * from users where mobile = '$mobile' ");
	// if($dataArr){
	// 	echo "<script>alert('The phone number has been used!');history.back();</script>";
	// 	exit;
	// }
	
	$saveData = array(
		'username' => $username,
		'email' => $email,
		'phone' => $phone,
		'password' => $password,
		'birthday' => $date,
		'check1' => $check,
		'sex' => $sex,
		'introduce' => $introduce,
		'createtime' => time(),
		'updatetime' => time()
	);
	
	
	$uid = $db->insert('users',$saveData);

	setcookie("blog_uid",$uid, time()+3600*24);
	
	echo "<script>alert('login was successful.');location.href='search.php';</script>";
	exit;
}
echo "<script>location.href='search.php';</script>";
exit;
?>

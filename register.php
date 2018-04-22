<?php
	public function register($POST): 
	{
		$username = trim($POST['username']);
		$password = trim($POST['password']);
		$email = trim($POST['email']);
		$check_password = trim($POST['passwordRepeat']);

		$dataArr = $db->fetch_all("select * from users where username = '$username' ");
		if($dataArr){
			echo "<script>alert('User name already exists!');history.back();</script>";
			return 1;
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
		
		echo "<script>alert('registration was successful.');location.href='homepage.html';</script>";
		return 0;
	}

	include_once('db.php');
	$db = new db();
	if($_POST){
		register($_POST);
		exit;
	}
?>

<?php
    if ($_POST)
    {
        if ($_SESSION["username"])
        {
            header("Location: homepage.php");
        }

        $username = $_POST["username"];
        $password = $_POST["password"];

        $servername = "localhost";
        $db_username = "root";
        $db_password = "root";
        $dbname = "finks";

        // Create connection
        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password ."'";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            session_start();
            $_SESSION["username"] = $username;
            $user_id = -1;
            while ($row = $result->fetch_assoc())
            {
                $user_id = $row["userid"];
            }
            $_SESSION["userid"] = $user_id;
            header("Location: homepage.php");
        }
        else
        {
            header("Location: signup.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="Login.css">


  <title> Login </title>

</head>



<body class="align">


    <div class="navbar">
        <?php 
            if ($_SESSION["username"])
            {
                echo "<a href='logout.php' id='login'>LOGOUT</a>";
                echo "<a href='homepage.php' id='login'>Welcome, " . $_SESSION["username"] . "</a>";
            }
            else
            {
                echo "<a href='Login.php' id='login'>LOGIN</a>";
            }
        ?>
        <a href="Upload.php" id="login">UPLOAD</a>
        <a href="search.php" id="login">SEARCH</a>
        <a href="homepage.php" id="login">BROWSE</a>
        <a href="homepage.php" id="finks">FINKS</a>
    </div>
    


 <div class="grid">

    <form action="login.php" method="POST" class="form login">

      	<div class="form__field">
        		<label for="username"></label>
        		<input type="text" class="form__input"  id="username" placeholder="Enter Username" name="username" required>
      	</div>

     	 <div class="form__field">
       		 <label for="pwd"></label>
       		 <input type="password" class="form__input"  id="password" placeholder="Enter password" name="password" required>
     	 </div>

      	<div class="form__field">
       		 <input type="submit" value="Sign In">
    	</div>

   </form>
    
     <!-- Password and Sign-in Option -->
    <p class="text--center"> <a href="Signup.php" style="color: #434a52"> Click here to Sign Up!</a> <svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="assets/images/icons.svg#arrow-right"></use></svg></p>

 </div>





</body>
</html>

<?php
    if ($_POST)
    {
        session_start();
        $username = $_POST["name"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        
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
        
        $user_id = rand(100000,999999);
        $sql = "INSERT INTO users (username, password, email, userid) VALUES ('" . $username . "','" . $password . "','" . $email . "'," . $user_id . "1)";
        if ($conn->query($sql) === TRUE) {
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["userid"] = $user_id;
            header("Location: homepage.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

?>

<!DOCTYPE html> 
<html>
<head>

	  <title>Signup</title>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1" >

    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>

    <link rel="stylesheet" type="text/css" href="Signup.css"> 
</head>


<body>




<div> 

 <div class="signup__container">
  <div class="container__child signup__thumbnail">
    <div class="thumbnail__logo">
      <svg class="logo__shape" width="25px" viewBox="0 0 634 479" xmlns="http://www.w3.org/2000/svg"><g><path d="        "/></g></svg>
      <h1 class="logo__text"></h1>
    </div>


    <div class="thumbnail__content text-center">
      <h1 class="heading- -primary"> Welcome to Finks! </h1>
      <h2 class="heading- -secondary"> Join us by creating a free account</h2>
    </div>


    <div class="thumbnail__links">
      <ul class="list-inline m-b-0 text-center">
   
        <li><a href="https://www.facebook.com/GloryLinda" target="_blank"><fa class="fa fa-facebook"></fa></a></li>
        <li><a href="https://instagram.com/glorylinda" target="_blank"><i class="fa fa-instagram"></i></a></li>
      </ul>
    </div>

    <div class="signup__overlay"></div>
</div>



<!-- Sign Up/Registration Form -->
  <div class="container__child signup__form">
    <form action="signup.php" method="POST">
       <!--- username: text box -->
      <div class="form-group">
        <label for="name">USERNAME</label>
        <input type="text" class="form-control" id="name" placeholder="Please enter a username" name="name" required />
      </div>
  
      <!-- Email Address text box  -->
      <div class="form-group">
        <label for="email">EMAIL</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required />
      </div>

     <!-- Password text box -->
      <div class="form-group">
        <label for="pwd">PASSWORD</label>
        <input type="password" class="form-control" id="password" placeholder="Please enter a password"  name="password" required />
      </div>


   <!-- Confirm/repeat Password text box-->
      <div class="form-group">
        <label for="pwd1">CONFIRM PASSWORD</label>
        <input type="password" class="form-control" id="password" placeholder="Reenter password"  name="password"  required />
      </div>


      <div class="m-t-lg">
        <ul class="list-inline">
          <li>
            <input class="btn btn--form" type="submit" value="Sign Up" />
          </li>
          <li><a class="signup__link" href="Login.html">I am already a member</a>
          </li>
        </ul>
      </div>
    </form>  
  </div>
</div>

</div>




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


<script type="text/javascript" src="js/script.js?v=005"></script>




</body>
</html>

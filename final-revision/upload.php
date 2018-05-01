<?php
    session_start();
    if (!$_SESSION["username"])
    {
        header("Location: homepage.php");
    }
    if ($_POST)
    {
        $title = $_POST["title"];
        $url = $_POST["url"];

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

        $user_id = $_SESSION["userid"];
        if (!$user_id)
        {
            $user_id = 1;
        }
        $img_id = rand(100000, 999999);
        $sql = "INSERT INTO images (title, votes, userid, url, imageid) VALUES ('" . $title . "',0," . $user_id . ",'" . $url . "'," . $img_id . ")";
   
        $conn->query($sql);
        header("Location: homepage.php");
    }
?>

<!DOCTYPE html> 
<html>
<head>
<title> Upload </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

   
   <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
   <link rel="stylesheet" type="text/css" href="cssmystyle.css?v=0001"/>
   <link rel="stylesheet" type="text/css" href="login.css">
   <link rel="stylesheet" type="text/css" href="Upload.css"> <!-- leave here (after bootstrap)unless menu becomes wack -->
</head>



<body background="" style="width:100%">

<!-- Navigation --> 

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



    <ul class="nav navbar-nav navbar-right">
        <li class="navbar-sign">
            <a rel="nofollow" href="##" ></a>
            
        </li>
        <li class="navbar-login">
            <a rel="nofollow" href="loginout.php" id="j_exit">Logout</a>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right" id="unlogined">
        
        <li class="navbar-login">
            <a rel="nofollow" href="login.html">login</a>
        </li>
    </ul>
  <div class="container">
  <form action="upload.php" style="padding-top: 30px;" method="post" enctype="multipart/form-data">   
    <div class="form-group">
      <label for="title">Image title:</label>
      <!--text box-->
      <input type="text" class="form-control" id="title" placeholder="Image title" name="title" required="required">
    </div>
    <div class="form-group">
      <label for="url">Url:</label>
       <!--text box-->
      <input type="text" class="form-control" id="url" placeholder="Image URL" name="url" required="required">
    </div>
    </div>
    <button type="submit" class="btn btn-info" style="margin-left: 55%;">SUBMIT</button>
  </form>
  <div id="maps" class="search-map">
        
  </div>
  </div>

</body>
</html>


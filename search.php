<?php
    session_start();
    if ($_POST)
    {

    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="login.css" />
    <link rel="stylesheet" type="text/css" href="search.css" />
</head>
<body>
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
    <div class="container">
    <!-- search -->
    <div class="search-box">
      <form class="bs-example bs-example-form" action="homepage.php" method="post">
            <div class="row">
                
                <div class="col-lg-12"> 
                    
                    
                    <div class="input-group input-group-lg" style="top: 15px;">
                         <h1>Find image.</h1>
                         <!--input box search-->
                         <input type="text" class="form-control" id="query" placeholder="Search by the image's title" name="keyword"/>
                         
                       <!--search button-->
                       <br>
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="submit">Search</button>
                        </span>
                        
                    </div>

                </div>
            </div>
      </form>
    </div> 
  </div>
</body>
</html>

<?php
include_once("db.php");
$db = new db();

$userinfo = array();

$blog_uid = isset($_COOKIE['blog_uid']) ? $_COOKIE['blog_uid'] : 0;

if($blog_uid){
  $userinfo = $db->fetch_one("select * from users where uid = $blog_uid ");
}
if($blog_uid){
    
    
  }else{
    //echo "<script>location.href='login.html';</script>";
    //exit;
  }

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
   <title>home</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
   <link rel="stylesheet" type="text/css" href="css/mystyle.css?v=0001"/>
 

</head>
<body class="register search">
<ul class="navs">
  <li class="logo">
    
    <!--NAVIGATION-->
    <i class="iconfont icon-daocha"></i>
  </li>
  <li class="fr"><a  href="registration.php">REGISTER</a></li>
  <li class="fr"><a  href="ranking.php">RANKING</a></li>
  <li class="fr"><a  href="results_sample.php">PHOTOS</a></li>
  <li class="fr"><a  href="submission.php">UPLOAD</a></li>
  <li class="active fr"><a  href="search.php">SEARCH</a></li>
</ul>
<?php if($blog_uid){ ?>
    <ul class="nav navbar-nav navbar-right">
        <li class="navbar-sign">
            <a rel="nofollow" href="##" ><?php echo $userinfo['username']?></a>
            
        </li>
        <li class="navbar-login">
            <a rel="nofollow" href="loginout.php" id="j_exit">Logout</a>
        </li>
    </ul>
  <?php } else{ ?>
    <ul class="nav navbar-nav navbar-right" id="unlogined">
        
        <li class="navbar-login">
            <a rel="nofollow" href="login.html">login</a>
        </li>
    </ul>
  <?php } ?>
  <div class="container">
    <!-- search -->
    <div class="search-box">
      <form class="bs-example bs-example-form" action="results_sample.php" method="get">
            <div class="row">
                
                <div class="col-lg-12"> 
                    
                    
                    <div class="input-group input-group-lg" style="top: 15px;">
                         <h1>Find restaurant.</h1>
                         <!--input box search-->
                         <input type="text" class="form-control" id="query" placeholder="Search by the restaurant's name" name="keyword"/>
                         
                       <!--search button-->
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="submit">SERACH</button>
                        </span>
                        
                    </div>

                </div>
            </div>
      </form>
     
    

    </div>
    
  </div>
  <!-- share -->
  <div class="share">
    <h2>FOLLOW AND CONTACT US</h2>
    <div class="icons">
      <a href="#">
        <i class="fa fa-facebook"></i>
      </a>
      <a href="#">
        <i class="fa fa-instagram"></i>
      </a>
      <a href="#">
        <i class="fa fa-twitter"></i>
      </a>
       <a href="#">
        <i class="fa fa-google"></i>
      </a>
      <a href="#">
        <i class="fa fa-phone"></i>
      </a>
      
    </div>
  </div>
  <!-- footer -->
  <footer>
    <p>
      WORLDFOODS.COM All Right Reserved. 
      <em class="fr">Explore restaurants all around the world.</em>
    </p>
  </footer>

  </body>
  </html>

        

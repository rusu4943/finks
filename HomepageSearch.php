
<?php
include_once("db.php");
$db = new db();

$userinfo = array();

$blog_uid = isset($_COOKIE['blog_uid']) ? $_COOKIE['blog_uid'] : 0;

if($blog_uid){
  $userinfo = $db->fetch_one("select * from users where uid = $blog_uid ");
}
if($blog_uid){
    
    
  }
  else
  {
    //echo "<script>location.href='login.html';</script>";
    //exit;
  }

?>


<!DOCTYPE html> 
<html>
<head>
<title> Homepage </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

   
   <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
   <link rel="stylesheet" type="text/css" href="cssmystyle.css?v=0001"/>
   <link rel="stylesheet" type="text/css" href="HomepageSearch.css"> <!-- leave here (after bootstrap)unless menu becomes wack -->
</head>



<body background="" style="width:100%">

<!-- Navigation --> 

<div class="navbar">
	 <a href="Login.html" id="login">MY ACCOUNT</a>
	 <a href="Upload.html" id="login">UPLOAD</a>
	 <a href="HompageSearch.html" id="login">SEARCH</a>

     <a href="HomepageSearch.html" id="finks">FINKS</a>



   
    <div class="dropdown">
            <button class="dropbutton">BROWSE </button>
    
          <div class="dropdown-content">
          	    <i> <a href="Login.html" id="login">Ranking</a> </i>
				       <i> <a href="Login.html" id="home">Photos</a> </i>
          </div>
    </div>
</div>


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
                         <h1>FIND PICTURES</h1>
                         <!--input box search-->
                         <input type="text" class="form-control" id="query" placeholder="Search by tag(s)" name="keyword"/>
                         
                       <!--search button-->
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="submit">SEARCH</button>
                        </span>
                        
                    </div>

                </div>
            </div>
      </form>
     
    

    </div>
    
  </div>

 


</body>


	 


</html>

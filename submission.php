
<?php
include_once("db.php");
$db = new db();

$userinfo = array();

$blog_uid = isset($_COOKIE['blog_uid']) ? $_COOKIE['blog_uid'] : 0;

if($blog_uid){
  $userinfo = $db->fetch_one("select * from users where uid = $blog_uid ");
}

if(isset($_GET['editid'])){
  $dataArr = $db->fetch_one("select * from SHOP where ShopId =  ".$_GET['editid']);
}

if($blog_uid){
    
  
  }else{
    echo "<script>location.href='login.html ';</script>";
    exit;
  }

if($_POST){
 
 
  $name = trim($_POST['name']);
  $phoneno = trim($_POST['phoneno']);
  $email = trim($_POST['email']);
  $des = trim($_POST['des']);
  
  $pic1 = trim($_POST['pic1']);
  
    $saveData = array(
      'location' => $location,
      'name' => $name,
      'phoneno' => $phoneno,
      'email' => $email,
      'des' => $des
      
    );
    if($_FILES['pic1']['name']){
      include_once("upload.php");
      $f_upload = new upload($_FILES['pic1']); 
      $saveData['MainImageFileName'] = $f_upload->save();
    }
    
    $db->insert('restaurant',$saveData);
    echo "<script>location.href='results_sample.php';</script>";
  
  //exit;
}

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
   <title>upload</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
   
   <link rel="stylesheet" type="text/css" href="css/mystyle.css"/>
  

</head>
<body class="upload-page">
<ul class="navs">
  <li class="logo">
        <!--NAVIGATION-->
    <i class="iconfont icon-daocha"></i>
  </li>
  <li class="fr"><a  href="registration.php">REGISTER</a></li>
  <li class="fr"><a  href="ranking.php">RANKING</a></li>
   <li class="fr"><a  href="results_sample.php">PHOTOS</a></li>
  <li class="active fr"><a  href="submission.php">UPLOAD</a></li>

  <li class="fr"><a  href="search.php">RESEARCH</a></li>
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
  <h1 class="center s-white">
   Add a new restaurant
  </h1>
  <!--form for adding new restaurant-->
  <form action="results_sample.php" style="padding-top: 30px;" method="post" enctype="multipart/form-data">
    

   
    <div class="form-group">
      <label for="name">Restaurant's Name:</label>
      <!--text box-->
      <input type="text" class="form-control" id="name" placeholder="Enter restaurants name" name="name" required="required">
    </div>
    <div class="form-group">
      <label for="pwd">Contact Number:</label>
       <!--text box-->
      <input type="number" class="form-control" id="phoneno" placeholder="Contact Number" name="phoneno" required="required">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
       <!--text box-->
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required="required">
    </div>
     <div class="form-group">
      <label for="image">Restaurant Photo:</label>
      <!--allow user to upload file-->
      <input type="file" class="form-control" id="image" name="pic1" accept="image/*" required="required">
    </div>
    
   <div class="form-group">
      <label for="Feedback" style="vertical-align: top;">Restaurant introduction:</label>
      <!--text area allows user to type description-->
      <textarea id="Feedback" class="form-control" placeholder="Feedback" required="required" name="des"></textarea>
    
      <!-- submit button -->
    </div>
    <button type="submit" class="btn btn-danger" style="margin-left: 55%;">SUMBIT</button>
  </form>
  <div id="maps" class="search-map">
        
  </div>
  </div>
  <!-- share to social media -->
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

        

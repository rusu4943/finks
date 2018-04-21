
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
    //echo "<script>location.href='login.html ';</script>";
    //exit;
  }

//ADD
if($_POST){ 
  $data = array();
  
  $data['location'] = $_POST['location'];
  $data['name'] = str_replace("'","\'",$_POST['name']);
  $data['phoneno'] = str_replace("'","\'",$_POST['phoneno']);
  $data['email'] = str_replace("'","\'",$_POST['email']);
  $data['des'] = $_POST['des'];
 
  $data['MainImageFileName'] = $_POST['pic1'];
  $data['ThumbnailFileName'] = $_POST['pic2'];
  
  
  
  if($_FILES['pic1']['name']){
    include_once("submission.php");
    $f_upload = new upload($_FILES['pic1']); 
    $data['MainImageFileName'] = $f_upload->save();
  }
  if($_FILES['pic2']['name']){
    include_once("submission.php");
    $f_upload = new upload($_FILES['pic2']); 
    $data['ThumbnailFileName'] = $f_upload->save();
  }
  $db->insert('restaurant',$data);

  
}

//SELECT
$where = '';
$keyword = '';
if(isset($_GET['keyword'])){
    $keyword = trim($_GET['keyword']);
    if($keyword) {
        $dataArr = $db->fetch_all('select * from restaurant where name like "%'.$keyword.'%" order by restaurantId asc ');
    }
} else {
  $dataArr = $db->fetch_all("select * from restaurant order by restaurantId asc ");
}


//print_r($dataArr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>search</title>
   <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
   
   <link rel="stylesheet" type="text/css" href="css/mystyle.css"/>
   
</head>
<body class="register search">

<ul class="navs">
  <li class="logo">
       <!--NAVIGATION--> 
    <i class="iconfont icon-daocha"></i>
  </li>
  <li class="fr"><a href="registration.php">REGISTER</a></li>
  <li class="active fr"><a href="ranking.php">RANKING</a></li>
  <li class="fr"><a href="results_sample.php">PHOTOS</a></li>
  <li class="fr"><a  href="submission.php">UPLOAD</a></li>

  <li class="fr"><a  href="search.php">SEARCH</a></li>
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
  

   <div class="row">
          <!-- restaurants -->
          <div class="restaurant-list fl" id="itemContainer">
            <!--item example-->
            <?php
              
              foreach($dataArr as $key => $val){ 
            ?>
              <?php if($key < 5) {?>
              <div class="item">
                  <div class="img fl">
                    <!--click image to the link of individual sample page-->
                    <a href="individual_sample.php?id=<?php echo $val['restaurantId'];?>"><img src="<?php echo $val['MainImageFileName'];?>" alt="<?php echo $val['name'];?>"/></a>
                  </div>
                  <div class="cont">
                    <!--click name to the link of individual sample page-->
                    <h2><a href="individual_sample.php?id=<?php echo $val['restaurantId'];?>"><?php echo $val['name'];?></a></h2>
                    <p>
                      <!--demonstrate rating of the restaurant by star-->
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star s-gray"></i>
                      <i class="fa fa-star s-gray"></i>
                    </p>
                    <p>
                       <a href="##"><i class="fa fa-thumbs-up"></i>100</a>
                       <a href="##"><i class="fa fa-thumbs-down"></i>100</a>
                    </p>
                  </div>
                </div>
           <?php } ?>
                
              
            
            
            <?php } ?>
            

          
           
        
          </div>
          <!-- sample map screen shot to show the location -->
          <div class="maps" id="maps">
            <img src="image/map_result.png" alt="location of restaurants"/>
          </div>
              
      </div>

</div>

 <!-- share to social media-->
  <div class="share">
    <h2>FOLLOW AND CONTACT US</h2>
    <!--use icon to indicate different social media, the link can be added later-->
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

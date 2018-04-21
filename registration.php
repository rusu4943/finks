

<?php
include_once("db.php");
$db = new db();

function _check_name($_string){
    if($_string==""){
        //echo "missing name<br>\n";
        $_POST[name_error]='missing name';
        return false;
    } 
}
function _check_pass($_string){
    if($_string==""){
        //echo "missing name<br>\n";
        $_POST[pass_error]='missing password';
        return false;
    } 
}
function _check_pass_repeat($_string){
    if($_string==""){
        //echo "missing name<br>\n";
        $_POST[pass_repeat_error]='missing password';
        return false;
    } 
}
function _check_phone($_string){
    if($_string==""){
        //echo "missing name<br>\n";
        $_POST[phone_error]='missing phone number.';
        return false;
    } 
}
if(isset($_POST['insert'])) {
    echo "<script type='text/javascript'>alert('s');</script>";
    $name_valid = _check_name($_POST['name']);
    $pwd_valid = _check_pass($_POST['pwd']);
    $pwd_valid_1 = _check_pass_repeat($_POST['pwd1']);
    $phone_valid = _check_phone($_POST['phone']);
    if($name_valid && $pwd_valid) {

    } else {
      echo "<script type='text/javascript'>window.location.href='registration.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
   <title>register</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  
   <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
   <link rel="stylesheet" type="text/css" href="css/mystyle.css"/>
  
</head>
<body class="register">
<ul class="navs">
  <li class="logo">
        <!--NAVIGATION-->
    <i class="iconfont icon-daocha"></i>
  </li>
  <li class="active fr"><a  href="registration.php">REGISTER</a></li>
  <li class="fr"><a href="ranking.php">RANKING</a></li>
   <li class="fr"><a  href="results_sample.php">PHOTOS</a></li>
  <li class="fr"><a  href="submission.php">UPLOAD</a></li>

  <li class="fr"><a  href="search.php">SEARCH</a></li>
</ul>

  <div class="container">
  <h2 class="center">
   
  </h2>
  <p class="center s-white"></p>
  <!--registration form-->
  <form action="register.php" method="POST">
    <!--user name: text box-->
    <div class="form-group">
      <label for="name">USER NAME:</label>
      <input type="text" class="form-control" id="name" placeholder="Please enter your user name" name="name">
      <?php echo $_POST[name_error]?>
    </div>
    <div class="form-group">
      <!--password: text box-->
      <label for="pwd">PASSWORD:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Please enter your password" name="pwd">
      <?php echo $_POST[pass_error]?>
    </div>
    <div class="form-group">
      <!--password: text box-->
      <label for="pwd1">CONFIRM PASSWORD:</label>
      <input type="password" class="form-control" id="pwd1" placeholder="Please reenter your password" name="pwd1">
      <?php echo $_POST[pass_error_repeat]?>
    </div>
   <div class="form-group">
     <!--phone number: text box-->
      <label for="phone">PHONE NUMBER:</label>
      <input type="text" class="form-control" id="phone" placeholder="Please enter your phone number" name="phone">
      <?php echo $_POST[phone_error]?>
    </div>
    <div class="form-group">
      <!--email address: text box-->
      <label for="email">EMAIL ADDRESS:</label>
      <input type="email" class="form-control" id="email" placeholder="Please enter your Email address" name="email">
    </div>
    <div class="form-group">
      <!--birthday using the date type-->
      <label for="date">BIRTHDAY:</label>
      <input type="date" class="form-control" id="date" name="date">
    </div>
    <div class="form-group">
      <!--cuisine use the check box type-->
      <label for="phone">FAVOURITE CUISINES:</label>
      <span class="form-control checkbox">
      <select name="check">
        <option value="Chinese">Chinese</option>
        <option value="Thai">Thai</option>
        <option value="Japanes">Japanes</option>
      </select>
      </span>
      
    </div>
    <div class="form-group">
      <!--gender use the check box type-->
      <label for="phone">GENDER:</label>
      <span class="form-control checkbox">
      <select name="sex">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        
      </select>  
      
    
      </span>
      
    </div>
    <div class="form-group">
      <!--introduction use textarea to allow user enter long self description-->
      <label for="phone">Introduction:</label>
      <textarea class="form-control" placeholder="Introduce yourself!" id="intro" name="introduce"></textarea>
    </div>
    <!--submit button -->
    <button type="submit" class="btn btn-danger" style="margin-left: 50%;" id="register" name="insert">CONFIRM</button>
  </form>
  
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
  <script type="text/javascript" src="js/script.js?v=005"></script>

  </body>
  </html>

        

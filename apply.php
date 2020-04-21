<!DOCTYPE html>
<html lang="en">
<head>

     <title>Webnology</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>




     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">Webnology</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="index.php" class="smoothScroll">Home</a></li>
                         <li><a href="#top" class="smoothScroll">Apply Now</a></li>
                         <li><a href="courses.php#courses" class="smoothScroll">Courses</a></li>
                       <li><a href="notice.php" class="smoothScroll">Notice Board</a></li>
                       <li><a href="comments.php" class="smoothScroll">Review Us</a></li>
                       <li><a href="PayUMoney_form.php" class="smoothScroll">Placements</a></li>
                       
                    </ul>
 
               </div>

          </div>
     </section>

    
      <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

    </body>
</html>







<?php
    include 'database.php';
  $nameErr = $emailErr = $phErr = $courseErr = ""; 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}   
    if($_POST){
             
  if (empty($_POST["fname"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

if(!preg_match('/^\d{10}$/', $_POST["ph_no"]))
    {
    $phErr = "Phone no. is not valid";
    }
        
if (empty($_POST["course"])) {
    $courseErr = "You need to select the course you want to apply";
  }
        
if($emailErr=="" and $nameErr=="" and $phErr=="" and $courseErr==""){ 
$firstname = mysqli_real_escape_string($link, $_POST['fname']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$ph_no = mysqli_real_escape_string($link, $_POST['ph_no']);
$course = mysqli_real_escape_string($link, $_POST['course']);
        
    $query="INSERT INTO `users` (name,email,ph_no,course) VALUES('$firstname','$email','$ph_no','$course')";
    mysqli_query($link,$query);
        

echo '<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700" rel="stylesheet" type="text/css">
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
	<header class="site-header" id="header">
		<h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
	</header>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
		<p class="main-content__body" data-lead-id="main-content-body">Thanks a bunch for filling that out. It means a lot to us, just like you do! We really appreciate you giving us a moment of your time today. Our Executives Will Contact You Soon.</p>
	</div>

</body>
</html>';
            }
        else{
            echo "<div class='alert alert-danger' role='alert'>
  <strong>Please Go Back And Resolve The Given Errors Below:-</strong>
</div><br>";
            echo "<div class='alert alert-success' role='alert'>
  <strong>".$nameErr."</strong>
</div><br>";
            echo "<div class='alert alert-warning' role='alert'>
  <strong>".$emailErr."</strong>
</div><br>";
            echo "<div class='alert alert-info' role='alert'>
  <strong>".$phErr."</strong>
</div><br>";
            echo "<div class='alert alert-danger' role='alert'>
  <strong>".$courseErr."</strong>
</div><br>";
        }
    }
else {
    echo "<h1>Registration Was Unsuccesful</h1>";
}
    ?>
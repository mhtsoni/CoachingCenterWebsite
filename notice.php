

<?php include 'database.php'?>
<?php 
$query="SELECT `head`,`disc` FROM `notice`";
$table=mysqli_query($link,$query);
$array=mysqli_fetch_all($table);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <style>
body {
  font: 12pt Georgia;
}

.notice {
  background-color: #f9fbff;
  box-shadow: 0px 0px 5px black;
  padding: 5px;
  text-align: center;
  
}
        .notice:hover{
  background-color: #29CA8E;
  transition: 1s;
        }
        .notice:hover p {
color: white;
}
        
h1 {
  text-align: center;
}

.low {
  text-align: center;
  color:black;
}
        .high{
            color: black;
            display:block;
            text-align:center;
        }


</style>

    
    
    
    
    
    
    

     <title>WebnoLogy</title>

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
                         <li><a href="courses.php" class="smoothScroll">Apply Now</a></li>
                       <li><a href="#top" class="smoothScroll">Notice Board</a></li>
                       <li><a href="comments.php" class="smoothScroll">Review Us</a></li>
                       
                    </ul>
 
               </div>

          </div>
     </section>






<div class="">

<h1 class="high">Notice Board</h1>


<?php for($i=0;$i<count($array);$i++){
echo '
<div class="notice">
<h2 class="low"> '.$array[$i][0].' </h2>
<p class="lower">'.$array[$i][1].'</p>
</div>';
}
    ?>

 
  
</div>
        
    
    
     <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Headquarter</h2>
                              </div>
                              <address>
                                   <p>Jhanjheri<br>Near CGC Jhanjeri</p>
                              </address>

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>

                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2018 WebnoLogy</p>
                                   
                                   <p>Design: <a rel="nofollow noopener" href="index.html" 
                                   title="free templates" target="_parent">WebnoLogy</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Contact Info</h2>
                              </div>
                              <address>
                                   <p>+91 8219338068, +91 7347348345</p>
                                   <p><a href="mailto:mohit19699soni@gmail.com">mohit19699soni@gmail.com</a></p>
                              </address>

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="courses.php">Career</a></li>
                                        <li><a href="#">Investor</a></li>
                                        <li><a href="terms.php">Terms & Conditions</a></li>
                                        <li><a href="terms.php">Refund Policy</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                         <div class="footer-info newsletter-form">
                              <div class="section-title">
                                   <h2>Newsletter Signup</h2>
                              </div>
                              <div>
                                   <div class="form-group">
                                        <form action="#" method="get">
                                             <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" required="">
                                             <input type="submit" class="form-control" name="submit" id="form-submit" value="Send me">
                                        </form>
                                        <span><sup>*</sup> Please note - we do not spam your email.</span>
                                   </div>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>
        

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>
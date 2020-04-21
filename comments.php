<?php
include 'database.php';
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($link, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image,text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($link, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($link, "SELECT * FROM images");
?>

<!DOCTYPE html>
<html lang="en">
<head>

     <title>webnology</title>
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

    
    
    
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
        position: relative;
    margin-top: 20px;
    margin-bottom:20px;
    left:8vw;
    width:84vw;
       border: 2px solid black;
       padding-bottom: 20px;
       background-color: rgb(239, 237, 237);
   }
   #images{
        position: relative;
       left:32vw;
       width:20vw;
       border: 1px solid black;
   }
   #occu{
        position: relative;
       left:2vw;
        width:80vw;
       border: 2px solid black;
   }
   #names{
        position: relative;
       left:2vw;
        width:80vw;
       border: 2px solid black;
   }
   #stars{
        position: relative;
       left:2vw;
        width:80vw;
       border: 2px solid black;
   }
   #text{
        position: relative;
       left:2vw;
        width:80vw;
       border: 2px solid black;
    }
    #post{
        position: relative;
       left:32vw;
        width:20vw;
        margin-top: 20px;
        padding: 8px;
       border: 2px solid black;
    }
    h1{
        font-size:20px;
        text-align: center;
    }
    @media screen and (max-width: 1000px) {
        
   #images{
        position: relative;
       left:2vw;
       width:80vw;
       border: 1px solid black;
   }
    }
</style>
    
    
    
    
    
    
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
                       <li><a href="notice.php" class="smoothScroll">Notice Board</a></li>
                       <li><a href="#top" class="smoothScroll">Review Us</a></li>
                       
                    </ul>
 
               </div>

          </div>
     </section>

    
      <!-- TESTIMONIAL -->
     <section id="testimonial">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Student Reviews <small>Students Love Our Work</small></h2>
                         </div>

                        
                        
                        
                         <div class="owl-carousel owl-theme owl-client">
                              
  <?php
    while ($row = mysqli_fetch_array($result)) {
                              echo '<div class="col-md-4 col-sm-4">
                                   <div class="item">
                                        <div class="tst-image">
                                             <img src="images/'.$row["image"].'">
                                        </div>
                                        <div class="tst-author">
                                             <h4>'.$row["name"].'</h4>
                                             <span>'.$row["occupation"].'</span>
                                        </div>
                                        <p>'.$row["text"].'.</p>
                                        <div class="tst-rating">';
                                  for($i=0;$i<$row["stars"];$i++){
                                             echo '<i class="fa fa-star"></i>';}
        echo '</div>
                                   </div>
                              </div>';}?>
                             
                             
                             
                             </div>

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                   </div></div>
          </div>
         
     </section> 
    
    
    
    
    
  <form method="POST" action="courses.php" enctype="multipart/form-data">
<h1>*******   Review Us   *******</h1>
  	<input type="hidden" name="size" value="1000000"><br>
      <h1>Your Image</h1>
  	  <input id="images" type="file" name="image"><br>
      <h1>Your Name</h1>
      <input placeholder="Name" id="names" type="text" name="name"><br>
      <h1>Your Occupation</h1>
      <input placeholder="Occupation" id="occu" type="text"  name="occupation"><br>
      <h1>Ratings Out Of 5</h1>
      <select id="stars" name="stars">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
      </select><br>
      <h1>Your Valuable<br> Feedback</h1>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Your Review"></textarea>

  	<div>
  		<button id="post" type="submit" name="upload">POST</button>
  	</div>
  </form>
    
    
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
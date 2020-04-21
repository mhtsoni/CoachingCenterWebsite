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
             
  if (empty($_POST["firstname"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["firstname"]);
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

if(!preg_match('/^\d{10}$/', $_POST["phone"]))
    {
    $phErr = "Phone no. is not valid";
    }
        
if (empty($_POST["productinfo"])) {
    $courseErr = "You need to select the course you want to apply";
  }
        
if($emailErr=="" and $nameErr=="" and $phErr=="" and $courseErr==""){ 
$firstname = mysqli_real_escape_string($link, $_POST['firstname']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$ph_no = mysqli_real_escape_string($link, $_POST['phone']);
$course = mysqli_real_escape_string($link, $_POST['productinfo']);
        
    $query="INSERT INTO `users` (name,email,ph_no,course) VALUES('$firstname','$email','$ph_no','$course')";
    mysqli_query($link,$query);
    
    if($_POST["productinfo"]=="Web Development"){
        $j="Web Development";
        $i="For Applying To The Web Development Course You Need To Pay An Amount Of 6000 INR";
    }
    if($_POST["productinfo"]=="Home Tutions"){
        $j="Home Tutions";
        $i="Pay A Registration Fee Of Rs 500 For a Demo Class Which Would Be Refunded If You Don't Like The Demo Or We Will Adjust The Amount With The Course Fee If You Choose To Join Us";
    }
    if($_POST["productinfo"]=="IIT/JEE Classes"){
        $j="IIT/JEE ClassRoom";
        $i="Pay A Registration Fee Of Rs 500 For a Demo Class Which Would Be Refunded If You Don't Like The Demo Or We Will Adjust The Amount With The Course Fee If You Choose To Join Us";
    }
    if($_POST["productinfo"]=="Teacher"){
        $j="Register As A Teacher(part-time/full-time)";
        $i="To Get An Interview Placed For You Pay An Amount Of RS 500 Which Would Be Refunded If You Are Not Able To Crack The Interview Or If You Complete 3 Months Of Job With Our Company.";
    }
        
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
    echo "<script>
    $('#but_sub').click(function() {
        $(this).attr('disabled','disabled');
    }</script>";
        }
        
        $j="Form Disabled Because Of The Above Errors";
        $i="Please Resolve The Above Issues";
    
    }
else {
    echo "<h1>Registration Was Unsuccesful</h1>";
}
    ?>







<?php

$MERCHANT_KEY = "BVJM9Odh";
$SALT = "jsJqZJCqp6";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
      <style>
          
   form{
        position: relative;
    margin-top: 20px;
    left:8vw;
    width:84vw;
       border: 2px solid black;
       padding-bottom: 20px;
       background-color: rgb(239, 237, 237);
   }
    input,textarea{
        position: relative;
       left:2vw;
        width:80vw;
       border: 2px solid black;
    }
           .labs{
        font-size:20px;
        text-align: center;
    }
      
    #post{
        position: relative;
       left:32vw;
        width:20vw;
        margin-top: 20px;
        padding: 8px;
       border: 2px solid black;
    }
      </style>
      
      
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
      
      
      
      
      
      
      
     <title>GuruKirpaAssociation</title>

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
  <body onload="submitPayuForm()"  id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    
      
      

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
                    <a href="#" class="navbar-brand">GuruKirpaAssociation&amp;Webnology</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="index.php" class="smoothScroll">Home</a></li>
                       <li><a href="notice.php" class="smoothScroll">Notice Board</a></li>
                       <li><a href="comments.php" class="smoothScroll">Review Us</a></li>
                       <li><a href="courses.php" class="smoothScroll">Apply Now</a></li>
                       
                    </ul>
 
               </div>

          </div>
     </section>


    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please Check If All Feilds Are Filled Correctly.</span>
      <br/>
      <br/>
    <?php } ?>
    <form id="but_sub" action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
     <h1 class="labs"><?php echo $j;?></h1>
   
        <br>
          <p class="labs"><?php echo $i;?></p>

          <input readonly type="hidden" name="amount" value="500"  /> <br><?php// echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>
          <h1 class="labs">First Name:</h1> <br>
          <input readonly name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /> <br>
        
       
         <h1 class="labs" class="labs"> Email: </h1> <br>
          <input readonly name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /> <br>
          <h1 class="labs">Phone: </h1> <br>
         <input readonly name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /> <br>
        
       
          <h1 class="labs">Course Selected: </h1> <br>
          <textarea readonly name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea> 
        
        <!------<h1> Success URI:</h1> <br>---------->
          <input type="hidden" name="surl" value="http://localhost/webno/success.php" size="64" /> 
      
         <!---- <h1>Failure URI:</h1> <br>-------->
         <input type="hidden" name="furl" value="failure.php" size="64" /> <br>
       

      
       <input type="hidden" name="service_provider" value="payu_paisa" size="64" /> 
       

     
         <!------------ <h1>Optional Parameters</h1> <br>
      
         <h1> Last Name:</h1> <br>
         <input name="lastname" id="lastname" value="<?php //echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /> <br>
          <h1>Cancel URI: </h1> <br>
         <input name="curl" value="" /> <br>
        
       
        <h1>  Address1: </h1> <br>
          <input name="address1" value="<?php// echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /> <br>
        <h1> Address2: </h1> <br>
          <input name="address2" value="<?php //echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /> <br>

        
        <h1>  City: </h1> <br>
          <input name="city" value="<?php //echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /> <br>
          <h1>State:</h1> <br>
          <input name="state" value="<?php //echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /> <br>
       
        
         <h1> Country: </h1> <br>
          <input name="country" value="<?php //echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /> <br>
          <h1>Zipcode: </h1> <br>
         <input name="zipcode" value="<?php //echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /> <br>
        
        
         <h1> UDF1: </h1> <br>
          <input name="udf1" value="<?php// echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /> <br>
         <h1> UDF2: </h1> <br>
        <input name="udf2" value="<?php// echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /> <br>
       
       
         <h1> UDF3: </h1> <br>
        <input name="udf3" value="<?php //echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /> <br>
         <h1> UDF4: </h1> <br>
        <input name="udf4" value="<?php //echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /> <br>
     
   
          <h1>UDF5:</h1> <br>
          <input name="udf5" value="<?php// echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /> <br>
          <h1>PG: </h1> <br>
         <input name="pg" value="<?php// echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /> <br>-------------->
        
      
          <?php if(!$hash) { ?>
            <input id="post" type="submit" value="Submit" />
          <?php } ?>
       
    </form>
      
      
    
      

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

  </body>
</html>

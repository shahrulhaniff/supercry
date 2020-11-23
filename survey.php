<?php 
session_start();
include "sys/database/server.php";
$id = $_SESSION['USER'];
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="M_Adnan">
<link rel="icon" href="images/logo_saja.png" />
<title>Complete Survey First</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/main.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link href="fonts/flaticon.css" rel="stylesheet">
<link href="css/ionicons.min.css" rel="stylesheet">

<!-- JavaScripts -->
<script src="js/modernizr.js"></script>

<!-- Online Fonts -->
<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900|Montserrat:300,400,500,600,700,800" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
.koroi {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.four { width: 32.26%; }
.col {
	display: block;
	float:left;
	margin: 0 0 0 1.6%;
}






.koroi2 {
  display: none;
}

.koroi2 + label{
  display: block;
  border: 1px solid #ccc;
  width: 100%;
  max-width: 100%;
  padding: 10px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  cursor: pointer;
  position: relative;
}

.koroi2 + label:before{
  content: "✔";
  position: absolute;
  right: -10px;
  top: -10px;
  width: 30px;
  height: 30px;
  line-height: 30px;
  border-radius: 100%;
  background-color: #fffb00;
  color: #fff;
  display: none;
}

.koroi2:checked + label:before{
  display: block;
}

.koroi2 + label h4{
  margin: 15px;
  color: #ccc;
}

.koroi2:checked + label{
  border: 1px solid #fffb00;
}

.koroi2:checked + label h4{
  color: #fffb00;
}


</style>
</head>
<body>

<!-- LOADER -->
<div id="loader">
  <div class="position-center-center">
    <div class="ldr"></div>
  </div>
</div>

<!-- Wrap -->
<div id="wrap"> 

  <!-- HOME MAIN  -->
  <section class="simple-head" data-stellar-background-ratio="0.5" id="hme"> 
    <!-- Particles -->
    <div id="particles-js"></div>
    <div class="position-center-center">
      <div class="container text-center">
        <h1>Dear Supercryptofinance client, we are conducting survey in order to decide the future of our bussiness partnership.
</h1>
        <p>-</p>
        <li  class="scroll"><a href="#about" class="btn btn-inverse">View Survey</a></li> </div>
    </div>
  </section>    
  
  
  
  
  <section class="community-sec why-choose padding-top-150 padding-bottom-150" id="about">
      <div class="container"> 
        
        <!-- Why Choose Us  ROW-->
        <div class="row">
          <div class="col-md-12 margin-top-60"> 
           
			
			
              <form action="survey2.php" method="POST">
				<h3 class="warna">SCF ID</h3>
                <input type="text" name="id" class="koroi" placeholder="Enter your full name" value="<?=$id?>" readonly>
				<h3 class="warna">Enter your full name</h3>
                <input type="text" name="fullname" class="koroi" placeholder="Enter your full name" required>
				<h3 class="warna">Enter your IC/Passport</h3>
                <input type="text" name="kp" class="koroi" placeholder="Enter your IC/Passport" required>
				<h3 class="warna">Enter your address</h3>
                <input type="text" name="address" class="koroi" placeholder="Enter your address" required>
				<h3 class="warna">Enter your phone number</h3>
                <input type="text" name="phoneno" class="koroi" placeholder="Enter your phone number" required>
				
<br><hr><br><br>
<h3 class="warna">Do you trust our bussiness?</h3>
<div class="row cf">
<div class="four col">
<input type="radio" class="koroi2" name="q1" value="Y" id="r1">
<label for="r1">
<h4>Yes</h4>
</label>
</div>
<div class="four col">
<input type="radio" class="koroi2" name="q1" value="N"  id="r2">
<label for="r2">
<h4>No</h4>
</label>
</div>
</div>

<br><hr><br>
<h3 class="warna">What would we could help you to maintain our bussiness purposes?</h3>
<div class="row cf">
<div class="four col">
<input type="radio" class="koroi2" name="q2" value="A" id="r3">
<label for="r3">
<h4>Spread good words to others about our bussiness.</h4>
</label>
</div>
<div class="four col">
<input type="radio" class="koroi2" name="q2" value="B" id="r4">
<label for="r4">
<h4>Continues investing with our platform</h4>
</label>
</div>
<div class="four col">
<input type="radio" class="koroi2" name="q2" value="C" id="r5">
<label for="r5">
<h4>Forfeit the platform.</h4>
</label>
</div>
</div>

<br><hr><br>
<h3 class="warna">After encountering such a problem, Do you....?</h3>
<div class="row cf">
<div class="four col">
<input type="radio" class="koroi2" name="q3" value="A" id="r6">
<label for="r6">
<h4>Refund & forfeit the platform.</h4>
</label>
</div>
<div class="four col">
<input type="radio" class="koroi2" name="q3" value="B" id="r7">
<label for="r7">
<h4>Stop investing.</h4>
</label>
</div>
<div class="four col">
<input type="radio" class="koroi2" name="q3" value="C" id="r8">
<label for="r8">
<h4>I want to continue investing with SCF.</h4>
</label>
</div>
</div>

<br><hr><br>
<h3 class="warna">Are satisfy with our customer services..?</h3>
<div class="row cf">
<div class="four col">
<input type="radio" class="koroi2" name="q4" value="Y" id="r9">
<label for="r9">
<h4>Yes</h4>
</label>
</div>
<div class="four col">
<input type="radio" class="koroi2" name="q4" value="N" id="r10">
<label for="r10">
<h4>No</h4>
</label>
</div>
</div>

<br><hr><br>
<h3 class="warna">Do you read & understand our terms & agreement..?</h3>
<div class="row cf">
<div class="four col">
<input type="radio" class="koroi2" name="q5" value="Y" id="r11">
<label for="r11">
<h4>Yes</h4>
</label>
</div>
<div class="four col">
<input type="radio" class="koroi2" name="q5" value="N" id="r12">
<label for="r12">
<h4>No</h4>
</label>
</div>
</div>

<br><hr><br>
<h3 class="warna">Do you know every single transaction of investment package in our platform obligate to agree with our term condition & agreements..?</h3>
<div class="row cf">
<div class="four col">
<input type="radio" class="koroi2" name="q6" value="Y" id="r13">
<label for="r13">
<h4>Yes</h4>
</label>
</div>
<div class="four col">
<input type="radio" class="koroi2" name="q6" value="N" id="r14">
<label for="r14">
<h4>No</h4>
</label>
</div>
</div>

<br><hr><br>
<label class="container warna">I understand that every transaction that the company requires and that every portfolio purchase is a voluntary decision without any coercion by third party.
  <input type="checkbox" required>
  <span class="checkmark"></span>
</label>
<br>
<label class="container warna"><a href="#modal-terms" data-toggle="modal" class="warna">Terms & Agreement</a></label>
<br><hr>
<input type="submit" class="btn btn-inverse">
</form>
			  
<!-- Modal -->
<div id="modal-terms" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-center"><strong>Terms and Conditions</strong></h3>
                            </div>
                            <div class="modal-body">
                                <?php include "terms.php";?>
                            </div>
                            <div class="modal-footer">
                                <div class="text-center">
                                    <button type="button" class="btn btn-effect-ripple btn-primary" data-dismiss="modal">I've read them!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
        </div>
  </div>
  </section>
  
  
  
  <!-- Footer -->
  <footer id="contact">
    
    
    <!-- Rights -->
    <div class="rights">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p>© 2018 ICO Crypto BlockChain. All Rights Reserved. Webicode.com</p>
          </div>
          <div class="col-md-6 text-right"> <a href="#.">Faqs </a> <a href="#.">Terms & Conditions </a> <a href="#.">Contact Us</a> </div>
        </div>
      </div>
    </div>
  </footer>
</div>

<!-- GO TO TOP --> 
	<a href="#" class="cd-top"><i class="ion-chevron-up"></i></a> 
<!-- GO TO TOP End --> 

<!-- Script --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/particles.min.js"></script> 
<script src="js/jquery.counterup.min.js"></script> 
<script src="js/jquery.sticky.js"></script> 
<script src="js/jquery.magnific-popup.min.js"></script> 
<script src="js/main.js"></script>
</body>
</html>
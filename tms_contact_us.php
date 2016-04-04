<?php
	$name ="";
	$email ="";
	$message ="";
	$errName ="";
    $errMessage ="";
    $errcaptchaResult ="";
    $result="";
    $errEmail ="";
    $checkTotal = 0;
    $captchaResult = 0;
    
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email']; // this is the sender's Email address
		$message = $_POST['message'];
		$from = 'TMS-GB Contact Form'; 
		$to = 'paulausta@hotmail.com'; // this is your Email address
		$subject = 'Message from TMS_GB Contact Form ';
		$captchaResult = intval($_POST["captchaResult"]); //this is integer 
		$firstNumber = intval($_POST["firstNumber"]); //this is integer 
		$secondNumber = intval($_POST["secondNumber"]); //this is integer 
		$checkTotal = $firstNumber + $secondNumber;
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($captchaResult !== $checkTotal) {
			$errcaptchaResult = 'Your math is incorrect';
		}

// If there are no errors, send the email; $errName has been defined as empty string, if it is there is no error; but if $errName is not empty string - 'Please enter a valid email address' - then we have error. 
if ($errName == "" && $errEmail == "" && $errMessage == "" && $errcaptchaResult == "") {
	if (mail ($to, $subject, $body, $from)) {
		header('Location: submitted.html');
		
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
} 
	}
?>

<?php
	// init variables
	$min_number = 1;
	$max_number = 15;

	// generating random numbers
	$random_number1 = mt_rand($min_number, $max_number);
	$random_number2 = mt_rand($min_number, $max_number);
?>
<!DOCTYPE html>
<html lang="en-gb">
<head>
<meta charset="ISO-8859-1">
<title>TMS - Contact Us</title>
<meta name="keywords" content="TMS UK, Wokingham, contact us">
<meta name="author" content="imagine & make website - Web development, Web design and photography">
<meta name="categories" content="Electronics Manufacturing (CEM)">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,700italic' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
<![endif]-->
<link href="css/normalize.css" rel="stylesheet">
<link href="css/custom_main.css" rel="stylesheet">
<link href="css/superfish_modyfied.css" rel="stylesheet">
<link href="css/carousel.css" rel="stylesheet">
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  -->
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery_superfish.js"></script>
<meta name="google-site-verification" content="ptqnD4oTdgQ3KooNwIcgz9deH1POLQaHYCdK1MVGrqE" />
</head>
<body>
<div id="Max-Width">
<div id="Min-Width">
<div id="Wrapper">
<div id="Inner-Framework">
<div itemscope itemtype="http://schema.org/LocalBusiness" id="Header"><br>
	<a itemprop="name" title="TMS - PCB & Cable Assembly" href="http://www.tms-gb.co.uk/">
	<img itemprop="logo" src="images/TMS_logo_330x152.png" alt="TMS - PCB & Cable Assembly"></a>
<div class="Header-text">
	<h1>PCB & CABLE ASSEMBLY</h1>
	<h3>... FROM PROTOTYPING TO FULL BOX BUILD </h3>
	<h4>1988&#8211;2015&nbsp;<span style="display:none;">-</span>&#8211;&nbsp;27 YEARS OF EXPERIENCE</h4>
</div>
</div>     <!-- end Header -->
<ul class="sf-menu">  
<li class="homeMenu"><a class="homeMenu" href="index.html" target="_self">Home</a></li>
<li><a href="about_us.html" target="_self">About&nbsp;Us</a></li>
<li><a href="pcb_assembly.html" target="_self">PCB&nbsp;Assembly</a></li>
<li><a href="cable_assembly.html" target="_self">Cable&nbsp;Assembly</a></li>
<li><a href="Other_services.html" >Other Services</a>
					<ul>
						<li><a href="advanced_electronics_rework.html" >Rework</a></li>						
						<li><a href="pcb_protoype_assembly.html" >Prototype&nbsp;Assembly</a></li>						
						<li><a href="pcb_cable_test_inspection.html" target="_self">Inspection/Test</a></li>
						<li><a href="reverse_engineering.html" target="_self"> Reverse&nbsp;Engineering</a></li>						
						<li><a href="electronics_full_box_build.html" target="_self">Full&nbsp;Box&nbsp;Build</a></li>
						<li><a href="clientloginpage.php" target="_self">Client&nbsp;Login&nbsp;Page</a></li>
					</ul>
                    <div class="clear"></div>
</li>
    <li class="referenceMenu"><a class="referenceMenu" href="reference.html" target="_self">Reference</a>
<ul>
    <li><a href="glossary_of_PCB_terms.html" target="_self">Glossary&nbsp;of&nbsp;PCB Terms</a></li>
</ul>
    <div class="clear"></div>
</li>
    <li class="contactusMenu"><a class="contactusMenu current" href="#tms_contact_us" target="_self">Contact&nbsp;Us</a></li>    
     </ul><!-- end nav -->
<div class="bannerTMS">
<img src="images/contact-us-banner.png">
</div>

<div class="textWindow">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2490.52763153847!2d-0.8797690999999966!3d51.37498004999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48768245f4958f3b%3A0x69ad7406f5164e00!2sTeam+Manufacturing+Services+(TMS)!5e0!3m2!1sen!2suk!4v1394566903403;output=embed" width="1044" height="435" frameborder="0" style="border:0" scrolling="no"></iframe>
</div>

<div class="colLeftcontact">
	<h3>Please supply your name and e-mail and we will contact you shortly.</h3><br>


				<form class="form-horizontal" role="form" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php if (isset($_POST['name'])){ echo htmlspecialchars($_POST['name']); } ?>">
<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php if (isset($_POST['email'])){ echo htmlspecialchars($_POST['email']); } ?>">
<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message"><?php if (isset($_POST['message'])){ echo htmlspecialchars($_POST['message']); } ?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
						</div>
												
					<div class="form-group">
						<p>Resolve the simple math below: <br /></p>
						<?php
							echo $random_number1 . ' + ' . $random_number2 . ' = ';
						?>
						<input type="text" class="form-control" id="captchaResult" name="captchaResult" placeholder="Your Answer">
						<input name="firstNumber" type="hidden" value="<?php echo $random_number1; ?>" />
						<input name="secondNumber" type="hidden" value="<?php echo $random_number2; ?>" />			
					</div>					
			
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="TandC">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result;?>
							<?php echo "<p class='text-danger'>$errcaptchaResult</p>"; ?>								
						</div>						
					</div>
				</form> 
</div>

<div class="colRightmap textWindow">
	<section  itemscope itemtype="http://schema.org/LocalBusiness" id="contactUs">
		<p style="color: #2a3481;"><strong><span itemprop="name">Team Manufacturing Services</span></strong><br>
		<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">Team House<br></span>
		<span itemprop="streetAddress">27 Nine Mile Ride<br>
		Finchampstead, Wokingham<br></span>
		<span itemprop="addressLocality">Berkshire<br></span>
		<span itemprop="postalCode">RG40&nbsp;&nbsp;4QD&nbsp;&nbsp;</span><br />
		<span itemprop="addressCountry">United Kingdom</span></p> 
		<h4>Call for FREE Quotation:<br>
		<span itemprop="telephone">0118 973 5000</span><br>	
		<span itemprop="telephone">0871 789 7500</span></h4>
	</section>	
	<div class="soc-shapeContact">
		<span class="soc"><a href="https://www.facebook.com/groups/418920551492594/" target="_blank"><img src="images/f.png"></a>
		</span>
		<span class="soc"><a href="https://www.twitter.com/TMS_ASSEMBLY" target="_blank"><img src="images/t.png"></a>
		</span>
		<span class="soc"><a href="http://www.youtube.com/channel/UCUHOkTPFdaLo6CosFs-RLgg/videos" target="_blank"><img src="images/y.png"></a>
		</span>
		<span class="soc"><a href="http://www.linkedin.com/groups/Team-Manufacturing-Services-4562451?trk=myg_ugrp_ovr" target="_blank"><img src="images/l.png"></a>
		</span>
		<span class="soc"><a href="https://plus.google.com/u/0/b/102118160111769212183/+Tms-gbCoUk/videos/p/pub" target="_blank"><img src="images/g.png"></a>
		</span>
	</div><!-- end soc-shape -->
</div><!-- colRightmap -->
<div class="bottomShape">
	<div class="bottomMenu">	
			<span>| <a href="Team Manufacturing Services ISO-9001 Rev B.pdf" target="_self">Quality&nbsp;Policy</a></span>
			
			<span>| <a href="document_privacy_security.html">Privacy&nbsp;Policy</a></span>
			
			<span>| <a href="Team Manufacturing Services ISO-14001 Rev B.pdf" target="_self">Environmental&nbsp;Policy</a></span>
			
			<span>| <a href="tms_terms_conditions.html" target="_self">Terms&nbsp;&amp;&nbsp;Conditions</a></span>
			
			<span>| <a href="tms_contact_us.php">Contact&nbsp;Us</a></span>
			
			<span>| <a href="Site_Tree.html">Site&nbsp;Map</a> |</span>		
		<p class="copyrights">&copy;&nbsp;2015&nbsp;<a class="copyrights" href="index.html" >Team Manufacturing Services</a></p>
</div><!-- end bottomMenu -->
			<div class="isoIcons">
			    <img id="imgiso14001" style="width:60px;height:65px;opacity: 0.9;" alt="iso14001" src="images/iso14001.bmp">
			    <img id="img_iso9001" style="width:60px;height:65px;opacity: 0.9;" alt="iso9001" src="images/iso9001.bmp">
			    <img id="Image2" style="width:110px;height:65px;opacity: 0.9;" alt="IPC_logo" src="images/IPC_logo.jpg">		
			</div><!-- end isoIcons  -->
<p class="pull-right text-muted">Website by&nbsp;&nbsp;<a class="websiteAuthor text-muted" href="http://www.imagineandmake.co.uk/" target="_blank">imagine <span class="imFont">&</span> make</a></p>
</div> <!-- end bottomShape -->
</div> <!-- end Inner-Framework -->
</div><!--- Wrapper -->
</div><!-- "Min-Width" -->
</div><!-- end Max-Width -->
<!-- <script type="text/javascript" src="js/custom_im.js"></script> -->
<script src="http://jqueryui.com/resources/demos/effect/easing.html"></script>


<script>
	jQuery(document).ready(function() {
		jQuery('ul.sf-menu').superfish();
	});
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html> 
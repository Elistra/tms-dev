<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>


<?php
$username = "";

if (isset($_POST['submit'])) {
    // Process the form

    // validations
    $required_fields = array("username", "password");
    validate_presences($required_fields);

    if (empty($errors)) {
        // Attempt Login


        // username & pasw already posted and I'm taking this super global variables and putting them in local variables
        $username = $_POST["username"];
        $password = $_POST["password"];


        $found_user = attempt_login($username, $password);
        $found_admin = admin_check($username);

        // $alexdebug = $found_admin["admin"];

        // echo "$alexdebug";



        if ($found_user) {
            $_SESSION["user_id"] = $found_user["id"];
            $_SESSION["username"] = $found_user["username"];

            if ($found_admin) {
                // Success
                // Mark user as logged in
                $_SESSION["admin_id"] = $found_admin["admin"];
                redirect_to("manage_users.php");
            } else {
                redirect_to("client_page.php"); // Change this when we have a user page
            }

        } else {
            // Failure
            $_SESSION["message"] = "Username/password not found.";
        }
    }
} else {
    // This is probably a GET request
    if(logged_in_admin()) {
        redirect_to("manage_users.php");
} elseif (logged_in()) {
        redirect_to("client_page.php");
    }
}


?>

<head>

<meta charset="ISO-8859-1">
<title>TMS - Client Login Page</title>
<meta name="description" content="">
<meta name="keywords" content="PCB Assembly, Cable Assembly, TMS, team manufacturing services, tms client login page">


<meta name="author" content="imagine & make website - Web development, Web design and photography">


<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,700italic' rel='stylesheet' type='text/css'>
<link href="css/clientloginpage.css" media="all" rel="stylesheet" type="text/css" />



<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
<![endif]-->


<link href="css/normalize.css" rel="stylesheet">
<link href="css/custom_main.css" rel="stylesheet">
<link href="css/superfish_modyfied.css" rel="stylesheet">
<link href="css/carousel.css" rel="stylesheet">


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

<ul class="sf-menu" style="width: 1044px;">

    
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

                                 <li><a href="#clientloginpage" target="_self" class="current">Client&nbsp;Login&nbsp;Page</a></li>

                   
                    </ul>
                    <div class="clear"></div>
</li>

<li class="referenceMenu"><a class="referenceMenu" href="reference.html" target="_self">Reference</a>
<ul>
    <li><a href="glossary_of_PCB_terms.html" target="_self">Glossary&nbsp;of&nbsp;PCB Terms</a></li>
</ul>
    <div class="clear"></div>
</li>
<li class="contactusMenu"><a class="contactusMenu" href="tms_contact_us.php" target="_self">Contact&nbsp;Us</a></li>

     </ul><!-- end nav -->





    <div id="page">

        <div class="stocklist">
            <img src="images/stocklist.png">
        </div>


        <?php echo message(); ?>
        <?php echo form_errors($errors); ?>
        <br />
        <br />

        <h2>Login</h2>
        <form action="clientloginpage.php" method="post">
            <p>Username:
                <input type="text" name="username" value="<?php echo htmlentities($username); ?>" />
            </p>
            <p>Password:
                <input type="password" name="password" value="" />
            </p>
            <input type="submit" name="submit" value="Submit" />
        </form>
        <br />
        <br />
        
<p>This is our free and secure 'Client Area' for customer specific information files that are uploaded by TMS.
We can upload your free-issue stock lists to the 'Client Area' which you can download and review whenever you like.</p>

<p>Enter your user-name and password (provided by TMS) and you will be taken to your own file page.</p>

<p>Just select a file and click 'Download' to retrieve it to your computer where is can be viewed locally. <br>
Other information files can be uploaded to the Client Area including images, spreadsheets, documents, certificates etc.</p>



    </div><!-- end page -->





<div class="bottomShape">

	<div class="bottomMenu">
	
	
			<span>| <a href="Team Manufacturing Services ISO-9001 Rev B.pdf" target="_self">Quality&nbsp;Policy</a></span>
			
			<span>| <a href="document_privacy_security.html">Privacy&nbsp;Policy</a></span>
			
			<span>| <a href="Team Manufacturing Services ISO-14001 Rev B.pdf" target="_self">Environmental&nbsp;Policy</a></span>
			
			<span>| <a href="tms_terms_conditions.html" target="_self">Terms&nbsp;&amp;&nbsp;Conditions</a></span>
			
			<span>| <a href="tms_contact_us.html">Contact&nbsp;Us</a></span>
			
			<span>| <a href="Site_Tree.html" class="current" target="_self">Site&nbsp;Map</a> |</span>
		
		
		<p class="copyrights">&copy;&nbsp;2015&nbsp;<a class="copyrights" href="index.html" >Team Manufacturing Services</a></p>
		

	
	</div><!-- end bottomMenu -->
	

						<div class="isoIcons">


		    <img id="imgiso14001" style="width:60px;height:65px;opacity: 0.9;" alt="iso14001" src="images/iso14001.bmp">

		    <img id="img_iso9001" style="width:60px;height:65px;opacity: 0.9;" alt="iso9001" src="images/iso9001.bmp">

		    <img id="Image2" style="width:110px;height:65px;opacity: 0.9;" alt="IPC_logo" src="images/IPC_logo.jpg">
		
				</div><!-- end isoIcons  -->
		
		
	    
		<p class="pull-right text-muted">Website by&nbsp;&nbsp;<a class="websiteAuthor text-muted" href="http://www.imagineandmake.co.uk/" target="_blank">imagine <span class="imFont">&</span> make</a></p>

</div><!-- end bottomShape -->


</div><!-- end Inner-Framework -->
</div><!--- Wrapper -->
</div><!-- "Min-Width" -->
</div><!-- end Max-Width -->


<script src="http://jqueryui.com/resources/demos/effect/easing.html"></script>
<script>


	jQuery(document).ready(function() {
		jQuery('ul.sf-menu').superfish();
	});

</script>


    <script type="text/javascript">
        var $buoop = {};
        $buoop.ol = window.onload;
        window.onload=function(){
            try {if ($buoop.ol) $buoop.ol();}catch (e) {}
            var e = document.createElement("script");
            e.setAttribute("type", "text/javascript");
            e.setAttribute("src", "//browser-update.org/update.js");
            document.body.appendChild(e);
        }
    </script>


    

</body>

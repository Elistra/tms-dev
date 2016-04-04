<?php 
	if (!isset($layout_context)) {
		$layout_context = "public_html";
	}
?>
<?php $username = $_SESSION["username"];?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">


	<head>
		<link href="../css/clientloginpage.css" media="all" rel="stylesheet" type="text/css" />
	</head>
	<body>

    <div itemscope itemtype="http://schema.org/LocalBusiness" id="Header"><br>
        <a itemprop="name" title="TMS - PCB & Cable Assembly" href="http://www.tms-gb.co.uk/">
            <img itemprop="logo" src="images/TMS_logo_330x152.png" alt="TMS - PCB & Cable Assembly"></a>





        <div class="Header-text">
            <h1>PCB & CABLE ASSEMBLY</h1>
            <h3>... FROM PROTOTYPING TO FULL BOX BUILD </h3>
            	<h4>1988&#8211;2015&nbsp;<span style="display:none;">-</span>&#8211;&nbsp;27 YEARS OF EXPERIENCE</h4>
        </div>

    </div>     <!-- end Header -->


    <div id="underheader">
        <div class="text-holder">
      <h1>TMS <?php if ($layout_context == "admin") { echo "Admin";
          } else {
              echo " Client Area";
          } ?></h1>
        <h4>You are logged in as: <?php echo htmlentities($username); ?></h4>
        </div>
    </div>
<div class="navigationarea">

<ul id="navigation">
    <li><a href="index.html"><button type="button">&laquo; Back to the Home Page</button></a></li>
        <li><a href="logout.php"><button class="logout" type="button">Logout</button></a></li>
</ul>
</div>

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
<?php
include("php/config.php");
session_start();
?>
<html>
	<head>
		<title><?php echo $TITLE;?></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="js/functions.js" type="text/javascript"></script>
		<script src="js/gui.js" type="text/javascript"></script>
		<script src="js/helper.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<img src="img/logo.png" alt="GDP"/>
				<h1><?php echo $TITLE;?></h1>
				<div id="logout">
					<span id="msg_welcome"></span>
					<span id="btn_logout" onclick="btn_logout_onclick()">Logout</span>
				</div>
			</div>
			<div id="navigation">
				<!-- Filled by JS Functions -->
			</div>
			<div id="content">
				<!-- Filled by JS Functions -->
			</div>
			<div id="msg_status">
				<!-- Filles by JS Functions -->
			</div>
			<div id="footer">
				by <?php echo $AUTHOR;?> v<?php echo $VERSION;?>
			</div>			
		</div>
		<div id="page-cover" class="hidden"><!-- Initially Hidden, will be used by Dialogs to dim the page--></div>
		<div id="popup" class="hidden"><!-- Initially Hidden, will be used by Dialogs --></div>
		<script type="text/javascript">
			init_page();
			<?php 
			if(!isset($_SESSION["gdp_id"])){
				echo "showLogin();";
			}
			else {
				echo "showLoggedInUser();";
			}
			?>
		</script>
	</body>
</html>
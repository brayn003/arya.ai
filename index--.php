<?php
	session_start();
	if(isset($_SESSION['user'])){
		header('location:index2.php');
	}else{
		if (isset($_POST['user'])) {
			$_SESSION['user']['name'] = $_POST['user'];
			$_SESSION['user']['botsession'] = "";
			header('location:index2.php');
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Arya.ai</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	<form method="POST" action="index.php">
		<input type="text" name="user" /></input>
		<input type="submit"></input>
	</form>
    <script type="text/javascript" src="lib/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
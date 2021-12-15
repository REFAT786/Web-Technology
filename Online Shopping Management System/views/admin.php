<?php
	session_start();
	if(!isset($_SESSION["username"]))
	{
	    header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>


	<?php include "includes/header.php" ;?>

	<?php include "includes/menubar.php" ;?>

	
	<?php 
		
		echo "Welcome " .$_SESSION["username"];

	?>
	

	



	<?php include "includes/footer.php" ;?>



</body>
</html>
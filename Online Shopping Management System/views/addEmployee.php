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
	<link rel="stylesheet" type="text/css" href="css/addEmployee.css">
	<title></title>
</head>
<body>
	<?php include "includes/header.php" ;?>

	<?php include "includes/menubar.php" ;?>


	<?php
		echo "Welcome " .$_SESSION["username"];
	?>

	

	<?php include "../controllers/addemployeeAction.php";?><br><br>
	<div class="form">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="own">
		<fieldset >

			<legend>Employee Add</legend>

			
			User Name *: <input type="text" name="username" value="<?php echo $username;?>">
			<label><?php echo $usernameEr;?></label>
			
			<br><br>
			Password *: <input type="password" name="password" value="<?php echo $password;?>">
			<span><?php echo $passwordEr;?></span>
			
			<br><br>
			Confirm Password *: <input type="password" name="confirmpassword" value="<?php echo $confirmpassword;?>">
			<span><?php echo $confirmpasswordEr;?></span>
			<br><br>
			
			<input type="submit" class="done" name="submit" value="Add">
			

		</fieldset>

	</form><br><br>
		
	</div>

	

	<span><?php echo $successMesg;?></span>
	<span><?php echo $errorMesg;?></span>

	<?php include "includes/footer.php" ;?>

</body>
</html>
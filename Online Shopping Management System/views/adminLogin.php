
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/adminLogin.css">
	<title></title>
</head> 
<body>
	<?php include "includes/header.php" ;?>
	<br><br>

	<?php include "../controllers/adminloginAction.php" ;?>

	<br><br>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name="jsadminForm" class="adminForm" onsubmit="return isvalid(this)">
	
		<fieldset align="center" class="adminLogin">

			<legend>Admin Log In information</legend>

			User Name *: <input class="textbox" type="text" id="username" name="username" value="<?php echo $username;?>">
			<span id="u"></span>
			<span style="color: red"><?php echo $usernameEr;?></span>
			
			<br><br>
			Password *: <input class="textbox" type="password" id="password" name="password" value="<?php echo $password;?>">
			<span id="p"></span>
			<span style="color: red"><?php echo $passwordEr;?></span>
			
			<br><br>
			<input type="checkbox" name="remember"value="1">Remember Me

			<br><br>

			<input type="submit" name="submit" value="log in" class="loginButton">
			<br><br>

			<a href="forgetPassword.php">forget Password</a><br><br>

			<a href="registration.php">Click to Registration</a>
			

		</fieldset>

	</form>
	<span><?php echo $loginfailed;?></span>
	<?php 
		if(isset($_COOKIE['username']))
		{
			$username=$_COOKIE['username'];

			echo "<script>
				document.getElementById('username').value='$username';

			</script>";

		}
	

	?>

	<script src="js/login.js"></script>

</body>
</html>
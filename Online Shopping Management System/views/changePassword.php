

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/changePassword.css">
	<title>Registration</title>
</head>
<body>
	<?php include "includes/header.php" ;?>
	<?php include "includes/menubar.php" ;?>
	<?php include "../controllers/changepasswordAction.php" ;?>
	<br><br>
	
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name="jschangePassForm" class="own" onsubmit="return isvalid(this)">
	
		<fieldset align="center">

			<legend>Change Password</legend>

			
			<br><br>
			Change Password *: <input type="password" name="password" value="<?php echo $password;?>">
			<span id="p"></span>
			<span><?php echo $passwordEr;?></span>
			
			<br><br>
			Confirm Password *: <input type="password" name="confirmpassword" value="<?php echo $confirmpassword;?>">
			<span id="cp"></span>
			<span><?php echo $confirmpasswordEr;?></span>
		
			<br><br>
			<input type="submit" class="done" name="submit" value="Change Password">
			<br><br>

		</fieldset>

	</form>

	<span><?php echo $successMesg;?></span>
	<span><?php echo $errorMesg;?></span>
	<br><br>

	<?php include "includes/footer.php" ;?>

	<script src="js/changePassword.js"></script>

</body>
</html>
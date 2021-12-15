<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	<?php 
		include "DB/dbread.php";

		$username=$password="";
		$usernameEr=$passwordEr='';
		$flag=false;
		$loginfailed="";
		

		if(htmlspecialchars($_SERVER['REQUEST_METHOD']=="POST"))
		{
			$username=$_POST["username"];
			$password=$_POST["password"];
			
			if(empty($username))
			{
				$usernameEr="User name is required  ";
				$flag=true;
				
			}
			else
			{
				$username=senitize($username);
				$flag=false;
			}
			if(empty($password))
			{
				$passwordEr= "Password is  required  ";
				$flag=true;
				
			}
			else
			{
				$password=senitize($password);
				$flag=false;
			}
			
			$isvalid=false;

			if(!$flag)
			{
				
				$result =login($username,$password );
				if($result)
				{
					if(isset($_POST['remember']))
					{
						setcookie('username',$username,time()+60);

					}
					session_start();
					$_SESSION["username"]=$username;
					 
					header("Location: ../views/admin.php");
					
				}
				else
				{
					$loginfailed= "Login failed";


				}
			}
			
		}
			

			function senitize($data)
			{
				$data=trim($data);
				$data=stripcslashes($data);
				$data=htmlspecialchars($data);
				return $data;

			}
			


	?>

</body>
</html>
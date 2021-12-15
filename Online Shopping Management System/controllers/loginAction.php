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
			if(!$flag)
			{
				$username =  senitaiz($_POST["username"]);
            	$password = senitaiz($_POST["password"]);
				
				$result =login($username,$password );
	            if($result){
	              header("Location: ../views/admin.php");  
	            }
	            echo "<br>";
	            $loginfailed= "Invalid Password ";
			}
			
		}




	?>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
		include "../controllers/DB/dbread.php";
		$username=$usernameEr="";
		
		$flag=false;
		$successMesg = $errorMesg = "";
		
		if(htmlspecialchars($_SERVER['REQUEST_METHOD']=="POST"))
		{
			$username=$_POST["username"];
			
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
		

			if(!$flag)
			{
				$result =search($username);
				if($result)
				{
					session_start();
					$_SESSION["username"]=$username;
					 
					header("Location: ../views/forgetPassword2.php");
					
				}
				else
				{
					//$loginfailed= "not found";
					echo "not found";
					 
				}
			}
			else
			{
				echo "<br>";
				echo "Somethig Validation Priblem";
				echo "<br>"	;
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
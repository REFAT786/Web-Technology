<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
		include "../controllers/DB/dbinsert.php";

		$fullname=$username=$password=$confirmpassword="";
		$fullnameEr=$usernameEr=$passwordEr=$confirmpasswordEr='';
		$flag=false;
		$successMesg = $errorMesg = "";
		
		if(htmlspecialchars($_SERVER['REQUEST_METHOD']=="POST"))
		{
			
			$username=$_POST["username"];
			$password=$_POST["password"];
			$confirmpassword=$_POST["confirmpassword"];
			

			
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
			if(empty($confirmpassword))
			{
				$confirmpasswordEr= "Confirm password is  required  ";
				$flag=true;
				
			}
			else if($confirmpassword!==$password)
			{
				$confirmpasswordEr= "Confirm password is  not matched  ";
				$flag=true;

			}
			else
			{
				$confirmpassword=senitize($confirmpassword);
				$flag=false;
			}

			

			if(!$flag)
			{
				$result = addEmployee($username, $password);
			        

				if(!$result)
				{
					$successMesg="save successfully";
				}
				else
				{
					$errorMesg="error while saving";
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
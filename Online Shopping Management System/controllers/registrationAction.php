<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
		include "../controllers/DB/dbinsert.php";

		$fullname=$username=$password=$confirmpassword=$rule="";
		$fullnameEr=$usernameEr=$passwordEr=$confirmpasswordEr=$ruleEr='';
		$flag=false;
		$successMesg = $errorMesg = "";
		
		if(htmlspecialchars($_SERVER['REQUEST_METHOD']=="POST"))
		{
			$fullname =$_POST["fullname"];
			$username=$_POST["username"];
			$password=$_POST["password"];
			$confirmpassword=$_POST["confirmpassword"];
			$rule=$_POST['rule'];


			if(empty($fullname))
			{
				$fullnameEr="Full name is required  ";
				$flag=true;
				
			}
			else if(!preg_match("/^[a-zA-Z-' ]*$/",$fullname))
			{
				$fullnameEr="Only letters and white space allowed";
				$flag=true;

			}
			else
			{
				$fullname=senitize($fullname);
				$flag=false;
			}

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

			if(empty($rule))
			{
				$ruleEr= "Rule is  required  ";
				$flag=true;
				
			}
			else
			{
				$rule=senitize($rule);
				$flag=false;
			}
			
			if($rule=="seller")
			{
				if(!$flag)
				{
					

					
				}



			}
			else if($rule=="buyer")
			{
				if(!$flag)
				{

				}


			}
			else if($rule=="admin")
			{
				if(!$flag)
				{
					$result = add($fullname, $username, $password, $rule);
			        

					if($result)
					{
						$successMesg="error";

					}
					else
					{
						$errorMesg="save successfully";
					}

					
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
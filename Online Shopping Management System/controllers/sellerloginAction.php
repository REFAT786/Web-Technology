<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	<?php 

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
				
				$readValue= read("../models/seller.json");
				$jsonDecode= json_decode($readValue,true);

				$isvalid=false;
				for($i=0; $i <count($jsonDecode); $i++)
				{
   					 if($username == $jsonDecode[$i]["username"] && $password == $jsonDecode[$i]["password"] )
   					 {
   					 	$isvalid=true;
        				session_start();
        				$_SESSION["username"]=$username;
       					header("Location: ../views/seller.php");
       					break;
    				 }
				}
				if($isvalid)
				{
					session_start();
					$_SESSION["username"]=$username;
					 
					header("Location: ../views/seller.php");
					
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
			function read($filename)
			{
	   			
	    		$fileSize = filesize($filename);
	    		$fr = "";
	    		if ($fileSize > 0) 
	    		{
	     		    $resource = fopen($filename, "r");
	        	    $fr = fread($resource, $fileSize);
	        		fclose($resource);
	       			return $fr;
	   			 }
			}


	?>

</body>
</html>
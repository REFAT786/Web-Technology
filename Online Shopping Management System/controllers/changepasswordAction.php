<?php
	session_start();
	if(!isset($_SESSION["username"]))
	{
	    header("Location: ../views/login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	

	<?php 

		$password=$confirmpassword="";
		$passwordEr=$confirmpasswordEr='';
		$flag=false;
		$successMesg = $errorMesg = "";
		
		if(htmlspecialchars($_SERVER['REQUEST_METHOD']=="POST"))
		{
			
			$password=$_POST["password"];
			$confirmpassword=$_POST["confirmpassword"];

			
			
		
			
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
				$servername = "localhost";
		        $username = "root";
		        $password = "";
		        $dbname = "OSMS";

		        $conn = new mysqli($servername, $username, $password, $dbname);

		        if ($conn->connect_error) {
		            die("Connection failed: " . $conn->connect_error);
		        }

		        
		        

				$sql = "UPDATE admininfo SET  password=? WHERE username = ?";
		        $stmt = $conn->prepare($sql);
		        $stmt->bind_param('ss',$password,$username);

		        $password=$_POST['password'];
       			$username=$_SESSION['username']; 

				$res = $stmt->execute();
				
				if ($res) {
					$successMesg= "Data update successful";
				}
				else {
					$errorMesg= "Failed to update data";
				}
				
				
			}
			else
			{
				echo "<h3>Something Validation is error</h3>";
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
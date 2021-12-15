<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	<?php 
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
				$servername = "localhost";
		        $username = "root";
		        $password = "";
		        $dbname = "OSMS";

		        $conn = new mysqli($servername, $username, $password, $dbname);

		        if ($conn->connect_error) {
		            die("Connection failed: " . $conn->connect_error);
		        }

		        
		        
		        $sql="DELETE FROM employeeinfo WHERE username = ?";
		        $stmt = $conn->prepare($sql);
		        $stmt->bind_param('s',$username);

       			$username=$_POST['username'];

				$res = $stmt->execute();
				
				if ($res) {
					
					header("Location: ../views/showEmployee.php");
				}
				else {
					$errorMesg= "Failed to delete data";
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
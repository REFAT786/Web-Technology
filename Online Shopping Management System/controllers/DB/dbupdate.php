<?php 
   session_start();
   if(!isset($_SESSION["username"]))
   {
       header("Location: login.php");
   }
?>

<?php

   require "dbconnect.php";

   function update($password)
   {
      
       $conn =connect();
       $sql = "UPDATE admininfo SET  password=? WHERE username = ?";

       $stmt = $conn->prepare($sql);
       $stmt->bind_param('ss',$password,$username);  
       //$password=$_POST['password'];
       //$username=$_SESSION['username']; 
       $stmt->execute();
       $stmt->close();
       $conn->close();
      
      
  
   }
   
   
?>
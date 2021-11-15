<?php

   require "dbconnect.php";


    function add($fname, $Lname, $gender, $dob, $region, $paddress, $peraddress, $phone, $email, $username, $password)
    {
       $conn =connect();
       $sql="INSERT INTO users (fname,Lname,gender,dob,region,paddress,peraddress,phone,email,username,password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
       $stmt = $conn->prepare($sql);
       $stmt->bind_param('sssssssssss',$fname, $Lname, $gender, $dob, $region, $paddress, $peraddress, $phone, $email, $username, $password);
   
       $stmt->execute();
       $stmt->close();
       $conn->close();
  
   }

?>
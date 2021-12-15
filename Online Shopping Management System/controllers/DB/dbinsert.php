<?php

   require "dbconnect.php";

   function add($fullname, $username, $password, $rule)
   {
       $conn =connect();
       $sql="INSERT INTO admininfo (fullname,username,password,rule) VALUES (?, ?, ?, ?)";
       $stmt = $conn->prepare($sql);
       $stmt->bind_param('ssss',$fullname, $username, $password, $rule);
   
       $stmt->execute();
       $stmt->close();
       $conn->close();
  
   }
   function addEmployee($username, $password)
   {
       $conn =connect();
       $sql="INSERT INTO employeeinfo (username,password) VALUES (?, ?)";
       $stmt = $conn->prepare($sql);
       $stmt->bind_param('ss',$username, $password);
   
       $stmt->execute();
       $stmt->close();
       $conn->close();
  
   }

   
?>
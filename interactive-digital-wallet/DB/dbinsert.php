<?php

require "dbconnect.php";



   function addUser($name, $phone){
       $conn =connect();
    $sql = $conn->prepare("INSERT INTO user (name,phone) VALUES ( ?, ?)");
    $sql-> bind_param("ss",$name, $phone);
   
   $sql->execute();
   $sql->close();
    $conn->close();
  
}
function showUser(){
    $conn=connect();
    $sql =$conn->prepare( "SELECT * FROM user");
   
    $sql->execute();
    $result=$sql->get_result();
   return $result;
 
}


function showTransition(){
    $conn=connect();
    $sql =$conn->prepare( "SELECT * FROM transition");
   
    $sql->execute();
    $result=$sql->get_result();
   return $result;
 
}
function addtransition($catagory,$name,$amount){
    $conn=connect();
    $sql = $conn->prepare('INSERT INTO chat (catagory,name,amount) VALUES (?,?,?)');
    $sql->bind_param("sss",$catagory,$name,$amount);


    $sql->execute();
    $sql->close();
    $conn->close();
}

?>
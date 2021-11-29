<?php 
include "dbconnect.php";
 function add($name){
    $conn = connect();
    $sql = $conn->prepare("SELECT * FROM user WHERE name = ? ");
    $sql->bind_param("s", $name);
    $sql->execute();
    $result=$sql->get_result();
    return $result->num_rows === 1 ;

}
function searchUser($name){
    $conn=connect();
    $sql =$conn->prepare( "SELECT * FROM `user` WHERE name = ?");
    $sql->bind_param("s",$name);
    $sql->execute();
    $result=$sql->get_result();
    return $result->fetch_assoc();
}


?>
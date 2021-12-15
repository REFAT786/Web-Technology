<?php

    include "dbconnect.php";

    function login($username, $password)
    {
        $conn=connect();
        $sql="SELECT * FROM admininfo WHERE username=? and password=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result=$stmt->get_result();
        return $result->num_rows === 1 ;

        
    }
    function search($username)
    {
        $conn=connect();
        $sql="SELECT * FROM admininfo WHERE username=? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result=$stmt->get_result();
        return $result->num_rows === 1 ;

        
    }

?>
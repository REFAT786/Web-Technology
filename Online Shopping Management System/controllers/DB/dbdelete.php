<?php

   require "dbconnect.php";

   function delete($id)
   {
       $conn = connect();

      $sql = "DELETE FROM admininfo WHERE id = ?";

      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $id);
      $res = $stmt->execute();
      $stmt->close();
      $conn->close();
      return $res;
       
   }
   

   
?>
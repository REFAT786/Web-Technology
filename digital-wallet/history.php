<?php 
include "function.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

    <h1>Page 3 [transaction History]</h1>
    <br>

    <?php 
    include "menu.php";
   ?>

    <br><br>

    <table border="1">
   <tr>
     <th>Transaction Category</th>
     <th>To</th>
     <th>Amount</th>
   </tr>


   <?php   

     $data = file_get_contents("data.json");  
     $data = json_decode($data, true);  
     foreach($data as $row)  
      {  
           echo '<tr>
           <td>'.$row["category"].'</td>
           <td>'.$row["to"].'</td>
           <td>'.$row["amount"].'</td>
          </tr>';  
     }  
         ?>  



  
 
</table>

   
     
   

</body>
</html>
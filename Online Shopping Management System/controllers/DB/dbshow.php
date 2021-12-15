<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <table border='1'>
    <thead>
        <tr>
            <td>User Name</td>
            <td>Password</td>
            
        </tr>
    </thead>
    <tbody>
        

    </tbody>
<?php

    include "dbconnect.php";

    $conn=connect();
    if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);
    }   

    $sql = "SELECT * FROM employeeinfo";
    $data = $conn->query($sql);

    
    

    if ($data->num_rows > 0) {
        while ($row = $data->fetch_assoc()) {
            $u=$row['username'];
            $p=$row['password'];
            echo "<tr>";
             echo "<td>"."<input type='text' name='username' value=$u>"."</td>";
             echo "<td>"."<input type='text' name='password' value=$p>" ."</td>";
             
            echo "</tr>";
            
                 
        }
    }

    $conn->close();
        
            
       

?>
</tbody>
</table>

</body>
</html>

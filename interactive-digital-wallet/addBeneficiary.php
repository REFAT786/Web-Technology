<?php 
    include "DB/dbinsert.php";
    
    ?>
<?php 
    
    $name = $phone ="";
    $isValid = true;
   $nameErr = $phoneErr ="";
    $successfulMessage = $errorMessage = "";
    if($_SERVER['REQUEST_METHOD'] === "POST") {

        $name = $_POST['name'];
        $phone = $_POST['phone'];
       
         if(empty($name)) {
           $nameErr = "Beneficiary Name IS REQUIRED!";
           $isValid = false;
         }
        
         
         if(empty($phone)) {
           $phoneErr = "mobileno is REQUIRED!";
           $isValid = false;
         }
        
     

            if($isValid) {
            $name = senitaiz($name);
            $phone = senitaiz($phone);
           
            $result =addUser($name,$phone);
            if($result){
                echo "<br>";
                echo("successful");
       
            }
        
            else
            {
                echo "<br>";
                echo "not valid ";
            }
    
  
        }
    }
    ?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <script src="js/addUser.js"></script>
</head>
<body>

    <h1>Page 2 [Add Beneficiary]</h1>
    <br>

    <?php 
    include "menu.php";
    ?>

    <br><br>

    <h3>Add Beneficiary] : </h3><br>

    <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']) ?>" id="login" method="POST" onsubmit="return isValid()" name="LForm"> 
    <label for="beneficiaryname">Beneficiary Name : </label>
      <input type="text" name="name" value="">
      <span ><?php echo $nameErr; ?></span>

      
      <label>Mobile No : </label>

      <input type="tel" name="phone"  value="">
      <span ><?php echo $phoneErr; ?></span>
     
      <input type="submit" name="submit" value="submit">
      
     </form>

     <br><br>

       <table border="1">
   <tr>
     <th>Beneficiary Name</th>
     <th>Mobile</th>
     
   </tr>


</table>

 <?php   

     $data = showUser();  
    
     foreach($data as $row)  
      {  
           echo '<tr>
           <td>'.$row["name"].'</td>
           <td>'.$row["phone"].'</td>
          </tr>';   
     }  
?>  
<?php  
function senitaiz($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
    }
?>

   

</body>
</html>
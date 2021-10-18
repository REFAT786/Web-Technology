<?php 
    include "function.php";
    
    ?>
<?php 
    define("filepath", "data.json");
    $beneficiaryname = $mobileno ="";
    $isValid = true;
   $beneficiarynameErr = $mobilenoErr ="";
    $successfulMessage = $errorMessage = "";
    if($_SERVER['REQUEST_METHOD'] === "POST") {

        $beneficiaryname = $_POST['beneficiaryname'];
        $mobileno = $_POST['mobileno'];
       
         if(empty($beneficiaryname)) {
           $beneficiarynameErr = "Beneficiary Name IS REQUIRED!";
           $isValid = false;
         }
        
         
         if(empty($mobileno)) {
           $mobilenoErr = "mobileno is REQUIRED!";
           $isValid = false;
         }
        
     

            if($isValid) {
            $category = senitaiz($beneficiaryname);
            $to = senitaiz($mobileno);
           
            $arr1 = array('beneficiaryname' => $beneficiaryname,'mobileno' => $mobileno);
            $arr1_encode = json_encode($arr1);
             $current_data = file_get_contents('data_data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'beneficiaryname'               =>     $_POST['beneficiaryname'],  
                     'mobileno'          =>     $_POST["mobileno"]
                     
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);
            if(file_put_contents('data.json', $final_data))  {
              
                $successfulMessage = "Successfully saved.";
            }
            else {
                $errorMessage = "Error while saving.";
            }
        }
    }
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

    <h1>Page 2 [Add Beneficiary]</h1>
    <br>

    <?php 
    include "menu.php";
    ?>

    <br><br>

    <h3>Add Beneficiary] : </h3><br>


    <label for="beneficiaryname">Beneficiary Name : </label>
      <input type="text" name="beneficiaryname" value="">
      <span ><?php echo $beneficiarynameErr; ?></span>

      
      <label>Mobile No : </label>

      <input type="tel" name="mobileno"  value="">
      <span ><?php echo $mobilenoErr; ?></span>
     
      <input type="submit" name="submit" value="submit">
      
     

     <br><br>

       <table border="1">
   <tr>
     <th>Beneficiary Name</th>
     <th>Mobile</th>
     
   </tr>


   <?php   

     $data = file_get_contents("data_data.json");  
     $data = json_decode($data, true);  
     foreach($data as $row)  
      {  
           echo '<tr>
           <td>'.$row["beneficiaryname"].'</td>
           <td>'.$row["mobileno"].'</td>
          </tr>';  
     }  
         ?>  



  
 
</table>
   

</body>
</html>
<?php 
    include "function.php";
    
    ?>
<?php 
    define("filepath", "data.json");
    $category = $to = $amount = "";
    $isValid = true;
    $categoryErr = $toErr = $amountErr = "";
    $successfulMessage = $errorMessage = "";
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $category = $_POST['category'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];
        
         
         if(empty($category)) {
           $categoryErr = "CATEGORY IS REQUIRED!";
           $isValid = false;
         }
        
         
         if(empty($to)) {
           $toErr = "To is REQUIRED!";
           $isValid = false;
         }
        
        if(empty($amount)) {
           $amountErr = "amount is REQUIRED!";
           $isValid = false;
         }

            if($isValid) {
            $category = senitaiz($category);
            $to = senitaiz($to);
            $amount = senitaiz($amount);
            $arr1 = array('category' => $category,'to' => $to,'amount' => $amount);
            $arr1_encode = json_encode($arr1);
             $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'category'               =>     $_POST['category'],  
                     'to'          =>     $_POST["to"],  
                     'amount'     =>     $_POST["amount"]  
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
	<h1>Page 1 [Home]</h1>
    <br>

    
	<?php 
	include "menu.php";
    
	?>



	<br><br>

    <h3>Fund Transfer :</h3><br>
   

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <label for="category">Select Catagory:</label>
        <select name="category">
            <option value="">select a value</option>
            <option value="recharge">Mobile Recharge</option>
            <option value="send">Send Money</option>
            
            <span ><?php echo $categoryErr; ?></span>
        </select>

        <br><br>

         <label for="to" > To : </label>
         <select name="to">
            <option value="">select a value</option>
             <option value="rahim">Rahim</option>
            <option value="karim">Karim</option>
        
        </select>
        <span ><?php echo $toErr; ?></span>
        
        <br><br>

        <label for="amount">Amount:</label>
        <input type="number" name= "amount"  id="amount" min="0.00" max="100000.00"  >
        <span ><?php echo $amountErr; ?></span>

        <br><br>

        <input type="submit" name="submit" value="Submit">


    <p ><?php echo $successfulMessage; ?></p>
    <p ><?php echo $errorMessage; ?></p>

    <br>
      </form>
     
   

</body>
</html>
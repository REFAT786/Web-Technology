<?php 
    include "DB/dbinsert.php";
    
    ?>
<?php 
    
    $category = $name = $amount = "";
    $isValid = true;
    $categoryErr = $nameErr = $amountErr = "";
    $successfulMessage = $errorMessage = "";
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $category = $_POST['category'];
        $to = $_POST['name'];
        $amount = $_POST['amount'];
        
         
         if(empty($category)) {
           $categoryErr = "CATEGORY IS REQUIRED!";
           $isValid = false;
         }
        
         
         if(empty($name)) {
           $nameErr = "name is REQUIRED!";
           $isValid = false;
         }
        
        if(empty($amount)) {
           $amountErr = "amount is REQUIRED!";
           $isValid = false;
         }

        if($isValid) {
            $category = senitaiz($category);
            $name = senitaiz($name);
            $amount = senitaiz($amount);  

            $result=addTransition($catagory,$name,$amount);
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
    <script src="js/catagory.js"></script>
</head>
<body>
	<h1>Page 1 [Home]</h1>
    <br>

    
	<?php 
	include "menu.php";
    
	?>



	<br><br>

    <h3>Fund Transfer :</h3><br>
   

      <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']) ?>" id="login" method="POST" onsubmit="return isValid()" name="LForm">

        <label for="category">Select Catagory:</label>
        <select name="category">
            <option value="">select a value</option>
            <option value="recharge">Mobile Recharge</option>
            <option value="send">Send Money</option>
            
            <span ><?php echo $categoryErr; ?></span>
        </select>

        <br><br>

         <label for="name" > To : </label>
         <select name="name">
            <option value="">select a value</option>
             <option value="rahim">Rahim</option>
            <option value="karim">Karim</option>
        
        </select>
        <span ><?php echo $nameErr; ?></span>
        
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
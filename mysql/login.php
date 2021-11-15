<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
  <body>

<?php 
 include "DB/dbread.php";
 $username = $password = "";
 $usernameEr = $passwordEr = "";
 $Form_name = "";
 $From_pass ="";?>

    <h1>Login Form</h1>
   <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']) ?>" method="POST">
        <label for="userName">User Name :</label>
        <input type="text" id="username" name="username">         
        <span style="color: red;"> * <?php echo $usernameEr;  ?></span> <br> <br>
        <label for="Password">Password :</label>
        <input type="password" id="Password" name="password">        
        <span style="color: red;"> * <?php echo $passwordEr;  ?></span> <br> <br>

        <input type="submit" name="submit" value="Login"> <br> <br>
   </form>
        <a href="registration-form.php">Click to register</a> 

        <?php
       
        $flag= false;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         
          
          if (empty($_POST["username"])) {
            $usernameEr = "User Name is required";
            $flag = true;
          }
      
          if (empty($_POST["password"])) {
            $passwordEr = "password is required";
            $flag = true;
          }

          if(!$flag){
            $username =  senitaiz($_POST["username"]);
            $password = senitaiz($_POST["password"]);
            $result =login($username,$password );
            if($result){
              header("Location: welcome.php");  
            }
            echo "<br>";
            echo "Invalid Password ";
          }
       

        
      }
        
        function senitaiz($data)
        {
          $data = htmlspecialchars($data);
          $data = trim($data);
          $data = stripslashes($data);
          return $data;
        }
        
     
        ?>  

</body>

</body>
</html>
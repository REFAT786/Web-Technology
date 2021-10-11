<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
</head>
<body>


    <h1>Login Form</h1>
   <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']) ?>" method="POST">
   <label for="userName">User Name :</label>
        <input type="text" id="userName" name="userName"> <br> <br>
        <label for="Password">Password :</label>
        <input type="password" id="Password" name="Password"> <br> <br>
        <input type="submit" name="submit" value="Login"> <br> <br>
   </form>
        <a href="Registration-form.php">Click to register</a> 

        <?php
        $Name = "";
        $pass ="";
        
        $Name =  input($_POST["userName"]);
        $pass = input($_POST["Password"]);
        

         $readValue= read();
        $jsonDecode= json_decode($readValue,true);
        for($i=0; $i <count($jsonDecode); $i++){
            if($Name == $jsonDecode[$i]["UserName"] && $pass == $jsonDecode[$i]["Password"]){
                //echo "LogIn success";


                //header( string $header [, bool $replace [, int $http_response_code ]]) 

                header('Location: Welcome.php');


       
            }
            else{
                echo "LogIn failed";
            }
        }
        function input($v)
        {
          $v = htmlspecialchars($v);
          $v = trim($v);
          $v = stripslashes($v);
          return $v;
        }
        
        function read()
        {
          $fileName = "data.txt";
          $fileSize = filesize($fileName);
          $fr = "";
          if ($fileSize > 0) {
            $resource = fopen($fileName, "r");
            $fr = fread($resource, $fileSize);
            fclose($resource);
            return $fr;
          }
        }
        ?>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>



    <?php
    $fname =  $fname1 = $gender = $dob = $regions = $address1 = $address2 = $phone = $email = $userName = $Password = "";
    $fnameEr = $fname1Er = $genderEr = $dobEr = $regionsEr =  $emailEr = $PasswordEr =  $userNameEr = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

     
        
        $regions = $_POST["regions"];
        $address1 = $_POST["address1"];
        $address2 = $_POST["address2"];
   
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $link = $_POST["link"];
        $userName = $_POST["userName"];
        $Password = $_POST["Password"];

        if (!empty($_POST["fname"])) {

            $fname = $_POST["fname"];
          } else {
           
            $fnameEr = "First Name is required";
         }
        if (!empty($_POST["fname1"])) {
            $fname1 = $_POST["fname1"];
            
          } else {
            $fname1Er = "Last Name is required";
         }
        if (!empty($_POST["gender"])) {

            $gender = $_POST["gender"];
          } else {
            
            $genderEr = "Gender is required";
          
         }
         if (!empty($_POST["dob"])) {
            $dob = $_POST["dob"];
            
          } else {
            $dobEr = "Date of Birth is required";
           
         }
        if (!empty($_POST["regions"])) {
            $regions = $_POST["regions"];
            
          } else {
            $regionsEr = "Religion is required";
           
         }

        if (!empty($_POST["email"])) {
            $email = $_POST["email"];
          
          } else {
            $emailEr = "Email is required";
           
         }
        if (!empty($_POST["userName"])) {
            $userName = $_POST["userName"];
          
          } else {
            $userNameEr = "User Name is required";
           
         }
        if (!empty($_POST["Password"])) {
            $Password = $_POST["Password"];
          
          } else {
            $PasswordEr = "Password is required";
           
         }
        }
      
      function input ($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
         
    }
    


?>
    <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>
        <legend>Basic information</legend>
        <label >Enter your first name :</label>
        <input type="text"  name="fname" > 
        <span style="color: red;"> * <?php echo $fnameEr;  ?></span>
        <br>
        <label >Enter your Last name :</label>
        <input type="text"  name="fname1">
        <span style="color: red;"> * <?php echo $fname1Er;  ?></span>
        <br>
        <label  >Gender</label>
        <input type="radio" name="gender" >Female
        <input type="radio" name="gender" >Male
        <input type="radio" name="gender" >Other
        <span style="color: red;"> * <?php echo $genderEr;  ?></span>
        <br><br>
        <label > Date of Birth</label>
        <input type="Date"  name="dob">
        <span style="color: red;"> * <?php echo $dobEr;  ?></span>
        <br>
        <label >Religion</label>
        <select name="regions" >
            <option ></option>
            <option  >Muslim</option>
            <option >Hindu</option>
            <option >Others</option>
    
        </select>
        <span style="color: red;"> * <?php echo $regionsEr;  ?></span>


        </fieldset>
        <fieldset>
        <legend>Contact information</legend>

        <label >Present Address :</label>
        <textarea name="address1"  ></textarea> <br><br>
        <label >Permanent Address :</label>
        <textarea name="address2"  ></textarea> <br><br>
        <label for="phone">phone :</label>
        <input type="tel" name="phone"><br><br>
      

        <label >Email :</label>
        <input type="Email" name="email">
        <span style="color: red;"> * <?php echo $emailEr;  ?></span>
        <br><br>
        <label >Perasonal Website Link :</label>
        <input type="url" name="link">
        <br><br>
        
        </fieldset>
        <fieldset>
        <legend>Account  information</legend>

        <label >User Name :</label>
        <input type="text"  name="userName">
        <span style="color: red;"> * <?php echo $userNameEr;  ?></span>
        <br><br>
        <label for="Password">Password :</label>
        <input type="password"  name="Password"> 
        <span style="color: red;"> * <?php echo $PasswordEr;  ?></span>
        <br><br>
        </fieldset>
        <input type="submit">
    </form>
    <?php 
    
        echo  input($fname) ."<br>";
        echo input($fname1). "<br>";
        echo input($gender) ."<br>";
        echo input($dob) ."<br>";
        echo input($regions) ."<br>";
        echo input($address1) ."<br>";
        echo input($address2) ."<br>";
        echo input($phone) ."<br>";
        echo input($email) ."<br>";
        echo input($link) ."<br>";
        echo input($userName) ."<br>";
        echo input($Password) ."<br>";
    ?>
</body>
</html>
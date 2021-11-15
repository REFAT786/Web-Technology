<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php
    include "DB/dbinsert.php";
    $fname =  $Lname = $gender = $dob = $region = $paddress = $paraddress = $phone = $email = $username = $password = "";
    $fnameEr = $LnameEr = $genderEr = $dobEr = $regionEr =  $emailEr = $passwordEr =  $usernameEr = '';
    $flag = false;
    $successMesg = $errorMesg = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {



      if (empty($_POST["fname"])) {

        $fnameEr = "First Name is required";
        $flag = true;
      }
      if (empty($_POST["Lname"])) {
        $LnameEr = "Last Name is required";
        $flag = true;
      }
      if (empty($_POST["gender"])) {

        $genderEr = "Gender is required";
        $flag = true;
      }
      if (empty($_POST["dob"])) {
        $dobEr = "Date of Birth is required";
        $flag = true;
      }
      if (empty($_POST["region"])) {
        $regionEr = "Religion is required";
        $flag = true;
      }


      if (empty($_POST["email"])) {
        $emailEr = "Email is required";
        $flag = true;
      }

      if (empty($_POST["username"])) {
        $usernameEr = "User Name is required";
        $flag = true;
      }

      if (empty($_POST["password"])) {
        $passwordEr = "password is required";
        $flag = true;
      }

      if (!$flag) {
   
        $region =  senitaiz($_POST["region"]);
        $paddress = senitaiz($_POST["paddress"]);
        $paraddress = senitaiz($_POST["paraddress"]);
    
        $phone = senitaiz($_POST["phone"]);
        $email = senitaiz($_POST["email"]);
        $username = senitaiz($_POST["username"]);
        $password = senitaiz($_POST["password"]);
        $fname = senitaiz($_POST["fname"]);
        $Lname = senitaiz($_POST["Lname"]);
        $gender = senitaiz($_POST["gender"]);
        $dob = senitaiz($_POST["dob"]);

        
       $result = add($fname, $Lname, $gender, $dob, $region, $paddress, $paraddress, $phone, $email, $username, $password);
        if ($result) {
            $successMesg = " Succesfully Saved"; 
        } 
        else {
            $errorMesg = "Error While saving";
        }
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
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <fieldset>
      <legend>Basic information</legend>
      <label for="fname">First name :</label>
      <input type="text" id="fname" name="fname" value="<?php echo $fname;  ?>">
      <span style="color: red;"> * <?php echo $fnameEr;  ?></span>
      <br><br>
      <label for="Lname">Last name :</label>
      <input type="text" id="Lname" name="Lname">
      <span style="color: red;"> * <?php echo $LnameEr;  ?></span>
      <br><br>
      <label for="gender">Gender</label>
      <input type="radio" name="gender" value="female">Female
      <input type="radio" name="gender" value="male">Male
      <input type="radio" name="gender" value="other">Other
      <span style="color: red;"> * <?php echo $genderEr;  ?></span>
      <br><br>
      <label for="dob"> Date of Birth</label>
      <input type="Date" id="dob" name="dob">
      <span style="color: red;"> * <?php echo $dobEr;  ?></span>
      <br><br>
      <label for="region">Religion</label>
      <select name="region" id="region">
        <option value="">Select one</option>
        <option value="Muslim">Muslim</option>
        <option value="Hindu">Hindu</option>

      </select>

      <span style="color: red;"> * <?php echo $regionEr;  ?></span><br><br>


    </fieldset>
    <fieldset>
      <legend>Contact information</legend>

      <label for="paddress">Present Address :</label>
      <textarea name="paddress" id="paddress" cols="30" rows="3"></textarea> <br> <br>
      <label for="paraddress">Permanent Address :</label>
      <textarea name="paraddress" id="paraddress" cols="30" rows="3"></textarea> <br><br>
      <label for="phone">phone :</label>
      <input type="tel" name="phone" id="phone" cols="30" rows="3"></input> <br><br>


      <label for="email">Email :</label>
      <input type="email" id="email" name="email">
      <span style="color: red;"> * <?php echo $emailEr;  ?></span>
      <br>
      <br>
      <label for="Pweb">Perasonal Website Link :</label>
      <a href="">https://github.com/REFAT786</a><br>
      <br>

    </fieldset>
    <fieldset>
      <legend>Account information</legend>

      <label for="username">User Name :</label>
      <input type="text" id="username" name="username">
      <span style="color: red;"> * <?php echo $usernameEr;  ?></span>
      <br><br>
      <label for="password">password :</label>
      <input type="password" id="password" name="password">
      <span style="color: red;"> * <?php echo $passwordEr;  ?></span>
      <br><br>
    </fieldset>
    <input type="submit" name="submit" value="Register"> <a href="login.php">Log In</a>

    <br><br>
  </form>
  <span><?php echo $successMesg ?></span>
  <span><?php echo $errorMesg ?></span>
 

</body>

</html>
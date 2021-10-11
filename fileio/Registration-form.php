<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  
  <title>Document</title>
</head>

<body>

  <?php

  ?>

  <?php
  $fname =  $fname1 = $gender = $dob = $Religions = $address1 = $address2 = $phone = $email= $link = $userName = $Password = "";
  $fnameEr = $fname1Er = $genderEr = $dobEr = $ReligionsEr =  $emailEr = $PasswordEr =  $userNameEr = '';
  $flag = false;
  $successMesg = $errorMesg = "";


  if ($_SERVER["REQUEST_METHOD"] == "POST") {



    $Religions =  input($_POST["Religions"]);
    $address1 = input($_POST["address1"]);
    $address2 = input($_POST["address2"]);

    $phone = input($_POST["phone"]);
    $email = input($_POST["email"]);
    $link = input($_POST['link']);
    $userName = input($_POST["userName"]);
    $Password = input($_POST["Password"]);
    $fname = input($_POST["fname"]);
    $fname1 = input($_POST["fname1"]);
    $gender = input($_POST["gender"]);
    $dob = input($_POST["dob"]);
    $Religions = input($_POST["Religions"]);
    $email = input($_POST["email"]);
    

    if (empty($_POST["fname"])) {

      $fnameEr = "First Name is required";
      $flag = true;
    }
    if (empty($_POST["fname1"])) {
      $fname1Er = "Last Name is required";
      $flag = true;
    }
    if (empty($_POST["gender"])) {

      $genderEr = "Gender input is required";
      $flag = true;
    }
    if (empty($_POST["dob"])) {
      $dobEr = "Date of Birth is required";
      $flag = true;
    }
    if (empty($_POST["Religions"])) {
      $ReligionsEr = "Input is required";
      $flag = true;
    }


    if (empty($_POST["email"])) {
      $emailEr = "Email is required";
      $flag = true;
    }

    if (empty($_POST["userName"])) {
      $userNameEr = "User Name is required";
      $flag = true;
    }

    if (empty($_POST["Password"])) {
      $PasswordEr = "Password is required";
      $flag = true;
    }

    if (!$flag) {

      $file = "data.txt";
      if (file_exists($file)) {
        $existing_data = read();
        if (empty($existing_data)) {
          $arr1[] = array("Firstname"=>$fname,"Lastname"=>$fname1,"Present Address"=>$address1,"Permanent  Address"=>$address2,"Gender"=>$gender,"Religion"=>$Religions,"Date Of Birth"=>$dob,"Phone No"=>$phone,"Email"=>$email,"Link"=>$link,"UserName"=>$userName,"Password"=>$Password);
          $result = write(json_encode($arr1)."\n");
        } else {

          $existing_data_decode = json_decode($existing_data);

          array_push($existing_data_decode, array("Firstname"=>$fname,"Lastname"=>$fname1,"Present Address"=>$address1,"Permanent  Address"=>$address2,"Gender"=>$gender,"Religion"=>$Religions,"Date Of Birth"=>$dob,"Phone No"=>$phone,"Email"=>$email,"Link"=>$link,"UserName"=>$userName,"Password"=>$Password));

          write("");
          $json = json_encode($existing_data_decode);
          $result = write(($json)."\n");
        }
      }
      if ($result) {
        $successMesg = " Succesfully Saved";
      } else {
        $errorMesg = "Error While saving";
      }
    }
  }


  function input($v)
  {
    $v = htmlspecialchars($v);
    $v = trim($v);
    $v = stripslashes($v);
    return $v;
  }
  function write($value)
  {
    $fileName = "data.txt";
    $resors = fopen($fileName, "w");
    $fileWrite = fwrite($resors, $value);
    fclose($resors);
    return $fileWrite;
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
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <fieldset>
      <legend>Basic information</legend>
      <label >First Name :</label>
      <input type="text"  name="fname" value="<?php echo $fname;  ?>">
      <span style="color: red;"> * <?php echo $fnameEr;  ?></span><br></br>

      <label >Last Name :</label>
      <input type="text"  name="fname1">
      <span style="color: red;"> * <?php echo $fname1Er;  ?></span>
      <br> </br>
      <label >Gender</label>
      <input type="radio" name="gender" value="female">Female
      <input type="radio" name="gender" value="male">Male
      <input type="radio" name="gender" value="others">Other
      <span style="color: red;"> * <?php echo $genderEr;  ?></span>
      <br></br>
      <label >Date of Birth</label>
      <input type="Date" id="dob" name="dob">
      <span style="color: red;"> * <?php echo $dobEr;  ?></span>
      <br></br>
      <label >Religion</label>
      <select name="Religions" >
        <option value="">Select one</option>
        <option value="Muslim">Muslim</option>
        <option value="Hindu">Hindu</option>
        <option value="Chirstian">Christian</option>
        <option value="Buddhism">Buddhism</option>

      </select>
      <span style="color: red;"> * <?php echo $ReligionsEr;  ?></span>


    </fieldset>
    <fieldset>
      <legend>Contact information</legend>

      <label for="address1">Present Address :</label>
      <textarea name="address1" ></textarea> <br><br>
      <label for="address2">Permanent Address :</label>
      <textarea name="address2" ></textarea> <br><br>
      <label for="phone">phone :</label>

      <input type="tel" name="phone"><br><br>


      <label for="email">Email :</label>
      <input type="email"  name="email">
      <span style="color: red;"> * <?php echo $emailEr;  ?></span>
      <br></br>
      <label >Perasonal Website Link :</label>
      <input type="url" name="link">
      <br><br>

    </fieldset>
    <fieldset>
      <legend>Account information</legend>

      <label >User Name :</label>
      <input type="text"  name="userName">
      <span style="color: red;"> * <?php echo $userNameEr;  ?></span>
      <br><br>
      <label >Password :</label>
      <input type="password"  name="Password">
      <span style="color: red;"> * <?php echo $PasswordEr;  ?></span>
      <br><br>
    </fieldset>
    <input type="submit" name="submit" value="Register"> <a href="login.php">Log In</a>

    <br>
  </form>
  <span><?php echo $successMesg ?></span>
  <span><?php echo $errorMesg ?></span>
  

</body>

</html>

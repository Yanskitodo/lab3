<!DOCTYPE html>
<html>
<p style="text-align: center;"><span style="color: #000000; background-color: #ffff00;">Euri Marxell P. Lascano</span></p>
<h1 style="text-align: center;"><span style="color: #000000; background-color: #ffff00;">Euri</span></h1>
<p style="text-align: center;"><span style="color: #ffffff; background-color: #0000ff;">2021-140629</span></p>
<p style="text-align: center;"><span style="background-color: #ffff00;">BSIT-MI211</span></p>
<p style="text-align: right;"><img style="font-size: 14px; display: block; margin-left: auto; margin-right: auto;" src="https://scontent.fmnl33-1.fna.fbcdn.net/v/t39.30808-6/318246022_5827743963939036_2227833352607504001_n.jpg?_nc_cat=102&amp;ccb=1-7&amp;_nc_sid=09cbfe&amp;_nc_eui2=AeFeSd_cVv1VXFlxh5GfnA_EF3rBAWdU1LwXesEBZ1TUvAuzjPwtRxc-XrS14qkdjS-cRrl18arOuweFaDJ4bQ7E&amp;_nc_ohc=WHt57jwFyGUAX8_AtHY&amp;_nc_ht=scontent.fmnl33-1.fna&amp;oh=00_AfA4749hAl9FeLQaAKJf6j6nPUOnU47iAH5AXDcubzbOIQ&amp;oe=63EC0248" alt="facebook profile picture" width="144" height="144" /></p>
<table style="width: 100%; border-collapse: collapse; background-color: blue;" border="1">
<tbody>
<tr>
<td style="width: 25%; text-align: center;"><span style="background-color: #ffff00;">Chess</span></td>
<td style="width: 25%; text-align: center;"><span style="background-color: #ffff00;">Blue</span></td>
<td style="width: 25%; text-align: center;"><span style="background-color: #ffff00;">Music</span></td>
<td style="width: 25%; text-align: center;"><span style="background-color: #ffff00;">OPM</span></td>
</tr>
</tbody>
</table>
<p style="text-align: right;">&nbsp;</p>
<p style="text-align: right;">&nbsp;</p>
<p style="text-align: right;">&nbsp;</p>
  
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$servername = "192.168.150.213";
	$username = "webprogmi211";
	$password = "j@zzyAngle30";
	$dbname = "webprogmi211";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "INSERT INTO eplascano_guests (fullname,email,website,comment,gender)
	VALUES ('$name','$email', '$website', '$comment', '$gender')";
	
	if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
}
?>



</body>
</html>
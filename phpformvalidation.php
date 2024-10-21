<!DOCTYPE HTML>
<html>
<head>
<style>
.error { 
  color: yellow; 
}
body
 {
  background-image: url('sathyabama.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
</head>
<body>
<center>
<?php
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);

  if (empty($name) || !preg_match("/^[a-zA-Z-' ]*$/", $name)) 
  {
    $nameErr = "Name is required and only letters allowed";
  }
  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
   {
    $emailErr = "Valid email is required";
  }
  if (!empty($website) && !preg_match("/\b(?:https?|ftp):\/\/|www\.[\S]+/i", $website)) 
  {
    $websiteErr = "Invalid URL";
  }
  if (empty($gender)) 
  {
    $genderErr = "Gender is required";
  }
}
function test_input($data) 
{
  return htmlspecialchars(stripslashes(trim($data)));
}
?>
<font color="white">
<h1>Form Validation</h1>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" placeholder="Enter name">
  <span class="error">* <?php echo $nameErr;?></span><br><br>
  E-mail: <input type="text" name="email" placeholder="Enter email address">
  <span class="error">* <?php echo $emailErr;?></span><br><br>
  Website: <input type="text" name="website" placeholder="Enter website URL">
  <span class="error"><?php echo $websiteErr;?></span><br><br>
  Comment: <textarea name="comment" rows="5" cols="40" placeholder="Your Comment"></textarea><br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span><br><br>
  <input type="submit" name="submit" value="Submit">
</form>
<br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !$nameErr && !$emailErr && !$websiteErr && !$genderErr) 
{
  echo "<h2>Your Input:</h2>";
  echo $name . "<br>" . $email . "<br>" . $website . "<br>" . $comment . "<br>" . $gender;
}
?>
</font>
</center>
</body>
</html>
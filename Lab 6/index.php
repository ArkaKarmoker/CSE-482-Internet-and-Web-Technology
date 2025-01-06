<!DOCTYPE HTML>
<html>
<head></head>
<body>

<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = $mobile = $password = $repeat_password = $zipcode = "";
$nameErr = $emailErr = $mobileErr = $passwordErr = $repeatPasswordErr = $zipcodeErr = "";

// Check if cookies exist and populate the form if they do
if (isset($_COOKIE["name"])) {
    $name = $_COOKIE["name"];
}
if (isset($_COOKIE["email"])) {
    $email = $_COOKIE["email"];
}
if (isset($_COOKIE["mobile"])) {
    $mobile = $_COOKIE["mobile"];
}
if (isset($_COOKIE["gender"])) {
    $gender = $_COOKIE["gender"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $mobile = test_input($_POST["mobile"]);
    $website = test_input($_POST["website"]);
    $comment = test_input($_POST["comment"]);
    $gender = test_input($_POST["gender"]);
    $password = test_input($_POST["password"]);
    $repeat_password = test_input($_POST["repeat_password"]);
    $zipcode = test_input($_POST["zipcode"]);
    $remember = isset($_POST['remember']);

    // Validate Name (No empty spaces or special characters)
    if (!preg_match("/^[a-zA-Z]*$/", $name)) {
        $nameErr = "Only letters allowed, no spaces or special characters.";
    }

    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
    }

    // Validate Mobile (Contains only numbers and '+')
    if (!preg_match("/^[0-9+]*$/", $mobile)) {
        $mobileErr = "Only numbers and '+' are allowed.";
    }

    // Validate Password (Matches Repeat Password)
    if ($password !== $repeat_password) {
        $passwordErr = "Passwords do not match.";
        $repeatPasswordErr = "Passwords do not match.";
    }

    // Validate Zipcode (Only numbers allowed)
    if (!preg_match("/^[0-9]+$/", $zipcode)) {
        $zipcodeErr = "Only numbers are allowed for the zip code.";
    }

    // Set cookies if "Remember Me" is checked and there are no validation errors
    if ($remember && !$nameErr && !$emailErr && !$mobileErr && !$passwordErr && !$zipcodeErr) {
        setcookie("name", $name, time() + 86400 * 30, "/"); // Cookie expires in 30 days
        setcookie("email", $email, time() + 86400 * 30, "/");
        setcookie("mobile", $mobile, time() + 86400 * 30, "/");
        setcookie("gender", $gender, time() + 86400 * 30, "/");
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>PHP Form Validation</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

  Name: <input type="text" name="name" value="<?php echo $name; ?>">
  <span style="color:red;">* <?php echo $nameErr; ?></span><br><br>

  E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
  <span style="color:red;">* <?php echo $emailErr; ?></span><br><br>

  Mobile: <input type="tel" name="mobile" value="<?php echo $mobile; ?>">
  <span style="color:red;">* <?php echo $mobileErr; ?></span><br><br>

  Website: <input type="text" name="website" value="<?php echo $website; ?>"><br><br>

  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea><br><br>

  Password: <input type="password" name="password">
  <span style="color:red;">* <?php echo $passwordErr; ?></span><br><br>

  Repeat Password: <input type="password" name="repeat_password">
  <span style="color:red;">* <?php echo $repeatPasswordErr; ?></span><br><br>

  Zip Code: <input type="text" name="zipcode" value="<?php echo $zipcode; ?>">
  <span style="color:red;">* <?php echo $zipcodeErr; ?></span><br><br>

  Gender:
  <input type="radio" name="gender" id="man" value="man" <?php if ($gender == "man") {
      echo "checked";
  } ?>> 
  <label for="man">Man</label>
  <input type="radio" name="gender" id="woman" value="woman" <?php if ($gender == "woman") {
      echo "checked";
  } ?>> 
  <label for="woman">Woman</label><br><br>

  <input type="checkbox" name="remember" <?php if (isset($_COOKIE["name"])) {
      echo "checked";
  } ?>> Remember Me<br><br>

  <input type="submit" name="submit" value="Submit">

</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$nameErr && !$emailErr && !$mobileErr && !$passwordErr && !$zipcodeErr) {
    echo "<h2>Your Inputs:</h2>";
    echo "Name: " . $name . "<br>" . "Email: " . $email . "<br>" . "Mobile: " . $mobile . "<br>";
    echo "Website: " . $website . "<br>" . "Comment: " . $comment . "<br>" . "Gender: " . $gender . "<br>";
    echo "Zip Code: " . $zipcode;
} ?>

</body>
</html>

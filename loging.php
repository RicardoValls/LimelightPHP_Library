<?php

  session_start(); //Open the session
  if (isset($_POST['submit'])) { //Activates the code if the Send button is clicked
    // First take the input from the form
    $userName = $_POST ["user"];
    $password = $_POST ["pass"];

    //Check if the input is correct for Loging
    if ($userName == "admin" && $password == "secret") {
      $_SESSION['user'] = "admin"; //Set the session variable
      header("Location: landingPage.php"); //Go to next page
    } else{
      echo "Something went wrong, are you sure to have access to the administration area?";
    }
  } // Closes the form send check
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<body>
  <form action = "<?php $_SERVER['PHP_SELF']; ?>" method = "post">

    <label for="">Name: </label>
      <input type="text" placeholder="admin" name="user"/>
    <label for="">Password: </label>
      <input type="text" placeholder="secret" name="pass"/><br>

    <input type="submit" name="submit" value="Send">
    <input type="reset" name="reset" value="reset">

  </form>

</body>
</html>

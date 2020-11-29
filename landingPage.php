<?php
  session_start(); //Open the session

  if(isset($_SESSION['user'])){
    //Checks if the session is set
    echo "The session has been set <br>";
    echo "Welcome to the administration area, David";

  } else {
    echo "Something went wrong";
    header("Location: noSession.php");
    }

 ?>

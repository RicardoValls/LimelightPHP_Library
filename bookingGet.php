<?php
//Connection to the database-------------------------------------------------
    $conn = mysqli_connect('servername', 'username', 'password', 'database')
      or die ("Yes, you got the boring ".mysql_error()." error.");
 ?>
<!-- Starts the HTML&CSS page ------------------------------------------------->
<!DOCTYPE html>
 <html lang="en" dir="ltr">
 	<head>
 		<meta charset="utf-8">
 		<title>Booking a film session</title>
 		<style>
      * {
        font-family: arial, sans-serif;
      }

 		</style>
 	</head>
 	<body>

<!--Now it's time to define what happends when you push the button-->
<!-- The data comes from the form in booking.php -->
    <?php
    //Get the ID from the form
      $ID = $_GET['ID'];

    //Do the query to the database
      $row = mysqli_query($conn, "SELECT * FROM movies WHERE ID LIKE '$ID'");

    //Show that the booking for the film is done
      while ($booking = mysqli_fetch_assoc($row)){
        echo ("<br>Your ticket for ".$booking['film_name'].", ".$booking['date_released']." has been booked :)");
      }
    ?>
  </body>
 </html>

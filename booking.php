<?php
//Connection to the database-------------------------------------------------
    $conn = mysqli_connect('servername', 'username', 'password', 'database')
      or die ("Error ".mysql_error().". Error. Error.");
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

 			select {
        padding: 8px;
        margin: 8px 0 16px 0;
        width: 26%;
        border: none;
        background-color: pink;
        border-radius: 6px;
        color: white;
 			}

      button {
        padding: 8px;
        border: none;
        border-radius: 6px;
        background-color: pink;
        color: white;
      }
      button:hover {
        font-weight: bold;
        background-color: white;
        color: pink;
      }
 		</style>
 	</head>
 	<body>
    <form action="bookingGet.php" method="GET"><!--Using GET instead of POST the info will be added to the address-->

      <?php //Let's spicy the form with some PHP to build the list from the database
      $sql = "SELECT DISTINCT * FROM movies";
      $option = mysqli_query($conn, $sql); //Do the query to extract the data from the table movies

      echo "<select name='ID'>"; //Start the dropdown select for the form
      while ($row = mysqli_fetch_array($option)) { //A loop to go over all the entries
        echo "<option value = '".$row['ID']."'>".$row['film_name']."</option>"; //populate the dropdown from the database
      }
      echo "</select>";

      ?>
      <button type="submit" name="submit">Book</button>
    </form>

  </body>
 </html>

<?php
//Let's connect to the database-------------------------------------------------
    $conn = mysqli_connect('servername', 'username', 'password', 'database')
      or die ("Ok, something happend and I cannot connect with the database. ".mysql_error().", should tell you why.");
 ?>
<!-- Starts the HTML&CSS page ------------------------------------------------->
<!DOCTYPE html>
 <html lang="en" dir="ltr">
 	<head>
 		<meta charset="utf-8">
 		<title>Some kind of search the database</title>
 		<style>  /*Some style for our searchbox*/
      * {
        font-family: arial, sans-serif;
      }

 			input {
        padding: 8px;
        margin: 8px 0 16px 0;
        width: 26%;
        border: none;
        background-color: mediumorchid;
        border-radius: 6px;
        color: palegreen;
 			}

      button {
        padding: 8px;
        border: none;
        border-radius: 6px;
        background-color: mediumorchid;
        color: palegreen;
      }
      button:hover {
        background-color: palegreen;
        color: mediumorchid;
      }
 		</style>
 	</head>
 	<body>
    <form action="" method="POST">
      <input type="text" placeholder="Introduce a criteria to search" name="search">
      <button type="submit" name="submit">Search!</button>
    </form>

<!--let's add som script-->
    <?php

    //Encapsulate the script in an if to prevent it of runing until the button is pressed
      if (isset($_POST['submit'])) {
        //First, read the variables from the input in the form
        $search = $_POST['search'];

        //Do the query to the database
        $row = mysqli_query($conn, "SELECT * FROM movies WHERE film_name LIKE '%$search%'");

        //Show the matches from the database to the search
        while ($result = mysqli_fetch_assoc($row)){
          echo ("<br>".$result['film_name'].", ".$result['date_released']);
        }
      }
    ?>
  </body>
 </html>


<!-- Starts the HTML&CSS page ------------------------------------------------->
<!DOCTYPE html>
 <html lang="en" dir="ltr">
 	<head>
 		<meta charset="utf-8">
 		<title>Loging Station</title>
 		<style>  /*Some style for the table*/
 			table {
 				font-family: arial, sans-serif;
 				border-collapse: collapse;
 				width: 60%;
 			}

 			td, th {
 				border: 1px solid #dddddd;
 				text-align: left;
 				padding: 8px;
 			}

 			tr:nth-child(even) {
 				background-color: #dddddd
 			}
 		</style>
 	</head>

 	<body>
    <!-- The Script and the page, it is included after the style to avoid a flick on reload -->
    <?php
    //Connection to the database-------------------------------------------------
    $conn = mysqli_connect('servername', 'username', 'password', 'database')
      or die ("%$#%#! I can't connect with the database<br>");

    //Now that we have a connection let's get into actions--------------------------

    //start of HTML table
    echo "<table cellspacing = '15'>";
    echo "<tr><th colspan='4'style='font-size: large;'>Pet Table</th></tr>";
    echo "<tr><th>Name</th>
              <th>Kind</th>
              <th>Comments</th>
              <th>Price</th>
          </tr>";

    //Query for extracting the info
    $query = "SELECT * FROM pet";
    $result = mysqli_query($conn, $query)
    or die ("Are you kiddin' me? cannot perform the query");

    //The while loop shows the info from the table extracted with $result
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo "<tr><td>".$row['petID']."</td>
                <td>".$row['petType']."</td>
                <td>".$row['petDescription']."</td>
                <td>".$row['price']."</tr>";
    }

    //Add a form to add new pets
      echo "<form action = '' method = 'POST'>";
      echo "<tr><td><input type = 'text' name = 'petID' placeholder = 'New name'></td>";
      echo "<td><input type = 'text' name = 'petType' placeholder = 'Kind'></td>";
      echo "<td><input type = 'text' name = 'petDescription' placeholder = 'Description'></td>";
      echo "<td><input type = 'text' name = 'price' placeholder = 'Price'></td></tr>";
      echo "<tr><td><input type = 'submit' name = 'add'  value = 'add'></td></tr>";

      //Query for extracting the info
      $queryID = "SELECT petID FROM pet";
      $dropdown = mysqli_query($conn, $queryID)
      or die ("Cannot permorm the query?? You are jokin', right?");

      //Dropdown menu to delete
      echo "<tr><td><select id = 'dropdown' name = 'dropdown'>";
      while ($row = mysqli_fetch_array($dropdown)) {
        echo "<option value = '".$row['petID']."'>".$row['petID']."</option>";
      }
      echo "</select></td>";
      echo "<td><input type = 'submit' name = 'delete' value = 'delete' </td></tr>";
      echo "</form>";

    //end of HTML table
    echo "</table>";

    // When the form is activated by the button do: --------------------------------

    //If the button to add a new register is clicked
    //Check if that animal already exist by name (petID)
    if (isset($_POST['add'])) {
      $selectQuery = mysqli_query($conn, "SELECT * FROM pet WHERE petID = '$_POST[petID]'");
      if (mysqli_num_rows($selectQuery) > 0) {
        echo "That animal name already exist, please add a different one";
      }
      else {
      $insertQuery = "INSERT INTO pet VALUES ('$_POST[petID]', '$_POST[petType]', '$_POST[petDescription]', '$_POST[price]')";
        mysqli_query($conn, $insertQuery);
      }
      header("Location: loginRegistration.php"); //Reload page
    }


    if (isset($_POST['delete'])) {
      $deleteQuery = "DELETE FROM pet WHERE petID = '$_POST[dropdown]'";
      mysqli_query ($conn, $deleteQuery);
      header("Location: loginRegistration.php"); //Reload page
    }

    mysqli_close($conn); //Close the connection with database

    ?>

  </body>
 </html>

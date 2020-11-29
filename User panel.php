<?php
//Let's connect to the database-------------------------------------------------
    $conn = mysqli_connect('servername', 'username', 'password', 'database')
  or die ("Unable to connet with the database, stay tuned...");

// What hapens when a botton button is clicked---------------------------
if (isset($_POST['update'])) {
  $updateQuery = "UPDATE members SET username = '$_POST[userName]' WHERE ID = '$_POST[hidden]'";
  mysqli_query ($conn, $updateQuery);
  header("Location: adminPanel.php"); //Reload page
}

if (isset($_POST['delete'])) {
  $deleteQuery = "DELETE FROM members WHERE ID = '$_POST[hidden]'";
  mysqli_query ($conn, $deleteQuery);
  header("Location: adminPanel.php"); //Reload page
}

if (isset($_POST['add'])) {
  //Check the name to avoid repeated ones---------------------------------------
  $selectQuery = mysqli_query($conn, "SELECT * FROM members WHERE username = '$_POST[userName]'");
  if (mysqli_num_rows($selectQuery) > 0) {
    echo "That member name already exist, please choose another";
  }
  else {
  $insertQuery = "INSERT INTO members(username) VALUES ('$_POST[userName]')";
    mysqli_query($conn, $insertQuery);
    header("Location: adminPanel.php"); //Reload page
  }
}

$selectRow = mysqli_query($conn, "SELECT * FROM members");

//start of HTML table ----------------------------------------------------------
echo "<table cellspacing = '15'>";
echo "<tr><th colspan='4'>Admin Panel</th></tr>";

  //while loop to extract data on databse
  while ($row = mysqli_fetch_array($selectRow, MYSQLI_ASSOC)) {
    echo "<form action = 'adminPanel.php' method = 'POST'>";
    echo "<tr><td><input type = 'text' name = 'userName' value = '".$row['username']."'></td>";
    echo "<td><input type = 'hidden' name = 'hidden' value = '".$row['ID']."'></td>";
    echo "<td><input type = 'submit' name = 'update' value = 'update' </td>";
    echo "<td><input type = 'submit' name = 'delete' value = 'delete' </td></tr>";
    echo "</form>";
  }

//Form to add new registres
  echo "<form action = 'adminPanel.php' method = 'POST'>";
  echo "<tr><td><input type = 'text' name = 'userName'></td>";
  echo "<td><input type = 'submit' name = 'add' value = 'add' </td></tr>";
  echo "</form>";


echo "</table>"; //end of HTML table--------------------------------------------

mysqli_close($conn);

?>

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
 				text-align: center;
 				padding: 8px;
 			}

 			tr:nth-child(even) {
 				background-color: #dddddd
 			}
 		</style>
 	</head>

 	<body>
  </body>
 </html>

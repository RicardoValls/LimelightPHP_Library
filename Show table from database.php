<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Show a DataBase table</title>
		<style>/*Some style for the table*/
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
		<?php
		//connection
    $conn = mysqli_connect('servername', 'username', 'password', 'database')
		or die("Sorry, but I cannot connect to the database");

		//run SQL query
		$query = "SELECT * FROM pet";
		$result = mysqli_query($conn, $query)
		or die ("Something went wrong, cannot perform the query");

		//start of HTML table
		echo "<table cellspacing = '15'>";
		echo "<tr><th colspan='4'>Pet Table</th></tr>";

		//while loop to extract result set
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo "<tr><td>".$row['petID']."</td><td>".$row['petType']."</td><td>".$row['petDescription']."</td><td>".$row['price']."</tr>";
		}

		//end of HTML table
		echo "</table>";
		?>

	</body>
</html>

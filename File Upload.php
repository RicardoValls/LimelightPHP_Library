<?php
//Let's connect to the database-------------------------------------------------
    $conn = mysqli_connect('servername', 'username', 'password', 'database')
  or die ("An unexplicable error don't allows me to connect with the database");

  if (isset($_POST['upload'])) {
    //First, read the variables from the input in the form
    $title = $_POST['title'];
    $image = $_FILES['image']['name']; //NOTE: It is not $_POST but $_FILES!!

    if (move_uploaded_file($_FILES['image']['tmp_name'], "images/".$_FILES['image']['name'])) {
      echo "Image uploaded B)<br>";
      } else {
        echo "No, the file was not uploaded.<br>";
      }

    //just to check, show the variables used
    echo "The array I have used contains: ";
    print_r($_FILES);
    echo "<br> <img src='images/".$image."' alt='Uploaded image'>";
    echo "<br><em>".$title."</em><br>";

    //And put the information into the DataBase
    $sql = "INSERT INTO films (title, image) VALUES ('$title', '$image')";
    $film = mysqli_query($conn, $sql);

    //Show the rows in the DataBase
    $show_films = "SELECT * FROM films";
    $query_films = mysqli_query($conn, $show_films);
    echo "<br>Another pictures on our database:";
    while ($row = mysqli_fetch_array($query_films, MYSQLI_ASSOC)) {
      echo $row['title']."<br>";
    }
  }
?>

<!-- Starts the HTML&CSS page ------------------------------------------------->
<!DOCTYPE html>
 <html lang="en" dir="ltr">
 	<head>
 		<meta charset="utf-8">
 		<title>Upload a file</title>
 		<style>  /*Some style for the table*/
      * {
        font-family: arial, sans-serif;
      }

 			input {
        padding: 8px 16px;
        margin: 8px 0 16px 0;
        width: 40%;
        border: solid 1px teal;
        border-radius: 6px;
        color: teal;
 			}

      button {
        padding: 8px;
        border: none;
        border-radius: 6px;
        background-color: teal;
        color: palegreen;
      }
      button:hover {
        background-color: palegreen;
        color: teal;
      }
      img {
        width: 50%;
        height: auto;
      }
 		</style>
 	</head>
 	<body>
    <form action="" method="POST" enctype="multipart/form-data">
      <!--It is important to use multipart/form-data to upload files-->
      <label>Image Title</label>
      <br> <input type="text" name="title">
      <br>
      <label>Image to upload</label>
      <br> <input type="file" name="image">
      <br><button type="submit" name="upload">Upload</button>
    </form>
  </body>
 </html>

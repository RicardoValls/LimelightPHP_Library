<!-- Starts the HTML&CSS page ------------------------------------------------->
<!DOCTYPE html>
 <html lang="en" dir="ltr">
 	<head>
 		<meta charset="utf-8">
 		<title>Date cheker</title>
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
 		</style>
 	</head>
 	<body>
    <form action="" method="POST">
      <label>Enter your date of birth</label>
      <br> <input type="date" name="dob">
      <br><button type="submit" name="submit">submit</button>
    </form>

<!--let's add som script-->
    <?php
    session_start(); // Start the session

    //Encapsulate the script in an if to prevent it of runing until the button is pressed
      if (isset($_POST['submit'])) {
        //First, read the variables from the input in the form
        $dob = $_POST['dob'];

        //Use explode("separator",string,limit) to break the date into an array
        //Use list(var1,var2,...) to asign values on an array to multiple variables
        list($year, $month, $day) = explode("-", $dob);

        //Convert the date to the Unix timestamp with mktime(hour, minute, second, month, day, year)
        //This is the time between the Unix epoch and the DOB
        date_default_timezone_set("Europe/Paris"); //Required to avoid a warning about not timezone set
        $bday = mktime(0, 0, 0, $month, $day, $year);

        //The time() function returns the current time in seconds since the Unix Epoch (January 1 1970 00:00:00 GMT)
        //So if $bday is subtracted from the Unix Epoch we got the seconds the user has been on the planet
        $difference = time() - $bday;

        //Now we divide the seconds on the planet between the seconds in a year to know how many years old
        //The floor(number) function rounds down the number
        $age = floor($difference / 31556926);

        //Now is time to print the results for these 4 lines of code
        echo "<br>You are ".$age." years old.";

        //Set the variable for the session
        if ($age < 18) {
          $_SESSION["userAge"] = "kid";
        } else {
          $_SESSION["userAge"] = "adult";
        }
        echo "<br>Your session has been set to: ".$_SESSION["userAge"];
      } //Closes "if" to prevent run the script
    ?>
  </body>
 </html>


<?php
$userName = $_POST ["user"];
$password = $_POST ["pass"];

if ($userName == "David" && $password == "Miles") {
  setcookie($userName, time() + 86400);

} else {
  echo "There has been a problem: the user and password doesn't match."
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <!-- Basic Page Needs ––––––––––––––––––––––––––––––––––––––––––––––– -->
     <meta charset="utf-8">
     <title>Responsive Photography Portfolio</title>
     <meta name="description" content="Exercice to open a session">
     <meta name="author" content="Ricardo Valls-Latorre">

     <!-- Mobile Specific Metas –––––––––––––––––––––––––––––––––––––––––– -->
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- FONT -      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&display=swap" rel="stylesheet">

      <!-- CSS and ICONS ––––––––––––––––––––––––––––––––––––––––––––––– -->
     <link rel="stylesheet" href="../skeleton/css/normalize.css">
     <link rel="stylesheet" href="../skeleton/css/skeleton.css">
     <link rel="stylesheet" href="../skeleton/css/style.css">
     <!--<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">-->

     <!-- Favicon ----–––––––––––––––––––––––––––––––––––––––––––––––––– -->
     <link rel="icon" type="image/png" href="images/favicon.png">
   </head>

   <body>
     <header class="container twelve columns">
         <h1>Loging deck</h1>
      </header>

      <div class="container main">
        <div class="row">
          <div class="four columns form">
            <form action = "<?php $_SERVER['PHP_SELF']; ?>" method = "post" target="screen">

              <label for="">Name: </label>
                <input class="u-full-width" type="text" placeholder="user name" name="user"/>
              <label for="">Password: </label>
                <input class="u-full-width" type="password" placegolder="password" name="pass"/><br>

              <input type="submit" name="" value="Send">
              <input type="reset" name="" value="reset">

            </form>
          </div> <!-- Closes form div-->
          <div id="screen" class="eight columns">

          </div>
        </div> <!-- Closes Row -->
      </div> <!-- Closes Container Main -->

      <footer>
        <div class="container twelve columns">


        </div>
      </footer>


  </body>
</html>

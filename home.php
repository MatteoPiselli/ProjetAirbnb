<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="home.css">
        <title>Airbnb - Home</title>
    </head>
    <header>
        <div id="header">
            <img src="images/airbnb1.jpeg" width="100%" height="150px"></img>
        </div>
        <div class="navbar">
            <ul>
                <li><a href="home.php">Accueil</a></li>
                <li><a href="client.php">Client</a></li>
                <li><a href="regions.php">Regions</a></li>            
            </ul>
         </div>
    </header>
    <body>
    <?php
      if(isset( $_SESSION['sess_user_name'])){
          echo  $_SESSION['sess_user_name'];
      }
    ?>
    </body>
</html>
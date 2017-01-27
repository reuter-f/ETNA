<?php
// add.php for void.cine in /var/www/html/void.cine
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Tue Jan 10 10:19:54 2017 REUTER Faustine
// Last update Tue Jan 10 10:36:42 2017 REUTER Faustine
//
    ?>


<html>
   <head>
      <meta charset="UTF-8">
         <link rel="stylesheet" href="Sources/Styles/index.css" />
         <link rel="shortcut icon" href="Sources/Images/tv.png">
         <title>void.cine</title>
      </head>
  
      <body>
         <header>
   <?php require_once("header.php");?>
         </header>

  <?php
  if (intval($_SESSION['Charge']) !== 1)
    {
    header("Refresh:0; url=index.php");
    }
   
echo "<div class='bloc'>";
echo "<div class='title'>";
echo "Ajout de vidéos";
echo "</div>";
echo "<div class='content'>";
echo "Cher administrateur,<br>cette fonctionalité sera bientot disponnible.<br>Merci de votre patience.<br>";
echo "</div></div>";
   ?>

         <footer>
            <h6>Copiright &copy reuter_f <a href="contact.php">Contact</a></h6>
         </footer>
      </body>
   </html>
   

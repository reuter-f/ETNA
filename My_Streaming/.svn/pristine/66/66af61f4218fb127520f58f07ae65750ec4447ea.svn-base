<?php
// genres.php for void.cine in /var/www/html/void.cine
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Tue Jan 10 07:06:13 2017 REUTER Faustine
// Last update Tue Jan 10 08:27:12 2017 REUTER Faustine
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
   $id = intval($_GET["id"]);
   
   if ($id > 20)
     $cat = 2;
   else
     $cat = 1;

if ($cat == 1)
  $gen = $id - 10;
else
  $gen = $id - 20;

   $row = $pdo->prepare("SELECT * FROM Videos WHERE Categorie=:cat AND Genre=:gen");
$row->bindParam(':cat', $cat, PDO::PARAM_STR);
$row->bindParam(':gen', $gen, PDO::PARAM_STR);
$row->execute();
$tab_infos = $row->fetchAll();
$row->closeCursor();

if ($tab_infos == NULL)
  {
    echo "<div class='bloc'>";
    echo "<div class='title'>";
    echo "ERREUR";
    echo "</div>";
    echo "<div class='content'>";
    echo "Catégorie inexistante !";
    echo "</div></div>";
    }

$i = 0;
while ($i < count($tab_infos))
  {
    echo "<div class='bloc'>";
    echo "<div class='title'>";
    echo "<a href='video.php?id=" . $tab_infos[$i]["ID"] . "'>" . $tab_infos[$i]["Nom"] . "</a>";
    echo "</div>";
    echo "<div class='content'>";
    echo "<br><div class='image'><img src='Sources/Images/Affiches/" . $tab_infos[$i]["ID"] . ".jpg'/></div>";
    echo "</div></div>";
    $i++;
  }
   ?>
   

         <footer>
            <h6>Copiright &copy reuter_f <a href="contact.php">Contact</a></h6>
         </footer>
      </body>
   </html>
   
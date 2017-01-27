<?php
// index.php for void cine in /var/www/html/void.cine
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Wed Jan  4 21:39:08 2017 REUTER Faustine
// Last update Tue Jan 10 08:29:42 2017 REUTER Faustine
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
   <div class="bloc">
   <div class="title">
   Dernières mises en ligne
   </div>
   <div class="content">

   <?php
   $row = $pdo->prepare("SELECT ID, Nom FROM Videos ORDER BY ID DESC limit 5");
$row->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
$row->execute();
$tab_infos = $row->fetchAll();
$row->closeCursor();
//var_dump($tab_infos);
$i = 0;
while ($i < count($tab_infos))
  {
    echo "<div class='image'>";
    echo "<br><img src='Sources/Images/Affiches/" . $tab_infos[$i]["ID"] . ".jpg'/>";
    echo "<a href='video.php?id=" . $tab_infos[$i]["ID"] . "'>" . $tab_infos[$i]["Nom"] . "</a>";
    echo "</div>";
    $i++;
  }
?>
   
   </div>
   </div>


   <div class="bloc">
      <div class="title">
      TOP
      </div>

      <div class="content">

  <?php
  $row = $pdo->prepare("SELECT ID, Nom FROM Videos ORDER BY Vues DESC limit 5");
$row->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
$row->execute();
$tab_infos = $row->fetchAll();
$row->closeCursor();
//var_dump($tab_infos);
$i = 0;
while ($i < count($tab_infos))
  {
    echo "<div class='image'>";
    echo "<br><img src='Sources/Images/Affiches/" . $tab_infos[$i]["ID"] . ".jpg'/>";
    echo "<a href='video.php?id=" . $tab_infos[$i]["ID"] . "'>" . $tab_infos[$i]["Nom"] . "</a>";
    echo "</div>";
    $i++;
  }
?>
</div>
      </div>
   
      <footer>
         <h6>Copiright &copy reuter_f <a href="contact.php">Contact</a></h6>
      </footer>
   </body>
   
   </html>
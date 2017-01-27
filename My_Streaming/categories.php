<?php
// categories.php for void.cine in /var/www/html/void.cine
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Tue Jan 10 06:10:15 2017 REUTER Faustine
// Last update Tue Jan 10 07:03:23 2017 REUTER Faustine
//
?>
<html>
   <head>
      <meta charset="UTF-8">
           <link rel="stylesheet" href="Sources/Styles/categories.css" />
           <link rel="shortcut icon" href="Sources/Images/tv.png">
           <title>void.cine</title>
        </head>

        <body>
           <header>
     <?php require_once("header.php");?>
           </header>
<?php
   $row = $pdo->query("SELECT * FROM Genre");
$tab_infos = $row->fetchAll();
$row->closeCursor();
$i = 0;
$size = count($tab_infos); ?>

<div class="films">
           <div class="title">
             Films
           </div>
           <div class="content">
  <?php
  while ($i < $size){
$url = 'genres.php?id=1' . $tab_infos[$i]['ID'];
echo '<a href="' . $url . '">' . $tab_infos[$i]['Nom'] . '</a><br>';
$i = $i + 1;
} ?>

            </div>
         </div>

  <div class="series">
             <div class="title">
               Séries
             </div>
             <div class="content">
               
    <?php
  $i = 0;
  while ($i < $size){
$url = 'genres.php?id=2' . $tab_infos[$i]['ID'];
echo '<a href="' . $url . '">' . $tab_infos[$i]['Nom'] . '</a><br>';
$i = $i + 1;
} ?>
        
              </div>
           </div>
  


           <footer>
              <h6>Copiright &copy reuter_f <a href="contact.php">Contact</a></h6>
           </footer>
        </body>
     </html>
     
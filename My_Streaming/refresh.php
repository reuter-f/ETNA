<?php
// refresh.php for void.cine in /var/www/html/void.cine
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Tue Jan 10 09:52:36 2017 REUTER Faustine
// Last update Tue Jan 10 10:16:33 2017 REUTER Faustine
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
echo "<br>";
   var_dump($_SESSION);
   $row = $pdo->prepare('INSERT INTO Comments(ID_video, Pseudo, Avis, Note) VALUE (:id, :pseudo, :avis, :note)');
$row->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
$row->bindParam(':pseudo', $_SESSION['Pseudo'], PDO::PARAM_STR);
$row->bindParam(':avis', $_POST['commentaire'], PDO::PARAM_STR);
$row->bindParam(':note', $_POST['note'], PDO::PARAM_STR);

$row->execute();
$row->closeCursor();

$url = "Refresh:0; url=video.php?id=" . $_POST['id'];
header($url);
?>
   

         <footer>
            <h6>Copiright &copy reuter_f <a href="contact.php">Contact</a></h6>
         </footer>
      </body>
   </html>
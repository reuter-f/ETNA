<?php
// header.php for void cine in /var/www/html/void.cine
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Wed Jan  4 22:47:13 2017 REUTER Faustine
// Last update Mon Jan  9 07:04:44 2017 REUTER Faustine
//

session_start();

try
{
  $pdo = new PDO('mysql:host=localhost;dbname=void_cine', "admin", "admin", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
  }
?>

<html>
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="Sources/Styles/header.css" />
      <link rel="shortcut icon" href="Sources/Images/tv.png">
      <title>void.cine</title>
   </head>

   <body>
      <nav class="naviguation">
         <div class="logo">
         <a class="navigation-image" href="index.php" title="Revenir a l'index"><img src="Sources/Images/tv.png"></a>
         </div>
         <ul>
         <li><a class="navigation-lien" href="categories.php">Catégories</a></li>
  <?php
  if ($_SESSION)
    { 
      echo "<li><a class='navigation-lien' href='deconnexion.php'>Deconnexion</a></li>";
      echo "<div class='hello'>Bonjour " . $_SESSION["Pseudo"] . "</div>";
      if ($_SESSION['Charge'] == 1)
	echo "<li><a class='navigation-lien' href='add.php'>+ +</a></li>";
      
    }
  else
    {?>
         <li><a class="navigation-lien" href="connexion.php">Connexion</a></li>
         <li><a class="navigation-lien" href="inscription.php">Inscription</a></li>
         </ul>
      </nav>
	<?php } ?>
   </body>
</html>
<?php
// connexion.php for void cine in /var/www/html/void.cine
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Thu Jan  5 03:46:59 2017 REUTER Faustine
// Last update Mon Jan  9 10:25:59 2017 REUTER Faustine
//
?>
<html>
   <head>
      <meta charset="UTF-8">
         <link rel="stylesheet" href="Sources/Styles/connexion.css" />
         <link rel="shortcut icon" href="Sources/Images/tv.png">
         <title>void.cine</title>
      </head>

      <body>
         <header>
   <?php require_once("header.php");?>
         </header>

   <div class="bloc">
   <div class="title">
   Connexion
   </div>
   <div class ="content">

   <?php
   if ($_GET["errors"] == 1)
     {
       echo "<div class='error'>Mauvais pseudo ou mauvais mot de passe.</div>";
     }
   else if ($_GET["errors"] == 2)
     {
       echo "<div class='error'>Cet utilisateur est introuvable.</div>";
     }
   ?>
   
   <form method="post" action="connexion.php">
   Pseudo :<br>
   <input type="text" placeholder="Saisissez votre Pseudo" name="pseudo" id="pseudo" required /><br><br>
   Mot de passe :<br>
   <input type="password" placeholder="Saisissez votre Mdp" name="password" id="password" required/><br><br>
   <div class="submit">
   <input type="submit" name="envoyer" value="Se connecter" />
   </div>
   </form>   
   </div>
   </div>
          <footer>
            <h6>Copiright &copy reuter_f <a href="contact.php">Contact</a></h6>
         </footer>
      </body>
   </html>

   <?php

   if ($_POST != NULL)
     {
$row = $pdo->prepare("SELECT ID, Pseudo, Password, Charge FROM Users WHERE Pseudo = :pseudo");
$row->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
$row->execute();
$tab_infos = $row->fetch();
$row->closeCursor();
$pwd = hash('sha256', $_POST["password"]);

   if ($pwd == $tab_infos["Password"])
     {
       session_start();
       $_SESSION['Pseudo'] = $tab_infos['Pseudo'];
       $_SESSION['ID'] = $tab_infos['ID'];
       $_SESSION['Charge'] = $tab_infos['Charge'];
       header("Refresh:0; url=index.php");
     }
     }
   
if ($tab_infos == FALSE && $_POST['pseudo'] != NULL)
  {
    header("Refresh:0; url=connexion.php?errors=2");
  }
else if ($pwd != $tab_infos["Password"] && isset($tab_infos["Password"]))
  {
    header("Refresh:0; url=connexion.php?errors=1");
  }
   ?>
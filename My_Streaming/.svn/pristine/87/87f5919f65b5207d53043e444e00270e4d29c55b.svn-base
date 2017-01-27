<?php
// inscription.php for void.cine in /var/www/html/void.cine
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Mon Jan  9 04:12:39 2017 REUTER Faustine
// Last update Tue Jan 10 10:28:31 2017 REUTER Faustine
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
   Inscription
   </div>
   <div class="content">
   <?php if ($_GET["errors"] == 1)
     {
       echo "<div class='error'>Pseudo déja utilisé</div>";
     }
 else if ($_GET["errors"] == 2)
   {
     echo "<div class='error'>Les mots de passe ne sont pas identiques</div>";
   }
 else if ($_GET["errors"] == 3)
   {
     echo "<div class='error'>Adresse email déja utilisée</div>";
   }
   ?>
  <form method="post" action="inscription.php">
   Pseudo :<br>
      <input type="text" placeholder="Saisissez un Pseudo" name="pseudo" id="pseudo" required /><br><br>
   Mot de passe :<br>(6 caracteres au moins)<br>
      <input type="password" pattern=".{6,}" placeholder="Saisissez votre Mdp" name="password" id="password" required/><br><br>
   Confirmation du Mot de passe :<br>
   <input type="password" placeholder="Resaisissez votre Mdp" name="password_verif" id="password_verif" required/><br><br>
   Adresse mail :<br>
   <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Saisissez votre mail" name="mail" id="mail" required /><br><br>
      <div class="submit">
      <input type="submit" name="envoyer" value="S'inscrire" />
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
       $row = $pdo->prepare("SELECT ID, Pseudo FROM Users WHERE Pseudo = :pseudo");
       $row->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
       $row->execute();
       $tab_infos = $row->fetch();
       $row->closeCursor();
       if ($tab_infos["Pseudo"] == $_POST['pseudo'])
	 {
	   header("Refresh:0; url=inscription.php?errors=1");
	 }
       else if ($_POST['password'] != $_POST['password_verif'])
	 {
	   header("Refresh:0; url=inscription.php?errors=2");
	 }

       $row = $pdo->prepare("SELECT ID, Mail FROM Users WHERE Mail = :mail");
       $row->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);
       $row->execute();
       $tab_infos = $row->fetch();
       $row->closeCursor();
       if ($_POST['mail'] == $tab_infos['Mail'])
	 {
	   header("Refresh:0; url=inscription.php?errors=3");
	 }
       else
	 {
	   $password = hash('sha256', $_POST['password']);
	   $role = 0;
	   $row = $pdo->prepare("INSERT INTO Users(Pseudo, Mail, Password, Charge) 
VALUES (:pseudo, :mail, :password, :charge);");
	   $row->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
	   $row->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);
	   $row->bindParam(':password', $password, PDO::PARAM_STR);
	   $row->bindParam(':charge', $role, PDO::PARAM_STR);
	   $row->execute();
	   $row->closeCursor();
	   header("Refresh:0; url=connexion.php");
	   
	 }
     }
   
   
   ?>
   
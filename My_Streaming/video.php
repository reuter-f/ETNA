<?php
// video.php for void.cine in /var/www/html/void.cine
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Tue Jan 10 08:34:43 2017 REUTER Faustine
// Last update Tue Jan 10 10:15:33 2017 REUTER Faustine
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
   $row = $pdo->prepare("SELECT * FROM Videos WHERE ID=:id");
$row->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
$row->execute();
$tab_infos = $row->fetch();
$row->closeCursor();

if ($tab_infos == NULL)
  {
    echo "<div class='bloc'>";
    echo "<div class='title'>";
    echo "ERREUR";
    echo "</div>";
    echo "<div class='content'>";
    echo "Vidéo inexistante !";
    echo "</div></div>";
  }

    echo "<div class='bloc'>";
    echo "<div class='title'>";
    echo $tab_infos["Nom"];
    echo "</div>";
    echo "<div class='content'>";
    echo "<br><div class='image'><img src='Sources/Images/Affiches/" . $tab_infos["ID"] . ".jpg'/></div>";
    echo "<br>" . $tab_infos["Synopsis"];
    echo "<br><br>Réalisateur : " . $tab_infos["Realisateur"] . " ( " . $tab_infos["Annee"] . " )";
if ($tab_infos["Categorie"] == 2)
  echo "<br>Durée : " . $tab_infos["Duree"] . " par épisode";
else
  echo "<br>Durée : " . $tab_infos["Duree"];
    echo "</div></div>";


$id = $tab_infos["ID"];
$vues = $tab_infos["Vues"] + 1;

$row = $pdo->prepare("UPDATE Videos SET Vues = :vues WHERE ID=:id");
$row->bindParam(':vues', $vues, PDO::PARAM_STR);
$row->bindParam(':id', $tab_infos["ID"], PDO::PARAM_STR);
$row->execute();
$row->closeCursor();

$row = $pdo->prepare("SELECT * FROM Comments WHERE ID_video=:id");
$row->bindParam(':id', $tab_infos["ID"], PDO::PARAM_STR);
$row->execute();
$tab_infos = $row->fetchAll();
$row->closeCursor();

echo "<div class='bloc'>";
echo "<div class='title'>";
echo "Commentaires";
echo "</div>";
echo "<div class='content'>";
echo $vues . " vues<br><br>";
if ($tab_infos == NULL)
  echo "Aucun commentaire sur cette vidéo.<br>Soyez le premier a donner votre avis !";

    $i = 0;

    while ($i < count($tab_infos))
      {
	echo "<strong>" . $tab_infos[$i]["Pseudo"] . "</strong>";
	echo "<br>Note : " . $tab_infos[$i]["Note"] . "/5<br>";
	echo $tab_infos[$i]["Avis"] . "<br><br>";
	$i++;
      }
echo "<br>______________________<br>";

if ($_SESSION){ ?>
         <form action="refresh.php" method='post'>


    Note : <br><br>
                <div class="note">
    <select name="note">
                  <option  value="5">5/5</option>
                  <option  value="4">4/5</option>
                  <option  value="3">3/5</option>
                  <option  value="2">2/5</option>
                 <option   value="1">1/5</option>
                </select>
                </div>


                <br>
                        <br>Laisser un commentaire :<br><br> <textarea name="commentaire" rows="5" cols="100" required  placeholder="Exemple : Voici un exemple de commentaire"></textarea>
    <?php echo " <br><br><input type=\"submit\" value=\"Envoyer\"><br><br><input type=\"hidden\" name=\"id\" value=\"" . $id . "\">";?>
                    </form>
    <?php }
	  else
	    {
	      echo "<br>Veuillez vous connecter si vous souhaitez laisser un avis sur cette vidéo.<br><br>";
	    }
echo "</div></div>";

?>



         <footer>
            <h6>Copiright &copy reuter_f <a href="contact.php">Contact</a></h6>
         </footer>
      </body>
   </html>
   
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>PROJET</title>
  </head>
  
  <body>
  
  <?php
    if(!isset($_SESSION['User'])) echo "<a href='ajouterMembre.html'>Inscription</a>\n<a href='Connexion.html'>Connexion</a>";
    else{
	$a = $_SESSION['User'];
	$b = $_SERVER['PHP_SELF'];
	echo "<p>Bienvenue, $a !</p><form method='post' action='deconnexion.php'>\n<input type='hidden' name='url' value='$b'>\n<input type='submit' value='Déconnexion'>\n</form>\n";
    }
    echo "<br /><br />\n<a href='depotArticle.php'>Cliquez ici pour déposer un article</a>\n<br /><br />\n<a href='profil.php'>Cliquez ici pour accéder à votre profil</a>\n<br /><br />\n";
	echo "<a href='ListeArticles.php'>Cliquez ici pour accéder à l'ensemble des articles publiés</a>\n";
  ?>

  </body>
</html>

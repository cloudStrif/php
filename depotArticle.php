<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Depot</title>
  </head>
  
  <body>

  <?php
  
   if(!isset($_SESSION['User']))
	echo "Seuls les membres peuvent déposer des articles. Veuillez vous connecter ou vous inscrire.\n<br />\n<a href='index.php'>Retour à l'accueil</a>\n";
   else{
	$b = $_SERVER['PHP_SELF'];
	echo "<form method='post' action='deconnexion.php'>\n<input type='hidden' name='url' value='$b'>\n<input type='submit' value='Déconnexion'>\n</form><br />\n\n";
	echo "<h1>Dépot d'un article :</h1>\n<form action='depot.php' method='post'>\n<input type='text' name='titre' placeholder='Titre...'>\n<br /><br />\n<textarea placeholder='Votre texte...' rows='10' cols ='50' name='article'></textarea>\n<br /><br />\nDéposez ici les adresses de vos fichiers multimédias: <input type='url' placeholder='Adresse 1...' name='file1'>\n  <input type='url' placeholder='Adresse 2...' name='file2'>\n  <input type='url' placeholder='Adresse 3...' name='file3'>\n<br /><br />\nMots-clés: <input type='text' placeholder='Mot-clé 1...' name='tag1'>\n  <input type='text' placeholder='Mot-clé 2...' name='tag2'>\n  <input type='text' placeholder='Mot-clé 3...' name='tag3'>\n<br /><br />\n<input type='submit' value='Valider'>\n</form>\n";
   }

   ?>

  </body>
</html>

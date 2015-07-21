<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
  </head>
  
  <body>

  <?php
	
	// seul l'administrateur doit pouvoir accéder à cette page
	if(!isset($_SESSION['User']) || $_SESSION['User'] != 'Admin') echo "Seul l'administrateur peut accéder à cette page.\n<br />\n<a href='.'>Retour à l'accueil<a>\n";
	else{
		// chaque articles et commentaires en attente de validation sont affichés, l'admin peut les sélectionner pour les rendre visibles, via 'validation.php'
		require_once('connectBase.php');
		$article = $m->rbunel35->ArticlesEnAttente;
		$com = $m->rbunel35->CommentairesEnAttente;
		$query = array();
		$cursor1 = $article->find($query);
		$cursor2 = $com->find($query);
		echo "<form action='validation.php' method='post'>\n";
		
		echo "<h1>Articles : </h1>\n<br /><br />\n";
		foreach($cursor1 as $cle=>$valeur){ // affichage des articles
			$a = $valeur['Titre'];
			$b = $valeur['Article'];
			$c = $valeur['File1'];
			$d = $valeur['File2'];
			$e = $valeur['File3'];
			echo "Titre : $a\n<br/><br />\nArticle : $b\n<br /><br />\n<a href=$c>$c</a>\n<br />\n<a href=$d>$d</a>\n<br />\n<a href=$e>$e</a>\n<br /><br />\nAutorisation d'afficher : <input type='checkbox' name=$cle value='article'>\n<br /><br /><br /><br />\n";
		}
		
		echo "<h1>Commentaires : </h1>\n<br /><br />\n";
		foreach($cursor2 as $cle=>$valeur){ // affichage des commentaires
			$a = $valeur['Text'];
			echo "Commentaire : $a\n<br /><br />\nAutorisation d'afficher : <input type='checkbox' name=$cle value='com'>\n<br /><br />\n";
		}
		
		// permet de valider, pour 'check': voir le commentaire au début de 'validation.php'
		echo "<input type='submit' value='Valider'>\n<input type='hidden' name='check' value='ok'>\n</form>\n";
	}
  ?>
    
  </body>
</html>

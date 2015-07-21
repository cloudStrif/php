<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Dépot Commentaires</title>
  </head>
  
  <body>

  <?php

	if(!isset($_SESSION['User']) || !isset($_POST['com'])) echo "Vous ne pouvez accéder à cette page.\n<br />\n<a href='.'>Retour à l'accueil</a>\n";
	else{
		require_once('connectBase.php');
		$com = $m->rbunel35->CommentairesEnAttente;
		$a = $_POST['com'];
		$b = $_POST['Article'];
		$c = $_SESSION['User'];
		if(empty($a)) echo "Vous ne pouvez pas déposer un commentaire vide.\n<br />\n<a href='.'>Retour à l'accueil</a>\n";
		else{
			$com->insert(array('Author'=>$c, 'Text'=>$a, 'Article'=>$b));
			echo "Votre commentaire a été ajouté. Il apparaîtra lorsque l'administrateur l'aura confirmé.\n<br />\n<a href='.'>Retour à l'accueil</a>\n";
		}
	}

  ?>
    
  </body>
</html>

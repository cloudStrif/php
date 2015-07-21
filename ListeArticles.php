<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Liste Articles</title>
  </head>
  
  <body>
  
  <?php
  
	if(!isset($_SESSION['User'])) echo "Seuls les membres peuvent accéder auw articles. Veuillez vous connecter ou vous inscrire.\n<br />\n<a href='index.php'>Retour à l'accueil</a>\n";
	else{
	
		// sert à dterminer si cette page a été appelée depuis profil.php, un champ de recherche ou le menu
		if(isset($_GET['keyword'])) $keyword = $_GET['keyword'];
		if(isset($_GET['mode']) && $_GET['mode'] == 'user') $user = $_SESSION['User'];
	
		require_once('connectBase.php');
		$articlesValidés = $m->rbunel35->Articles;
		$comValidés = $m->rbunel35->Commentaires;
		$query = array();
		$cursor1 = $articlesValidés->find($query);
		$cursor2 = $comValidés->find($query);
		
		echo "<h1>Articles: </h1>\n";
		
		// on affiche les articles ainsi que les commentaires asscociés
		foreach($cursor1 as $cle=>$valeur){
			$a = $valeur['Date'];
			$b = $valeur['Owner'];
			$c = $valeur['Titre'];
			$d = $valeur['Article'];
			$e = $valeur['File1'];
			$f = $valeur['File2'];
			$g = $valeur['File3'];
			$h = $valeur['Tag1'];
			$i = $valeur['Tag2'];
			$j = $valeur['Tag3'];
			if((!isset($_GET['keyword']) && !isset($_GET['mode'])) || (isset($_GET['keyword']) && ($keyword == $h || $keyword == $i || $keyword == $j)) || (isset($_GET['mode']) && $user == $b)){
				echo "Posté par $b, le $a.\n<br />\n";
				echo "<h3>$c</h3>\n<br />\n";
				echo "$d\n<br /><br />\n";
				echo "<a href=$e>$e</a>\n<br />\n<a href=$f>$f</a>\n<br />\n<a href=$g>$g</a>\n<br /><br />\n";			
				echo "Mots-clés: $h, $i, $j\n<br /><br />\n";
				echo "<h2>Commentaires:</h2>\n<br />\n";
				foreach($cursor2 as $cle2=>$valeur2){
					if($valeur2['Article'] == $valeur['Titre']){
						$k = $valeur2['Author'];
						$l = $valeur2['Date'];
						echo "Commentaire de $k, le $l\n<br />\n";
						// $m est déjà utilisé, on passe à $n
						$n = $valeur2['Text'];
						echo "$n\n<br /><br />\n";
					}
				}
				// formulaire pour ajouter un commenataire
				echo "Ajouter un commentaire:\n<br /><br />\n";
				echo "<form method='post' action='depotCom.php'>\n<textarea placeholder='Votre commentaire...' rows='10' cols ='50' name='com'></textarea>\n<br /><br />\n<input type='hidden' name='Article' value=$c>\n<input type='submit' value='Valider'>\n</form>\n<br /><br /><br /><br />\n";
			}
		}
	}
  ?>
  
  </body>
</html>
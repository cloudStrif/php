<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Validation</title>
  </head>
  
  <body>
  
  <?php
		
		// Seul l'admin peut accéder à cette page, l'attribut 'check' sert à vérifier qu'on accède à ce fichier depuis 'admin.php'
		if(!isset($_SESSION['User']) || $_SESSION['User'] != 'Admin' || !isset($_POST['check']) || $_POST['check'] != 'ok')
			echo "Vous ne pouvez pas accéder à cette page.\n<br />\n<a href='.'>Retour à l'accueil</a>\n";
		else{
			require_once('connectBase.php');
			$article = $m->rbunel35->ArticlesEnAttente;
			$articlesValidés = $m->rbunel35->Articles;
			$com = $m->rbunel35->CommentairesEnAttente;
			$comValidés = $m->rbunel35->Commentaires;
			$query = array();
			$cursor1 = $article->find($query);
			$cursor2 = $com->find($query);
			
			foreach($_POST as $cle=>$valeur){ // pour chaque couple cle/valeur du tableau POST: 
				if($valeur == 'article'){ // on enlève l'article des articles en attente et on l'ajoute aux articles visibles en y rajoutant la date
					foreach($cursor1 as $cle2=>$valeur2){
						if($cle == $cle2){ // ne doit arriver que pour un seul article
							$a = $valeur2['Titre'];
							$b = $valeur2['Article'];
							$c = $valeur2['File1'];
							$d = $valeur2['File2'];
							$e = $valeur2['File3'];
							$f = $valeur2['Tag1'];
							$g = $valeur2['Tag2'];
							$h = $valeur2['Tag3'];
							$i = $valeur2['Owner'];
						}
					}
					$j = date('d-m-Y'); // récupère la date courante au format jour/mois/année
					$doc = array('Titre'=>$a, 'Article'=>$b, 'File1'=>$c, 'File2'=>$d, 'File3'=>$e, 'Tag1'=>$f, 'Tag2'=>$g, 'Tag3'=>$h, 'Owner'=>$i);
					$article->remove($doc);
					$doc['Date'] = $j;
					$articlesValidés->insert($doc);
				}
				if($valeur == 'com'){ // même procédé que pour les articles
					foreach($cursor2 as $cle2=>$valeur2){
						if($cle == $cle2){ // ne doit arriver que pour un seul commentaire
							$a = $valeur2['Author'];
							$b = $valeur2['Text'];
							$c = $valeur2['Article'];
						}
					}
					$doc = array('Author'=>$a, 'Text'=>$b, 'Article'=>$c);	
					$c = date('d-m-Y');
					$com->remove($doc);
					$doc['Date'] = $c;
					$comValidés->insert($doc);
				}
			}
			
			echo "Les articles et commentaires séléctionnés ont été rendu visibles !\n<br />\n<a href='.'>Retour à l'accueil</a>\n";
		}
   ?>

   </body>
</html>
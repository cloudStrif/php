<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
  </head>
  
  <body>
  
  <?php
    require_once('connectBase.php');
    $membres = $m->rbunel35->ListeMembres;			
    $query = array();
    $cursor = $membres->find($query);
    $a = true;
    foreach($cursor as $cle=>$valeur)
		// si les pseudos et les hashs des mot de passe correspondent, alors on connecte l'utilisateur 
		// en retenant son pseudo dans $_SESSION['User']
		if($_POST['pseudo'] == $valeur['Pseudo'] && hash('sha256', $_POST['pw']) ==  $valeur['Password']){
			$_SESSION['User'] = $valeur['Pseudo'];
			echo "Connexion réussie !<br />\n";
			$a = false;
		}
     if($a) echo "Pseudo ou mot de passe incorrect. Veuillez rententer.<br />\n"; 
     echo "<a href='.'>Retour à l'accueil</a>\n";
   ?>

   </body>
</html>
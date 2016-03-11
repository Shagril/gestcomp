<?php

	$bdd = db_connect();

	$req = $bdd->prepare('select nom , prenom from utilisateur U, etudiant E where E.codepromotion = :code and E.maillogin = U.maillogin ');
	$req -> execute(array (
	'code' => $_POST['promotion']));
	
	$req1 = $bdd->prepare('select nom , prenom from utilisateur U, professeur P, encadrer E where E.codepromotion = :code and P.maillogin = U.maillogin and E.maillogin = U.maillogin');
	$req1 -> execute(array (
	'code' => $_POST['promotion']));
	
	echo'<table>';
	while ($donnees = $req->fetch())
	{
			echo'<tr><td>'.$donnees['nom'].' '.$donnees['prenom'].'</td></tr>';
	}
	
	
	while ($donnees = $req1->fetch())
	{
			echo'<tr><td>'.$donnees['nom'].' '.$donnees['prenom'].'</td></tr>';
	}
	
		echo'</table>';
	
?>
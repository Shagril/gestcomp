<?php

	$bdd = db_connect();
	
	$req = $bdd->prepare('SELECT DISTINCT annee FROM promotion');
	$req->execute();
	echo'<form name="formulaire"  method="POST" action="./listeEtudiant">';
	echo '<SELECT name="annee">';
	while ($donnees = $req->fetch())
	{
		echo '<OPTION>'.$donnees['annee'].'</OPTION>';
	}
	echo '</SELECT>';
	echo'<input type="submit" value="afficher" />';
	echo'</form>'	
	
	
?>
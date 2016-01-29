<?php
	$bdd = db_connect();
	
	$req = 'SELECT NOM, CODEPROMOTION from promotion';
	$reponse = $bdd->query($req) or die(print_r($bdd->errorInfo()));
	echo '<form name="" method="POST" action="./CreerEtudiant1">
				email:<input type="email" name="email" placeholder="email" /></br>
				nom:<input type="text" name="nom" placeholder="nom" /></br>
				prenom:<input type="text" name="prenom" placeholder="prenom" /></br>
				promotion:<select name="promotion">';
	while ($donnees = $reponse->fetch())
	{
		echo'<option value="'.$donnees['CODEPROMOTION'].'">' . $donnees['NOM'] . '</option>';
	}
	echo'</select></br>
		<input type="submit" name="valider" value="valider" />
		</form>';
?>
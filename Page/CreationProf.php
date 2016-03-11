<?php

	$bdd = db_connect();
	
	$req = 'SELECT nom, codepromotion from promotion ';
	$reponse = $bdd->query($req) or die(print_r($bdd->errorInfo()));
	echo '<html>
				<form name="" method="POST" action="./CreationProf">
				email:<input type="email" name="email" placeholder="email" /></br>
				nom:<input type="text" name="nom" placeholder="nom" /></br>
				prenom:<input type="text" name="prenom" placeholder="prenom" /></br>
				admin:<input type="checkbox" name="admin"></br>
				Promotion(s) ou intervient le professeur :</br>';
				
				
	while ($donnees = $reponse->fetch())
	{
		echo $donnees['nom'].'<input type="checkbox" name="chk[]" value="'.$donnees['codepromotion'].'">';
	}
	
	
	echo'</select></br>
		<input type="submit" name="valider" value="valider" />
		</form>
		</html>';
?>
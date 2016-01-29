<?php

	$bdd = db_connect();
	
	$req = $bdd->prepare('select nom , codepromotion from promotion');
	$req -> execute();
	
	echo 'Liste des promotions:';
	while ($donnees = $req->fetch())
	{
		echo'<form name="formulaire" method="POST" action="promotion.php">
			<tr>
			<input type="hidden" name="promotion" size="20" value="'.$donnees['codepromotion'].'" />
			<td><input type="submit" style="border:none; background:none; cursor:pointer; text-decoration:underline; color:blue" value="'.$donnees['nom'].'"</td>
			</tr>
			</form>';
	}
?>
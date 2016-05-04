<?php

	$bdd = db_connect();
	$req = $bdd->prepare('select nom , codepromotion from promotion');

	$req -> execute();

	
	echo"<center>";
	echo 'Liste des promotions:';

	echo"<table>";
	while ($donnees = $req->fetch())
	{
		echo "<tr>";
		echo"<td><a href='descriptionPromotion-".$donnees['codepromotion']."'>".$donnees['nom']."</a></td>";
		echo"</tr>";
	}
	echo"</table>";
	echo"</center>";

?>
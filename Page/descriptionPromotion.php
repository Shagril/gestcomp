<?php

	if(isset($page[1]))
	{
		$promotion=$page[1];
	}
	


	$bdd = db_connect();
	$req = $bdd->prepare('select nom, prenom, type from vue_utilisateur vu, etudiant et where vu.maillogin=et.maillogin and et.codepromotion='.$promotion.'
UNION

select nom, prenom,type from vue_utilisateur vu, encadrer en where vu.maillogin=en.maillogin and en.codepromotion='.$promotion);
	$req -> execute();
	
	$req1 = $bdd->prepare('select nom from promotion where codepromotion='.$promotion);
	$req1 -> execute();
	$donnees1 = $req1->fetch();

	echo"<center>";
	echo 'Promotion:'.$donnees1['nom'].'<br/>';


	while ($donnees = $req->fetch())
	{
		if($donnees['type']=='Eleve')
		{
			$eleve[]=$donnees;
			// echo "<tr>";
			// echo"<td>".$donnees['nom']." ".$donnees['prenom']."</td>";
			// echo"</tr>";
		}
		
		if($donnees['type']=='Prof')
		{
			$prof[]=$donnees;
			// echo "<tr>";
			// echo"<td>".$donnees['nom']." ".$donnees['prenom']."</td>";
			// echo"</tr>";
		}
		
	}
	
	echo"<table border=1px style='display: inline-table;'>";
	echo "<tr><td><b>Etudiants</b></td></tr>";
	
	foreach($eleve as $value )
	{
		echo "<tr><td>".$value['nom']." ".$value['prenom']."</td></tr>";
	}
	
	echo"</table>";
	
	echo"<table border=1px style='display: inline-table;'>";
	echo "<tr><td><b>Professeurs</b></td></tr>";
	
	foreach($prof as $value )
	{
		echo "<tr><td>".$value['nom']." ".$value['prenom']."</td></tr>";
	}
	
	echo"</table>";
	
	
	

	echo"<form action='supprimerPromotion' method='POST'>
	<input type='hidden' name='promotion' value=".$promotion."/>
    <input type='submit' value='Supprimer'>
		</form>";
	echo"</center>";
	


?>
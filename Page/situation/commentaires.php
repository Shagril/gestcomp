<?php

	if(isset($_SESSION['situationCourante']) and $_SESSION['situationCourante']<>0 )
		{
$req=$db->prepare("SELECT dateHeure, commentaire, nom FROM commenter c , utilisateur u where codesituation= :situation and u.maillogin=c.codeutilisateur");

			$req->execute(array (
			'situation' => $_SESSION['situationCourante']));
			
		
while ($donnees = $req->fetch())
{

	
	echo"<pre>commentaire de ".$donnees['nom']." le ".$donnees['dateHeure']." : ".$donnees['commentaire']."</pre>";

	echo "</br></br>";
	
}
		}
		else
		{
			echo "<font color='red'>Aucune situation en cour</font>";
		}

?>
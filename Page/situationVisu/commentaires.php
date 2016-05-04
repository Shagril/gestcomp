<?php
$req=$db->prepare("SELECT dateHeure, commentaire, nom FROM commenter c , utilisateur u where codesituation= :situation and u.maillogin=c.codeutilisateur");

			$req->execute(array (
			'situation' => $situation));
			
		
while ($donnees = $req->fetch())
{

	
	echo"<pre>commentaire de ".$donnees['nom']." le ".$donnees['dateHeure']." : ".$donnees['commentaire']."</pre>";

	echo "</br></br>";
	
}

?>



<pre>Ecrire un nouveau commentaire
<form name="commentaire" id="commentaire" action="visualiserSituation"  method="POST">
<input type='text' name='text' class='fields' size='100' maxlength='255' required>
<input type="hidden" name="situation" value="<?php echo $situation  ?>">
</form>
</pre>

<button type="submit" form="commentaire" value="Submit">Enregistrer</button>
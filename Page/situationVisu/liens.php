<?php


$req=$db->prepare("SELECT designation, url FROM situation_production where codesituation= :situation");

			$req->execute(array (
			'situation' => $situation));
?>

<h1>Liens</h1>

<div class="titre">
	Vous saisissez un libellé explicite pour chaque production réalisée dans cette situation et vous indiquez l'URI permettant d'y accéder.
</div>

<?php
$i=0;
while ($donnees = $req->fetch())
{
	$i=$i+1;
	echo "<div class='libellebas'>Désignation(".$i.") : </div>";
	echo "<input type='text' name='désignation' size='100' maxlength='255' class='fields' value=".$donnees['designation']." disabled>";
	
	echo"<div class='libellebas'>Adresse URL(".$i.") : </div>";
	echo"<input type='text' name='adresse' class='fields' size='100' maxlength='255' value=".$donnees['url']."  disabled>";
	
}


?>
	


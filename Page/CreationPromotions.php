<?php

$bdd = db_connect();
if(isset($_POST['nom']))
{


	$req = $bdd->prepare('INSERT INTO promotion(codeparcours,annee,nom)
	VALUES(:codeparcours ,:annee ,:nom)');
 
	$req->execute(array(
	'codeparcours' => $_POST['codeparcours'],
	'annee'=> $_POST['annee'],
	'nom' => $_POST['nom']));
	
	echo 'La promotion a bien été ajoutée';	
}



?>

<html>
	<body>
		<form method="POST" action="./creerPromotion">
			<label>Creation/Modification d'une promotion</label>
			</br></br>
			
			<label> Une promotion correspond à un ensemble d'étudiants suivis par un ensemble de professeurs. Typiquement, il s'agit d'une promotion.
			Un étudiant ne peut appartenir qu'à une seule promotion (mais peut en changer) ; un professeur peut intervenir dans plusieurs promotions.
			Pour supprimer une promotion il faut d'abord la sélectionner en passant par l'onglet "Recherche" </label><br><br>
			
			<label>Nom de la promotion</label>
			<input type="text" name="nom"/><br><br>
			
			<label>Année de la promotion</label>
			<input type="text" name="annee"/><br><br>
			
			<label>Parcours</label>
			<select name="codeparcours">
			<?php
			
				$req = $bdd->prepare('SELECT codeparcours, libelle FROM parcours'); 
				$req -> execute();
				while ($donnees = $req->fetch())
				{
					echo '<option value='.$donnees['codeparcours'].'>'.$donnees['libelle'].'</option>';
				}
			?>
			</select>

			<input type="submit" value="Envoyer">
			
		</form>
	</body>
</html>

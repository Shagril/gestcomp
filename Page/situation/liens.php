
<?php
		
		if(isset($_SESSION['situationCourante']) and $_SESSION['situationCourante']<>0 )
		{
		?>
<h1>Liens</h1>

<div class="titre">
	Vous saisissez un libellé explicite pour chaque production réalisée dans cette situation et vous indiquez l'URI permettant d'y accéder.
</div>
	<form action="addSituation" method="post" id="lien">
<div class="libellebas">Désignation : </div>
<input type="text" name="designation" size="100" maxlength="255" class="fields" required>

<div class="libellebas">Adresse (URL) : </div>
<input type="text" name="adresse" class="fields" size="100" maxlength="255" required>
</form>
<button type="submit" form="lien" value="Submit">Enregistrer</button>
<?php
}
		else
		{
			echo "<font color='red'>Aucune situation en cour</font>";
		}

?>
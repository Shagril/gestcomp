<h1>Reformumer</h1>
<div id="reformuler">
	<?php
		$req="SELECT codeactivite FROM mettre_en_oeuvre order by codeactivite";

		$reponse = $db->query($req);

		$processus = "";

		while($donnees = $reponse->fetch())

		{

			echo'<div id="reformuler-'.$donnees['codeactivite'].'">'.$donnees['codeactivite'].'<br/>';
		

			$req1=$db->prepare("SELECT codecompetence, libelle FROM competence where codeactivite= :activite");

			$req1->execute(array (

			'activite' => $donnees['codeactivite']));

			while ($donnees1 = $req1->fetch())
			{
				echo $donnees1['codecompetence']." ".$donnees1['libelle'].'<br/>';
			}

		echo('<label for="'.$donnees['codeactivite'].'">
				Votre reformulation de cette activité
			</label><input id="'.$donnees['codeactivite'].'" name="'.$donnees['codeactivite'].'" class="reformuler">
		</div>');

		

		}

	?>
</div>

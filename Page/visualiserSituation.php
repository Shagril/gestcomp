<?php

if(isset($page[1]))
{
	$situation=$page[1];
}
else
{
	$situation=$_POST['situation'];
}
$db = db_connect();
if(isset($_POST['text']))
{
	$query = $db->prepare('INSERT INTO commenter
				(
				dateHeure,
				codesituation,
				codeutilisateur,
				commentaire
				)
				VALUES
				(
				:date,
				:codesituation,
				:codeutilisateur,
				:commentaire
				)
				');
		
				$query->execute(Array(
				'date'=>date("Y-m-d H:i:s"),
				'codesituation'=>$situation,
				'codeutilisateur'=>$_SESSION['email'],
				'commentaire'=>$_POST['text']
				));
				
	
}


	
$req = $db->prepare('SELECT codeTypeSituation, codeSource, codeCadre, codeLoc, libelle, description, contexte, dateDebut, dateFin,environnementTechnologique, moyens, avisPersonnel   from situation where codesituation='.$situation); 
			$req->execute();	
			$donnees = $req->fetch();
			echo "<font color='red'>situation en cour: ".$donnees['libelle']."</font>";
			$codeTypeSituation=$donnees['codeTypeSituation'];
			$codeSource=$donnees['codeSource'];
			$codeCadre=$donnees['codeCadre'];
			$codeLoc=$donnees['codeLoc'];
			$libelle=$donnees['libelle'];
			$description=$donnees['description'];
			$contexte=$donnees['contexte'];
			$dateDebut=$donnees['dateDebut'];
			$dateFin=$donnees['dateFin'];
			$environnementTechnologique=$donnees['environnementTechnologique'];
			$moyens=$donnees['moyens'];
			$avisPersonnel=$donnees['avisPersonnel'];
?>

<ul class="nav nav-tabs">

		<li class="active"><a href="#Description" data-toggle="tab" aria-expanded="true">Description</a></li>

		<li><a href="#Activités" data-toggle="tab" aria-expanded="false">Activites</a></li>

		<li><a href="#Reformuler" data-toggle="tab" aria-expanded="false">Reformuler</a></li>

		<li><a href="#Liens" data-toggle="tab" aria-expanded="false">Liens</a></li>

		<li><a href="#Commentaires" data-toggle="tab" aria-expanded="false">Commentaires</a></li>

	</ul>

	<div id="myTabContent" class="tab-content">

		<div class="tab-pane fade active in" id="Description">

			<?php

				require('situationVisu/description.php');

			?>

		</div>

		<div class="tab-pane fade" id="Activités">

			<?php

				require('situationVisu/activites.php');

			?>

		</div>

		<div class="tab-pane fade" id="Reformuler">

			<?php

				require('situationVisu/reformuler.php');

			?>

		</div>

		<div class="tab-pane fade" id="Liens">

			<?php

				require('situationVisu/liens.php');

			?>

		</div>

		<div class="tab-pane fade" id="Commentaires">

			<?php

				require('situationVisu/commentaires.php');

			?>

		</div>

	</div>


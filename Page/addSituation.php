	

	<?php

		// echo"<pre>";
		// print_r($_POST);
		// echo"</pre>";
		$db = db_connect();

		
		if(isset($_POST['libelle']))
		{
			if(isset($_SESSION['situationCourante']) and $_SESSION['situationCourante']<>0)
			{
				$query = $db->prepare('UPDATE situation SET codetypesituation = :codeTypeSituation, codeSource= :codeSource, codeCadre= :codeCadre, codeLoc= :codeLoc, libelle = :libelle, description= :description, contexte =:contexte, dateDebut= :dateDebut, dateFin= :dateFin, environnementTechnologique= :environnementTechnologique, moyens =:moyens, avisPersonnel= :avisPersonnel  WHERE codesituation= :codesituation');
				$query->execute(Array(
				'codeTypeSituation'=>$_POST['codetypesituation'],
				'codeSource'=>$_POST['codesource'],
				'codeCadre'=>$_POST['codecadre'],
				'codeLoc'=>$_POST['codeloc'],
				'libelle'=>$_POST['libelle'],
				'description'=>$_POST['description'],
				'contexte'=>$_POST['contexte'],
				'dateDebut'=>$_POST['datedebut'],
				'dateFin'=>$_POST['datefin'],
				'environnementTechnologique'=>$_POST['environnementtechnologique'],
				'moyens'=>$_POST['moyens'],
				'avisPersonnel'=>$_POST['avispersonnel'],
				'codesituation'=>$_SESSION['situationCourante']
				));
				
			}
			else
			{
				$query = $db->prepare('INSERT INTO situation
				(
				codeTypeSituation,
				codeSource,
				codeCadre,
				codeLoc,
				codeUtilisateur,
				libelle,
				description,
				contexte,
				dateDebut,
				dateFin,
				environnementTechnologique,
				moyens,
				avisPersonnel
				)
				VALUES
				(
				:codeTypeSituation,
				:codeSource,
				:codeCadre,
				:codeLoc,
				:codeUtilisateur,
				:libelle,
				:description,
				:contexte,
				:dateDebut,
				:dateFin,
				:environnementTechnologique,
				:moyens,
				:avisPersonnel
				)
				');
		
				$query->execute(Array(
				'codeTypeSituation'=>$_POST['codetypesituation'],
				'codeSource'=>$_POST['codesource'],
				'codeCadre'=>$_POST['codecadre'],
				'codeLoc'=>$_POST['codeloc'],
				'codeUtilisateur'=>$_SESSION['email'],
				'libelle'=>$_POST['libelle'],
				'description'=>$_POST['description'],
				'contexte'=>$_POST['contexte'],
				'dateDebut'=>$_POST['datedebut'],
				'dateFin'=>$_POST['datefin'],
				'environnementTechnologique'=>$_POST['environnementtechnologique'],
				'moyens'=>$_POST['moyens'],
				'avisPersonnel'=>$_POST['avispersonnel']
				));
				
				$req = $db->prepare('SELECT MAX(codesituation) AS max_id from situation'); 
					$req->execute();	
					$donnees = $req->fetch();
					$codesituation=$donnees['max_id'];
				
				if(isset($_POST['typologie']))
				{
					foreach($_POST['typologie'] as $value)
					{	
						$query = $db->prepare('INSERT INTO situationobligatoire
						(
							CODEOBLIGATIONSITUATION,
							CODESITUATION
						)
						VALUES
						(
							:CODEOBLIGATIONSITUATION,
							:CODESITUATION
						)');
				
						$query->execute(Array(
						'CODEOBLIGATIONSITUATION'=>$value,
						'CODESITUATION'=>$codesituation
						));
				}
			}
		
			
			
			$_SESSION['situationCourante']=$codesituation;
			}
		}
		else
		{
			if(isset($_POST['modifier']) or isset($_POST['supprimer']) )
			{
				$_SESSION['situationCourante']=$_POST['ModifSituation'];
			}
			else
			{
				if(isset($_POST['activite']))
				{
					foreach($_POST['activite'] as $activite=>$reformulation)
					{	
						$query = $db->prepare('UPDATE mettre_en_oeuvre SET reformulation = :reformulation WHERE codesituation= :codesituation and codeactivite= :codeactivite');
						$query->execute(Array(
						'reformulation'=>$reformulation,
						'codeactivite'=>$activite,
						'codesituation'=>$_SESSION['situationCourante']
						));
					}
				}
				else
				{
					if(isset($_POST['adresse']))
					{
						$query = $db->prepare('INSERT INTO situation_production
						(
							codesituation,
							designation,
							url
						)
						VALUES
						(
							:codesituation,
							:designation,
							:url
						)');
				
						$query->execute(Array(
						'codesituation'=>$_SESSION['situationCourante'],
						'designation'=>$_POST['designation'],
						'url'=>$_POST['adresse']
						));
					}
					else
					{
						$_SESSION['situationCourante']=0;
					}
					
				}
			}
			
		}
		if(isset($_SESSION['situationCourante']) and $_SESSION['situationCourante']<>0 and !isset($_POST['supprimer']))
		{
			$req = $db->prepare('SELECT codeTypeSituation, codeSource, codeCadre, codeLoc, libelle, description, contexte, dateDebut, dateFin,environnementTechnologique, moyens, avisPersonnel   from situation where codesituation='.$_SESSION['situationCourante']); 
			$req->execute();	
			$donnees = $req->fetch();
			
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
			
		}
		else
		{
			$codeTypeSituation="";
			$codeSource="";
			$codeCadre="";
			$codeLoc="";
			$libelle="";
			$description="";
			$contexte="";
			$dateDebut="";
			$dateFin="";
			$environnementTechnologique="";
			$moyens="";
			$avisPersonnel="";
		}
		if(isset($_SESSION['situationCourante']) and $_SESSION['situationCourante']<>0)
		{
			$req = $db->prepare('SELECT libelle from situation where codesituation='.$_SESSION['situationCourante']); 
			$req->execute();	
			$donnees = $req->fetch();
			
			echo "<font color='red'>situation en cour: ".$donnees['libelle']."</font>";
		}
		
		// echo  $_SESSION['situationCourante'];
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

				require('situation/description.php');

			?>

		</div>

		<div class="tab-pane fade" id="Activités">

			<?php

				require('situation/activites.php');

			?>

		</div>

		<div class="tab-pane fade" id="Reformuler">

			<?php

				require('situation/reformuler.php');

			?>

		</div>

		<div class="tab-pane fade" id="Liens">

			<?php

				require('situation/liens.php');

			?>

		</div>

		<div class="tab-pane fade" id="Commentaires">

			<?php

				require('situation/commentaires.php');

			?>

		</div>

	</div>







	

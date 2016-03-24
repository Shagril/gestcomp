<?php
	error_reporting(-1);
	session_start();

	include('../../Include/Function/db.php');
	
	$db = db_connect();
	
	$situation = json_decode($_POST['json']);

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
		'codeTypeSituation'=>$situation->codetypesituation,
		'codeSource'=>$situation->codesource,
		'codeCadre'=>$situation->codecadre,
		'codeUtilisateur'=>$situation->user or $_SESSION['email'],
		'libelle'=>$situation->libelle,
		'description'=>$situation->description,
		'contexte'=>$situation->contexte,
		'dateDebut'=>$situation->datedebut,
		'dateFin'=>$situation->datefin,
		'environnementTechnologique'=>$situation->environnementtechnologique,
		'moyens'=>$situation->moyens,
		'avisPersonnel'=>$situation->avispersonnel
	));
	var_dump($data);
	$id = $db->lastInsertId();

	$query = $db->prepare('
		INSERT INTO mettre_en_oeuvre
		(
			codeSituation,
			codeActivite,
			reformulation
		)
		VALUES
		(
			:codeSituation,
			:codeActivite,
			:reformulation
		)
	');

	foreach($situation->activite as $activite)
	{
		$query->execute(Array(
			'codeSituation'=>$id,
			'codeActivite'=>key($activite),
			'reformulation'=>array_values($activite)[0]
		));
	}
	echo('
		{
			"success": true,
			"message": "La situation à été enregistrée."
		}
	');
	
?>

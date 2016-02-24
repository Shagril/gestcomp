<?php
	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=gestcomp','root','');
	}
	catch(Exception $e)
	{
		die('Erreur :'.$e->getMessage());
	}

	$req = $bdd->prepare('INSERT INTO situation(libelle,description,contexte,codeloc,codesource,codecadre,codetypesituation,datedebut,datefin,environnementtechnologique,moyens,avispersonnel)
	VALUES(:libelle,:description,:contexte,:codeloc,:codesource,:codecadre,:codetypesituation,:datedebut,:datefin,:environnementtechnologique,:moyens,:avispersonnel)');
 
	$req->execute(array(
		'libelle'=> $_POST['libelle'],
		'description' => $_POST['description'],
		'contexte' => $_POST['contexte'],
		'codeloc' => $_POST['codeloc'],
		'codesource' => $_POST['codesource'],
		'codecadre' => $_POST['codecadre'],
		'codetypesituation' => $_POST['codetypesituation'],
		'datedebut' => $_POST['datedebut'],
		'datefin' => $_POST['datefin'],
		'environnementtechnologique' => $_POST['environnementtechnologique'],
		'moyens' => $_POST['moyens'],
		'avispersonnel' => $_POST['avispersonnel']
	));
	
	echo 'La Situation a bien été ajoutée.';
?>
<?php

	$bdd = db_connect();
	
	
	$req = $bdd->prepare('INSERT INTO utilisateur(MAILLOGIN, NOM, PRENOM, estSupprimer) VALUES (:email, :nom, :prenom, :estSupprimer)');
	$req -> execute(array(
		'email' => $_POST['email'],
		'nom' => $_POST['nom'],
		'prenom' => $_POST['prenom'],
		'estSupprimer' => false,
		));
		
	
	$req = $bdd->prepare('INSERT INTO etudiant(MAILLOGIN, CODEPROMOTION) VALUES (:email,:promotion)');
	$req -> execute(array(
		'email' => $_POST['email'],
		'promotion' => $_POST['promotion'],
		));

	header("Refresh: 100;url=./creerEtudiant");



	

?>


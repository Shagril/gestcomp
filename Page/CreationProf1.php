<?php

	$bdd = db_connect();
	
	$req = $bdd->prepare('INSERT INTO utilisateur(maillogin, nom, prenom) VALUES (:email, :nom, :prenom)');
	$req -> execute(array(
		'email' => $_POST['email'],
		'nom' => $_POST['nom'],
		'prenom' => $_POST['prenom'],
		));
		
		if (isset($_POST['admin']))
		{
			$admin = true;
		}
		else
		{
			$admin = false;
		}
		
	$req = $bdd->prepare('INSERT INTO professeur(maillogin, estadministrateur) VALUES (:email, :administrateur)');
	$req -> execute(array(
		 'email' => $_POST['email'],
		 'administrateur' => $admin
		 ));
		
	foreach ($_POST['chk'] as $value)
	{

	$req = $bdd->prepare('INSERT INTO encadrer(codepromotion, maillogin) VALUES (:code,:email)');
	$req -> execute(array(
		'code' => $value,
		'email' => $_POST['email'],
		));

	}
	header("Refresh: 100;url=./creationProf");



	

?>
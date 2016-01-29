<?php

	$bdd = db_connect();
	
	if($_POST["action"]== "supprimer")
	{
		$req = $bdd->prepare('update UTILISATEUR set estSupprimer=true where maillogin = :mail');
		$req->execute(array (
		'mail' => $_POST['mail']
		));
	}
	else
	{
		$req = $bdd->prepare('update UTILISATEUR set mdp= :mdp where maillogin = :mail');
		$req->execute(array (
		'mail' => $_POST['mail'],
		'mdp' => $_POST['mdp']
		));
		
		$req = $bdd->prepare('update etudiant set codepromotion= :code where maillogin = :mail');
		$req->execute(array (
		'mail' => $_POST['mail'],
		'code' => $_POST['promotion']
		));
	}
	
?>
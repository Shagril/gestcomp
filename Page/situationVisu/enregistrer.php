<?php
		session_start();
		require_once('/../../Include/Function/db.php');
		
		$bdd = db_connect();
		
		$req = $bdd->prepare('delete from mettre_en_oeuvre where CODESITUATION= :CODESITUATION');
		$req -> execute(array(
			'CODESITUATION' => $_SESSION['situationCourante']
		));
		
		
		foreach (explode(",", $_POST["activite"]) as $activite)
		{
			if($activite<>"")
			{
				$req = $bdd->prepare('INSERT INTO mettre_en_oeuvre(CODESITUATION, CODEACTIVITE) VALUES (:CODESITUATION, :CODEACTIVITE)');
				$req -> execute(array(
				'CODESITUATION' => $_SESSION['situationCourante'],
				'CODEACTIVITE' => $activite ,
				));	
			}
		}
	
?>

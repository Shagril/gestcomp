<?php
	$bdd = db_connect();
		
		$req = $bdd->prepare('delete from mettre_en_oeuvre where CODESITUATION= :CODESITUATION');
		$req -> execute(array(
			'CODESITUATION' => 1
		));
		
		
		foreach (explode(",", $_POST["activite"]) as $activite)
		{
			$req = $bdd->prepare('INSERT INTO mettre_en_oeuvre(CODESITUATION, CODEACTIVITE) VALUES (:CODESITUATION, :CODEACTIVITE)');
			$req -> execute(array(
			'CODESITUATION' => 1,
			'CODEACTIVITE' => $activite ,
			));	
		}
	
?>

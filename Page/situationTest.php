<?php

// echo "<pre>";
// print_r($_POST);
// echo"</pre>";
if(isset($_POST['modifier']))
{
	include_once('addSituation.php');
}

if(isset($_POST['supprimer']))
{
	$db = db_connect();
		$query = $db->prepare('DELETE FROM commenter WHERE codesituation= :codesituation');
				$query->execute(Array(
				'codesituation'=>$_POST['ModifSituation']
				));
				
				$query = $db->prepare('DELETE FROM mettre_en_oeuvre WHERE codesituation= :codesituation');
				$query->execute(Array(
				'codesituation'=>$_POST['ModifSituation']
				));
				
				$query = $db->prepare('DELETE FROM situationobligatoire WHERE codesituation= :codesituation');
				$query->execute(Array(
				'codesituation'=>$_POST['ModifSituation']
				));
				
				$query = $db->prepare('DELETE FROM situation_production WHERE codesituation= :codesituation');
				$query->execute(Array(
				'codesituation'=>$_POST['ModifSituation']
				));
			
				$query = $db->prepare('DELETE FROM situation WHERE codesituation= :codesituation');
				$query->execute(Array(
				'codesituation'=>$_POST['ModifSituation']
				));
	include_once('listeSituation.php');

		
					
}


?>
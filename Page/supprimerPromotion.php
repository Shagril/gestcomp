<?php

$db = db_connect();
$promotion=$_POST['promotion'];
		
		$query = $db->prepare('DELETE FROM promotion WHERE codepromotion= :codepromotion');
				$query->execute(Array(
				'codepromotion'=>$_POST['promotion']
				));
		
	include_once('listePromotionAdmin.php');



?>
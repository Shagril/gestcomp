<?php

   //Là il include son fichier de config pour l'accès à la BD
   include "Include/Function/db.php";
	$db = db_connect();

	$query = $db->prepare("SELECT avatar FROM vue_utilisateur WHERE LOWER(mailLogin) = LOWER(:email)");
	$query->execute(array(
			'email' => $_REQUEST['id']
	));
	
   $data = $query->fetch();

   header("Content-Type: Image/PNG");
   print $data['avatar'];
?>
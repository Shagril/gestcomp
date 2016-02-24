<?php

	$user = $page[1];

	$db = db_connect();

	$query = $db->prepare("SELECT mailLogin, nom, prenom, avatar, type, estAdmin FROM vue_utilisateur WHERE LOWER(mailLogin) = LOWER(:email) AND mdp = :password");
	$query->execute(array(
			'email' => $_POST['email'],
			'password' => SHA1($_POST['password'])
	));

	
	
	while ($data = $query->fetch())
	{
		if(strToLower($data['mailLogin']) == strToLower($_POST['email']))
		{	
			$_SESSION['email'] = $data['mailLogin'];
			$_SESSION['nom'] = $data['nom'];
			$_SESSION['prenom'] = $data['prenom'];
			$_SESSION['avatar'] = $data['avatar'];
			if($data['estAdmin'])
				$_SESSION['type'] = 'Admin';
			else
				$_SESSION['type'] = $data['type'];
			
			header('location: ./accueil');
		}
	}
	
	$query->closeCursor();
	
	if(!isset($_SESSION['id']))
	{
?>
		<div class="alert alert-dismissible alert-danger" id="info">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<div> <strong>Mot de passe errone</strong><br/>
				Le login ou mot de passe est faux.
				
			</div>
		</div>
<?php
	}
?>

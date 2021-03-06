﻿<?php
if(!isset($_POST['envoi']))
{
	if(isset($_REQUEST['user']))
		$utilisateur = $_REQUEST['user'];
	else
		$utilisateur = $_SESSION['email'];
	
	
	$bdd = db_connect();

	$req = $bdd->prepare('SELECT * FROM utilisateur WHERE mailLogin = :utilisateur');
	$req -> execute(array(
		'utilisateur' => $utilisateur
	));
	
	$data = $req->fetch();
	
?>
	<form action="./settings" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>
					<hr>
				</td>
			</tr>
			<tr>
			<td> <label for="nom">Nom :</label>
			<input type="text" name="nom" id="nom" size="20" maxlength="32" value="<?php echo($data['NOM'])?>"><input type="hidden" name="numpers" value="1">

			</td>
			<td> <label for="prenom">Prénom :</label>
				<input type="text" name="prenom" id="prenom" size="20" maxlength="32" value="<?php echo($data['PRENOM'])?>"> </td>
			</tr>
			<tr>

				<td><label for="mail">Adresse mél : </label><input type="text" name="mail" id="mail" size="32" maxlength="64" value="<?php echo($data['MAILLOGIN'])?>"></td><td><label for="numexam">Numéro examen : </label><input type="text" name="numexam" id="numexam" size="20" maxlength="16" value=""></td>
			</tr>
		  
			<tr>
				<td><label for="mdp">Mot de passe :</label>
					<input type="text" name="mdp" id="mdp" size="10" value="xxxx" > <label for="chmdp">Changer le mot de passe :</label> <input type="checkbox" name="chmdp" id="chmdp">
				</td>
			</tr>
			<tr>
				<td>
					<div class="centrer">
						<input type="hidden" name="user" value="<?php echo($utilisateur) ?>">
						<input type="submit" name="envoi" value="Enregistrer">
					</div>
				</td>
			</tr>
		</table>
	</form>
<?php
}
else
{
	
	// $fichier = file_get_contents($_FILES['avatar']['tmp_name']);
	// $taille_maxi = 250000;
	// $taille = filesize($_FILES['avatar']['tmp_name']);
	// $extensions = array('image/png');
	// $extension = $_FILES['avatar']['type']; 
	////Début des vérifications de sécurité...
	// if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
	// {
		 // $erreur = 'Vous devez uploader un fichier de type png...';
	// }
	// if($taille>=$taille_maxi)
	// {
		 // $erreur = 'Le fichier est trop gros...';
	// }
	
	// $uploadAvatar = isset($_FILES['avatar']);
	
	// if($uploadAvatar)
	// {
		// $uploadAvatar = false;
		// if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		// {
			 // $uploadAvatar = true;
		// }
		// else
		// {
			// die($erreur);
		// }
	// }
	
	$bdd = db_connect();
	
	$stringSql = 'UPDATE utilisateur SET mailLogin = :email, nom = :nom, prenom = :prenom';
	$array = array(
		'utilisateur' => $_POST['user'],
		'email' => $_POST['mail'],
		'nom' => $_POST['nom'],
		'prenom' => $_POST['prenom']
		);
		
	if(isset($_POST['chmdp']))
	{
		$stringSql .= ', mdp = SHA1(:mdp)';
		$array['mdp'] = $_POST['mdp'];
	}
	
	// if($uploadAvatar)
	// {
		// $stringSql .= ', avatar = '.addslashes($fichier);
		 
	// }
	
	$stringSql .= ' WHERE mailLogin = :utilisateur';
	
	$req = $bdd->prepare($stringSql);
	$req -> execute($array);	print_r($stringSql);
}
?>
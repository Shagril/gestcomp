<?php
	$bdd = db_connect();	if(isset($_POST['email']))	{		$req = $bdd->prepare('INSERT INTO utilisateur(MAILLOGIN, NOM, PRENOM, mdp, estSupprimer) VALUES (:email, :nom, :prenom, SHA1(:mdp), :estSupprimer)');	$req -> execute(array(		'email' => $_POST['email'],		'nom' => $_POST['nom'],		'prenom' => $_POST['prenom'],				'mdp' => "mdpdebase",		'estSupprimer' => false,		));				$req = $bdd->prepare('INSERT INTO etudiant(MAILLOGIN, CODEPROMOTION, numeroINE) VALUES (:email,:promotion, :numeroINE)');	$req -> execute(array(		'email' => $_POST['email'],		'promotion' => $_POST['promotion'],				'numeroINE' => $_POST['numeroINE'],		));	}
	
	$req = 'SELECT NOM, CODEPROMOTION from promotion';
	$reponse = $bdd->query($req) or die(print_r($bdd->errorInfo()));
	echo '<form name="" method="POST" action="./creerEtudiant">
				email:<input type="email" name="email" placeholder="email" required/></br>
				nom:<input type="text" name="nom" placeholder="nom" required/></br>
				prenom:<input type="text" name="prenom" placeholder="prenom" required/></br>								numeroINE:<input type="text" name="numeroINE" placeholder="prenom" required/></br>
				promotion:<select name="promotion">';
	while ($donnees = $reponse->fetch())
	{
		echo'<option value="'.$donnees['CODEPROMOTION'].'">' . $donnees['NOM'] . '</option>';
	}
	echo'</select></br>
		<input type="submit" name="valider" value="valider" />
		</form>';
?>
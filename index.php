<html>
<script src="Include/js/jquery-1.10.2.min.js"></script>
<script src="Include/js/bootstrap.js"></script>
<script src="Include/js/metro.js"></script>

	<head>
		<?php 
			/*
				Démarrage de la session sur la page principale pour l'activer sur tous le site.
				Toutes variable ou fonction sur cette page sera disponible sur toutes les pages
				du site.
			*/
			session_start();
			

			// $_SESSION['email'] = 'etu@etu.fr';
			// $_SESSION['nom'] = 'etu';
			// $_SESSION['prenom'] = 'etu';
			// $_SESSION['avatar'] = '';
			// $_SESSION['type'] = 'Eleve';
			
			/*
				On integre la fonction de connection à la base de donnée pour pouvoir l'utiliser
				sur le site entier.
			*/
			
			require_once('Include/Function/db.php');
		?>
		
		<!--
			Nomme le site pour éviter d'avoir le liens en tant que nom d'onglet.
		-->

		<title>GestComp</title>

		

		<!--

			On intègre bootstrap ainsi que les fichiers css qui permettrons la mise en forme

			différament suivant si l'on est en version pc ou mobile.

		-->

		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="Include/css/bootstrap.css" media="screen">
		<link rel="stylesheet" href="Include/css/screen-design.css" media="screen"> <!-- Version PC -->
		<link rel="stylesheet" href="Include/css/mobile-design.css" media="screen"> <!-- Version Mobile -->
	</head>

	<body>
		<!--
			Dans la partie "header", tout en haut du site, on y ajoute le script php "header.php"
			qui permet l'affichage de la barre de navigation.
		-->
		<header>
			<?php include('Include/header.php'); ?>
		</header>
		
		<!--
			On ajoute dans le corp du site la page qui gère les droits de naviagtions  et permet la 
			navigation sur les différentes pages du site.
		-->

		<div class="jumbotron">
			<?php include('Include/page.php'); ?>
		</div>
		
		<!--
			On ajoute tout en bas du site le pied de page qui sera inclu dans toutes les pages du site.
		-->
		<div class="footer">
			<?php include('Include/footer.php'); ?>
		</div>

	</body>

	<!--
		En fin de page on charge les fichiers javascript pour être sur que le site sois chargé quand
		le script se chargent.
		On charge JQuery et l'extention javascript de Bootstrap.
	-->
	
	
</html>

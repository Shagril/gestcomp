<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<img height="50" alt="logo"><a
				class="navbar-brand" href="./">GestComp</a>
		</div>

		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<?php
					if(!isset($_GET['page']))
						$_GET['page'] = 'accueil';
				?>
				<!--
					Liste des fonctionnalitées pour tous comptes.
				-->
				<li <?php if($_GET['page'] == 'accueil') echo('class="active"')?>><a href="./">Accueil<span class="sr-only"></span></a></li>
				
				<?php if(isset($_SESSION['type'])) { ?>
				<!--
					Liste des fonctionnalitées pour les comptes Eleves.
				-->
				<?php  if($_SESSION['type'] == "Eleve") { ?>
				<li <?php if($_GET['page'] == 'addSituation') echo('class="active"')?>><a href="./addSituation">Nouvelle Situation<span class="sr-only"></span></a></li>
				<li <?php if($_GET['page'] == 'modifSituation') echo('class="active"')?>><a href="./modifSituation">Gérer les Situations<span class="sr-only"></span></a></li>
				<li <?php if($_GET['page'] == 'bilan') echo('class="active"')?>><a href="./bilan">Bilan Individuel<span class="sr-only"></span></a></li>
				<li <?php if($_GET['page'] == 'tableau') echo('class="active"')?>><a href="./tableau">Tableau de Synthèse<span class="sr-only"></span></a></li>
				<?php } ?>
				
				<!--
					Liste des fonctionnalitées pour les comptes Profs.
				-->
				<?php if($_SESSION['type'] == "Prof") { ?>
				<li <?php if($_GET['page'] == 'creerEtudiant') echo('class="active"')?>><a href="./creerEtudiant">Créer un étudiant<span class="sr-only"></span></a></li>
				<li <?php if($_GET['page'] == 'listePromotion') echo('class="active"')?>><a href="./listePromotion">Liste des Promotions<span class="sr-only"></span></a></li>
				<li <?php if($_GET['page'] == 'listeAnnee') echo('class="active"')?>><a href="./listeAnnee">Liste des Années<span class="sr-only"></span></a></li>
				<?php } ?>
				
				<!--
					Liste des fonctionnalitées pour les comptes Admin.
				-->
				<?php if($_SESSION['type'] == "Admin") { ?>
				<li <?php if($_GET['page'] == 'creerProf') echo('class="active"')?>><a href="./creerProf">Créer un Professeur<span class="sr-only"></span></a></li>
				<li <?php if($_GET['page'] == 'creerEtudiant') echo('class="active"')?>><a href="./creerEtudiant">Créer un étudiant<span class="sr-only"></span></a></li>
				
				<?php } ?>
				
				<?php } ?>
				
				<?php
				if(isset($_SESSION['email']))
				{
					echo('<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-expanded="false">'.$_SESSION['prenom'].' '.$_SESSION['nom'].'
							<span class="caret"></span></a>
							
							<ul class="dropdown-menu" role="menu">
								<li><img src="./avatar.php?id='.$_SESSION['email'].'" alt="'.$_SESSION['prenom'].' '.$_SESSION['nom'].'" width="158"></li>
								<li class="divider"></li>
								<li><a href="./settings">Parametres</a></li>
								<li><a href="./login">Se Deconnecter</a></li>
							</ul>
						</li>
					');
				}
				else
				{
				?>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-expanded="false">Connexion
							<span class="caret"></span>
					</a>
						<ul class="dropdown-menu" role="menu">
							<form class="form-horizontal" action="./login" method="post">
								<h1>Connexion</h1>
								<label for="email">Email</label>
								<input class="form-control" name="email" id="email" placeholder="E-Mail" type="email"></input>
								<label for="password">Password</label>
								<input class="form-control" name="password" id="Password" placeholder="Password" type="password"></input>
								<br/>
								<input type="reset" class="btn btn-default"></input>
								<input type="submit" class="btn btn-primary" id="action" name="action" value="Se Connecter"></input>
							</form>
						</ul>
					</li>
				<?php 
				}
				?>
			</ul>
		</div>

	</div>
</nav>
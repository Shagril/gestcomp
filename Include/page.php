<?php
	
	if(isset($_GET['page']))
		$page = explode('-', $_GET['page']);
	
	/*
		Cette page permet de définir les droits des utilisateurs.
	*/
	
	/*
		On ajoute en premier lieu les droit lorsqu'aucun utilisateur n'est connecté.
	*/
	if(!isset($_SESSION['type']))
	{
		switch($_GET['page'])
		{
			/*
				On permet d'accéder à la page d'accueil.
			*/
			case 'accueil':
				require("Page/accueil.php");
				break;
			/*
				On permet à l'eleve de se connecté.
			*/
			case 'login':
				require("Page/login.php");
				break;
			/*
				Si la page demandé n'existe pas dans les droits de l'utilisateur
				alors on lui dit que la page n'existe pas (Erreur: 404).
			*/
			default:
				require("Erreurs/404.php");
				break;
		}
	}
	/*
		On ajoute ensuite les droits lorsqu'un utilisateur est loggué en tant qu'eleve.
	*/
	else if($_SESSION['type'] == "Eleve")
	{
		switch($_GET['page'])
		{
			/*
				On permet d'accéder à la d'accueil spécifique aux eleves.
			*/
			case 'accueil':
				require("Page/eleve.php");
				break;
			/*
				On permet a un eleve de se déconnecter.
			*/
			case 'login':
				require("Page/logout.php");
				break;
			/*
				On permet à un eleve d'accéder à sa page de création de Situation.
			*/
			case 'addSituation':
				require("Page/addSituation.php");
				break;
			/*
				On permet à un eleve d'accéder à sa page de Bilan de compétance.
			*/
			case 'bilan':
				require("Page/bilan.php");
				break;
			
			/*
				On permet à un eleve d'accéder à sa page de tableau des activités.
			*/
			case 'tableau':
				require("Page/tableau.php");
				break;
			
			/*
				On permet à un eleve d'enregister ces activités dans une situation.
			*/
			case 'enregistrerActivite':
				require("Page/situation/enregistrer.php");
				break;
				
			/*
				On permet à un eleve de gérer ces situations.
			*/
			case 'listeSituation':
				require("Page/listeSituation.php");
				break;
			
			/*
				On permet à un eleve d'accéder à sa page de modification des
				parametres.
			*/
			case 'settings':
				require("Page/settings-eleve.php");
				break;
			/*
				Si la page demandé n'existe pas dans les droits de l'utilisateur
				alors on lui dit que la page n'existe pas (Erreur: 404).
			*/
			default:
				require("Erreurs/404.php");
				break;
		}
	}
	/*
		On ajoute finalement les droits lorsqu'un utilisateur est loggué ent tant que prof.
	*/
	else if($_SESSION['type'] == "Prof")
	{
		switch($_GET['page'])
		{
			/*
				On permet l'accès à la page d'accueil spécifique aux profs, qu'il soit admin ou pas.
			*/
			case 'accueil':
				require("Page/prof.php");
				break;
			/*
				On permet aux professeurs, admin ou pas, de se déconnecter.
			*/
			case 'login':
				require("Page/logout.php");
				break;
			/*
				On permet aux professeurs, admin ou pas, de créer un étudiant.
			*/
			case 'creerEtudiant':
				require("Page/creerEtudiant.php");
				break;
			case 'creerEtudiant1':
				require("Page/creerEtudiant1.php");
				break;
			/*
				On permet aux professeurs, admin ou non, de lister les promotions.
			*/
			case 'listePromotion':
				require("Page/listepromotion.php");
				break;
			case 'affichePromotion':
				require("Page/promotion.php");
				break;
			/*
				On permet aux professeurs, admin ou non, de modifier un eleve.
			*/
			case 'listeAnnee':
				require("Page/listeannee.php");
				break;
			case 'listeEtudiant':
				require("Page/listeEtudiant.php");
				break;
			case 'modifierEtudiant':
				require("Page/modifierEtudiant.php");
				break;
			/*
				On permet aux professeurs administrateur d'accéder à la page de
				modification des parametres administrateur, et aux professeurs non
				administrateur d'accéder a la page de modification des parametres 
				administrateur.
			*/
			case 'settings':
				require("Page/settings-prof.php");
				
			/*
				Si la page demandé n'existe pas dans les droits de l'utilisateur
				alors on lui dit que la page n'existe pas (Erreur: 404).
			*/
			default:
				require("Erreurs/404.php");
				break;
		}

	}
	else if($_SESSION['type'] == 'Admin')
	{
		switch($_GET['page'])
		{
			/*
				On permet l'accès à la page d'accueil spécifique aux profs, qu'il soit admin ou pas.
			*/
			case 'accueil':
				require("Page/admin.php");
				break;
			/*
				On permet aux professeurs, admin ou pas, de se déconnecter.
			*/
			case 'login':
				require("Page/logout.php");
				break;
			/*
				On permet aux professeurs, admin ou pas, de créer un étudiant.
			*/
			case 'creerEtudiant':
				require("Page/creerEtudiant.php");
				break;
			case 'creerEtudiant1':
				require("Page/creerEtudiant1.php");
				break;
			/*
				On permet aux professeurs admin de créer un professeur.
			*/
			case 'creerProf':
				require("Page/CreationProf.php");
				break;
			case 'creerProf1':
				require("Page/CreationProf1.php");
				break;
			/*
				On permet aux professeurs, admin ou non, de lister les promotions.
			*/
			case 'listePromotion':
				require("Page/listepromotion.php");
				break;
			case 'affichePromotion':
				require("Page/promotion.php");
				break;
			/*
				On permet aux professeurs, admin ou non, de modifier un eleve.
			*/
			case 'listeAnnee':
				require("Page/listeannee.php");
				break;
			case 'listeEtudiant':
				require("Page/listeEtudiant.php");
				break;
			case 'modifierEtudiant':
				require("Page/modifierEtudiant.php");
				break;
			/*
				On permet aux professeurs administrateur d'accéder à la page de
				modification des parametres administrateur, et aux professeurs non
				administrateur d'accéder a la page de modification des parametres 
				administrateur.
			*/
			case 'settings':
				require("Page/settings-admin.php");
				break;
			case 'creerEtudiant':
				require('Page/creerEtudiant.php');
				break;
			/*
				Si la page demandé n'existe pas dans les droits de l'utilisateur
				alors on lui dit que la page n'existe pas (Erreur: 404).
			*/
			default:
				require("Erreurs/404.php");
				break;
		}
	}
?>
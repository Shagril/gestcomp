-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 18 Décembre 2015 à 10:45
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestcomp`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE IF NOT EXISTS `activite` (
  `CODEACTIVITE` char(32) NOT NULL,
  `CODEPROCESSUS` char(32) NOT NULL,
  `LIBELLE` text,
  PRIMARY KEY (`CODEACTIVITE`),
  KEY `I_FK_ACTIVITE_PROCESSUS` (`CODEPROCESSUS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activite`
--

INSERT INTO `activite` (`CODEACTIVITE`, `CODEPROCESSUS`, `LIBELLE`) VALUES
('A3.2.3', 'P3', 'Mise à jour de la documentation technique d''une solution d''infrastructure'),
('A3.2.2', 'P3', 'Remplacement ou mise à jour d''éléments défectueux ou obsolètes'),
('A3.2.1', 'P3', 'Installation et configuration d''éléments d''infrastructure'),
('A3.1.3', 'P3', 'Prise en compte du niveau de sécurité nécessaire à une infrastructure'),
('A3.1.2', 'P3', 'Maquettage et prototypage d''une solution d''infrastructure'),
('A3.1.1', 'P3', 'Proposition d''une solution d''infrastructure'),
('A2.3.2', 'P2', 'Proposition d''amélioration d''un service'),
('A2.3.1', 'P2', 'Identification, qualification et évaluation d''un problème'),
('A2.2.3', 'P2', 'Réponse à une interruption de service'),
('A2.2.2', 'P2', 'Suivi et réponse à des demandes d''assistance'),
('A2.2.1', 'P2', 'Suivi et résolution d''incidents'),
('A2.1.2', 'P2', 'Évaluation et maintien de la qualité d''un service'),
('A2.1.1', 'P2', 'Accompagnement des utilisateurs dans la prise en main d''un service'),
('A1.4.3', 'P1', 'Gestion des ressources'),
('A1.4.2', 'P1', 'Évaluation des indicateurs de suivi d''un projet et justification des écarts'),
('A1.4.1', 'P1', 'Participation à un projet'),
('A1.3.4', 'P1', 'Déploiement d''un service'),
('A1.3.3', 'P1', 'Accompagnement de la mise en place d''un nouveau service'),
('A1.3.2', 'P1', 'Définition des éléments nécessaires à la continuité d''un service'),
('A1.3.1', 'P1', 'Test d''intégration et d''acceptation d''un service'),
('A1.2.5', 'P1', 'Définition des niveaux d''habilitation associés à un service'),
('A1.2.4', 'P1', 'Détermination des tests nécessaires à la validation d''un service'),
('A1.2.3', 'P1', 'Évaluation des risques liés à l''utilisation d''un service'),
('A1.2.2', 'P1', 'Rédaction des spécifications techniques de la solution retenue (adaptation d''une solution existante ou réalisation d''une nouvelle solution)'),
('A1.2.1', 'P1', 'Élaboration et présentation d''un dossier de choix de solution technique'),
('A1.1.3', 'P1', 'Étude des exigences liées à la qualité attendue d''un service'),
('A1.1.2', 'P1', 'Étude de l''impact de l''intégration d''un service sur le système informatique'),
('A1.1.1', 'P1', 'Analyse du cahier des charges d''un service à produire'),
('A3.3.1', 'P3', 'Administration sur site ou à distance des éléments d''un réseau, de serveurs, de services et d''équipements terminaux'),
('A3.3.2', 'P3', 'Planification des sauvegardes et gestion des restaurations'),
('A3.3.3', 'P3', 'Gestion des identités et des habilitations'),
('A3.3.4', 'P3', 'Automatisation des tâches d''administration'),
('A3.3.5', 'P3', 'Gestion des indicateurs et des fichiers d''activité'),
('A4.1.1', 'P4', 'Proposition d''une solution applicative'),
('A4.1.2', 'P4', 'Conception ou adaptation de l''interface utilisateur d''une solution applicative'),
('A4.1.3', 'P4', 'Conception ou adaptation d''une base de données'),
('A4.1.4', 'P4', 'Définition des caractéristiques d''une solution applicative'),
('A4.1.5', 'P4', 'Prototypage de composants logiciels'),
('A4.1.6', 'P4', 'Gestion d''environnements de développement et de test'),
('A4.1.7', 'P4', 'Développement, utilisation ou adaptation de composants logiciels'),
('A4.1.8', 'P4', 'Réalisation des tests nécessaires à la validation d''éléments adaptés ou développés'),
('A4.1.9', 'P4', 'Rédaction d''une documentation technique'),
('A4.2.1', 'P4', 'Analyse et correction d''un dysfonctionnement, d''un problème de qualité de service ou de sécurité'),
('A4.2.2', 'P4', 'Adaptation d''une solution applicative aux évolutions de ses composants'),
('A4.2.3', 'P4', 'Réalisation des tests nécessaires à la mise en production d''éléments mis à jour'),
('A4.2.4', 'P4', 'Mise à jour d''une documentation technique'),
('A5.1.1', 'P5', 'Mise en place d''une gestion de configuration'),
('A5.1.2', 'P5', 'Recueil d''informations sur une configuration et ses éléments'),
('A5.1.3', 'P5', 'Suivi d''une configuration et de ses éléments'),
('A5.1.4', 'P5', 'Étude de propositions de contrat de service (client, fournisseur)'),
('A5.1.5', 'P5', 'Évaluation d''un élément de configuration ou d''une configuration'),
('A5.1.6', 'P5', 'Évaluation d''un investissement informatique'),
('A5.2.1', 'P5', 'Exploitation des référentiels, normes et standards adoptés par le prestataire informatique'),
('A5.2.2', 'P5', 'Veille technologique'),
('A5.2.3', 'P5', 'Repérage des compléments de formation ou d''auto-formation utiles à l''acquisition de nouvelles compétences'),
('A5.2.4', 'P5', 'Étude d‘une technologie, d''un composant, d''un outil ou d''une méthode');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_date`
--

CREATE TABLE IF NOT EXISTS `commentaire_date` (
  `DATEHEURE` datetime NOT NULL,
  PRIMARY KEY (`DATEHEURE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commenter`
--

CREATE TABLE IF NOT EXISTS `commenter` (
  `DATEHEURE` datetime NOT NULL,
  `CODESITUATION` char(32) NOT NULL,
  `CODEUTILISATEUR` char(32) NOT NULL,
  `COMMENTAIRE` char(250) DEFAULT NULL,
  PRIMARY KEY (`DATEHEURE`),
  KEY `I_FK_COMMENTER_SITUATION` (`CODESITUATION`),
  KEY `I_FK_COMMENTER_PROFESSEUR` (`CODEUTILISATEUR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE IF NOT EXISTS `competence` (
  `CODECOMPETENCE` char(32) NOT NULL,
  `CODEACTIVITE` char(32) NOT NULL,
  `LIBELLE` text,
  PRIMARY KEY (`CODECOMPETENCE`),
  KEY `I_FK_COMPETENCE_ACTIVITE` (`CODEACTIVITE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `competence`
--

INSERT INTO `competence` (`CODECOMPETENCE`, `CODEACTIVITE`, `LIBELLE`) VALUES
('C1.1.1.1', 'A1.1.1', 'Recenser et caractériser les contextes d''utilisation, les processus et les acteurs sur lesquels le service à produire aura un impact'),
('C1.1.1.2', 'A1.1.1', 'Identifier les fonctionnalités attendues du service à produire'),
('C1.1.1.3', 'A1.1.1', 'Préparer sa participation à une réunion'),
('C1.1.1.4', 'A1.1.1', 'Rédiger un compte-rendu d''entretien, de réunion'),
('C1.1.2.1', 'A1.1.2', 'Analyser les interactions entre services'),
('C1.1.2.2', 'A1.1.2', 'Recenser les composants de l''architecture technique sur lesquels le service à produire aura un impact'),
('C1.1.3.1', 'A1.1.3', 'Recenser et caractériser les exigences liées à la qualité attendue du service à produire'),
('C1.1.3.2', 'A1.1.3', 'Recenser et caractériser les exigences de sécurité pour le service à produire'),
('C1.2.1.1', 'A1.2.1', 'Recenser et caractériser des solutions répondant au cahier des charges (adaptation d''une solution existante ou réalisation d''une nouvelle)'),
('C1.2.1.2', 'A1.2.1', 'Estimer le coût d''une solution'),
('C1.2.1.3', 'A1.2.1', 'Rédiger un dossier de choix et un argumentaire technique'),
('C1.2.2.1', 'A1.2.2', 'Recenser les composants nécessaires à la réalisation de la solution retenue'),
('C1.2.2.2', 'A1.2.2', 'Décrire l''implantation des différents composants de la solution et les échanges entre eux '),
('C1.2.2.3', 'A1.2.2', 'Rédiger les spécifications fonctionnelles et techniques de la solution retenue dans le formalisme exigé par l''organisation'),
('C1.2.3.1', 'A1.2.3', 'Recenser les risques liés à une mauvaise utilisation ou à une utilisation malveillante du service'),
('C1.2.3.2', 'A1.2.3', 'Recenser les risques liés à un dysfonctionnement du service'),
('C1.2.3.3', 'A1.2.3', 'Prévoir les conséquences techniques de la non prise en compte d''un risque'),
('C1.2.4.1', 'A1.2.4', 'Recenser les tests d''acceptation nécessaires à la validation du service et les résultats attendus'),
('C1.2.4.2', 'A1.2.4', 'Préparer les jeux d''essai et les procédures pour la réalisation des tests'),
('C1.2.5.1', 'A1.2.5', 'Recenser les utilisateurs du service, leurs rôles et leur niveau de responsabilité'),
('C1.2.5.2', 'A1.2.5', 'Recenser les ressources liées à l''utilisation du service'),
('C1.2.5.3', 'A1.2.5', 'Proposer les niveaux d''habilitation associés au service'),
('C1.3.1.1', 'A1.3.1', 'Mettre en place l''environnement de test du service'),
('C1.3.1.2', 'A1.3.1', 'Tester le service'),
('C1.3.1.3', 'A1.3.1', 'Rédiger le rapport de test'),
('C1.3.2.1', 'A1.3.2', 'Identifier les éléments à sauvegarder et à journaliser pour assurer la continuité du service et la traçabilité des transactions'),
('C1.3.2.2', 'A1.3.2', 'Spécifier les procédures d''alerte associées au service'),
('C1.3.2.3', 'A1.3.2', 'Décrire les solutions de fonctionnement en mode dégradé et les procédures de reprise du service'),
('C1.3.3.1', 'A1.3.3', 'Mettre en place l''environnement de formation au nouveau service'),
('C1.3.3.2', 'A1.3.3', 'Informer et former les utilisateurs'),
('C1.3.4.1', 'A1.3.4', 'Mettre au point une procédure d''installation de la solution'),
('C1.3.4.2', 'A1.3.4', 'Automatiser l''installation de la solution '),
('C1.3.4.3', 'A1.3.4', 'Mettre en exploitation le service'),
('C1.4.1.1', 'A1.4.1', 'Établir son planning personnel en fonction des exigences et du déroulement du projet'),
('C1.4.1.2', 'A1.4.1', 'Rendre compte de son activité'),
('C1.4.2.1', 'A1.4.2', 'Suivre l''exécution du projet'),
('C1.4.2.2', 'A1.4.2', 'Analyser les écarts entre temps prévu et temps consommé'),
('C1.4.2.3', 'A1.4.2', 'Contribuer à l''évaluation du projet'),
('C1.4.3.1', 'A1.4.3', 'Recenser les ressources humaines, matérielles, logicielles et budgétaires nécessaires à l''exécution du projet et de ses tâches personnelles'),
('C1.4.3.2', 'A1.4.3', 'Adapter son planning personnel en fonction des ressources disponibles'),
('C2.1.1.1', 'A2.1.1', 'Aider les utilisateurs dans l''appropriation du nouveau service'),
('C2.1.1.2', 'A2.1.1', 'Identifier des besoins de formation complémentaires'),
('C2.1.1.3', 'A2.1.1', 'Rendre compte de la satisfaction des utilisateurs'),
('C2.1.2.1', 'A2.1.2', 'Analyser les indicateurs de qualité du service'),
('C2.1.2.2', 'A2.1.2', 'Appliquer les procédures d''alerte destinées à rétablir la qualité du service'),
('C2.1.2.3', 'A2.1.2', 'Vérifier périodiquement le fonctionnement du service en mode dégradé et la disponibilité des éléments permettant une reprise du service'),
('C2.1.2.4', 'A2.1.2', 'Superviser les services et leur utilisation'),
('C2.1.2.5', 'A2.1.2', 'Contrôler la confidentialité et l''intégrité des données'),
('C2.1.2.6', 'A2.1.2', 'Exploiter les indicateurs et les fichiers d''audit'),
('C2.1.2.7', 'A2.1.2', 'Produire les rapports d''activité demandés par les différents acteurs'),
('C2.2.1.1', 'A2.2.1', 'Résoudre l''incident en s''appuyant sur une base de connaissances et la documentation associée ou solliciter l''entité compétente'),
('C2.2.1.2', 'A2.2.1', 'Prendre le contrôle d''un système à distance'),
('C2.2.1.3', 'A2.2.1', 'Rédiger un rapport d''incident et mémoriser l''incident et sa résolution dans une base de connaissances'),
('C2.2.1.4', 'A2.2.1', 'Faire évoluer une procédure de résolution d''incident'),
('C2.2.2.1', 'A2.2.2', 'Identifier le niveau d''assistance souhaité et proposer une réponse adaptée en s''appuyant sur une base de connaissances et sur la documentation associée ou solliciter l''entité compétente'),
('C2.2.2.2', 'A2.2.2', 'Informer l''utilisateur de la situation de sa demande'),
('C2.2.2.3', 'A2.2.2', 'Prendre le contrôle d''un poste utilisateur à distance'),
('C2.2.2.4', 'A2.2.2', 'Mémoriser la demande d''assistance et sa réponse dans une base de connaissances'),
('C2.2.3.1', 'A2.2.3', 'Appliquer la procédure de continuité du service en mode dégradé'),
('C2.2.3.2', 'A2.2.3', 'Appliquer la procédure de reprise du service'),
('C2.3.1.1', 'A2.3.1', 'Repérer une suite de dysfonctionnements récurrents d''un service'),
('C2.3.1.2', 'A2.3.1', 'Identifier les causes de ce dysfonctionnement'),
('C2.3.1.3', 'A2.3.1', 'Qualifier le problème (contexte et environnement)'),
('C2.3.1.4', 'A2.3.1', 'Définir le degré d''urgence du problème'),
('C2.3.1.5', 'A2.3.1', 'Évaluer les conséquences techniques du problème'),
('C2.3.2.1', 'A2.3.2', 'Décrire les incidences d''un changement proposé sur le service'),
('C2.3.2.2', 'A2.3.2', 'Évaluer le délai et le coût de réalisation du changement proposé'),
('C2.3.2.3', 'A2.3.2', 'Recenser les risques techniques, humains, financiers et juridiques associés au changement proposé'),
('C3.1.1.1', 'A3.1.1', 'Lister les composants matériels et logiciels nécessaires à la prise en charge des processus, des flux d''information et de leur rôle'),
('C3.1.1.2', 'A3.1.1', 'Caractériser les éléments d''interconnexion, les services, les serveurs et les équipements terminaux nécessaires'),
('C3.1.1.3', 'A3.1.1', 'Caractériser les éléments permettant d''assurer la qualité et la sécurité des services'),
('C3.1.1.4', 'A3.1.1', 'Recenser les modifications et/ou les acquisitions nécessaires à la mise en place d''une solution d''infrastructure compatible avec le budget et le planning prévisionnels'),
('C3.1.1.5', 'A3.1.1', 'Caractériser les solutions d''interconnexion utilisées entre un réseau et d''autres réseaux internes ou externes à l''organisation'),
('C3.1.2.1', 'A3.1.2', 'Concevoir une maquette de la solution'),
('C3.1.2.2', 'A3.1.2', 'Construire un prototype de la solution'),
('C3.1.2.3', 'A3.1.2', 'Préparer l''intégration d''un composant d''infrastructure'),
('C3.1.3.1', 'A3.1.3', 'Caractériser des solutions de sécurité et en évaluer le coût'),
('C3.1.3.2', 'A3.1.3', 'Proposer une solution de sécurité compatible avec les contraintes techniques, financières, juridiques et organisationnelles'),
('C3.1.3.3', 'A3.1.3', 'Décrire une solution de sécurité et les risques couverts'),
('C3.2.1.1', 'A3.2.1', 'Installer et configurer un élément d''interconnexion, un service, un serveur, un équipement terminal utilisateur'),
('C3.2.1.2', 'A3.2.1', 'Installer et configurer un élément d''infrastructure permettant d''assurer la continuité de service, un système de régulation des éléments d''infrastructure, un outil de métrologie, un dispositif d''alerte'),
('C3.2.1.3', 'A3.2.1', 'Installer et configurer des éléments de sécurité permettant d''assurer la protection du système informatique'),
('C3.2.2.1', 'A3.2.2', 'Élaborer une procédure de remplacement ou de migration respectant la continuité d''un service'),
('C3.2.2.2', 'A3.2.2', 'Mettre en œuvre une procédure de remplacement ou de migration'),
('C3.2.3.1', 'A3.2.3', 'Repérer les éléments de la documentation à mettre à jour'),
('C3.2.3.2', 'A3.2.3', 'Mettre à jour la documentation'),
('C3.3.1.1', 'A3.3.1', 'Installer et configurer des éléments d''administration sur site ou à distance'),
('C3.3.1.2', 'A3.3.1', 'Administrer des éléments d''infrastructure sur site ou à distance'),
('C3.3.2.1', 'A3.3.2', 'Installer et configurer des outils de sauvegarde et de restauration'),
('C3.3.2.2', 'A3.3.2', 'Définir des procédures de sauvegarde et de restauration'),
('C3.3.2.3', 'A3.3.2', 'Appliquer des procédures de sauvegarde et de restauration'),
('C3.3.3.1', 'A3.3.3', 'Identifier les besoins en gestion d''identité permettant de protéger les éléments d''une infrastructure'),
('C3.3.3.2', 'A3.3.3', 'Gérer des utilisateurs et une structure organisationnelle'),
('C3.3.3.3', 'A3.3.3', 'Affecter des droits aux utilisateurs sur les éléments d''une solution d''infrastructure'),
('C3.3.4.1', 'A3.3.4', 'Repérer les tâches d''administration à automatiser'),
('C3.3.4.2', 'A3.3.4', 'Concevoir, réaliser et mettre en place une procédure d''automatisation'),
('C3.3.5.1', 'A3.3.5', 'Installer et configurer les outils nécessaires à la production d''indicateurs d''activité et à l''exploitation de fichiers d''activité'),
('C3.3.5.2', 'A3.3.5', 'Assurer la confidentialité des informations collectées et traitées'),
('C4.1.1.1', 'A4.1.1', 'Identifier les composants logiciels nécessaires à la conception de la solution'),
('C4.1.1.2', 'A4.1.1', 'Estimer les éléments de coût et le délai de mise en œuvre de la solution'),
('C4.1.2.1', 'A4.1.2', 'Définir les spécifications de l''interface utilisateur de la solution applicative'),
('C4.1.2.2', 'A4.1.2', 'Maquetter un élément de la solution applicative'),
('C4.1.2.3', 'A4.1.2', 'Concevoir et valider la maquette en collaboration avec des utilisateurs'),
('C4.1.3.1', 'A4.1.3', 'Modéliser le schéma de données nécessaire à la mise en place de la solution applicative'),
('C4.1.3.2', 'A4.1.3', 'Implémenter le schéma de données dans un SGBD'),
('C4.1.3.3', 'A4.1.3', 'Programmer des éléments de la solution applicative dans le langage d''un SGBD'),
('C4.1.3.4', 'A4.1.3', 'Manipuler les données liées à la solution applicative à travers un langage de requête'),
('C4.1.4.1', 'A4.1.4', 'Recenser et caractériser les composants existants ou à développer utiles à la réalisation de la solution applicative dans le respect des budgets et planning prévisionnels'),
('C4.1.5.1', 'A4.1.5', 'Choisir les éléments de la solution à prototyper'),
('C4.1.5.2', 'A4.1.5', 'Développer un prototype'),
('C4.1.5.3', 'A4.1.5', 'Valider un prototype'),
('C4.1.6.1', 'A4.1.6', 'Mettre en place et exploiter un environnement de développement'),
('C4.1.6.2', 'A4.1.6', 'Mettre en place et exploiter un environnement de test'),
('C4.1.7.1', 'A4.1.7', 'Développer les éléments d''une solution'),
('C4.1.7.2', 'A4.1.7', 'Créer un composant logiciel'),
('C4.1.7.3', 'A4.1.7', 'Analyser et modifier le code d''un composant logiciel'),
('C4.1.7.4', 'A4.1.7', 'Utiliser des composants d''accès aux données'),
('C4.1.7.5', 'A4.1.7', 'Mettre en place des éléments de sécurité liés à l''utilisation d''un composant logiciel'),
('C4.1.8.1', 'A4.1.8', 'Élaborer et réaliser des tests unitaires'),
('C4.1.8.2', 'A4.1.8', 'Mettre en évidence et corriger les écarts'),
('C4.1.9.1', 'A4.1.9', 'Produire ou mettre à jour la documentation technique d''une solution applicative et de ses composants logiciels'),
('C4.1.10.1', 'A4.1.1', 'Rédiger la documentation d''utilisation, une aide en ligne, une FAQ'),
('C4.1.10.2', 'A4.1.1', 'Adapter la documentation d''utilisation à chaque contexte d''utilisation'),
('C4.2.1.1', 'A4.2.1', 'Élaborer un jeu d''essai permettant de reproduire le dysfonctionnement'),
('C4.2.1.2', 'A4.2.1', 'Repérer les composants à l''origine du dysfonctionnement'),
('C4.2.1.3', 'A4.2.1', 'Concevoir les mises à jour à effectuer'),
('C4.2.1.4', 'A4.2.1', 'Réaliser les mises à jour'),
('C4.2.2.1', 'A4.2.2', 'Repérer les évolutions des composants utilisés et leurs conséquences'),
('C4.2.2.2', 'A4.2.2', 'Concevoir les mises à jour à effectuer'),
('C4.2.2.3', 'A4.2.2', 'Élaborer et réaliser les tests unitaires des composants mis à jour'),
('C4.2.3.1', 'A4.2.3', 'Élaborer et réaliser des tests d''intégration et de non régression de la solution mise à jour'),
('C4.2.3.2', 'A4.2.3', 'Concevoir une procédure de migration et l''appliquer dans le respect de la continuité de service'),
('C4.2.4.1', 'A4.2.4', 'Repérer les éléments de la documentation à mettre à jour'),
('C4.2.4.2', 'A4.2.4', 'Mettre à jour une documentation'),
('C5.1.1.1', 'A5.1.1', 'Recenser les caractéristiques techniques nécessaires à la gestion des éléments de la configuration d''une organisation'),
('C5.1.1.2', 'A5.1.1', 'Paramétrer une solution de gestion des éléments d''une configuration'),
('C5.1.2.1', 'A5.1.2', 'Renseigner les événements relatifs au cycle de vie d''un élément de la configuration'),
('C5.1.2.2', 'A5.1.2', 'Actualiser les caractéristiques des éléments de la configuration'),
('C5.1.3.1', 'A5.1.3', 'Contrôler et auditer les éléments de la configuration'),
('C5.1.3.2', 'A5.1.3', 'Reconstituer un historique des modifications effectuées sur les éléments de la configuration'),
('C5.1.3.3', 'A5.1.3', 'Identifier les éléments de la configuration à modifier ou à remplacer'),
('C5.1.3.4', 'A5.1.3', 'Repérer les équipements obsolètes et en proposer le traitement dans le respect de la réglementation en vigueur'),
('C5.1.4.1', 'A5.1.4', 'Assister la maîtrise d''ouvrage dans l''analyse technique de la proposition de contrat'),
('C5.1.4.2', 'A5.1.4', 'Interpréter des indicateurs de suivi de la prestation associée à la proposition de contrat'),
('C5.1.4.3', 'A5.1.4', 'Renseigner les éléments permettant d''estimer la valeur du service'),
('C5.1.5.1', 'A5.1.5', 'Vérifier un plan d''amortissement'),
('C5.1.5.2', 'A5.1.5', 'Apprécier la valeur actuelle d''un élément de configuration'),
('C5.1.6.1', 'A5.1.6', 'Renseigner les variables d''une étude de rentabilité d''un investissement'),
('C5.1.6.2', 'A5.1.6', 'Caractériser et prévoir les investissements matériels et logiciels'),
('C5.2.1.1', 'A5.2.1', 'Évaluer le degré de conformité des pratiques à un référentiel, à une norme ou à un standard adopté par le prestataire informatique'),
('C5.2.1.2', 'A5.2.1', 'Identifier et partager les bonnes pratiques à intégrer'),
('C5.2.2.1', 'A5.2.2', 'Définir une stratégie de recherche d''informations'),
('C5.2.2.2', 'A5.2.2', 'Tenir à jour une liste de sources d''information'),
('C5.2.2.3', 'A5.2.2', 'Évaluer la qualité d''une source d''information en fonction d''un besoin'),
('C5.2.2.4', 'A5.2.2', 'Synthétiser et diffuser les résultats d''une veille'),
('C5.2.3.1', 'A5.2.3', 'Identifier les besoins de formation pour mettre en œuvre une technologie, un composant, un outil ou une méthode'),
('C5.2.3.2', 'A5.2.3', 'Repérer l''offre et les dispositifs de formation'),
('C5.2.4.1', 'A5.2.4', 'Se documenter à propos d‘une technologie, d''un composant, d''un outil ou d''une méthode'),
('C5.2.4.2', 'A5.2.4', 'Identifier le potentiel et les limites d''une technologie, d''un composant, d''un outil ou d''une méthode par rapport à un service à produire');

-- --------------------------------------------------------

--
-- Structure de la table `correspondre`
--

CREATE TABLE IF NOT EXISTS `correspondre` (
  `CODEPARCOURS` char(32) NOT NULL,
  `CODEACTIVITE` char(32) NOT NULL,
  PRIMARY KEY (`CODEPARCOURS`,`CODEACTIVITE`),
  KEY `I_FK_CORRESPONDRE_PARCOURS` (`CODEPARCOURS`),
  KEY `I_FK_CORRESPONDRE_ACTIVITE` (`CODEACTIVITE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `encadrer`
--

CREATE TABLE IF NOT EXISTS `encadrer` (
  `CODEPROMOTION` char(32) NOT NULL,
  `MAILLOGIN` varchar(32) NOT NULL,
  PRIMARY KEY (`CODEPROMOTION`,`MAILLOGIN`),
  KEY `I_FK_ENCADRER_PROMOTION` (`CODEPROMOTION`),
  KEY `I_FK_ENCADRER_PROFESSEUR` (`MAILLOGIN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `encadrer`
--

INSERT INTO `encadrer` (`CODEPROMOTION`, `MAILLOGIN`) VALUES
('1', 'prof@prof.fr'),
('2', 'prof@prof.fr');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `MAILLOGIN` varchar(32) NOT NULL,
  `CODEPROMOTION` char(32) NOT NULL,
  PRIMARY KEY (`MAILLOGIN`),
  KEY `I_FK_ETUDIANT_PROMOTION` (`CODEPROMOTION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`MAILLOGIN`, `CODEPROMOTION`) VALUES
('etu@etu.fr', '1'),
('etu2@etu2.fr', '2');

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

CREATE TABLE IF NOT EXISTS `localisation` (
  `CODELOC` char(3) NOT NULL,
  PRIMARY KEY (`CODELOC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mettre_en_oeuvre`
--

CREATE TABLE IF NOT EXISTS `mettre_en_oeuvre` (
  `CODESITUATION` char(32) NOT NULL,
  `CODEACTIVITE` char(32) NOT NULL,
  `REFORMULATION` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODESITUATION`,`CODEACTIVITE`),
  KEY `I_FK_METTRE_EN_OEUVRE_SITUATION` (`CODESITUATION`),
  KEY `I_FK_METTRE_EN_OEUVRE_ACTIVITE` (`CODEACTIVITE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE IF NOT EXISTS `parcours` (
  `CODEPARCOURS` char(32) NOT NULL,
  `LIBELLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODEPARCOURS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `parcours`
--

INSERT INTO `parcours` (`CODEPARCOURS`, `LIBELLE`) VALUES
('1', 'SLAM'),
('2', 'SISR');

-- --------------------------------------------------------

--
-- Structure de la table `processus`
--

CREATE TABLE IF NOT EXISTS `processus` (
  `CODEPROCESSUS` char(32) NOT NULL,
  `LIBELLE` text NOT NULL,
  PRIMARY KEY (`CODEPROCESSUS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `processus`
--

INSERT INTO `processus` (`CODEPROCESSUS`, `LIBELLE`) VALUES
('P1', 'Production de services'),
('P2', 'Fourniture de services'),
('P3', 'Conception et maintenance de solutions d''infrastructure'),
('P4', 'Conception et maintenance de solutions applicatives'),
('P5', 'Gestion du patrimoine informatique');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE IF NOT EXISTS `professeur` (
  `MAILLOGIN` varchar(32) NOT NULL,
  `ESTADMINISTRATEUR` tinyint(1) NOT NULL,
  PRIMARY KEY (`MAILLOGIN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`MAILLOGIN`, `ESTADMINISTRATEUR`) VALUES
('prof@prof.fr', 0);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `CODEPROMOTION` char(32) NOT NULL,
  `CODEPARCOURS` char(32) NOT NULL,
  `NOM` char(32) DEFAULT NULL,
  `ANNEE` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODEPROMOTION`),
  KEY `I_FK_PROMOTION_PARCOURS` (`CODEPARCOURS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `promotion`
--

INSERT INTO `promotion` (`CODEPROMOTION`, `CODEPARCOURS`, `NOM`, `ANNEE`) VALUES
('1', '1', 'SLAM2014', '2014'),
('2', '2', 'SISR2014', '2014');

-- --------------------------------------------------------

--
-- Structure de la table `rel_6`
--

CREATE TABLE IF NOT EXISTS `rel_6` (
  `CODEOBLIGATIONSITUATION` char(32) NOT NULL,
  `CODESITUATION` char(32) NOT NULL,
  PRIMARY KEY (`CODEOBLIGATIONSITUATION`,`CODESITUATION`),
  KEY `I_FK_REL_6_SITUATION_OBLIGATOIRE` (`CODEOBLIGATIONSITUATION`),
  KEY `I_FK_REL_6_SITUATION` (`CODESITUATION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `situation`
--

CREATE TABLE IF NOT EXISTS `situation` (
  `CODESITUATION` char(32) NOT NULL,
  `CODETYPESITUATION` char(32) NOT NULL,
  `CODESOURCE` char(32) NOT NULL,
  `CODECADRE` char(32) NOT NULL,
  `CODELOC` char(3) NOT NULL,
  `CODEUTILISATEUR` char(32) NOT NULL,
  `LIBELLE` char(32) NOT NULL,
  `DESCRIPTION` char(32) NOT NULL,
  `CONTEXTE` char(32) DEFAULT NULL,
  `DATEDEBUT` date NOT NULL,
  `DATEFIN` date NOT NULL,
  `ENVIRONNEMENTTECHNOLOGIQUE` char(32) DEFAULT NULL,
  `MOYENS` char(32) DEFAULT NULL,
  `AVISPERSONNEL` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODESITUATION`),
  KEY `I_FK_SITUATION_TYPE_SITUATION` (`CODETYPESITUATION`),
  KEY `I_FK_SITUATION_SOURCE` (`CODESOURCE`),
  KEY `I_FK_SITUATION_SITUATION_CADRE` (`CODECADRE`),
  KEY `I_FK_SITUATION_ETUDIANT` (`CODEUTILISATEUR`),
  KEY `I_FK_SITUATION_LOCALISATION` (`CODELOC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `situation_cadre`
--

CREATE TABLE IF NOT EXISTS `situation_cadre` (
  `CODECADRE` char(32) NOT NULL,
  `LIBELLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODECADRE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `situation_obligatoire`
--

CREATE TABLE IF NOT EXISTS `situation_obligatoire` (
  `CODEOBLIGATIONSITUATION` char(32) NOT NULL,
  `LIBELLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODEOBLIGATIONSITUATION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `situation_production`
--

CREATE TABLE IF NOT EXISTS `situation_production` (
  `CODEPRODUCTION` char(32) NOT NULL,
  `CODESITUATION` char(32) NOT NULL,
  `DESIGNATION` char(32) DEFAULT NULL,
  `URL` char(200) DEFAULT NULL,
  PRIMARY KEY (`CODEPRODUCTION`),
  KEY `I_FK_SITUATION_PRODUCTION_SITUATION` (`CODESITUATION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `source`
--

CREATE TABLE IF NOT EXISTS `source` (
  `CODESOURCE` char(32) NOT NULL,
  `CODETYPESOURCE` char(32) NOT NULL,
  `LIBELLE` char(32) NOT NULL,
  PRIMARY KEY (`CODESOURCE`),
  KEY `I_FK_SOURCE_TYPESOURCE` (`CODETYPESOURCE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typesource`
--

CREATE TABLE IF NOT EXISTS `typesource` (
  `CODETYPESOURCE` char(32) NOT NULL,
  `LIBELLE` char(32) NOT NULL,
  PRIMARY KEY (`CODETYPESOURCE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_situation`
--

CREATE TABLE IF NOT EXISTS `type_situation` (
  `CODETYPESITUATION` char(32) NOT NULL,
  `LIBELLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODETYPESITUATION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `MAILLOGIN` varchar(100) NOT NULL,
  `NOM` char(32) NOT NULL,
  `PRENOM` char(32) NOT NULL,
  `MDP` char(128) NOT NULL,
  `AVATAR` mediumblob NOT NULL,
  `estSupprimer` tinyint(1) NOT NULL,
  PRIMARY KEY (`MAILLOGIN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`MAILLOGIN`, `NOM`, `PRENOM`, `MDP`, `AVATAR`, `estSupprimer`) VALUES
('etu@etu.fr', 'etudiant', 'etudiant', '', '', 0),
('etu2@etu2.fr', 'etudiant2', 'etudiant2', '', '', 0),
('prof@prof.fr', 'prof', 'prof', '', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

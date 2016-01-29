<h1>Déconnection</h1>
<?php 
	session_destroy();
	header('location: ./accueil');
?>
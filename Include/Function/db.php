<?php
	function db_connect() 
	{
		try
		{
			$host = 	'localhost';
			$dbname = 	'gestcomp';
			$user = 	'root';
			$password = '';

			$db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $password);
			return $db;
		}catch (Exception $e)
		{
			die('Erreur de connexion : ' . $e->getMessage());
		}
	}
?>
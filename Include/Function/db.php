<?php
	function db_connect() 
	{
		try
		{
			if($_SERVER['SERVER_NAME'] == 'gestcomp.shagril.tk')
			{
				$host = 	'mysql.hostinger.fr';
				$dbname = 	'u134009753_gestc';
				$user = 	'u134009753_gestc';
				$password = 'lxi0xlly';
			}
			else
			{
				$host = 	'localhost';
				$dbname = 	'gestcomp';
				$user = 	'root';
				$password = '';
			}
			$db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $password);
			return $db;
		}catch (Exception $e)
		{
			die('Erreur de connexion : ' . $e->getMessage());
		}
	}
?>
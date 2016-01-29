<?php 
	session_start();

	function Connected() {
		if(isset($_SESSION['id']))
			return ($_SESSION['id'] != 0);
		else
		return false;
	}
	
	function Admin() {
		return ($_SESSION['acces'] == 0);
	}
	
	function age($date) {
		$now = new DateTime();
		$birthday = new DateTime($date);
		$age = $birthday->diff($now)->format('%y');
		return $age;
	}
?>
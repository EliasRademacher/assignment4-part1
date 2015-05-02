<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
header('Content-Type: text/html');

session_start(); /* Store session on a cookie */

if (isset($_GET['logout']) and $_GET['logout'] == 1) {
	$_POST = array();
	$_SESSION = array();
	session_destroy();
	header("Location: http://web.engr.oregonstate.edu/~rademace/assignment4-part1/src/login.php", true);
	die();
}
	
if (session_status() == PHP_SESSION_ACTIVE
	and 
	(isset($_POST['username']) and strlen($_POST['username']) != 0)
	or isset($_SESSION['loggedIn'])) {
	
	if (isset($_POST['username']))
		$_SESSION['name'] = $_POST['username'];
	
	if (!isset($_SESSION['loggedIn']))
		$_SESSION['loggedIn'] = true;
	
	$_visits = 'visits_' . $_SESSION['name'];
	
	if (!isset($_SESSION[$_visits]))
		$_SESSION[$_visits] = -1;
	
	$_SESSION[$_visits]++;
	
	
	echo "Hello $_SESSION[name], you have visited this page $_SESSION[$_visits] times before.  <br>
		Click <a href='http://web.engr.oregonstate.edu/~rademace/assignment4-part1/src/content1.php?logout=1'>here</a> to logout.<br>";

	echo "<br>Click <a href='http://web.engr.oregonstate.edu/~rademace/assignment4-part1/src/content2.php'>here</a> to visit page 2<br>";
	
}

else if (!isset($_POST['username'])
	or strlen($_POST['username']) == 0) {
		
	echo 'A username must be entered.<br>
		Click <a href="http://web.engr.oregonstate.edu/~rademace/assignment4-part1/src/login.php">here</a>
		to return to the login screen.<br>';
}



?>
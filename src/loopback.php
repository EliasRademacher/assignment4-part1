<html>
	<head>
		<title>Loopback</title>
	</head>
	<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$input = array();
$JSON_string = '{"Type":';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (empty($_GET)) {
		$JSON_string = $JSON_string . '"GET","parameters": null }';
		echo "$JSON_string<br>";
	}
	else {
		$JSON_string = $JSON_string . '"GET","parameters": ';
		$input = $_GET;
		$JSON_string = $JSON_string . json_encode($input) . '}';
		echo "$JSON_string<br>";
	}	
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($_POST)) {
		$JSON_string = $JSON_string . '"POST","parameters": null }';
		echo "$JSON_string<br>";	
	}
	else {
		$JSON_string = $JSON_string . '"POST","parameters": ';
		$input = $_POST;
		$JSON_string = $JSON_string . json_encode($input) . '}';
		echo "$JSON_string<br>";	
	}	
}


?>
	</body>
</html>
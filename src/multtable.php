<html>
 <head>
  <title>Mult. Table</title>
 </head>
<body>
	<form method="get">
		<p>min-multiplicand: <input type="text" name="min-multiplicand" /></p>
		<p>max-multiplicand: <input type="text" name="max-multiplicand" /></p>
		<p>min-multiplier: <input type="text" name="min-multiplier" /></p>
		<p>max-multiplier: <input type="text" name="max-multiplier" /></p>
		<p><input type="submit" /></p>
	</form>
	
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$valid = true;

if(!isset($_GET['min-multiplicand'])
	or strlen($_GET['min-multiplicand']) == 0) {
	echo 'Waiting for input: min-multiplicand<br>';
	$valid = false;
}

else if(!is_numeric($_GET['min-multiplicand'])) {
	echo "min-multiplicand must be an integer.<br>";
	$valid = false;
}

if (!isset($_GET['max-multiplicand'])
	or strlen($_GET['max-multiplicand']) == 0) {
	echo 'Waiting for input: max-multiplicand<br>';
	$valid = false;
}

else if(!is_numeric($_GET['max-multiplicand'])) {
	echo "max-multiplicand must be an integer.<br>";
	$valid = false;
}

else if ($_GET['min-multiplicand'] > $_GET['max-multiplicand']) {
	echo  "Minimum multiplicand larger than maximum.<br>";
	$valid = false;
}




if (!isset($_GET['min-multiplier'])
	or strlen($_GET['min-multiplier']) == 0) {
	echo 'Waiting for input: min-multiplier<br>';
	$valid = false;
}

else if(!is_numeric($_GET['min-multiplier'])) {
	echo "min-multiplier must be an integer.<br>";
	$valid = false;
}

if (!isset($_GET['max-multiplier'])
	or strlen($_GET['max-multiplier']) == 0) {
	echo 'Waiting for input: max-multiplier<br>';
	$valid = false;
}

else if(!is_numeric($_GET['max-multiplier'])) {
	echo "max-multiplier must be an integer.<br>";
	$valid = false;
}

else if ($_GET['min-multiplier'] > $_GET['max-multiplier']) {
	echo  "Minimum multiplier larger than maximum.<br>";
	$valid = false;
}

if ($valid) {
	echo '<table border="1">';
	for ($row = $_GET['min-multiplicand']; $row <= $_GET['max-multiplicand'] - $_GET['min-multiplicand'] + 2; $row++) {
		echo '<tr>';
		for ($col = $_GET['min-multiplier']; $col <= $_GET['max-multiplier'] - $_GET['min-multiplier'] + 2; $col++) {
			if (($row == $_GET['min-multiplicand']) and ($col == $_GET['min-multiplier'])) {
				echo '<td>';
				echo '';
				echo '</td>';				
			}

			else if ($row == $_GET['min-multiplicand']) {
				echo '<th>';
				$colHeader = $col - 1;
				echo "$colHeader";
				echo '</th>';
			}
			
			else if($col == $_GET['min-multiplier']) {
				echo '<th>';
				$rowHeader = $row - 1;
				echo "$rowHeader";
				echo '</th>';
			}
				
			else {
				echo '<td>';
				$product = ($row - 1)*($col - 1);
				echo "$product";
				echo '</td>';				
			}
		}
		echo '<tr>';
	}
	echo '</table>';
}
	
?>
	</body>
</html>







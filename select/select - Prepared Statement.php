<?php

// *************************** //
// Select - prepared statement 
// *************************** //

// Use the following syntax:

$q = 'SELECT lastname, email FROM users WHERE user_id > ? AND firstname = ?';
$id_greater_than = 5;
$firstname = 'John';
 
/* Prepare statement */
$stmt = $dbc->prepare($q);
if($stmt === false){
	trigger_error('Wrong SQL: ' . $q . ' Error: ' . $dbc->error, E_USER_ERROR);
}
 
/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
$stmt->bind_param('is', $id_greater_than, $firstname);
 
/* Execute statement */
$stmt->execute();

// ------------------------- //
// Iterate over results
// ------------------------- //
	
$stmt->bind_result($lastname, $email);
while($stmt->fetch()){
	echo $lastname . ', ' . $email . '<br>';
}

// ------------------------- //
// Store all values to array
// ------------------------- //
	
$r = $stmt->get_result();
$arr = $r->fetch_all(MYSQLI_ASSOC);

// ------------------------- //
// Close statement
// ------------------------- //
	
$stmt->close();


// ******************************************************* //
// 						Example
// ******************************************************* //


$dbc = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

if($dbc->connect_error) {
	trigger_error('Database connection failed: '  . $dbc->connect_error, E_USER_ERROR);
}

$q = 'SELECT user_id, user_name, password FROM users WHERE user_id > ?';
$id_greater_than = 10;
 
$stmt = $dbc->prepare($q);
if($stmt === false){
	trigger_error('Wrong SQL: ' . $q . ' Error: ' . $dbc->error, E_USER_ERROR);
}

$stmt->bind_param('i', $id_greater_than);

$stmt->execute();

$r = $stmt->get_result();
$arr = $r->fetch_all(MYSQLI_ASSOC);

foreach ($arr as $a)
{
	echo '<pre>';
	print_r($a);
	echo '</pre>';
}
	
$stmt->close();



?>

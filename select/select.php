<?php

// Added for experimental reasons part 4

// Use the following syntax:

$q = 'SELECT col1, col2, col3 FROM table1 WHERE condition';
 
$r = $dbc->query($q);
 
if($r === false) {
	trigger_error('Wrong SQL: ' . $q . ' Error: ' . $dbc->error, E_USER_ERROR);
}else{
	// Gets the number of rows in a result
	$rows_returned = $r->num_rows;
}

// ---------------------- //
// Iterate over recordset
// ---------------------- //

// Using column index				~~~~ fetch_row(), with column number order  (eg: 0, 1, ...)
	
$r->data_seek(0);
while($row = $r->fetch_row()){
    echo $row[0] . '<br>';
}

// Using column names - recommended	~~~~ fetch_assoc(), with column names (eg: user_id, user_name, ...)
	
$r->data_seek(0);					// Adjusts the result pointer to an arbitrary row in the result
while($row = $r->fetch_assoc()){
    echo $row['col1'] . '<br>';
}

// -------------------------- //
// Store row values to array
// -------------------------- //

// 1 - The following example will return an array with first row (using $rs->data_seek(n); we can get any row).

// 2 - Using MYSQLI_ASSOC an associated array is returned, MYSQLI_NUM an enumerated one and MYSQLI_BOTH both of them

$r = $dbc->query($q);
 
if($r === false){
	trigger_error('Wrong SQL: ' . $q . ' Error: ' . $dbc->error, E_USER_ERROR);
}else{
	$r->data_seek(0);
	$arr = $r->fetch_array(MYSQLI_ASSOC);
}

// -------------------------- //
// Store all values to array
// -------------------------- //

// Using MYSQLI_ASSOC an associated array is returned, MYSQLI_NUM an enumerated one and MYSQLI_BOTH both of them

$r = $dbc->query($q);
 
if($r === false) {
	trigger_error('Wrong SQL: ' . $q . ' Error: ' . $dbc->error, E_USER_ERROR);
}else{
	$arr = $r->fetch_all(MYSQLI_ASSOC);
}

foreach($arr as $row) {
	echo $row['co1'];
}


// ******************************************************* //
// 						Example
// ******************************************************* //

$DBServer = 'db33.grserver.gr'; // e.g 'localhost' or '192.168.1.100'
$DBUser   = 'foituseradmi';
$DBPass   = '159spitaki823student';
$DBName   = 'foititospitodbnewapp';

$dbc = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

if($dbc->connect_error) {
	trigger_error('Database connection failed: '  . $dbc->connect_error, E_USER_ERROR);
}

$q = 'SELECT user_id, user_name, password FROM users WHERE user_id > 10';

$r = $dbc->query($q);
 
if($r === false) {
	trigger_error('Wrong SQL: ' . $q . ' Error: ' . $dbc->error, E_USER_ERROR);
}else{
	$arr = $r->fetch_all(MYSQLI_ASSOC);
}

foreach($arr as $row) {
	echo $row['user_id'].' - '.$row['user_name'].' - '.$row['password'];
}


?>
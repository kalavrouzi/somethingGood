<?php

//Define connection parameters:
	
$DBServer = 'server name or IP address'; // e.g 'localhost' or '192.168.1.100'
$DBUser   = 'DB_USER';
$DBPass   = 'DB_PASSWORD';
$DBName   = 'DB_NAME';

// ******************************************************* //
// Connection using the object oriented way (RECOMMENDED)
// ******************************************************* //
	
$dbc = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
 
// check connection
if($dbc->connect_error) {
	trigger_error('Database connection failed: '  . $dbc->connect_error, E_USER_ERROR);
}

// ******************************************************* //
// Connection using the procedural way (NOT RECOMMENDED)
// ******************************************************* //
	
$dbc = mysqli_connect($DBServer, $DBUser, $DBPass, $DBName);
 
// check connection
if(mysqli_connect_errno()) {
	trigger_error('Database connection failed: '  . mysqli_connect_error(), E_USER_ERROR);
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

?>
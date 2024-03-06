<?php
/*
 * Skapar databaskopplingen
*/

function dbConnect()
{
	// https://stackoverflow.com/questions/40075065/using-docker-i-get-the-error-sqlstatehy000-2002-no-such-file-or-directory
	$servername = "db";
	$username = "root";
	$password = "example";
	$dbname = "db";
	try {
		$connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $connection;
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
}

/*
* stänger databaskopplingen
*/
function dbDisconnect($connection)
{
	$connection = null;
}

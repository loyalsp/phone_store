<?php
// to make db connection
function get_db_connection()
{
	$dbhost = 'localhost:3306/';
	$dbuser = 'root';
	$dbpass = '';
	$database = 'online_orders';
	$dbConnection = mysqli_connect ( $dbhost, $dbuser, $dbpass, $database );
	return $dbConnection;
}
// to close db connection
function close_the_connection($connection)
{
	mysqli_close ($connection);
}
?>
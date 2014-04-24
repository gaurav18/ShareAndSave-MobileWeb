<?php

	$dbhost = 'localhost:3036';
	$dbuser = 'root';
	$dbpass = 'mas';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}

	$user_name = $_POST['user_name'];
	$user_address = $_POST['user_address'];
	$user_frequency = $_POST['user_frequency'];
	$user_distance = $_POST['user_distance'];

	$sql = "UPDATE user ".
	       "SET address = '$user_address', frequency = '$user_frequency', distance = '$user_distance' ".
	       "WHERE username = '$user_name'" ;

	mysql_select_db('mas');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not update data: ' . mysql_error());
	}
	mysql_close($conn);
	header( 'Location: preferences.php' ) ;
	?>
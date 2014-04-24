<?php
session_start();
$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = 'mas';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$user_name = $_POST['user_name'];
$event_id = $_POST['event_id'];



$sql = "SELECT uid ".
       "FROM user ".
       "WHERE username = '$user_name'";

mysql_select_db('mas');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

$row = mysql_fetch_array($retval, MYSQL_ASSOC);

if ($row != null) {
	$uid = $row['uid'];
	$val = 'false';

	$sql1 = "Insert into attendance (event_name, user_name, reminded) ".
	       "values ($event_id,$uid,'$val')";

	$retval1 = mysql_query( $sql1, $conn );
	if(! $retval1 )
	{
	  die('Could not get data: ' . mysql_error());
	}
}
mysql_close($conn);
header( 'Location: home.php' );
?>
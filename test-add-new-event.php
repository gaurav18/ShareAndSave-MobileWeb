<?php 
$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = 'mas';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$date = date_create();
$time = date_timestamp_get($date);

$event_name = 'Testing Event';
$event_address = 'Test address';

$sql = "INSERT INTO events ".
       "(event_name, location, event_date) ".
       "VALUES('$event_name','$event_address', '$time')";

mysql_select_db('mas');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
mysql_close($conn);
?>
<?php

$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = 'mas';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$event_name = $_POST['event_name'];
$event_loc = $_POST['event_location'];
$event_desc = $_POST['event_desc'];
$date = $_POST['event_date'];
$event_date = strtotime($date);
$lat = $_POST['event_latitude'];
$long = $_POST['event_longitude'];

$sql = "INSERT INTO events ".
       "(event_name, description, location, map_loc_x, map_loc_y, event_date) ".
       "VALUES('$event_name','$event_desc','$event_loc', '$lat', '$long', '$event_date')";
mysql_select_db('mas');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
mysql_close($conn);
echo "Success\n";
?>
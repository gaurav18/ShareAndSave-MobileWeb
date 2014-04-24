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
$user_pwd = $_POST['user_pwd'];
$user_grp = $_POST['user_grp'];
$user_email = $_POST['user_email'];

echo $user_name;

$sql = "INSERT INTO user ".
       "(username, password, email, address, bloodgroup) ".
       "VALUES('$user_name','$user_pwd','$user_email', '$user_address', '$user_grp')";
mysql_select_db('mas');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
mysql_close($conn);
header( 'Location: index.php' ) ;
?>
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
$user_pwd = $_POST['user_pwd'];

$sql = "SELECT password ".
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

	if ($row['password']==$user_pwd) {
		$_SESSION['user']=$user_name;
	}
}
mysql_close($conn);
if(isset($_SESSION['user'])) {
	header( 'Location: home.php' ) ;
}
else {
	session_destroy();
	header( 'Location: index.php' ) ;
}
?>
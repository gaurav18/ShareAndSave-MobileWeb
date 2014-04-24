<?php
$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = 'mas';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
$today = getdate();
$d = $today[mday];
$m = $today[mon];
$y = $today[year];
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$sql = "SELECT * FROM attendance";

mysql_select_db('mas');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    if ( $row['reminded']=='true') {
    	// Do nothing
    }
    else {
    	$event_name = $row['event_name'];
    	$sql1 = "SELECT * FROM events ".
    	"WHERE id = '$event_name'";


    	$retval_event = mysql_query( $sql1, $conn );
		if(! $retval_event )
		{
		  die('Could not get data: ' . mysql_error());
		}

		$row_event = mysql_fetch_array($retval_event, MYSQL_ASSOC);
		
		if ($row_event != null) {
			$timestamp = $row_event['event_date'];
			$event_name_real = $row_event['event_name'];
		
			$nowtime = getdate($timestamp);
			if (($nowtime[mday] - $d <= 2) && ($nowtime[mon] == $m)) {
				$user_name = $row['user_name'];
				
				$sql2 = "SELECT * FROM user ".
		    	"WHERE uid = '$user_name'";

		    	$retval_user = mysql_query( $sql2, $conn );
				if(! $retval_user )
				{
				  die('Could not get data: ' . mysql_error());
				}

				$row_user = mysql_fetch_array($retval_user, MYSQL_ASSOC);
				if ($row_user != null) {

					$email_to = $row_user['email'];
					
					$email_from = 'narang.gaurav18@gmail.com';
					$subject = 'Share and Save';
					$event_date = date('m/d/y', $timestamp);
					$message = "Please come donate blood at '$event_name_real' on '$event_date'";
					mail($email_to,$subject,$message,"From: $email_from\n");
					
					$att_id = $row['id'];
					$sql3 = "Update attendance ".
					"set reminded = 'true' ".
			    	"WHERE id = '$att_id'";

			    	$retval_att = mysql_query( $sql3, $conn );
					if(! $retval_att)
					{
					  die('Could not get data: ' . mysql_error());
					}
				}
			}
		}
		else {
			echo 'No Event found ';
			echo "\n";
		}
    }
    echo "\n";
} 

mysql_close($conn);
?>
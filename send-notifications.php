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

$sql = "SELECT * FROM user";

mysql_select_db('mas');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
	$sql1 = "SELECT * FROM events";

	$retval_event = mysql_query( $sql1, $conn );
	if(! $retval_event )
	{
	  die('Could not get data: ' . mysql_error());
	}

	while ($row_event = mysql_fetch_array($retval_event, MYSQL_ASSOC) ) {

		$user_id = $row['uid'];
		$event_id = $row_event['id'];
		$sql2 = "SELECT * FROM notifications ".
		"WHERE user_name = '$user_id' AND event_name = '$event_id'";

    	$retval_notif = mysql_query($sql2, $conn );
		if(! $retval_notif )
		{
		  die('Could not get data: ' . mysql_error());
		}

		$row_notif = mysql_fetch_array($retval_notif, MYSQL_ASSOC);

		if ($row_notif != null) {
			// Do nothing
		}
		else {
			// check if sending conditions are matched
			$send = false;
			if ($row['last_donated'] != null) {
				$last_time = $row['last_donated'];
				$event_time = $row_event['event_date'];	

				$time = floor(($event_time - $last_time)/360/24/30);
				if ($time >= $row['frequency']) {
					$send = true;
				}
			}
			else {
				$send = true;
			}

			if ($send == true) {
				$email_to = $row['email'];
				$email_from = 'narang.gaurav18@gmail.com';
				$subject = 'Share and Save. Blood donation event match';
				$event_date = date('m/d/y', $row_event['event_date']);
				$event_name_real = $row_event['event_name'];
				$loc = $row_event['location'];
				$info = $row_event['description'];
				$message = "Please come donate blood at '$event_name_real' on '$event_date'. This blood donation drive is held at '$loc'. More info: ".$info;
				mail($email_to,$subject,$message,"From: $email_from\n");

				$sql3 = "Insert into notifications (event_name, user_name, sent)".
				"values ($event_id, $user_id, 'true')";

		    	$retval_att = mysql_query( $sql3, $conn );
				if(! $retval_att)
				{
				  die('Could not get data: ' . mysql_error());
				}
			}
		}
	}
    echo "\n";
} 

mysql_close($conn);
?>
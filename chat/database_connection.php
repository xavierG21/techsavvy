<?php
	
	//LOCAL HOSTING
	$servername = "localhost";
	$password = "";
	$username = "root";
	$dbname = "reservation";
	$con = mysqli_connect($servername, $username, $password, $dbname);

	/*
 	// LIVE HOSTING 
 	$servername = "sql311.epizy.com";
	$password = "rasUNo5zI4z1";
	$username = "epiz_28031517";
	$dbname = "epiz_28031517_TechsavvyISP";
	$con = mysqli_connect($servername, $username, $password, $dbname);
	XAAXAXAXX*/


$connect = new PDO("mysql:host=localhost;dbname=reservation", "root", "");
date_default_timezone_set('Europe/Zagreb');
// // // // // // // // // // // // // // // // // // //

function fetch_user_last_activity($user_id, $connect){
	$query = "SELECT * FROM login_details WHERE user_id = '$user_id' ORDER BY last_activity DESC LIMIT 1";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row) {
		return $row['last_activity'];
	}
}

function fetch_user_chat_history($from_user_id, $to_user_id, $connect){
	$query = "SELECT * FROM chat_message WHERE (from_user_id = '".$from_user_id."' AND to_user_id = '".$to_user_id."') OR (from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."') ORDER BY timestamp DESC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<ul class="list-unstyled">';
		foreach($result as $row){
			$user_name = '';
			if($row["from_user_id"] == $from_user_id){
				$user_name = '<b class="text-success">You</b>';
			} else {
				$user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
			}
			$output .= '
		  <li style="border-bottom:1px dotted #ccc">
		   <p>'.$user_name.' - '.$row["chat_message"].'
			<div align="right">
			 - <small><em>'.$row['timestamp'].'</em></small>
			</div>
		   </p>
		  </li>
		  ';
		}
	$output .= '</ul>';
	return $output;
}

function get_user_name($user_id, $connect){
	$query = "SELECT username FROM login WHERE user_id = '$user_id'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row){
		return $row['username'];
	}
}

function count_unseen_message($from_user_id, $to_user_id, $connect){
	$query = "SELECT * FROM chat_message WHERE from_user_id = '$from_user_id' AND to_user_id = '$to_user_id' AND status = '1'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
	$output = '';
	if($count > 0){
		$output = '<span class="label label-success">'.$count.'</span>';
	}
	return $output;
}

?>
<?php
$users = array();
for ($i=1; $i <= 20; $i++) { 
	$user = array("user" => "user".$i, "pass" => "pass".$i);
	$users[$i] = $user;
}

for ($i=20; $i > 0 ; $i--) {
	echo "username = ".$users[$i]["user"]." - password = ".$users[$i]["pass"]."\n";
}
/*
Dans la console :
username = user20 - password = pass20
username = user19 - password = pass19
username = user18 - password = pass18
username = user17 - password = pass17
username = user16 - password = pass16
username = user15 - password = pass15
username = user14 - password = pass14
username = user13 - password = pass13
username = user12 - password = pass12
username = user11 - password = pass11
username = user10 - password = pass10
username = user9 - password = pass9
username = user8 - password = pass8
username = user7 - password = pass7
username = user6 - password = pass6
username = user5 - password = pass5
username = user4 - password = pass4
username = user3 - password = pass3
username = user2 - password = pass2
username = user1 - password = pass1
*/
?>
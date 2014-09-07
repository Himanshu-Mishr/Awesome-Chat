<?php

# set status to 'no'
require "connection.php";
$str="update users set status='no' where username='".$_COOKIE['nickname']."' and chat_id='".$_COOKIE['room']."';";
mysqli_query($con, $str);

# if all users with that chat_id are no then 
# 1 ) drop that chat table 
# 2 ) and remove that entries from users table
require "connection.php";
$str="select status from users where chat_id='".$_COOKIE['room']."'";
$result=mysqli_query($con, $str);
$status_flag=0;
while ($row=mysqli_fetch_array($result)) {
	if ($row[0] == 'no') {
		$status_flag=5;
	}
	else {
		$status_flag=0;
		break;
	}
}

if ($status_flag == 5) {
	# 1 )
	require "connection.php";
	$str="drop table ".$_COOKIE['room'].";";
	mysqli_query($con, $str);

	# 2 )
	require "connection.php";
	$str="delete from users where chat_id='".$_COOKIE['room']."'";
	mysqli_query($con, $str);

	require "connection.php";
	$str="delete from users where chat_id=''";
	mysqli_query($con, $str);
	
}

setcookie('room', $_COOKIE['room'], time()-60*60*8);
setcookie('nickname', $_COOKIE['nickname'], time()-60*60*8);
header('location:login.php');
?>

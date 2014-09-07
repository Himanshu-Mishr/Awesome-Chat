<?php
# here we check unique nickname of the user
require "connection.php";
$str="select username from users where chat_id='".$_COOKIE['room']."';";
$result=mysqli_query($con, $str);
$flag=0;

// echo "we are in unique room <br>";
while ($row=mysqli_fetch_array($result)) {

	if ($_COOKIE['nickname'] == $row[0]) {
		$flag=0;
		// echo "nickname = ".$_COOKIE['nickname']."<br>";
		// echo "___row[0] = ".$row[0]."<br>";
		// echo "name matched.Flag=".$flag."<br>";
		header("location:getnick.php");
		break;
	}
	if ($_COOKIE['nickname'] != $row[0]) {
		$flag=5;
	}
}

// echo "Out of loop.Flag=".$flag."<br>";
if ($flag == 5) {
	// inserting new user into user database
	require "connection.php";
	$uniq_id=uniqid();
	$str1="insert into users values('".$uniq_id."','".$_COOKIE['nickname']."','".$_COOKIE['room']."','yes');";
	mysqli_query($con, $str1);

	header("location:chatroom.php");
}
?>
<?php
$nickname=$_GET['nickname'];
$room=$_GET['room'];

# creating cookies
setcookie('room', $room, time()+60*60*8);
setcookie('nickname', $nickname, time()+60*60*8);


# we are checking, whether that table exist or not. 
require "connection.php";
$str="show tables;";
$result=mysqli_query($con, $str);
$flag=0;
while ($row=mysqli_fetch_array($result)) {
   if ($room == $row[0]) {
        // echo "Table exist now we will be going in for checking nickname__".$_COOKIE['nickname'];
   		$flag=0;  # and if table exist then we go for uniqueness checking for nickname
    	header("location:unique.php");
    	break;
   }
   if ($room != $row[0]) {
   		$flag=5;
   }
}

// echo 'I am going to get into logout if condition Flag='.$flag;
if ($flag == 5) {
	setcookie('join_error_msg', 'true', time()+60*60*8);
	header("location:logout.php");
}

?>

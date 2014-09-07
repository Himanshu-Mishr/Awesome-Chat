<?php
# create data base with room name.
# and number should be primary key
$nickname=$_GET['nickname'];
$room=$_GET['room'];

# creating cookies
setcookie('room', $room, time()+60*60*8);
setcookie('nickname', $nickname, time()+60*60*8);

// inserting new user into user database
require "connection.php";
$uniq_id=uniqid();
$str="insert into users values('".$uniq_id."','".$nickname."','".$room."','yes');";
mysqli_query($con, $str);


$flag = 0;
require "connection.php";
if($con) {

    $str="create table ".$room." (msg_no int(10) primary key, user varchar(10), msg varchar(1000), time_stamp datetime);";
    mysqli_query($con, $str);
    
    // $str="create table pageGen_".$room." (number int(10) primary key, id int(10));";
    // mysqli_query($con, $str);    
    // $str="insert into pageGen_".$room." values(5, 1);";
    // mysqli_query($con, $str);    
    $flag = 5;
}
if ($flag > 0) {
    header("location:chatroom.php");
}
?>
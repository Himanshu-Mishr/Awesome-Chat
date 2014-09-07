<?
require "connection.php";
$str="show tables;";
$result=mysqli_query($con, $str);
while ($row=mysqli_fetch_array($result)) {

    # if yes then direct it to new.php
    if ($_COOKIE['room'] == $row[0]) {
        header("location:chatroom.php");
    }
}
?>
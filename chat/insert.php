<?php
    $msg_no=$_GET['msg_no'];
    $msg=$_GET['msg'];
    require "connection.php";
    if($con) {
        $str="insert into ".$_COOKIE['room']." values(".$msg_no.", '".$_COOKIE['nickname']."', '".$msg."', now());";
        mysqli_query($con, $str);

        header("location:chatroom.php");
    }
?>

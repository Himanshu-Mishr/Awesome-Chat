<?php
echo "
<!DOCTYPE html>
<html>
<head>
    <title>Chat With Friend</title>
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans+Light'>
    <link rel='stylesheet' href='style_chatroom.css'>


</head>
<body>
<div class='_center'>
<table id='sidebar'>
<thead>
    <tr><td>Users Online</td></tr>
</thead>";
setcookie('join_error_msg', 'false', time()+60*60*8);
require "connection.php";
$str = "select username from users where chat_id='".$_COOKIE['room']."' and status='yes';";
$result=mysqli_query($con, $str);
while ($row=mysqli_fetch_array($result)) {
	echo "<tr><td><img src='status_online.png'> ".$row[0]." </td></tr>";
}
require "connection.php";
$str = "select username from users where chat_id='".$_COOKIE['room']."' and status='no';";
$result=mysqli_query($con, $str);
while ($row=mysqli_fetch_array($result)) {
    echo "<tr><td><img src='status_offline.png'> ".$row[0]." </td></tr>";
}
echo "</table>";
# info :
echo "
<div id='info'>
     Chat Room ID :  '".$_COOKIE['room']."' Share it with your friends, to add them.
    <div id='exit_button'>
    <a href='logout.php'>
    <input type='button' name='button' class='css_button' value='Exit'> </a>
    </div>
</div>";
# printing chat database in form of table.
require "connection.php";
$str="select * from ".$_COOKIE['room'].";";
$result=mysqli_query($con, $str);
echo "<table id='out'  width='80%' ><tbody>";
$next_msg_no=0;
while ($row=mysqli_fetch_array($result)) {
        echo "
        <div class='cell'>
        <tr><td>
        <div class='username'>".$row[1]." : </div>
        <div class='msg' style='width: 100%;' >".$row[2]."</div>
        <div class='timestamp'>

        <script>
        var t = '".$row[3]."'.split(/[- :]/);
        var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
        document.write(d);
        </script>
        </td></tr>
        </div>";
    # noting the last msg_no.
    $next_msg_no=$row[0];
}

echo "</tbody></table> </div>";

# incrementing last msg_no for next_msg input
$next_msg_no= $next_msg_no +  1;

echo "<table id='in' width='100%'>
<tbody>";

echo "
<form action='insert.php' method='GET'>
<tr>
    <td align='right'><input type='hidden' name='msg_no' value='".$next_msg_no."' placeholder='".$next_msg_no."' readonly></td>
    <td align='right'><input type='hidden' name='nickname' value='".$_COOKIE['nickname']."' placeholder='".$_COOKIE['nickname']."' readonly></td>

    <td align='right'><input type='text' class='inputs' name='msg' placeholder='enter msg here' autofocus>

    <td><input type='hidden' name='submit3' value='submit'></td>

</tr>
</form>";
echo "</tbody></table>";
?>


</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Chat With Friend</title>
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans+Light'>
    <link rel="stylesheet" href="style_login.css">
    <style>
    #error_msg {
        padding: 20px;
    }
    #error_msg textarea {
        border: none;
        font-size: 15px;
    }
    </style>
</head>
<body>
<center>
<p id='page_title'>
<img src="chat.png" height="150" width="150" alt="broken image">
CHAT
</p>
<font>
<div class="_center">
<table id='left'>

    <!-- New user _________________________________________________________ -->
    <?php

    echo "<form action='create.php' method='GET'>";
    echo "<tr><td><p class='option_title'>Create</p></td></tr>";
    echo "<tr><td><input type='text' class='inputs' name='nickname' placeholder='Enter your nick name'></td></tr>";
    $c=uniqid();
    $code=substr($c, -5);
    echo "<tr><td>
    <input type='text' class='inputs' name='room' value=".$code." readonly></td></tr>";
    echo "<tr><td align='right'><input type='submit' class='css_button' name='submit1' value='Create'></form></td></tr>";
    ?>

     <!-- Old User ________________________________________________________ -->

<table id="right">
    <form action="join.php" method="GET">
            <tr><td><p class='option_title'>Join</p></td></tr>
        <tr><td><input type="text" class='inputs' name="nickname" placeholder='Enter your nick name'></td></tr>
        <tr><td><input type="text" class='inputs' name="room" placeholder="Enter Friend's Chat Room Code"></td></tr>
        <tr><td align='right'><input type="submit" class='css_button' name="submit2" value="Join"></td></tr>
        </form>
</table>
    </font>
    </div>
</center>
</table>
<?php
if($_COOKIE['join_error_msg'] == 'true') {
    echo "
    <script>
        alert('Hi, You have entered invalid Chat Room Code. Please a enter valid code');
    </script>
    ";
    setcookie('join_error_msg', 'true', time()-60*60*8);

}
?>
</body>
</html>
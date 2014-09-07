<!DOCTYPE html>
<html>
<head>
	<title>Enter New Nick Name</title>
	<link rel="stylesheet" href="style_login.css">
	<style>
	#nickbox {
		padding: 250px;
	}
	.logout_button {
    font-size: 16px;
    font-family: Arial;
    font-weight: normal;
    text-decoration: inherit;
    -webkit-border-radius: 8px 8px 8px 8px;
    -moz-border-radius: 8px 8px 8px 8px;
    border-radius: 8px 8px 8px 8px;
    border: 1px solid #d83526;
    padding: 9px 177px;
    text-shadow: 1px 1px 0px #98231a;
    -webkit-box-shadow: inset 1px 1px 0px 0px #fab3ad;
    -moz-box-shadow: inset 1px 1px 0px 0px #fab3ad;
    box-shadow: inset 1px 1px 0px 0px #fab3ad;
    cursor: pointer;
    color: #ffffff;
    display: inline-block;
    background: -webkit-linear-gradient(90deg, #d34639 5%, #fa665a 100%);
    background: -moz-linear-gradient(90deg, #d34639 5%, #fa665a 100%);
    background: -ms-linear-gradient(90deg, #d34639 5%, #fa665a 100%);
    background: linear-gradient(180deg, #fa665a 5%, #d34639 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#fa665a",endColorstr="#d34639");
}

	.logout_button:hover {
    background: -webkit-linear-gradient(90deg, #fa665a 5%, #d34639 100%);
    background: -moz-linear-gradient(90deg, #fa665a 5%, #d34639 100%);
    background: -ms-linear-gradient(90deg, #fa665a 5%, #d34639 100%);
    background: linear-gradient(180deg, #d34639 5%, #fa665a 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#d34639",endColorstr="#fa665a");
}

	.logout_button:active {
    position:relative;
    top: 1px;
}

	</style>
</head>
<body>
<center>
<div id=nickbox>
<form action='' method='GET'>
	<input type='text' class='inputs' name='nickname' placeholder='Enter your new Nick Name'>
	<input type='submit' class='css_button' name='submit' value='Create'>

</form>
<p> OR </p>
<br>
<a href="logout.php"><input type='submit' class='logout_button' name='submit1' value='Exit'></a>
</div>
</center>
<?php
$nickname=$_GET['nickname'];
setcookie('nickname', $nickname, time()+60*60*8);
if(isset($_GET['submit'])) {
	header("location:unique.php");
}
?>
</body>
</html>
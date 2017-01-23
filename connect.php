<<<<<<< HEAD
<?
$user = 'root';
$password = 'root';
$db = 'expassion';
$host = 'localhost';
$port = 8888;

$link = mysqli_init();
$success = mysqli_connect( 
   $host,
   $user, 
   $password, 
   $db,
   $port
);
if(!$success)
{
	echo "kuy";
=======

<html>
<head>
	sdfasdfsdf
</head>
<body>

</body>
</html>
<?php
$link = mysql_connect('localhost', 'root', 'nschuakuay');
if (!$link) {
    die('Could not connect: ' . mysql_error());
>>>>>>> 1545930890fd74d9f46e4ca4ab99dd3cd8164dde
}

?>
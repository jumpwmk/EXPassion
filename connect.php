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
}

?>
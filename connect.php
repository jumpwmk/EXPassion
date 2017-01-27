<?
$user = 'root';
$password = 'root';
$db = 'expassion';
$host = 'localhost';
$success = mysqli_connect( 
   $host,
   $user, 
   $password, 
   $db
);
session_start();
?>
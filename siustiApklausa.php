<?php
session_start();
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
//$dbc=mysqli_connect('localhost','root', '','tinklu_it_projektas');

if(!$mysqli){
die ("Negaliu prisijungti prie MySQL:"	.mysqli_error($mysqli));
}
if($_POST !=null){
	// initialize session variables
	$_SESSION['apklausosname'] = $_POST['name'];
	$name = $_POST['name'];
	$creator =$_SESSION["username"];
	$sql = "INSERT INTO apklausos (name, creator) VALUES ('$name', '$creator')";
    if (mysqli_query($mysqli, $sql)) echo "Įrašyta";	
	}
header("Location:paruostiKlausimus.php");exit;
?>
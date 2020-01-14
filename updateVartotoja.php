<?php
//reikia kad paimtu rinkama apklausos id, reikia kad zinotu apklauosos varda
session_start();
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

//$dbc = mysqli_connect('localhost','root', '','tinklu_it_projektas');
if(!$mysqli){
die ("Negaliu prisijungti prie MySQL:"	.mysqli_error($mysqli));
}

if($_POST !=null){
    $name = $_POST['username'];
    $rolas = $_POST['role'];
    $sql = "UPDATE users SET role='$rolas' WHERE id='$name'";
    
    if ($result=$mysqli->query($sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $mysqli->error;
    }	
    //var_dump($result);
    //die();
}
header("Location:autoriausRegistracija.php");exit;
//paleisk
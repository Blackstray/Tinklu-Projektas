<?php
//reikia kad paimtu rinkama apklausos id, reikia kad zinotu apklauosos varda
session_start();
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
//echo $_SESSION['apklausosname'];
//$dbc=mysqli_connect('localhost','root', '','tinklu_it_projektas');
if(!$mysqli){
die ("Negaliu prisijungti prie MySQL:"	.mysqli_error($mysqli));
}
$apklausosname = $_SESSION['apklausosname'];
$klausti = "SELECT * FROM apklausos WHERE name='$apklausosname'";
$apklausos_id = mysqli_query($dbc, $klausti); //$_SESSION['apklausosname']
//$row = mysqli_fetch_assoc($apklausos_id);
$row = mysqli_fetch_assoc($apklausos_id);
if($_POST !=null){
    $klausimo_turinys = $_POST['klausimo_turinys'];
	$sql = "INSERT INTO apklausos_klausimas (apklausos_id, klausimo_turinys) VALUES ('$row[id]','$klausimo_turinys')";
    if (mysqli_query($mysqli, $sql)) echo "Įrašyta";	
    }
    $_SESSION['saveApklausa'] = true;
header("Location:paruostiKlausimus.php");exit;

?>
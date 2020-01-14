<!DOCTYPE html>
<html lang="en">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Apklausa internete</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="autoriausRegistracija.php">Autoriaus registracija</a></li>
      <li><a href="perziuretiApklausa.php">Peržiūrėti apklausas</a></li>
      <li><a href="paruostiApklausa.php">Paruošti apklausa</a></li>
      <li><a href="apklausuRezultatai.php">Apklausų rezultatai</a></li>
    </ul>
  </div>
</nav>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>php.lab</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

<?php
session_start();
if($_SESSION["role"] == "4" || $_SESSION["role"] == "2")
{
  header("location: index.php"); 
}
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file
//require_once "config.php";
//$dbc=mysqli_connect('localhost','root', '','tinklu_it_projektas');
		if(!$mysqli){
			die ("Negaliu prisijungti prie MySQL:"	.mysqli_error($dbc));
		}
    $apklausos_id = $_POST['id'];
	$sql = "SELECT * FROM apklausos_klausimas WHERE apklausos_id='$apklausos_id'";
    $result = mysqli_query($mysqli, $sql);
	echo "<table table-striped table-hover border=\"0\">";
	echo "<tr> <td>Klausimas</td> <tr>";
  // if (mysqli_num_rows($result) > 0)
  $i = 1;
	{while($row = mysqli_fetch_assoc($result))
		{
        echo "<tr><td>".$i. "</td><td>".$row['klausimo_turinys']."</td><tr>";
        $i = $i + 1;
		} 
    };
  echo "</table>";
?>
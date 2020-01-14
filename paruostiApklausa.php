<?php 
session_start();
if($_SESSION["role"] == "4" || $_SESSION["role"] == "2")
        {
          header("location: index.php"); 
        }
        $_SESSION['saveApklausa'] = false;
        ?>
<!DOCTYPE html>
<html lang="en">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Apklausa internete</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php"">Home</a></li>
      <li><a href="autoriausRegistracija.php">Autoriaus registracija</a></li>
      <li><a href="perziuretiApklausa.php">Peržiūrėti apklausas</a></li>
      <li><a href="paruostiApklausa.php">Paruošti apklausa</a></li>
      <li><a href="apklausuRezultatai.php">Apklausų rezultatai</a></li>
    </ul>
  </div>
</nav>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css"> 
H1 {
font-size: 120%;
text-align: center;
font-family: Verdana, Arial, Helvetica, sans-serif; color: #333366;
}
table td {
text-align: left;
width: 0.1%;
}
</style>
</head>

<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
<div>
  <h1>Nauja apklausa</h1>
</div>
	
<form method='post' action='siustiApklausa.php'>
	<h1>Apklausos pavadinimas:<input name='name' type='text'>
	<input type='submit' name='ok' value='Patvirtinti'></h1>
</form>
	<h1><?php
  if($_SESSION['saveApklausa']) {
    $_SESSION['saveApklausa'] = false;
    echo "Išsaugota";
    }
  ?></h1>
</html>
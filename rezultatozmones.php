<!DOCTYPE html>
<html lang="en">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Apklausa internete</a>
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

<body>
<div class="container">
    <div>
        <h1>Apklausu rezultatai</h1>
    </div>

    <table class="table">
    <thead>
    <tr>
        <th scope="col">Vartotojas</th>
    </tr>
    </thead>
    <tbody>


<?php
session_start();
$_SESSION["loggedin"] = true;
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
//TODO: uncomment
//if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//    header("location: login.php");
//    exit;
//}
// Include config file
//require_once "config.php";

//$dbc=mysqli_connect('localhost','root', '','tinklu_it_projektas');
		if(!$mysqli){
			die ("Negaliu prisijungti prie MySQL:"	.mysqli_error($mysqli));
    }
  
	//  nuskaityti viska bei spausdinti 
	$sql = "SELECT * FROM users Where ";
    $result = mysqli_query($dbc, $mysqli);
	// if (mysqli_num_rows($result) > 0)
	{while($row = mysqli_fetch_assoc($result))
		{
		echo "<tr><th scope='row'><a href='rezultatas.php?apklausa=".$row['id']."'>".$row['username']."</a></th> <td>";
		} 
    };

?>
    </tbody>
</table>
</div>
</body>
</html>
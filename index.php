<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location: login.php");
    $_SESSION["role"] = "4";
    $_SESSION["username"] = "Neprisiregistraves";
    //exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Apklausa internete</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
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
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Apklausa internete. Paruošė Ugnius Samuolis.</h1>
    </div>
    <?php
    if($_SESSION["role"] == "4") {
    ?>
      <p>
        <a href="login.php" class="btn btn-warning">Login</a>
        <a href="register.php" class="btn btn-danger">Register</a>
      </p>
    <?php } else { ?>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    <?php  
    }
    ?>
</body>
</html>
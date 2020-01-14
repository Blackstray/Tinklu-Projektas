<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
//TODO: uncomment
//if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//    header("location: welcome.php");
//    exit;
//}

// Include config file
require_once "config.php";

?>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body lang="en">
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
<div class="container">
    <div class="page-header">
        <h1>Apklausa</h1>
    </div>
    <?php if(!isset($_POST['submit'])) {
        $apklausaId = isset($_GET['apklausa']) ? intval($_GET['apklausa']) : 0;
        if(!$apklausaId) {
            //TODO: or error?
            header("location: index.php");
            exit;
        }
        //$mysqli = mysqli_connect('localhost','root', '','tinklu_it_projektas');
        ?>

        <form class="row" method="post">
            <input type="hidden" name="apklausaId" value="<?php echo intval($apklausaId); ?>">
            <?php
                $sql = 'SELECT id, klausimo_turinys FROM apklausos_klausimas WHERE apklausos_id = ?';
                if($stmt = $mysqli->prepare($sql)){
                    $stmt->bind_param('i', $apklausaId);
                    $stmt->execute();
                    $stmt->bind_result($id, $klausimoTurinys);

                    while ($stmt->fetch()) {
                        ?>
                            <div class="mb-3" class="was-validated">
                                <label for="validationTextarea"><?php echo htmlentities($klausimoTurinys) ?></label>
                                <textarea name="atsakymas[<?php echo $id; ?>]" class="form-control is-invalid" placeholder="Būtinas atsakymas" required></textarea>
                            </div>
                        <?php
                    }

                    $stmt->close();
                }
                $mysqli->close();
            ?>
            <input type="submit" name="submit" value="Išsaugoti atsakymus" class="btn btn-primary">
        </form>
    <?php } else {
        if($_SESSION["role"] === "4")
        {
            echo "Tik prisiregistrave vartotojai gali atsakineti i apklausas";
        }
        else {
            $sql = 'INSERT INTO `apklausos_atsakymai` (`klausimo_id`, `userid`, `apklausos_atsakymas`) VALUES (?, ?, ?)';
            $stmt = $mysqli->prepare($sql);
            //var_dump($mysqli);
            //var_dump($stmt);
            $stmt->bind_param("iis", $klausymoId, $userId, $apklausosAtsakymas);
    
            foreach($_POST['atsakymas'] as $id => $atsakymas) {
                $klausymoId = $id;
                $userId = $_SESSION["id"];
                $apklausosAtsakymas = $atsakymas;
                $stmt->execute();
        }
        echo "Ačiū"; //TODO: Thank message or redirect
    }
    }?>
</div>

</body>
</html>
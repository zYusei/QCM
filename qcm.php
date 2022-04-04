<?php
session_start();
error_reporting(0);?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>QCM</title>
</head>
<style>
.blinking{
    animation:blinkingText 1.2s infinite;
}
@keyframes blinkingText{
    0%{     color: #FFEB3B;    }
    49%{    color: #FF5722; }
    60%{    color: #429600; }
    99%{    color: #e91e1e;  }
    100%{   color: #FFF;    }
}
</style>
<body style="background:#607d8b">
    
<div class="container text-center">
<h2 style="color:white">QCM</h2>
<h2 class="blinking">Bienvenue <?php echo $_SESSION['user'];?>
QCM quiz</h2>
<form action="http://localhost/qcm/resultat.php" method="post"> 
<?php
$id = mysqli_connect("127.0.0.1", "root", "", "qcm");
$req = "select * from questions order by rand() limit 10";
$res = mysqli_query($id, $req);
$i = 1;
while($ligne = mysqli_fetch_assoc($res)){ 
    echo "<h3>$i - ".$ligne["libelleQ"]."</h3>";
    $i++;
    $idq = $ligne["idq"];
    $req2 = "select * from reponses
    where idq = $idq";
    $res2 = mysqli_query($id, $req2);
    while($ligne2 = mysqli_fetch_assoc($res2))
    {
        echo "<input type='radio' name='$idq' value='".$ligne2['idr']."'>".$ligne2['libeller']."<br>";
    
    }
}
?>
<br>

<div class="card-footer text-center">
	<input type="submit" name = "sub"  class="btn btn-primary"><br><br>
	<a href = 'http://localhost/qcm/logout.php'>
	<button class="btn btn-primary">Déconnexion</button></a></div>
  </div>
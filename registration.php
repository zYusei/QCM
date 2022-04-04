<!DOCTYPE html>
<html lang="en">
<head>
  <title>QCM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
.content {
  background: url('register.jpg') center / cover no-repeat;
}
.data {
  background: url('reg.jpg') center / cover no-repeat;
}
</style>
<body class = "content" style = "color:white">

<div class="container m-auto d-block " align ="center">
<div class="col-sm-6 data" style="margin-top: 200px;">
  <h2>Inscription</h2>
  <form method = "post" >
    <div class="form-group">
      <label for="fname">Email:</label>
      <input type="text" class="form-control" name = "fname" id="email" placeholder="Entrer email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Mot de passe:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Entrer mot de passe" name="pass" required>
    </div>
  
    <button type="submit" name = "sub" class="btn btn-primary">Soumettre</button>
  </form>
</div>

<?php 
include("conn.php");
if(isset($_POST['sub'])){
    $name  = $_POST['fname'];
	$pass = $_POST['pass'];
	
	
	
	$sql = "INSERT INTO user(name,password) VALUES('$name','$pass')";
	if(mysqli_query($conn,$sql)){
		echo '<p style="background:black; margin-top:10px" >'.$name.' Vous vous êtes inscrit avec succès, vous allez être redirigé. </p>';
	header('Refresh: 3; URL=login.php');}
	else{
		echo "pas inséré";
	}
	
	
}
?>
</div>
</body>
</html>





<?php
session_start();
?>
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
  background: url('new.jpg') center / cover no-repeat;
}
.data {
  background: url('log.jpg') center / cover no-repeat;
}
</style>
<body class = "content" style = "color:white">

<div class="container " align ="center">
<div class="col-sm-6 data" style="margin-top: 200px;">
  <h2>Connexion</h2>
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
</div>
<div align="center" style="background:grey;     margin-top: 10px;">
<?php
include("conn.php");
if(isset($_POST['sub'])){
	$user =	$_POST['fname'];
	$pass = $_POST['pass'];
	
	$sql = "SELECT * FROM user WHERE name = '$user' && password = '$pass'";
	$data = mysqli_query($conn,$sql);
	$result =  mysqli_num_rows($data);

	if($result == 1){
		$_SESSION['user'] = $user;
		$_SESSION['pass'] = $pass;
		
		while($row = mysqli_fetch_assoc($data)){
			
			?>
 	       <a href = 'qcm.php/?id=<?php echo  $_SESSION['id'] =$row['id']; ?>' style="color: yellow;text-decoration: none;"><?php echo 'Welcome '.$user." <strong>CLIQUEZ ICI</strong>";?></a>
	<?php	}
		
	}
	else{
		echo "utilisateur n'existe pas";
	}
	}
?>
</div>
</body>
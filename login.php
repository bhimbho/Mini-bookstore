<?php
spl_autoload_register(function ($a){
	include $a.'.class.php';
});
$db=new db();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<div class="container-fluid">
<body>
	<?php
	if(isset($_POST['sub'])){
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$user_query=$db->prep("SELECT * FROM user WHERE username=:user AND password=:pass");
		$user_query->execute(array(":user"=>$user, ":pass"=>$pass));
		$row= $user_query->rowCount();
		if($row>0){
			echo "successfful";
			$row= $user_query->fetch(PDO::FETCH_ASSOC);
			$_SESSION['user_id']=$row['user_id'];
			$_SESSION['user']=$row['username'];
			$_SESSION['email']=$row['email'];
			header("location:index.php");
		}
	}
	?>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-4 side1">
			<center><img src="img/logo.png" class="img-responsive" width="150px;">
			<h3>Book Chef</h3>
			</center>
			<form action="" method="post">
				<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="user">
				</div>
				<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="pass">
				</div>
				<button name="sub" class="btn btn-primary btn-block">Login</button>
				<a href="register.php">Register an Acccount</a>
			</form>
		</div>
		<div class="col-md-7 side">
			<center><img src="img/logo.png" height="350px" />
			<h3>Bookchef.com</h3>
			<p>Secured Payment with</p><hr>
			<img src="img/payment.png" />
		</center>

		</div>
	</div>
	
</body>
</div>
</html>
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
	
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-4 side1">
			<?php
	if(isset($_POST['sub'])){
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$email=$_POST['email'];
		$fname=$_POST['fname'];
		$add=$_POST['add'];
		$user_query=$db->prep("INSERT INTO user VALUES(NULL,:fname,:user,:pass,:email,:add)");
		$user_query->execute(array(":user"=>$user,":fname"=>$fname, ":email"=>$email, ":add"=>$add, ":pass"=>$pass));
		if($user_query){
			header('refresh:2,login.php');
			echo "<div class='alert alert-success'>successfful</div>";

		}
	}
	?>
			<center><img src="img/logo.png" class="img-responsive" width="150px;">
			<h3>Book Chef</h3>
			</center>
			<form action="" method="post">
				<div class="form-group">
				<label>Full Name</label>
				<input type="type" class="form-control" name="fname">
				</div>
				<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="user">
				</div>
				<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="pass">
				</div>
				<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="pass1">
				</div>
				<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email">
				</div>
				<div class="form-group">
				<label>Address *delivery</label>
				<input type="type" class="form-control" name="add">
				</div>
				<button name="sub" class="btn btn-primary btn-block">Register</button>
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
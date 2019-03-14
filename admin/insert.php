<?php
spl_autoload_register(function ($a){
	include '../db.class.php';
});
$db=new db();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<div class="container-fluid">
<body>
	<?php
	if(isset($_POST['sub'])){
		$b_name=$_POST['b_name'];
		$desc=$_POST['desc'];
		$amount=$_POST['amount'];
		$desc=$_POST['desc'];
		$target_dir="../img/";
		$target_file=$target_dir.basename($_FILES["img"]["name"]);
		$file=basename($_FILES["img"]["name"]);
		$uploadOk=1;
		$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
			# code...
		
		$user_query=$db->prep("INSERT INTO books VALUES (null,:b_name,:des,:amount,:target_dir)");
		$user_query->execute(array(":b_name"=>$b_name, ":des"=>$desc,":amount"=>$amount,":target_dir"=>$file));
		$row= $user_query->rowCount();
		if($row>0){
			echo "successfful";
			// header("location:../index.php");
		}
		}
	}
	?>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 side1">
			<center><img src="../img/logo.png" class="img-responsive" width="150px;">
			<h3>Book Chef</h3>
			</center>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<label>Book Name</label>
				<input type="text" class="form-control" name="b_name">
				</div>
				<div class="form-group">
				<label>Book Desc</label>
				<input type="text" class="form-control" name="desc">
				</div>
				<div class="form-group">
				<label>Amount</label>
				<input type="text" class="form-control" name="amount">
				</div>
				<div class="form-group">
				<label>Image</label>
				<input type="file" class="form-control" name="img">
				</div>
				<button name="sub" class="btn btn-primary btn-block">Upload</button>
			</form>
		</div>
		
	</div>
	
</body>
</div>
</html>
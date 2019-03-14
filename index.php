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
<center><img style='margin-top: -30px;' src="img/logo.png" class="img-responsive" width="150px;">
			</center>
<div style="background-color: #01876E; height: 40px; padding-top: 10px;"><center><p style="color: white">Get 50% off</p></center></div>
<ul class="nav nav-pills" style="background-color: #135E50;">
	  <li role="presentation"><a style="color: white !important;" href="index.php">Home</a></li>
	  <li role="presentation"><a style="color: white !important;" href="transact.php">Transaction Log</a></li>
	  <li role="presentation"><a style="color: white !important;" href="logout.php">Logout</a></li>
	</ul>
<div class="container-fluid">
<body>
	<div class="container">
	<div class="row">
	<?php 
	$book_query=$db->prep("SELECT * FROM books");
	$book_query->execute();
	while ($row=$book_query->fetch(PDO::FETCH_ASSOC)) {

		echo '<div class="col-md-4" style="margin-bottom:15px;"><form method="post" action="payer.php">
 		<input type="hidden" name="amount" value="'.$row["book_amount"].'"> 
 		<input type="hidden" name="cartid" value="'.$row["book_id"].'"> 

		<img src="img/'.$row['cover'].'" height="350px" width="350px">
		<p>Book Title:'.$row['book_name'].' </p>
		<p>Book Description:'.$row['book_desc'].' </p>
		<p>Price: '.$row['book_amount'].'</p>
		<button name="" class="btn btn-success btn-block">Buy Now &#8358;'.$row['book_amount'].'</button></div></form>';
	}
	?>
	</div>
	</div>
	
<center><FOOTER style='color:#135E50;'>Copyright &copy;Book Chef 2019</FOOTER>	</center>

</body>
</div>
</html>
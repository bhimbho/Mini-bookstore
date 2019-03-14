<?php
require 'db.class.php';
$db=new db();
$ref=$_GET['reference'];
$email=$_GET['email'];
$cart_id=$_GET['cart'];
$amount=$_GET['amount'];
$query=$db->prep("SELECT * FROM transactions WHERE ref=:ref");
$query->execute(array(':ref'=>$ref));
$row=$query->rowCount();

if($row>0){
	// header('location:index.php');
}
else{
	$query=$db->prep("INSERT INTO transactions VALUES (0,:cart,:ref,:amt,:email,NOW())");
	$query->execute(array(':ref'=>$ref,':cart'=>$cart_id,':amt'=>$amount,':email'=>$email));
	$row=$query->rowCount();
	header('refresh:8,index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Check Status</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<center>
<img src="img/logo.png" class="img-responsive" width="150px">
<h2>Payment Receipt</h2>
<div class="col-md-6 col-md-offset-3">
<table class="table table-striped">
	<tr>
		<th colspan="2">Note: Receipt is also sent to your mail</th>
		<th></th>
	</tr>
	<tr>
		<td>Reference Code</td>
		<td><?php echo $ref?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $email?></td>
	</tr>
	<tr>
		<td>Amount</td>
		<td>&#8358;<?php echo $amount?></td>
	</tr>
	<tr><td><a href="index.php" class="badge">Go Home</a></td></tr>
</table>
</div>
<h3>: </h3>
</center>
</body>
</html>


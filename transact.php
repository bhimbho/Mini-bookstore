
<?php
session_start();

if(!isset($_SESSION['user'])){
  echo '<script type="text/javascript">
  alert("You must be logged in to continue..redirecting");
</script>';
header('refresh:1,login.php');
}
require_once('db.class.php');
$db=new db();
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
<h2>TRANSACTION LOG</h2>
<div class="col-md-8 col-md-offset-2">
<table class="table table-bordered table-striped table-hover">
	<tr>
		<th>S/N</th>
		<th>Item Description</th>
		<th>Reference Code</th>
		<th>Amount &#8358;</th>
		<th>Action</th>
	</tr>
	<?php
	$user=$_SESSION['email'];
		$query=$db->prep("SELECT * FROM transactions LEFT JOIN books ON transactions.cart_id=books.book_id WHERE email=:id");
		$query->execute(array(':id'=>$user));
		$count=0;
		while ($row=$query->fetch(PDO::FETCH_ASSOC)) {
			$count=$count+1;
			echo '<tr>
		<td>'.$count.'</td>
		<td>'.$row["book_name"].'</td>
		<td>'.$row["ref"].'</td>
		<td>'.$row["amount"].'</td>
		<td><a href="view_receipt.php?id='.$row["t_id"].'" class="btn btn-success"><i class="glyphicon glyphicon-book"></i></a></td>
	</tr>';
		}
	?>
	<tr><td><a href="index.php" class="badge">Go Home</a></td></tr>
</table>
</div>
<h3>: </h3>
</center>
</body>
</html>
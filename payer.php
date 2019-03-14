<?php
session_start();
if(!isset($_SESSION['user'])){
  echo '<script type="text/javascript">
  alert("You must be logged in to continue..redirecting");
</script>';
header('refresh:1,login.php');
}
?>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4 col-lg-4 col-sm-12 col-xs-4 pay">
<form >
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" class="btn btn-success  btn-md" onclick="payWithPaystack()"> Are you sure u want to Pay Now <span class="glyphicon glyphicon-usd"></span></button> 
  <a href="index.php" class="btn btn-success btn-md"> Go back to Cart <span class="glyphicon glyphicon-shopping-cart"></span> </a> 
</form>
</div>
</div>
<?php 
$amount=$_POST['amount']."00";
$ramount=$_POST['amount'];
$cart=$_POST['cartid'];
if(isset($_SESSION['email'])){
$email=$_SESSION['email'];  
}
else{
  $email='';
}
?>
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_e5a9a7a86dce79424fa5cc373be1148321533e55',
      email: '<?php echo $email; ?>',
      amount: <?php echo json_encode($amount) ; ?>,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                cart: "",
                
            }
         ]
      },
      callback: function(response){
          alert('Payment for item successful. transaction ref is ' + response.reference);
          window.location.href = "check.php?reference="+response.reference+"&email=<?php echo $email; ?>"+"&cart=<?php echo $cart; ?>"+"&amount=<?php echo $ramount; ?>";
         
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>
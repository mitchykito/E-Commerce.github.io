<?php 
	session_start();
	include 'db.php';

	if (empty($_SESSION['shopping_cart'])) {
		echo "<script type = 'text/javascript'>alert ('CART IS EMPTY'); 
		location.href='products.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>BUBUSHOP</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div id="header">
			<ul>
	  			
	  			<li><a href="products.php" style="text-decoration: none">📦Products</a></li>
	  			<li><a href="cart.php" class="active" style="text-decoration: none">🛒Cart</a></li>
	  			<li style="float:right"><a href="login.php" style="text-decoration: none">Sign In</a></li>
			</ul>
		</div>
			<div style="clear:both"></div>
			<br />
			<center>
				<h3>Customer Form</h3>
				<form method="post" action="thankyou.php">
					<div class="table-responsive" style="width: 80%;">
							<table class="table table-bordered" style="border: none;">
						<tr>
							<th colspan="3">Customer Information</th>
						<tr>
							<td style="border: none; padding-top: 20px; ">
								<span style="font-weight: bolder;">Name:</span><input type="text" required="" name="name" style="width:100%; float: right; text-align: left;">
							</td>
							<td style="border: none; padding-top: 20px; ">
								<span style="font-weight: bolder;">Complete Address:</span><input type="text" required="" name="address" style="width:100%; float: right; text-align: left;">
							</td>
							<td style="width: 20%; border: none; padding-top: 20px; ">
								<span style="font-weight: bolder;">Payment:</span> <input type="text" required="" name="payment" style="width:100%;float: right; text-align: center;" value="Cash-On-Delivery" disabled="">
							</td>
						</tr>

						<tr>
							<td style="border: none; padding-top: 20px; ">
								<span style="font-weight: bolder;">E-mail:</span><input type="text" required="" name="email" style="width:100%;float: right; text-align: left;">
							</td>
							<td style="border: none; padding-top: 20px; ">
								<span style="font-weight: bolder;">Contact #:</span><br><input type="text" required="" name="contact" style="width:50%;float: left; text-align: left;">
							</td>
						</tr>
					</div>
					</table>
				</form>
				<input type="submit" name="checkout" value="Checkout">
			</div>
		</center>
	<br />
	<footer style="width: 100%; height: 30px; background-color: black; text-align:center; color: gold;  position: fixed; bottom: 0; left: 0; right: 0; margin-bottom: 10px;">
		&copy;2019 BUBUSHOP. All right Reserved.
		<div style="background-color: black; width: 100%;">
			<a href="https://gnarly.clothing/" target="_blank">gnarly.clothing</a> |
			<a href="https://www.facebook.com/dailyflightlifestyle/" target="_blank">daily flight</a> |
			<a href="https://www.facebook.com/kushcompanyph/" target="_blank">kush co.</a> |
			<a href="https://illestbrand.com/" target="_blank">illest</a>
		</div>
		</footer>
	</body>
</html>

<?php
//If you have use Older PHP Version, Please Uncomment this function for removing error 

/*function array_column($array, $column_name)
{
	$output = array();
	foreach($array as $keys => $values)
	{
		$output[] = $values[$column_name];
	}
	return $output;
}*/
?>
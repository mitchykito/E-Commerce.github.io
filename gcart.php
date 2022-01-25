<?php 
	session_start();
	include 'db.php';
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
			}
		}
	}
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
	  			<li><a href="index.php" style="text-decoration: none">🏠Home</a></li>
	  			<li><a href="products.php" style="text-decoration: none">📦Products</a></li>
	  			<li><a href="cart.php" class="active" style="text-decoration: none">🛒Cart</a></li>
	  			<li style="float:right"><a href="login.php" style="text-decoration: none">Sign In</a></li>
			</ul>
		</div>
			<div style="clear:both"></div>
			<br />
			<center>
			<h3>Cart</h3>
			<div class="table-responsive" style="width: 80%;">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="5%">Size</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td><?php echo $values["item_size"]; ?></td>
						<td>₱ <?php echo $values["item_price"]; ?></td>
						<td>₱ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="4" align="right">Total</td>
						<td align="right" style="font-weight: bold;">₱ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
				</table>
				<h3>Customer Form</h3>
				<form method="post" action="checkout.php">
					<div class="table-responsive" style="width: 100%;">
							<table class="table table-bordered">
						<tr>
							<th colspan="3">Customer Information</th>
						</tr>
						<tr>
							<td>
								<span>Name:</span><input type="text" name="name" style="width:80%; float: right; text-align: center;">
							</td>
							<td>
								<span>Address:</span><input type="text" name="address" style="width:80%; float: right; text-align: center;">
							</td>
							<td>
								<span>Payment:</span> <input type="text" name="payment" style="width:80%;float: right; text-align: center;" value="Cash-On-Delivery" disabled="">
							</td>
						</tr>

						<tr>
							<td>
								<span>E-mail:</span><input type="text" name="email" style="width:80%;float: right; text-align: center;">
							</td>
							<td>
								<span>Contact #:</span><input type="text" name="contact" style="width:80%;float: right; text-align: center;">
							</td>
						</tr>
					</div>
					</table>
				</form>
				<input type="submit" name="checkout" value="Checkout">
			</div>
		</center>
	<br />
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
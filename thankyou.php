<?php 
	session_start();
	include 'db.php';
if (empty($_SESSION['shopping_cart'])) {
		echo "<script type = 'text/javascript'>alert ('CART IS EMPTY'); 
		location.href='products.php';</script>";
	} else
	if (isset($_POST['checkout'])) {
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['address'] = $_POST['address'];
		$_SESSION['contact'] = $_POST['contact'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['payment'] = "Cash-On-Delivery";
	}	
	session_destroy();
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
			<div style="background-color: gold; color: black; width: 80%; height: 150px;">
				<h1 style="font-size: 20px; font-style: Arial; padding: 10px 10px 10px 10px; padding-top: 30px;">
					<b>THANK YOU!</b>
					<p>We have received your order, and will get back to you as soon as possible.</p>
					Note: Your order(s) will arrive a little late due to the street’s epic traffic and congestion this holidays! <br><b>Your delivery will take 3 - 5 working days to arrive!</b></h1>
			</div>
			<h2>Order Details</h2>
			<div class="table-responsive" style="width: 80%;">
				<table class="table table-bordered">
					<tr>
						<th colspan="5">BUBUSHOP<label style="float: right"><?php echo date("m/d/Y"); ?></label></th>
					</th>
					</tr>
					<tr>
						<td colspan="5">
							<label style="font-size: 15px; font-weight: bolder;">BUBUSHOP</label>
							<br>
							Brgy. Astig, Lupao<br>
							Nueva Ecija, PH<br>
							<b style="font-size: 15px">Complete Address</b>
							<br>
							<?php echo $_SESSION['name']; ?><br>
							<a><?php echo $_SESSION['email'] ?></a>
							<br>
							<?php echo $_SESSION['address'] ?><br>
							<?php echo $_SESSION['contact'] ?><br>
							<b><?php echo $_SESSION['payment'] ?><b>
							<br>

							<?php  
							if($_SESSION["shopping_cart"]) {
								foreach ($_SESSION as $key => $values) {		
								}
							}
							?>
						</td>
					</tr>
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Qty.</th>
						<th width="5%">Size</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
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
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="4" align="right">Total</td>
						<td align="right" style="font-weight: bold;">₱ <?php echo number_format($total, 2); ?></td>
						
					</tr>
					<?php
					}
					?>
				</table>
				<a href="products.php" class="btn btn-success" id="addcart" style="margin-bottom: 50px; padding-top: 15px">CLICK HERE TO SHOP MORE!</a>
			</div>
		</center>

		<footer style="width: 100%; height: 30px; background-color: black; text-align:center; color: gold;">
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

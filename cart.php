<?php 
	session_start();
	include 'db.php';
	$msg='';
	$msgg='';

	if(isset($_POST["add_to_cart"]))
	{
		if(isset($_SESSION["shopping_cart"]))
		{
			$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
			if(!in_array($_GET["id"], $item_array_id))
			{
				$count = count($_SESSION["shopping_cart"]);
				$item_array = array(
					'item_id'			=>	$_GET["id"],
					'item_name'			=>	$_POST["hidden_name"],
					'item_price'		=>	$_POST["hidden_price"],
					'item_quantity'		=>	$_POST["quantity"],
					'item_size'			=>  $_POST["item_size"]
				);
				$_SESSION["shopping_cart"][$count] = $item_array;
				
			}
			else
			{
				echo '<script>alert("Item Already Added")</script>';
			}
		}
		else
		{
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"],
				'item_size'			=>  $_POST["item_size"]
			);
			$_SESSION["shopping_cart"][0] = $item_array;
		}
	}

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

	if (empty($_SESSION['shopping_cart'])) {
		$msg="<a href = products.php class='note'><h3>".
		"YOUR CART IS EMPTY<br>START SHOPPING</h3>"."</a>";
	} else {
		$msgg='<a href="products.php" class="btn btn-success" id="addcartt" style="margin-bottom: 50px; padding-top: 8px;">CONTINUE SHOPPING</a>

			<a href="checkout.php" style="margin-top:0px; margin-bottom: 50px; padding-top: 15px;" class="btn btn-success" id="addcart">PROCEED TO CHECKOUT</a>
		';
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
			<?php echo $msg ?>
			<h3>Oder Summary</h3>
			<div class="table-responsive" style="width: 80%;">
				<table class="table table-bordered">
					<tr>
						<th width="20%" style="text-align: center;">Item Name</th>
						<th width="1%" style="text-align: center;">Qty.</th>
						<th width="5%" style="text-align: center;">Size</th>
						<th width="5%" style="text-align: center;">Price</th>
						<th width="5%" style="text-align: center;">Total</th>
						<th width="5%" style="text-align: center;">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<?php  
						$sql = mysqli_query($conn, "SELECT * FROM products WHERE name='".$values['item_name']."' ");
						$res = mysqli_fetch_array($sql);
						?>
						<td style="text-align: center;">
							<center>
								<img src="images/<?php echo $res["image"]; ?>" style="width: 150px; height: 150px;" class="img-responsive"/>
								<br />
								<p style="font-size: 15px; font-weight: bold;"><?php echo $values["item_name"]; ?></p>
							</center>
						</td>
							<td style="text-align: center; font-size: 15px; font-weight: bold;"><?php echo $values["item_quantity"]; ?></td>

							<td style="text-align: center; font-size: 15px; font-weight: bold;"><?php echo $values["item_size"]; ?></td>

							<td style="text-align: center; font-size: 15px; font-weight: bold;">₱ <?php echo $values["item_price"]; ?></td>

							<td style="text-align: center; font-size: 15px; font-weight: bold;">₱ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
							
							<td style="text-align: center; font-size: 15px; font-weight: bold;"><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>" style="text-decoration: none;"><span class="text-danger" style="font-weight: bold; font-size: 13px;">Remove From Cart</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="4" align="right">Total</td>
						<td align="right" style="font-weight: bold;"><label style="font-size: 12px; color: gray;">PHP</label>&nbsp;&nbsp;&nbsp;₱ <?php echo number_format($total, 2); ?></td>
					</tr>
					<?php
					}
					?>
				</table>
				<?php echo $msgg; ?>
			</div>
		</center>
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
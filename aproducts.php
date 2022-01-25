<?php 
	session_start();
	include 'db.php';

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

?>
<!DOCTYPE html>
<html>	
	<head>
		<title>BUBUSHOP</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div id="header">
			<ul>
	  			<li><a href="aproducts.php" class="active" style="text-decoration: none">📦Products</a></li>
	  			<li style="float:right"><a href="logout.php" style="text-decoration: none">Log out</a></li>
	  			<li style="float:right"><a href="addproduct.php" style="text-decoration: none">Add Product</a></li>
			</ul>
			
		</div>

		<div class="container">
			<br />
			<h3 align="center">Products</h3><br />
			<br /><br />
			<?php
				$query = "SELECT * FROM products ORDER BY RAND()";
				$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4" style="margin-bottom: 50px; width: 0 auto;" >
				<form method="post" enctype="multipart/form-data" action="editproducts.php">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;  " align="center" >

						<div class="img">
							<img src="images/<?php echo $row["image"]; ?>" class="img-responsive"/><br />
						</div>
						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">₱ <?php echo $row["price"]; ?></h4>

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<a href="editproduct.php?id=<?php echo $row['id'];?>" style="margin-top:0px; text-decoration: none;" class="btn btn-success">Edit</a>

						<a href='delete.php?id=<?php echo $row["id"];?>' onclick="return confirm('Are you sure you want to remove the product?')" style="margin-top:0px; background-color: red; border-color:red; " class="btn btn-success">🗑</a>
						</div>
				</form>
			</div>
			<?php
				
				}
			?>
		</div>
		<footer style="width: 100%; height: 30px; background-color: black; text-align:center; color: gold; ">
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
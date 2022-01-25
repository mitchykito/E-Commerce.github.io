<?php 
	session_start();
	include 'db.php';
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
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</head>
	<body>
		<div id="header">
			<ul>
	  			
	  			<li><a href="products.php" class="active" style="text-decoration: none">📦Products</a></li>
	  			<li><a href="cart.php" style="text-decoration: none">🛒Cart</a></li>
	  			<li style="float:right"><a href="login.php" style="text-decoration: none">Sign In</a></li>
			</ul>
		</div>
		<?php
				$id = $_GET['id'];
				$query = "SELECT * FROM products WHERE id = $id";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>	
		<div class="container">
			<br />
			<br />
		
			<div class="viewproduct" style="margin-bottom: 50px; width: 0 auto;">
				<form method="post" enctype="multipart/form-data" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="padding:16px; height: 680px; width: 100%;" align="center" >
						<div>
							<h4 class="text-info" style="text-align: left;display: block; width: 100%; background-color: black; color: gold; height: 70px; padding-top: 21px; padding-left: 10px; font-size: 25px;"><?php echo $row["name"]; ?></h4>
						</div>

						<div class="imggg" style="float: left;">
								<img src="images/<?php echo $row["image"]; ?>" style="float: left; width: 600px; height: 550px; margin-bottom: 20px;" class="img-responsive"/>
						</div>

						<div class="cont" style="width: 100%; ">

						<div style="display: block; width: 25.5%; float: right; margin-right: 102px; border-radius: 2px;">
							<h4 class="text-danger" style="font-size: 30px;">₱ <?php echo $row["price"]; ?></h4>
						</div>
						<br><br><br>
						<div style="display: inline;">
							<input type="number" name="quantity" value="1" class="form-control" style="width: 5%;  margin-right: 100px; float: right; height: 50px;" />
						
							<select name="item_size" class="form-control" style="width: 20%; margin-right: 10px; font-size: 20px; float: right; height: 50px;" required="">
								<option value="" disabled="on" selected="">CLICK FOR SIZES</option>
								<option value="S">S</option>
								<option value="M">M</option>
								<option value="L">L</option>
								<option value="XL">XL</option>
							</select>

						</div>


						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:10px; width: 26%; margin-left: 20px" class="btn btn-success" value="Add to Cart" id="addcart" />


						<h4 class="text-danger" style="padding-left: 20px; color: black; font-size: 17px; width: 30%; float: left; margin-left: 100px;">
							<p style="float: center; padding-top: 10px; padding-right: 20px; text-align: justify; ">
								<?php echo $row["description"]; ?>
							</p>
						</h4>

						</div>
						</div>
				</form>
			</div> 
			<?php
				}
			}
			?>
		
		</div>

		<div class="container">
		<br />
		<br />
		<div>
			<h4 class="text-info" style="text-align: left;display: block; width: 100%; background-color: black; color: gold; height: 70px; padding-top: 24px; padding-left: 10px; font-size: 23px;">RELATED PRODUCTS</h4>
		</div>
		<?php
				include 'db.php';
				$query = "SELECT * FROM products ORDER BY RAND() LIMIT 3";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>	
		<div class='col-md-4' style='margin-bottom: 50px; width: 0 auto; padding: 0px;'>
        <form method='post' enctype='multipart/form-data' action='viewproduct.php?action=add&id=<?php echo $row["id"]; ?>'>
          <div style='padding:16px;' align='center' >

          	<a href='viewproduct.php?id=<?php echo $row["id"]; ?>'>
	            <div class='img'>
	                <img src='images/<?php echo $row['image'] ?>' class='img-responsive'/><br />
	            </div>

            <div style="display: block; padding-left: 20px; padding-right: 20px; background-color: black; width: 100%; height: 50px; padding-top: 8px;">
	            <h4 class='text-info' style="float: left; color: gold; font-size: 15px;"><?php echo $row['name']; ?></h4>

	            <h4 class="text-info" style="float: right; color: gold; font-size: 15px;">₱ <?php echo $row['price']; ?></h4>
            </div>
            </a>


            <input type='hidden' name='hidden_name' value='$pro_name' />

            <input type='hidden' name='hidden_price' value='$pro_price' />

            </div>
        </form>
     	</div>
		<?php
			}
		}
		?>
	</div>

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
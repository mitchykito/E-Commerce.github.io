<?php 
	session_start();
	include 'db.php';
	
	
	if (isset($_POST['update'])) {

		$id = $_POST['id'];
		$name = $_POST['name'];
		$brand = $_POST['brand'];
		$price = $_POST['price'];
		$type = $_POST['type'];
		$desc = $_POST['desc'];

		$sql = mysqli_query($conn, "UPDATE products SET name='$name', brand='$brand', type='$type', price='$price', description='$desc' WHERE id = $id");

		header('location: aproducts.php');
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
	  			<li><a href="aproducts.php" class="active" style="text-decoration: none">📦Products</a></li>
	  			<li style="float:right"><a href="logout.php" style="text-decoration: none">Log out</a></li>
	  			<li style="float:right"><a href="addproduct.php" style="text-decoration: none">Add Product</a></li>
			</ul>
		</div>

		<div class="container">
			<br />
			<h3 align="center">Edit Product</h3><br />
			<br /><br />
			<?php 
				$id = $_GET['id'];
				$query = "SELECT * FROM products WHERE id = $id";
				$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($result))
					{
			?>
			<div class="col-md-15" style="margin-bottom: 50px; width: 0 auto;">
				<form method="post" enctype="multipart/form-data" action="editproduct.php">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; " align="center" >
						<input type="id" name="id" value="<?php echo $row['id']; ?>" hidden>
						<div class="imgg">
						<img src="images/<?php echo $row['image']; ?>" class="img-responsive"/><br />
						</div>
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<label>EDIT NAME:</label>
						<input type="text" name="name" value="<?php echo $row['name']; ?>">
						
						<br>
						<label>EDIT BRAND:</label>
						<select name="brand" style="text-align: center;">
							<option value="<?php echo $row['brand']; ?>" class="opt"><?php echo $row['brand']; ?></option>
							<option value="kush" class="opt">Kush Clothing</option>
							<option value="gnarly" class="opt">Gnarly</option>
							<option value="daily flight" class="opt">Daily Flight</option>
							<option value="illest" class="opt">Illest</option>
						</select>

						<br>
						<label>EDIT TYPE:</label>
						<select name="type">
							<option value="<?php echo $row['type'] ?>"><?php echo $row["type"]; ?></option>
							<option value="shirt">Shirt</option>
							<option value="hoodie">Hoodie</option>
							<option value="short">Shorts</option>
							<option value="long sleeves">Long Sleeves</option>
						</select>

						<br>
						<label>EDIT PRICE:</label>
						<input type="text" name="price" value="<?php echo $row['price']; ?>">
						
						<br>
						<label>EDIT DESC:</label>
						<textarea name="desc"><?php echo $row['description'];?></textarea>

						<br>
						<input type="submit" name="update" style="margin-top:5px;" class="btn btn-success" value="Update"/>
						</div>
				</form>
			</div>
			<?php
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
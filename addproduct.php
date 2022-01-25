<!DOCTYPE html>
<html>
<head>
	<title>BUBUSHOP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
</head>
<body>
	<div id="header">
			<ul>	
	  			<li><a href="aproducts.php" style="text-decoration: none">📦Products</a></li>
	  			<li style="float:right"><a href="logout.php" style="text-decoration: none">Log out</a></li>
	  			<li style="float:right"><a href="addproduct.php" class="active" style="text-decoration: none">Add Product</a></li>
			</ul>
		</div>
	<form method="POST" action="add.php" enctype="multipart/form-data">
		<center>
			<h3>Add Product</h3>
		<div id="container">
			<div>
				<input type="file" name="image" style="margin-left: 60px;">
			</div>
			<div>
				<label>Product name:&nbsp;</label>
				<input type="text" name="productname" autocomplete="off">
			</div>
			<div>
				<label>Product brand:&nbsp;</label>
				<select name="item_brand" id="editable-select">
					<option value="" selected="" disabled=""><--Select--></option>
					<option value="kush">Kush Clothing</option>
					<option value="gnarly">Gnarly</option>
					<option value="daily flight">Daily Flight</option>
					<option value="illest">Illest</option>
				</select>
			</div>
			<div>
				<label>Product type:&nbsp;</label>
				<select name="item_type">
					<option value="" selected="" disabled=""><--Select--></option>
					<option value="shirt">Shirt</option>
					<option value="hoodie">Hoodie</option>
					<option value="short">Shorts</option>
					<option value="long sleeves">Long Sleeves</option>
				</select>
			</div>
			<div>
				<label>Product price:&nbsp;</label>
				<input type="text" name="price" placeholder="PHP" autocomplete="off">
			</div>
			<div>
				<label>Product Desc:&nbsp;</label>
				<textarea name="description"></textarea>
			</div>
		</div>
			<div>
				<input type="submit" name="submit">
			</div>
		</center>	
	</form>

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
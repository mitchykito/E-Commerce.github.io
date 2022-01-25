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
	  			<input type="text" name="search_text" id="search_text" style="float: right;  margin-top: 5px; text-align: left" placeholder="🔍Search Brand, Name, or Type">
			</ul>
		</div>
		<div id="side_bar" style="float: left; background-color: red;"></div>
		<div class="container">
			<br />
			<h3 align="center">Products</h3>
			<h4 align="center"><a href="gproducts.php?brand=daily flight">Daily Flight</a> | <a href="gproducts.php?brand=gnarly">Gnarly</a> | <a href="gproducts.php?brand=illest">Illest</a> | <a href="gproducts.php?brand=kush">Kush Co.</a></h4>
			<br />
			<div id="result"></div>
			<?php
			/*
				$query = "SELECT * FROM products ORDER BY RAND()";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4" style="margin-bottom: 50px; width: 0 auto;">
				<form method="post" enctype="multipart/form-data" action="products.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center" >

						<div class="img">
							<a href="viewproduct.php?id=<?php echo $row['id'];?>">
								<img src="images/<?php echo $row["image"]; ?>" class="img-responsive"/><br />
							</a>
						</div>
						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">₱ <?php echo $row["price"]; ?></h4>

						<div style="display: inline;">
						<span style="float: left; margin-top: 12px;">Qty.&nbsp;</span>
						<input type="number" name="quantity" value="1" class="form-control" style="width: 17%; float: left; margin-top: 5px;" />
						
						<select name="item_size" class="form-control" style="width: 20%; float: right; margin-top: 5px;">
							<option value="S">S</option>
							<option value="M">M</option>
							<option value="L">L</option>
							<option value="XL">XL</option>
						</select>
						<span style="float: right; margin-top: 12px;">Size&nbsp;</span>

						</div>

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart"/>
						</div>
				</form>
			</div> */

			
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

<script>

$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
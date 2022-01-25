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
		<div id="side_bar" style="float: left; background-color: red;"></div>
		<div class="container">
			<br />
			<h3 align="center">Products</h3>
			<h4 align="center"><a href="gproducts.php?brand=daily flight">Daily Flight</a> | <a href="gproducts.php?brand=gnarly">Gnarly</a> | <a href="gproducts.php?brand=illest">Illest</a> | <a href="gproducts.php?brand=kush">Kush Co.</a></h4>
			<br />
			
			<?php
			
				$brand = $_GET['brand'];
				$query = "SELECT * FROM products WHERE brand = '$brand' ORDER BY RAND()";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) > 0)
					{
					 while($row=mysqli_fetch_array($result)){
					      $pro_id    = $row['id'];
					      $pro_name   = $row['name'];
					      $pro_brand = $row['brand'];
					      $pro_price = $row['price'];
					      $pro_image = $row['image'];
				?>
			<div class="col-md-4" style="margin-bottom: 50px; width: 0 auto;">
				<form method="post" enctype="multipart/form-data" action="products.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center" >

						<a href='viewproduct.php?id=<?php echo $pro_id; ?>'>
			              <div class='img'>
			                  <img src='images/<?php echo $pro_image; ?>' class='img-responsive'/><br />
			              </div>

			              <div style='display: block; padding-left: 20px; padding-right: 20px; background-color: black; width: 100%; height: 50px; padding-top: 8px;'>
			              <h4 class='text-info' style='float: left; color: gold; font-size: 15px;'><?php echo $pro_name ?></h4>

			              <h4 class='text-info' style='float: right; color: gold; font-size: 15px;'>₱ <?php echo $pro_price;  ?></h4>
			           	 </div>
			            </a>

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						</div>
				</form>
			</div> 
			<?php
				}
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
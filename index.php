<?php  
	session_start();
?>
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
  			<li><a href="index.php" class="active" style="text-decoration: none">🏠Home</a></li>
  			<li><a href="products.php" style="text-decoration: none">📦Products</a></li>
  			<li><a href="cart.php" style="text-decoration: none">🛒Cart</a></li>
  			<li style="float:right"><a href="login.php" style="text-decoration: none">Sign In</a></li>
		</ul>
	</div>
	<div id="slideshow">
   <div>
     <img src="images/s1.jpg">
   </div>
   <div>
    <img src="images/s2.jpg">
   </div>
    <div>
    <img src="images/s3.jpg">
   </div>
</div>



</body>
</html>
<script>
$("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  3000);
</script>
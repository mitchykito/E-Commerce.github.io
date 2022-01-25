<?php 
	session_start();
	include 'db.php';

	if (isset($_POST['submit'])) {
		$image = $_FILES['image']['name'];
		$target = "images/".basename($image);

		$brand = $_POST['item_brand'];
		$type = $_POST['item_type'];
		$name = $_POST['productname'];
		$price = $_POST['price'];
		$desc = $_POST['description'];

		$sql = mysqli_query($conn,"INSERT INTO products (name, brand, type, image, description, price) VALUES ('$name', '$brand', '$type', '$image', '$desc', '$price')");

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  			header('location: aproducts.php');
  		} else {
  			echo "Failed to add product";
  	}
		
}

?>
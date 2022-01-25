if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>$.$pro_price.00
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
		}
	}


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
			</div>
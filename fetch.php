<?php
//fetch.php
include_once("db.php");

     
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM products
  WHERE NAME LIKE '%".$search."%'
  OR brand LIKE '%".$search."%' 
  OR type LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM products ORDER BY RAND() ";
}
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
 while($row=mysqli_fetch_array($result)){
      $pro_id    = $row['id'];
      $pro_name   = $row['name'];
      $pro_brand = $row['brand'];
      $pro_price = $row['price'];
      $pro_image = $row['image'];
      echo "
        <div class='col-md-4' style='margin-bottom: 50px; width: 0 auto;'>
          <form method='post' enctype='multipart/form-data' action='products.php?action=add&id=$pro_id'>
           <div style='border-radius:5px; padding:16px;' align='center' >

            <a href='viewproduct.php?id=$pro_id'>
              <div class='img'>
                  <img src='images/$pro_image ?>' class='img-responsive'/><br />
              </div>

            <div style='display: block; padding-left: 20px; padding-right: 20px; background-color: black; width: 100%; height: 50px; padding-top: 8px;'>
              <h4 class='text-info' style='float: left; color: gold; font-size: 15px;'>$pro_name</h4>

              <h4 class='text-info' style='float: right; color: gold; font-size: 15px;'>₱ $pro_price</h4>
            </div>
            </a>
            <input type='hidden' name='hidden_name' value='$pro_name' />

            <input type='hidden' name='hidden_price' value='$pro_price' />

            </div>
        </form>
      </div>


      ";
    }
}

else
{
  echo '<h3 align="center">Product Not Available</h3>';
}
?>
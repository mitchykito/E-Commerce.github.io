<?php
include 'db.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM products WHERE id=$id");

header("Location: aproducts.php");
?>
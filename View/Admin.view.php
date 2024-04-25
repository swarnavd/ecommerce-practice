<?php
require_once __DIR__ . '/../Controller/Adminprocess.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product</title>
</head>

<body>
  <form action="/Admin" method="post" enctype="multipart/form-data">
    Enter product name:<input type="text" id="product" name="product"><br>
    Enter product name:<input type="text" id="productdetails" name="productdetails"><br>
    Product price:<input type="text" id="price" name="price"><br>
    Product Image:<input type="file" id="image" name="image" ><br>
    <input type="submit" name="submit">
  </form>

</body>

</html>

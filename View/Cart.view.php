<?php
require_once __DIR__ . '/../Controller/Cartprocess.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./View/CSS/landing-style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <title>MyCart</title>
</head>

<body>
  <main class="wrapper">
    <div class="default-show">
      <table width="100%" border="1">
        <tr>
        <th>
          Name</th>
        <th>Image</th>
        <th>Price</th>
        </tr>
      <?php if (!empty($mycart)) : ?>
        <table align="center" border="1" width="100%">
          <?php foreach ($mycart as $x) : ?>
            <tr>
              <td><?= $x['name'] ?></td>
              <td><?php echo '<img src="data:image;base64,' . base64_encode($x['image']) . '"  class="prod">'; ?></td>
              <td><?= $x['price'] ?></td>
              <td><?= $x['description'] ?></td>
              <td> <button type="button" class="remove" name="remove" data-productid="<?php echo $x['product_id']; ?>" data-user="<?php echo $x['user_email']; ?>">Remove</button></td>
            </tr>
            <?php
            $price += $x['price'];
            ?>
          <?php endforeach; ?>
        </table>
        Total price : <?php echo $price; ?>
        <button type="button" class="buy" name="buy" data-productid="<?php echo $x['product_id']; ?>" data-user="<?php echo $x['user_email']; ?>" data-price="<?php echo $x['price']; ?>">Buy now</button>
      <?php else : ?>
        <h1>Cart is empty</h1>
      <?php endif; ?>
  </main>
  <script src="../View/JS/script.js"></script>
</body>

</html>

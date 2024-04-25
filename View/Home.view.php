<?php
require_once __DIR__ . '/../Controller/Homeprocess.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="./View/CSS/landing-style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body>
  <header>
    <nav class="nav-padding"><!--nav bar starts-->
      <div class="wrapper flexspacebetween flex-aligncenter">
        <ul>
          <!--navigation menu styling starts from here-->
          <li><a href="/Home">Home</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="/Profile">Profile</a></li>
          <li><a href="/Add">Add Post</a></li>
          <li><a href="/Cart">Mycart</a></li>
          <li><a href="/Logout">Log out</a></li>
          <!--navigation menu styling ends from here-->
        </ul>
        <div class="profile">
          <div class="name1">
            <?= $user['user_name'] ?>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main class="wrapper">
    <div class="default-show">
      <?php foreach ($product as $x) : ?>
        <div class="post">
          <p class="caption"><?= $x['name'] ?></p></br>

          <?php echo '<img src="data:image;base64,' . base64_encode($x['image']) . '" >'; ?></br>


          <p class="price">Price:<?= $x['price'] ?></p>
          <p class="desc">Description:<?= $x['description'] ?></p>
          <button type="button" class="cart" name="cart" data-productid="<?php echo $x['product_id']; ?>" data-user="<?php echo $user['email']; ?>">Add to cart</button>
          <button type="button" class="buy" name="buy" data-productid="<?php echo $x['product_id']; ?>" data-user="<?php echo $user['email']; ?>">Buy now</button>
        </div>
      <?php endforeach; ?>
    </div>
  </main>
  <script src="../View/JS/script.js"></script>
</body>

</html>

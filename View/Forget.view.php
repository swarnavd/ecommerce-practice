<?php
require_once __DIR__ .  '/../Controller/Forgetprocess.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./View/CSS/otp-style.css">

</head>

<body>
  <form action="" method="post">
    <p class="error"><?= $existMessage ?></p>
    <input type="email" name="email" class="mail" placeholder="enter your email id....">
    <input type="submit" name="submit" class="submitf">
  </form>
</body>

</html>

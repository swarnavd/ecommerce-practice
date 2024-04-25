<?php
require_once __DIR__ . '/../Model/Query.php';
if (isset($_POST['submit'])) {
  $entry = new Query();
  $image = file_get_contents($_FILES['image']['tmp_name']);
  $entry->insertProduct($_POST['product'], $_POST['productdetails'], $_POST['price'], $image);
}

<?php
require_once __DIR__ . '/../Model/Query.php';
$ob = new Query();
$pid = $_POST['product-id'];
$email = $_POST['user'];
$ob->deleteCart($pid, $email);
$ob->fetchCart($email);

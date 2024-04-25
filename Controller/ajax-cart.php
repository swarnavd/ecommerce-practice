<?php
require_once __DIR__ . '/../Model/Query.php';
$pid = (int)$_POST['product-id'];
$email = $_POST['email'];
$ob = new Query();
$ob->addCart($email, $pid);


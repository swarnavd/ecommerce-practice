<?php
require_once __DIR__ . '/../Model/Query.php';
$ob = new Query();
session_start();
$product = $ob->fetchProduct();
// var_dump($_SESSION['email']) ;
$user = $ob->fetchUser($_SESSION['email']);

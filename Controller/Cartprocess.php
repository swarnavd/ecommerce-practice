<?php
require_once __DIR__ . '/../Model/Query.php';
$ob = new Query();
session_start();
$mycart = $ob->fetchCart($_SESSION['email']);

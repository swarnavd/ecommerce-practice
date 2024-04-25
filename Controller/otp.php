<?php
require_once __DIR__ . '/Sendmail.php';
require_once __DIR__ . '/Validation.php';
$validation = new Validation();
$mail = new Sendmail();
$email = $_POST['email'];
session_start();
$otp = (int)rand(1000, 9999);
$_SESSION['otp'] = $otp;
if (!$validation->validEmail($email)) {
  $mail->sendOtp($email, $otp);
} else {
  $message = "wrong mail format";
  header('location:/Register?message=' . $message);
}

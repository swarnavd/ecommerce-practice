<?php
// require_once __DIR__ . '/Forgetprocess.php';
require_once __DIR__ . '/../Model/Query.php';
// If form is submitted.
session_start();
var_dump($_SESSION);
if (isset($_POST['submit'])) {
  $query = new Query();
  // New password is hashed before updating into database.
  $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  // Resets password with respect to user's email id and makes toke_hash null
  // after changing password.
  $query->resetPassword($_SESSION['token'], $hash, $_SESSION['email']);
  $message = "Your password is updated!Kindly signin with new password";
  session_destroy();
}

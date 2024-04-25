<?php

require_once __DIR__ . '/../Model/Query.php';
// session_start();
// session_unset();
// session_destroy();

if (isset($_POST['login'])) {
  $query = new Query();
  // Fetches user's data respective to a particular mail id
  $row = $query->validUser($_POST['email']);
  // Check If record found.

    // Checks if Password matches.
    if (password_verify($_POST['password'], $row['password'])) {
      if ($row['user_type'] == 1) {
        echo "hello admin";
        session_start();
        $_SESSION['admin'] = 1;
        $_SESSION['email'] = $row['email'];
        header('location:/Admin');

      }
       else {

      session_start();
      $_SESSION['flag'] = 1;
      $_SESSION['email'] = $row['email'];
      header('location:/Home');
    }

    }
    else {
      echo "hi";
    }

}

<?php
class Validation
{
  /**
   * A function to check that first name or last contains only alphabet or not.
   *
   * @param string $name
   *  User's registered name.
   * @return bool
   *  Returns true if it contains
   */
  public function validFullName(string $name)
  {
    $nameRegex = "^[a-zA-Z]{4,}(?: [a-zA-Z]+){0,2}$";
    if (preg_match($nameRegex, $name)) {
      return TRUE;
    }
    return FALSE;
  }

  public function validPassword($psw)
  {
    $passRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/";
    if (preg_match($passRegex, $psw)) {
      return TRUE;
    }
    return FALSE;
  }

  public function validEmail($email)
  {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return TRUE;
    }
    return FALSE;
  }
}

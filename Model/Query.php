<?php
require_once __DIR__ . '/Connection.php';
class Query
{
  public function insertion($name, $email, $password)
  {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("INSERT INTO info (user_name, email, password) VALUES(:user_name, :email, :password)");
      $sql->execute(array(':user_name' => $name, ':email' => $email, ':password' => $password));
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  public function insertProduct($name, $description, $price, $image)
  {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("INSERT INTO product (name, description, price, image) VALUES(:name, :description, :price, :image)");
      $sql->execute(array(':name' => $name, ':description' => $description, ':price' => $price, ':image' => $image));
    } catch (Exception $e) {
      echo $e;
    }
  }
  /**
   * A function to check if user is already registered or not.
   *
   * @param string $email
   * User's email id.
   *
   * @return boolean
   *  Returns true if user's email is existed else false.
   */
  public function isExistingUser(String $email)
  {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM info WHERE email = '$email'");
      $sql->execute();
      $row = $sql->rowCount();
      if ($row > 0) {
        return 1;
      }
      else {
        return 0;
      }
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to check if user is exists in database or not.
   *
   * @param String $usr
   * @return void
   */
  public function validUser(String $usr)
  {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM info WHERE email = '$usr'");
      $sql->execute();
      $user = $sql->fetch(PDO::FETCH_ASSOC);
      return $user;
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to add generated hashed token into database.
   *
   * @param string $email
   * @return string
   */
  public function addToken(string $email)
  {
    $ob = new Connection();
    $token = bin2hex(random_bytes(16));
    $tokenHash = hash("sha256", $token);
    try {
      $sql = $ob->conn->prepare("UPDATE info set token_hash='$tokenHash' where email='$email'");
      $sql->execute();
    } catch (Exception $e) {
      echo $e;
    }
    return $tokenHash;
  }

  /**
   * A function to update new password to the user's existing account.
   *
   * @param string $token
   * @param string $hash
   * @param string $email
   * @return void
   */
  public function resetPassword($token,  $hash,  $email)
  {
    // var_dump($token);
    $ob = new Connection();
    $sql = $ob->conn->prepare("SELECT * FROM info WHERE token_hash = '{$token}'");
    $sql->execute();
    $user = $sql->fetch(PDO::FETCH_ASSOC);
    if ($user) {
      $sql = $ob->conn->prepare("UPDATE info SET password=:hash, token_hash=NULL WHERE email=:email");
      $sql->bindParam(':hash', $hash, PDO::PARAM_STR);
      $sql->bindParam(':email', $email, PDO::PARAM_STR);
      $sql->execute();
    }
    else {
      $error = "Email id not found.";
    }
  }

  public function fetchProduct()
  {
    $ob = new Connection();
    $sql2 = $ob->conn->prepare("SELECT product_id,name,description,price,image from product ");
    $sql2->execute();
    $product = $sql2->fetchAll(PDO::FETCH_ASSOC);
    return $product;
  }

  public function fetchUser(string $email)
  {
    $ob = new Connection();
    $sql = $ob->conn->prepare("SELECT * FROM info WHERE email='{$email}'");
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    return $row;
  }
  public function addCart($email, $productId) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("INSERT INTO cart (user_email, product_id) VALUES(:user_email, :product_id)");
      $sql->execute(array(':user_email' => $email, ':product_id' => $productId));
    } catch (Exception $e) {
      echo $e;
    }
  }
  public function fetchCart($email) {
    $ob = new Connection();
    $sql = $ob->conn->prepare("SELECT p.product_id,p.name, p.price, p.image,c.user_email FROM product as p  inner join cart as c on p.product_id=c.product_id where c.user_email='{$email}'
");
    $sql->execute();
    $row = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $row;
  }

  public function addBuy($email, $productId)
  {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("INSERT INTO orders (user_email, product_id) VALUES(:user_email, :product_id)");
      $sql->execute(array(':user_email' => $email, ':product_id' => $productId));
    }
    catch (Exception $e) {
      echo $e;
    }
  }
  public function deleteCart($pid, $email) {
    $ob = new Connection();
    $sql = $ob->conn->prepare("DELETE FROM cart WHERE user_email='$email' AND product_id='$pid'");
    $sql->execute();
  }

  public function fetchOrder($pid) {
    $ob = new Connection();
    $sql = $ob->conn->prepare("SELECT * FROM product WHERE product_id='$pid'");
    $sql->execute();
    $row = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $row;
  }

  public function emptyCart($email) {
    $ob = new Connection();
    $sql = $ob->conn->prepare("DELETE FROM cart WHERE user_email='$email'");
    $sql->execute();
  }
  }

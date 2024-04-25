<?php
$url = $_SERVER['REQUEST_URI'];
$url = explode("?", $url);
switch ($url[0]) {
  case '':
    require './View/Login.view.php';
    break;
  case '/Login':
    require './View/Login.view.php';
    break;
  case '/Register':
    require './View/Register.view.php';
    break;
  case '/Forget':
    require './View/Forget.view.php';
    break;
  case '/Home':
    require './View/Home.view.php';
    break;
  case '/Reset':
    require './View/Reset.view.php';
    break;
  case '/Admin':
    require './View/Admin.view.php';
    break;

      case '/Logout':
        require './Controller/Logout.php';
        break;
      case '/Cart':
        require './View/Cart.view.php';
        break;
  case '/pdf':
    require './Controller/Invoice.php';
    break;
    //   case '/Add':
    //     require './Views/Addpost.view.php';
    //     break;
    //   case '/Profile':
    //     require './Views/Profile.php';
    //     break;

    //   case '/Edit':
    //     require './Views/Edit.view.php';
    //     break;
    //   case '/Linkedin':
    //     require './Views/Login.view.php';
    //     break;
    //   case '/403':
    //     require './Views/403.php';
    //     break;
  default:
    require './View/Login.view.php';
}
